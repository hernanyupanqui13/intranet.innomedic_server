<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Examenes extends CI_Controller
{
	function __construct() 
	{ 
		parent::__construct();
	    ini_set('date.timezone', 'America/Lima');
	    $this->load->model("Examenes_model");
	    $this->load->helper(array('url','funciones'));
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("Examenes Clínicos","","admnin","admin"),
		);
		
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view("examenes/index",$data);
		$this->load->view('intranet_view/footer',$data);
	}

	//cargar area con jquery

	public function cargar_paquete()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = $this->Examenes_model->cargar_paquete();
		echo $data;
	}

	//cargar option de sexo

	public function cargar_sexo()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = $this->Examenes_model->cargar_sexo();
		echo $data;
	}

	//cargar_tipo_pago
	public function cargar_tipo_pago()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = $this->Examenes_model->cargar_tipo_pago();
		echo $data;
	}

	//cargar categoria

	public function cargar_paquete_tipo_examen()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = $this->Examenes_model->cargar_paquete_tipo_examen();
		echo $data;
	}


	

	//cargamos tipo comprbnate

	
	public function tipocomprobante()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = $this->Examenes_model->cargar_tipocomprobante();
		echo $data;
	}


	//lista examenes
	public function lista_examenes()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		 $postData = $this->input->post();

		$data = $this->Examenes_model->lista_examenes($postData);
		echo json_encode($data);
	}

	//listar_datos EXAMEN

	public function agregar_detalle_tipo_examen()
	{
		$codigo = $this->input->post("id_codigo");
		$data = $this->Examenes_model->agregar_detalle_tipo_examen_id($codigo);
		echo json_encode($data);

	}

	//listar paquetes por id
	public function cargar_lista_paquete()
	{
		$codigo = $this->input->post("id_codigo_xx");
		$data = $this->Examenes_model->cargar_lista_paquete($codigo);
		echo json_encode($data);
	}

	//cargamos el precio por paquete

	public function cargar_lista_precio()
	{
		$codigo = $this->input->post("id_codigo_xx");
		$data = $this->Examenes_model->cargar_lista_precio($codigo);
		echo json_encode($data);
	}
	//registrar datos del examen


	public function registrar_datos()
	{
		if ($this->input->method() === 'post') {


			//validamos para mostrar rayox x y  laboratorio 
			//Si el paquete esta vacio o nulo eso quiere decir que no se va a mostar el registyro
			$paquetex = $this->input->post("paquete");
			$id_examenx = $this->input->post("id_examen");

			if ($paquetex=="" || $paquetex==0 || $paquetex==NULL) {
				$mostramos = 0;
			}else if ($id_examenx=="" || $id_examenx==0 || $id_examenx==NULL) {
				$mostramos = 1;
			}else{

			}


		 	$count = $this->input->post('count');
     	    $codigo = $this->input->post('codigo');
			$nombre_detalle = $this->input->post('nombre_detalle');
			$fecha =  date('Y-m-d');
			$precio_detalle =  $this->input->post('precio_detalle');
			$categoria_detalle =  $this->input->post('categoria_detalle');
			$url_unico = md5($this->input->post("nombres_completos").''.$this->input->post("apellido_paterno").''. $this->input->post("apellido_materno").''. $this->input->post("correo_electronico").''.date('Y-m-d').''.$this->input->post("dni"));

			//fecha de atencion validamos

			if ($this->input->post("fecha_atencionx")=="" || $this->input->post("fecha_atencionx")==NULL) {
				$fecha_atencion = date('Y-m-d G:i:s');
			} else {
				$fecha_atencion = $this->input->post("fecha_atencionx");
			}

			if(!empty($_FILES['imagen']['name'])){
				$config['upload_path'] = 'upload/boleta_cliente/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = "Boleta_de_pago_".rand(100000000000000,900000000000000).md5($_FILES['imagen']['name']);
				
				//Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('imagen')) {
					$uploadDataI = $this->upload->data();
					$imagen = $uploadDataI['file_name'];
				} else {
					$imagen = '';   
				}
				
			} else {
				$imagen = '';
			}

			$data = array(
				'id_usuario' => $this->session->userdata("session_id"),
				'dni' => $this->input->post("update_dni"),
				'nombre' => $this->input->post("nombres_completos"),
				'apellido_paterno' => $this->input->post("apellido_paterno"),
				'apellido_materno' => $this->input->post("apellido_materno"),
				'id_sexo' => $this->input->post("sexo"),
				'fecha_nacimiento' => $this->input->post("fecha_nacimiento"),
				'correo' => $this->input->post("correo_electronico"),
				'telefono_celular' => $this->input->post("telefono_celular"),
				'id_paquete' => $this->input->post("paquete"),
				'id_pago' => $this->input->post("tipo_pagoxx"),
				'observacion' => $this->input->post("observacion"),
				'empresa' => $this->input->post("empresa"),
				'ruc' => $this->input->post("ruc_xx_empl"),
				'precio' => $this->input->post("total"),
				'igv' => $this->input->post("igv"),
				'total' => $this->input->post("total_datos"),
				'subtotal' => $this->input->post("subtotal"),
				'status' =>1,
				'fecha_ed' => date('Y-m-d'),
				'tipocomprobante' =>  $this->input->post("tipocomprobante"),
				'fecha_registro' => date('Y-m-d G:i:s'),
				'nro_identificador' => $this->input->post("nro_identificador_insert"),
				'fecha_atencion' => $fecha_atencion,
				'hora' => $this->input->post("horax"),
				'boleta_pago' => $imagen,
				'mostramos' => $mostramos,
				'url_unico' => md5($this->input->post("nombres_completos").''.$this->input->post("apellido_paterno").''. $this->input->post("apellido_materno").''. $this->input->post("correo_electronico").''.date('Y-m-d').''.$this->input->post("dni")),

			);

			if ($this->Examenes_model->registrar_datos($data)) {
				$iddd = $this->Examenes_model->lastID();
				$this->actualizar_comprobante();
				$this->save_detalle($count,$fecha,$iddd,$codigo,$nombre_detalle,$precio_detalle,$categoria_detalle,$url_unico);
				//aqui validamos que no se registre si es paquete que se registre un valor si no no
				$this->agregar_rayosx($iddd,$url_unico);
				$this->agregar_laboratorio($iddd,$url_unico);	         	 
			}	
        	
		} else {
			redirect(base_url().'Inicio/Zona_roja/');
		}	
	}
	//agregamos un inser para rayox x
	protected function agregar_rayosx($iddd,$url_unico)
	{
		$dara = array(
			'id_paciente' => $iddd,
			'url' => $url_unico,
		);

		$this->Examenes_model->agregar_rayosx($dara);
	}

	protected function agregar_laboratorio($iddd,$url_unico)
	{
		$dara = array(
			'id_paciente' => $iddd,
			'url' => $url_unico,
		);
		
		$this->Examenes_model->insert_data_exam_laboratorio($dara);
	}

	//actualizar numero de usuario
	protected function actualizar_comprobante(){

        $comprobanteActual = $this->Examenes_model->getComprobante();
        $data = array (
            'numero' => $comprobanteActual->numero + 1,
        );
        $this->Examenes_model->updateComprobante($data);
    }

	protected function save_detalle($count,$fecha,$iddd,$codigo,$nombre_detalle,$precio_detalle,$categoria_detalle,$url_unico){
        for ($i =0; $i < count($count); $i++ ){
         
            $data = array (
                    'fecha' =>$fecha, 
                    'id_datos_generales' => $iddd,
                    'codigo' => $codigo[$i],
                    'descripcion' => $nombre_detalle[$i], 
                    'precio' => $precio_detalle[$i], 
                    'id_categoria'=> $categoria_detalle[$i],
                    'url_unico'=>$url_unico
                );

             $this->Examenes_model->save_detalle($data);

        } 
    }

    // factualizxamos los datos
    public function actualizar_registro_via_ajax_update()
    {
    	if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


		$id = $this->input->post("fecha_atencion_id");

		//actualizamos los datos del imngen

		


		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	$query = $this->db->query("select * from exam_datos_generales where nro_identificador='".trim($this->input->post("nro_identificador_update"))."' and dni='".trim($this->input->post("dni"))."' and Id='".$id."'");


        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
            $numero_unico = $x->nro_identificador;
            $dni_uni = $x->dni;
            $nombres_unicos = $x->nombre." ".$x->apellido_paterno." ".$x->apellido_materno;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
            	
               $data = array(
					'dni' => $this->input->post("update_dni"),
					'nombre' => $this->input->post("nombres_completos"),
					'apellido_paterno' => $this->input->post("apellido_paterno"),
					'apellido_materno' => $this->input->post("apellido_materno"),
					'id_sexo' => $this->input->post("sexo"),
					'fecha_nacimiento' => $this->input->post("fecha_nacimiento"),
					'correo' => $this->input->post("correo_electronico"),
					'telefono_celular' => $this->input->post("telefono_celular"),
					'id_paquete' => $this->input->post("paquete"),
					'id_pago' => $this->input->post("tipo_pagoxx"),
					'tipocomprobante' =>  $this->input->post("tipocomprobante"),
					'observacion' => $this->input->post("observacion"),
					'empresa' => $this->input->post("empresa"),
					'ruc' => $this->input->post("ruc_xx_empl"),
					'precio' => $this->input->post("total"),
					'igv' => $this->input->post("igv"),
					'total' => $this->input->post("total_datos"),
					'subtotal' => $this->input->post("subtotal"),
					'status' =>1,
					'fecha_ed' => date('Y-m-d'),
					'fecha_update' => date('Y-m-d G:i:s'),
					'fecha_atencion' => $this->input->post("fecha_atencion_update"),
					'hora' => $this->input->post("hora_atemncion_update"),
					//'boleta_pago' => $imagen_updates

				);
              if(!empty($_FILES['imagen']['name'])){
		            $config['upload_path'] = 'upload/boleta_cliente/';
		            $config['allowed_types'] = 'jpg|jpeg|png|gif';
		            $config['file_name'] = "Boleta_de_pago_".rand(100000000000000,900000000000000).md5($_FILES['imagen']['name']);
		            $this->load->library('upload',$config);
		            $this->upload->initialize($config);
		            if($this->upload->do_upload('imagen')){
		                $this->Examenes_model->elimina_imagen_anterior($id);
		                $uploadData = $this->upload->data();
		                $data["boleta_pago"] = $uploadData['file_name'];
		            };
		        };
	       		 $this->Examenes_model->actualizar_registro_via_ajax_update($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		 echo json_encode(array('mensaje'=>'Se actualizo de manera correctamente los datos del paciente: '.$nombres_unicos.''));
            }else{
                echo json_encode(array('error'=>'El registro con el Nº - '.$numero_unico.' - DNI - '. $dni_uni.' ya existe, (Comunicate con el administrador)'));
             	$this->output->set_status_header(400);
        	}
        }
        else{
        	$query = $this->db->query("select * from exam_datos_generales where Id='".$id."'");
	        foreach ($query->result() as $x)
	        {
	     
	            $nombres_unicos = $x->nombre." ".$x->apellido_paterno." ".$x->apellido_materno;
	        }
	      
            $data = array(
	          //  'fecha_modif' => //date('Y-m-d h:i:s'),
	            'dni' => $this->input->post("update_dni"),
				'nombre' => $this->input->post("nombres_completos"),
				'apellido_paterno' => $this->input->post("apellido_paterno"),
				'apellido_materno' => $this->input->post("apellido_materno"),
				'id_sexo' => $this->input->post("sexo"),
				'fecha_nacimiento' => $this->input->post("fecha_nacimiento"),
				'correo' => $this->input->post("correo_electronico"),
				'telefono_celular' => $this->input->post("telefono_celular"),
				'id_paquete' => $this->input->post("paquete"),
				'id_pago' => $this->input->post("tipo_pagoxx"),
				'observacion' => $this->input->post("observacion"),
				'empresa' => $this->input->post("empresa"),
				'ruc' => $this->input->post("ruc_xx_empl"),
				'precio' => $this->input->post("total"),
				'igv' => $this->input->post("igv"),
				'total' => $this->input->post("total_datos"),
				'subtotal' => $this->input->post("subtotal"),
				'status' =>1,
				'fecha_ed' => date('Y-m-d'),
				'fecha_registro' => date('Y-m-d G:i:s'),
				'nro_identificador' => $this->input->post("nro_identificador"),
				'fecha_atencion' => $this->input->post("fecha_atencion_update"),
				'hora' => $this->input->post("hora_atemncion_update"),
				//'boleta_pago' => $imagen_updates,
        );
            if(!empty($_FILES['imagen']['name'])){
		            $config['upload_path'] = 'upload/boleta_cliente/';
		            $config['allowed_types'] = 'jpg|jpeg|png|gif';
		            $config['file_name'] = "Boleta_de_pago_".rand(100000000000000,900000000000000).md5($_FILES['imagen']['name']);
		            $this->load->library('upload',$config);
		            $this->upload->initialize($config);
		            if($this->upload->do_upload('imagen')){
		                $this->Examenes_model->elimina_imagen_anterior($id);
		                $uploadData = $this->upload->data();
		                $data["boleta_pago"] = $uploadData['file_name'];
		            };
		        };


        $this->Examenes_model->actualizar_registro_via_ajax_update($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo de manera correctamente los datos del paciente: '.$nombres_unicos.''));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
    }

	//listar empresas

	public function listar_proveedores()
	{
		 // POST data
	    $postData = $this->input->post();
	    // Get data
	    $data = $this->Examenes_model->listar_proveedores($postData);
	    echo json_encode($data);
	}

	//Cargamos la lista de la tabla

	public function ajax_list()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$list = $this->Examenes_model->get_datatables();
		$data = array();
		$no = $_POST['start']; 
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			$row[] = $person->apellido_paterno." ".$person->apellido_materno;
			$row[] = $person->nombre;
			$row[] = $person->dni;
			$row[] = '<span>'.$person->empresax.'....</span>';
			if ($person->fecha_atencion=="" || $person->hora=="") {
				
				$row[] = '<span class="label label-table label-success">'.$person->fecha_registro.'</span>';
			}else{
				
				$row[] = '<span class="label label-table label-danger">'.$person->fecha_atencion ." Hora ".$person->hora.'</span>';
			}
			$row[] = $person->tipopago;
			
			if ($person->status==1) {
				$row[]='<span class="label label-table label-warning">En proceso</span>';
			}else if($person->status==2){
				$row[]='<span class="label label-table label-danger">Anulado</span>';
			}else if($person->status==3){
				$row[]='<span class="label label-table label-success">Atendido</span>';
			}else{
				$row[]='<span class="label label-table label-info">Observación</span>';
			}

			//add html for action
			if ($person->status==2) {
				$row[] ='<a class="btn  btn-info detalle_info_print" href="javascript:void(0)"  title="Ver Detalle" id="'.$person->Id.'"><i class=" fas fa-clipboard-list"></i></a>
				';
			}else{
				$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				 <a class="btn  btn-info detalle_info_print" href="javascript:void(0)"  title="Ver Detalle" id="'.$person->Id.'"><i class=" fas fa-clipboard-list"></i></a>
				  <a class="btn  btn-danger delete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>
			
				  ';
			}
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Examenes_model->count_all(),
						"recordsFiltered" => $this->Examenes_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function Eliminar_detalle()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = array(
			'status' =>2 ,
			'fecha_eliminacion' =>date('Y-m-d G:i:s'),
		 );
		
		$this->Examenes_model->eliminar_datos_generales($this->input->post("user_id"),$data);
		echo json_encode(array('mensaje'=>'Se elimino el registro de manera correcta'));
	}

	//mostramos datos obtenidos mendiante el sistemna

	public function mostrar_datos_busqueda_avanzada()
	{
		// Revisando si el los parametros son el default o si son dados manualmente
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$fecha_inicio = $this->input->post('fecha_inicio');
	
		$fecha_fin= $this->input->post('fecha_fin');

		$nombre_busqueda = $this->input->post('nombre_busqueda');
	
		$dni_busqueda= $this->input->post('dni_busqueda');

		// Validando valores para la base de datos
		
		

		
		

		$list = $this->Examenes_model->mostrar_datos_busqueda_($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda);
		$data = array();
		
		$no = $_POST['start']; 
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			$row[] = $person->apellido_paterno." ".$person->apellido_materno;
			$row[] = $person->nombre;
			$row[] = $person->dni;
			$row[] = $person->empresa;
			if ($person->fecha_atencion=="" || $person->hora=="") {
				
				$row[] = '<span class="label label-table label-success">'.$person->fecha_registro.'</span>';
			}else{
				
				$row[] = '<span class="label label-table label-danger">'.$person->fecha_atencion ." Hora ".$person->hora.'</span>';
			}
			$row[] = $person->tipopago;
			
			if ($person->status==1) {
				$row[]='<span class="label label-table label-warning">En proceso</span>';
			}else if($person->status==2){
				$row[]='<span class="label label-table label-danger">Anulado</span>';
			}else if($person->status==3){
				$row[]='<span class="label label-table label-success">Atendido</span>';
			}else{
				$row[]='<span class="label label-table label-info">Observación</span>';
			}

			//add html for action
			if ($person->status==2) {
				$row[] ='<a class="btn  btn-info detalle_info_print" href="javascript:void(0)"  title="Ver Detalle" id="'.$person->Id.'"><i class=" fas fa-clipboard-list"></i></a>
				     ';
			}else{
				$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				 <a class="btn  btn-info detalle_info_print" href="javascript:void(0)"  title="Ver Detalle" id="'.$person->Id.'"><i class=" fas fa-clipboard-list"></i></a>
				  <a class="btn  btn-danger delete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>
				 
				  ';
			}
			$row[] = $person->nro_identificador;
		
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => 0,		//$this->Examenes_model->count_all_busqueda($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda),  changed by hernan
			"recordsFiltered" => 0,		// $this->Examenes_model->count_filtered_busqueda($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda),   chaged by hernan
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);



	}

	//obtenermos los el numero de pedido

	public function correlativo_numer_exmaen()
	{
        if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


        $query = $this->db->query("select * from ta_correlativo where Id='3'");
        foreach ($query->result() as $x)
        {
            echo $x->numero+1;
        }
	}
	//obtenermows el codigo unico para el registro de paquete
	public function correlativo_numer_codigo_unico()
	{
        if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


        $query = $this->db->query("select * from ta_correlativo where Id='4'");
        foreach ($query->result() as $x)
        {
            echo $x->numero+1;
        }
	}

	//obtenermows el codigo unico para el registro de paquete
	public function correlativo_numer_codigo_unico_id()
	{
        if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


        $query = $this->db->query("select * from ta_correlativo where Id='4'");
        foreach ($query->result() as $x)
        {
            echo $x->numero+1;
        }
	}

	


	public function Obtener_registros($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Examenes_model->Obtener_registros_ajax($id);
		echo json_encode($data);
	}

	//tipo pago

 
	

	public function tipo_pago()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$list = $this->Examenes_model->get_datatables_tipo_pago();
		$data = array();
		$no = $_POST['start']; 
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			

			if ($person->status==1) {
				$row[]='<span class="label label-table label-success">Activo</span>';
			}else if($person->status==2){
				$row[]='<span class="label label-table label-danger">Anulado</span>';
			}
			$row[] = $person->nombre;

			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="actualizar_tipo_pago('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
			  <a class="btn  btn-danger delete_tipo_pago" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>
			  ';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Examenes_model->count_all_tipo_pago(),
						"recordsFiltered" => $this->Examenes_model->count_filtered_tipo_pago(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function registrar_tipo_pago_ajax()
	{
		if ($this->input->method() === 'post') {
			//validamos para qie no se registre dos veces //quitamos id_paquete='".trim($this->input->post("paquete"))."' and
			$query = $this->db->query("select * from exam_tipo_pago where nombre='".trim($this->input->post("nombre_tipo_pago"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El registro ya se encuentra en el sistema'));
             $this->output->set_status_header(400);
         }else{
	         	$data = array(
				'nombre' => $this->input->post("nombre_tipo_pago"),
				'fecha_creacion' => date('Y-m-d G:i:s'),
				'status' => "1",
			);
	         if ($this->Examenes_model->registrar_datos_tipo_pago($data)) {
	         	 
	         }
			
         }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	//end tipo pago
	public function Obtener_registros_tipo_pago($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Examenes_model->Obtener_registros_ajax_tipo_pago($id);
		echo json_encode($data);
	}

	public function actualizar_tipo_pago_idd()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


		$id = $this->input->post("id_tipo_pago_update");
		//actualizamos los datos del imnge

		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	$query = $this->db->query("select * from exam_tipo_pago where nombre='".trim($this->input->post("nombre_tipo_pago"))."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
					'nombre' => $this->input->post("nombre_tipo_pago"),
					'fecha_actualizacion' => date('Y-m-d G:i:s'),
				);
	       		$this->Examenes_model->actualizar_registro_via_ajax_update_tipo_pago($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
            }else{
                echo json_encode(array('error'=>'El registro ya existe (Comunicate con el administrador)'));
             	$this->output->set_status_header(400);
        	}
        }
        else{
        	
            $data = array(
				'nombre' => $this->input->post("nombre_tipo_pago"),
				'fecha_actualizacion' => date('Y-m-d G:i:s'),

        );


        $this->Examenes_model->actualizar_registro_via_ajax_update_tipo_pago($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	public function eliminar_datos_generales_tipo_pago()
	{
		/*if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}*/
		$id = $this->input->post("user_idd");
		$data = array(
			'fecha_eliminacion' => date('Y-m-d G:i:s'),
			'status' => "2",
		);
		
		$this->Examenes_model->eliminar_datos_generales_tipo_pago($id,$data);
		echo json_encode(array('mensaje'=>'Se elimino el registro de manera correcta'));
	}



	//agregamos table_paquete_general

	public function table_paquete_general()
	{
		if ($this->session->userdata("session_id")=="") { 
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$list = $this->Examenes_model->get_datatables_table_paquete_general();
		$data = array();
		$no = $_POST['start']; 
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			if ($person->status==1) {
				$row[]='<span class="label label-table label-success">Activo</span>';
			}else if($person->status==2){
				$row[]='<span class="label label-table label-danger">Anulado</span>';
			}
			$row[] = $person->nombre;
			$row[] = '<span>S/.'.$person->precio.'</span>';

			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="actualizar_paquete('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
			  <a class="btn  btn-danger delete_paquete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>
			  <a class="btn  btn-dark agregamos_detalle" href="javascript:void(0)"  title="Asociar" id="'.$person->Id.'"><i class="fas fa-th-list"></i></a>
			  ';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Examenes_model->count_all_table_paquete_general(),
						"recordsFiltered" => $this->Examenes_model->count_filtered_table_paquete_general(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function registrar_paquete_ajax()
	{
		if ($this->input->method() === 'post') {
			//validamos para qie no se registre dos veces
			$query = $this->db->query("select * from exam_paquetes where nombre='".trim($this->input->post("nombre_tipo_pago"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El registro ya se encuentra en el sistema'));
             $this->output->set_status_header(400);

         }else{
        
         	   
	         	$data = array(
				'nombre' => $this->input->post("nuevo_paquete"),
				'precio' => $this->input->post("nuevo_precio"),
				'fecha_creacion' => date('Y-m-d G:i:s'),
				'status' => "1",

			);
	         if ($this->Examenes_model->registrar_datos_table_paquete_general($data)) {
	         	 
	         }
			
         }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	//aqui termina

	public function Obtener_registros_paquete($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Examenes_model->Obtener_registros_ajax_table_paquete_general($id);
		echo json_encode($data);
	}

	public function eliminar_datos_generales_paquete()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$id = $this->input->post("user_idd");
		$data = array(
			'fecha_eliminacion' => date('Y-m-d G:i:s'),
			'status' => "2",
		);
		
		$this->Examenes_model->eliminar_datos_generales_table_paquete_general($id,$data);
		echo json_encode(array('mensaje'=>'Se elimino el registro de manera correcta'));
	}

	public function actualizar_paquete_idd()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("id_tipo_paquete_update");
		//actualizamos los datos del imnge

		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	$query = $this->db->query("select * from exam_paquetes where nombre='".trim($this->input->post("nuevo_paquete"))."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
					'nombre' => $this->input->post("nuevo_paquete"),
					'precio' => $this->input->post("nuevo_precio"),
					'fecha_actualizacion' => date('Y-m-d G:i:s'),
				);
	       		$this->Examenes_model->actualizar_registro_via_ajax_update_table_paquete_general($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
            }else{
                echo json_encode(array('error'=>'El registro ya existe (Comunicate con el administrador)'));
             	$this->output->set_status_header(400);
        	}
        }
        else{
        	
            $data = array(
				'nombre' => $this->input->post("nuevo_paquete"),
				'precio' => $this->input->post("nuevo_precio"),
				'fecha_actualizacion' => date('Y-m-d G:i:s'),

        );

        $this->Examenes_model->actualizar_registro_via_ajax_update_table_paquete_general($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	//asociamos los paquetes por general datos incluidos



	public function agregamos_lista_paquetes()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


		if ($this->input->post('userda_data')=="" || $this->input->post('userda_data')==NULL) {
			$user_id = '0';
		
		}else{
			$user_id = $this->input->post('userda_data');
		}

		$list = $this->Examenes_model->mostrar_datos_agregar_detalle_paquete($user_id);
		$data = array();
		$no = $_POST['start']; 
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			if ($person->status==1) {
				$row[]='<span class="label label-table label-success">Activo</span>';
			}else if($person->status==2){
				$row[]='<span class="label label-table label-danger">Anulado</span>';
			}
			$row[] = $person->nombre;
			$row[] = $person->paquetes;
			

			
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="actualizar_paquete_asociado('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn  btn-danger delete_paquete_asociado" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>
				  ';
			
		
			$data[] = $row;
		}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Examenes_model->count_all_busqueda_detalle_paquete($user_id),
						"recordsFiltered" => $this->Examenes_model->count_filtered_busquedadetalle_paquete($user_id),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);

	}

	public function registrar_tipo_paquete_asociado()
	{
		if ($this->input->method() === 'post') {
			//validamos para qie no se registre dos veces //quitamos id_paquete='".trim($this->input->post("paquete"))."' and
			$query = $this->db->query("select * from exam_tipo_paquete where nombre='".trim($this->input->post("asociar_nombre"))."' and id_paquete='".trim($this->input->post("id_registrar_id_paquete"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El registro ya se encuentra en el sistema'));
             $this->output->set_status_header(400);

         }else{

	         	$data = array(
				'nombre' => $this->input->post("asociar_nombre"),
				'id_paquete' => $this->input->post("id_registrar_id_paquete"),
				'codigo' => trim($this->input->post("nro_valido_innomedic")),
				'id_categoria' => trim($this->input->post("categoria_tipo_asociar")),
				'created' => date('Y-m-d G:i:s'),
				'status' => "1",
			);
	         if ($this->Examenes_model->registrar_tipo_paquete_asociado($data)) {
	         	  $this->actualizar_comprobante_unico_innomed();
	         }
			
         }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	//actualizar numero de usuario
	protected function actualizar_comprobante_unico_innomed(){

        $comprobanteActual_xx = $this->Examenes_model->getComprobante_unico_innomedic();
        $data = array (
            'numero' => $comprobanteActual_xx->numero + 1,
        );
        $this->Examenes_model->updateComprobante_unico_innomedic($data);
    }
 
	//aqui termina

	public function Obtener_registros_paquete_asociados($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Examenes_model->Obtener_registros_ajax_table_paquete_general_asociados($id);
		echo json_encode($data);
	}

	public function eliminar_datos_generales_paquete_asociado()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$id = $this->input->post("user_idd");
		/*	$data = array(
			'delete' => date('Y-m-d G:i:s'),
			'status' => "2",
		);*/
		
		//$this->Examenes_model->eliminar_datos_generales_table_paquete_general_asociado($id,$data);
		$this->Examenes_model->eliminar_datos_generales_table_paquete_general_asociado($id);
		echo json_encode(array('mensaje'=>'Se elimino el registro de manera correcta'));
	}

	public function actualizar_paquete_idd_asociado()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("id_registrar_id_paquete_asociado");
		//actualizamos los datos del imnge

		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	$query = $this->db->query("select * from exam_tipo_paquete where nombre='".trim($this->input->post("asociar_nombre"))."' and codigo='".trim($this->input->post("asociar_codigo"))."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
					'nombre' => trim($this->input->post("asociar_nombre")),
					'id_categoria' => trim($this->input->post("categoria_tipo_asociar")),
					'update' => date('Y-m-d G:i:s'),
				);
	       		$this->Examenes_model->actualizar_registro_via_ajax_update_table_paquete_general_asociado($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
            }else{
                echo json_encode(array('error'=>'El registro ya existe (Comunicate con el administrador)'));
             	$this->output->set_status_header(400);
        	}
        }
        else{
        	
            $data = array(
				'nombre' => $this->input->post("asociar_nombre"),
				'id_categoria' => trim($this->input->post("categoria_tipo_asociar")),
				'update' => date('Y-m-d G:i:s'),

        );

        $this->Examenes_model->actualizar_registro_via_ajax_update_table_paquete_general_asociado($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	//registramos paquete asociado




	
	public function tipo_examen_general()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}


		
		$list = $this->Examenes_model->mostrar_datos_agregar_detalle_tipoexamen();
		$data = array();
		$no = $_POST['start']; 
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			if ($person->status==1) {
				$row[]='<span class="label label-table label-success">Activo</span>';
			}else if($person->status==2){
				$row[]='<span class="label label-table label-danger">Anulado</span>';
			}
			$row[] = $person->codigo;
			$row[] = $person->precio;
			$row[] = $person->nombre;
			
			
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="actualizar_tipoexamen('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn  btn-danger delete_tipoexamen_xx" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>
				  ';
			
		
			$data[] = $row;
		}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Examenes_model->count_all_busqueda_detalle_paquetetipoexamen(),
						"recordsFiltered" => $this->Examenes_model->count_filtered_busquedadetalle_paquetetipoexamen(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);

	}


	public function registrar_tipo_examen_por_ajax()
	{
		if ($this->input->method() === 'post') {
			//validamos para qie no se registre dos veces //quitamos id_paquete='".trim($this->input->post("paquete"))."' and
			$query = $this->db->query("select * from exam_tipoexamen where nombre='".trim($this->input->post("nombre_examen_tipo"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El registro ya se encuentra en el sistema'));
             $this->output->set_status_header(400);

         }else{


	         	$data = array(
				'nombre' => trim($this->input->post("nombre_examen_tipo")),
				'precio' => trim($this->input->post("precio_tipo_examen")),
				'codigo' => ltrim($this->input->post("nro_valido_innomedic_codigo")),
				'id_categoria' => trim($this->input->post("categoria_tipo_examen")),
				//'codigo' => str_replace(' ', '', $this->input->post("nro_valido_innomedic_codigo")),
				'created' => date('Y-m-d G:i:s'),
				'status' => "1",
			);
	         if ($this->Examenes_model->registrar_tipo_paquete_tipoexamen($data)) {
	         	  $this->actualizar_comprobante_unico_innomed_idd();
	         }
			
         }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	//actualizar numero de usuario
	protected function actualizar_comprobante_unico_innomed_idd(){

        $comprobanteActual_xx = $this->Examenes_model->getComprobante_unico_innomedic();
        $data = array (
            'numero' => $comprobanteActual_xx->numero + 1,
        );
        $this->Examenes_model->updateComprobante_unico_innomedic($data);
    }

    //obtenemos el registro 

    public function Obtener_registros_tipo_exmaen($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Examenes_model->Obtener_registros_ajax_table_paquete_general_tipoexamen($id);
		echo json_encode($data);
	}
	

	public function actualizar_paquete_idd_tipoexamen()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("id_registrar_id_tipopexamen");
		//actualizamos los datos del imnge
		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	$query = $this->db->query("select * from exam_tipoexamen where nombre='".trim($this->input->post("nombre_examen_tipo"))."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
               		'nombre' => trim($this->input->post("nombre_examen_tipo")),
					'precio' => trim($this->input->post("precio_tipo_examen")),
					'id_categoria' => trim($this->input->post("categoria_tipo_examen")),
					'update' => date('Y-m-d G:i:s'),
				);
	       		$this->Examenes_model->actualizar_registro_via_ajax_update_table_paquete_general_tipoexamen($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
            }else{
                echo json_encode(array('error'=>'El registro ya existe (Comunicate con el administrador)'));
             	$this->output->set_status_header(400);
        	}
        }
        else{
        	
            $data = array(
				'nombre' => trim($this->input->post("nombre_examen_tipo")),
				'precio' => trim($this->input->post("precio_tipo_examen")),
				'id_categoria' => trim($this->input->post("categoria_tipo_examen")),
				'update' => date('Y-m-d G:i:s'),

        );

        $this->Examenes_model->actualizar_registro_via_ajax_update_table_paquete_general_tipoexamen($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo correctamente el registro'));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	public function eliminar_datos_generales_paquete_tipoexamen()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$id = $this->input->post("user_idd");
		$data = array(
			'delete' => date('Y-m-d G:i:s'),
			'status' => "2",
		);
		
		$this->Examenes_model->eliminar_datos_generales_table_paquete_general_tipoexamen($id,$data);
		echo json_encode(array('mensaje'=>'Se elimino el registro de manera correcta'));
	}

	//mostramos datos a Imprimir


	public function mostrar_datos_a_imprimir()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("user_id");

		$dataxx = $this->Examenes_model->mostrar_datos_a_imprimir($id);
		echo json_encode($dataxx);
	}
	public function mostrar_datos_a_imprimir_detalles()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		} 
		$id = $this->input->post("user_id");

		$dataxx = $this->Examenes_model->mostrar_datos_a_imprimir_detalles($id);
		echo json_encode($dataxx);
	}

	public function mostrar_datos_a_imprimir_detalles_laboratorio()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		} 
		$id = $this->input->post("user_id");

		$dataxx = $this->Examenes_model->mostrar_datos_a_imprimir_detalles_laboratorio($id);
		echo json_encode($dataxx);
	}

	//detalles por laboratorio

	

	



	

	



	





} ?>

