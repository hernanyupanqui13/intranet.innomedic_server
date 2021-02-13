<?php /**
 * 
 */
class Nosotros extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model('Nosotros_model');
	}
	public function index()
	{
		$data = array(
			'title' =>array("Nosotros | innomedic.pe"),
			't_employe_view' => $this->Nosotros_model->t_employe_view(),
			'gallery' => $this->Nosotros_model->gallery(),
			'lista_valores' => $this->Nosotros_model->lista_valores(),
			'consultoriasname' => $this->Nosotros_model->consultoriasname(),
			'oficina_view' => $this->Nosotros_model->oficina_view(),
			'lista_ventajas_mas' => $this->Nosotros_model->lista_ventajas_mas(),
			'lista7_areas' => $this->Nosotros_model->lista7_areas(), 
			
		);
		$this->load->view('principal/head',$data);
		$this->load->view('nosotros/index',$data);
		$this->load->view('principal/footer');
	}

		//formulario de Contacto
 //fakta validar ------------- validar
	public function process_booking1()
	{
		$data = array(
			'email' =>$this->input->post('bookingemail'),
			'name' => $this->input->post('bookingname'),
			'phone' =>$this->input->post('bookingphone'),
			'date' => date('Y-m-d h:i:s'),
			'time' => $this->input->post('bookingtime'),
			'service'=> $this->input->post('bookingservice'),
			'age'=> $this->input->post('bookingage'),
			'message' => $this->input->post('bookingmessage'),
			'employe' => $this->input->post('bookingemploye'),
		);

		$this->Nosotros_model->process_booking1($data);


	}


	public function cargar_valores()
	{
		$data = $this->Nosotros_model->obtener_valores();
		echo json_encode($data);
		
	}
} ?>