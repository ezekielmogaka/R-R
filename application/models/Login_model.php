
<?php
Class Login_model extends CI_Model
{
  var $details;
 function validate($email,$password)
       {

    $this->db->where('email', $email);
    $this->db->where('password', $password);
    
    // Run the query
    $query = $this->db->get('users');
    // Let's check if there are any results
    if($query->num_rows() == 1)
    {
      // If there is a user, then create session data
    
      return $query->result_array();
    }
    // If the previous process did not validate
    // then return false.
    return false;
  }
 


 function set_session() {
    // session->set_userdata is a CodeIgniter function that
    // stores data in a cookie in the user's browser.  Some of the values are built in
    // to CodeIgniter, others are added (like the IP address).  
          $this->session->set_userdata( array(
            'user_id'=>$this->details->user_id,
            'name'=> $this->details->firstname . ' ' . $this->details->lastname,
            'email'=>$this->details->email,
            'isLoggedIn'=>true
        )
    );
}
}
?>
