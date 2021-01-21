<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaginationModel extends CI_Model {

	/**
	 * model of Pagination
	 */
	public function get_all($limit = NULL, $offset = NULL)
	{
		$result = $this->db->select()->from('test')->limit($limit, $offset)->get();
		return $result->result();
	}

	public function num_rows()
	{
		return $this->db->get('test')->num_rows();
	}
}
