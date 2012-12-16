<?php

class Tag extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->output->set_content_type('application/json');
    $this->load->model('tag_model');
  }

  /**
   * Returns all events close to current location
   *
   * @param xcoordinate
   * @param ycoordinate
   */
  function getClose($xcoordinate = NULL, $ycoordinate = NULL)
  { 
    if ($xcoordinate == NULL || $ycoordinate == NULL)
    {
       $this->output->set_output(json_encode(array()));
    }
    else
    {
      $this->output->set_output(json_encode($this->tag_model->get_close($xcoordinate, $ycoordinate)));
    }
  }

  function getNewest($limit = 5)
  {
    $this->output->set_output(json_encode($this->tag_model->get_newest($limit)));
  }
}
