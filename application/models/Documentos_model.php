<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos_model extends CI_Model {

    /*public function getDataDocumentos()
    {
    	$query = $this->db->get('documentos');
    	return $query->result_array();
    }*/
	
	// Eliminando registro de la tabla documento por su id(dni)
    public function delete($expe)
    {
    	$this->db->where('expediente', $expe);
    	$this->db->delete('documentos');
    }

    // Obteniendo registro en base al expediente
    public function get_by_id($expe)
    {
    	return $this->db->get_where('documentos', array('expediente' => $expe ))->row();
    	// select * from documentos where expediente = $expe limit 1;
    }

    public function update($expe, $data) {
        $this->db->where('expediente', $expe);
        $this->db->update('documentos', $data);
    }

    // Método para insertar un nuevo registro en tabla documentos
    public function insert($data)
    {
        return $this->db->insert('documentos', $data);
    }

    // Consigue intervalos de la tabla documentos
    public function get_documentos($limit, $offset)
    {
        $this->db->like('expediente', $this->session->userdata('expediente'));
        $this->db->like('nombre_doc', $this->session->userdata('npmbre_doc'));
        $this->db->like('tipo_doc', $this->session->userdata('tipo_doc'));
        $this->db->like('persona_id', $this->session->userdata('persona_id'));
        $this->db->like('fecha_entrega', $this->session->userdata('fecha_entrega'));
        $this->db->like('fecha_vencimiento', $this->session->userdata('fecha_vencimiento'));
        $this->db->like('usuario_id', $this->session->userdata('usuario_id'));
        $this->db->like('estado', $this->session->userdata('estado'));
        $this->db->like('directorio', $this->session->userdata('directorio'));

        $this->db->limit($limit, $offset);
        $query = $this->db->get('documentos');

        return $query->result_array();
    }

    // Conteo de tabla documentos
    public function get_count()
    {
        
        $this->db->like('expediente', $this->session->userdata('expediente'));
        $this->db->like('nombre_doc', $this->session->userdata('npmbre_doc'));
        $this->db->like('tipo_doc', $this->session->userdata('tipo_doc'));
        $this->db->like('persona_id', $this->session->userdata('persona_id'));
        $this->db->like('fecha_entrega', $this->session->userdata('fecha_entrega'));
        $this->db->like('fecha_vencimiento', $this->session->userdata('fecha fecha_vencimiento'));
        $this->db->like('usuario_id', $this->session->userdata('usuario_id'));
        $this->db->like('estado', $this->session->userdata('estado'));
        $this->db->like('directorio', $this->session->userdata('directorio'));

        $this->db->select();
        $this->db->from('documentos');
        return $this->db->count_all_results();
    }


}

/* End of file Documentos_model.php */
/* Location: ./application/models/Documentos_model.php */