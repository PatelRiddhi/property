<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agencies extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('agencies_model');
		$this->load->model('aminities_model');
	}

	public function index($start=0)
	{
		$data['agencies'] = $this->agencies_model->get_data('',$start, 8);
		$config = $this->config1();
		$config["base_url"] = base_url() . "agencies/index";
		$config["total_rows"] = $this->properties_model->total_row_count();
		$config["per_page"] = 8;
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();
		//$data['properties'] = $this->properties_model->get_all();
		$data['content'] = $this->load->view('properties/index', $data, TRUE);
		$this->load->view('layout/default', $data);
	}

	public function get_by_id($id)
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
		
		$data['aminities'] = $this->aminities_model->get_all();	
		$data['content'] = $this->load->view('properties/property', $data, TRUE);
		$this->load->view('layout/default', $data);
	}

}

/* End of file properties.php */
/* Location: ./application/controllers/properties.php */
?>
