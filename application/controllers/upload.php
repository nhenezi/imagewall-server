<?php

class Upload extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('mymodel');
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
    $config['upload_path'] = 'static/images';
    var_dump($config['upload_path']);
    $config['allowed_types'] = 'gif|jpg|png';
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('upload_form', $error);
    }
    else
    {
      $error = array('error' => $this->upload->display_errors());
      $data = array('upload_data' => $this->upload->data());
      var_dump($data);
      $this->load->view('upload_form', array('data' => $data,
                                             'error' => ''));
      $this->mymodel->upload_image($data);
    }
  }
}
?>
