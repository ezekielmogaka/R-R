<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasemodel extends CI_Model {

	public function check_out_logged_in_user($user_email,$cart_files){

		$cart_files_array =explode(":>>", $cart_files);
		
		$user_details = $this->db->get_where('users',array('user_email'=>$user_email));
		$data_to_return['user_details']['user_name'] =  $user_details->row()->clientNames;
		$data_to_return['user_details']['user_email'] =  $user_details->row()->user_email;
		$data_to_return['user_details']['package_id'] =  $user_details->row()->package_id;
		$data_to_return['user_details']['package_start_date'] =  $user_details->row()->package_start_date;
		$data_to_return['user_details']['package_end_date'] =  $user_details->row()->package_end_date;
		$data_to_return['user_details']['purchased_reports'] = $user_details->row()->purchased_reports;
		$data_to_return['user_details']['original_package_amount'] = $user_details->row()->original_package_amount;
		$data_to_return['user_details']['remaining_package_amount'] = $user_details->row()->remaining_package_amount;

		// get Package details
		$user_package = $this->db->get_where('packages',array('package_id'=>$user_details->row()->package_id));
		$data_to_return['user_details']['package_title'] = $user_package->row()->package_title;
		$data_to_return['user_details']['package_cost'] = $user_package->row()->package_cost;
		$data_to_return['user_details']['package_discount'] = $user_package->row()->package_discount;
		$data_to_return['user_details']['package_features'] = $user_package->row()->package_features;

		$check_user_history_reports = $this->db->get_where('user_report_history',array('user_email'=>$user_email,'status'=>1));


		$report_ids ="";
		if($check_user_history_reports->num_rows() > 0){
			foreach ($check_user_history_reports->result_array() as $history_reports) {

				$report_ids .= $this->encrypt->decode($history_reports['report_ids']);
			}
		}

		$report_ids_array = explode("::>>",$report_ids);
		unset($report_ids_array[count($report_ids_array)-1]);		



		for($counter = 0;$counter < count($cart_files_array); $counter++){
			$get_reports_in_cart = $this->db->get_where('reports',array('report_id'=>$cart_files_array[$counter]));
			if($get_reports_in_cart->num_rows() >0){
				$reports_in_cart_array = $get_reports_in_cart->result_array();
			if(array_search($reports_in_cart_array[0]['report_id'],$report_ids_array) !== FALSE){
				$reports_in_cart_array[0]['report_status'] = 1;
			}else{
				$reports_in_cart_array[0]['report_status'] = 0;
			}
			$data_to_return['user_reports'][$counter] = $reports_in_cart_array;
			}
			
		}

		$data_to_return['user_details']['number_of_purchased_reports'] = count($report_ids_array);
		


        // print_r($data_to_return['user_reports']);
		return $data_to_return;


	}
	function get_unconfirmed_details($user_email){
		$this->db->where('status',0);
		$this->db->where('user_email',$user_email);
		$this->db->order_by('order_key','desc');


		$all_uncofirmed_reports = $this->db->get('user_report_history');

		if($all_uncofirmed_reports->num_rows() > 0){
			return $all_uncofirmed_reports->result_array();
		}else{
			return "";
		}
	}

	function insert_purchase_request($data_to_insert){

		$check_insertion = $this->db->insert('user_report_history',$data_to_insert);

		return $check_insertion;

	}
	function update_purchase_request($data_to_update,$report_ids,$report_prizes,$user_email,$report_discounts,$code,$amount_to_deduct){

		$record_match = $this->db->get_where('user_report_history',array('authorize_code'=>$code,'user_email'=>$user_email,'status'=>0));
		
		if($record_match->num_rows() < 1){
			$data_to_return = "Code did not Match. Retry";

		} else if($this->encrypt->decode($report_ids) == $this->encrypt->decode($record_match->row()->report_ids)){
			$this->db->where('purchase_id',$record_match->row()->purchase_id);
			$update_results= $this->db->update('user_report_history',$data_to_update);
			$update_amount_check = $this->db->get_where('users',array('user_email'=>$user_email));
			$amount_to_update = ($update_amount_check->row()->remaining_package_amount) - $amount_to_deduct;
			$this->db->where('user_email',$user_email);
			$this->db->update('users',array('remaining_package_amount'=>$amount_to_update));
			$data_to_return = $update_results;
		}else{
			$data_to_return = "Code did not Match. Retry";
		}

		return $data_to_return;

	}

	function update_resent_code($data_to_update,$report_ids,$report_prizes,$user_email,$report_discounts,$code){

		$record_match = $this->db->get_where('user_report_history',array('user_email'=>$user_email,'status'=>0))->result_array();
        $update_results = false;
		foreach ($record_match as $report_history) {
			if($this->encrypt->decode($report_history['report_ids']) == $this->encrypt->decode($report_ids) && $this->encrypt->decode($report_history['report_prizes']) == $this->encrypt->decode($report_prizes)){
				$this->db->where('purchase_id',$report_history['purchase_id']);
		        $update_results = $this->db->update('user_report_history',$data_to_update);	
		        break;	      
			}
			
		}

		return $update_results;

	}
	public function get_purchased_reports($user_email){

		$check_user_report_history = $this->db->get_where('user_report_history',array('user_email'=>$user_email,'status'=>1));
		if($check_user_report_history->num_rows() >0){

		
			$user_report_id_string = "";
			$report_prizes_string = "";
			$report_discounts_string = "";
			$amounts_to_pay_string = "";
			$total_amount_paid_string = 0;
			$date_purchase_confirmed = array();

			$count_time = 0;
			foreach ($check_user_report_history->result_array() as $user_reports){
			    $user_report_id_string .= $this->encrypt->decode($user_reports['report_ids']);
			    $report_prizes_string .= $this->encrypt->decode($user_reports['report_prizes']);
				$report_discounts_string .= $this->encrypt->decode($user_reports['report_discounts']);
				$amounts_to_pay_string .= $this->encrypt->decode($user_reports['amounts_to_pay']);
				$total_amount_paid_string += $this->encrypt->decode($user_reports['total_amount_paid']);
				$date_purchase_confirmed[$count_time] = $user_reports['time_of_confirm'];

				$count_time++;
			}


			    $user_report_id_array = explode("::>>",$user_report_id_string );
			    $report_prizes_array = explode("::>>", $report_prizes_string);
				$report_discounts_array = explode("::>>",$report_discounts_string );
				$amounts_to_pay_array = explode("::>>", $amounts_to_pay_string);
				// $date_purchase_confirmed_array = explode("::>>", $date_purchase_confirmed);

				unset($user_report_id_array[count($user_report_id_array)-1]);
			    unset($report_prizes_array[count($report_prizes_array)-1]);
				unset($report_discounts_array[count($report_discounts_array)-1]);
				unset($amounts_to_pay_array[count($amounts_to_pay_array)-1]);
				// unset($date_purchase_confirmed_array[count($date_purchase_confirmed_array)-1]);

				$historic_reports_array = array();
				
				for($count =0; $count < count($user_report_id_array); $count++){

					$historic_reports = $this->db->get_where('reports',array('report_id'=>$user_report_id_array[$count]));
					$historic_reports_the_array =$historic_reports->result_array(); 
					$historic_reports_array['history'][$count]['report_details'] = $historic_reports_the_array[0];
					$historic_reports_array['history'][$count]['price'] = $report_prizes_array[$count];
					$historic_reports_array['history'][$count]['discount'] = $report_discounts_array[$count];
					$historic_reports_array['history'][$count]['amount_paid_this_report'] = $amounts_to_pay_array[$count];
					// $historic_reports_array['history'][$count]['date_of_purchase'] = $date_purchase_confirmed_array[$count];
					
				}

				$check_historic_reports_user_details = $this->db->get_where('users',array('user_email'=>$user_email))->result_array();
				$historic_reports_array['user_details'] = $check_historic_reports_user_details[0];
				$check_package_first = $this->db->get_where('packages',array('package_id'=>$historic_reports_array['user_details']['package_id']))->result_array();
				$check_package = $check_package_first[0];
				$historic_reports_array['user_details']['package_title'] = $check_package['package_title'];
				$historic_reports_array['user_details']['package_cost'] = $check_package['package_cost'];
				$historic_reports_array['user_details']['package_discount'] = $check_package['package_discount'];



			 

		}else{

			$historic_reports_array['history']  = FALSE;
			$historic_reports_the_array = $this->db->get_where('users',array('user_email'=>$user_email))->result_array();
			$historic_reports_array['user_details'] = $historic_reports_the_array[0];
			$check_package_results = $this->db->get_where('packages',array('package_id'=>$historic_reports_array['user_details']['package_id']))->result_array();
			$check_package = $check_package_results[0];
			$historic_reports_array['user_details']['package_title'] = $check_package['package_title'];
			$historic_reports_array['user_details']['package_cost'] = $check_package['package_cost'];
			$historic_reports_array['user_details']['package_discount'] = $check_package['package_discount'];


			
		}


		return $historic_reports_array;

	}
	function check_user_history($user_email){

		$user_result = $this->db->get_where('user_report_history',array('user_email'=>$user_email,'status'=>1));
		if($user_result->num_rows() > 0){
			return true;
		}else{
			return false;
		}

	}


}
