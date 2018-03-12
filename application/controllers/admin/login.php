<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if($this->input->post())
		{
			$data = array(
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password')
						);
			if($this->admin_model->check_data($data))
			{
				$this->session->set_userdata('username', $data['username']);
				redirect('admin/dashboard');
			}
			else
			{
				redirect('admin');
			}
		}
		else
		{
			$this->load->view('admin/index');
		}
	}

	public function login()
	{
		if($this->input->post())
		{
			
		}
		else
		{
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('admin/login');
	}
}
