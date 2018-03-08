<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Agents extends MY_Controller 
{
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('agencies_model');
 		$this->load->helper(array('form', 'url'));
 		$this->load->model('agent_model');
 		$this->load->model('properties_model');
 	}

 	public function index()
	{
		$data['agents'] = $this->agent_model->get_all();

		//count total properties
		foreach ($data['agents'] as $key => $value) 
		{
			//$temp = $this->agencies_model->count_properties($value['id']);
			$data['agents'][$key]['properties'] =  2;//$temp; 
		}
		$data['content'] = $this->load->view('agents/index', $data, TRUE);
		$this->load->view('layout/default', $data);
	}

	/**
	 * This function is to get all data of perticular project
	 * @param  [integer] $id
	 * @return [boolean]     
	 */
	public function get_by_id($id)
	{
		if($this->input->post())
		{
			$data = array(
					'name' => $this->input->post('name'),
				    'subject' => $this->input->post('subject'),
				    'message' => $this->input->post('message')
					);
			//$this->agencies_model->add($data);
			redirect($this->session->userdata('referred_from'), 'refresh');
		}
		else
		{
			$data['properties'] = $this->properties_model->get_data('',0, 3);
			$data['agent'] = $this->agent_model->get_by_id($id);
			$properties = $this->agent_model->get_properties($id);
			$property = array();
			foreach ($properties as $key => $value) 
			{
				$temp = $this->properties_model->get_by_id($value['pro_id']);
				array_push($property, $temp);
			}

			
			$data['agent']['properties'] = $property;
			$data['content'] = $this->load->view('agents/agent', $data, TRUE);
			$this->load->view('layout/default', $data);
			$this->session->set_userdata('referred_from', current_url());
		}
	}
 
 }
 
 /* End of file agencies.php */
 /* Location: ./application/controllers/agencies.php */ ?> 