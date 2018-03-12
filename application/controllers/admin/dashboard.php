<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if(!$this->session->userdata('username'))
		{
			redirect('admin/login');
		}
	}
	public function index()
	{
		//$username = $this->session->userdata('username');
		$data['content'] = array();
		$this->load->view('admin/layout/default', $data);
		$this->session->set_userdata('current_url', current_url());

	}

	public function error()
	{
		$this->load->view('error');
	}

	public function go_back()
	{
			redirect('current_url','refresh');
	}
}
