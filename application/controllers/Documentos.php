<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Documentos_model');
		$this->load->library('form_validation');
		$this->load->model('Personas_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->library('session');
	}
	
	public function mostrar()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}

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

		//$data['documentos'] = $this->Documentos_model->getDataDocument
		$this->load->view('template/header');
		$this->load->view('documentos/mostrar', $data);
		$this->load->view('template/footer');
		
	}

	public function ingresar()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}

		$this->load->view('template/header');
		$this->load->view('documentos/ingresar');
		$this->load->view('template/footer');
	}
	public function registrar(){
		$data['activar'] = 'documentos';
		$this->load->view('documentos/registrar');
	}
	public function buscar()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}
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
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}

		$this->Documentos_model->delete($expe);

		redirect(base_url('documentos/mostrar'));
	}

	public function editar($expe)
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}
		$data['documentos'] = $this->Documentos_model->get_by_id($expe);
		$this->load->view('template/header');
		$this->load->view('documentos/editar', $data);
		$this->load->view('template/footer');
	}


    public function actualizar($expe)
	{

		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}

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
								'estado'=> $this->input->post('estado'),	
								'directorio'=> $this->input->post('directorio'));

				$this->Documentos_model->update($expe,$data);
				redirect(base_url('documentos/mostrar'));
			}

	}

	public function crear()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}

		$this->load->view('template/header');
		$this->load->view('documentos/ingresar');
		$this->load->view('template/footer');
	}

	public function guardar()
	{

		if (!$this->session->userdata('logged_in')) 
		{
			$this->session->set_flashdata('msg', "Acceso no autorizado.");
			redirect(base_url('login'));
		}
			$this->form_validation->set_rules('expediente', 'Expediente', 'trim|required|is_unique[documentos.expediente]', array('required' => 'El ingreso de expediente es obligatorio', 'is_unique' => 'El expediente ya se encuentra registrado'));
			$this->form_validation->set_rules('nombre_doc', 'Nombre del Documento', 'trim|required', array('required' => 'El ingreso del Nombre del Documento es obligatorio'));
			$this->form_validation->set_rules('tipo_doc', 'Tipo de Documento', 'trim|required', array('required' => 'El ingreso del Tipo de Documento es obligatorio'));
			$this->form_validation->set_rules('persona_id', 'Persona ID', 'trim|required|numeric', array('required' => 'El ingreso de Persona ID es obligatorio', 'numeric'=> 'El ingreso de Persona ID es con números'));
			$this->form_validation->set_rules('fecha_entrega', 'Fecha de Entrega', 'trim|required', array('required' => 'El ingreso del la Fecha de Entrega es obligatorio'));
			$this->form_validation->set_rules('fecha_vencimiento', 'Fecha de Vencimiento', 'trim|required', array('required' => 'El ingreso del la Fecha de Vencimiento es obligatorio'));
			$this->form_validation->set_rules('usuario_id', 'Usuario ID', 'trim|required', array('required' => 'El ingreso del Usuario ID es obligatorio'));
			$this->form_validation->set_rules('estado', 'Estado', 'trim|required', array('required' => 'El ingreso del Estado es obligatorio'));
			///$this->form_validation->set_rules('directorio', 'Directorio', 'trim|required', array('required' => 'El ingreso del directorio es obligatorio'));



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
							'estado'=> $this->input->post('estado'),
							'directorio'=> $this->input->post('expediente').".pdf");

				
				$this->subir($this->input->post('expediente'));

				$this->Documentos_model->insert($data);
				redirect(base_url('documentos/mostrar'));
			}
		
	}

public function notificar($expe)
	{
		$data['documentos'] = $this->Documentos_model->get_by_id($expe);
		
		$data['persona'] = $this->Personas_model->get_by_id($data['documentos']-> persona_id);
		//print_r($data['persona']);
		$data['activar'] = 'documentos';
		$this->load->view('template/header', $data);
		$this->load->view('documentos/notificar', $data);
		$this->load->view('template/footer');


}

public function subir($numero_expediente) {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
        $config['file_name'] = $numero_expediente;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());
           // print_r($error);

            //$this->load->view('files/upload_form', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            //$this->load->view('files/upload_result', $data);
        }
    }
	
	public function guardarNotificar()
	{

				$email = $this->input->post('email');
				$asunto = $this->input->post('asunto');
				$mensaje = $this->input->post('mensaje');
		    	/*print_r($this->input->post('expediente'));
		    	
		    	print_r($this->input->post('asunto'));
		    	print_r($this->input->post('mensaje'));
				*/

		    	//Cargamos la librería email
       			$this->load->library('email');

       			//ini_set();
				$this->email->from('saingrid@gmail.com', 'Ingrid');
				$this->email->to($email);
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject($asunto);
				$this->email->message($mensaje);

				$this->email->send();
       			
		        echo $this->email->print_debugger();
		    	/*
		    	$data = array('expediente' => $this->input->post('expediente'),
							'nombre_doc'=> $this->input->post('nombre_doc'),
							'tipo_doc'=> $this->input->post('tipo_doc'),
							'persona_id'=> $this->input->post('persona_id'),
							'fecha_entrega'=> $this->input->post('fecha_entrega'),
							'fecha_vencimiento'=> $this->input->post('fecha_vencimiento'),
							'usuario_id'=> $this->input->post('usuario_id'),
							'estado'=> $this->input->post('estado'),
							'directorio'=> $this->input->post('directorio'));
				*/
				//$this->Documentos_model->insert($data);
				//redirect(base_url('documentos/mostrar'));
			//}
		
	}



}
/* End of file Documentos.php */
/* Location: ./application/controllers/Documentos.php */
