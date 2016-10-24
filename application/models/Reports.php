<?php
  
  /**
  * 
  */
  class Reports extends CI_Model
  {

  	function get_industry_reports(){  		
      $this->db->order_by('year_published','DESC');
      $this->db->where('category_id',1);
  		return $this->db->get('reports')->result_array();
  	}
    function get_sector_reports(){

      $this->db->order_by('year_published','DESC');
      $this->db->where('category_id',2);
      return $this->db->get('reports')->result_array();

    }
    function get_corporate_reports(){
     $this->db->order_by('year_published','DESC');
      $this->db->where('category_id',3);
      return $this->db->get('reports')->result_array();
    }
    
     function get_latest_reports(){


      $this->db->select('*');
      $this->db->from('reports');
      $this->db->order_by('date_added', 'desc');
      $this->db->limit(6);
      $latest_reports = $this->db->get();

      return $latest_reports->result_array();

    }

    function get_latest_articles(){


      $this->db->select('*');
      $this->db->from('articles');
     $this->db->order_by('article_id', 'desc');
      $this->db->limit(5);
      $latest_reports = $this->db->get();

      return $latest_reports->result_array();

    }
  	
  }