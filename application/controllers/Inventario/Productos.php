<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Productos	 extends CI_Controller		
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Inventario_model");
		ini_set('date.timezone', 'America/Lima');
	}
	//index
	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}
		
		return $this->__load_view("estas viendo lista productos","Lista de Productos","Agregar Nuevo","productos");
	}
	//nuevo
	public function Nuevo_registro() 
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}

        if($this->input->method() === 'post'){
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'upload/productos/';
                $config['allowed_types'] = 'jpg|jpge|png|gif|pdf';
                $config['file_name'] = "Producto_".rand(100000000000000,900000000000000).md5($_FILES['picture']['name']);
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
            //Validamos que no se repitan los registros
	        $query = $this->db->query("select * from ta_productos where codigo='".trim($this->input->post("codigo"))."' or nombre='".$this->input->post("nombre")."'");
	        $row = $query->row();
	        if (isset($row)) {
	        	echo json_encode(array('error'=>'No puedes duplicar el registro dos veces'));
             	$this->output->set_status_header(400);
	        }else{
	        	$userData = array(
					'codigo' => trim($this->input->post("codigo")),
					'nombre' => trim($this->input->post("nombre")),
					'description' => trim($this->input->post("description")),
					'status' => 1,
					'fecha' => date('Y-m-d h:i:s'),
					'archivo' => $picture
			 	);
	            
	            //Pass user data to model
	          	 $this->Inventario_model->Nuevo_registro($userData);


	          	  $ultimoId = $this->db->insert_id();


		        $insert_almacen	 = array(
					'producto' => $ultimoId,
					'total' => 0,

			 	);

			 	 $this->Inventario_model->addd_almacen($insert_almacen);
		    }

		       



			
          
        }else{
        	redirect(base_url().'Inicio/Zona_roja');
        }


	 
	}
	//editar
	public function actualizar_producto()
	{ 
		if ($this->session->userdata("session_id")=="") {
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
    	if ($this->input->method() === "post") {
    		$user_image = '';  
	        if($_FILES["picture"]["name"] !="")  
	        {  
	        	 $this->Inventario_model->elimina_imagen_anterior($this->input->post("user_id"));
	             $user_image = $this->upload_image();  
	        }  
	        else  
	        {   
	             $user_image = $this->input->post("hidden_user_image");  
	        }

	        $id = $this->input->post("user_id");
	        //aqui validamos para que no se repita el registro de datos
	        $query_busqueda = $this->db->query("select * from ta_productos where codigo='".trim($this->input->post("codigo"))."' or nombre='".$this->input->post("nombre")."'");
	        foreach ($query_busqueda->result() as $x) {
	        	$idx = $x->Id;
	        }
	        $row = $query_busqueda->row();
	        if (isset($row)) {
	        	if ($idx == $id) {
	        		$data_update = array(
	        			'codigo' => trim($this->input->post("codigo")),
				        'nombre' => trim($this->input->post("nombre")),
				        'description' => trim($this->input->post("description")),
						'status' => 1,
						'fecha_update' => date('Y-m-d h:i:s'),
						'archivo' => $user_image 
					);
					$this->Inventario_model->update_crud($this->input->post("user_id"), $data_update); 
	                echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
	        	}else{
	        		echo json_encode(array('error'=>'No puedes duplicar registro dos veces'));
	                $this->output->set_status_header(400);

	        	}
	        }else{
	        	$data_update = array(
        			'codigo' => $this->input->post("codigo"),
					'nombre' => $this->input->post("nombre"),
					'description' => $this->input->post("description"),
					'status' => 1,
					'fecha_update' => date('Y-m-d h:i:s'),
					'archivo' => $user_image 
				);
				$this->Inventario_model->update_crud($this->input->post("user_id"), $data_update); 
                echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 

	        }
    	}else{
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
		
        
	}

	//eliminar registro de datos, //por imagen
	function upload_image()  
 	{  
       if(isset($_FILES["picture"]))  
       {  
       	    
            $extension = explode('.',$_FILES['picture']['name']);  
            $new_name = "Productos_".rand(100000000000000,999999999999999).md5($_FILES['picture']['name']). '.' . $extension[1];  
            $destination = 'upload/productos/' . $new_name;  
            move_uploaded_file($_FILES['picture']['tmp_name'], $destination);  
            return $new_name;  
       }  
	}

	//eliminar
	public function eliminar_producto() 
	{
		$id = $this->input->post("user_id");
		$this->Inventario_model->elimina_imagen_anterior($id);
		$this->Inventario_model->eliminar_producto($id);
		$this->Inventario_model->eliminar_producto_almacen($id);
	}
	//funcion para crear un load de manera private
	private function __load_view($title_view,$title_view_one,$title_view_two,$index)
	{
		$data = array(
			'title' =>array("$title_view","$title_view_one", "<a data-toggle='modal' data-target='.bd-example-modal-lg' class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)'><i class='fa fa-plus-circle'></i>&nbsp;$title_view_two</a>","Evaristo Escudero Huillcamascco"),
			'lista_productos' => $this->Inventario_model->lista_productos()

		 );
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view("inventario/$index",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	// cargar para actiusaloizar
	// 
	public function fetch_single_user_experience()
	{
    if ($this->session->userdata("session_id")=="") {
      redirect(base_url().'Inicio/Zona_roja/');
    }


    if ($this->input->method() === 'post') {
       $output = array();  
           $data = $this->Inventario_model->fetch_single_user_experience($this->input->post("user_id"));
           foreach($data as $row)  
           { 

                $output['codigo'] = $row->codigo;
                $output['description'] = $row->description;
                $output['nombre'] = $row->nombre;
                $output['archivo'] = '<a target="_blank" href="'.base_url().'upload/productos/'.$row->archivo.'" title="">Visualizar Archivo Subido <i class="fas fa-eye"></i></a><input type="hidden" name="hidden_user_image" value="'.$row->archivo.'" />';  
               
           }  
           echo json_encode($output);
    }else{
      redirect(base_url().'Inicio/Zona_roja/');
    }

		
	}

	

	//
} ?>