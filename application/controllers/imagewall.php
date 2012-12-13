<?php

class Imagewall extends CI_Controller{

  function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

  function index()
  {
    $this->load->view('imagewall_site', array('error' => ' ','value' => 'HELLOOOOOOOOO' ));
  }
  
  function loadWithPrefix($prefix = NULL)
  {
    if ($prefix == NULL)
    {
      $error = array('error' => "No prefix",'value' => '');
			$this->load->view('imagewall_site', $error);
    }
    else
    { // napravit citanje iz baze prema zadanom prefiksu
       $error = array('error' => "",'value' => 'ipak proslo');
			$this->load->view('imagewall_site', $error);
    }
  }
}
?>
