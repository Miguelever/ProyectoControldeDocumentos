<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos_model extends CI_Model {

    public function getDataDocumentos()
    {
    	$query = $this->db->get('documentos');
    	return $query->result_array();
    }

}

/* End of file Documentos_model.php */
/* Location: ./application/models/Documentos_model.php */