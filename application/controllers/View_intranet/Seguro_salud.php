<?php /**
 * 	
 */
class Seguro_salud extends CI_Controller
{
	
	function __construct()		
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Ficha_personal_model");
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data = array(
			'title' =>array("estas en seguro de Salud","Seguro de Salud","",""),
			'lista_de_salud' => $this->Ficha_personal_model->lista_de_salud($this->session->userdata("session_id")),

		);

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/seguro_salud",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function Insertar_data()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
	    $id_usuario_xx = $this->session->userdata("session_id");
		if ($this->input->method() === 'post') {
			$data = array(
				'url' =>$this->input->post('url'),
				'id_tipo_emfermedad' => $this->input->post("framework"),
				'otros_description' => $this->input->post("otros_description"),
				'id_tratamiento' => $this->input->post("id_tratamiento"),
			);
			$this->Ficha_personal_model->Insertar_data($id_usuario_xx,$data);
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	public function Obetener_registros()
	{
		// POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Ficha_personal_model->Obetener_registros($postData);

	    echo json_encode($data);
	}



} ?>