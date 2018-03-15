<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent_Model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'agents';
	}
	
	public function get_all()
	{
		return parent::get_all();
	}

	public function get_agents($id)
	{
		$this->db->where('pro_id',$id);
		return $this->db->get('property_agent')->result_array();
	}

	public function get_by_id($id)
	{
		return parent::get_by_id($id);
	}

	public function get_properties($id)
	{
		$this->db->where('agent_id',$id);
		return $this->db->get('property_agent')->result_array();
	}

	public function add($data, $multiple='')
	{
		return parent::add($data);
	}

	public function add_agency($data)
	{
		$this->table_name = 'agency_agents';
		return parent::add($data);
	}
}

/* End of file agent.php */
/* Location: ./application/models/agent.php */