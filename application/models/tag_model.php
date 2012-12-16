<?php

class Tag_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Returns all events close to current location
   *
   * @param xcoordinate
   * @param ycoordinate
   * @return array of strings
   */
  public function get_close($xcoordinate, $ycoordinate)
  {
    $query = array('x >' => $xcoordinate - 5,
                   'x <' => $xcoordinate + 5,
                   'y >' => $ycoordinate - 5,
                   'y <' => $ycoordinate + 5);
    
    $this->db->select('name')->from('tag')->where($query);
    $data = $this->db->get();
    $arr = array();
    foreach ($data->result() as $row) {
      $arr[] = $row->name;
    }
    return $arr;
  }

  /**
   * Returns all events close to current location
   *
   * @param $limit number of tags to send
   */
  public function get_newest($limit) {
    return $this->db->select('*')->from('tag')->order_by('id', 'desc')->limit($limit)->get()->result();
  }
}

