<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('properties_model');
	}

	public function index()
	{
		$data['content'] = $this->load->view('properties/index', '', TRUE);
		$this->load->view('layout/default', $data);
	}

}

/* End of file properties.php */
/* Location: ./application/controllers/properties.php */
?>
