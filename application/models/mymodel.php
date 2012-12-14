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
    if($prefix == NULL)
    {
      $this->get_all(); 
    }
    else
    {
    $this->db->select('*');
    $this->db->from('picture');
    $this->db->where('event.prefix',$prefix);
    $this->db->join('event', 'picture.id = event.id');
    $query = $this->db->get();  
    }
    
    return $query->result();
  }
}


?>


