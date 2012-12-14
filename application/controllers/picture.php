<?php

class Picture extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('mymodel');
  }

  public function getByPrefix($prefix = NULL)
  {
    if ($prefix == NULL)
    {
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($this->mymodel->get_all()));
    }
    else
    {
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($this->mymodel->get_by_prefix($prefix)));
    }
  }
  
  public function getLatest($id, $limit)
  {
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($this->mymodel->get_latest_news($id, $limit)));
  }
}

?>
