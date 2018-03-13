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
	// public function edit($id)
	// {
	// 	if($this->input->post())
	// 	{
	// 		$data = array(
	// 						'title' =>$this->input->post('title') ,
	// 						'year' =>$this->input->post('year') ,
	// 						'duration' =>$this->input->post('duration') ,
	// 						'language' =>$this->input->post('language') ,
	// 						'release_date' =>$this->input->post('release_date') ,
	// 						'country' =>$this->input->post('country') 
	// 					);
	// 		$this->movies_model->update($id, $data);
	// 		$referred_from = $this->session->userdata('referred_from');
	// 		redirect($referred_from, 'refresh');
	// 	}
	// 	else
	// 	{
	// 		$data['genres'] = $this->genres_model->get_all();
	// 		$data['directors'] = $this->directors_model->get_all();
	// 		$data['movie'] = $this->movies_model->get_by_id($id);
	// 		$data['content'] =$this->load->view('movies/edit', $data, TRUE);	
	// 		$this->load->view('layout/default', $data);

	// 	}
	// }

	/**
	 * This function is simply we can redirect index page for this controller to avoid any add or update prodess
	 * @return [boolean] 
	 */
	public function cancel()
	{
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
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