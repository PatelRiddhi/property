<?php
class My_Controller extends CI_Controller 
{
	protected $upload_path = '';
	function __construct() 
	{
		parent::__construct();
		$this->load->library('pagination');
	}

/**
 * Generates a slug of an string 
 * @param  string $str string to be converted into slug
 * @return string      slug generated
 */
	public function config()
	{
		$this->load->library('upload');
		//$config['upload_path'] = $this->upload_path;	
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		return $config;
	}

	public function config1()
	{
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = '>>';
		$config['prev_link'] = '<<';
		return $config;	
	}
}