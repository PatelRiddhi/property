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
}

/* End of file aminities_model.php */
/* Location: ./application/models/aminities_model.php */
?> 