<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class AreaComunicaciones extends CI_Controller {
  
  function __construct() {

    parent::__construct();
    
    ini_set('date.timezone', 'America/Lima');
    $this->load->model("Sst_model");

  }


  public function politicas() {
    if($this->session->userdata('session_id')==''){
        redirect(base_url());
    }

    $data = array(
      'title' =>array("estas viendo Area Comunicaciones","Comunicaciones","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
      "reglamento_file_path"=>base_url()."upload/archivos/comunicaciones/manual_identidad.pdf",
      "nombre_documento" => "Manual de Identidad Corporativa",
      "user_data" => json_encode($this->Sst_model->getDataOfUser())
    );
    

    $this->load->view("intranet_view/head",$data);
    $this->load->view("intranet_view/title",$data);
    $this->load->view('comunicaciones/one_document_viewer',$data);
    $this->load->view("intranet_view/footer",$data);
    
  }


}

?>