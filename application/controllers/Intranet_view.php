<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Intranet_view	 extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	    ini_set('date.timezone', 'America/Lima');
	    $this->load->model("General_model");
	}


	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
       

		$data = array(
			'title' =>array("ingresaste al Sistema","Menú Principal","","Evaristo Escudero Huillcamascco"),
        	
		);


		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/index",$data);
		$this->load->view("intranet_view/footer",$data);


		
	}

 
	public function subir_multiples(){

        if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        if ($this->input->method() === 'post') {
            if(!empty($_FILES['images']['name'])){
                $config['upload_path'] = 'upload/archivos/';
                $config['allowed_types'] = 'jpg|png|gif|pdf|mp3|mp4|AVI|3GP|FLV|doc|docm|docx|dot|dotm|dotx|htm|html|odt|csv|txt|xls|xlsm|xlsx|xps|bmp|emf|odp|ppt|pptx';
                //$config['file_name'] = $_FILES['images']['name'];
                $config['max_size'] = '1000000000000000'; // whatever you need
                $config['file_name'] = "Post_".rand(100000000000000,900000000000000).md5($_FILES['images']['name']);
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config); 
                
                if($this->upload->do_upload('images')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }

            $query = $this->db->query("select * from ts_comunicados where descripcion='".trim($this->input->post("title"))."' and nombres='".trim($this->input->post("nombres"))."' and id_usuario = '".trim($this->input->post("id_usuarios"))."'");
                $row = $query->row();
                if(isset($row)){ // cuando es mayor que vacio o cero
                  echo json_encode(array('error'=>'No puedes duplicar el registro dos veces'));
                 $this->output->set_status_header(400);
              }else{
                //Prepare array of user data
                $userData = array(
                    'descripcion' => trim($this->input->post('title')),
                    'id_usuario'=> trim($this->input->post('id_usuarios')),
                    'nombres'=>trim($this->input->post("nombres")),
                    'imagen_users'=> trim($this->input->post("imagen_users")),
                    'img_post' => $picture
                );
                //Pass user data to model
                $insertUserData = $this->General_model->insert($userData);
              }
            
            
        }else{
            redirect(base_url().'Inicio/Zona_roja/');
        }

         

      // Form field validation rules 
            //$this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
        /*    $galleryData = array( 
                'descripcion' => $this->input->post('title'),
                'id_usuario'=> $this->input->post('id_usuarios'),
                'nombres'=>$this->input->post("nombres"),
                'imagen_users'=> $this->input->post("imagen_users"),
            ); 

           $insert = $this->General_model->insert($galleryData); 
          // echo json_encode(array("mensaje"=>"Se publico de Manera Correcta"));
             
            // Validate submitted form data 
           // if($this->form_validation->run() == true){ 
                // Insert gallery data        
                $galleryID = $insert;  
                 
                if($insert){ 
                    if(!empty($_FILES['images']['name'])){ 
                        $filesCount = count($_FILES['images']['name']); 
                        for($i = 0; $i < $filesCount; $i++){ 
                           // $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                            $_FILES['file']['name']     = "Archivos_".rand(100000000000000,900000000000000).
                                $_FILES['images']['name'][$i];
                             
                            // File upload configuration 
                            $uploadPath = 'upload/archivos/'; 
                            $config['upload_path'] = $uploadPath; 
                            $config['allowed_types'] = 'mp4|jpg|jpeg|png|gif|'; 
                            $config['max_size'] = '1000000000000000'; // whatever you need

                             
                            // Load and initialize upload library 
                            $this->load->library('upload', $config); 
                            $this->upload->initialize($config); 
                             
                            // Upload file to server 
                            if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                $fileData = $this->upload->data(); 
                                $uploadData[$i]['comunicados_id'] = $galleryID;  
                                $uploadData[$i]['file_name'] = $fileData['file_name']; 
                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                            }else{ 
                                $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                            } 
                        } 
                         
                        // File upload error message 
                        $errorUpload = !empty($errorUpload)?' Upload Error: '.trim($errorUpload, ' | '):''; 
                         
                        if(!empty($uploadData)){ 
                            // Insert files info into the database 
                            $insert = $this->General_model->insertImage($uploadData); 
                        } 
                    } 
                     
                    $this->session->set_userdata('success_msg', 'Gallery has been added successfully.'.$errorUpload); 
                    redirect($this->controller); 
                }else{ 
                    $data['error_msg'] = 'Some problems occurred, please try again.'; 
                } 
           // } */

    }

    // echo json_encode(array("mensaje"=>"Se registro de manera correcta"));


    public function Cargar_comentarioas()		
	{
		$data = $this->General_model->Cargar_comentarioas();
		echo json_encode($data);
	}


    public function Agregar_nuevo_comentario()
    {

       $idx = $this->input->post("user_id");
        $data = array(
            'id_usuario' => $this->session->userdata("session_id"),
            'id_comunicados' => $idx,
            'fecha' => date('Y-m-d h:i:s'),
        );

        $this->General_model->Agregar_nuevo_comentario($data);
        

     /*   $query = $this->db->query("select * from ts_megusta where id_usuario='".$this->session->userdata("session_id")."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              // echo json_encode(array('alerta'=>'Verificamos en el sistema que usted ya publico una respuesta'));
               // $this->output->set_status_header(400);
        }else{
        $idx = $this->input->post("user_id");
        $data = array(
            'id_usuario' => $this->session->userdata("session_id"),
            'id_comunicados' => $idx,
            'fecha' => date('Y-m-d h:i:s'),
        );

        $this->General_model->Agregar_nuevo_comentario($data);
        }*/

        

    }

    //function cargar me gusta
    public function Cargar_me_gusta()
    {
        $id = $this->input->post("user_id");
        $this->General_model->mne_gusta($id);
    }
    public function Cargar_me_triste()
    {
        $id = $this->input->post("user_id");
        $this->General_model->tristesa($id);
    }
    public function Cargar_me_ignorados()
    {
        $id = $this->input->post("user_id");
        $this->General_model->ignorados($id);
    }
    /*public function cantidad_registro()
    {
        $this->load->model('Static_model');

         $query = $this->db->query("select megusta from ts_comunicados");

        foreach($query->result_array() as $row){
            echo $row['total'];
        } 
        
    }*/

    public function eliminarPost() {

        $id = $this->input->post("post_id");

        $this->General_model->eliminarPost($id);

        
    }


} ?>