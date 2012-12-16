<?php

class Picture_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('image_lib');
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
  private function prepare_result($result) {
    foreach ($result as $row) {
      $row->path = base_url().IMAGES.$row->id.'.'.$row->extension;
    }
    return $result;
  }

  /**
   * Resize picture
   * Creates image in a smaller size in the file where is the original
   *
   * @param $path path to the orginal image
   */
  private function resize_image($path)
  {
    $config['image_library'] = 'gd2';
    $config['source_image'] = $path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = PICTURE_WIDTH;
    $config['height'] = PICTURE_HEIGHT;

    $this->load->library('image_lib', $config);

    if ( ! $this->image_lib->resize())
    {
      var_dump( $this->image_lib->display_errors());
    }
  }

  /**
   * Returns all pictures
   */
  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('picture');
    $this->db->join('event', 'picture.id = event.id');
    $query = $this->db->get();

    return $this->prepare_result($query->result());
  }

  /**
   * Returns all pictures with a specified prefix
   *
   * @param $prefix picture prefix
   */
  public function get_by_prefix($prefix = NULL, $limit = 99)
  {
    if($prefix == NULL)
    {
      $this->get_all();
    }
    else
    {
      $this->db->select('*')->from('picture')->where('event.prefix =', $prefix);
      $this->db->join('event', 'picture.id = event.id')->order_by('picture.id', 'desc')->limit($limit);
      $query = $this->db->get();
    }

    return $this->prepare_result($query->result());
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

    return $this->prepare_result($query->result());
  }

  /**
   * Returns $limit pictures before (as uploaded before) $id
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
  public function get_before($id, $limit)
  {
    $this->db->select('*')->from('picture')->where('id <', $id)
      ->order_by('id', 'desc')->limit($limit);
    $query = $this->db->get();
    return $this->prepare_result($query->result());
  }

  /**
   * Returns $limit pictures before (as uploaded before) $id
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
  public function get_after($id, $limit)
  {
    $this->db->select('*')->from('picture')->where('id >', $id)
      ->order_by('id', 'asc')->limit($limit);
    $query = $this->db->get();
    return $this->prepare_result($query->result());
  }

   //@TODO description
  public function upload_image($data)
  {
    //@TODO define $name and $extension with regex
    $name = substr($data['upload_data']['file_name'],0,
      strlen($data['upload_data']['orig_name']) - strlen($data['upload_data']['file_ext']));
    $extension = substr($data['upload_data']['file_ext'], 1, strlen($data['upload_data']['file_ext']));

    $picture_data = array('name' => $name,
                          'extension' => $extension);

    //@TODO  deja vu problem
    $this->db->insert('picture',$picture_data);
    $id = $this->db->insert_id();

    $event_data = array('id' => $id,
                        'prefix' => $data['event']);

    $this->db->insert('event',$event_data);

    $this->resize_image($data['upload_data']['full_path']);
  }
  
  //@TODO description
  public function get_events($xcoordinate, $ycoordinate)
  {
    $query = array('xcoordinate >' => $xcoordinate - 5,
                   'xcoordinate <' => $xcoordinate + 5,
                   'ycoordinate >' => $ycoordinate - 5,
                   'ycoordinate <' => $ycoordinate + 5);
    
    $this->db->select('prefix')->from('coordinate')->where($query);
    $data = $this->db->get();
    return $data->result();
  }
}
