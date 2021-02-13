<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 	
 */
class Comunicados extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
	}
 
	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("estas viendo comunicados","Comunicados","<a href='javascript:void(0)' class='btn btn-info d-none d-lg-block m-l-15' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-plus-circle'></i>&nbsp;Agregar Comunicados</a>","Evaristo Escudero Huillcamascco"),
		);
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		//$this->load->view("intranet/comunicados",$data);
		$this->load->view("intranet_view/footer",$data);
	}
} ?>

<!--rR1FH6L]Y-->



