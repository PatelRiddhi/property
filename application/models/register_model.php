<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function add($data)
	{
		foreach ($data as $key => $value) 
		{
			if($key == 'register')
			{
				$this->table_name = 'users';
				parent::add($data['register']);
			}
			if($key == 'login')
			{
				$this->table_name = 'login';
				parent::add($data['login']);
			}
		}
		return TRUE;
	}
}

/* End of file register_model.php */
/* Location: ./application/models/register_model.php */