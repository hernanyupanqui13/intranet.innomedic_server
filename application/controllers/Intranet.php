<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Intranet extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	    ini_set('date.timezone', 'America/Lima');
	}

	public function index()
	{
		if ($this->session->userdata("session_id")!="") {
			redirect(base_url()."Intranet_view/");
		}

		$data = array(
			'title' =>array("Ingreso al Intranet","",""),
		);
		$this->load->view("login/Intranet",$data);
	}

	public function validate_intranet()
	{
		if($this->session->userdata('session_id')!=''){
            redirect(base_url());
        }
		// aqui cargamos el modelo de Login
		// provional y luego vemos que podemos hacer
		$this->load->model("Login_model");

		$this->form_validation->set_error_delimiters('', '');
		$rules = login_rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()==FALSE) {
			$errors = array(
				'username' => form_error('username'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{
 
			$usuario = $this->input->post('username');
			$clave = md5($this->input->post('password'));

			if (!$res = $this->Login_model->verificar($usuario,$clave)) {
				echo json_encode(array('msg'=>'Verifique sus Credenciales'));
				$this->output->set_status_header(401);
				exit();
			}
			$data = array(
				'Id' =>$res->Id,
				'usuario' =>$res->usuario,
				'nombre'=>$res->nombre,
				'apellido_paterno'=>$res->apellido_paterno,
				'apellido_materno'=>$res->apellido_materno,	
				'email_id'=> $res->email,
				'session_id'=> $res->Id,
				//Genery teste in the login
				'session_perfil'=>$res->id_perfil,
			);
			
			$this->session->set_userdata($data);
			$this->session->set_flashdata('msg',$data);

			//actualiamoza data 1 para saber que el musuario esta en linea
			$id = $this->session->userdata("session_id");	
			$data_update = array(
				'connect' => "1",
				'fecha_ingreso_sistema' => date('Y-m-d G:i:s'),//h:i:s
			);

			$this->Login_model->update_connect_1($id,$data_update);
			//$this->session->set_flashdata('megs',$data);
			//$mostrar = $this->Login_model->mostrar_datos();
			
			if ($this->session->userdata("session_perfil")==29 || $this->session->userdata("session_perfil")==5 || $this->session->userdata("session_perfil")==19 || $this->session->userdata("session_perfil")==1 ) {//1
				echo json_encode(array('url'=>base_url().'Inventario/View_Inventario/'));
			} else if($id == 37 || $id == 38 || $id == 39) {
				echo json_encode(array('url'=>base_url().'Examenes/Examenes/'));
			} else{
				echo json_encode(array('url'=>base_url().'Intranet_view/'));
			}
			
		}

	}

	public function salir()
	{
		$this->load->model("Login_model");
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		//actualizamos para ver que el usuario no esta en linea cambia a estado 2
		$id_users = $this->session->userdata("session_id");
		$data = array(
			'connect' =>"2",
		);
		$this->Login_model->update_connect($id_users,$data);
		
		$var = array('Id','usuario','session_id','nombre','apellido_paterno','apellido_materno');	
		$this->session->unset_userdata($var);
		

		
		$this->session->sess_destroy();
		redirect(base_url());
		
	}

	//contar cuantos hay en total

	public function obtener_lista_usuarios_connect()
	{
		$this->load->model("Login_model");
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		if ($this->input->method() === 'post') {
			$array = $this->Login_model->connected();
			echo json_encode($array);
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
		
	}


} ?>

