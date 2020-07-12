<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('usuariosinterfaz');
		$this->load->view('template/footer');
	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */