<?php

class Mymodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Modifies query results to fit our needs
   *
   * Adds following virtual properties:
   *  - $path string path to image
   *
   * @param $result instance of $query->result()
   * @return instance of $query->result()
   */
  private function prepareResult($result) {
    foreach ($result as $row) {
      $row->path = base_url().IMAGES.$row->id.'.'.$row->extension;
    }
    return $result;
  }

  /**
   * Returns all pictures with a specified prefix
   */
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('picture');
    $this->db->join('event', 'picture.id = event.id');
    $query = $this->db->get();

    return $this->prepareResult($query->result());
  }

  /**
   * Returns all pictures with a specified prefix
   *
   * @param $prefix picture prefix
   */
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

  /**
   * Returns latests pictures (based on id)
   *
   * @param $limit in number of pictures to return
   */
  public function get_latest($limit)
  {
    $this->db->select('*')->from('picture')
      ->order_by('id', 'desc')->limit($limit);
    $query = $this->db->get();

    return $this->prepareResult($query->result());
  }

  /**
   * Returns $limit pictures before (as uploaded before) $id
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
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
