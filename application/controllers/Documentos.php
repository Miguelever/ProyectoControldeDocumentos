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
		$this->load->library('pagination');
		
		$config['base_url'] = base_url('documentos/mostrar');
		$config['total_rows'] = $this->Documentos_model->get_count();
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

        
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data["links"] = $this->pagination->create_links();

		$data['documentos'] = $this->Documentos_model->get_documentos($config['per_page'] , $page);


		//$data['documentos'] = $this->Documentos_model->getDataDocumentos();
		$data['activar'] = 'documentos';
		$this->load->view('template/header', $data);
		$this->load->view('documentos/mostrar', $data);
		$this->load->view('template/footer');

	}

	public function ingresar()
	{
		$data['activar'] = 'documentos';
		$this->load->view('template/header', $data);
		$this->load->view('documentos/ingresar');
		$this->load->view('template/footer');
	}
	public function buscar()
	{
		if ($this->input->post('action') == 'Buscar') 
		{
			$array = array(
					'expediente' => $this->input->post('expediente'),
					'nombre_doc'=> $this->input->post('nombre_doc'),
					'tipo_doc'=> $this->input->post('tipo_doc'),
					'persona_id'=> $this->input->post('persona_id'),
					'fecha_entrega'=> $this->input->post('fecha_entrega'),
					'fecha_vencimiento'=> $this->input->post('fecha_vencimiento'),
					'usuario_id'=> $this->input->post('usuario_id'),
					'estado'=> $this->input->post('estado'),	
					'directorio'=> $this->input->post('directorio')
			);
			// Guardar variables globales 
			$this->session->set_userdata( $array );
		}
		else
		{
			// Delete
			$this->session->unset_userdata('expediente');
			$this->session->unset_userdata('nombre_doc');
			$this->session->unset_userdata('tipo_doc');
			$this->session->unset_userdata('persona_id');
			$this->session->unset_userdata('fecha_entrega');
			$this->session->unset_userdata('fecha_vencimiento');
			$this->session->unset_userdata('usuario_id');
			$this->session->unset_userdata('estado');
			$this->session->unset_userdata('directorio');
		}

		redirect(base_url('documentos/mostrar'));
		
	}



	public function eliminar($expe)
	{
		$this->Documentos_model->delete($expe);

		redirect(base_url('documentos/mostrar'));
	}

	public function editar($expe)
	{
		$data['documentos'] = $this->Documentos_model->get_by_id($expe);
		$data['activar'] = 'documentos';
		$this->load->view('template/header', $data);
		$this->load->view('documentos/editar', $data);
		$this->load->view('template/footer');
	}


    public function actualizar($expe)
	{

		if ($this->input->post('expediente') != $expe) 
		{
			$expe_unique = '|is_unique[documentos.expediente]';
		} else {
			$expe_unique = '';
		}
		
		$this->form_validation->set_rules('expediente', 'Expediente', 'trim|required'.$expe_unique, array('required' => 'El ingreso de expediente es obligatorio', 'is_unique' => 'El expediente ya se encuentra registrado'));
			$this->form_validation->set_rules('nombre_doc', 'Nombre del Documento', 'trim|required', array('required' => 'El ingreso del Nombre del Documento es obligatorio'));
			$this->form_validation->set_rules('tipo_doc', 'Tipo de Documento', 'trim|required', array('required' => 'El ingreso del Tipo de Documento es obligatorio'));
			$this->form_validation->set_rules('persona_id', 'Persona ID', 'trim|required|numeric', array('required' => 'El ingreso de Persona ID es obligatorio', 'numeric'=> 'El ingreso de Persona ID es con números'));
			$this->form_validation->set_rules('fecha_entrega', 'Fecha de Entrega', 'trim|required', array('required' => 'El ingreso del la Fecha de Entrega es obligatorio'));
			$this->form_validation->set_rules('fecha_vencimiento', 'Fecha de Vencimiento', 'trim|required', array('required' => 'El ingreso del la Fecha de Vencimiento es obligatorio'));
			$this->form_validation->set_rules('usuario_id', 'Usuario ID', 'trim|required', array('required' => 'El ingreso del Usuario ID es obligatorio'));
			$this->form_validation->set_rules('estado', 'Estado', 'trim|required', array('required' => 'El ingreso del Estado es obligatorio'));
			$this->form_validation->set_rules('directorio', 'Directorio', 'trim|required', array('required' => 'El ingreso del directorio es obligatorio'));

			if ($this->form_validation->run() == FALSE) 
		    {
		    	$data['documentos'] = $this->Documentos_model->get_by_id($expe);
		    	$data['activar'] = 'documentos';
		    	$this->load->view('template/header', $data);
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
								'estado'=> $this->input->post('estado'),	
								'directorio'=> $this->input->post('directorio'));

				$this->Documentos_model->update($expe,$data);
				redirect(base_url('documentos/mostrar'));
			}

	}

	public function crear()
	{
		$data['activar'] = 'documentos';
		$this->load->view('template/header', $data);
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
			$this->form_validation->set_rules('directorio', 'Directorio', 'trim|required', array('required' => 'El ingreso del directorio es obligatorio'));



			if ($this->form_validation->run() == FALSE) 
		    {
		    	$data['activar'] = 'documentos';
		    	$this->load->view('template/header', $data);
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
							'estado'=> $this->input->post('estado'),
							'directorio'=> $this->input->post('directorio'));

				$this->Documentos_model->insert($data);
				redirect(base_url('documentos/mostrar'));
			}
		
	}


}

/* End of file Documentos.php */
/* Location: ./application/controllers/Documentos.php */