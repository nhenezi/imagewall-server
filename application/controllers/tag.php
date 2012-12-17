<?php

class Tag extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('tag_model');
    $this->output->set_header("Access-Control-Allow-Origin: *");
    $this->output->set_header("Access-Control-Expose-Headers: Access-Control-Allow-Origin");
    $this->output->set_content_type('application/json');
  }

  /**
   * Testing functions for android
   */
  function test($x = 0, $y = 0) {
    $this->output->set_output(json_encode(array($x, $y)));
  }

  function testPost() {
    print_r($_POST);
    print_r($_FILES);
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

  /**
   * Returns newest tags
   *
   * @param $limit number of tags to return
   */
  function getNewest($limit = 5)
  {
    $this->output->set_output(json_encode($this->tag_model->get_newest($limit)));
  }

  /**
   * Returns newer tags then $id
   *
   * @param $id id of latest tag
   * @param $limit number of tags to return
   */
  function getNewer($id, $limit = 5)
  {
    $this->output->set_output(json_encode($this->tag_model->get_newer($id, $limit)));
  }
}
