<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
	}
	public function index()
	{
		if($this->input->post())
		{
			$data['register'] = array(
						'email' => $this->input->post('email'),
					    'first_name' => $this->input->post('first_name'),
					    'last_name' => $this->input->post('last_name'),
					    'password' => $this->input->post('password'),
					);

			$data['login'] = array(
						'email' => $this->input->post('email'),
					    'password' => $this->input->post('password'),
					    'role' => 0
					);

			if($this->register_model->add($data))
			{
				redirect('login', 'refresh');
			}

		}
		$data['content'] = $this->load->view('register/index','', TRUE);
		$this->load->view('layout/default', $data);
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */