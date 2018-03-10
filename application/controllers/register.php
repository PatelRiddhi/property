<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('properties_model');
		$this->load->model('aminities_model');
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

			if($this->register_model->register($data))
			{
				redirect('login', 'refresh');
			}
		}
		$data['content'] = $this->load->view('register/index','', TRUE);
		$this->load->view('layout/default', $data);
	}

	public function agency()
	{
		if($this->input->post())
		{
			$data['agency'] = array(
					    'title' => $this->input->post('title'),
					    'description' => $this->input->post('description'),
					    'address' => $this->input->post('address'),
					    'email' => $this->input->post('email'),
					    'website' => $this->input->post('website'),
					    'mobile_no' => $this->input->post('mobile_no'),
					    'facebook_url' => $this->input->post('facebook_url'),
					    'twitter_url' => $this->input->post('twitter_url'),
					    'linkedin_url' => $this->input->post('linkedin_url'),
					    'google_plus_url'=> $this->input->post('google_plus_url'),
					    'vimeo_square_url' => $this->input->post('vimeo_square_url'),
					    'youtube_url' => $this->input->post('youtube_url'),
					    'password' => md5($this->input->post('password'))
						);

			$data['login'] = array(
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post('password')),
						'role' => 1
						);

			if($this->register_model->register($data))
			{
				redirect('login', 'refresh');
			}
		}
		$data['content'] = $this->load->view('agencies/new', '', TRUE);
		$this->load->view('layout/default', $data);
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */