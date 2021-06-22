<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Pedidos extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model(array("Pedidos_model","Inventario_model"));

		$this->load->helper(array("funciones"));

		  
	}

	public function fake() {
		echo "Roger"; 	
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}
		$data = array(
			'title' =>array("estas viendo la lista de Pedidos","Lista de Pedidos","<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
	
		);

		if($this->uri->segment(5,0)==0 and $this->uri->segment(6,0)==0){
            $desde  =   date('Y-m-d');
            $hasta  =   date('Y-m-d');
            //$desde  =   fecha_ymd(date('m/d/Y'));
           // $hasta  =   fecha_ymd(date('m/d/Y'));
             
            $data['desdex']  =   "";
            $data['hastax']  =   "";
        }else{
            $desde  =   $this->uri->segment(5,0);
            $hasta  =   $this->uri->segment(6,0);
             
            $data['desdex']  =   fecha_mdy($this->uri->segment(5,0));
            $data['hastax']  =   fecha_mdy($this->uri->segment(6,0));
        }
        if($this->uri->segment(4,0)==0){
            $data['num']    =  '';
        }else{
            $data['num']    =   $this->uri->segment(4,0);
        }
           

        $data['desde']  =   $desde;
        $data['hasta']  =   $hasta;	
        
        $numcomprobante =   $this->uri->segment(4,0);

        $data['lista_pedidos']  =   $this->Pedidos_model->lista_pedidos($numcomprobante,$desde,$hasta);
        $data['unidad_medida']  =   $this->Pedidos_model->unidad_medida();


	
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('pedidos/index1',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	



    public function comprobantefactura($url)
    {
    	$data = array(
			'title' =>array("COMPROBANTE DE ENTREGA INNOMEDIC.PE","Lista detalles pedido", "","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>"),
			'lista_detalles_pedidos' => $this->Inventario_model->lista_detalles_pedidos($url),
			'listacomprobante' => $this->Inventario_model->listacomprobante(),
			'listacombo1' => $this->Inventario_model->listacombo1(),
			'lista_detalle_pedido_general' => $this->Inventario_model->lista_detalle_pedido_general($url),

		
		 );
    	$this->load->view("imprimir/index_users",$data);
    }


	//registrar entrada de pedidos
	function registrar_entrada()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		if ($this->input->method() === 'post') {
	
			$serie = $this->input->post("serie");
			$numcomprobante =correlativo($this->input->post("numero"));
			$usuario = $this->input->post("id_usuario_id_xx");
			$fecha =$this->input->post("fecha");
		
			$url =  md5($this->input->post("serie").'-'.$this->input->post("numero").'-'.$this->input->post("trabajadores_empl_id"));

			//trabajador
			$dni = $this->input->post("dni_xx");
			$telefono_movil = $this->input->post("telefono_xx");

			$id_producto = $this->input->post('id_producto');
			$cantidad = $this->input->post('cantidad');
			$unidad = $this->input->post("unidad"); 

			$count = $this->input->post('count');
			$estado = "1";
			$cod = $this->input->post('codigo');
			$area = $this->input->post("areaDelUsuario");
			$areas_list = [
				"ESPIROMETRIA",
				"PLAZA NORTE",
				"AUDIOMETRIA",
				"PSICOLOGIA",
				"OFTALMOLOGIA",
				"RADIOLOGIA",
				"ADMISION",
				"ELECTRO",
				"MANTENIMIENTO",
				"CANADA",
				"RECURSOS HUMANOS",
				"FACTURACION",
				"GERENCIA",
				"VENTAS",
				"TESORERIA",
				"FISIOTERAPIA",
				"MEDICINA",
				"SST",
				"CALIDAD",
				"LOGISTICA",
				"COORDINACION",
				"RAYOS X",
				"TECNOLOGIA DE LA INF.",
				"REGULARIZADOR",
				"AUXILIAR GENERAL",
				"ADMINISTRACION",
				"LABORATORIO",
				"TRIAJE",
				"CAMPAÑA",
				"PROCESOS FINALES"
			];

			//verificamos el stock antes de registrar el producto

			//agregar cabecera
			$data_number = array(
				'seriecomprobante' =>$serie, 
				'numcomprobante' =>$numcomprobante,
				'tipocomprobante' =>"2",
				'usuario' => $usuario,
				'fecha' =>$fecha,
				'dni' => $dni,
				'telefono' => $telefono_movil,
				'url_view' => $url,
				'estado' => "0",
				'area'=>$area
			);

			
			if ($this->Inventario_model->agregar_producto($data_number)) {
				 
				$idventa = $this->Inventario_model->lastID();
	            $this->actualizar_comprobante();
	            $this->actualiazar_trabajador($usuario,$dni,$telefono_movil);
	            $this->save_detalle($count,$fecha,$idventa,$cantidad,$id_producto,$url,$unidad);
	            echo json_encode(array("registro" => "Se registro de menera correcta"));
			}else{
				echo json_encode(array("error_registro" => "No se puedo registrar la venta"));
				$this->output->set_status_header(400);
			}
		}else{
			redirect(base_url().'Mantenimiento/Pedidos/');
		}

		

		
	}  
	//actualizar numero de usuario
	protected function actualizar_comprobante(){

        $comprobanteActual = $this->Inventario_model->getComprobante();
        $data = array (
            'numero' => $comprobanteActual->numero + 1,
        );
        $this->Inventario_model->updateComprobante($data);
    }
    // aqui actualizamos los datos
	protected function actualiazar_trabajador($usuario,$dni,$telefono_movil){

        $data_trabajador = array(
			'nro_documento' => $dni,
			'telefono_movil' => $telefono_movil,

		);
		$data = $this->Inventario_model->actualiazar_trabajador_lista($usuario,$data_trabajador);
		
    }
	//registrar detalle del pedido
	//protected function save_detalle($productos,$idventa,$precios,$cantidades,$importes){
    protected function save_detalle($count,$fecha,$idventa,$cantidad,$id_producto,$url,$unidad){
        for ($i =0; $i < count($count); $i++ ){
          $data = array (
          			'fecha' =>$fecha, 
          			'id_venta' => $idventa,
          			'cantidad' => $cantidad[$i],
          	        'producto' => $id_producto[$i],
                    'estado' => "1",
                    'identificador' =>$url,
                    'unidad' =>$unidad[$i]    
          );
            $this->Inventario_model->save_detalle($data);
          //  $this->updateProducto($id_producto[$i],$cantidad[$i]);
        } 
    }

    /*protected function updateProducto($id_producto,$cantidad){
       $productoActual = $this->Inventario_model->getProducto($id_producto);
        $data = array (
            'total' => $productoActual->total - $cantidad,
        );
        $this->Inventario_model->update_stock($id_producto,$data);
    
    }*/

    public function detalles_pedido($url)
    {
    	if ($url==null) {
    		redirect(base_url().'Inventario/Pedidos/');
    	}

    	$data = array(
			'title' =>array("COMPROBANTE DE ENTREGA INNOMEDIC.PE","Lista detalles pedido", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Mantenimiento/Pedidos/Nuevo_pedido_users/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>"),
			'lista_detalles_pedidos' => $this->Inventario_model->lista_detalles_pedidos($url),
			'listacomprobante' => $this->Inventario_model->listacomprobante(),
			'listacombo1' => $this->Inventario_model->listacombo1(),
			'lista_detalle_pedido_general' => $this->Inventario_model->lista_detalle_pedido_general($url),

		


		 );
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		//$this->load->view("inventario/_view_form",$data);
		$this->load->view("pedidos/view_pedido_users",$data);
		$this->load->view("intranet_view/footer",$data);	

    }


	public function Agregar_nuevo()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		}
			

        if ($this->input->method() === 'post') {

		$query = $this->db->query("select * from ts_pedidos where fecha_pedido='".$this->input->post("fecha_pedido")."' and id_unidad_medida='".$this->input->post("unidad_medida")."' and descripcion='".$this->input->post("descripcion")."' and id_usuario='".$this->session->userdata("session_id")."'");
        $row = $query->row();
        if(isset($row)){ // cuando es mayor que vacio o cero
          echo json_encode(array('error'=>'El Pedido ya se encuentra registrado'));
         $this->output->set_status_header(400);
    	}else{
    		//Prepare array of user data
        $userData = array(
            'cantidad' => $this->input->post('cantidad'),
            'id_unidad_medida' => $this->input->post('unidad_medida'),
            'descripcion' => $this->input->post('descripcion'),
            'status'=> 4,
            'id_usuario'=>$this->session->userdata("session_id"),
            'fecha_pedido' =>$this->input->post('fecha_pedido'),
            'prioridad' => $this->input->post('prioridad'),
            'vista'=> 2,
            'nombres_completos' => $this->input->post("nombres_completos"),
        );
        //Pass user data to model
        $this->Pedidos_model->insert($userData);
        echo json_encode(array('mensaje'=>'Se registro de manera Exitosa'));

    	}

	}else{
		redirect(base_url().'Inicio/Zona_roja/');
	}
            



	}









 



	//Unidad Medida


	public function Unidad_medida()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}

		$data = array(
			'title' =>array("estas viendo la lista de Unidad Medida","Lista de Unidad Medida","<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' data-toggle='modal' data-target='#staticBackdrop_xx'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Unidad Medida</a>","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
			'lista_Unidad_Medida' => $this->Pedidos_model->lista_Unidad_Medida(),
			'lista_Unidad'=>$this->Pedidos_model->lista_Unidad(),
			
			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('pedidos/unidad_medida',$data); 
		$this->load->view('intranet_view/footer',$data);
	}

	//listar unidad_medida

	public function lista_producto_x_categoria()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		if($this->input->post('country_id'))
		  {
		   echo $this->Pedidos_model->lista_producto_x_categoria_lis($this->input->post('country_id'));
		  }
	}

	//autocomplete

	public function Lista_descripcion_list_add_autocomplete_lis()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		// POST data
	    $postData = $this->input->post();
	    // Get data
	    $data = $this->Pedidos_model->Lista_descripcion_list_add_autocomplete($postData);
	    echo json_encode($data);

		
	}



	public function ajax_list_unidad_medida_list()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$list = $this->Pedidos_model->get_datatables_unidad_medida();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			$row[] = $person->id_unidad;
			$row[] = $person->descripcion_unidad;
			$row[] = $person->fecha;
			if ($person->status=="1") {
				$row[]='<span class="label label-table label-success">Activado</span>';
			}else{
				$row[]='<span class="label label-table label-danger">Observación</span>';
			}

			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn  btn-danger delete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Pedidos_model->count_all_unidad_medida(),
						"recordsFiltered" => $this->Pedidos_model->count_filtered_unidad_medida(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function Registrar_unidad_medidia()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		//$this->_validate();
		

 		if ($this->input->method() === 'post') {

 			$query = $this->db->query("select * from ts_unidad_medida where id_unidad='".trim($this->input->post("unidad"))."' and id_descripcion_unidad='".trim($this->input->post("id_unidad_medida"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'Unidad Medida ya se encuentra registrado'));
             $this->output->set_status_header(400);
        }else{
        $data = array(
            'fecha' => date('Y-m-d h:i:s'),
            'id_unidad' => $this->input->post('unidad'),
            'id_descripcion_unidad' => $this->input->post("id_unidad_medida"),
            'status' => "1",
        );
        $this->Pedidos_model->agregar_registrar_Registrar_unidad_medidia($data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se registro de manera Exitosa'));
		}
 		}else{

 			redirect(base_url().'Inicio/Zona_roja/');
 		}

		
	}
	//eliminar

	public function Eliminar_unidad_medida_data()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		
		$this->Pedidos_model->Eliminar_unidad_medida_delete($this->input->post("user_id"));
		echo json_encode(array('mensaje'=>'Se elimino el registro de manera correcta'));
	}

	//Obtener registros desde unidad medida

	public function Obtener_unidad_medida($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Pedidos_model->Obtener_unidad_medida_obtener($id);
		echo json_encode($data);
	}
	//Descripcion de Unidad de Medida  
	public function Actualizar_unidad_medida()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("idxx");

		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	$query = $this->db->query("select * from ts_unidad_medida where id_unidad='".trim($this->input->post("unidadx"))."' and id_descripcion_unidad='".trim($this->input->post("id_unidad_medidax"))."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
	           	'fecha_modif' => date('Y-m-d h:i:s'),
	            'id_unidad' => $this->input->post('unidadx'),
	            'id_descripcion_unidad' => $this->input->post("id_unidad_medidax"),
	            'status' => "1",
		        );
	       		 $this->Pedidos_model->Actualizar_unidad_medida_update($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		 echo json_encode(array('mensaje'=>'Se actualizo de manera Correcta'));
            }else{
                echo json_encode(array('error'=>'Unidad Medida ya se encuentra registrado'));
             	$this->output->set_status_header(400);
        	}
        }else{
            $data = array(
	            'fecha_modif' => date('Y-m-d h:i:s'),
	            'id_unidad' => $this->input->post('unidadx'),
	            'id_descripcion_unidad' => $this->input->post("id_unidad_medidax"),
	            'status' => "1",
        );
        $this->Pedidos_model->Actualizar_unidad_medida_update($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo de manera Correcta'));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}


		
	}














	public function Descripcion_unidad_medida()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}

		$data = array(
			'title' =>array("estas viendo la lista de Descripcion Unidad Medida","Lista de Descripcion de Unidad Medida","<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' data-toggle='modal' data-target='#staticBackdrop_xx'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Descripcion</a>","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
			
			
			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('pedidos/descripcion_unidad_medida',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function Obtener_descripcion_unidad_medida($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Pedidos_model->Obtener_descripcion_unidad_medida_obtener($id);
		echo json_encode($data);
	}

 	
 	public function ajax_list()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$list = $this->Pedidos_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[]=$no;
			$row[] = $person->descripcion;
			$row[] = $person->fecha;
			if ($person->status=="1") {
				$row[]='<span class="label label-table label-success">Activado</span>';
			}else{
				$row[]='<span class="label label-table label-danger">Observación</span>';
			}

			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn  btn-danger delete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Pedidos_model->count_all(),
						"recordsFiltered" => $this->Pedidos_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	


	public function Registrar_descripcion_unidad_medidia()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		//$this->_validate();
		

 		if ($this->input->method() === 'post') {

 			$query = $this->db->query("select * from ts_descripcion_unidad_medida where descripcion='".trim($this->input->post("descripcion"))."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'Descripcion de la UNI-Medida ya se encuentra registrado'));
             $this->output->set_status_header(400);
        }else{
        $data = array(

            'fecha' => date('Y-m-d h:i:s'),
            'descripcion' => $this->input->post('descripcion'),
            'status' => "1",
        );
        $this->Pedidos_model->agregar_registrar_Registrar_descripcion_unidad_medidia($data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se registro de manera Exitosa'));
		}
 		}else{

 			redirect(base_url().'Inicio/Zona_roja/');
 		}

		
	}

	public function Eliminar_descripcion_unidad_medida()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		
		$this->Pedidos_model->Eliminar_descripcion_unidad_medida_delete($this->input->post("user_id"));
		echo json_encode(array('mensaje'=>'Se registro de manera Correcta'));
	}



	public function Actualizar_descripcion_unidad_medida()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("idxx");

		if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
     	 $query = $this->db->query("select * from ts_descripcion_unidad_medida where descripcion='".$this->input->post("descripcionx")."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();

        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
	           	'fecha_modif' => date('Y-m-d h:i:s'),
	            'descripcion' => $this->input->post('descripcionx'),
	            'status' => "1",
		        );
	       		 $this->Pedidos_model->Actualizar_descripcion_unidad_medida_update($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		 echo json_encode(array('mensaje'=>'Se actualizo de manera Correcta'));
            }else{
                echo json_encode(array('error'=>'Descripcion de la UNI-Medida ya se encuentra registrado'));
             	$this->output->set_status_header(400);
        	}
        }else{
            $data = array(
            'fecha_modif' => date('Y-m-d h:i:s'),
            'descripcion' => $this->input->post('descripcionx'),
            'status' => "1",
        );
        $this->Pedidos_model->Actualizar_descripcion_unidad_medida_update($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo de manera Correcta'));
        }
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}


		
	}



	//administrador pedidos

	//view administrador


	public function Administrador_pedidos()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}



		$data = array(
			'title' =>array("estas viendo pedidos en general","Lista de Pedidos","<!--<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' data-toggle='modal' data-target='#staticBackdrop_xx'><i class='fa fa-plus-circle'></i>&nbsp;</a>-->","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
			

			
		);

		if($this->uri->segment(5,0)==0 and $this->uri->segment(6,0)==0){
            $desde  =   date('Y-m-d');
            $hasta  =   date('Y-m-d');
            //$desde  =   fecha_ymd(date('m/d/Y'));
           // $hasta  =   fecha_ymd(date('m/d/Y'));
             
            $data['desdex']  =   "";
            $data['hastax']  =   "";
        }else{
            $desde  =   $this->uri->segment(5,0);
            $hasta  =   $this->uri->segment(6,0);
             
            $data['desdex']  =   fecha_mdy($this->uri->segment(5,0));
            $data['hastax']  =   fecha_mdy($this->uri->segment(6,0));
        }
        if($this->uri->segment(4,0)==0){
            $data['num']    =  '';
        }else{
            $data['num']    =   $this->uri->segment(4,0);
        }
           
 
        $data['desde']  =   $desde;
        $data['hasta']  =   $hasta;
        
        $numcomprobante =   $this->uri->segment(4,0);
        $data['lista_pedidos'] = $this->Pedidos_model->lista_pedidos_xxx($numcomprobante,$desde,$hasta);

		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('pedidos/pedidos_general1',$data);
		$this->load->view('intranet_view/footer',$data);

	}


	function buscar(){
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        $numcomprobante = $this->input->post('numcomprobante');
        
        if($numcomprobante==''){
            $numcomprobante =   0;
        }
         
        if($this->input->post('desde')=='' or $this->input->post('hasta')==''){
            $desde  =   0;
            $hasta  =   0;
        }else{
            $desde  =   fecha_ymd($this->input->post('desde'));
            $hasta  =   fecha_ymd($this->input->post('hasta'));
        }
        
        //redirect(base_url().'Invencompra/index/'.$numcomprobante.'/'.$desde.'/'.$hasta);

         echo json_encode(array('retorno' =>base_url().'Mantenimiento/Pedidos/index/'.$numcomprobante.'/'.$desde.'/'.$hasta));
    }

	//LISTA PEDIDIOS

	public function obtener_lista_pedidos()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
		 $id = $this->input->post("user_id");
		$data = $this->Pedidos_model->obtener_lista_pedidos_list($id);
		echo json_encode($data);
	}

	//cambiar estado
	public function Actualizar_registros_pedidos()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
		if ($this->input->post("estado")==1) {
			$fecha = date('Y-m-d h:i:s');
		}else{
			$fecha = "0000-00-00 00:00:00";
		}

		$id_usuario = $this->input->post("id_usuario");
		$data = array(
			'status' =>$this->input->post("estado"),
			'fecha_entregado'=> $fecha,
			'x'=> '1',
		);

		$this->Pedidos_model->Actualizar_registros_pedidos_update($id_usuario,$data);
	}

	public function actualizando_estado_pedido()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
		if ($this->input->post("estado")==2 || $this->input->post("estado")==5) {
			$data_xx = 4;
			$cantidad_xx = 0;
		}else{
			$data_xx = $this->input->post("x");
			$cantidad_xx = $this->input->post("cantidad_entregado");
		}

		$id = $this->input->post("id");
		$data = array(
			'cantidad_entregada' => $cantidad_xx,
			'status' => $this->input->post("estado"),
			'observacion' => $this->input->post("observacion"),
			'x' => $data_xx,
			'fecha_entregado' => date('Y-m-d h:i:s'),
		);
		$this->Pedidos_model->actualizando_estado_pedido_update($id,$data);
	}


	//total de pedidos

	public function Total_pedidos()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}

		$data = array(
			'title' =>array("estas viendo Registro general de pedidos","Lista de Total de pedidos","<!--<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' data-toggle='modal' data-target='#staticBackdrop_xx'><i class='fa fa-plus-circle'></i>&nbsp;</a>-->","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
			'lista_total_pedidos' => $this->Pedidos_model->lista_total_pedidos(),
			
			
			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('pedidos/total_pedidos',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function actualizar_pedido_recibido_si_o_no()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}

		$id = $this->input->post("id");
		$data = array(
			'x' => $this->input->post("estado"),
			//'fecha_entregado' => date('Y-m-d h:i:s'),

		);
		$this->Pedidos_model->actualizar_pedido_recibido_si_o_no_update($id,$data); 
	}


	//cambiar estado pedido de manera asigcrona con ajax

	
	public function cambiar_vista_uno()
	{
		$id = $this->input->post("Id_view");
		$data = array(
			'vista' => 1,
		);
		$this->Pedidos_model->actualizar_pedidos_uno($id,$data);
	}

	//validaciones de datos a responder
	//eliminamos el registro que se realizaba que alamacenaba ts_email_tenporal



	public function mostrar_por_reposnse()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
 
		$data = array(
			'title' =>array("estas en Menu de Correo","Buzón Principal","<a class='btn-info btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)' onclick='return validate_xx();'><i class='fa fa-plus-circle'></i>&nbsp;Crear Nuevo</a>","Evaristo Escudero Huillcamascco"),
			'mostrar_registro_reponse' => $this->Pedidos_model->mostrar_registro_reponse($this->uri->segment(4,0)),
	

			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('boleta/new_response',$data);
		$this->load->view('intranet_view/footer',$data);

	}

	public function View_pedido($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}
 
		$data = array(
			'title' =>array("estas en Pedidos ","Pedidos por Usuario"," ","Evaristo Escudero Huillcamascco"),
			'mostrar_pedidos_por_usuariuo_fecha' => $this->Pedidos_model->mostrar_pedidos_por_usuariuo_fecha($id),
	

			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('Pedidos/view_pedido_users',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function Nuevo_pedido_users()
	{
		$userId = $this->session->userdata("session_id");
		
		if ($this->Inventario_model->pedidosAlDia($userId) == "1") {
			redirect(base_url().'Mantenimiento/Pedidos/');
		} else {
			if ($this->session->userdata("session_id")=="") {
				redirect(base_url().'Inicio/Zona_roja/'); 
				
			}
			$this->load->model("Inventario_model");
			$areas_list = [
				"ESPIROMETRIA",
				"AUDIOMETRIA",
				"PSICOLOGIA",
				"OFTALMOLOGIA",
				"RADIOLOGIA",
				"ADMISION",
				"ELECTROCARDIOGRAMA",
				"MANTENIMIENTO",
				"CANADA",
				"RECURSOS HUMANOS",
				"FACTURACION",
				"GERENCIA",
				"VENTAS",
				"TESORERIA",
				"FISIOTERAPIA",
				"MEDICINA",
				"SST",
				"CALIDAD",
				"LOGISTICA",
				"COORDINACION",
				"RAYOS X",
				"TECNOLOGIA DE LA INF.",
				"AUXILIAR GENERAL",
				"ADMINISTRACION",
				"LABORATORIO",
				"TRIAJE",
				"CAMPAÑA",
				"PROCESOS FINALES"
			];
			$data = array(
				'title' =>array("estas en Pedidos ","Nuevo Pedido"," ","Evaristo Escudero Huillcamascco"),
				'correlativo_numer_venta' => $this->Inventario_model->pedido_view_number(),
				'areas_lista' => $areas_list
				//'mostrar_pedidos_por_usuariuo_fecha' => $this->Pedidos_model->mostrar_pedidos_por_usuariuo_fecha($id),
	
			);
			$this->load->view('intranet_view/head',$data);
			$this->load->view('intranet_view/title',$data);
			$this->load->view('pedidos/new_pedido_users',$data);
			$this->load->view('intranet_view/footer',$data);
		}
		
		
		
	}

	public function correlativo_numer_venta()
	{
		/*$query = $this->db->query("select *,count(*) as total from t_visitas");

        foreach($query->result_array() as $row){
            echo $row['total']; 
        } */

        $query = $this->db->query("select * from ta_correlativo where id='2'");
        foreach ($query->result() as $x)
        {
            echo $x->numero+1;
        }
	}

	//eliminar pedidos realizados


	public function eliminar_temporal_delete()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->uri->segment(4,0)==0){
            redirect(base_url().'Mantenimiento/Pedidos/');
        }
        
        // capturamos las cantidades de los prodcutos del detalle para restarlos en el almacen
        $query = $this->db->query("select * from ta_detalles_venta where id_venta='".$this->uri->segment(4,0)."'");
        foreach ($query->result() as $x)
        {
            $cantidad       =   $x->cantidad;
            $id_producto    =   $x->producto;

            // anulamos detalle

            $this->db->where('Id', $x->Id);
            $this->db->delete('ta_detalles_venta'); 
             
        }

        
        $this->db->where('Id', $this->uri->segment(4,0));
        $this->db->delete('ta_ventas');

        // anulamos en caja
        
        redirect(base_url().'Mantenimiento/Pedidos/');
    
    }

    //el usuario va a editar su pedido..  


     public function editar_pedidos($id)
    {

    	$this->load->model("Inventario_model");
    	if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
         
        if($this->uri->segment(4,0)==''){
            redirect(base_url()."Inventario/Pedidos/");
        }

        $data['title'] = array("estas viendo Pedidos","Lista de Pedidos", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Pedidos/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>");
        $data['listacombo1']    =   $this->Inventario_model->listacombo1();
        $data['listacomprobante']    =   $this->Inventario_model->listacomprobante();
        //$data['listamoneda']    =   $this->Inventario_model->listamoneda();
        
        $data['dato']           =   $this->Inventario_model->dato_editar($id);
        $data['producto']       =   $this->Inventario_model->producto();
        $data['listaprevia']    =   $this->Inventario_model->listavistarevia($id);
        


        $this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("pedidos/editar_pedidos_users",$data);
		$this->load->view("intranet_view/footer",$data);
    }

    //finalozar o guadar cambios

    function finalizar(){
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
            
        $importe    =   0;
        $query = $this->db->query("select * from ta_detalles_venta where id_venta='".$this->uri->segment(4,0)."' ");
        foreach ($query->result() as $x)
        {
            $importe    +=   $x->importe; 
            $producto = $x->producto;
            $cantidad = $x->cantidad;
            
            $queryx = $this->db->query("select * from ta_almacen where producto='".$producto."' ");
            foreach ($queryx->result() as $xx)
            {
                $total  =   $xx->total;
            }
            
            $suma=$total-$cantidad;  // venta es (-)
            
            $data = array(
                'total' => $suma
            );
            
            $this->db->where('producto', $producto);
            $this->db->update('ta_almacen', $data); 
        }
        
        // cambiar estado t_venta para que ya finalice completamente
        $data = array(
            'estado' => 2,
            'entregado_por' => $this->session->userdata("nombre").' '.$this->session->userdata("apellido_paterno").' '.$this->session->userdata("apellido_materno"),
            'fecha_entregado' => date('Y-m-d h:i:s'),
        );
        $where = array(
            'Id'    =>  $this->uri->segment(4,0),
           // 'sede'  =>  $this->session->userdata('session_sede')
        );
        
        $this->db->where($where);
        $this->db->update('ta_ventas', $data); 
        
        $data = array(
            'estado' => 1
        );
        
        $this->db->where('id_venta', $this->uri->segment(4,0));
        $this->db->update('ta_detalles_venta', $data); 
        
        /* CAJA */
        
      /*  $queryxy = $this->db->query("select * from ta_ventas where Id='".$this->uri->segment(4,0)."'");
        foreach ($queryxy->result() as $xxy)
        {
            $num            = $xxy->numcomprobante;
            $tipcomprobante = $xxy->tipocomprobante;
            $tipopago       = $xxy->tipopago;
        }
        
        if($tipopago<=3){
            $data = array(
                'fecha'             =>  date('Y-m-d h:i:s'),
                'id_comprobante'    =>  $this->uri->segment(4,0),
                'cod_comprobante'   =>  correlativo($num),
                'tipo_comprobante'  =>  $tipcomprobante,
                'tipo_pago'         =>  $tipopago, // 1 es efectivo , 2 visa, 3 mastercard
                'monto'             =>  $importe,
                //'sede'              =>  $this->session->userdata('session_sede'),
                'tipo'              =>  1
            );
            
            $this->db->insert('ta_caja', $data); 
        
        }else{
            // ----------- cuando es un pago mixto
            
            if($tipopago==4){
                $newtipopago1 = 1; // efectivo
                $newtipopago2 = 2; // visa
            }else if($tipopago==5){
                $newtipopago1 = 1; // efectivo
                $newtipopago2 = 3; // visa
            }else{
                $newtipopago1 = $tipopago;
                $newtipopago2 = $tipopago;
            }
            
            $data = array(
                'fecha'             =>  date('Y-m-d h:i:s'),
                'id_comprobante'    =>  $this->uri->segment(3,0),
                'cod_comprobante'   =>  correlativo($num),
                'tipo_comprobante'  =>  $tipcomprobante,
                'tipo_pago'         =>  $newtipopago1, // 1 es efectivo , 2 visa, 3 mastercard , 4 efectivo visa, 5 efectivo master
                'monto'             =>  $this->uri->segment(4,0),
                'sede'              =>  $this->session->userdata('session_sede'),
                'tipo'              =>  1
            );
            
            $this->db->insert('t_caja', $data); 
            
            $data = array(
                'fecha'             =>  date('Y-m-d h:i:s'),
                'id_comprobante'    =>  $this->uri->segment(3,0),
                'cod_comprobante'   =>  correlativo($num),
                'tipo_comprobante'  =>  $tipcomprobante,
                'tipo_pago'         =>  $newtipopago2, // 1 es efectivo , 2 visa, 3 mastercard
                'monto'             =>  ($importe-$this->input->post('pagomixto')),
                'sede'              =>  $this->session->userdata('session_sede'),
                'tipo'              =>  1
            );
            
            $this->db->insert('t_caja', $data); 
        }*/
        
        /* CAJA */
        
        redirect(base_url().'Mantenimiento/Pedidos/editar_pedidos/'.$this->uri->segment(4,0));
    }

    //CALCULAMOS


    function calcular(){
        $total = count($this->input->post('id[]'));
        $registro = $this->input->post('pagina');
        
        // actualizamos las cantidades con el detalle
        $errores=0;
        for($x=0;$x<=$total;$x++){
            $codigo     =   $this->input->post('id['.$x.']');
            $cantidad   =   $this->input->post('cantidad['.$x.']');
            $venta      =   $this->input->post('venta['.$x.']');
            
            // actualizamos los precios y cantidades
            $query = $this->db->query("select * from ta_detalles_venta where id_venta='".$registro."' and producto='".$codigo."' ");
            foreach ($query->result() as $xx)
            {

                $data = array(
                    'cantidad'  =>  $cantidad,
                    //'importe'   =>  ($cantidad*$venta),
                    //'precio'    =>  $venta
                );

                $where = array(
                    'producto'  => $codigo,
                    'id_venta' => $registro
                );
                $this->db->where($where);
                $this->db->update('ta_detalles_venta', $data); 
                
                $id_producto = $xx->producto;
            }
            
            // verificamos si esta en stock
            $queryxx = $this->db->query("select *  from ta_almacen where producto='".$id_producto."' ");
            foreach ($queryxx->result() as $xxx)
            {
                $total_stock    =   $xxx->total;
            }
            
            if($total_stock>=$cantidad){
                $errores+=0;
            }else{
                $errores+=1;
            }
            
        }
        
        // cuando la cantidad de producto hay en almacen sin errores entonces cambia el estado 1 de t_venta para poder finalizar
        if($errores==0){
            // actualizamos el estado t_venta para que se active el boton finalizar
            $data = array(
                'estado' => 1
            );
            $where1 = array(
                'Id'    =>  $registro,
                //'sede'  =>  $this->session->userdata('session_sede')
            );

            $this->db->where($where1);
            $this->db->update('ta_detalles_venta', $data); 
            
        }else{ // cuando la cantidad de producto es mayor que en almacen, entonces hay un error. regresamos el estado de t_venta a 0 para no finalziar
            // actualizamos el estado t_venta para que se desactive el boton finalizar
            $data = array(
                'estado' => 0
            );
            $where1 = array(
                'Id'    =>  $registro,
               // 'sede'  =>  $this->session->userdata('session_sede')
            );

            $this->db->where($where1);
            $this->db->update('ta_detalles_venta', $data); 
        }
        
        if($this->input->post('boton')==1){
            redirect(base_url().'Mantenimiento/Pedidos/editar_pedidos/'.$registro.'/'.$errores);      
        }else if($this->input->post('boton')==2){
            redirect(base_url().'Mantenimiento/Pedidos/editar_pedidos/'.$registro);
        }
    }

    //eliminamos el temporal


    
    public function eliminar_temporal(){
        $registro   = $this->uri->segment(4,0);
        $id         = $this->uri->segment(5,0);
        
        $this->db->delete('ta_detalles_venta', array('producto' => $id, 'id_venta' => $registro));
        redirect(base_url().'Mantenimiento/Pedidos/editar_pedidos/'.$registro);
    }


	public function pedidosAlDia() {

		$userId = $this->session->userdata("session_id");

		echo $this->Inventario_model->pedidosAlDia($userId)->total;
	}






} ?>