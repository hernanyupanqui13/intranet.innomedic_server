<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class AreaRrhh extends CI_Controller {
  
  function __construct() {

    parent::__construct();
    
    ini_set('date.timezone', 'America/Lima');
    $this->load->model("Sst_model");

  }


  public function RIT() {
    if($this->session->userdata('session_id')==''){
        redirect(base_url());
    }

    $data = array(
      'title' =>array("estas viendo Area RRhh","RRhh","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
      "reglamento_file_path"=>base_url()."upload/archivos/rrhh/rit_2021.pdf",
      "nombre_documento" => "Reglamento Interno de Trabajo",
      "user_data" => json_encode($this->Sst_model->getDataOfUser())
    );
    

    $this->load->view("intranet_view/head",$data);
    $this->load->view("intranet_view/title",$data);
    $this->load->view('rrhh/one_document_viewer',$data);
    $this->load->view("intranet_view/footer",$data);
    
  }


  public function SstAdminPanel() {

    if($this->session->userdata('session_id')==''){
        redirect(base_url());
    }
    $data = array(
        'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
        "user_data" => json_encode($this->Sst_model->getDataOfUser())
    );

    $this->load->view("intranet_view/head",$data);
    $this->load->view("intranet_view/title",$data);
    $this->load->view('rrhh/sst_admin_panel',$data);
    $this->load->view("intranet_view/footer",$data);
  }



}

?>