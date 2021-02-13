<?php /**
 * 
 */
class Inicio extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Static_model");
		$this->load->helper(array("url",'scanner'));
	}

	public function index()
	{
		$data = array(
			'static_view_one' => $this->Static_model->static_view_one(),
			'areas' => $this->Static_model->areas(),
			'view_service' => $this->Static_model->view_service(),
			'view_service1' => $this->Static_model->view_service1(),
			'view_service2' => $this->Static_model->view_service2(),
			'view_service3' => $this->Static_model->view_service3(), 
			'view_service4' => $this->Static_model->view_service4(),
			'view_doctor' => $this->Static_model->view_doctor(),
			'gallery' => $this->Static_model->gallery(),
			'consultoriasname' => $this->Static_model->consultoriasname(),
			'oficina_view' => $this->Static_model->oficina_view(),
			'lista_ventajas_mas' => $this->Static_model->lista_ventajas_mas(),
			'lista7_areas' => $this->Static_model->lista7_areas(), 
			
			'title'=>array("Innomedic | Clínica Innomedic International | Salud ocupacional","xsxs")
		);
		$this->load->view("principal/head",$data);
		$this->load->view('principal/body',$data);
		$this->load->view('principal/footer');
	}

	//enviar correo 
	
	public function SendMail()
	{
		if ($this->input->method() === 'post') {

			// preguntamos si existe inscripcion por email
	        $query = $this->db->query("select * from t_suscriptor where email='".$this->input->post('email')."'");
	        $row = $query->row();
	        if(isset($row)){ // cuando es mayor que vacio o cero
	           echo json_encode(array('alerta'=>'Verificamos en el sistema que usted ya se registro'));
	            $this->output->set_status_header(400);
	        }else{
	        	$data = array(
				'email' =>$this->input->post('email'),
				'fecha' =>date('Y-m-d h:i:s')
			);

			$this->Static_model->SendMail($data);

			echo json_encode(array("msg"=>"Se registro Correctamente"));

	        }

			
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}


	//funcion prohibida
	public function Zona_roja()
	{
		$this->load->view('errors/html/error_501');
	}

	//formulario de Contacto
 //fakta validar ------------- validar
	public function process_booking	()
	{
		if ($this->input->method() === 'post') {
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

		$this->Static_model->process_booking($data);
	}else{
		$this->load->view('errors/html/error_501');	
	}
		


	}

	public function process_booking_request()
	{
		if ($this->input->method() === 'post') {
			$data = array(
			'email' =>$this->input->post('requestemail'),
			'name' => $this->input->post('requestname'),
			'phone' =>$this->input->post('requestphone'),
			'date' => date('Y-m-d h:i:s'),
			'time' => $this->input->post('requesttime'),
			'service'=> $this->input->post('requestservice'),
			'age'=> $this->input->post('requestage'),
			'message' => $this->input->post('requestmessage'),
			'employe' => $this->input->post('requestemploye'),
		);

			$this->Static_model->process_booking_request($data);
		}else{
			$this->load->view('errors/html/error_501');		
		}
	}

//aqui igual falta validar
	 public function index_slider()
    {
        $data['slider_view'] = $this->Static_model->slider_view();
        //agregado manualmente
        
        $this->load->view('principal/slider_index', $data);
    }




	//esto es una prueba del modal

	public function validar_modal()
	{
		 $this->load->view('principal/evaristo');
	}

	

	public function registrar()
	{
		$this->load->model("Sistema_model");
		$this->load->helper("scanner");

		if ($this->input->method() === 'post') {


			$query = $this->db->query("select * from ts_usuario where usuario='".$this->input->post("rucx")."'");
			$row = $query->row();
	        if(isset($row)){ // cuando es mayor que vacio o cero
	           echo json_encode(array('alerta'=>'Verificamos en el sistema que usted ya se encuentra registrado'));
	            $this->output->set_status_header(400);
	        }else{
	        	$data = array(
	        	'nombre' =>$this->input->post("usuario"),
				'usuario' =>$this->input->post("rucx"),
				'clave' =>md5($this->input->post("clave")), 
				'clave_repeat' =>md5($this->input->post("clave_repeat")),
				'email'=>$this->input->post("emailx"),
				'id_perfil' => "3",
				'status' =>"1",
				

			 );    	 
			$datos = $this->Sistema_model->registrar($data);
			$ultimoId = $this->db->insert_id();	
			echo json_encode(array('mensaje'=>"Se registro de manera correcta"));


			//GUARDAMOS CAMPOS EMPRESAS
			

			
			$url = md5($this->input->post("usuario"));
			$datas_empresa = array(
        		'ruc' =>$this->input->post("rucx"),
				'razon_social' =>$this->input->post("usuario"),
				'direccion' =>$this->input->post("direccionx"),
				'email'=>$this->input->post("emailx"),
				'url'=>$url,
        		'id_usuario' =>$ultimoId,
        	);

        	$datos = $this->Sistema_model->registrada_social($datas_empresa);
	        }
			
		}else{
			$this->load->view('errors/html/error_501');
		}
		
	}

} ?>