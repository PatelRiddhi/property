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
			$temp = $this->agencies_model->count_properties($value['id']);
			$data['agencies'][$key]['properties'] = count($temp); 
		}
		$data['properties'] = $this->properties_model->get_data('',$start, 3);
		$data['content'] = $this->load->view('agencies/index', $data, TRUE);
		$this->load->view('layout/default', $data);
		$this->session->set_userdata('referred_from',current_url());
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

	public function assign_property()
	{
		$id = $this->session->userdata('user')['record_id'];
		$data['assign'] = $this->agencies_model->get_assign_data($id);
		$data['content'] = $this->load->view('agencies/assign_property', $data, TRUE);
		$this->load->view('layout/default', $data);
	}

	public function manage($id='')
	{
		//For add agency..
		if($id=='')
		{
			if($this->input->post())
			{
				$config['upload_path'] = './uploads/agencies';
				$config['upload_url'] = base_url().'upload';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000';
				$config['max_width']  = '102040';
				$config['max_height']  = '76800';
				$this->upload->initialize($config);
				if($data = $this->upload->do_multi_upload("profile")) 
				{
					$path = 'uploads/agencies/'.$this->upload->data()['file_name'];
				}
				else
				{
					print_r($this->upload->display_errors());
				}
				$agency = array(
						    'title' => $this->input->post('title'),
						    'description' => $this->input->post('description'),
						    'address' => $this->input->post('address'),
						    'email' => $this->input->post('email'),
						    'website' => $this->input->post('website'),
						    'mobile_no' => $this->input->post('mobile_no'),
						    'facebook_url' => $this->input->post('facebook_url'),
						    'twitter_url' => $this->input->post('twitter_url'),
						    'linked_in_url' => $this->input->post('linkedin_url'),
						    'google_plus_url'=> $this->input->post('google_plus_url'),
						    'vimeo-square_url' => $this->input->post('vimeo_square_url'),
						    'youtube_url' => $this->input->post('youtube_url'),
						    'password' => md5($this->input->post('password')),
						    'profile' => $path
							);
				if($agency_id = $this->register_model->register($agency, 'agencies'))
				{
					$login = array(
							'email' => $this->input->post('email'),
							'password' => md5($this->input->post('password')),
							'role' => 1,
							'record_id'=>$agency_id
							);
					if($this->register_model->register($login,'login'))
					{
						redirect('login','refresh');
					}
				}
			}
			else
			{
				$data['content'] = $this->load->view('agencies/new', '', TRUE);
				$this->load->view('layout/default', $data);
			}
		}
		//For edit agency..
		else
		{
			if($this->input->post())
			{
				if(empty($_FILES['profile']['name']))
				{
					$path = $this->input->post('old_profile');
				}
				else
				{
					$config['upload_path'] = './uploads/agencies';
					$config['upload_url'] = base_url().'upload';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '10000';
					$config['max_width']  = '102040';
					$config['max_height']  = '76800';
					$this->upload->initialize($config);
					if($data = $this->upload->do_multi_upload("profile")) 
					{
						$path = 'uploads/agencies/'.$this->upload->data()['file_name'];
					}
					else
					{
						print_r($this->upload->display_errors());
					}
				}
				$agency = array(
						    'title' => $this->input->post('title'),
						    'description' => $this->input->post('description'),
						    'address' => $this->input->post('address'),
						    'website' => $this->input->post('website'),
						    'mobile_no' => $this->input->post('mobile_no'),
						    'facebook_url' => $this->input->post('facebook_url'),
						    'twitter_url' => $this->input->post('twitter_url'),
						    'linked_in_url' => $this->input->post('linkedin_url'),
						    'google_plus_url'=> $this->input->post('google_plus_url'),
						    'vimeo-square_url' => $this->input->post('vimeo_square_url'),
						    'youtube_url' => $this->input->post('youtube_url'),
						    'password' => md5($this->input->post('password')),
						    'profile' => $path
							);
				if($this->agencies_model->update($id, $agency, 'agencies'))
				{
					redirect('agencies/'.$id,'refresh');
				}
			}
			else
			{
				$data['agency'] = $this->agencies_model->get_by_id($id);
				$data['content'] = $this->load->view('agencies/edit', $data, TRUE);
				$this->load->view('layout/default', $data);
			}
		}	
	}

	public function cancel()
	{
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from,'refresh');
	}
 
 }
 
 /* End of file agencies.php */
 /* Location: ./application/controllers/agencies.php */ ?> 