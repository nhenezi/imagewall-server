<?php

class Picture extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('mymodel');
    $this->output->set_content_type('application/json');
  }

  public function getByPrefix($prefix = NULL)
  {
    if ($prefix == NULL)
    {
      $this->output->set_output(json_encode($this->mymodel->get_all()));
    }
    else
    {
      $this->output->set_output(json_encode($this->mymodel->get_by_prefix($prefix)));
    }
  }

  public function getLatest($limit) {
    $this->output->set_output(json_encode($this->mymodel->get_latest($limit)));
  }
  
  public function getAfter($id, $limit)
  {
    $this->output->set_output(json_encode($this->mymodel->get_after($id, $limit)));
  }
}

?>
