<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('properties_model');
		$this->load->model('aminities_model');
		$this->load->model('agent_model');
		$this->load->model('agencies_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index($start=0)
	{
		$config = $this->config1();
		$config["base_url"] = base_url() . "properties/index";
		if($this->session->userdata('user')['role'] == '1')
		{
			$properties = $this->agencies_model->get_properties($this->session->userdata('user')['record_id']);
			$data['properties'] = array();
			foreach ($properties as $key =>$value) 
			{
				$property = $this->properties_model->get_by_id($value['pro_id']);
				array_push($data['properties'], $property);
			}
			$config["total_rows"] = count($data['properties']);
			$config["per_page"] = 8;
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			$data['content'] = $this->load->view('properties/list',$data , TRUE);

		}
		elseif($this->session->userdata('user')['role'] == '2')
		{
			$properties = $this->agent_model->get_properties($this->session->userdata('user')['record_id']);
			$data['properties'] = array();
			foreach ($properties as $key =>$value) 
			{
				$property = $this->properties_model->get_by_id($value['pro_id']);
				array_push($data['properties'], $property);
			}
			$config["total_rows"] = count($data['properties']);
			$config["per_page"] = 8;
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			$data['content'] = $this->load->view('properties/list',$data , TRUE);

		}
		else 
		{
			$data['properties'] = $this->properties_model->get_data('',$start, 8);
			$config["total_rows"] = $this->properties_model->total_row_count();
			$config["per_page"] = 8;
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			//$data['properties'] = $this->properties_model->get_all();
			$data['content'] = $this->load->view('properties/index', $data, TRUE);
		}
		$this->load->view('layout/default', $data);
	}

	/**
	 * This Function is get all the data of perticular property 
	 * @param  [integer] $id 
	 * @return [boolean]     
	 */
	public function get_by_id($id)
	{

		//For contact form submit
		if($this->input->post())
		{
			$data['contact'] = array(
								'email' => $this->input->post('email'),
    							'date_from' => $this->input->post('date_from'),
							    'date_to' => $this->input->post('date_to'),
							    'message' => $this->input->post('message'),
							    'pro_id' => $id
									);
			//$this->properties_model->add($data);
			redirect($this->session->userdata('referred_from'), 'refresh');
		}
		else
		{
			$data['properties'] = $this->properties_model->get_data('',0,3);
			$data['property'] = $this->properties_model->get_by_id($id);
			//to get array of project aminities
			$data['property']['aminities'] = array();
			$pro_aminities = $this->aminities_model->get_aminities($id);
			foreach ($pro_aminities as $key=>$value) 
			{
				array_push($data['property']['aminities'], $value['amen_id']);
			}
			
			//to get array of project agents assigned to this property
			$data['property']['agents'] = array();
			$pro_agents = $this->agent_model->get_agents($id);
			foreach ($pro_agents as $key=>$value) 
			{
				$temp = $this->agent_model->get_by_id($value['agent_id']);
				array_push($data['property']['agents'], $temp);
			}
			$pro_images = $this->properties_model->get_images($id);
			$data['property']['images'] = array_column($pro_images,'path');
			$data['aminities'] = $this->aminities_model->get_all();	
			$data['content'] = $this->load->view('properties/property', $data, TRUE);
			$this->load->view('layout/default', $data);
			$this->session->set_userdata('referred_from', current_url());
		}	
	}

	/**
	 * For add or edit property details
	 * @return HTML 
	 */
	public function manage($id='')
	{
		//For edit property///
		if($id !='')
		{
			if($this->input->post())
			{
				$config['upload_path'] = './uploads/properties';
				$config['upload_url'] = base_url().'upload';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000';
				$config['max_width']  = '102040';
				$config['max_height']  = '76800';
				$this->upload->initialize($config);
				if(empty($_FILES['profile']['name'][0]))
				{
					$path = $this->input->post('old_profile');
				}
				else
				{
					if($data = $this->upload->do_multi_upload("profile")) 
					{
						$path = 'uploads/properties/'.$this->upload->data()['file_name'];
					}
					else
					{
						print_r($this->upload->display_errors());
					}
						
				}
				if($data = $this->upload->do_multi_upload("photoimg")) 
				{
					$gallery = array_column($this->upload->get_multi_upload_data(), 'file_name');
				}
				else
				{
					print_r($this->upload->display_errors());
				}
				$arr=array();
				foreach ($gallery as $path) 
				{
					array_push($arr,array('pro_id'=>$id,'path'=>'uploads/properties/'.$path));	
				}
				if($this->properties_model->add($arr,'image'))
				{
					redirect(base_url('properties/'.$id));
				}		
				$property = array(
						    'title' => $this->input->post('title'),
						    'description' => $this->input->post('description'),
						    'address' => $this->input->post('address'),
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
				$this->properties_model->update($id, $property, 'properties');

				//For update amenities..
				$old_aminities = array_column($this->aminities_model->get_aminities($id),'amen_id');
				$new_aminities = $this->input->post('aminities');
				if(array_diff($old_aminities,$new_aminities)!='')
				{
					//For deleting amenities
					foreach ($old_aminities as $value) 
					{
						if(in_array($value, $new_aminities)!=TRUE)
						{
							$data = array(
										'pro_id' => $id,
										'amen_id' => $value,
										);
							$amenity = $this->aminities_model->get_amenity($data);
							$this->aminities_model->delete($amenity['id']);
						}
					}
					foreach ($new_aminities as $value) 
					{
						if(in_array($value, $old_aminities)!=TRUE)
						{
							$data = array(
										'pro_id' => $id,
										'amen_id' => $value,
										);
							$this->aminities_model->add($data);
						}
					}
				}
			}
			else
			{
				$data['property'] = $this->properties_model->get_by_id($id);
				//to get array of project aminities
				$data['property']['aminities'] = array();
				$pro_aminities = $this->aminities_model->get_aminities($id);
				foreach ($pro_aminities as $key=>$value) 
				{
					array_push($data['property']['aminities'], $value['amen_id']);
				}
				$images = $this->properties_model->get_images($id);
				$data['property']['images'] = array_column($images, 'path','id');
				$data['type'] = $this->properties_model->get_type();
				$data['aminities'] = $this->aminities_model->get_all();
				$data['countries'] = $this->properties_model->get_countries();
				$data['content'] = $this->load->view('properties/edit', $data, TRUE);
				$this->load->view('layout/default', $data);
			}
		}//End of if loop
		else
		{
			//For ADD property...

			if($this->input->post())
			{
				$config['upload_path'] = './uploads/properties';
				$config['upload_url'] = base_url().'upload';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '10000';
				$config['max_width']  = '102040';
				$config['max_height']  = '76800';
				$this->upload->initialize($config);
				if($data = $this->upload->do_multi_upload("photoimg")) 
				{
					$gallery = array_column($this->upload->get_multi_upload_data(), 'file_name');
					echo '<pre>';
					print_r($gallery);
				}
				else
				{
					print_r($this->upload->display_errors());
				}
				if($data = $this->upload->do_multi_upload("profile")) 
				{
					$path = 'uploads/properties/'.$this->upload->data()['file_name'];
				}
				else
				{
					print_r($this->upload->display_errors());
				}
				$property = array(
						    'title' => $this->input->post('title'),
						    'description' => $this->input->post('description'),
						    'address' => $this->input->post('address'),
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
				
				if($pro_id = $this->properties_model->add($property))
				{
					$agency = array(
								'agency_id' => $this->session->userdata('user')['record_id'],
								'pro_id' => $pro_id
							);
					$this->properties_model->add_agency($agency);	
				}
				$aminities = $this->input->post('aminities');
				$property['aminities'] = array();
				foreach ($aminities as $value) 
				{
					array_push($property['aminities'], array('pro_id'=>$pro_id, 'amen_id'=>$value));
				}
				$this->properties_model->add($property['aminities'], 'aminities');
				
				if($pro_id)
				{
					$arr=array();
					foreach ($gallery as $path) 
					{
					     array_push($arr,array('pro_id'=>$pro_id,'path'=>'uploads/properties/'.$path));	
					}
					if($this->properties_model->add($arr,'image'))
					{
						redirect(base_url('properties/'.$pro_id));
					}		
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
	}

	public function delete($id)
	{
		if($this->properties_model->delete($id))
		{
			redirect('properties');
		}	
	}

	public function delete_image()
	{
		if($this->properties_model->delete_img($_POST['id']))
		{
			echo "yes";
		}
	}
}

/* End of file properties.php */
/* Location: ./application/controllers/properties.php */
?>
