<?php  defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */ 
class Datos_familiares extends CI_Controller
{
	
	
	function __construct()			
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Datos_familiares_model");
	}

	public function index()
	{
		$this->load->model("Ficha_personal_model");
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data = array(
			'title' =>array("estas en datos familiares","Datos Familiares","","Evaristo Escudero Huillcamascco"),
			'datos_familiares' => $this->Ficha_personal_model->datos_familiares(),
			'datos_referentes' => $this->Ficha_personal_model->datos_referentes(),

		);

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/datos_familiares",$data);
		$this->load->view("intranet_view/footer",$data);

		
    }

 

} ?>