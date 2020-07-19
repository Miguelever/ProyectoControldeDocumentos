<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function mostrar()
	{
		$data['activar'] = 'dashboard';
		$this->load->view('template/header', $data);
		$this->load->view('dashboard/dashboard');
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */