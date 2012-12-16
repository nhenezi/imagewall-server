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
   * filters by tag
   *
   */
  private function where_tag($tag) {
    if ($tag !== '')
    {
      //@TODO sanitize input
      $this->db->join('tag', 'picture.tagId = tag.id')->where('tag.name', $tag);
    }
    return $this->db;
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

    if (!$this->image_lib->resize())
    {
      var_dump( $this->image_lib->display_errors());
    }
  }

  /**
   * Returns all pictures
   *
   * @param $tag filter by tag
   */
  public function get_all($tag)
  {
    $this->db->select('*')->from('picture');
    $query = $this->where_tag($tag)->get();

    return $this->prepare_result($query->result());
  }

  /**
   * Returns latests pictures (based on id)
   *
   * @param $limit in number of pictures to return
   */
  public function get_latest($limit, $tag)
  {
    $this->db->select('picture.id, picture.name, extension, tagId')->from('picture');
    $this->where_tag($tag)->order_by('picture.id', 'desc')->limit($limit);
    $query = $this->db->get();
    return $this->prepare_result($query->result());
  }

  /**
   * Returns $limit pictures before (as uploaded before) $id
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
  public function get_before($id, $limit, $tag)
  {
    $this->db->select('picture.id, picture.name, extension, tagId')->from('picture');
    $this->where_tag($tag)->where('picture.id <', $id)->order_by('picture.id', 'desc')->limit($limit);
    $query = $this->db->get();
    var_dump($query);
    return $this->prepare_result($query->result());
  }

  /**
   * Returns $limit pictures before (as uploaded before) $id
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
  public function get_after($id, $limit, $tag)
  {
    $this->db->select('picture.id, picture.name, extension, tagId')->from('picture');
    $this->where_tag($tag)->where('picture.id >', $id)->order_by('picture.id', 'asc')->limit($limit);
    $query = $this->db->get();
    return $this->prepare_result($query->result());
  }

   //@TODO description
  public function upload_image($data)
  {
    $name = substr($data['upload_data']['file_name'],0,
      strlen($data['upload_data']['orig_name']) - strlen($data['upload_data']['file_ext']));
    $extension = substr($data['upload_data']['file_ext'], 1, strlen($data['upload_data']['file_ext']));
    
    $tag = $this->db->get_where('tag', array('name =' => $data['event']))->result();
    if (!empty($tag))
    {
      var_dump($tag);
      $picture_data = array('name' => $name,
                          'extension' => $extension,
                            'tagId' => $tag[0]->id);
      $this->db->insert('picture',$picture_data);
      $id = $this->db->insert_id();
    }
    else
    {
      $tag_data = array('name' => $data['event'],
                        'x' => $data['coordinate']['x-coordinate'],
                        'y' => $data['coordinate']['y-coordinate']);
      $this->db->insert('tag',$tag_data);
      $tag_id = $this->db->insert_id();
      $picture_data = array('name' => $name,
                          'extension' => $extension,
                            'tagId' => $tag_id);
      $this->db->insert('picture',$picture_data);
      $id = $this->db->insert_id();
    }   
    rename($data['upload_data']['full_path'], $data['upload_data']['file_path'].$id.$data['upload_data']['file_ext']);
    $this->resize_image($data['upload_data']['full_path']);
  }
  
}
