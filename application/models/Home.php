<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Model {

	public function get_homepage_details(){

		$data_to_return['slider_details'] = $this->db->get('slider_details')->result_array();
		$data_to_return['after_slider'] = $this->db->get('after_slider')->result_array();
		$data_to_return['summary_texts'] = $this->db->get('frontend_content')->result_array();
		$data_to_return['packages'] = $this->db->get('packages')->result_array();
		

		return $data_to_return;
	}

	function get_content($content_id){

		$content_details = $this->db->get_where('frontend_content',array('content_id'=>$content_id));

		return $content_details->result_array();
	}


}