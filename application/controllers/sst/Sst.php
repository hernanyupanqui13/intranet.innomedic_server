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
            "reglamento_file_path"=>base_url()."upload/archivos/sst/politicas_sst.pdf",
            "nombre_documento" => "Politica Integrada de SST",
            "user_data" => json_encode($this->Sst_model->getCurrentUserData())

        );
          
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/one_document_viewer',$data);
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
            "reglamento_file_path"=>base_url()."upload/archivos/sst/RISST.pdf",
            "nombre_documento" => "Reglamento Interno de SST",
            "user_data" => json_encode($this->Sst_model->getCurrentUserData())

        );
          
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/one_document_viewer',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    public function planProgramasSst() {
        
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }


        $data = array(
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "reglamento_file_path"=>base_url()."/upload/archivos/sst/politicas_sst.pdf",
            "user_data" => json_encode($this->Sst_model->getCurrentUserData())
        );

        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/many_documents_viewer',$data);
        $this->load->view("intranet_view/footer",$data);
    }

    public function objetivos_sst() {
        // To complete 
    }


    /*Funcion para ser llamada por AJAX */
    public function checkIfWasConfirmed() {
        $user_id = $this->session->userdata('session_id');
        $document_id = $this->getDocumentIdByName($_POST["document_name"]);
        
        if($document_id == "No se encontro un documento con ese nombre") {
            echo "No se encontro un documento con ese nombre";
        } else {
            echo $this->Sst_model->checkIfWasConfirmed($user_id, $document_id); 
        }
    }

    public function SstAdminPanel() {

        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        $data = array(
            'title' =>array("estas viendo SST","SST","","<a target='_blank' href='javascript:void(0)' title=''>Area de Sistemas</a>"),
            "user_data" => json_encode($this->Sst_model->getCurrentUserData())
        );

        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('sst/sst_admin_panel',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    public function downloadFullReportExcel() {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $data =array("data" => $this->Sst_model->getFullReportData());

        $this->load->view("excel/reporte_completo_sst", $data);

    }

    public function downloadFullReportPdf() {
        
        $data =array("data" => $this->Sst_model->getFullReportData());

		$this->load->view('pdf/reporte_completo_sst',$data);

		$html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');

		// Load HTML content
		$this->pdf->loadHtml($html);//loadHtml

		$this->pdf->set_option('isRemoteEnabled', true);
		// (Optional) Setup the paper size and orientation or portrait
		$this->pdf->setPaper('A4', 'orientation');

		// Render the HTML as PDF
		$this->pdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("ReporteSst.pdf", array("Attachment"=>1));
    }
    /*
    Obtiene la informacion actual del usuario para mostrarla en la confirmacion de lectura
    */
    public function getCurrentUserData() {        

        $current_user_data = $this->Sst_model->getCurrentUserData();

        echo json_encode($current_user_data);

    }
























}

?>