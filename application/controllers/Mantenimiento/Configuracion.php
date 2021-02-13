<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 			
 */
class Configuracion extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Configuracion_model");
	}

	public function view()
	{
		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['configuracion_usuarios_x'] = $this->Configuracion_model->configuracion_usuarios_x();
		}else{
			$data['configuracion_usuarios_x'] = $this->Configuracion_model->configuracion_usuarios_x($data['segmento']);
		}

		$data['title'] = array("estas en configuración","Configuración","","Evaristo Escudero Huillcamascco");
		
		
		
		$this->load->view("diseno/head",$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('configuracion/index',$data);
		$this->load->view("diseno/footer",$data);
		
			
	}



	public function actualizar_usuario_x_empresa()
	{
		if ($this->input->method() === 'post') {
			$id = $this->input->post("Id");
			if ($this->input->post("clave")==="" || $this->input->post("clave_repeat")==="") {
				$data = array(
				'email' =>$this->input->post("emailx"),	

				);
				echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));
			}else{
				$data = array(
				'email' =>$this->input->post("emailx"),
				'clave' =>md5($this->input->post("clave")),
				'clave_repeat'=>md5($this->input->post("clave_repeat")),	
				);
				echo json_encode(array('alerta'=>'Cierre automatico!'));
	            $this->output->set_status_header(400);

				
			}
			$this->Configuracion_model->actualizar_usuario_x_empresa($id,$data);
			





			$idxx = $this->input->post("id_usuario");

			$data_empresa = array(
				'email' =>$this->input->post("emailx"),
			);
			$this->Configuracion_model->actualizar_usuario_x_empresa_x($idxx,$data_empresa);


		}else{
			$this->load->view('errors/html/error_501');	
		}
		

		

	}


	// de aqui abjaon es para el empleado



	public function view_users()
	{
		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['configuracion_usuarios_empleado'] = $this->Configuracion_model->configuracion_usuarios_empleado();
		}else{
			$data['configuracion_usuarios_empleado'] = $this->Configuracion_model->configuracion_usuarios_empleado($data['segmento']);
		}

		$data['title'] = array("estas en configuración","Configuración","","Evaristo Escudero Huillcamascco");
		
		
		$this->load->view("intranet_view/head",$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('configuracion/empleado_index',$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function actualizar_usuario_x_empleado_xx()
	{
		
		$id = $this->input->post("Id");

		if ($this->input->method() === 'post') {
			
			if ($this->input->post("clave")==="" || $this->input->post("clave_repeat")==="") {
				$data = array(
				'email' =>$this->input->post("emailx"),	

				);
				echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));
			}else{
				$data = array(
				'email' =>$this->input->post("emailx"),
				'clave' =>md5($this->input->post("clave")),
				'clave_repeat'=>md5($this->input->post("clave_repeat")),	
				);
				echo json_encode(array('alerta'=>'Cierre automatico!'));
	            $this->output->set_status_header(400);

				
			}
			$this->Configuracion_model->actualizar_usuario_x_empleado_x($id,$data);
			
			$idxx = $this->input->post("id_usuario");

			$data_empresa = array(
				'email' =>$this->input->post("emailx"),
			);
			$this->Configuracion_model->actualizar_usuario_x_empleado_xx($idxx,$data_empresa);


		}else{
			redirect(base_url().'Inicio/Zona_roja');
		}
	}


} ?>