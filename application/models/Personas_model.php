<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model {

	/*public function getDataPersonas()
	{
		$query = $this->db->get('persona');
		return $query->result_array();
	}*/

	// Eliminando registro de la tabla persona por su id(id)
    public function delete($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('persona');
    }

    // Obteniendo registro en base al id
    public function get_by_id($id)
    {
    	return $this->db->get_where('persona', array('id' => $id ))->row();
    	// select * from persona where id = $id limit 1;
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('persona', $data);
    }
    
    // Método para insertar un nuevo registro en tabla persona
    public function insert($data)
    {
        return $this->db->insert('persona', $data);
    }

    // Consigue intervalos de la tabla persona
    public function get_personas($limit, $offset )
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('persona');

        return $query->result_array();   
    }

    // Conteo de tabla persona
    public function get_count()
    {
        return $this->db->count_all('persona');
    }
}

/* End of file Personas_model.php */
/* Location: ./application/models/Personas_model.php */