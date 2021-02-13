<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Enviar_Boleta_Pago extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Enviar_Boleta_Pago_model");
	}
	public function index()
	{
		if ($this->session->userdata("session_id")=="") {  
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
 
		$data = array(
			'title' =>array("estas en Menu de Correo","Buzón Principal","<a class='btn-info btn-rounded btn d-none d-lg-block m-l-15' href=".base_url().'Boleta/Boleta/Nuevo_boleta/'.date('m').'?='.rand()." ><i class='fa fa-plus-circle'></i>&nbsp;Nueva Boleta</a>","Evaristo Escudero Huillcamascco"),
			'lista_boleta_entrega' => $this->Enviar_Boleta_Pago_model->lista_boleta_entrega(),
	

			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('boleta/index_modifi',$data);//aqui se modifico el index
		$this->load->view('intranet_view/footer',$data);
	}

	public function Agregar_Nuevo()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
 
		$data = array(
			'title' =>array("estas en Menu de Correo","Buzón Principal","<a class='btn-info btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' onclick='return validate_xx();'><i class='fa fa-plus-circle'></i>&nbsp;Crear Nuevo</a>","Evaristo Escudero Huillcamascco"),
	

			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('boleta/nuevo',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function agregar_nuevo_registro(){
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}

        if($this->input->method() === 'post'){
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'upload/boletas/';
                $config['allowed_types'] = 'jpg|jpge|png|gif|pdf';
                $config['file_name'] = "Boleta_".rand(100000000000000,900000000000000).md5($_FILES['picture']['name']);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data(); 
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            
            //Prepare array of user data
            $userData = array(
                'para' => $this->input->post('para'),
                'asunto' => $this->input->post('asunto'),
                'mensaje' => $this->input->post('mensaje'),
                'email_users'=> $this->input->post("id_usuario"),
                'id_usuario' => $this->input->post("id_usuario_id"),
                'propietario'=> $this->input->post("nombres_completos"),
                'fecha_enviado'=>date('Y-m-d h:i:s'),
                'view' => 1,
                'archivo' => $picture
            );
            
            //Pass user data to model
            $insertUserData = $this->Enviar_Boleta_Pago_model->insert($userData);
            
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }else{
        	redirect(base_url().'Inicio/Zona_roja');
        }
        
    }

    //listar empresas por njombre y correo


    public function listar_usuarios_por_nombre_y_correo()
    {
    	 // POST data
	    $postData = $this->input->post();
	    // Get data
	    $data = $this->Enviar_Boleta_Pago_model->listar_usuarios_por_nombre_y_correo($postData);
	    echo json_encode($data);
    }

    public function listar_boleta_pago_por_usuario()
    {
    	if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			 
		}
 
		$data = $this->Enviar_Boleta_Pago_model->listar_boleta_pago_por_usuario();
		echo json_encode($data);
    }
    //cambiar estado de color

    public function cambia_estado_url()
    {
    	$id_boleta = $this->input->post("user_id");

    	$data = array(
    		'view' =>2,
    		'fecha_recibido' => date('Y-m-d h:i:s'),
    	);
    	$this->Enviar_Boleta_Pago_model->cambia_estado_url_($id_boleta,$data);
    }

    public function registrar_formulario_de_contacto()
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/'); 
            
        }

        if ($this->input->method() === 'post') {
            $data = array(
                'nombre_usuario' =>$this->input->post("exampleInputname1"),
                'id_usuario'=> $this->input->post("id_usuario"),
                'email_users'=> $this->input->post("email_users"),
                'mensaje'=> $this->input->post("exampleTextarea"),
                'asunto' => $this->input->post("asuntoxx"),
                'fecha_enviado' => date('Y-m-d h:i:s'),
            );
            $this->Enviar_Boleta_Pago_model->registrar_formulario_de_contacto($data);

        }else{
            redirect(base_url().'Inicio/Zona_roja');
        }
    }

    public function entrada()
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/'); 
            
        }
 
        $data = array(
            'title' =>array("estas en Menu de Correo","Buzón Principal","<a class='btn-info btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' onclick='return validate_xx();'><i class='fa fa-plus-circle'></i>&nbsp;Crear Nuevo</a>","Evaristo Escudero Huillcamascco"),
            'lista_boleta_entrada' => $this->Enviar_Boleta_Pago_model->lista_boleta_entrada(),

    

            
        );
        $this->load->view('intranet_view/head',$data);
        $this->load->view('intranet_view/title',$data);
        $this->load->view('boleta/entrada',$data);
        $this->load->view('intranet_view/footer',$data);
    }
} ?>