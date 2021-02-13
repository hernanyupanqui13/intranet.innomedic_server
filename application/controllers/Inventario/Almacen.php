<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
		$this->load->database();
		$this->load->helper(array('url','funciones'));
        $this->load->model(array('Almacen_model'));
	} 
    
	function index()
	{
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $data = array(
            'title' =>array("estas viendo la lista de almacen","Almacen","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
            'lista'  =>   $this->Almacen_model->lista(),
             );

        
		$this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view("inventario/_view_form",$data);
        $this->load->view('inventario/almacen_index',$data);
        $this->load->view("intranet_view/footer",$data);
	}
    
}
