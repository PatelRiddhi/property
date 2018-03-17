<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('properties_model');
		$this->load->model('agencies_model');
		$this->load->model('agent_model');
		$this->load->model('aminities_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');
		if(!$this->session->userdata('username'))
		{
			redirect('admin/login');
		}
	}

	/**
	 * This function is for redirect the index page of this controller with some pagination
	 * @param  integer $start this parameter is for pagination start index which we selected
	 * @return [boolean]         
	 */
	public function index($start=0)
	{	
			$data['properties'] = $this->properties_model->get_data('', $start, 5);
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = '>>';
			$config['prev_link'] = '<<';

			/* For Pagination */
			$config["base_url"] = base_url() . "admin/properties/index";
			$config["total_rows"] = $this->properties_model->total_row_count();
			$config["per_page"] = 5;
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
		
			$this->pagination->initialize($config);
			$data['links'] = $this->pagination->create_links();
			$data['start'] =$start; 
			$data['content'] = $this->load->view('admin/properties/index', $data, TRUE);	
			
			$this->load->view('admin/layout/default', $data);
			$this->session->set_userdata('referred_from', current_url());
	}

	/**
	 * This function delete data which we want to select by id
	 * @param  [integer] $id select id for delete data from the table
	 * @return [boolean]    
	 */
	public function delete($id='')
	{
		if($id == '')
		{
			if(empty($this->input->post('select')))
			{
				echo "not selected";
				$referred_from = $this->session->userdata('referred_from');
				redirect($referred_from, 'refresh');
			}
			else
			{	
				$ids= $_POST['select'];
				$c_id = count($ids);
				$count =0;
				foreach ($ids as $row) 
				{
					if($this->properties_model->delete($id))
					{
						$count++;
					}
				}
				if($count == $c_id)
				{
					$referred_from = $this->session->userdata('referred_from');
					redirect($referred_from, 'refresh');
				}
			}
		}
		else
		{
			$this->properties_model->delete($id);
			$referred_from = $this->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}
	}

	/**
	 * This function is for update data which we want to select by id
	 * @param  [integer] $id select id for update data from the table
	 * @return [boolean] 
	 */
	public function edit($id)
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
			if(!empty($_FILES['photoimg']['name'][0]))
			{
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
				$this->properties_model->add($arr,'image');	
			}
			$agency = array(
						'agency_id'=>$this->input->post('agencies'),
						'pro_id'=>$id
							);
			$this->properties_model->edit_agency($agency,$this->input->post('old_agency_id'), 'project_agency');
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

			redirect('admin/properties/','refresh');
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
			$data['property']['agency'] = $this->properties_model->get_agency($id)[0]['agency_id'];
			$images = $this->properties_model->get_images($id);
			$data['property']['images'] = array_column($images, 'path','id');
			$data['type'] = $this->properties_model->get_type();
			$data['agencies']= $this->agencies_model->get_all();
			$data['aminities'] = $this->aminities_model->get_all();
			$data['countries'] = $this->properties_model->get_countries();
			$data['content'] =$this->load->view('admin/properties/edit', $data, TRUE);	
			$this->load->view('admin/layout/default', $data);

		}
	}

	/**
	 * This function is simply we can redirect index page for this controller to avoid any add or update prodess
	 * @return [boolean] 
	 */
	public function cancel()
	{
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

	public function add()
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
							'agency_id' => $this->input->post('agencies'),
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
						redirect(base_url('admin/properties/more/'.$pro_id));
					}		
				}
		}
		else
		{
			$data['agencies']= $this->agencies_model->get_all();
			$data['type'] = $this->properties_model->get_type();
			$data['aminities'] = $this->aminities_model->get_all();
			$data['countries'] = $this->properties_model->get_countries();
			//$data['aminities']=$this->aminities_model->get_all();
			$data['content'] =$this->load->view('admin/properties/add',$data, TRUE);	
			$this->load->view('admin/layout/default', $data);
		}
		
	}

	/**
	 * This is for to display more nformation about project
	 * @param  [integer] $id 
	 * @return [html]    
	 */
	public function more($id)
	{
		$data['property'] = $this->properties_model->get_by_id($id);

		//to get array of project aminities
		$data['property']['aminities'] = array();
		$pro_aminities = $this->aminities_model->get_aminities($id);
		foreach ($pro_aminities as $key=>$value) 
		{
			$name = $this->aminities_model->get_name($value['amen_id']);
			array_push($data['property']['aminities'], $name);
		}	

		//to get array of project agents assigned to this property
		$data['property']['agents'] = array();
		$pro_agents = $this->agent_model->get_agents($id);
		foreach ($pro_agents as $key=>$value) 
		{
			$temp = $this->agent_model->get_by_id($value['agent_id']);
			array_push($data['property']['agents'], $temp);
		}

		$data['property']['images'] = array();
		$images = $this->properties_model->get_images($id);
		foreach ($images as $key => $value) 
		{
			array_push($data['property']['images'], $value['path']);
		}
		$data['property']['pro_type_id'] = $this->properties_model->type($id);
		$data['content'] = $this->load->view('admin/properties/more', $data, TRUE);
		$this->load->view('admin/layout/default', $data);	
	}

   	public function search($start=0)
    {
    	$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		/* For Pagination */
		$config["base_url"] = base_url() . "admin/properties/search";
		$config["total_rows"] = $this->properties_model->total_row_count();
		$config["per_page"] = 5;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
	
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['start'] =$start;

    	$search = $this->input->post('member_name');
    	if ($search=='') 
    	{
			redirect(base_url('admin/properties'), 'refresh');  
		}
		else
		{
	    	$data['properties'] = $this->properties->search($search);
	    	foreach ($data['properties'] as $row)
	        {      
?> 
                  <tr>
                    <td><input type="checkbox" class="checkbBoxClass" id="select" name="select[]" value="<?php echo $row['id'] ?>"></td>
                    <td><?php echo $start+1;  $start++; ?></td>
                    <td><?php echo ucfirst($row['title']); ?></td>
                   	<td><?php if($row['status'] == 'rent')
                            { echo $row['prize']."/month"; } 
                            else 
                            {
                                echo $row['prize'];
                            }?>
                    </td>
                    <td><?php echo ($row['area']); ?></td>
                    <td><?php echo ucfirst($row['city']); ?></td>
                    <td><?php echo ucfirst($row['state']); ?></td>
                    <td><?php echo ucfirst($row['country']); ?></td>
                    <td><?php echo ucfirst($row['status']); ?></td>
                    <td><img src="<?php echo base_url($row['thumbnail']); ?>" height="80" width="80"></img></td>
                    <td><a href= "<?php echo base_url('admin/properties/edit/').$row['id'];?>" > Edit </a> |
                    <a href= "<?php echo base_url('admin/properties/delete/').$row['id'];?>" onclick="return confirm('Are you sure you want to delete this data?');">  Delete </a> |
                    <a href= "<?php echo base_url('admin/properties/more/').$row['id'];?>"  > More </a></td> 
                  </tr>
<?php
	        }
		}
    }

}

/* End of file properties.php */
/* Location: ./application/controllers/admin/properties.php */