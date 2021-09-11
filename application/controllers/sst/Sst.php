<?php

use Mpdf\Tag\Tr;

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
            "user_data" => json_encode($this->Sst_model->getDataOfUser())
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
            "user_data" => json_encode($this->Sst_model->getDataOfUser())

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
            "user_data" => json_encode($this->Sst_model->getDataOfUser())
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
            "user_data" => json_encode($this->Sst_model->getDataOfUser())
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

    public function downloadFullReportExcelRrhh() {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $data =array("data" => $this->Sst_model->getFullReportDataRrhh());

        $this->load->view("excel/reporte_completo_sst", $data);

    }

    public function getFullReportRows() {
        $full_report_data = $this->Sst_model->getFullReportData();
        $data = [];
        $counter = 0;
        foreach($full_report_data as $item) {
            $counter++;
            $row=[];
            $row["counter"] = $counter;
            $row["tipo_documento"] = $item->tipo_documento;
            $row["nombre"] = $item->nombre;
            $row["apellido_paterno"] = $item->apellido_paterno;
            $row["apellido_materno"] = $item->apellido_materno;
            $row["fecha_visto"] = $item->fecha_visto;
            $row['opciones'] = "<a class='btn btn-success downloadReportBtn' href='javascript:void(0)' title='Actualizar' onclick='dowloadIndividualReport($item->Id, \"$item->tipo_documento\")'><i class='fas fa-file-download'></i></a>";

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function getFullReportRowsRrhh() {
        $full_report_data = $this->Sst_model->getFullReportDataRrhh();
        $data = [];
        $counter = 0;
        foreach($full_report_data as $item) {
            $counter++;
            $row=[];
            $row["counter"] = $counter;
            $row["tipo_documento"] = $item->tipo_documento;
            $row["nombre"] = $item->nombre;
            $row["apellido_paterno"] = $item->apellido_paterno;
            $row["apellido_materno"] = $item->apellido_materno;
            $row["fecha_visto"] = $item->fecha_visto;
            $row['opciones'] = "<a class='btn btn-success' href='javascript:void(0)' title='Actualizar' onclick='dowloadIndividualReport($item->Id)'><i class='fas fa-file-download'></i></a>";

            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function downloadFullReportPdf($options=null) {

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

    public function downloadFullReportPdfRrhh() {

        $data =array("data" => $this->Sst_model->getFullReportDataRrhh());

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
    public function getDataOfUser($user_id = null) {

        if($user_id == null) {
            $user_id = $this->session->userdata('session_id');
        }

        $current_user_data = $this->Sst_model->getDataOfUser($user_id);

        echo json_encode($current_user_data);

    }

    // Se uso una nueva libreria porque la anterior tenia problemas con bolts font
    public function downloadIndividualReport() {
        
        $user_id = $_POST["userId"];
        $documentName = $_POST["documentName"];
        $shortDocumentName = $_POST["shortDocumentName"];

        $data = array(
            "user_data" => $this->Sst_model->getIndividualReport($user_id, $documentName),
            "documentName" => $documentName,
            "shortDocumentName" => $shortDocumentName
        );

        $html = $this->load->view('pdf/cargo_individual_sst', $data, true);
        
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);
        $mpdf->Output("test.pdf", "D");

    }

    // Se uso una nueva libreria porque la anterior tenia problemas con bolts font
    public function downloadIndividualReportRrhh($user_id=null) {
        // En caso no se ingrese el ID del usuario
        if($user_id == null) {
            echo "No se ingreso correctamente";
            return false;
        }

        $data = array("user_data" => $this->Sst_model->getIndividualReportRrhh($user_id));
        $html = $this->load->view('pdf/cargo_individual_rrhh', $data, true);
        
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);
        $mpdf->Output("cargoRrhh.pdf", "D");

    }

    public function test($a, $b, $c) {
        echo "<div>$a</div>";
        echo "<div>$b</div>";
        echo "<div>$c</div>";
    }





}

?>