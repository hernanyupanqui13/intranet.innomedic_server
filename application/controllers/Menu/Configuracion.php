<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Configuracion extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Configuracion_menu_model");

	}

	

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		} 

		$data = array(
			'title' =>array("estas configurando los accesos de Usuarios","Lista de Usuarios","<a class='text-white' href='javascript:void(0)'>Agregar Nuevo Usuario</a>","Evaristo Escudero Huillcamascco"),
			'perfil' => $this->Configuracion_menu_model->perfil(),
			'menu' => $this->Configuracion_menu_model->menu(),
			//'lista_accesos' => $this->Configuracion_menu_model->lista_accesos(),
			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('menu/index',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function agregar_menu_items()
	{
		$perfil_x = $this->input->post("perfilx");

		$query = $this->db->query("select * from ts_menu_items where menu='".trim($this->input->post("nombrex"))."' and perfil='".trim($this->input->post("perfilx"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'No puedes duplicar el registro dos veces'));
             $this->output->set_status_header(400);
          }else{
          	$data = array(
				'menu' => $this->input->post("nombrex"),
				'estado'=> 1,
				'perfil' => $this->input->post("perfilx"),
				'created' => date("Y-m-d h:i:s"),
			);

			$this->Configuracion_menu_model->insert_data($data);
          }
		
	}

	public function eliminar_datos_idx()
	{
		if ($this->session->userdata("session_id")=="") {
			redirec(base_url().'Inicio/Zona_roja/');
		}

		$this->Configuracion_menu_model->eliminar_datos_idx($_POST["user_id"]);
	}

	//copy de netaxxes

	public function lista_menu()
	{
		$perfil = $this->input->post("perfil");
		$data = $this->Configuracion_menu_model->lista_accesos($perfil);
		echo json_encode($data);
	}

	

	

	

	
} ?>