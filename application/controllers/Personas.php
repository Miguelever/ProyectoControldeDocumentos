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
		
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('personas/mostrar');
		$config['total_rows'] = $this->Personas_model->get_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		// $config['num_links'] = 3;
		$config['first_link'] = 'Inicio';
		$config['last_link'] = 'Final';
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
		/*$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'Inicio';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Final';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';*/
		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data["links"] = $this->pagination->create_links();

		$data['personas'] = $this->Personas_model->get_personas($config['per_page'] , $page);

		//$data['personas'] = $this->Personas_model->getDataPersonas();
		$data['activar'] = 'persona';
		$this->load->view('template/header', $data);
		$this->load->view('personas/mostrar', $data);
		$this->load->view('template/footer');
	}

	public function buscar()
	{
		if ($this->input->post('action') == 'Buscar') 
		{
			$array = array(
					'dni' => $this->input->post('dni'),
					'cui'=> $this->input->post('cui'),
					'nombre'=> $this->input->post('nombre'),
					'apellidos'=> $this->input->post('apellidos'),
					'cargo'=> $this->input->post('cargo'),
					'correo'=> $this->input->post('correo'),
					'celular'=> $this->input->post('celular')
			);
			// Guardar variables globales 
			$this->session->set_userdata( $array );
		}
		else
		{
			// Delete
			$this->session->unset_userdata('dni');
			$this->session->unset_userdata('cui');
			$this->session->unset_userdata('nombre');
			$this->session->unset_userdata('apellidos');
			$this->session->unset_userdata('cargo');
			$this->session->unset_userdata('correo');
			$this->session->unset_userdata('celular');
		}

		redirect(base_url('personas/mostrar'));
		
	}

	public function eliminar($id)
	{
		$this->Personas_model->delete($id);

		redirect(base_url('personas/mostrar'));
	}

	public function editar($id)
	{
		$data['persona'] = $this->Personas_model->get_by_id($id);
		$data['activar'] = 'persona';
		$this->load->view('template/header', $data);
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
        	$data['activar'] = 'persona';
        	$this->load->view('template/header', $data);
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

	public function ingresar()
	{
		$data['activar'] = 'persona';
		
		$this->load->view('template/header', $data);
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
        	$data['activar'] = 'persona';
        	$this->load->view('template/header', $data);
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