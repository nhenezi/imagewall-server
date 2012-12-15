<?php

/**
 * /picture/:method endpoint
 * 
 * Handles all picture related stuff
 * return format is json
 */

class Picture extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('picture_model');
    $this->output->set_content_type('application/json');
  }

  /**
   * Returns all picture with a specified prefix
   * /picture/:prefix
   *
   * @param $prefix picture prefix
   */
  public function getByPrefix($prefix = NULL)
  {
    if ($prefix == NULL)
    {
      $this->output->set_output(json_encode($this->picture_model->get_all()));
    }
    else
    {
      $this->output->set_output(json_encode($this->picture_model->get_by_prefix($prefix)));
    }
  }

  /**
   * Returns latests pictures (based on id)
   * /picture/:limit
   *
   * @param $limit in number of pictures to return
   */
  public function getLatest($limit) {
    $this->output->set_output(json_encode($this->picture_model->get_latest($limit)));
  }
  
  /**
   * Returns $limit pictures before (as uploaded before) $id
   * /picture/:id/:limit
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
  public function getBefore($id, $limit)
  {
    $this->output->set_output(json_encode($this->picture_model->get_before($id, $limit)));
  }

  /**
   * Returns $limit pictures after (as uploaded after) $id
   * /picture/:id/:limit
   *
   * @param  $id starting id
   * @params $limit number of pictures to return
   */
  public function getAfter($id, $limit)
  {
    $this->output->set_output(json_encode($this->picture_model->get_after($id, $limit)));
  }

}

