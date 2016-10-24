<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }
  function login($email,$password)
 {
  $check_client_exists = $this->db->get_where('users',array('user_email'=>$email,'password'=>$password));

    if($check_client_exists->num_rows() > 0){

      $data_to_return['clientNames'] = $check_client_exists->row()->clientNames;
      $data_to_return['contactPerson'] = $check_client_exists->row()->contactPerson;
      $data_to_return['phone'] = $check_client_exists->row()->phone;


    }
    else{

      $data_to_return = "No Client with such credentials in our System. Recheck your details and Try again";
    }

    return $data_to_return;
 }
 
  public function get_user_by_email($email)
  {
    $query = $this->db->get_where("users", array('user_email' => $email));

    if($query->num_rows()) return $query->row();
    return false;
  }

  public function get_user($user_id)
  {
    $query = $this->db->get_where("users", array('client_id' => $user_id));
    if($query->num_rows()) return $query->row();
    return false;
  }
  
  function update_password($data_to_model,$user_id){


     $this->db->where('client_id',$user_id);
     $this->db->update('users',$data_to_model);

     return True;

  }




}