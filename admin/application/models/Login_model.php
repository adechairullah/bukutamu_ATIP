<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model
{
	function _construct()
	{

		parent::_construct();
	}

	function cek_users($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		return $this->db->get('users')->row();
		
	}

}