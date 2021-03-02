<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sst extends CI_Controller {
    
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
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "reglamento_file_path"=>base_url()."upload/archivos/sst/politicas_sst.pdf"
        );
          
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/document_viewer',$data);
        $this->load->view("intranet_view/footer",$data);
        
    }

    public function getDocumentIdByName($document_name=NULL) {

        if($document_name == NULL) {
            $document_name = $_POST["document_name"];
            echo $this->Sst_model->getDocumentIdByName($document_name);

        } else {
            return $this->Sst_model->getDocumentIdByName($document_name);
        }
        

    }
    // Cambia el estado del documento a visto en la base de datos
    public function viewSstDocuments() {
        
        $user_id = $this->session->userdata('session_id');
        echo $this->Sst_model->viewSstDocuments($user_id, $_POST["document_id"]);
         
    }


    public function reglamentos() {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }


        $data = array(
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "reglamento_file_path"=>base_url()."upload/archivos/sst/riss.pdf"
        );
          
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/document_viewer',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    public function planProgramasSst() {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }


        $data = array(
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "reglamento_file_path"=>base_url()."/upload/archivos/sst/politicas_sst.pdf"
        );

        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/reglamentos',$data);
        $this->load->view("intranet_view/footer",$data);
    }

    public function checkIfWasConfirmed() {
        $user_id = $this->session->userdata('session_id');
        $document_id = $this->getDocumentIdByName($_POST["document_name"]);
        
        if($document_id == "No se encontro un documento con ese nombre") {
            echo "No se encontro un documento con ese nombre";
        } else {
            echo $this->Sst_model->checkIfWasConfirmed($user_id, $document_id); 
        }        
    }
























}

?>