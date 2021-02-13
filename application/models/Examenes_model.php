<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Examenes_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//lista tabla 
	//Descripcion Unidad Medida
	var $table = 'exam_datos_generales';
	var $column_order = array(null,'dni','fecha_registro','apellido_paterno','apellido_materno','nombre','empresa','fecha_nacimiento','fecha_atencion','status','nro_identificador'); //set column field database for datatable orderable
	var $column_search = array('nombre','apellido_paterno','apellido_materno','dni','empresa'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('Id' => 'desc'); // default order 
	//var $where_id = "id_usuario=".$this->session->userdata("session_id")."";

	



	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables() 
	{
		$this->_get_datatables_query();
		
		if($_POST['length'] != -1)
		$this->db->select("*,SUBSTR(empresa, 1, 48 ) as empresax,(select nombre from exam_tipo_pago where Id=id_pago) as tipopago");
	    $this->db->where(array(
	    	'fecha_registro>=' =>date('Y-m-d').' 00:00:01', 
	    	'fecha_registro<=' =>date('Y-m-d').' 23:59:59',
	    	'id_usuario' => $this->session->userdata("session_id"),
	    ));
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		;
		$this->db->where(array(
	    	'fecha_registro>=' =>date('Y-m-d').' 00:00:01', 
	    	'fecha_registro<=' =>date('Y-m-d').' 23:59:59',
	    	'id_usuario' => $this->session->userdata("session_id"),
	    ));
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->where(array(
	    	'fecha_registro>=' =>date('Y-m-d').' 00:00:01', 
	    	'fecha_registro<=' =>date('Y-m-d').' 23:59:59',
	    	'id_usuario' => $this->session->userdata("session_id"),
	    ));
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function cargar_paquete()
	{
		$query_string = 
			"SELECT * 
			FROM exam_paquetes
			WHERE `status` = 1
			ORDER BY nombre";
		

		$query = $this->db->query($query_string);

		$output = '<option value="0">-- Seleccione Paquetes --</option>';
		foreach($query->result() as $row)
		{
		$output .= '<option value="'.$row->Id.'">'.$row->nombre.'</option>';
		}
		return $output;
	}


	public function cargar_paquete_tipo_examen()
	{
     
	  $this->db->order_by('name', 'ASC');
	  $query = $this->db->get('t_consultorias');
	  $output = '<option value="0">-- Seleccione Categoria --</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->name.'</option>';
	  }
	  return $output;
	}


	





	//cargfar sexo

	public function cargar_sexo()
	{
     
	  $this->db->order_by('nombre', 'ASC');
	  $query = $this->db->get('ts_sexo');
	  $output = '<option value="0">-- Seleccione Sexo --</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->nombre.'</option>';
	  }
	  return $output;
	}

	//cargar_ tipo pago

	public function cargar_tipo_pago()
	{
     
	  $this->db->order_by('nombre', 'ASC');
	  $this->db->where("status","1");
	  $query = $this->db->get('exam_tipo_pago');
	  $output = '<option value="0">-- Seleccione Tipo Pago --</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->nombre.'</option>';
	  }
	  return $output;
	}

	public function cargar_tipocomprobante()
	{
     
	  $this->db->order_by('tipocomprobante', 'ASC');
	  $this->db->where("compra",1);
	  $query = $this->db->get('ta_tipocomprobante');
	  $output = '<option value="0">-- Seleccione Tipo Comprobante --</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->tipocomprobante.'</option>';
	  }
	  return $output;
	}

	

	


	//lista de exmanes

	public function lista_examenes($postData)
	{
		
		

		$response = array();

	     if(isset($postData['search']) ){
	       // Select record
	       $this->db->select('*');
	       $this->db->where("nombre like '%".$postData['search']."%' ");

	       $records = $this->db->get('exam_tipoexamen')->result();

	       foreach($records as $row ){
	          $response[] = array("value"=>$row->nombre, "id"=>$row->Id, "label"=>trim($row->nombre));
	       }

	     }

     return $response;
	}

	//obtener lista de datows

	public function agregar_detalle_tipo_examen_id($codigo)
	{
		$query = $this->db->query("select * from exam_tipoexamen where Id='".$codigo."'");
		foreach($query->result() as $row)
		  {

	  		$output["Id"] = $row->Id;
	    	$output["codigo"]  =   $row->codigo;
            $output["nombre"]        =   $row->nombre;
            $output["precio"]   =   $row->precio;
            $output["id_categoria"]   =   $row->id_categoria;
	 	 }
		  if (!$output) {
		  	return false;
		  }else{
		  	return $output;
		  }
	}

	//listar lista paquetes

	public function cargar_lista_paquete($codigo)
	{
		$query = $this->db->query("select * from exam_tipo_paquete where id_paquete='".$codigo."'");
		return $query->result();
		/*foreach($query->result() as $row)
		  {

	  		$output["Id"] = $row->Id;
	    	$output["codigo"]  =   $row->codigo;
            $output["nombre"]        =   $row->nombre;
	 	 }
		  if (!$output) {
		  	return false;
		  }else{
		  	return $output;
		  }*/
	}

	//cargamos el precioop

	public function cargar_lista_precio($codigo)
	{
		$query = $this->db->query("select * from exam_paquetes where Id='".$codigo."'");
		foreach($query->result() as $row)
		  {

            $output["precio"]   =   $row->precio;
	 	 }
		  if (!$output) {
		  	return false;
		  }else{
		  	return $output;
		  }
	}




	//registrar datos generales

	/*public function registrar_datos($data)
	{
		$this->db->insert("exam_datos_generales",$data);
	}*/

	public function registrar_datos($data) { 
       

        return $this->db->insert('exam_datos_generales', $data);
    }



	public function listar_proveedores($postData)
	{
		$response = array();

	     if(isset($postData['search']) ){
	       // Select record
	       $this->db->select('*');
	       $this->db->where("nombre like '%".$postData['search']."%' ");

	       $records = $this->db->get('ta_proveedores')->result();

	       foreach($records as $row ){
	          $response[] = array("value"=>$row->nombre,"label"=>$row->nombre,"id"=>$row->Id,"ruc"=>$row->ruc);
	       }

	     }

	     return $response;
	}

	//eliminar
	public function eliminar_datos_generales($id,$datos)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_datos_generales",$datos);
	}

	//buscamos la busqueda avanzada por ajax mediante jquery
	private function _get_datatables_query_busqueda()
		{
			
			$this->db->from($this->table);
			
			//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

			$i = 0;
		
			foreach ($this->column_search as $item) // loop column 
			{
				if($_POST['search']['value']) // if datatable send POST for search
				{
					
					if($i===0) // first loop
					{
						$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column_search) - 1 == $i) //last loop
						$this->db->group_end(); //close bracket
				}
				$i++;
			}
			
			if(isset($_POST['order'])) // here order processing
			{
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order))
			{
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}


	public function mostrar_datos_busqueda_($initial_date,$final_date,$nombre_busqueda,$dni_busqueda)
	{
		
		// Final date
        if($final_date == null || $final_date=="null") {        
            $final_date = "'". date('Y-m-d') ."'";
        } else {
            $final_date = "'" . $final_date . "'";
        }
        // Initial date
        if($initial_date == null) {
            $initial_date = "'" . date("Y-m-d") . "'";
        } elseif ($initial_date=="null") {
            $initial_date = "'2000-01-01'";     // Si es null y se hace una busqueda manual, que busque desde lo mas antes para que no afecte el resultado
        } else {
            $initial_date = "'" . $initial_date . "'";
        }

        $condition_1="(DATE(fecha_registro)>=$initial_date AND DATE(fecha_registro)<=$final_date)";

        // Busqueda por nombre o apellido
        if($nombre_busqueda == null || $nombre_busqueda=="null") {
            $condition_2="AND TRUE";
        } else {
            $condition_2="AND (nombre LIKE '%$nombre_busqueda%' OR apellido_paterno LIKE '%$nombre_busqueda%' OR apellido_materno LIKE '%$nombre_busqueda%')";
        }

        // Busqueda por DNI
        if($dni_busqueda == null || $dni_busqueda=="null") {
            $condition_3="AND TRUE";
        } else {
            $condition_3="AND dni LIKE '%$dni_busqueda%'";
        }
        
        
        // Armando el pedido e insertando las condiciones
        $query_string=(
        "SELECT *,(SELECT nombre FROM exam_tipo_pago WHERE Id=id_pago) AS tipopago 
        FROM exam_datos_generales AS e 
        WHERE $condition_1 $condition_2 $condition_3
        ORDER BY Id DESC, nro_identificador DESC"
        );

        // Haciendo el pedido a la base de datos
        $query = $this->db->query($query_string);

        // Regresando el pedido como respuesta
		return $query->result();
	}

	public function count_all_busqueda($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda)
	{
		if ($fecha_fin == date("Y-m-d")) {
	    	
	    }else{
	    	$this->db->where(array(
	    	'fecha_registro>=' =>$fecha_inicio.' 00:00:01', 
	    	'fecha_registro<=' =>$fecha_fin.' 23:59:59',
	    ));

	    }
	    if ($nombre_busqueda=="0") {
	    	# code...
	    }else{
	    	$this->db->like('nombre',$nombre_busqueda);
	        $this->db->or_like('apellido_paterno',$nombre_busqueda);
	        $this->db->or_like('apellido_materno',$nombre_busqueda);
	    }
	    if ($dni_busqueda=="0") {
	    	# code...
	    }else{
	    	$this->db->where('dni',$dni_busqueda);
	    }
	    
	    //$this->db->or_where('dni',$dni_busqueda);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function count_filtered_busqueda($fecha_inicio,$fecha_fin,$nombre_busqueda,$dni_busqueda)
	{
		$this->_get_datatables_query_busqueda();
		/*$this->db->where(array(
	    	'fecha_registro>=' =>$fecha_inicio.' 00:00:01', 
	    	'fecha_registro<=' =>$fecha_fin.' 23:59:59',
	    ));
	    $this->db->like('nombre',$nombre_busqueda);
	    $this->db->like('apellido_paterno',$nombre_busqueda);
	    $this->db->like('apellido_materno',$nombre_busqueda);
	     $this->db->or_where('dni',$dni_busqueda);*/
	     if ($fecha_fin == date("Y-m-d")) {
	    	
	    }else{
	    	$this->db->where(array(
	    	'fecha_registro>=' =>$fecha_inicio.' 00:00:01', 
	    	'fecha_registro<=' =>$fecha_fin.' 23:59:59',
	    ));

	    }
	    if ($nombre_busqueda=="0") {
	    	# code...
	    }else{
	    	$this->db->like('nombre',$nombre_busqueda);
	        $this->db->or_like('apellido_paterno',$nombre_busqueda);
	        $this->db->or_like('apellido_materno',$nombre_busqueda);
	    }
	    if ($dni_busqueda=="0") {
	    	# code...
	    }else{
	    	$this->db->where('dni',$dni_busqueda);
	    }
		$query = $this->db->get();
		return $query->num_rows();
	}

	//agregamos detalles
	public function save_detalle($data = array())
	{
		$this->db->insert("exam_detalles",$data);
		
	}
	public function lastID()
    {
          return $this->db->insert_id();

       
    }

    //numero correlativo

    public function getComprobante(){
		$this->db->where("Id",'3');
		$resultado = $this->db->get("ta_correlativo");
		return $resultado->row();
	}

	public function getComprobante_unico_innomedic(){
		$this->db->where("Id",'4');
		$resultado = $this->db->get("ta_correlativo");
		return $resultado->row();
	}

	public function updateComprobante_unico_innomedic($data){
        $this->db->where("Id",'4');
        $this->db->update("ta_correlativo",$data);
    }

	public function updateComprobante($data){
        $this->db->where("Id",'3');
        $this->db->update("ta_correlativo",$data);
    }

    public function Obtener_registros_ajax($id)
	{
		//$this->db->from($this->table);
		//$this->db->where('Id',$id);
		$query = $this->db->query("select * from exam_datos_generales where Id='".$id."'");
		return $query->row();
	}

	//actualizamos los registros mediante ajax

	public function actualizar_registro_via_ajax_update($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_datos_generales",$data);
	}

	//eliminadmos el imagen anterior antes de insertar el nuevo imagemn

	public function elimina_imagen_anterior($id)
	{
		$query = $this->db->query("select * from exam_datos_generales where Id='".$id."'");
        foreach ($query->result() as $x)
        {
            $imagenx =   $x->boleta_pago;
        }
        /*    
        $row = $query->row();
        */
        if($imagenx!=''){ // cuando es mayor que vacio o cero
            //unlink('./assets/'.$imagen);
            unlink('upload/boleta_cliente/'.$imagenx);
        }else{
            echo "";            
        }
	}


	//tipo_ pago

	//tipo pago

	var $table_tipo_pago = 'exam_tipo_pago';
	var $column_order_tipo_pago = array(null,'nombre'); //set column field database for datatable orderable
	var $column_search_tipo_pago = array('nombre'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order_tipo_pago = array('Id' => 'desc'); // default order 

	//end tipo pago

	private function _get_datatables_query_tipo_pago()
	{
		
		$this->db->from($this->table_tipo_pago);
		
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

		$i = 0;
	
		foreach ($this->column_search_tipo_pago as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_tipo_pago) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_tipo_pago[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order_tipo_pago))
		{
			$order = $this->order_tipo_pago;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_tipo_pago()
	{
		$this->_get_datatables_query_tipo_pago();
		if($_POST['length'] != -1)
	   
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_tipo_pago()
	{
		$this->_get_datatables_query_tipo_pago();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_tipo_pago()
	{

		$this->db->from($this->table_tipo_pago);
		return $this->db->count_all_results();
	}
	//regiustrar tipo pago

	public function registrar_datos_tipo_pago($data)
	{
		$this->db->insert("exam_tipo_pago",$data);
	}

	public function Obtener_registros_ajax_tipo_pago($id)
	{
		$query = $this->db->query("select * from exam_tipo_pago where Id='".$id."' and status=1");
		return $query->row();
	}
	public function actualizar_registro_via_ajax_update_tipo_pago($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_tipo_pago",$data);
	}
	public function eliminar_datos_generales_tipo_pago($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_tipo_pago",$data);
	}




	// paquete general



	//paquete general

	var $table_table_paquete_general = 'exam_paquetes';
	var $column_order_table_paquete_general = array(null,'nombre','precio'); //set column field database for datatable orderable
	var $column_search_table_paquete_general = array('nombre','precio'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order_table_paquete_general = array('Id' => 'desc'); // default order 

	

	private function _get_datatables_query_table_paquete_general()
	{
		
		$this->db->from($this->table_table_paquete_general);
		
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

		$i = 0;
	
		foreach ($this->column_search_table_paquete_general as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_table_paquete_general) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_table_paquete_general[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order_table_paquete_general))
		{
			$order = $this->order_table_paquete_general;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_table_paquete_general()
	{
		$this->_get_datatables_query_table_paquete_general();
		if($_POST['length'] != -1)
	   
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_table_paquete_general()
	{
		$this->_get_datatables_query_table_paquete_general();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_table_paquete_general()
	{

		$this->db->from($this->table_table_paquete_general);
		return $this->db->count_all_results();
	}
	//regiustrar tipo pago

	public function registrar_datos_table_paquete_general($data)
	{
		$this->db->insert("exam_paquetes",$data);
	}

	public function Obtener_registros_ajax_table_paquete_general($id)
	{
		$query = $this->db->query("select * from exam_paquetes where Id='".$id."' and status=1");
		return $query->row();
	}
	public function actualizar_registro_via_ajax_update_table_paquete_general($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_paquetes",$data);
	}
	public function eliminar_datos_generales_table_paquete_general($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_paquetes",$data);
	}


	//paquete general


	var $table_table_exam_detalles = 'exam_tipo_paquete';
	var $column_order_table_exam_detalles = array(null,'nombre',null); //set column field database for datatable orderable
	var $column_search_table_exam_detalles = array('nombre'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order_table_exam_detalles = array('Id' => 'desc'); // default order 
	//buscamos la busqueda avanzada por ajax mediante jquery
	private function _get_datatables_query_datos_generales_detalle()
		{
			
			$this->db->from($this->table_table_exam_detalles);
			
			//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

			$i = 0;
		
			foreach ($this->column_search_table_exam_detalles as $item) // loop column 
			{
				if($_POST['search']['value']) // if datatable send POST for search
				{
					
					if($i===0) // first loop
					{
						$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column_search_table_exam_detalles) - 1 == $i) //last loop
						$this->db->group_end(); //close bracket
				}
				$i++;
			}
			
			if(isset($_POST['order'])) // here order processing
			{
				$this->db->order_by($this->column_order_table_exam_detalles[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order_table_exam_detalles))
			{
				$order = $this->order_table_exam_detalles;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}


	public function mostrar_datos_agregar_detalle_paquete($id)
	{
	   
	    $this->_get_datatables_query_datos_generales_detalle();
		if($_POST['length'] != -1)
		$this->db->select("*,(select nombre from exam_paquetes where Id=id_paquete) as paquetes");
 		$this->db->where('id_paquete',$id);
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all_busqueda_detalle_paquete($id)
	{
		
	    $this->db->where('id_paquete',$id);
		$this->db->from($this->table_table_exam_detalles);
		return $this->db->count_all_results();
	}

	function count_filtered_busquedadetalle_paquete($id)
	{
		$this->_get_datatables_query_datos_generales_detalle();
		$this->db->where('id_paquete',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}



	public function registrar_tipo_paquete_asociado($data)
	{
		return $this->db->insert("exam_tipo_paquete",$data);
	}

	public function Obtener_registros_ajax_table_paquete_general_asociados($id)
	{
		$query = $this->db->query("select * from exam_tipo_paquete where Id='".$id."' and status=1");
		return $query->row();
	}
    public function actualizar_registro_via_ajax_update_table_paquete_general_asociado($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_tipo_paquete",$data);
	}
	public function eliminar_datos_generales_table_paquete_general_asociado($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("exam_tipo_paquete");
	}



	//tipo examen en general



	var $table_tipoexamen = 'exam_tipoexamen';
	var $column_order_tipoexamen = array(null,'nombre','precio','codigo'); //set column field database for datatable orderable
	var $column_search_tipoexamen = array('nombre','precio','codigo'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order_table_tipoexamen = array('Id' => 'desc'); // default order 
	//buscamos la busqueda avanzada por ajax mediante jquery
	private function _get_datatables_query_datos_generales_tipoexamen()
		{
			
			$this->db->from($this->table_tipoexamen);
			
			//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

			$i = 0;
		
			foreach ($this->column_search_tipoexamen as $item) // loop column 
			{
				if($_POST['search']['value']) // if datatable send POST for search
				{
					
					if($i===0) // first loop
					{
						$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column_search_tipoexamen) - 1 == $i) //last loop
						$this->db->group_end(); //close bracket
				}
				$i++;
			}
			
			if(isset($_POST['order'])) // here order processing
			{
				$this->db->order_by($this->column_order_tipoexamen[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order_table_tipoexamen))
			{
				$order = $this->order_table_tipoexamen;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}


	public function mostrar_datos_agregar_detalle_tipoexamen()
	{
	   
	    $this->_get_datatables_query_datos_generales_tipoexamen();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all_busqueda_detalle_paquetetipoexamen()
	{
		$this->db->from($this->table_tipoexamen);
		return $this->db->count_all_results();
	}

	function count_filtered_busquedadetalle_paquetetipoexamen()
	{
		$this->_get_datatables_query_datos_generales_tipoexamen();
		$query = $this->db->get();
		return $query->num_rows();
	}



	public function registrar_tipo_paquete_tipoexamen($data)
	{
		return $this->db->insert("exam_tipoexamen",$data);
	}

	public function Obtener_registros_ajax_table_paquete_general_tipoexamen($id)
	{
		$query = $this->db->query("select * from exam_tipoexamen where Id='".$id."' and status=1");
		return $query->row();
	}
    public function actualizar_registro_via_ajax_update_table_paquete_general_tipoexamen($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_tipoexamen",$data);
	}
	public function eliminar_datos_generales_table_paquete_general_tipoexamen($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("exam_tipoexamen",$data);
	}

	//por que es esto


	public function mostrar_datos_a_imprimir($id)
	{
		$query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select nombre from ts_sexo where Id=a.id_sexo) as genero from exam_datos_generales a where a.Id='".$id."'");
		return $query->row();

		/*$query = $this->db->query("select * from exam_datos_generales where Id='".$codigo."'");
		foreach($query->result() as $row)
		  {

	  		$output["Id"] = $row->Id;
	    	$output["codigo"]  =   $row->codigo;
            $output["nombre"]        =   $row->nombre;
            $output["precio"]   =   $row->precio;
	 	 }
		  if (!$output) {
		  	return false;
		  }else{
		  	return $output;
		  }*/
		
	}
	public function mostrar_datos_a_imprimir_detalles($id)
	{
		$query = $this->db->query("select a.* from exam_detalles a where a.id_datos_generales='".$id."'");//aqui estam,os negando and id_categoria!='7'
		return $query->result();
	}

	//detalles por laboratorio

	public function mostrar_datos_a_imprimir_detalles_laboratorio($id)
	{
		$query = $this->db->query("select a.* from exam_detalles a where a.id_datos_generales='".$id."' and id_categoria='7'");
		return $query->result();
	}

	//Insertamos id_ rayox de cada usuario


	public function agregar_rayosx($data)
	{
		$this->db->insert("exam_rayox",$data);
	}

	public function insert_data_exam_laboratorio($data)
	{
		$this->db->insert("exam_laboratorio",$data);
	}

	
	









	




} ?>