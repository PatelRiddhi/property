<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Properties_model extends MY_Model 
 {
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->table_name = 'properties';
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
		$this->table_name = 'property_contact';
		return parent::add($data);
	}

	public function get_type()
	{
		$this->table_name = 'property_type';
		return parent::get_all();
	}

	public function add($data)
	{
		return parent::add($data);
	}
 	
 }
 
 /* End of file properties_model.php */
 /* Location: ./application/models/properties_model.php */ 
 ?>