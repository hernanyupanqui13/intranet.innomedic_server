<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Proveedores	 extends CI_Controller		
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

		return $this->__load_view("estas viendo lista proveedores","Lista de Proveedor","Agregar Nuevo","proveedor");
	}
	//nuevo
	public function Nuevo_registro() 
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}

        if($this->input->method() === 'post'){
            //Prepare array of user data
            //Validamos que no se repitan los registros
	        $query = $this->db->query("select * from ta_proveedores where ruc='".trim($this->input->post("ruc"))."' or nombre='".$this->input->post("nombre")."'");
	        $row = $query->row();
	        if (isset($row)) {
	        	echo json_encode(array('error'=>'El Proveedor ya se encuentra registrado'));
             	$this->output->set_status_header(400);
	        }else{
	        	$userData = array(
	        		'nombre' => trim($this->input->post("nombre")),
					'ruc' => trim($this->input->post("ruc")),
					'direccion' => trim($this->input->post("direccion")),
					'telefono' => trim($this->input->post("telefono")),
					'correo' => trim($this->input->post("correo")),
					'status' => 1,
					'fecha' => date('Y-m-d h:i:s'),
			
			 	);
	            
	            //Pass user data to model
	          	 $this->Inventario_model->Nuevo_registro_proveedor($userData);
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
    		
	        $id = $this->input->post("user_id");
	        //aqui validamos para que no se repita el registro de datos
	        $query_busqueda_xx = $this->db->query("select * from ta_proveedores where ruc='".trim($this->input->post("ruc"))."' or nombre='".$this->input->post("nombre")."'");
	        foreach ($query_busqueda_xx->result() as $x) {
	        	$idx = $x->Id;
	        }
	        $row = $query_busqueda_xx->row();
	        if (isset($row)) {
	        	if ($idx == $id) {
	        		$data_update = array(
	        			'nombre' => trim($this->input->post("nombre")),
						'ruc' => trim($this->input->post("ruc")),
						'direccion' => trim($this->input->post("direccion")),
						'telefono' => trim($this->input->post("telefono")),
						'correo' => trim($this->input->post("correo")),
						'status' => 1,
						'fecha_update' => date('Y-m-d h:i:s'),
						
					);
					$this->Inventario_model->update_crud_proveedor($this->input->post("user_id"), $data_update); 
	                echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
	        	}else{
	        		echo json_encode(array('error'=>'No puedes duplicar registro dos veces'));
	                $this->output->set_status_header(400);

	        	}
	        }else{
	        	$data_update = array(
        			'nombre' => trim($this->input->post("nombre")),
					'ruc' => trim($this->input->post("ruc")),
					'direccion' => trim($this->input->post("direccion")),
					'telefono' => trim($this->input->post("telefono")),
					'correo' => trim($this->input->post("correo")),
					'status' => 1,
					'fecha_update' => date('Y-m-d h:i:s'),
					
				);
				$data = $this->Inventario_model->update_crud_proveedor($this->input->post("user_id"), $data_update); 
				//echo var_dump($data);
                echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 

	        }
    	}else{
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
		
        
	}



	//eliminar
	public function eliminar_producto()
	{
		$id = $this->input->post("user_id");
		//$this->Inventario_model->elimina_imagen_anterior_proveedor($id);
		$this->Inventario_model->eliminar_producto_proveedor($id);
	}
	//funcion para crear un load de manera private
	private function __load_view($title_view,$title_view_one,$title_view_two,$index)
	{
		$data = array(
			'title' =>array("$title_view","$title_view_one", "<a data-toggle='modal' data-target='.bd-example-modal-lg' class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)'><i class='fa fa-plus-circle'></i>&nbsp;$title_view_two</a>","Evaristo Escudero Huillcamascco"),
			'lista_productos' => $this->Inventario_model->lista_productos_proveedor()

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
           $data = $this->Inventario_model->fetch_single_user_experience_proveedor($this->input->post("user_id"));
           foreach($data as $row)  
           { 
           		$output['nombre'] = $row->nombre;
				$output['ruc'] = $row->ruc;
				$output['direccion'] = $row->direccion;
				$output['telefono'] = $row->telefono;
				$output['correo'] = $row->correo;

           }  
           echo json_encode($output);
    }else{
      redirect(base_url().'Inicio/Zona_roja/');
    }

		
	}

	

	//
} ?>