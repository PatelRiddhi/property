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

	/**
	 * For add new property
	 * @return HTML 
	 */
	public function property()
	{
		
		if($this->input->post())
		{
			$config['upload_path'] = './uploads/properties/';
			$config['upload_url'] = base_url().'upload';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000';
			$config['max_width'] = '10240';
			$config['max_height'] = '10240';
			$this->load->library('upload', $config);

			if($this->upload->do_upload('profile'))
			{

				$file_path = array('upload_data'=>$this->upload->data());
				$path = 'uploads/properties/'.$file_path['upload_data']['file_name'];
			}
			else
			{
				echo "file upload is failed";
			}

			$property = array(
					    'title' => $this->senitize($this->input->post('title')),
					    'description' => senitize($this->input->post('description')),
					    'address' => senitize($this->input->post('address'),
					    'bath' => $this->input->post('bath'),
					    'area' => $this->input->post('area'),
					    'beds' => $this->input->post('beds'),
					    'prize' => $this->input->post('prize'),
					    'garages' => $this->input->post('garages'),
					    'facebook_url' => $this->input->post('facebook_url'),
					    'twitter_url' => $this->input->post('twitter_url'),
					    'linked_in_url' => $this->input->post('linkedin_url'),
					    'vimeo-square_url' => $this->input->post('vimeo_square_url'),
					    'you_tube_url' => $this->input->post('youtube_url'),
					    'country' => $this->input->post('country'),
					    'state' => $this->input->post('state'),
					    'city' => $this->input->post('city'),
					    'pro_type_id' => $this->input->post('property_type'),
					    'status' => $this->input->post('status'),
					    'thumbnail' => $path
						);
			if($this->properties_model->add($property))
			{
				echo 'yes';
				die;
			}
		}
		else
		{
			$data['type'] = $this->properties_model->get_type();
			$data['aminities'] = $this->aminities_model->get_all();
			$data['countries'] = $this->properties_model->get_countries();
			$data['content'] = $this->load->view('properties/new', $data, TRUE);
			$this->load->view('layout/default', $data);
		}
	}

	public function senitize($data)
	{
		return filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	}
 
 }
 
 /* End of file agencies.php */
 /* Location: ./application/controllers/agencies.php */ ?> 