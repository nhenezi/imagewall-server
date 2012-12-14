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
    
    foreach ($query->result() as $row) {
      $row->path = base_url().IMAGES.$row->id.'.'.$row->extension;
    }
    
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
      $this->db->where('event.prefix =',$prefix);
      $this->db->join('event', 'picture.id = event.id');
      $query = $this->db->get();  
    }
    
    foreach ($query->result() as $row) {
      $row->path = base_url().IMAGES.$row->id.'.'.$row->extension;
    }
    
    return $query->result();
  }
  
  public function get_latest_news($id, $limit)
  {
    $this->db->select('*');
    $this->db->from('picture');
    $this->db->where('id >', $id);
    $this->db->limit($limit);
    $query = $this->db->get();
      
    foreach ($query->result() as $row) {
      $row->path = base_url().IMAGES.$row->id.'.'.$row->extension;
    }
    return $query->result();
  }
  
  public function upload_image($data)
  {
    
  }
}

?>


