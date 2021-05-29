<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bukutamu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert($data)
	{
		$this->db->insert('daftar_tamu', $data);
		return $this->db->insert_id();
	}

	 	
}

/* End of file User.php */
/* Location: ./application/models/User.php */



   