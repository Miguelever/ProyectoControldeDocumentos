<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model {

	public function getDataPersonas()
	{
		$query = $this->db->get('persona');
		return $query->result_array();
	}

	// Eliminando registro de la tabla persona por su id(dni)
    public function delete($dni)
    {
    	$this->db->where('id', $dni);
    	$this->db->delete('persona');
    }

    // Obteniendo registro en base al dni
    public function get_by_id($dni)
    {
    	return $this->db->get_where('persona', array('id' => $dni ))->row();
    	// select * from persona where id = $dni limit 1;
    }

    public function update($dni, $data) {
        $this->db->where('id', $dni);
        $this->db->update('persona', $data);
    }


}

/* End of file Personas_model.php */
/* Location: ./application/models/Personas_model.php */