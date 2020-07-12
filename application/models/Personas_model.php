<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model {

	public function getDataPersonas()
	{
		$query = $this->db->get('persona');
		return $query->result_array();
	}

}

/* End of file Personas_model.php */
/* Location: ./application/models/Personas_model.php */