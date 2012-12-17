<?php

class Upload extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('picture_model');
  }

  /**
   * Receives images from client
   * picture, picture_name, coordinates.
   */
  function index()
  { 
    $config['upload_path'] = 'static/images';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors(),
                     'db_error' => '');
      $this->load->view('upload_form', $error);
    }
    else
    {
      $error = $this->upload->display_errors();
      $data = array('upload_data' => $this->upload->data(),
                    'event' => $_POST['tag'],
                    'coordinate' => array( 'x-coordinate' => $_POST['x'], 
                                           'y-coordinate' => $_POST['y']));
      var_dump($data);
      $db_error = $this->picture_model->upload_image($data);
      $this->load->view('upload_form', array('db_error' => $db_error,
                                             'error' => $error));
    }
  }
}
?>
