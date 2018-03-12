<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agencies extends MY_Controller 
{

	function __construct() 
	{
		parent::__construct();
		$this->load->model('properties_model');
		$this->load->model('agencies_model');
		$this->load->model('agent_model');
		$this->load->model('aminities_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');
		if(!$this->session->userdata('username'))
		{
			redirect('admin/login');
		}
	}

	public function index()
	{
		
	}

}

/* End of file agencies.php */
/* Location: ./application/controllers/admin/agencies.php */