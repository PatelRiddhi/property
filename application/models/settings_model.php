<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'settings';
	}
	
	public function get_by_id($id)
	{
		return parent::get_by_id($id);
	}

}

/* End of file settings_model.php */
/* Location: ./application/models/settings_model.php */
