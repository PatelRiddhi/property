<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Aminities_model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'aminities';
	}
	

	public function get_all()
	{
		return parent::get_all();
	}

	public function get_aminities($id)
	{
		$this->db->where('pro_id',$id);
		return $this->db->get('property_amenities')->result_array();
	}

	public function get_name($id)
	{
		$this->db->select('name');
		$this->db->where('id', $id);
		return $this->db->get($this->table_name)->row_array();
	}

	public function get_amenity($data)
	{
		$this->db->where('pro_id', $data['pro_id']);
		$this->db->where('amen_id', $data['amen_id']);
		$this->db->select('id');
		return $this->db->get('property_amenities')->row_array();
	}
	public function delete($id)
	{
		$update_data = array('is_delete'=>1);
		$this->db->where('id', $id);
		$this->db->update('property_amenities', $update_data);
	}

	public function add($data, $multiple='')
	{
		$this->table_name = 'property_amenities';
		return parent::add($data);
	}
}

/* End of file aminities_model.php */
/* Location: ./application/models/aminities_model.php */
?> 