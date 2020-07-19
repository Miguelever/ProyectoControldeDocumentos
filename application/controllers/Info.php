<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller 
{

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('info/about');
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */