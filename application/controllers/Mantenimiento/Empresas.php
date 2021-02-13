<?php defined('BASEPATH') OR exit('No direct script access allowed'); /**
 * 
 */
class Empresas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Empresas_model");
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = array(
			'title' =>array("estas viendo empresas","Lista de Empresas","<a class='text-white' href='javascript:void(0)'>Agregar nuevo empresa</a>","Evaristo Escudero Huillcamascco"),
		);
		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('empresas/index',$data);
		$this->load->view('diseno/footer',$data);
	}
	//agregar 
	public function Nuevo()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = array(
			
		);
	}

	//eliminar
	public function eliminar()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = array(
			
		);
	}

	//mostrar
	public function mostrar()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = array(
			
		);
	}

	//actualizar datos de la empresa
	//
	
	public function actualizar_datos()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data['title'] =array("estas en la venta de actualizar datos","Actualizar datos de la empresa ","","Evaristo Escudero Huillcamascco");
		$data['departamento'] = $this->Empresas_model->departamento();

		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['lista_empresas_por_id_usuario'] = $this->Empresas_model->lista_empresas_por_id_usuario();
		}else{
			$data['lista_empresas_por_id_usuario'] = $this->Empresas_model->lista_empresas_por_id_usuario($data['segmento']);
		}

		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('empresas/actualizar_datos',$data);
		$this->load->view('diseno/footer',$data);

	}

	//funcion provincia list

	public function provincia_lis()
	{
		if($this->input->post('country_id'))
		  {
		   echo $this->Empresas_model->lista_provincia($this->input->post('country_id'));
		  }
	}

	//funcion distrito list

	public function distrito_list()
	{
		if($this->input->post('state_id'))
		  {
		   echo $this->Empresas_model->lista_distrito($this->input->post('state_id'));
		   
		  }
		 
	}

	public function update_empresas_por_usuario()
	{

		if ($this->input->method() === 'post') {
		$id = $this->input->post("id_usuario");

		$datas = array(
			'ruc' =>$this->input->post("ruc"),
			'razon_social'=>$this->input->post("razon_social"), 
			'nombre_comercial' =>$this->input->post("nombre_comercial"),
			'actividad_economica'=>$this->input->post("actividad_economica"),
			'direccion' =>$this->input->post("direccion"),
			'id_rubro' =>$this->input->post("id_rubro"),
			'id_departamento'=>$this->input->post("id_departamento"),
			'id_provincia' => $this->input->post("id_provincia"),
			'id_distrito' => $this->input->post("id_distrito"),
			'contacto' => $this->input->post("contacto"),
			'telefono'=> $this->input->post("telefono"),
			'email'=> $this->input->post("email"),
			
		);

		$this->Empresas_model->update_empresas_por_usuario($id,$datas);
		echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));
		}else{
			$this->load->view('errors/html/error_501');	
		}
		
	}

} ?>