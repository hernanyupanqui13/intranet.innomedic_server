<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 	
 */
class View_Inventario extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("General_model");
	}

	public function index()
	{

		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data = array(
			'title' =>array("estas viendo la lista de Pedidos","Lista de Pedidos","<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href=".base_url().'Inventario/Pedidos/Nuevo/'."><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
			"years" => $this->General_model->years()

			 );
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view("inventario/index",$data);
		$this->load->view("intranet_view/footer",$data);
	}
	
	public function getData(){
        $year = $this->input->post("year");
        $resultados = $this->General_model->montos($year);
        echo json_encode($resultados);
        
    }

} ?>