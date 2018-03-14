<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Agencies extends MY_Controller 
{
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('agencies_model');
 		$this->load->helper(array('form', 'url'));
 		$this->load->model('agent_model');
 		$this->load->model('properties_model');
 		$this->load->model('aminities_model');
 		$this->load->helper(array('form', 'url'));
		//$this->load->library('upload'); 	
	}

 	public function index($start=0)
	{
		$data['agencies'] = $this->agencies_model->get_data('',$start, 4);
		$config = $this->config1();
		$config["base_url"] = base_url() . "agencies/index";
		$config["total_rows"] = $this->agencies_model->total_row_count();
		$config["per_page"] = 4;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		//count total properties
		foreach ($data['agencies'] as $key => $value) 
		{
			//$temp = $this->agencies_model->count_properties($value['id']);
			$data['agencies'][$key]['properties'] =  2;//$temp; 
		}
		$data['properties'] = $this->properties_model->get_data('',$start, 3);
		$data['content'] = $this->load->view('agencies/index', $data, TRUE);
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
			$data['agency'] = $this->agencies_model->get_by_id($id);
			$properties = $this->agencies_model->get_properties($id);
			$property = array();

			//This is for to get properties for perticular agency
			foreach ($properties as $key => $value) 
			{
				$temp = $this->properties_model->get_by_id($value['pro_id']);
				array_push($property, $temp);
			}
			$data['agency']['properties'] = $property;

			//This is for to get agents for perticular agency
			$agents = $this->agencies_model->get_agents($id);
			$agent = array();
			foreach ($agents as $key => $value) 
			{
				$temp = $this->agent_model->get_by_id($value['agent_id']);
				array_push($agent, $temp);
			}
			$data['agency']['agents'] = $agent;
			$data['content'] = $this->load->view('agencies/agency', $data, TRUE);
			$this->load->view('layout/default', $data);
			$this->session->set_userdata('referred_from', current_url());
		}
	}
 
 }
 
 /* End of file agencies.php */
 /* Location: ./application/controllers/agencies.php */ ?> 