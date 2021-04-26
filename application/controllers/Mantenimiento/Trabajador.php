<?php defined('BASEPATH') OR exit('No direct script access allowed');	/**
 * 
 */
class Trabajador extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
		ini_set('date.timezone', 'America/Lima'); 
		$this->load->model("Trabajador_model");
	} 

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
 
		$data = array(
			'title' =>array("estas viendo la lista de Trabajador","Lista de Trabajador","","Evaristo Escudero Huillcamascco"),//<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' data-toggle='modal' data-target='.bd-example-modal-xl'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Trabajador</a>
			'mostrar_users' => $this->Trabajador_model->mostrar_users(),
			'list_status'=>$this->Trabajador_model->list_status(),
			'id_sexo' =>$this->Trabajador_model->id_sexo(),
			'id_perfil'=>$this->Trabajador_model->id_perfil(),

			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('trabajador/index',$data);
		$this->load->view('intranet_view/footer',$data);
	}


	public function update_users_clave_perfil_status()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url()); 
		} 

		$data['segmento']=$this->uri->segment(4,0);
		$data['title'] = array("estas apunto de actulizar los datos del colaborador","Lista de Colaboradores","<a class='text-white' href='javascript:void(0)'>Agregar Nuevo Colaborador</a>","Evaristo Escudero Huillcamascco");


		if (!$data['segmento']) {
			$data['update'] = $this->Trabajador_model->update();
		}else{
			$data['update'] = $this->Trabajador_model->update($data['segmento']);
		}
		$data['list_status']=$this->Trabajador_model->list_status();
		$data['perfil_list'] = $this->Trabajador_model->perfil_list();




		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('trabajador/update_users',$data);
		$this->load->view('intranet_view/footer',$data);
		
		
		
		
	}

	public function ultimo_acceso()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url()); 
		} 

		if ($this->input->method() === "post") {
			$id = $this->input->post("user_id");
			$data = $this->Trabajador_model->ultimo_registrado($id);
			echo json_encode($data);
		}else{
			redirect(base_url().'Inicio/Zona_roja/'); 
		}	

	}

	public function Mostrar_datos_para_actualiozar()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url()); 
		} 

		if ($this->input->method() === "post") {
			$id = $this->input->post("user_id");
			$data = $this->Trabajador_model->Mostrar_datos_para_actualiozar_xx($id);
			echo json_encode($data);

		} else {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}
		


	}

	//Actualizamos los datos del estado del trabajador.

	public function actualizar_area_emaail_puesto()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url()); 
		}

		if ($this->input->method() === "post") {
			//aqui declaramos los datos a actuializar del metodo post
			$id_usuario = $this->input->post("id_usuario");

			$estado = $this->input->post("estado");
			$fecha_cesado_activo = $this->input->post("fecha_cesado_activo");
			if ($estado == "" || $fecha_cesado_activo === "") {
				$data = array(
					'puesto' =>$this->input->post("puesto"),
					'email' =>$this->input->post("correo"),
					'fecha_ingreso' =>$this->input->post("fecha_ingreso"),
					'celular' =>$this->input->post("celular"),
					'id_perfil' =>$this->input->post("id_perfil")
				);
			}else{
				$data = array(
					'puesto' =>$this->input->post("puesto"),
					'email' =>$this->input->post("correo"),				
					'fecha_ingreso' =>$this->input->post("fecha_ingreso"),
					'status' => $estado,
					'fecha_cesado_activo' => $fecha_cesado_activo,
					'celular' =>$this->input->post("celular"),
					'id_perfil' =>$this->input->post("id_perfil"),					
					'celular' =>$this->input->post("celular"),
				);
			}
			// Revisando si el usuario tiene permisos para cambiar esta informacion. Normalmente solo el Admin deberia 
			if($this->session->userdata("session_perfil") == 1) {
				
				$data["nombres"] = $this->input->post("nombre");
				$data["apellido_paterno"] = $this->input->post("apellido_paterno");
				$data["apellido_materno"] = $this->input->post("apellido_materno");

			}








			// Preparando para cambiar la otra tabla. Deberiamos cambiar sto para que sea una sola tabla. Es rebundante
			if ($estado == "" || $fecha_cesado_activo === "") {
				$t_suaurio = array(
					'email' => $this->input->post("correo"),
					"nombre" => $this->input->post("nombre"),
					"apellido_paterno" => $this->input->post("apellido_paterno"),
					"apellido_materno" => $this->input->post("apellido_materno"),
				);
			}else{
				$t_suaurio = array(
					'email' =>$this->input->post("correo"),
					'status' => $estado,
				);
			}
			// Revisando si el usuario tiene per
			if($this->session->userdata("session_perfil")) {
				$t_suaurio["nombre"] = $this->input->post("nombre");
				$t_suaurio["apellido_paterno"] = $this->input->post("apellido_paterno");
				$t_suaurio["apellido_materno"] = $this->input->post("apellido_materno");
				$t_suaurio["usuario"] = $this->input->post("usuario");
			}
			
			$t_suaurio["clave"] = $this->input->post("clave");

			$this->Trabajador_model->actualizar_area_emaail_puesto($id_usuario,$data);
			$this->Trabajador_model->actualizarDataOnTsUsuario($id_usuario,$t_suaurio);
			


		}else{
			 redirect(base_url().'Inicio/Zona_roja/'); 
		}
	}


	//aqui mostramos los trabajadores cesados

	public function mostrar_trabajador_cesado()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url()); 
		}

		$data = array(
			'title' =>array("estas viendo la lista de Trabajador cesados","Lista de Trabajador cesado","","Evaristo Escudero Huillcamascco"),
			'mostrar_users_cesados' => $this->Trabajador_model->mostrar_users_cesados(),
			'list_status'=>$this->Trabajador_model->list_status(),
			

			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('trabajador/index_cesado',$data);
		$this->load->view('intranet_view/footer',$data);


	}




} ?>