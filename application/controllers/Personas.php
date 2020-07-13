<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Personas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personas_model');
		$this->load->library('form_validation');

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

	public function crear()
	{
		$this->load->view('template/header');
		$this->load->view('personas/ingresar');
		$this->load->view('template/footer');
	}

	public function guardar()
	{
		$this->form_validation->set_rules('id', 'DNI', 'required|numeric', array('required' => 'El ingreso de DNI es obligatorio', 'numeric' => 'El ingreso de DNI es con´números'));

		/*
		$rules = array(
            array(
                'field' => 'id',
                'label' => 'DNI',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El ingreso de DNI es obligatorio',
                ),
            ));
		$this->form_validation->set_rules($rules);*/


        if ($this->form_validation->run() == FALSE) 
        {
        	$this->load->view('template/header');
			$this->load->view('personas/ingresar');
			$this->load->view('template/footer');
        } 
        else 
        {
        	$data = array('id' => $this->input->post('id'),
						'cui'=> $this->input->post('cui'),
						'nombre'=> $this->input->post('nombre'),
						'apellidos'=> $this->input->post('apellidos'),
						'cargo'=> $this->input->post('cargo'),
						'correo'=> $this->input->post('correo'),
						'celular'=> $this->input->post('celular')	);
			$this->Personas_model->insert($data);
			redirect(base_url('personas/mostrar'));
        }	

	}

}

/* End of file Usuarios.php */
/* Location: ./application/controllers/Usuarios.php */