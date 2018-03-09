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
}

/* End of file agent.php */
/* Location: ./application/models/agent.php */