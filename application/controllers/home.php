<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('properties_model');
	}
	
	public function index()
	{
		$data['properties'] = $this->properties_model->get_data('',0,8);
		$total = $this->properties_model->total_row_count();
		$data['remaining_properties'] = $this->properties_model->get_data('',8,$total-4);
		$data['content'] = $this->load->view('home/index', $data, TRUE);
		$this->load->view('layout/default', $data);
	}
}
