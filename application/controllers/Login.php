<?php /**
 * 
 */
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		$data['title']=array("Ingreso al sistema | Innomedic.pe | Innomedic");
		$data['ts_rubro']= $this->Login_model->ts_rubro();
		$this->load->view('login/index',$data);
		
	}

	public function validate()
	{
		$this->form_validation->set_error_delimiters('', '');
		$rules = login_rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()==FALSE) {
			$errors = array(
				'username' => form_error('username'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{

			$usuario = $this->input->post('username');
			$clave = md5($this->input->post('password'));

			if (!$res = $this->Login_model->verificar($usuario,$clave)) {
				echo json_encode(array('msg'=>'Verifique sus Credenciales'));
				$this->output->set_status_header(401);
				exit();
			}
			$data = array(
				'Id' =>$res->Id,
				'usuario' =>$res->usuario,
				'nombre'=>$res->nombre,
				'apellido_paterno'=>$res->apellido_paterno,
				'apellido_materno'=>$res->apellido_materno,
				'session_id'=> $res->Id,
				//'id_usuario_statico' =>$res->id_usuario_statico,
				//Genery teste in the login
				'session_perfil'=>$res->id_perfil,
			);
			
			$this->session->set_userdata($data);
			$this->session->set_flashdata('msg',$data);
			//$this->session->set_flashdata('megs',$data);
			//$mostrar = $this->Login_model->mostrar_datos();
			

			echo json_encode(array('url'=>base_url().'Sistema/'));
		}

	}

	public function salir()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$var = array('Id','usuario','session_id','nombre','apellido_paterno','apellido_materno');	
		$this->session->unset_userdata($var);
		$this->session->sess_destroy();
		redirect(base_url().'Login/');
	}

	

} ?>