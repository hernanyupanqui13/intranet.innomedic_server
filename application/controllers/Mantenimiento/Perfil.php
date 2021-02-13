<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 			
 */
class Perfil extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Perfil_model");
		
	}

	public function Mostrar_perfil()
	{


		if ($this->session->userdata("session_id")=="") {
			redirect(base_url()); 
		}
		$data['title']= array("estas en tu perfil","Mostrando Perfil","","Evaristo Escudero Huillcamascco");
		$data['departamento'] = $this->Perfil_model->departamento();
		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['listar_empresa_perfil'] = $this->Perfil_model->listar_empresa_perfil();
		}else{
			$data['listar_empresa_perfil'] = $this->Perfil_model->listar_empresa_perfil($data['segmento']);
		}

		$this->load->view("diseno/head",$data);
		$this->load->view("diseno/title",$data);
		//$this->load->view("perfil/mostrar_perfil");
		$this->load->view('perfil/mostrar_perfil',['details_perfil'=>$data]);
		$this->load->view("diseno/footer",$data);
	}


	public function details_perfil()
	{
	    $id = $this->input->get('id');
	    $get_student = $this->Perfil_model->get_student_data_model($id);
	    echo json_encode($get_student); 
	    exit();
	}

	/*previsualizar
	public function details_perfil()
	{
		if($this->uri->segment(4,0))
		{
			$customer_id = $this->uri->segment(4,0);
			$data['customer_details'] = $this->Perfil_model->fetch_single_details($customer_id);
			$this->load->view("perfil/mostrar_perfil");
		}
	}*/


	//mandar a otra pagina

	/* public function exportar_pdf()
	 {
	 $this->load->library('pdf');
	  if($this->uri->segment(4,0))
	  {
	   $customer_id = $this->uri->segment(4,0);
	   $html_content = '<h3 align="center">Convert HTML to PDF in CodeIgniter using Dompdf</h3>';
	   $html_content .= $this->Perfil_model->fetch_single_details($customer_id);
	   $this->pdf->loadHtml($html_content);
	   // (Optional) Setup the paper size and orientation
       $this->pdf->setPaper('A4','portrait');
	   $this->pdf->render();
	   $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	  }
	 }*/

	public function exportar_pdf()
	{
		$userda_id = $this->uri->segment(4,0);

		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['listar_empresa_perfil'] = $this->Perfil_model->listar_empresa_perfil();
		}else{
			$data['listar_empresa_perfil'] = $this->Perfil_model->listar_empresa_perfil($data['segmento']);
		}

		$this->load->view('pdf/generar_pdf_perfil',$data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation portrait
        $this->pdf->setPaper('A4', 'orientation');
        
        // Render the HTML as PDF
        $this->pdf->render(); 
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("".$userda_id.".pdf", array("Attachment"=>0));
	}


	// desde aqui paara el empleado



	public function Mostrar_perfil_empleado()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data['title']= array("estas en tu perfil","Mostrando Perfil","","Evaristo Escudero Huillcamascco");
		$data['departamento'] = $this->Perfil_model->departamento();
		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['listar_empleado_perfil'] = $this->Perfil_model->listar_empleado_perfil();
		}else{
			$data['listar_empleado_perfil'] = $this->Perfil_model->listar_empleado_perfil($data['segmento']);
		}

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view('perfil/mostrar_perfil_empleado',['details_perfilxxx'=>$data]);
		$this->load->view("intranet_view/footer",$data);
	}

} ?> 