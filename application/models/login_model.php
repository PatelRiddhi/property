<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = "login";
	}

	public function check_data($data)
	{
		$this->db->where($data);
		$result = $this->db->get($this->table_name)->result_array();
		return $result;	
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */