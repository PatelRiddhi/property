<?php
class My_Model extends CI_Model 
{

	protected $table_name='';

	/**
	 * get all data by id
	 * @param  [integer] $id 
	 * @return [array]     return array of selected recored by id
	 */
	public function get_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table_name)->row_array();	
	}

	/**
	 * delete data by id
	 * @param  [integer] $id 
	 * @return [array]     boolean 
	 */
	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
	}

	/**
	 * get all the data of table
	 * @return [array] return array of all records of table
	 */
	public function get_all()
	{
		$query = $this->db->get($this->table_name)->result_array();
		return $query;
	}

	/**
	 * update table data by id
	 * @param  [array] $data 
	 * @param  [integer] $id   [description]
	 * @return [array]       [description]
	 */
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table_name, $data); 
	}

	public function add($data, $multiple='')
	{
		if($multiple==true)
		{
			$this->table_name = 'property_image';
			return $this->db->insert_batch($this->table_name, $data);
		}
		else
		{
			$this->db->insert($this->table_name, $data);
			return $this->db->insert_id(); 
		}
		return false;
	}

	public function total_row_count()
	{
		return $this->db->count_all($this->table_name);
	}

	public function total_row($num, $start)
	{
		$this->db->select()->from($this->table_name)->limit($num,$start);
		return $this->db->get()->result_array();
	}

	public function get_filters($id)
	{
		$query = $this->db->query('SELECT * FROM projects INNER JOIN project_category ON project_category.project_id = projects.id WHERE project_category.category_id = '.$id);
		return $query->result_array();
	}


	/**
	 * This function is for get data with where condition ,without where condition, with offset and limit value or without limit and offset value
	 * @param  string $where  This is either value or array to get data from the given table
	 * @param  string $limit  To set the limit where fetching data
	 * @param  string $offset To set the offset where fetching data
	 * @return [type]         retrun array
	 */
	public function get_data($where = '', $limit = '', $offset='')
	{
		$this->db->order_by("created_on", "desc"); 
		if($where!='')
		{
			$this->db->where($where);			
		}
		if($limit!=''or $offset!='')
		{
				$this->db->limit($offset, $limit);
		}
		return $this->db->get($this->table_name)->result_array();
		
	}

	/**
	 * This Function is for to get all countries
	 * @return [boolean] 
	 */
	public function get_countries()
	{
		return $this->db->get('countries')->result_array();
	}

	/**
	 * This Function is for to get all states for perticular country
	 * @return [boolean] 
	 */
	public function get_states($id)
	{
		$this->db->where('country_id', $id);
		return $this->db->get('states')->result_array();
	}

	/**
	 * This Function is for to get all cities for perticular state.
	 * @return [boolean] 
	 */
	public function get_cities($id)
	{
		$this->db->where('state_id', $id);
		return $this->db->get('cities')->result_array();
	}


}
?>