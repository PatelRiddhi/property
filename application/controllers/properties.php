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
		$this->load->helper(array('form', 'url'));
	}

	public function index($start=0)
	{
		$data['properties'] = $this->properties_model->get_data('',$start, 8);
		$config = $this->config1();
		$config["base_url"] = base_url() . "properties/index";
		$config["total_rows"] = $this->properties_model->total_row_count();
		$config["per_page"] = 8;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		//$data['properties'] = $this->properties_model->get_all();
		$data['content'] = $this->load->view('properties/index', $data, TRUE);
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
			$data['aminities'] = $this->aminities_model->get_all();	
			$data['content'] = $this->load->view('properties/property', $data, TRUE);
			$this->load->view('layout/default', $data);
			$this->session->set_userdata('referred_from', current_url());
		}
		
	}

}

/* End of file properties.php */
/* Location: ./application/controllers/properties.php */
?>
