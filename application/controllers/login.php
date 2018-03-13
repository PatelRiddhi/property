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
							'password' => md5($this->input->post('password'))
						);
			$result = $this->login_model->check_data($data);
			if($result)
			{
				if($result[0]['role'] == 1)
				{
					if($result[0]['is_active'] == 1)
					{
						$this->session->set_userdata('user', $result[0]);
						redirect('home');
					}
					else
					{
						redirect('login');
					}
				}
				else
				{
					$this->session->set_userdata('user', $result[0]);
					redirect('home');
				}
				
			}
		}
		$data['content'] = $this->load->view('login/index','',TRUE);
		$this->load->view('layout/default', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('home');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */