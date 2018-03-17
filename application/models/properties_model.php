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
 		//$this->table_name='properties';
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

	public function add_agency($data)
	{
		$this->table_name = 'project_agency';
		return parent::add($data);
	}
	
	public function type($id)
	{
		$this->table_name = 'property_type';
		$this->db->select('name');
		$this->db->where('id', $id);
		$q = $this->db->get($this->table_name)->row_array();
		return $q;
	}
	
	public function get_agents($id)
	{
		$this->db->where('pro_id', $id);
		$this->db->where('is_delete', 0);
		return $this->db->get('property_agent')->result_array();
	}

	public function get_agencies($id)
	{
		$this->db->where('pro_id', $id);
		$this->db->where('is_delete', 0);
		return $this->db->get('project_agency')->result_array();
	}

	public function get_contact($id)
	{
		$this->db->where('pro_id', $id);
		$this->db->where('is_delete', 0);
		return $this->db->get('property_contact')->result_array();
	}

	public function get_amenities($id)
	{
		$this->db->where('pro_id', $id);
		$this->db->where('is_delete', 0);
		return $this->db->get('property_amenities')->result_array();
	}
	public function delete($id)
	{
		$update_data = array(
					'is_delete' =>1);

		//to get array of agents to this property 
		$agents = $this->get_agents($id);
		$agents_ids = array_column($agents, 'agent_id');
		if(count($agents_ids)!=0)
		{
			$this->db->where_in('agent_id', $agents_ids);
			$this->db->update('property_agent', $update_data);
		}
		//to get contact of perticular property
		$contacts = $this->get_contact($id);
		$contact_ids = array_column($contacts, 'id');
		if(count($contact_ids)!=0)
		{
			$this->db->where_in('id', $contact_ids);
			$this->db->update('property_contact', $update_data);
		}
		//to get images of perticular property
		$images = $this->get_images($id);
		$images_ids = array_column($images, 'id');
		if(count($images_ids)!=0)
		{
			$this->db->where_in('id', $images_ids);
			$this->db->update('property_image', $update_data);
		}
		//to get amenities of perticular property
		$amenities = $this->get_amenities($id);
		$amenities_ids = array_column($amenities, 'id');
		if(count($images_ids)!=0)
		{
			$this->db->where_in('id', $amenities_ids);
			$this->db->update('property_amenities', $update_data);
		}

		//delete agents..
		
		$this->db->where_in('agency_id', $this->session->userdata('user')['record_id']);
		$this->db->update('project_agency', $update_data);
				
		$this->db->where('id', $id);
		if($this->db->update('properties', $update_data))
		{
			return TRUE;
		}
	}

	public function search($data)
	{
		$this->db->like('title', $data);
		return $this->db->get($this->table_name)->result_array();
	}

	public function get_images($id)
	{
		$this->table_name = 'property_image';
		$this->db->where('pro_id', $id);
		$this->db->where('is_delete', 0);
		return  $this->db->get($this->table_name)->result_array();	
	}

	public function update($id, $data, $table_name)
	{
		return parent::update($id, $data, $table_name);
	}

	public function delete_img($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('property_image');
	}

	public function get_agency($id)
	{
		$this->db->where('pro_id', $id);
		$this->db->where('is_delete', 0);
		return $this->db->get('project_agency')->result_array();
	}

	public function edit_agency($data, $old_data, $table_name)
	{
		$this->db->where('agency_id', $old_data);
		$this->db->where('pro_id', $data['pro_id']);
		return $this->db->update($table_name, $data);
	}
 }
 
 /* End of file properties_model.php */
 /* Location: ./application/models/properties_model.php */ 
 ?>