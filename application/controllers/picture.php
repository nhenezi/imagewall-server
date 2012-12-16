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
   * Returns latests pictures (based on id)
   * /picture/:limit/:tag
   *
   * @param $limit number of pictures to return
   * @param $tag filter by tag
   */
  public function getLatest($limit = 5, $tag = '') {
    $this->output->set_output(json_encode($this->picture_model->get_latest($limit, $tag)));
  }
  
  /**
   * Returns $limit pictures before (as uploaded before) $id
   * /picture/:id/:limit/:tag
   *
   * @param $id starting id
   * @param $limit number of pictures to return
   * @param $tag filter by tag
   */
  public function getBefore($id, $limit = 5, $tag = '')
  {
    $this->output->set_output(json_encode($this->picture_model->get_before($id, $limit, $tag)));
  }

  /**
   * Returns $limit pictures after (as uploaded after) $id
   * /picture/:id/:limit/:tag
   *
   * @param  $id starting id
   * @param $limit number of pictures to return
   * @param $tag filter by tag
   */
  public function getAfter($id, $limit = 5, $tag = '')
  {
    $this->output->set_output(json_encode($this->picture_model->get_after($id, $limit, $tag)));
  }

}

