<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Personas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personas_model');
	}

	public function mostrar()
	{
		$data['personas'] = $this->Personas_model->getDataPersonas();
		$this->load->view('template/header');
		$this->load->view('personasinterfaz', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */