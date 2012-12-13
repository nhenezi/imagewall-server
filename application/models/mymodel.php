<?php

class Mymodel extends CI_Model{  
  
  public function __construct()
  {
    parent::__construct();
  }
  
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('picture');
    $this->db->join('event', 'picture.id = event.id');
    $query = $this->db->get();  
    
    return $query->result();
  }
  
  public function get_by_prefix($prefix = NULL)
  {
    $query = $this->db->get_where('event', array('prefix' => $prefix));
    return $query->result();
  }
}


?>


