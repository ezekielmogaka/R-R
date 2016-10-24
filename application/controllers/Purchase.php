<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Purchase extends CI_Controller {



	public function __construct() {
		parent::__construct();
		$this->load->helper('string');

		$this->load->model('Purchasemodel');
		$this->load->helper('myurihelper_helper');

	}



	public function index(){
		if(null != $this->session->userdata('user_email') && intval($this->session->userdata('cart_count')) != 0 ){			
			$this->check_out_logged_in_user();
		}else if(null != $this->session->userdata('user_email') && intval($this->session->userdata('cart_count')) == 0 ){
			redirect('purchase/show-empty-cart','refresh');
		}else{
			$this->show_login("<div class='alert alert-info' style='text-align:center;'>You have to log in first to check out </div>");	    

		}	

	}
	public function show_cart(){
		if(null == $this->session->cart_count || intval($this->session->cart_count) == 0){
			redirect('purchase/show-empty-cart','refresh'); 

		}else{
			$this->check_out_logged_in_user();
			return;
		}
	}
	public function show_empty_cart(){		
		$data['active'] = "cart";
		$this->load->model('Home');
			$data['homepage_data'] =  $this->Home->get_homepage_details();
		$data['content'] = "empty_cart";
		$data['page_title'] = "Cart";
		$data['active_part'] = "cart_checkout";
		$data['specific_scripts'] = array(
			'custom/add_to_cart_page.js',
			'datatable/jquery.dataTables.min.js',
			'datatable/DT_bootstrap.js',
			'datatable/customise_datatable.js'

			);
	
		$this->load->view('index',$data);

	}

	private function check_out_logged_in_user(){

		$reports_in_cart_details = $this->Purchasemodel->check_out_logged_in_user($this->session->userdata('user_email'),$this->session->userdata('to_cart_files'));
		$data['unconfirmed_reports'] = $this->Purchasemodel->get_unconfirmed_details($this->session->userdata('user_email'));
		$data['active'] = "cart";
		$data['content'] = "cart";
		$data['page_title'] = "Cart";
		$data['active_part'] = "cart_checkout";
		$data['report_details'] = $reports_in_cart_details;
		$data['specific_scripts'] = array(
		    'custom/add_to_cart_page.js',
			'datatable/jquery.dataTables.min.js',
			'datatable/DT_bootstrap.js',
			'datatable/customise_datatable.js'
			);
		if(isset($reports_in_cart_details['user_reports']) && count($reports_in_cart_details['user_reports']) != 0){
			$this->load->view('index',$data);
		}else{
			$this->account();
		}

	}

	public function clear_cart(){

		$this->session->set_userdata('cart_count',"0");

		$this->session->unset_userdata('to_cart_files');

		$this->session->unset_userdata('time_added');

		redirect('purchase/show-empty-cart','refresh');
	}

	private function view_user_reports($report_details = ""){		

		$purchased_reports = $this->Purchasemodel->get_purchased_reports($this->session->userdata('user_email'));
		$this->load->model('Home');
		$data['homepage_data'] =  $this->Home->get_homepage_details();

		$data['active'] = "account";

		$data['content'] = "reports_purchased";

		$data['page_title'] = "Reports Purchased";

		$data['active_part'] = "user_downloads";

		$data['report_details'] = $purchased_reports;

		$data['specific_scripts'] = array(

			'custom/purchased_reports_page.js',
			'datatable/jquery.dataTables.min.js',
			'datatable/DT_bootstrap.js',
			);

		$this->load->view('index',$data);

	}

	public function show_login($server_message = FALSE){

		$data['active'] = "login";

		$data['content'] = "login";

		$data['submit_url'] = "purchase/login";

		$data['page_title'] = "Login";

	    $data['server_error'] = $server_message;
	    $this->load->view('index',$data);



	}

	public function login(){

		$this->load->model('user_model');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');
		if($this->form_validation->run()){

			$email=$this->input->post('email');
			$password=md5($this->input->post('password'));
			$result=$this->user_model->login($email,$password);
			if($result){
			  redirect('purchase','refresh');
			}else{
				$this->show_login("<div class='alert alert-danger'>A system error occured. Please try again</div>");
			}
		}else{
			$this->show_login();

		}
	}



	public function remove_from_cart(){

		if(null == $this->input->post('report_id')){

			$this->index();

		}else{

			$report_id = $this->encrypt->decode($this->input->post('report_id'));

			$to_cart_files_array = explode(":>>", $this->session->userdata('to_cart_files'));

			$time_added_array = explode(":>>", $this->session->userdata('time_added'));
			$key_to_unset = array_search($report_id, $to_cart_files_array);
			unset($to_cart_files_array[$key_to_unset]);
			unset($time_added_array[$key_to_unset]);

			$to_cart_files_a = implode(":>>", $to_cart_files_array);

			$time_added_a = implode(":>>",$time_added_array);

			$cart_count = $this->session->userdata('cart_count');

			$cart_count = $cart_count -1;

			$this->session->set_userdata('to_cart_files',$to_cart_files_a);

			$this->session->set_userdata('time_added',$time_added_a);

			$this->session->set_userdata('cart_count',$cart_count);
			if($cart_count ==0){
				$data_to_view = "None";
			}else{
			$reports_in_cart_details = $this->Purchasemodel->check_out_logged_in_user($this->session->userdata('user_email'),$this->session->userdata('to_cart_files'));
			$data['active'] = "cart";

			$data['content'] = "cart";

			$data['page_title'] = "Cart";

			$data['active_part'] = "cart_checkout";

			$data['report_details'] = $reports_in_cart_details;	
			$data['unconfirmed_reports'] = $this->Purchasemodel->get_unconfirmed_details($this->session->userdata('user_email'));

		       $data_to_view = $this->load->view('mainpages/cart',$data,true);
			}
			echo json_encode($data_to_view);
		}

	}



	public function request_authorize_code(){

		if(null == $this->input->post('report_ids')){

			redirect('purchase','refresh');

		}else{
			$record_id = $this->session->user_email." ".$this->input->post('report_ids')." ".time();

			$record_id = password_hash($record_id,PASSWORD_BCRYPT,array('cost'=>12));
			$random_code = strtoupper(random_string('alnum',3));

			$random_code .= "-".strtoupper(random_string('alnum',3));

			$random_code .= "-".strtoupper(random_string('alnum',3));
			// send random code via user Email
			$message = "Authorization Code to use: ".$random_code;
			$this->email->from("noreply@marketsectorskenya.com");
			$this->email->to($this->session->userdata('user_email'));

			$this->email->subject("Market Sectors Authorization Code");
			$this->email->message($message);

			$this->email->send();

			$data_to_model = array(

                 'purchase_id'=>$record_id,
                 'report_ids'=>$this->input->post('report_ids'),
                 'report_prizes'=> $this->input->post('report_prizes'),
                 'report_discounts'=>$this->input->post('report_discounts'),
                 'amounts_to_pay'=>$this->input->post('reports_amount_to_pay'),
                 'total_amount_paid'=>$this->input->post('reports_total_amount'),
                 'authorize_code'=>$random_code,
                 'status'=>0,
                 'user_email'=>$this->session->userdata('user_email'),
                 'time_of_request'=>$this->input->post('time_of_request')

				);
			$server_reply = $this->Purchasemodel->insert_purchase_request($data_to_model);

			echo json_encode($server_reply);

		}

	}



	public function authorize_payment(){

		if(null == $this->input->post('report_ids')){
			redirect('purchase','refresh');
		}else{

			$code = $this->input->post('code');
			$data_to_model = array(
                 'time_of_confirm' =>$this->input->post('time_of_confirmation'),
                 'status'=>1
				);
			$amount_to_deduct = $this->encrypt->decode($this->input->post('reports_total_amount'));

			$server_reply = $this->Purchasemodel->update_purchase_request($data_to_model,$this->input->post('report_ids'),$this->input->post('report_prizes'),$this->session->userdata('user_email'),$this->input->post('report_discounts'),$code,$amount_to_deduct);
			if($server_reply == true){

				$this->session->set_userdata('cart_count',"0");

				$this->session->unset_userdata('to_cart_files');

				$this->session->unset_userdata('time_added');

			}

			echo json_encode($server_reply);
		}

		

	}



	function resend_authorize_code(){
		if(null == $this->input->post('report_ids')){

			redirect('purchase','refresh');
		}else{
			$random_code = strtoupper(random_string('alnum',3));

			$random_code .= "-".strtoupper(random_string('alnum',3));

			$random_code .= "-".strtoupper(random_string('alnum',3));
			// send random code via user Email
			$message = "Authorization Code to use: ".$random_code;
			$this->email->from("noreply@marketsectorskenya.com");
			$this->email->to($this->session->userdata('user_email'));

			$this->email->subject("Market Sectors Authorization Code");
			$this->email->message($message);

			$this->email->send();


			$data_to_model = array('authorize_code'=>$random_code,'time_of_request'=>$this->input->post('time_of_request'));



			$server_reply = $this->Purchasemodel->update_resent_code($data_to_model,$this->input->post('report_ids'),$this->input->post('report_prizes'),$this->session->userdata('user_email'),$this->input->post('report_discounts'),$random_code);

			echo json_encode($server_reply);

		}

	}

	public function account(){
	
		if(null != $this->session->user_email){
			$this->view_user_reports();	
			
		}else{			

			$data['active'] = "account";
			
			
			

			$data['content'] = "reports_purchased";

			$data['page_title'] = "Reports Purchased";

			$data['active_part'] = "user_downloads";

			$data['report_details'] = 0;
			$this->load->model('Home');
			$data['homepage_data'] =  $this->Home->get_homepage_details();

			$data['specific_scripts'] = array(

				'custom/purchased_reports_page.js',
				'datatable/jquery.dataTables.min.js',
				'datatable/DT_bootstrap.js',
				);
			

			$this->load->view('index',$data);

			
		}
	}
	public function download_full_report(){
		$encrypted_file_path = $this->uri->segment(3);
	 	if($encrypted_file_path == ""){
			$this->index();
			return;
		}else{
			$encoded_file_path = base64url_decode($encrypted_file_path);	

			if(ctype_print($encoded_file_path) == false){
				$this->index();
				return;
			}else{	

				$fullPath = $this->encrypt->decode($encoded_file_path);

				ignore_user_abort(true);
		        set_time_limit(0);       

				if ($fd = fopen ($fullPath, "r")) {
			    $fsize = filesize($fullPath);
			    $path_parts = pathinfo($fullPath);
			    $ext = strtolower($path_parts["extension"]);
			    switch ($ext) {
			        case "pdf":
			        header("Content-type: application/pdf");
			        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
			        break;
			        // add more headers for other content types here
			        default;
			        header("Content-type: application/octet-stream");
			        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
			        break;
			    }
			    header("Content-length: $fsize");
			    header("Cache-control: private"); //use this to open files directly
			    while(!feof($fd)) {
			        $buffer = fread($fd, 2048);
			        echo $buffer;
			    }
			   fclose ($fd);
			   exit;
			  }else{
			  	$this->index();
				return;
			  }
			  
			}
		}


	}





}
