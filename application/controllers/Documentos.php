<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('documentosinterfaz');
		$this->load->view('template/footer');

	}

}

/* End of file Documentos.php */
/* Location: ./application/controllers/Documentos.php */