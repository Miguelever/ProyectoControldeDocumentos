<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Documentos_model');
		
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

/* End of file Documentos.php */
/* Location: ./application/controllers/Documentos.php */