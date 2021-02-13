<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * 
  */
 class Historial extends CI_controller
 {
 	
 	function __construct(	)
 	{
 		parent::__construct();
 		ini_set('date.timezone', 'America/Lima');
 		$this->load->model("Historial_model");
 	}

 	public function index()
 	{
 		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = array(
			'title' =>array("estas viendo historial de registro de pacientes","Registro por Usuario","","Evaristo Escudero Huillcamascco"),
			'lista_historia_registro_x_usuario'=> $this->Historial_model->lista_historia_registro_x_usuario(),
			
		);
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("atencion/index",$data);
		$this->load->view("intranet_view/footer",$data);
 	}


 	public function Registrar_historial()
 	{
 		if ($this->session->userdata("session_id")=="") {
 			redirect(base_url().'Inicio/Zona_roja/');
 		}
 		$id_usuario = $this->session->userdata("session_id");

 		if ($this->input->method() === 'post') {
 			$query = $this->db->query("select * from ts_historial_registro where dni='".$this->input->post("dni")."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El paciente ya se encuentra registrado'));
             $this->output->set_status_header(400);
        }else{
        $data = array(
            'id_usuario' => $id_usuario,
            'fecha' => date('Y-m-d h:i:s'),
            'paciente' => $this->input->post("paciente"),
            'dni' => $this->input->post("dni"),
            'empresa' => $this->input->post("empresa"),
            'check' => $this->input->post("check")
        );
        $this->Historial_model->agregar_registrar_historial($data);
        echo json_encode(array('mensaje'=>'Se registro de manera Correcta'));
		}
 		}else{
 			redirect(base_url().'Inicio/Zona_roja/');
 		}

 		
	}

	public function Cargar_historial()		
	{
		$data = $this->Historial_model->lista_historia_registro_x_usuario();
		echo json_encode($data);
	}
 	
 } ?>