<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
class Sst extends CI_Controller {
    
    function __construct() {

        parent::__construct();
        
        ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
    }



    function politicas() {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }


        $data = array(
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "reglamento_file_path"=>base_url()."/upload/archivos/sst/reglamento_actual.pdf"
        );
          
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/document_viewer',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    function reglamentos() {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }


        $data = array(
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "reglamento_file_path"=>base_url()."/upload/archivos/sst/politicas_sst.pdf"
        );
          
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/document_viewer',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    function planProgramasSst() {
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
























}

?>