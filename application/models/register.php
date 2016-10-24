<?
public function add_user()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('firstname'), 'dash', TRUE);
		   

    $data = array(
        
        'firstname' => $this->input->post('firstname'),
        'slug' => $slug,
        'lastname' => $this->input->post('lastname'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('email')

    );

    return $this->db->insert('user', $data);
}
?>
