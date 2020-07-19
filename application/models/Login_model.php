<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function checking($username, $password)
	{
		

		$this->db->select();
		$this->db->from('usuarios');
		$this->db->where('username', $username);
		//$this->db->where('password', $password);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			//return true;
			$row = $query->row();
			if (password_verify($password, $row->password)) {
				return true;
			}
			else
			{
				return false;
			}
		}
		else 
		{
			return false;
		}

	}

	public function infousuario($username)
	{
		$this->db->select();
		$this->db->from('usuarios');
		$this->db->where('username', $username);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}	

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */