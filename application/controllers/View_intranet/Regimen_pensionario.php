<?php  defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 	
 */
class Regimen_pensionario extends CI_Controller
{
	
	function __construct()		
	{
		parent::__construct(); 
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Regimen_pensionario_model");
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data = array(
			'title' =>array("estas en regimen pensionario","Regimen Pensionario","",""),
			'lista_pensionario_regimen' => $this->Regimen_pensionario_model->lista_pensionario_regimen(),
			'ts_datos_enfermedades' => $this->Regimen_pensionario_model->ts_datos_enfermedades(),
			'lista_de_salud' => $this->Regimen_pensionario_model->lista_de_salud($this->session->userdata("session_id")),

		);

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/regimen_pensionario",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function update_regimen()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->session->userdata("session_id");

		$data = array(
			'regimen' =>$this->input->post("regimen"),
		);

		$this->Regimen_pensionario_model->update_regimen($id,$data);
		echo json_encode(array("mensaje"=>"Se actualizo Correctamente"));
		

	}
} ?>