<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Properties_model extends MY_Model 
 {
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->table_name = 'properties';
 	}

 	// public function get_all()
 	// {
 	// 	return parent::get_all();
 	// }
 
 	public function get_data($where='', $limit='',$offset='')
 	{

 		$data = parent::get_data($where,$limit,$offset);
 		return $data;
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
		$this->table_name = 'property_contact';
		return parent::add($data);
	}

	public function get_type()
	{
		$this->table_name = 'property_type';
		return parent::get_all();
	}

	public function add($data,$multiple='')
	{
		return parent::add($data,$multiple);
	}

	public function type($id)
	{
		$this->table_name = 'property_type';
		$this->db->select('name');
		$this->db->where('id', $id);
		$q = $this->db->get($this->table_name)->row_array();
		return $q;
	}

	public function delete($id)
	{
		//delete eminities..
		$this->db->where('pro_id', $id);
		if($this->db->delete('property_amenities'))
		{
			//delete property contact
			$this->db->where('pro_id', $id);
			if($this->db->delete('property_contact'))
			{
				//delete property image..
				$this->db->where('pro_id', $id);
				if($this->db->delete('property_image'))
				{
					//delete property agent.
					$this->db->where('pro_id', $id);
					if($this->db->delete('property_agent'))
					{
						//delete property
						$this->db->where('id', $id);
						if($this->db->delete('properties'))
						{
							return TRUE;
						}
					}				
				}
			}
		}
	}

	public function search($data)
	{
		$this->db->like('title', $data);
		return $this->db->get($this->table_name)->result_array();
	}
 }
 
 /* End of file properties_model.php */
 /* Location: ./application/models/properties_model.php */ 
 ?>