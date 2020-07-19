<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		
	}

	public function index()
	{
		$this->load->view('login/login');
	}

	public function verificar()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//echo password_hash('director', PASSWORD_DEFAULT);
		//$this->Login_model->checking($username, $password);
		if($this->Login_model->checking($username, $password))
		{
			$info = $this->Login_model->infousuario($username);
			$array = array(
				'username' => $info[0]['username'],
				'nombreusuario' => $info[0]['nombre'],
				'cargousuario' => $info[0]['cargo'],
				'logged_in' => TRUE
			);
			
			$this->session->set_userdata( $array );
			redirect(base_url('documentos/mostrar'));
		}
		else
		{
			$this->session->set_flashdata('msg', "Usuario o contraseña no han coincidido");
			redirect(base_url('login'));
		}
	}

	public function autorizar($page)
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nombreusuario');
		$this->session->unset_userdata('cargousuario');
		$this->session->unset_userdata('logged_in');
		redirect(base_url('login'));
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */