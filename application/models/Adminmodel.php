<?php

/**
* 
*/
class Adminmodel extends CI_Model
{
	function check_login_credentials($admin_credentials){

		$check_admin_exists = $this->db->get_where('admins',array('admin_email'=>$admin_credentials['admin_email'],'admin_password'=>$admin_credentials['admin_password']));

		if($check_admin_exists->num_rows() > 0){

			$data_to_return['first_name'] = $check_admin_exists->row()->first_name;
			$data_to_return['second_name'] = $check_admin_exists->row()->second_name;

		}
		else{

			$data_to_return = "No user with such credentials in our records. Recheck your details";
		}

		return $data_to_return;
	}
	function get_categories(){
		$get_categories = $this->db->get('categories');
		
		return $get_categories->result_array();

	}

	function add_report($data_to_model){

		$confirm_report_inserted = $this->db->insert('reports',$data_to_model);
	
	}

	function get_report_details($report_id){

		$report_details = $this->db->get_where('reports',array('report_id'=>$report_id));

		return $report_details->result_array();
	}

	function edit_report($data_to_model,$report_id){


		 $this->db->where('report_id',$report_id);
		 $this->db->update('reports',$data_to_model);

		 return True;

	}

	function get_all_reports(){
		$all_reports = $this->db->get('reports');
		return $all_reports->result_array();
	}


	
	function get_industry_reports($category_id){

		$report_details = $this->db->get_where('reports',array('category_id'=>$category_id));

		return $report_details->result_array();
	}

	function get_sector_reports($category_id){

		$report_details = $this->db->get_where('reports',array('category_id'=>$category_id));

		return $report_details->result_array();
	}

	function get_corporate_reports($category_id){

		$report_details = $this->db->get_where('reports',array('category_id'=>$category_id));

		return $report_details->result_array();
	}

	function delete_report($report_id){
		if(!is_null($report_id)){

			$this->db->where('report_id', $report_id);
			$this->db->delete('reports');


			
	}
	}
	
	function get_count_users(){
		$all_users = $this->db->get('users');
		return $all_users->num_rows();
	}

	function get_popular_reports(){
		$this->db->order_by('report_downloads','DESC');
		$this->db->limit('11');
		$popular_reports = $this->db->get('reports');


		return $popular_reports->result_array();
	}
	
	function add_client($data_to_model){

		$this->db->insert('users',$data_to_model);
	
	}

	function get_all_clients(){
		$all_clients = $this->db->get('users');
		return $all_clients->result_array();
	}
	
	function delete_client($client_id){
		if(!is_null($client_id)){

			$this->db->where('client_id', $client_id);
			$this->db->delete('users');


			
	}
	}
	
	function update_client_payment_data($data_to_clients_table,$client_email){
		
		$this->db->update('users', $data_to_clients_table, array('user_email' => $client_email));
	
	}
	
	function update_payment_after_credit($data_to_clients_table,$client_email){
		
		$this->db->update('payment', $data_to_clients_table, array('user_email' => $client_email));
	
	}

	function save_payment($data_to_model){
	
	
		
		$this->db->insert('payments',$data_to_model);
	
	}
	
	function save_credit_payment($data_to_credits,$client_email){
		
		$this->db->update('users', $data_to_credits, array('user_email' => $client_email));
	
	}

	
	function get_all_clients_for_crediting(){

		 $clients_with_subscriptions = $this->db->get_where('users',array('package_id > '=>0));
		
		$clients_with_subscriptions = $clients_with_subscriptions->result_array();
	

		for($counter=0; $counter < count($clients_with_subscriptions); $counter++){
			$package_subscribed = $this->db->get_where('packages',array('package_id'=>$clients_with_subscriptions[$counter]['package_id']));
			$package = $package_subscribed->result_array();
			
			$clients_with_subscriptions[$counter]['package_id'] = $package[0]['package_id'];
			$clients_with_subscriptions[$counter]['package_name'] = $package[0]['package_title'];

		}
		 
		
		return $clients_with_subscriptions;
	}
	
	function get_payment_details(){
		$all_payments = $this->db->get('payments');
		$all_payments = $all_payments->result_array();
	

		for($counter=0; $counter < count($all_payments); $counter++){
			$client_involved = $this->db->get_where('users',array('user_email'=>$all_payments[$counter]['user_email']));
			$client_data = $client_involved->result_array();
			$all_payments[$counter]['client_name'] = $client_data[0]['clientNames'];
			$all_payments[$counter]['email'] = $client_data[0]['user_email'];
			
		}

		return $all_payments;
	}

	function get_payment_details_for_editing($payment_id){

		$payment_details = $this->db->get_where('payments',array('payment_id'=>$payment_id));

		return $payment_details->result_array();
	}

	function get_all_package_details(){
		$all_packages = $this->db->get('packages');
		return $all_packages->result_array();
	}


	
	function get_package_details($package_id){

		$package_details = $this->db->get_where('packages',array('package_id'=>$package_id));

		return $package_details->result_array();
	}
	
	function update_package($data_to_model, $package_id){
		if(!is_null($package_id && $data_to_model)){


			$this->db->where('package_id', $package_id);
			$this->db->update('packages', $data_to_model);

	}
	}

	function get_front_end_details($content_id){

		$content__details = $this->db->get_where('frontend_content',array('content_id'=>$content_id));

		return $content__details->result_array();
	}

	function update_front_end_content($data_to_model, $content_id){
		if(!is_null($content_id && $data_to_model)){


			$this->db->where('content_id', $content_id);
			$this->db->update('frontend_content', $data_to_model);

	}
	}


	function add_latest_article($data_to_model){

		$this->db->insert('articles',$data_to_model);
	
	}
	
	function get_articles(){
		$articles = $this->db->get('articles');
		return $articles->result_array();
	}

	function delete_article($article_id){
		if(!is_null($article_id)){

			$this->db->where('article_id', $article_id);
			$this->db->delete('articles');


			
	}
	}




	
	
}
