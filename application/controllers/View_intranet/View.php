<?php  defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class View extends CI_Controller
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
			'title' =>array("estas en registro de empleados","Registro de empleados","",""),

		);

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/view",$data);
		$this->load->view("intranet_view/footer",$data);

		


	}
} ?>