<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Documentos_model');
		
	}
	public function mostrar()
	{
		$data['documentos'] = $this->Documentos_model->getDataDocumentos();
		$this->load->view('template/header');
		$this->load->view('documentosinterfaz', $data);
		$this->load->view('template/footer');

	}
	public function ingresar()
	{
		$this->load->view('template/header');
		$this->load->view('ingresardocumentos');
		$this->load->view('template/footer');
	}

}

/* End of file Documentos.php */
/* Location: ./application/controllers/Documentos.php */