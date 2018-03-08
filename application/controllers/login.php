<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if($this->input->post())
		{
			$data = array(
							'email' => $this->input->post('email'),
							'password' => $this->input->post('password')
						);
			$result = $this->login_model->check_data($data);
			if($result)
			{
				$this->session->set_userdata('email', $result[0]['email']);
				$this->session->set_userdata('role', $result[0]['role']);
				redirect('home');
			}
		}
		$data['content'] = $this->load->view('login/index','',TRUE);
		$this->load->view('layout/default', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		redirect('home');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */