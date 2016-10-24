<?php

 
 class Admin extends CI_Controller
 {
 	
 	function __construct()
 	{ 
 		parent::__construct();
 		$this->load->model('Adminmodel');
	$this->load->model('activatecheckpaymentexpiry'); 
	
 	}

 	public function index(){

 		$this->load->view('admin/login');
 	}
 	public function admin_login(){
 		if(null == $this->input->post('admin_email') && null == $this->input->post('admin_pass')){
 			$this->index();
 		}else{
	$this->activatecheckpaymentexpiry->manage_actions();

 			$this->form_validation->set_rules('admin_email','Email','required|trim');
 			$this->form_validation->set_rules('admin_pass','Password','required|trim');

 			if($this->form_validation->run()){
 				//compare values with those in the db
 				$admin_credentials = array(
 					                    'admin_email'=> $this->input->post('admin_email'),
 					                     'admin_password'=>$this->input->post('admin_pass')
 					                     );

 				$user_details = $this->Adminmodel->check_login_credentials($admin_credentials);

 				if(gettype($user_details) == "string"){
 					$data['server_reply'] = "<div class='alert alert-danger'><i class='fa fa-warning'></i>".$user_details."</div>";
 					$data['content'] = "login";
 					$this->load->view('admin/login',$data);
 				}else{

 					$session_data = array(
 						             'user_email'=>$this->input->post('admin_email'),
 						             'user_name'=>$user_details['first_name']." ".$user_details['second_name']
 						             );
 					$this->session->set_userdata($session_data);

 					 $this->admin_dashboard();

 				}


 			}else{
 				//Show errors to the user
 				$data['server_reply'] = "<div class='alert alert-warning'>".validation_errors()."</div>";

 				$this->load->view('admin/login',$data);

 			}


 		}
 	}

 	public function admin_dashboard(){
 		if(null == $this->session->userdata('user_email')){
 			
 			$this->index();

 		}
 		else{

 			$data['popular_reports'] = $this->Adminmodel->get_popular_reports();
 			$data['count_users'] = $this->Adminmodel->get_count_users();
 			$data['count_reports'] = count($this->Adminmodel->get_all_reports());

 			$data['page'] = 'dashboard.php';
 			$data['active_page'] = "Dashboard";
 			$this->load->view('admin/index.php',$data);
 			

 		}
 	}


 	public function industry_reports(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$category_id=1;

 			$data_to_view['reports'] = $this->Adminmodel->get_industry_reports($category_id);	   
	   		$data_to_view['page'] = "manage_reports.php";
	   		$data_to_view['page_title'] = "Industry Reports";
	   		$data_to_view['active_page'] = "Manage Reports";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 	public function sector_reports(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$category_id=2;

 			$data_to_view['reports'] = $this->Adminmodel->get_industry_reports($category_id);	   
	   		$data_to_view['page'] = "manage_reports.php";
	   		$data_to_view['page_title'] = "Sector Reports";
	   		$data_to_view['active_page'] = "Manage Reports";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}

 	public function corporate_reports(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$category_id=3;

 			$data_to_view['reports'] = $this->Adminmodel->get_industry_reports($category_id);	   
	   		$data_to_view['page'] = "manage_reports.php";
	   		$data_to_view['page_title'] = "Corporate Reports";
	   		$data_to_view['active_page'] = "Manage Reports";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}

 	}



 	public function add_report(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$data['categories'] = $this->Adminmodel->get_categories();
 			$data['page_title'] = 'Add New Report';
 			$data['page'] = 'add_report.php';
 			$data['active_page'] = "Manage Reports";
 			$this->load->view('admin/index.php',$data);
 		}
 	}


 	public function submit_new_report(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			if(!isset($_POST)){
 				$this->add_report();
 			}else{
 				$upload_path_full = "./assets/reports/full/";

 				$upload_path_sample = "./assets/reports/sample";
 				$upload_path_cover= "./assets/reports/report_covers";

 				$allowed_types = 'pdf|doc|docx';
 				$allowed_types_report_covers = 'png|jpg|jpeg|gif|bmp|pbg|exif|tiff';

 				$datareturned1 = $this->upload_file("reportfile",$upload_path_full,$allowed_types);
 				$datareturned2 = $this->upload_file("reportfile_sample",$upload_path_sample,$allowed_types);
 				$datareturned3 = $this->upload_file("cover_page",$upload_path_cover,$allowed_types_report_covers);				
 				
 				
 				if(isset($datareturned1['error']) || isset($datareturned2['error']) || isset($datareturned3['error'])){
 					if(isset($datareturned1['error']) && isset($datareturned2['error'])){

 						$data_to_view['server_reply_file1'] = "<div class='alert alert-danger'>".$datareturned1['error']."</div>";
 						$data_to_view['server_reply_file2'] = "<div class='alert alert-danger'>".$datareturned2['error']."</div>";


 					}
 					elseif(isset($datareturned1['error']) && isset($datareturned2['error']) && isset($datareturned3['error'])){

 						$data_to_view['server_reply_file1'] = "<div class='alert alert-danger'>".$datareturned1['error']."</div>";
 						$data_to_view['server_reply_file2'] = "<div class='alert alert-danger'>".$datareturned2['error']."</div>";
 						$data_to_view['server_reply_file3'] = "<div class='alert alert-danger'>".$datareturned3['error']."</div>";

 					}
 					elseif(isset($datareturned1['error']) && isset($datareturned3['error'])){

 						$data_to_view['server_reply_file1'] = "<div class='alert alert-danger'>".$datareturned1['error']."</div>";
 						$data_to_view['server_reply_file3'] = "<div class='alert alert-danger'>".$datareturned3['error']."</div>";

 					}
 					elseif(isset($datareturned2['error']) && isset($datareturned3['error'])){

 						$data_to_view['server_reply_file2'] = "<div class='alert alert-danger'>".$datareturned2['error']."</div>";
 						$data_to_view['server_reply_file3'] = "<div class='alert alert-danger'>".$datareturned3['error']."</div>";

 					}
 					elseif(isset($datareturned1['error'])){

 						$data_to_view['server_reply_file1'] = "<div class='alert alert-danger'>".$datareturned1['error']."</div>";

 					}elseif(isset($datareturned2['error'])){

 						$data_to_view['server_reply_file2'] ="<div class='alert alert-danger'>".$datareturned2['error']."</div>";

 					}elseif(isset($datareturned3['error'])){

 						$data_to_view['server_reply_file3'] ="<div class='alert alert-danger'>".$datareturned3['error']."</div>";

 					}
 					

                    $data_to_view['categories'] = $this->Adminmodel->get_categories(); 			
 					$data_to_view['page'] = 'add_report.php';
 					$data_to_view['page_title'] = 'Add New Report';
 					$data_to_view['active_page'] = "Add New Report";

 			        $this->load->view('admin/index.php',$data_to_view);

 			        return;



 				}else{

 				// validate other inputs
 				$this->form_validation->set_rules('reportname', 'Report Title','required|trim');
 				$this->form_validation->set_rules('reportdescription', 'Report Description','required|max_length[200]|trim');
 				$this->form_validation->set_rules('reportpages', 'Report Pages','required|trim');
 				$this->form_validation->set_rules('reportprice', 'Report Price','required|trim');
 				$this->form_validation->set_rules('reportcategory', 'Report Category','required|callback_category_select_okey|trim');
 				$this->form_validation->set_rules('year_published','Year Published','required|trim');


 				if(!$this->form_validation->run()){

 					$data_to_view['categories'] = $this->Adminmodel->get_categories();
 			
 			        $data_to_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_to_view['page'] = 'add_report.php';
 					$data_to_view['page_title'] = 'Add New Report';
 					$data_to_view['active_page'] = "Manage Reports";
 			        	$this->load->view('admin/index.php',$data_to_view);

 			        return;

 				}
 				else{
 					// current time for date added and modified 
 					$date = date("Y-m-d",time());

 		
 					$data_to_model = array(
	                  'report_name'=>$this->input->post('reportname'),
	                  'report_description'=>$this->input->post('reportdescription'),
	                  'full_report_path'=>$datareturned1['upload_data']['file_name'],
	                  'file_type'=>$datareturned1['upload_data']['file_ext'],
	                  'sample_file_type'=>$datareturned2['upload_data']['file_ext'],
	                  'sample_report_path'=>$datareturned2['upload_data']['file_name'],
	                  'report_cover_type'=>$datareturned3['upload_data']['file_ext'],
	                  'report_cover_path'=>$datareturned3['upload_data']['file_name'],
	                  'year_published'=>$this->input->post('year_published'),
	                  'date_added'=>$date,
	                  'last_modified'=>$date,
	                  'report_price'=>$this->input->post('reportprice'),
	                  'number_of_pages'=>$this->input->post('reportpages'),	                  
		              'report_views'=>0,
		              'report_downloads'=>0,
		              'category_id'=>$this->input->post('reportcategory')
			         );

                   $this->Adminmodel->add_report($data_to_model);

                   $this->industry_reports();


 				}


 			}

 				
 		}
 			
 	  }
 	}

 	
   public function delete_report($report_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$this->Adminmodel->delete_report($report_id);
 			$this->industry_reports();
 		}

 	}





   public function edit_report($report_id =""){

	   	if(null == $this->session->userdata('user_email')){
	   		$this->index();
	   	}
	   	else{
	   		// load report details
	   		$data_to_view['report_details'] = $this->Adminmodel->get_report_details($report_id);
	   		$data_to_view['categories'] = $this->Adminmodel->get_categories();
	   		$data_to_view['page_title'] = "Edit Report";
	   		$data_to_view['page'] = "edit_report.php";
	   		$this->load->view('admin/index.php',$data_to_view);


	   	}
   }


 public function submit_edited_report(){

   	if(null == $this->session->userdata('user_email')){
   		$this->index();
   	}else{


   				
 				$upload_path_cover= "./assets/reports/report_covers";

 				
 				$allowed_types_report_covers = 'png|jpg|jpeg|gif|bmp|pbg|exif|tiff';

 				
 				$datareturned3 = $this->upload_file("cover_page",$upload_path_cover,$allowed_types_report_covers);	

 				if(isset($datareturned3['error'])){
 					
 						$data_to_view['server_reply_file3'] = "<div class='alert alert-danger'>".$datareturned3['error']."</div>";
 						$data_to_view['report_details'] = $this->Adminmodel->get_report_details($this->input->post('hidden_report_id'));
				   		$data_to_view['categories'] = $this->Adminmodel->get_categories();
				   		$data_to_view['page_title'] = "Edit Report";
				   		$data_to_view['page'] = "edit_report.php";
 						


 					}else{

   	        	$this->form_validation->set_rules('reportname', 'Report Title','required|trim');
 				$this->form_validation->set_rules('reportdescription', 'Report Description','required|min_length[10]|trim');
 				$this->form_validation->set_rules('reportpages', 'Report Pages','required|trim');
 				$this->form_validation->set_rules('reportprice', 'Report Price','required|trim');
 				$this->form_validation->set_rules('reportcategory', 'Report Category','required|callback_category_select_okey|trim');
 				$this->form_validation->set_rules('year_published','Year Published','required|trim');


 				if(!$this->form_validation->run()){

 					 			
 			        $data_to_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_to_view['report_details'] = $this->Adminmodel->get_report_details($this->input->post('hidden_report_id'));
			   		$data_to_view['categories'] = $this->Adminmodel->get_categories();
			   		$data_to_view['page_title'] = "Edit Report";
			   		$data_to_view['page'] = "edit_report.php";
			   		$this->load->view('admin/index.php',$data_to_view);

 			        return;

 				}
 				else{

 					// get today's date
 					$date  = date('Y-m-d',time());

 					$report_id = $this->input->post('hidden_report_id');

 					$data_to_model = array(
	                  'report_name'=>$this->input->post('reportname'),
	                  'report_description'=>$this->input->post('reportdescription'),
	                  'year_published'=>$this->input->post('year_published'),
	                  'last_modified'=>$date,
	                  'report_price'=>$this->input->post('reportprice'),
	                  'number_of_pages'=>$this->input->post('reportpages'),
	                  'category_id'=>$this->input->post('reportcategory'),
	                  'report_cover_type'=>$datareturned3['upload_data']['file_ext'],
	                  'report_cover_path'=>$datareturned3['upload_data']['file_name']
			         );



 					$this->Adminmodel->edit_report($data_to_model,$report_id);
 					$this->industry_reports();

 				}



 		}
 	}
 }

 	// function to upload any file


 	public function upload_file($field_name = "", $upload_folder,$allowed_types){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$config['upload_path'] = $upload_folder;
 			$config['allowed_types']= $allowed_types;
 			$config['max_size'] = 2048;

 			$this->upload->initialize($config);


 			if(!$this->upload->do_upload($field_name)){

 			  $error = array('error' => $this->upload->display_errors());

 			  return $error;

 			}else{

 				$data = array('upload_data' => $this->upload->data());

			   return $data;

 			}
 		}
 	}


 	// validate select
 	public function category_select_okey($selected_string){

 		if(intval($selected_string) == 0){
 			$this->form_validation->set_message('category_select_okey', 'You did not select the correct category. You selected "--------Select Category-------"');
 			return false;
 		}else{
 			return true;
 		}

 	}

 	public function  logout(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			unset($_SESSION['user_email']);
 			unset($_SESSION['user_name']);

 			$this->session->sess_destroy();

 		   $this->index();
 		}
 	}



 	public function add_new_client(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			/*$data['categories'] = $this->Adminmodel->get_categories();*/
 			$data['page_title'] = 'Add New Report';
 			$data['page'] = 'add_client.php';
 			$data['page_title'] = "Add Client";
 			$this->load->view('admin/index.php',$data);
 		}
 	}


 	public function _generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$_';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	
 	
 	public function submit_client(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
 
        		$this->load->model('Adminmodel');

				  
				  // field name, error message, validation rules
        		  $this->form_validation->set_rules('client_type', 'Client Type', 'trim|required');
				  	
				  
				  $this->form_validation->set_rules('clientNames', 'Client Names', 'trim|required|min_length[2]|xss_clean');
				  $this->form_validation->set_rules('contactPerson', 'Contact Person', 'trim|required|min_length[4]|xss_clean');
				  $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				  $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[9]|regex_match[/^[0-9]{10}$/]');

				 /* $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
				  $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');*/


				  $this->form_validation->set_rules('client_notes', 'Client Notes', 'trim|required|min_length[20]');


				  $generated_client_password = $this->_generateRandomString();
				  

				  if(!$this->form_validation->run() == TRUE)
				  {
				  	 
				   $this->add_new_client();



				  }
				  else
				  {


			$to_email =  $this->input->post('email');
			$subject= "Your Research & Ratings Login Credentials";
			$message = 'Email: '.$to_email."\r\n\n".'Your Password: '.$generated_client_password;
			
   			$headers  = 'MIME-Version: 1.0' . "\r\n";
 			$headers .= "From: nonreplyinfo@researchandratings.co.ke \r\n"."X-Mailer: php";
 			$headers .= "Reply-To: info@researchandratings.co.ke \r\n"."X-Mailer: php";
   
		
				//send email
				  mail($to_email, $subject, $message,$headers);
			

			
				  		$pass = md5($generated_client_password);
				  		$data_to_model = array(
	                  'client_type'=>$this->input->post('client_type'),
	                  'clientNames'=>$this->input->post('clientNames'),
	                  'contactPerson'=>$this->input->post('contactPerson'),
	                  'user_email'=>$this->input->post('email'),
	                  'phone'=>$this->input->post('phone'),
	                  'password'=>$pass,
	                  'client_notes'=>$this->input->post('client_notes')
			         );

				   $this->Adminmodel->add_client($data_to_model);

				    //display success message
                 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Registered Client successifully</div>');
       //Redirects to login
				   $this->manage_clients();
				  }
 		}
 	}

 	public function manage_clients(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$data_to_view['clients'] = $this->Adminmodel->get_all_clients();	   
	   		$data_to_view['page'] = "manage_clients.php";
	   		$data_to_view['page_title'] = "Manage Clients";
	   		$data_to_view['active_page'] = "Manage Clients";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}



 	}
 	
 	public function delete_client($client_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$this->Adminmodel->delete_client($client_id);
 			$this->manage_clients();
 		}

 	}
 	

 	
 	public function new_payment(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$data['clients_details'] = $this->Adminmodel->get_all_clients();
 			$data['package_details'] = $this->Adminmodel->get_all_package_details();
 			
 			$data['page_title'] = 'New Payment';
 			$data['page'] = 'new_payment_form.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	public function submit_new_payment(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$this->load->helper(array('form', 'url'));

                
 
        		$this->load->model('Adminmodel');
        		$this->load->library('form_validation');
				  

				  if($this->form_validation->run())
				  {
				  	$data['clients_details'] = $this->Adminmodel->get_all_clients();
		 			$data['package_details'] = $this->Adminmodel->get_all_package_details();
		 			
		 			$data['page_title'] = 'New Payment';
		 			$data['page'] = 'new_payment_form.php';
		 			
				  	$data['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data['page_title'] = 'New Payment';
 					$this->load->view('admin/index.php',$data);


				  }
				  else
				  {

				  	$client_email = $this->input->post('user_email');

				  	$data_to_clients_table = array(
	                  'package_id'=>$this->input->post('package_id'),
	                  'package_start_date'=>$this->input->post('package_start_date'),
	                  'package_end_date'=>$this->input->post('package_end_date'),            
	                  'original_package_amount'=>$this->input->post('amount'),
	                  'remaining_package_amount'=>$this->input->post('amount'),
	                  'status'=>"active"
	                  	
			         );
				  
		
				  	$data_to_model = array(
	                  'user_email'=>$this->input->post('user_email'),
	                  'method'=>$this->input->post('payment_mode'),
	                  'payment_date'=>$this->input->post('payment_date'),
	                  'transaction_id'=>$this->input->post('transaction_id'),
	                  'package_id'=>$this->input->post('package_id'),
	                  'package_start_date'=>$this->input->post('package_start_date'),
	                  'package_end_date'=>$this->input->post('package_end_date'),
	                  'original_package_amount'=>$this->input->post('amount'),
	                  'payment_for'=>"Package Subscription"
			         );

				  	
				 

				   $this->Adminmodel->save_payment($data_to_model);
				   $this->Adminmodel->update_client_payment_data($data_to_clients_table,$client_email);


				    //display success message
                 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Payment has been saved successifully</div>');
       //Redirects to login
				   $this->manage_payments();
				  }
 		}
 	}
 	
 	public function credit_account(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$data['credit_account_details'] = $this->Adminmodel->get_all_clients_for_crediting();
 			//$data['package_details'] = $this->Adminmodel->get_all_package_details();
 			
 			$data['page_title'] = 'Credit Account';
 			$data['page'] = 'credit_account.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}
 	
 	public function save_credit_account_details(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$this->load->helper(array('form', 'url'));


                
 
        		$this->load->model('Adminmodel');
        		$this->load->library('form_validation');


        		$this->form_validation->set_rules('client_id', 'Client','required');
 				$this->form_validation->set_rules('amount', 'Credit Amount','required');
 				$this->form_validation->set_rules('transaction_id', 'Transaction Id','required');


				  if(!$this->form_validation->run())
				  {
				  	
				  	$data['credit_account_details'] = $this->Adminmodel->get_all_clients_for_crediting();	
		 			$data['page_title'] = 'Credit Account';
		 			$data['page'] = 'credit_account.php';
		 			$this->load->view('admin/index.php',$data);




				  }
				  else
				  {

				  	$client_id = $this->input->post('client_id');

				  	$amount_from_form = $this->input->post('amount');
				  	$client_email = $this->input->post('user_email');
				  	


				  	$array = array('client_id' => $client_id);
					$this->db->where($array);
					$q =$this->db->get('users');
					$data = $q->result_array();
					$remaining_amount = $data[0]['remaining_package_amount'];
					

					$amount_after_crediting = $remaining_amount + $amount_from_form;
					//echo $amount_after_crediting;
					
					$credit_date = date('d-m-Y H:i');
					
					
					
					$data_to_credits = array(	                  
	                  'remaining_package_amount'=>$amount_after_crediting 
	                                  

			         );
					


				  	$data_to_model = array(	                  
	                  'method'=>$this->input->post('payment_mode'),
	                  'payment_date'=>$credit_date,
	                  'transaction_id'=>$this->input->post('transaction_id'),
	                  'package_id'=>$this->input->post('package_id'),
	                  'payment_for'=>"Crediting",	                  
	                  'original_package_amount'=>$this->input->post('amount'),
	                  'user_email'=>$this->input->post('user_email'),
	                  'payment_for'=>"Crediting"
			         );
			         
			         
				
				 

				   $this->Adminmodel->save_credit_payment($data_to_credits,$client_email);
				   $this->Adminmodel->save_payment($data_to_model);


				    //display success message
                 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Payment has been saved successifully</div>');
       //Redirects to login
				   $this->manage_payments();
				  }
 		}
 	}
 	
 	

 	public function submit_new_article(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			if(!isset($_POST)){
 				$this->add_report();
 			}else{

 				$upload_path = "./assets/new_article_images/";
 				$allowed_types = 'png|jpg|jpeg|gif';

 				$datareturned = $this->upload_file("article_image",$upload_path,$allowed_types);
						
 				
 				
 				if(isset($datareturned['error'])){
 					$data_to_view['server_reply_file'] = "<div class='alert alert-danger'>".$datareturned['error']."</div>";		
 					$data_to_view['page'] = 'latest_articles.php';
 					$data_to_view['page_title'] = 'Add New Article';
 					/* print_r($data_to_view);
 					die();*/

 			        $this->load->view('admin/index.php',$data_to_view);
 			       

 			        return;





 				}else{

 				// validate other inputs
 				$this->form_validation->set_rules('article_heading', 'Article Title','required|trim');
 				$this->form_validation->set_rules('article_description', 'Article Description','required|max_length[600]|trim');
 				$this->form_validation->set_rules('date_added', 'Date added','required|trim');
 				

 				if(!$this->form_validation->run()){
 			
 			        $data_to_view['server_reply'] =  "<div class='alert alert-warning'>".validation_errors()."</div>";
 					$data_to_view['page'] = 'latest_articles.php';
 					$data_to_view['page_title'] = 'Add New Article';
 					
 			        $this->load->view('admin/index.php',$data_to_view);

 			        return;

 				}
 				else{
 					// current time for date added and modified 
 					//$date = date("Y-m-d",time());



 		
 					$data_to_model = array(
	                  'article_heading'=>$this->input->post('article_heading'),
	                  'article_description'=>$this->input->post('article_description'),
	                  'article_image_path'=>$datareturned['upload_data']['file_name'],
	                  'link'=>$this->input->post('link'),
	                  'file_type'=>$datareturned['upload_data']['file_ext'],
	                  'date_added'=>$this->input->post('date_added')	                  
			         );
 					

                   $this->Adminmodel->add_latest_article($data_to_model);

                   $this->latest_articles();


 				}


 			}

 				
 		}
 			
 	  }
 	}


 	public function manage_payments(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$data_to_view['payments'] = $this->Adminmodel->get_payment_details();	   
 			/*print_r($data_to_view['payments']);
 			die();*/

	   		$data_to_view['page'] = "manage_payments.php";
	   		$data_to_view['page_title'] = "Manage Payments";
	   		$data_to_view['active_page'] = "Manage Payments";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}



 	}

 	public function edit_payment($payment_id =""){

	   	if(null == $this->session->userdata('user_email')){
	   		$this->index();
	   	}
	   	else{
	   		// load report details
	   		$data_to_view['payment_details'] = $this->Adminmodel->get_payment_details_for_editing($payment_id);
	   		$data_to_view['page_title'] = "Edit Payment";
	   		$data_to_view['page'] = "edit_payment.php";
	   		$this->load->view('admin/index.php',$data_to_view);


	   	}
   }

   public function gold_package(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$package_id = 3;
 			$data['package'] = $this->Adminmodel->get_package_details($package_id);
 			$data['page_title'] = 'Gold Package';
 			$data['page'] = 'packages.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	 public function platinum_package(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$package_id = 2;
 			$data['package'] = $this->Adminmodel->get_package_details($package_id);
 			$data['gold_package'] = $this->Adminmodel->get_all_clients();
 			$data['page_title'] = 'Platinum Package';
 			$data['page'] = 'packages.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	 public function bronze_package(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$package_id = 1;
 			$data['package'] = $this->Adminmodel->get_package_details($package_id);
 			$data['gold_package'] = $this->Adminmodel->get_all_clients();
 			$data['page_title'] = 'Bronze Package';
 			$data['page'] = 'packages.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	
 	public function update_package(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$this->load->helper(array('form', 'url'));

                
 
        		$this->load->model('Adminmodel');
        		$this->load->library('form_validation');

				  
			  // field name, error message, validation rules
    		  $this->form_validation->set_rules('package_name', 'Package Name', 'required');	
			  $this->form_validation->set_rules('package_amount', 'Package Amount', 'required');
			  $this->form_validation->set_rules('discount', 'Package Discount', 'required');
			  $this->form_validation->set_rules('package_features', 'Package Features', 'required|min_length[10]');

			  $package_id = $this->input->post('package_id');
		
				  if($this->form_validation->run() != TRUE)
				  {
				   $this->gold_package();

				   echo "Validation errors";

				  }
				  else
				  {


				  	$data_to_model = array(
	                  'package_title'=>$this->input->post('package_name'),
	                  'package_cost'=>$this->input->post('package_amount'),
	                  'package_discount'=>$this->input->post('discount'),
	                  'package_features'=>$this->input->post('package_features')
	                  
			         );

				   $this->Adminmodel->update_package($data_to_model, $package_id);

				    //display success message
                 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">PPackage has been updated</div>');
       
				   $this->gold_package();
				  }
 		}
 	}
 	
 	public function latest_articles(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$data['page_title'] = 'Add New Article';
 			$data['page'] = 'latest_articles.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}
 	
 	public function view_latest_articles(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{

 			$data_to_view['articles'] = $this->Adminmodel->get_articles();	   
	   		$data_to_view['page'] = "manage_articles.php";
	   		$data_to_view['page_title'] = "Manage Latest Articles";
	   		$data_to_view['active_page'] = "Manage Latest Articles";
	   		$this->load->view('admin/index.php',$data_to_view);
 		}



 	}

 	public function delete_article($article_id){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			
 			
 			$this->Adminmodel->delete_article($article_id);
 			$this->view_latest_articles();
 		}

 	}
 	
 	
 	



 	public function about_us_edit(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$content_id =1;
 			
 			$data['content'] = $this->Adminmodel->get_front_end_details($content_id);
 			$data['page_title'] = 'About Us Edit';
 			$data['content_name'] = 'About us';
 			$data['page'] = 'front_end_content.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	public function industry_analysis_edit(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$content_id =2;
 			
 			$data['content'] = $this->Adminmodel->get_front_end_details($content_id);
 			$data['page_title'] = 'Industry Analysis Edit';
 			$data['content_name'] = 'Industry Analysis Edit';
 			$data['page'] = 'front_end_content.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	public function sector_studies_edit(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$content_id =3;
 			
 			$data['content'] = $this->Adminmodel->get_front_end_details($content_id);
 			$data['page_title'] = 'Sector Srudies Edit';
 			$data['content_name'] = 'Sector SStudies Edit';
 			$data['page'] = 'front_end_content.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	public function corporate_research_edit(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			$content_id =4;
 			
 			$data['content'] = $this->Adminmodel->get_front_end_details($content_id);
 			$data['page_title'] = 'Corporate Research Edit';
 			$data['content_name'] = 'Corporate Research Edit';
 			$data['page'] = 'front_end_content.php';
 			$this->load->view('admin/index.php',$data);
 		}
 	}

 	
 	public function update_front_end_content(){
 		if(null == $this->session->userdata('user_email')){
 			$this->index();
 		}else{
 			 			
 			 	$this->load->model('Adminmodel');
        		$this->load->library('form_validation');

			  $this->form_validation->set_rules('content_data', 'Front end Content', 'required');

			  $content_id = $this->input->post('content_id');

			 
		
				  if($this->form_validation->run() != TRUE)
				  {
				   $this->admin_dashboard();

				  }
				  else
				  {


				  	$data_to_model = array(
	                  'content_data'=>$this->input->post('content_data')
	                  
	                  
			         );

				   $this->Adminmodel->update_front_end_content($data_to_model, $content_id);

				    //display success message
                /* $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">PPackage has been updated</div>');*/
       
				   $this->admin_dashboard();
				  }
 		}
 	}







 }