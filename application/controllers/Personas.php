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
		$this->load->view('personas/mostrar', $data);
		$this->load->view('template/footer');
	}

	public function eliminar($dni)
	{
		$this->Personas_model->delete($dni);

		redirect(base_url('personas/mostrar'));
	}

	public function editar($dni)
	{
		$data['persona'] = $this->Personas_model->get_by_id($dni);
		$this->load->view('template/header');
		$this->load->view('personas/editar', $data);
		$this->load->view('template/footer');
	}


    public function actualizar($dni)
	{

		$data = array('id' => $this->input->post('id'),
						'cui'=> $this->input->post('cui'),
						'nombre'=> $this->input->post('nombre'),
						'apellidos'=> $this->input->post('apellidos'),
						'cargo'=> $this->input->post('cargo'),
						'correo'=> $this->input->post('correo'),
						'celular'=> $this->input->post('celular')	);

		$this->Personas_model->update($dni,$data);
		redirect(base_url('personas/mostrar'));

	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */