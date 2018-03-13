<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agencies extends MY_Controller 
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
		$data['agencies'] = $this->agencies_model->get_data('', $start, 5);
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		/* For Pagination */
		$config["base_url"] = base_url() . "admin/agencies/index";
		$config["total_rows"] = $this->agencies_model->total_row_count();
		$config["per_page"] = 5;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
	
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		$data['start'] =$start; 
		$data['content'] = $this->load->view('admin/agencies/index', $data, TRUE);	
		
		$this->load->view('admin/layout/default', $data);
		$this->session->set_userdata('referred_from', current_url());
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

	public function more($id)
	{
		$data['agency'] = $this->agencies_model->get_by_id($id);
		//to get array of agency properties
		$data['agency']['properties'] = array();
		$properties = $this->agencies_model->get_properties($id);
		foreach ($properties as $key=>$value) 
		{
			$temp = $this->properties_model->get_by_id($value['pro_id']);
			array_push($data['agency']['properties'], $temp['title']);
		}	
		//to get array of project agents assigned to this property
		$data['agency']['agents'] = array();
		$agents = $this->agencies_model->get_agents($id);
		foreach ($agents as $key=>$value) 
		{
			$temp = $this->agent_model->get_by_id($value['agent_id']);
			array_push($data['agency']['agents'], $temp['first_name']." ".$temp['last_name']."(".$temp['post'].")");
		}
		$data['content'] = $this->load->view('admin/agencies/more', $data, TRUE);
		$this->load->view('admin/layout/default', $data);	
	}

	/**
	 * This function delete data which we want to select by id
	 * @param  [integer] $id select id for delete data from the table
	 * @return [boolean]    
	 */
	public function delete($id='')
	{
		//For multiple delete records..
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
					if($this->agencies_model->delete($id))
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
		//For single delete records...
		else
		{
			$this->agencies_model->delete($id);
			$referred_from = $this->session->userdata('referred_from');
			redirect($referred_from, 'refresh');
		}
	}

}

/* End of file agencies.php */
/* Location: ./application/controllers/admin/agencies.php */