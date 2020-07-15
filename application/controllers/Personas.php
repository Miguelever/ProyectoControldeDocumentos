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

	public function eliminar($id)
	{
		$this->Personas_model->delete($id);

		redirect(base_url('personas/mostrar'));
	}

	public function editar($id)
	{
		$data['persona'] = $this->Personas_model->get_by_id($id);
		$this->load->view('template/header');
		$this->load->view('personas/editar', $data);
		$this->load->view('template/footer');
	}


    public function actualizar($id)
	{


		// Reglas de validación para el formulario
		$original_dni = $this->db->query( "SELECT dni FROM persona WHERE id= ".$id)->row()->dni;
		if ($this->input->post('dni') != $original_dni) 
		{
			$dni_unique = '|is_unique[persona.dni]';
		} 
		else 
		{
			$dni_unique = '';
		}
		

		$this->form_validation->set_rules('dni', 'DNI', 'trim|required|numeric'.$dni_unique, array('required' => 'El ingreso de DNI es obligatorio', 'numeric' => 'El ingreso de DNI es con´números','is_unique' => 'El DNI ya se encuentra registrado'));
		$this->form_validation->set_rules('cui', 'CUI', 'trim|numeric|min_length[8]',array('numeric' => 'El ingreso de CUI es con números', 'min_length' => 'Ingrese 8 dígitos' ));
		$this->form_validation->set_rules('nombre', 'Nombres', 'trim|required', array('required' => 'Ingreso de Nombre obligatorio'));
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required', array('required' => 'Ingreso de Apellidos obligatorio'));
		$this->form_validation->set_rules('cargo', 'cargo', 'trim|required', array('required' => 'Ingrese el cargo respectivo'));
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email', array('required' => 'Ingreso de Correo obligatorio', 'valid_email' => 'Correo no válido'));
		$this->form_validation->set_rules('celular', 'Celular', 'trim|numeric', array('numeric' => 'El ingreso de celular es solo con números'));
		

        if ($this->form_validation->run() == FALSE) 
        {
        	$data['persona'] = $this->Personas_model->get_by_id($id);
        	$this->load->view('template/header');
			$this->load->view('personas/editar', $data);
			$this->load->view('template/footer');
        } 
        else 
        {
			$data = array('id' => $id,
							'dni' => $this->input->post('dni'),
							'cui'=> $this->input->post('cui'),
							'nombre'=> $this->input->post('nombre'),
							'apellidos'=> $this->input->post('apellidos'),
							'cargo'=> $this->input->post('cargo'),
							'correo'=> $this->input->post('correo'),
							'celular'=> $this->input->post('celular')	);

			$this->Personas_model->update($id,$data);
			redirect(base_url('personas/mostrar'));
		}
	}

	public function crear()
	{
		$this->load->view('template/header');
		$this->load->view('personas/ingresar');
		$this->load->view('template/footer');
	}

	public function guardar()
	{
		$this->form_validation->set_rules('dni', 'DNI', 'trim|required|numeric|is_unique[persona.dni]', array('required' => 'El ingreso de DNI es obligatorio', 'numeric' => 'El ingreso de DNI es con´números', 'is_unique' => 'El DNI ya se encuentra registrado'));
		$this->form_validation->set_rules('cui', 'CUI', 'trim|numeric|min_length[8]',array('numeric' => 'El ingreso de CUI es con números', 'min_length' => 'Ingrese 8 dígitos' ));
		$this->form_validation->set_rules('nombre', 'Nombres', 'trim|required', array('required' => 'Ingreso de Nombre obligatorio'));
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required', array('required' => 'Ingreso de Apellidos obligatorio'));
		$this->form_validation->set_rules('cargo', 'cargo', 'trim|required', array('required' => 'Ingrese el cargo respectivo'));
		$this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email', array('required' => 'Ingreso de Correo obligatorio', 'valid_email' => 'Correo no válido'));
		$this->form_validation->set_rules('celular', 'Celular', 'trim|numeric', array('numeric' => 'El ingreso de celular es solo con números'));
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
        	$data = array('dni' => $this->input->post('dni'),
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