<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agencies_model extends MY_Model 
{
	public function __construct()
 	{
 		parent::__construct();
 		$this->table_name = 'agencies';
 	}

 	public function get_all()
 	{
 		return parent::get_all();
 	}
 
 	public function get_data($where='', $limit='',$offset='')
 	{
 		
 		return parent::get_data($where,$limit,$offset);
 	}

 	public function total_row_count()
	{
		return parent::total_row_count();
	}

	public function get_by_id($id)
	{
		return parent::get_by_id($id);	
	}

	public function add_contact($data)
	{
		$this->table_name = 'agency_contact';
		return parent::add($data);
	}
 	
	public function count_properties($id)
	{
		$q = $this->db->query("SELECT COUNT(pro_id) 
								 FROM properties
								 JOIN project_agency ON 'properties.id' = 'project_agency.pro_id'
								 WHERE agency_id= '1'");
	}

	public function get_properties($id)
	{
		$this->db->where('agency_id',$id);
		return $this->db->get('project_agency')->result_array();
	}

	public function get_agents($id)
	{
		$this->db->where('agency_id',$id);
		return $this->db->get('agency_agents')->result_array();
	}

	public function delete($id)
	{
		$update_data = array(
					'is_delete' =>1);

		//to get array of properties assigned to this agency
		$properties = $this->get_properties($id);
		$properties_ids = array_column($properties, 'pro_id');
		
		//to get array of agents assigned to this agency
		$agents = $this->get_agents($id);
		$agents_ids = array_column($agents, 'agent_id');
		//delete agents..
		$this->db->where_in('agency_id', $properties_ids);
		if($this->db->update('agency_agents', $update_data))
		{
			$this->db->where_in('agency_id', $agents_ids);
			if($this->db->update('project_agency', $update_data))
			{
				$this->db->where('agency_id', $id);
				if($this->db->update('agency_contact', $update_data))
				{
					$this->db->where_in('id', $properties_ids);
					if($this->db->update('properties', $update_data))
					{
						$this->db->where_in('id', $agents_ids);
						if($this->db->update('agents', $update_data))
						{
							$this->db->where('id', $id);
							if($this->db->update('agencies, $update_data'))
							{
								return TRUE;
							}
							
						} 
					} 
				} 
			} 
		} 
	}
}

/* End of file agencies_model.php */
/* Location: ./application/models/agencies_model.php */