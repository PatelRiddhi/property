<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function register($data,$table_name)
	{
		$this->table_name =$table_name;
		return parent::add($data);
	}
}

/* End of file register_model.php */
/* Location: ./application/models/register_model.php */