<?php

class Upload extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
  }

  function index()
  {
    $this->load->view('upload_form', array('error' => ' ' ));
  }

  /**
   * Receives images from client
   * picture, picture_name, coordinates.
   */
  function uploadImage()
  {
    $config['upload_path'] = './images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']	= '100';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';
    $this->load->library('upload', $config);
    var_dump($this->upload->data());
    var_dump($_POST);
    var_dump($_FILES);

/*
    if (!$this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('upload_form', $error);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
      $this->load->view('upload_success', $data);
    }*/
  }
}
?>
