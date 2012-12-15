<?php

class Mymodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  private function prepareResult($result) {
    foreach ($result as $row) {
      $row->path = base_url().IMAGES.$row->id.'.'.$row->extension;
    }
    return $result;
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('picture');
    $this->db->join('event', 'picture.id = event.id');
    $query = $this->db->get();

    return $this->prepareResult($query->result());
  }

  public function get_by_prefix($prefix = NULL)
  {
    if($prefix == NULL)
    {
      $this->get_all();
    }
    else
    {
      $this->db->select('*')->from('picture')->where('event.prefix =', $prefix);
      $this->db->join('event', 'picture.id = event.id');
      $query = $this->db->get();
    }

    return $this->prepareResult($query->result());
  }

  public function get_latest($limit)
  {
    $this->db->select('*')->from('picture')
      ->order_by('id', 'desc')->limit($limit);
    $query = $this->db->get();

    return $this->prepareResult($query->result());
  }

  public function get_after($id, $limit)
  {
    $this->db->select('*')->from('picture')->where('id <', $id)
      ->order_by('id', 'desc')->limit($limit);
    $query = $this->db->get();
    return $this->prepareResult($query->result());
  }

  public function upload_image($data)
  {

  }
}
