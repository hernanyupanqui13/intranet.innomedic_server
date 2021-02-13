<?php /**
 * 	
 */
class Desarrollo_Capacitacion extends CI_Controller
{
	
	function __construct()		
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Desarrollo_Capacitacion_model");
	}
	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("estas viendo Desarrollo y Capacitación","Desarrollo y Capacitación","<a href='javascript:void(0)' class='btn btn-info d-none d-lg-block m-l-15' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-plus-circle'></i>&nbsp;Agregar Nuevo</a>","Evaristo Escudero Huillcamascco"),
		);
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/desarrollo_capacitacion",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function Desarrollo_Capacitacion_view()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = $this->Desarrollo_Capacitacion_model->Desarrollo_Capacitacion_view();
		echo json_encode($data);
	} 

	public function eliminar_desarrollo()
	{
		
		$id = $this->input->post("user_id");
		$this->Desarrollo_Capacitacion_model->elimina_imagen_anterior_true($id);
		$this->Desarrollo_Capacitacion_model->Eliminar_Desarrollo_Capacitacion_id($this->input->post("user_id"));
		
		
		
	} 

	public function Insert_desarrollo_capacitacion()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		if ($this->input->method() === 'post') {

	        	//Check whether user upload picture
            if(!empty($_FILES['archivo']['name'])){
                $config['upload_path'] = 'upload/archivos/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                $config['file_name'] = "Certificado".rand().md5($_FILES['archivo']['name']);
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('archivo')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                     $picture = "";
                }
            }else{
                $picture = "";
            }    

            $query = $this->db->query("select * from ts_desarrollo_capacitacion where curso='".trim($this->input->post("curso"))."' and centro_estudio='".trim($this->input->post("centro_estudio"))."' and id_usuario = '".$this->session->userdata("session_id")."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'No puedes duplicar el registro dos veces'));
             $this->output->set_status_header(400);
          }else{
              //Prepare array of user data
            $userData = array(
                'curso' =>$this->input->post("curso"),
                'centro_estudio' =>$this->input->post("centro_estudio"),
                'fecha_inicio' =>$this->input->post("fecha_inicio"),
                'fecha_fin' =>$this->input->post("fecha_fin"),
                'horas' =>$this->input->post("horas"),
                'creditos' =>$this->input->post("creditos"),
                'estado' =>"1",
                'url' => $this->input->post("url"),
                'id_usuario' => $this->session->userdata("session_id"),
                'created'=>date('Y-m-d h:i:s'),
                'archivo' => $picture
            );            
            //Pass user data to model
            $this->Desarrollo_Capacitacion_model->Insert_desarrollo_capacitacion($userData);
           echo json_encode(array("mensaje"=>"Se registro de manera correcta"));
          }          
            
        }else{
        	redirect(base_url().'Inicio/Zona_roja/');
        	
        }


	}

	public function fetch_single_user_experience()
	{
    if ($this->session->userdata("session_id")=="") {
      redirect(base_url().'Inicio/Zona_roja/');
    }


    if ($this->input->method() === 'post') {
       $output = array();  
           $data = $this->Desarrollo_Capacitacion_model->fetch_single_user_experience($this->input->post("user_id"));
           foreach($data as $row)  
           { 

              $output['curso'] = $row->curso;
                $output['centro_estudio'] = $row->centro_estudio;
                $output['fecha_inicio'] = $row->fecha_inicio;
                $output['fecha_fin'] = $row->fecha_fin;
                /*$output['fecha_inicio'] = '
                <input type="date" name="fecha_inicio" class="form-control" value="'.date('Y-m-d', strtotime($row->fecha_inicio)).'" placeholder="">';*/
                $output['horas'] = $row->horas;
                $output['creditos'] = $row->creditos;
                $output['archivo'] = '<a target="_blank" href="'.base_url().'upload/archivos/'.$row->archivo.'" title="">Visualizar Archivo Subido <i class="fas fa-eye"></i></a><input type="hidden" name="hidden_user_image" value="'.$row->archivo.'" />';  
  
           }  
           echo json_encode($output);
    }else{
      redirect(base_url().'Inicio/Zona_roja/');
    }

		
	}


	public function fetch_single_user_experience_x()
	{

		 $output = array();  
           $data = $this->Desarrollo_Capacitacion_model->fetch_single_user_experience($this->input->post("user_id"));
           foreach($data as $row)  
           { 

                $output['archivo'] = '<a target="_blank" href="'.base_url().'upload/archivos/'.$row->archivo.'" class="">Ver archivo Actual <i class="fas fa-eye"></i></a><input type="hidden" name="hidden_user_image" value="'.$row->archivo.'" />';  
  
           }  
           echo json_encode($output);
	}
	//update 


	// desde aqui es de otro codigo fuente:: 
 
    function user_action(){   

    	if ($this->session->userdata("session_id")=="") {
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
           if($this->input->method() === "post")  
           {  
                $user_image = '';  
                if($_FILES["user_image"]["name"] !="")  
                {  
                	 $this->Desarrollo_Capacitacion_model->elimina_imagen_anterior($this->input->post("user_id"));
                     $user_image = $this->upload_image();  
                     
                }  
                else  
                {   
                     $user_image = $this->input->post("hidden_user_image");  
                }  
                $id = $this->input->post("user_id");
                $query = $this->db->query("select * from ts_desarrollo_capacitacion where curso='".trim($this->input->post("curso"))."' and centro_estudio='".trim($this->input->post("centro_estudio"))."' and id_usuario = '".$this->session->userdata("session_id")."'");
                foreach ($query->result() as $x)
                {
                    $idd   =   $x->Id;
                }
                $row = $query->row();
                if (isset($row)) {
                    if ($idd == $id) {
                        $updated_data = array(  
                          'curso' =>$this->input->post("curso"),
                          'centro_estudio' =>$this->input->post("centro_estudio"),
                          'fecha_inicio' =>$this->input->post("fecha_inicio_xx"),
                          'fecha_fin' =>$this->input->post("fecha_fin_xx"),
                          'horas' =>$this->input->post("hora"),
                          'creditos' =>$this->input->post("creditos"),
                          'estado' =>"1",
                          'id_usuario' => $this->session->userdata("session_id"),
                          'update'=>date('Y-m-d h:i:s'),  
                          'archivo' =>     $user_image  
                      );  

                      $this->Desarrollo_Capacitacion_model->update_crud($this->input->post("user_id"), $updated_data); 
                      echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
                    }else{
                      echo json_encode(array('error'=>'No puedes duplicar registro dos veces'));
                      $this->output->set_status_header(400);
                    }
                }else{
                      $updated_data = array(  
                          'curso' =>$this->input->post("curso"),
                          'centro_estudio' =>$this->input->post("centro_estudio"),
                          'fecha_inicio' =>$this->input->post("fecha_inicio_xx"),
                          'fecha_fin' =>$this->input->post("fecha_fin_xx"),
                          'horas' =>$this->input->post("hora"),
                          'creditos' =>$this->input->post("creditos"),
                          'estado' =>"1",
                          'id_usuario' => $this->session->userdata("session_id"),
                          'update'=>date('Y-m-d h:i:s'),  
                          'archivo' =>     $user_image  
                      );  
                      $this->Desarrollo_Capacitacion_model->update_crud($this->input->post("user_id"), $updated_data); 
                      echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 

                }

                
               //echo 'Se actualizo Correctamente los datos'; 
               
          
      }else{
      	redirect(base_url().'Inicio/Zona_roja/');
      }
    } 

    function user_action_x(){   

    	if ($this->session->userdata("session_id")=="") {
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
           if($this->input->method() === "post")  
           {  
           	
                $user_image = '';  
                if($_FILES["user_image"]["name"] !="")  
                {  
                	  $this->Desarrollo_Capacitacion_model->elimina_imagen_anterior($this->input->post("user_id"));
                    $user_image = $this->upload_image();  
                     
                }  
                else  
                {   
                     $user_image = $this->input->post("hidden_user_image");  
                }  
                $updated_data = array(  
					          'update'=>date('Y-m-d h:i:s'),  
                    'archivo' =>     $user_image  
                );  

                $this->Desarrollo_Capacitacion_model->update_crud_x($this->input->post("user_id"), $updated_data); 
                echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
          
      }else{
      	redirect(base_url().'Inicio/Zona_roja/');
      }
    }

	function upload_image()  
 	{  
       if(isset($_FILES["user_image"]))  
       {  
       	    
            $extension = explode('.',$_FILES['user_image']['name']);  
            $new_name = "Certificados_".rand(100000000000000,999999999999999).md5($_FILES['user_image']['name']). '.' . $extension[1];  
            $destination = 'upload/archivos/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
	}

	
} ?>