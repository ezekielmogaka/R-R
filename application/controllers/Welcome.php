<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->model('Reports');
		$this->load->model('Home');
		$this->load->helper('myurihelper_helper');

	}

	
	public function index(){
		$this->load->model('Home');

		$data['active'] = "home";
		$data['content'] = "home";
		
		$data['homepage_data'] =  $this->Home->get_homepage_details();
		$data['reports_latest'] = $this->Reports->get_latest_reports();
		$data['latest_articles'] = $this->Reports->get_latest_articles();
		$data['homepage_data'] =  $this->Home->get_homepage_details();
		$data['specific_css'] = array('admin/style.css');
		$data['specific_scripts'] = array(
			'front_homepage/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js',
			'front_homepage/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js',
			'front_homepage/revulation-slide.js',
			'front_homepage/custom_homepage.js',

			
			);
		$this->load->view('index',$data);
	}
	
	public function error(){ 
        $this->output->set_status_header('404'); // setting header to 404

        
		$data['content'] = "pagenotfound";
		
		$data['page_title'] = "Not Found";
	    
	    $this->load->view('index',$data);
       
    } 




	public function industry(){

		$data['active'] = "industry";
		$data['content'] = "reports";
		$data['report_part'] = 1;
		$data['page_title'] = "Industry Reports";
		$data['reports'] = $this->Reports->get_industry_reports();	
		$data['industry_reports'] = $this->Reports->get_industry_reports();	
		$data['sector_reports'] = $this->Reports->get_sector_reports();	
		$data['corporate_reports'] = $this->Reports->get_corporate_reports();	
		$data['specific_scripts'] = array(
			'custom/navigate_reports.js',
			'datatable/jquery.dataTables.min.js',
			'datatable/DT_bootstrap.js',
			'datatable/customise_datatable.js'
			);
		$this->load->view('index',$data);

	}
	public function sector(){
		$data['active'] = "sector";
		$data['content'] = "reports";
		$data['report_part'] = 2;
		$data['page_title'] = "Sector Reports";
		$data['reports'] = $this->Reports->get_sector_reports();
		$data['industry_reports'] = $this->Reports->get_industry_reports();	
		$data['sector_reports'] = $this->Reports->get_sector_reports();	
		$data['corporate_reports'] = $this->Reports->get_corporate_reports();	
		$data['specific_scripts'] = array(
			'custom/navigate_reports.js',
			'datatable/jquery.dataTables.min.js',
			'datatable/DT_bootstrap.js',
			'datatable/customise_datatable.js'
			);			
		$this->load->view('index',$data);

	}
	public function corporate(){
		$data['active'] = "corporate";
		$data['content'] = "reports";
		$data['report_part'] = 3;
		$data['page_title'] = "Corporate Reports";
		$data['reports'] = $this->Reports->get_corporate_reports();	
		$data['industry_reports'] = $this->Reports->get_industry_reports();	
		$data['sector_reports'] = $this->Reports->get_sector_reports();	
		$data['corporate_reports'] = $this->Reports->get_corporate_reports();	
		$data['specific_scripts'] = array(
			'custom/navigate_reports.js',			
			'datatable/jquery.dataTables.min.js',
			'datatable/DT_bootstrap.js',
			'datatable/customise_datatable.js'
			);		
		$this->load->view('index',$data);

	}
	public function add_to_cart(){


		$anchor = $this->encrypt->decode($this->input->get('anchor_element'));
		$datetime = $this->input->get('date_time');

		if(null != $this->session->userdata('to_cart_files')){
			$to_cart_files = explode(':>>', $this->session->userdata('to_cart_files'));
			$number_of_elements = count($to_cart_files);
			if(array_search($anchor, $to_cart_files) === FALSE){
				$this->session->set_userdata('to_cart_files', $this->session->userdata('to_cart_files').':>>'.$anchor);
			$this->session->set_userdata('time_added',$this->session->userdata('time_added').':>>'.$datetime);
			$this->session->set_userdata('cart_count', $this->session->userdata('cart_count') + 1);

			$data_to_view = $number_of_elements + 1;

			}
			else{
				$data_to_view = $number_of_elements;

			}
			
		}else{
			$this->session->set_userdata('to_cart_files',$anchor);
			$this->session->set_userdata('time_added', $datetime);
			$this->session->set_userdata('cart_count', 1);
			$data_to_view = 1;
		}


		// echo $data_to_view;
		echo json_encode($data_to_view);


	}

	public function see_more(){

		$data['active'] = "reports";
		$data['content'] = "sample_report";
		$data['page_title'] = "Report Title Sample";
		// $data['json_encoded']
		$this->load->view('index',$data);


	}

	public function buy_full(){

		$data['active'] = "reports";
		$data['content'] = "buy_report";
		$data['page_title'] = "Buy Report";

		$this->load->view('index',$data);
	}

	public function contact(){

		$data['active'] = "contactus";
		$data['content'] = "contact";
		$data['page_title'] = "Contact Us";

		$this->load->view('index',$data);
	}

	public function about(){
		$content_id = 1;
		$data['active'] = "aboutus";
		$data['content'] = "about";
		$data['contents'] = $this->Home->get_content($content_id);
		$data['page_title'] = "About Us";		

		$this->load->view('index',$data);
	}			


    public function __encrip_password($password)
    {
        return md5($password);
    }

    public function show_login( $show_error = false ) {
    	$data['active'] = "login";
		$data['content'] = "login";
		$data['submit_url'] = "welcome/login";
		$data['page_title'] = "Login";
	    $data['error'] = $show_error;

	    $this->load->view('index',$data);
    }


	
	public function login()
    {

		$this->load->model('user_model');

		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');

		if($this->form_validation->run()){

			$email=$this->input->post('email');
			$password=md5($this->input->post('password'));
			$result=$this->user_model->login($email,$password);

 				if(gettype($result) == "string"){
 					$data['server_reply'] = "<div class='alert alert-danger'><i class='fa fa-warning'></i>".$result."</div>";
 					$data['active'] = "login";
					$data['content'] = "login";
					$data['submit_url'] = "Welcome/login";
					$data['page_title'] = "Login";
	    	

				    $this->load->view('index',$data);
 					
 				}else{

 					$sessionData = array(
 						             'user_email'=>$this->input->post('email'),
 						             'names'=>$result['clientNames'],
 						             'contact_person'=>$result['contactPerson'],
 						             'client_phone'=>$result['phone']
 						             );
 					$this->session->set_userdata($sessionData);

 					 $this->index();

 				}
		

		}else{

			$server_reply = "<div class='alert alert-warning'>".validation_errors()."</div>";
			$this->show_login($server_reply);

		}
				
      }      




	public function logout()
	 {
	  $newdata = array(
	  'user_email'   =>'',
	  'user_name'  =>'',
	  'to_cart_files'=>'',
	  'time_added'=>'',
	  'cart_count'=>'',
	  'logged_in' => FALSE,
	  );
	  $this->session->unset_userdata($newdata );
	  $this->session->sess_destroy();
	  redirect(base_url().'welcome', 'refresh');
	 }
	 public function view_report_sample(){
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
			        header("Content-Disposition: inline; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
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
	 
	 
	  /**
	 * Forgot password page
	 */
	public function forgot()
	{
		// Redirect to your logged in landing page here
		/*if(null != $this->session->userdata('user_email'){
		 $this->index();
		}*/
		 
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;
		
		 
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run()){
			$email = $this->input->post('email');

			
			$this->load->model('User_model');
			$user = $this->User_model->get_user_by_email($email);
			if($user == FALSE){
			// Display error message
			$this->session->set_flashdata('flashWarning', 'User with that Email Not Found. Check your email again');
			$data['active'] = "login";
			$data['content'] = "login";
			$data['submit_url'] = "welcome/login";
			$data['page_title'] = "Login";


		
		$this->load->view('index', $data);

			}
			else{
			$slug = md5($user->client_id . $user->user_email . date('Ymd'));
			$this->load->library('email');
			

			$to      = $this->input->post('email');
			$subject = 'Reset your Password';
			$message = 'To reset your password please click the link below and follow the instructions:
      
			'.site_url('welcome/reset/'. $user->client_id .'/'. $slug) .'
			If you did not request to reset your password then please just ignore this email and no changes will occur. \r\n.
			Note: This reset code will expire after '. date('j M Y') .'.';	
			$headers  = 'MIME-Version: 1.0' . "\r\n";
 			$headers .= "From: nonreplyinfo@researchandratings.co.ke \r\n"."X-Mailer: php";
 			$headers .= "Reply-To: info@researchandratings.co.ke \r\n"."X-Mailer: php";

			mail($to, $subject, $message, $headers);



			// Display success message
			$this->session->set_flashdata('flashSuccess', 'Check Your Email To reset Your Password');
			
			
			$data['success'] = true;
			$data['active'] = "login";
			$data['content'] = "login";
			$data['submit_url'] = "welcome/login";
			$data['page_title'] = "Login";


		
		$this->load->view('index', $data);
			
		}
	}
			
	}


public function reset()
  {
    // Redirect to your logged in landing page here
   // if(logged_in()) redirect('auth/dash');
     
    
    $data['success'] = false;
     
    $user_id = $this->uri->segment(3);
    if(!$user_id) show_error('Invalid reset code.');
    $hash = $this->uri->segment(4);
    if(!$hash) show_error('Invalid reset code.');
    
    $this->load->model('User_model');
    $user = $this->User_model->get_user($user_id);
    if(!$user) show_error('Invalid reset code.');
    $slug = md5($user->client_id . $user->user_email . date('Ymd'));
    if($hash != $slug) show_error('Invalid reset code.');
   
    $data['content'] = 'reset_password';
    $data['client_id'] = $user_id;
    
    
    
    $this->load->view('index', $data);
  }
  public function update_password(){
	$this->load->library('form_validation');
    $this->load->helper('form');

	$this->form_validation->set_rules('password', 'Password', 'required');
    //$this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');

    $pass=md5($this->input->post('password'));
    $user_id=$this->input->post('user_id');
  
    
	 if($this->form_validation->run()){

	 	$data_to_model = array(
	                  'password'=>$pass
	                  
			         );


      $this->load->model('User_model');
      $this->User_model->update_password($data_to_model,$user_id);
      $data['success'] = true;
      $this->show_login();


    }
}
  
  
	 public function request_registration(){
	 	print_r($_SESSION);
	 }



}