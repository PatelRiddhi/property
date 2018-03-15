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
 		$this->load->model('register_model');
 	}

 	public function index()
	{
		if($this->session->userdata('user')['role'] == 1)
		{
			$id = $this->session->userdata('user')['record_id'];
			$agents = $this->agencies_model->get_agents($id);
			$agent = array();
			foreach ($agents as $key => $value) 
			{
				$temp = $this->agent_model->get_by_id($value['agent_id']);
				array_push($agent, $temp);
			}
			$data['agents'] = $agent;
			foreach ($data['agents'] as $key => $value) 
			{
				$temp = $this->agent_model->get_properties($value['id']);
				$data['agents'][$key]['properties'] =  count($temp); 
			}
			$data['content'] = $this->load->view('agents/list', $data, TRUE);
			$this->load->view('layout/default', $data);
		}

		if($this->session->userdata('user')['role'] == 2)
		{
			$id = $this->session->userdata('user')['record_id'];
			redirect('agents/'.$id,'refresh');
		}

		if($this->session->userdata('user')['role'] == 0)
		{
			$data['agents'] = $this->agent_model->get_all();
			//count total properties
			foreach ($data['agents'] as $key => $value) 
			{
				$temp = $this->agent_model->get_properties($value['id']);
				$data['agents'][$key]['properties'] =  count($temp); 
			}
			$data['content'] = $this->load->view('agents/index', $data, TRUE);
			$this->load->view('layout/default', $data);
		}
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

	public function manage($id='')
	{
		//For add agent..
		if($id=='')
		{
			if($this->input->post())
			{
				$config['upload_path'] = './uploads/agents';
				$config['upload_url'] = base_url().'upload';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000';
				$config['max_width']  = '102040';
				$config['max_height']  = '76800';
				$this->upload->initialize($config);
				if($data = $this->upload->do_multi_upload("profile")) 
				{
					$path = 'uploads/agents/'.$this->upload->data()['file_name'];
				}
				else
				{
					print_r($this->upload->display_errors());
				}
				$agent = array(
							'first_name' => $this->input->post('first_name'),
						    'last_name' => $this->input->post('last_name'),
						    'post' => $this->input->post('post'),
						    'email' => $this->input->post('email'),
						    'current_status' => $this->input->post('current_status'),
						    'contact_no' => $this->input->post('contact_no'),
						    'facebook_url' => $this->input->post('facebook_url'),
						    'twitter_url' => $this->input->post('twitter_url'),
						    'linked_in_url' => $this->input->post('linkedin_url'),
						    'google_plus_url'=> $this->input->post('google_plus_url'),
						    'vimeo-square_url' => $this->input->post('vimeo_square_url'),
						    'you_tube_url' => $this->input->post('youtube_url'),
						    'skype_id' => $this->input->post('skype_id'),
						    'password' => md5($this->input->post('password')),
						    'profile' => $path
								);
				if($agent_id = $this->agent_model->add($agent))
				{
					$agency = array(
								'agency_id' => $this->session->userdata('user')['record_id'],
							    'agent_id' => $agent_id
									);
					if($agent_id = $this->agent_model->add_agency($agency))
					{
						$login = array(
									'email' => $this->input->post('email'),
									'password' => md5($this->input->post('password')),
									'role' => 2,
									'record_id' => $agent_id
									);
						if($this->register_model->add($login,'login'))
						{
							redirect('agents/'.$agent_id,'refresh');
						}
						
					}
				}
			}
			else
			{
				//$data['properties'] = $this->agencies_model->get_properties($this->session->userdata('user')['record_id']);
				$data['content'] = $this->load->view('agents/new', '', TRUE);
				$this->load->view('layout/default', $data);
			}
		}
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
					$config['upload_path'] = './uploads/agents';
					$config['upload_url'] = base_url().'upload';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '10000';
					$config['max_width']  = '102040';
					$config['max_height']  = '76800';
					$this->upload->initialize($config);
					if($data = $this->upload->do_multi_upload("profile")) 
					{
						$path = 'uploads/agents/'.$this->upload->data()['file_name'];
					}
					else
					{
						print_r($this->upload->display_errors());
					}
				}
				$agent = array(
							'first_name' => $this->input->post('first_name'),
						    'last_name' => $this->input->post('last_name'),
						    'post' => $this->input->post('post'),
						    'email' => $this->input->post('email'),
						    'current_status' => $this->input->post('current_status'),
						    'contact_no' => $this->input->post('contact_no'),
						    'facebook_url' => $this->input->post('facebook_url'),
						    'twitter_url' => $this->input->post('twitter_url'),
						    'linked_in_url' => $this->input->post('linkedin_url'),
						    'google_plus_url'=> $this->input->post('google_plus_url'),
						    'vimeo-square_url' => $this->input->post('vimeo_square_url'),
						    'you_tube_url' => $this->input->post('youtube_url'),
						    'skype_id' => $this->input->post('skype_id'),
						    'password' => md5($this->input->post('password')),
						    'profile' => $path
								);
				redirect('agents/'.$id,'refresh');
			}
			else
			{
				$data['agent'] = $this->agent_model->get_by_id($id);
				echo '<pre>';
				print_r($data);
				die;
				$data['content'] = $this->load->view('agents/edit', $data, TRUE);
				$this->load->view('layout/default', $data);
			}
		}
		
	}
 
}
 
 /* End of file agencies.php */
 /* Location: ./application/controllers/agencies.php */ ?> 