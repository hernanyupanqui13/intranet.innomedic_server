<?php /**
 * 
 */
class Cotizacion extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cotizacion_model');
		ini_set('date.timezone', 'America/Lima');
		
	}
	public function index()		
	{

		$data = array(
			'title' =>array("estas mostrando cotización | Innomedic","Cotizaciones Online","","Evaristo Escudero Huillcamascco"),
			'cargar_cita_online' =>$this->Cotizacion_model->cargar_cita_online(),
		);
		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('cotizacion/index',$data);
		$this->load->view('diseno/footer',$data);
	}

	//mostrar datos de cotizacion via ajax

	public function Evaristo()
	{	
		$data = array(
			'title' =>array("estas mostrando cotización | Innomedic","Cotizaciones Online","","Evaristo Escudero Huillcamascco"),
			
		);
		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('cotizacion/index1',$data);
		$this->load->view('diseno/footer',$data);
	}
	


	function fetch_single_user()  
      {  
           $output = array();  
           $data = $this->Cotizacion_model->fetch_single_user($this->input->post("user_id"));  
           foreach($data as $row)  
           {  
                $output['name'] = $row->name;  
                $output['message'] = $row->message;
                $output['email'] = $row->email;
              
                
           }  
           echo json_encode($output);  
      }   
      

} ?>
