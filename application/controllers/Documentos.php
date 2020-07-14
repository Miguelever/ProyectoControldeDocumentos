<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Documentos_model');
		$this->load->library('form_validation');
		
	}
	public function mostrar()
	{
		$data['documentos'] = $this->Documentos_model->getDataDocumentos();
		$this->load->view('template/header');
		$this->load->view('documentos/mostrar', $data);
		$this->load->view('template/footer');

	}

	public function ingresar()
	{
		$this->load->view('template/header');
		$this->load->view('documentos/ingresar');
		$this->load->view('template/footer');
	}

	public function eliminar($expe)
	{
		$this->Documentos_model->delete($expe);

		redirect(base_url('documentos/mostrar'));
	}

	public function editar($expe)
	{
		$data['documentos'] = $this->Documentos_model->get_by_id($expe);
		$this->load->view('template/header');
		$this->load->view('documentos/editar', $data);
		$this->load->view('template/footer');
	}


    public function actualizar($expe)
	{

		$this->form_validation->set_rules('expediente', 'Expediente', 'trim|required|is_unique[documentos.expediente]', array('required' => 'El ingreso de expediente es obligatorio', 'is_unique' => 'El expediente ya se encuentra registrado'));
			$this->form_validation->set_rules('nombre_doc', 'Nombre del Documento', 'trim|required', array('required' => 'El ingreso del Nombre del Documento es obligatorio'));
			$this->form_validation->set_rules('tipo_doc', 'Tipo de Documento', 'trim|required', array('required' => 'El ingreso del Tipo de Documento es obligatorio'));
			$this->form_validation->set_rules('persona_id', 'Persona ID', 'trim|required|numeric', array('required' => 'El ingreso de Persona ID es obligatorio', 'numeric'=> 'El ingreso de Persona ID es con números'));
			$this->form_validation->set_rules('fecha_entrega', 'Fecha de Entrega', 'trim|required', array('required' => 'El ingreso del la Fecha de Entrega es obligatorio'));
			$this->form_validation->set_rules('fecha_vencimiento', 'Fecha de Vencimiento', 'trim|required', array('required' => 'El ingreso del la Fecha de Vencimiento es obligatorio'));
			$this->form_validation->set_rules('usuario_id', 'Usuario ID', 'trim|required', array('required' => 'El ingreso del Usuario ID es obligatorio'));
			$this->form_validation->set_rules('estado', 'Estado', 'trim|required', array('required' => 'El ingreso del Estado es obligatorio'));

			if ($this->form_validation->run() == FALSE) 
		    {
		    	$data['documentos'] = $this->Documentos_model->get_by_id($expe);
		    	$this->load->view('template/header');
				$this->load->view('documentos/editar', $data);
				$this->load->view('template/footer');
		    } 
		    else 
		    {	
				$data = array('expediente' => $this->input->post('expediente'),
								'nombre_doc'=> $this->input->post('nombre_doc'),
								'tipo_doc'=> $this->input->post('tipo_doc'),
								'persona_id'=> $this->input->post('persona_id'),
								'fecha_entrega'=> $this->input->post('fecha_entrega'),
								'fecha_vencimiento'=> $this->input->post('fecha_vencimiento'),
								'usuario_id'=> $this->input->post('usuario_id'),
								'estado'=> $this->input->post('estado')	);

				$this->Documentos_model->update($expe,$data);
				redirect(base_url('documentos/mostrar'));
			}

	}

	public function crear()
	{
		$this->load->view('template/header');
		$this->load->view('documentos/ingresar');
		$this->load->view('template/footer');
	}

	public function guardar()
	{

			$this->form_validation->set_rules('expediente', 'Expediente', 'trim|required|is_unique[documentos.expediente]', array('required' => 'El ingreso de expediente es obligatorio', 'is_unique' => 'El expediente ya se encuentra registrado'));
			$this->form_validation->set_rules('nombre_doc', 'Nombre del Documento', 'trim|required', array('required' => 'El ingreso del Nombre del Documento es obligatorio'));
			$this->form_validation->set_rules('tipo_doc', 'Tipo de Documento', 'trim|required', array('required' => 'El ingreso del Tipo de Documento es obligatorio'));
			$this->form_validation->set_rules('persona_id', 'Persona ID', 'trim|required|numeric', array('required' => 'El ingreso de Persona ID es obligatorio', 'numeric'=> 'El ingreso de Persona ID es con números'));
			$this->form_validation->set_rules('fecha_entrega', 'Fecha de Entrega', 'trim|required', array('required' => 'El ingreso del la Fecha de Entrega es obligatorio'));
			$this->form_validation->set_rules('fecha_vencimiento', 'Fecha de Vencimiento', 'trim|required', array('required' => 'El ingreso del la Fecha de Vencimiento es obligatorio'));
			$this->form_validation->set_rules('usuario_id', 'Usuario ID', 'trim|required', array('required' => 'El ingreso del Usuario ID es obligatorio'));
			$this->form_validation->set_rules('estado', 'Estado', 'trim|required', array('required' => 'El ingreso del Estado es obligatorio'));



			if ($this->form_validation->run() == FALSE) 
		    {
		    	$this->load->view('template/header');
				$this->load->view('documentos/ingresar');
				$this->load->view('template/footer');
		    } 
		    else 
		    {	
				$data = array('expediente' => $this->input->post('expediente'),
							'nombre_doc'=> $this->input->post('nombre_doc'),
							'tipo_doc'=> $this->input->post('tipo_doc'),
							'persona_id'=> $this->input->post('persona_id'),
							'fecha_entrega'=> $this->input->post('fecha_entrega'),
							'fecha_vencimiento'=> $this->input->post('fecha_vencimiento'),
							'usuario_id'=> $this->input->post('usuario_id'),
							'estado'=> $this->input->post('estado'));

				$this->Documentos_model->insert($data);
				redirect(base_url('documentos/mostrar'));
			}
		
	}


}

/* End of file Documentos.php */
/* Location: ./application/controllers/Documentos.php */