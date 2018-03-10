<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function register($data)
	{
		$count = 0;
		foreach ($data as $key => $value) 
		{
			if($key == 'register')
			{
				$this->table_name = 'users';
				if(parent::add($data['register']))
				{
					$count++;
				}
			}
			if($key == 'login')
			{
				$this->table_name = 'login';
				if(parent::add($data['login']))
				{
					$count++;
				}
			}
			if($key == 'agency')
			{
				$this->table_name = 'agencies';
				if(parent::add($data['agency']))
				{
					$count++;
				}
			}
		}
		if($count == 2)
		{
			return TRUE;
		}
	}
}

/* End of file register_model.php */
/* Location: ./application/models/register_model.php */