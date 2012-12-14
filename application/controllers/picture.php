<?php

class Picture extends CI_Controller{

  public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
  	$this->load->model('mymodel');
	}

  public function index()
  {
    $this->load->view('imagewall_site', array('error' => ' ','value' => 'HELLOOOOOOOOO','data' => array() ));
  }
  
  public function loadWithPrefix($prefix = NULL)
  {
    if ($prefix == NULL)
    {
      $data = $this->mymodel->get_all();
      $query = array('error' => "No prefix",'value' =>"",'data' => $data );
			$this->load->view('imagewall_site', $query);
    }
    else
    { 
      $data = $this->mymodel->get_by_prefix($prefix);
      $this->load->view('imagewall_site', array('error' => ' ','value'=>' ' ,'data' => $data ));
    }
  }
  public function News($id, $limit)
  {
    $data = json_encode($this->mymodel->get_latest_news($id, $limit));
    $this->output
    ->set_content_type('application/json')
    ->set_output($data);

#    $this->load->view('imagewall_site', array('error' => ' ','value'=>' ' ,'data' => $data ));
  }
}
?>
