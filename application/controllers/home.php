<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('properties_model');
	}
	
	public function index()
	{
		//$data['temp'] = $this->properties_model->get_type();
		$data['countries'] = $this->properties_model->get_countries();
		$data['properties'] = $this->properties_model->get_data('',0,8);
		$data['total'] = $this->properties_model->total_row_count();
		$data['remaining_properties'] = $this->properties_model->get_data('',8,$data['total']-4);
		foreach ($data['properties'] as $key=>$value) 
		{
			$type = $this->properties_model->type($value['pro_type_id']);
			$data['properties'][$key]['pro_type']=$type['name'];
		}
		$data['content'] = $this->load->view('home/index', $data, TRUE);
		$this->load->view('layout/default', $data);
	}

	/**
	 * Get all states records according to country ID 
	 * @return HTML
	 */
	public function get_state()
	{
		$this->db->where('name', $_POST['name']);
		$this->db->select('id');
		$id = $this->db->get('countries')->result_array();
		$this->db->where('country_id', $id[0]['id']);
		$states = $this->db->get('states')->result_array();
		?>
		<option value="-1">--Select States--</option>
		<?php
		foreach ($states as $state) 
		{
			?>
			 <option value="<?php echo $state['name']; ?>"><?php echo $state['name']; ?></option>
			<?php	
		}
	}

	/**
	 * Get all cities records according to state ID 
	 * @return HTML
	 */
	public function get_city()
	{
		$this->db->where('name', $_POST['name']);
		$this->db->select('id');
		$id = $this->db->get('states')->result_array();
		$this->db->where('state_id', $id[0]['id']);
		$cities = $this->db->get('cities')->result_array();
		?>
		<option value="-1">--Select City--</option>
		<?php
		foreach ($cities as $city) 
		{
			?>
			 <option value="<?php echo $city['name']; ?>"><?php echo $city['name']; ?></option>
			<?php	
		}
	}

	
}
