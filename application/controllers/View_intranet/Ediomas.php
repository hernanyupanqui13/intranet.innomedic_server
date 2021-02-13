<?php  defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Ediomas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Ediomas_model");
	} 

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("estas viendo Ediomas","Ediomas","<a href='javascript:void(0)' class='btn btn-info d-none d-lg-block m-l-15' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-plus-circle'></i>&nbsp;Agregar Edioma</a>","Evaristo Escudero Huillcamascco"),
			'edioma' =>$this->Ediomas_model->edioma(),
			'tipo_nivel' => $this->Ediomas_model->tipo_nivel(),
		);
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/ediomas",$data);
		$this->load->view("intranet_view/footer",$data);
	}
	public function Cargar_ediomas()		
	{
		$data = $this->Ediomas_model->Cargar_ediomas();
		echo json_encode($data);
	}

	public function Insert_ediomas()
	{

		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		if ($this->input->method() === 'post') {

			$query = $this->db->query("select * from ts_ediomas where ediomas_id='".$this->input->post("ediomas_id")."' and id_usuario='".$this->session->userdata("session_id")."'");
		        $row = $query->row();
		        if(isset($row)){ // cuando es mayor que vacio o cero
		          echo json_encode(array('error'=>'Edioma ya se encuentra registrado'));
		         $this->output->set_status_header(400);
		    	}else{
		    		$data = array(
					'ediomas_id' =>$this->input->post("ediomas_id"),
					'nivel_id' => $this->input->post("nivel_id"),
					'url' => $this->input->post("url"),
					'id_usuario' => $this->session->userdata("session_id"),
					);

					$this->Ediomas_model->Insert_ediomas($data);
					echo json_encode(array("mensaje"=>"Se registro de manera correcta"));

		    	}
				
		
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	public function Eliminar_Ediomas()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		if ($this->input->method()==='post') {
			$id = $this->input->post("user_id");
			$this->Ediomas_model->Eliminar_Ediomas($id);
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
		
	}
		

		
} ?>