<?php /**
 * 
 */
class Pedidos_model extends CI_model
{

	//Descripcion Unidad Medida
	var $table = 'ts_descripcion_unidad_medida';
	var $column_order = array(null,'descripcion','fecha','status'); //set column field database for datatable orderable
	var $column_search = array('descripcion','fecha','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('Id' => 'desc'); // default order 
	//var $where_id = "id_usuario=".$this->session->userdata("session_id")."";


	//unidad medida
	var $table_unidad_medida = 'ts_unidad_medida';
	var $column_order_unidad_medidia = array(null,'id_unidad','id_descripcion_unidad','fecha','status'); //set column field database for datatable orderable
	var $column_search_unidad_medida = array('id_unidad','id_descripcion_unidad','fecha','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order_unidad_medida = array('Id' => 'desc'); // default order 
	
	function __construct()
	{
		parent::__construct();
	}

	//pedidios x usuario 

	public function lista_pedidos($numcomprobante,$desde,$hasta)
	{ 
		if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)!=0 and $this->uri->segment(6,0)!=0){
            $consulta = " where (fecha>='".$desde." 00:00:01' and fecha<='".$hasta." 23:59:59') and nombres_completos like '%".$numcomprobante."%' and usuario='".$this->session->userdata('session_id')."' order by fecha desc";
        }else{
            if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)==0){
                $consulta = " where nombres_completos like '%".$numcomprobante."%' and usuario='".$this->session->userdata('session_id')."'  order by fecha desc";
            }else if($this->uri->segment(5,0)==0 and $this->uri->segment(6,0)!=0){
                $consulta = " where (fecha>='".$desde." 00:00:01' and fecha<='".$hasta." 23:59:59') and usuario='".$this->session->userdata('session_id')."' order by fecha desc";
            }else{
                $consulta = "where (fecha>='".$desde." 00:00:01' and fecha<='".$hasta." 23:59:59') and usuario='".$this->session->userdata('session_id')."' order by fecha desc";
            }
        }
        $query = $this->db->query("select * from  ta_ventas  $consulta ");
        return $query->result(); 
	}

	//listar unidad medida

	public function unidad_medida()
	{
		$query = $this->db->query("select * from ts_unidad_medida where status=1");
		return $query->result();
	}

	//insertar

	public function insert($data)
	{
		$this->db->insert("ts_pedidos",$data);
	}








	//unidad medida
	public function lista_Unidad_Medida()
	{
		$query = $this->db->query("select * from ts_descripcion_unidad_medida");
		return $query->result();
	}

	//
	public function lista_Unidad()
	{
		$query = $this->db->query("select * from ts_unidad");
		return $query->result();
	}

	//listar productox categoria
	public function lista_producto_x_categoria_lis($country_id)
	 {
	  $this->db->where('id_descripcion_unidad', $country_id);
	  $this->db->order_by('id_unidad', 'ASC');
	  $query = $this->db->get('ts_unidad_medida');
	  $output = '<option value="" >--Selecciona unidad medida--</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->id_unidad.'</option>';
	  }
	  return $output;
	 }


	 //autocomplete
	 function Lista_descripcion_list_add_autocomplete($postData){
     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("description like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_descripcion_unidad_medida')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Id,"label"=>$row->descripcion);
       }

     }

     return $response;
  } 

	 

	


	private function _get_datatables_query_unidad_medida()
	{
		
		$this->db->from($this->table_unidad_medida);
		
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");

		$i = 0;
	
		foreach ($this->column_search_unidad_medida as $item) // loop column 
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

				if(count($this->column_search_unidad_medida) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_unidad_medidia[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order_unidad_medida = $this->order;
			$this->db->order_by(key($order_unidad_medida), $order_unidad_medida[key($order_unidad_medida)]);
		}
	}

	function get_datatables_unidad_medida()
	{
		$this->_get_datatables_query_unidad_medida();
		if($_POST['length'] != -1)
		$this->db->select("*,(select descripcion from ts_descripcion_unidad_medida where id=id_descripcion_unidad) as descripcion_unidad,
(select nombre from ts_unidad where Id=id_unidad) as unidad_medida");
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_unidad_medida()
	{
		$this->_get_datatables_query_unidad_medida();
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_unidad_medida()
	{
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");
		$this->db->from($this->table_unidad_medida);
		return $this->db->count_all_results();
	}






	//agregar

	public function agregar_registrar_Registrar_unidad_medidia($data)
	{
		$this->db->insert("ts_unidad_medida",$data);
	}

	//eliminar
	public function Eliminar_unidad_medida_delete($id) 
	{
		$this->db->where("Id",$id);
		$this->db->delete("ts_unidad_medida");
	}

	//obtner registros
	public function Obtener_unidad_medida_obtener($id)
	{
		$query = $this->db->query("select * from ts_unidad_medida where Id='".$id."'");
		return $query->row();
	}

	//actualiozar Unidad Medida

	public function Actualizar_unidad_medida_update($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_unidad_medida",$data);
	}







	//Descripcion de Unidad ,medida

	public function Descripcion_Unidad_medida()
	{
		$query = $this->db->query("select * from ts_descripcion_unidad_medida");
		return $query->result();
	}

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
		$this->db->select("*,(select id_unidad from ts_unidad_medida where ts_descripcion_unidad_medida.id=id_descripcion_unidad) as unidad_medida");
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		//$this->db->where("id_usuario=".$this->session->userdata("session_id")."");
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	//obtener datos
	public function Obtener_descripcion_unidad_medida_obtener($id)
	{
		//$this->db->from($this->table);
		//$this->db->where('Id',$id);
		$query = $this->db->query("select * from ts_descripcion_unidad_medida where Id='".$id."'");
		return $query->row();
	}

	//eliminar Registro
	public function Eliminar_descripcion_unidad_medida_delete($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ts_descripcion_unidad_medida");
	}

	//agregamos
	public function agregar_registrar_Registrar_descripcion_unidad_medidia($data)
	{
		$this->db->insert("ts_descripcion_unidad_medida",$data);
	}

	//actualizar
	public function Actualizar_descripcion_unidad_medida_update($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_descripcion_unidad_medida",$data);
	}




	//pedidos en general para el administrador


	public function lista_pedidos_xxx()
	{

		 

		$query = $this->db->query("select *,
			(select 
			CASE
			    WHEN id_genero = 1 THEN 'varon.png'
			    WHEN id_genero = 2 THEN 'mujer.png'
			    WHEN id_genero = 3 THEN 'medio.png'
			    ELSE 'distinto.png'
			END
 		from ts_datos_personales where id_usuario=a.id_usuario) as id_otros,
 		(select imagen from ts_datos_personales where id_usuario=a.id_usuario) as imagen
		
 		 from ts_pedidos a where vista=2 group by id_usuario order by fecha_pedido desc");
		return $query->result();
		/*
(select concat(nombres, ' ', apellido_paterno,' ', apellido_materno) from ts_datos_personales where id_usuario=a.id_usuario ) as nombres
		*/
		//where fecha_pedido  BETWEEN CURDATE() and CURDATE() + INTERVAL 5 DAY
	}






	//lista pedidos
	public function obtener_lista_pedidos_list($numcomprobante,$desde,$hasta)
	{

		if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)!=0 and $this->uri->segment(6,0)!=0){
            $consulta = " where (fecha_pedido>='".$desde." 00:00:01' and fecha_pedido<='".$hasta." 23:59:59') and nombres_completos like '%".$numcomprobante."%' and id_usuario='".$this->session->userdata('session_id')."' order by fecha_pedido desc";
        }else{
            if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)==0){
                $consulta = " where nombres_completos like '%".$numcomprobante."%' and id_usuario='".$this->session->userdata('session_id')."'  order by fecha_pedido desc";
            }else if($this->uri->segment(5,0)==0 and $this->uri->segment(6,0)!=0){
                $consulta = " where (fecha_pedido>='".$desde." 00:00:01' and fecha_pedido<='".$hasta." 23:59:59') and id_usuario='".$this->session->userdata('session_id')."' order by fecha_pedido desc";
            }else{
                $consulta = "where (fecha_pedido>='".$desde." 00:00:01' and fecha_pedido<='".$hasta." 23:59:59') and id_usuario='".$this->session->userdata('session_id')."' order by fecha_pedido desc";
            }
        }
        $query = $this->db->query("select * from  ts_pedidos  $consulta ");
        return $query->result();  
		/*$query = $this->db->query("select *,(select id_unidad from ts_unidad_medida where Id=id_unidad_medida) as unidad_medida,
		
			CASE
			    WHEN prioridad = 'Muy Baja' THEN 'bg-primary'
			    WHEN prioridad = 'Baja' THEN 'bg-dark'
			    WHEN prioridad = 'Media' THEN 'bg-info'
			    WHEN prioridad = 'Alta' THEN 'bg-warning'
			    ELSE 'bg-danger'
			END
 as color,
 		(select imagen from ts_datos_personales where id_usuario=a.id_usuario) as imagen,
		(select concat(nombres, ' ', apellido_paterno,' ', apellido_materno) from ts_datos_personales where id_usuario=a.id_usuario ) as nombres
 		 from ts_pedidos a where id_usuario='".$id."' and vista=2");
		return $query->result();*/
	}
	//and fecha_pedido  BETWEEN CURDATE() and CURDATE() + INTERVAL 5 DAY group by id_usuario
	//WHERE OrderDate BETWEEN NOW() and NOW() + INTERVAL 7 DAY;

	//actualiar estado pedido


	public function Actualizar_registros_pedidos_update($id_usuario,$data)
	{
		$this->db->where("id_usuario",$id_usuario);
		$this->db->update("ts_pedidos",$data);
	}

	//actualizando las observaciones

	public function actualizando_estado_pedido_update($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_pedidos",$data);
	}

	//total de pedidos


	public function lista_total_pedidos() 
	{
		$query = $this->db->query("select *,
			(select 
			CASE
			    WHEN id_genero = 1 THEN 'varon.png'
			    WHEN id_genero = 2 THEN 'mujer.png'
			    WHEN id_genero = 3 THEN 'medio.png'
			    ELSE 'distinto.png'
			END
 		from ts_datos_personales where id_usuario=a.id_usuario) as id_otros,
 		(select imagen from ts_datos_personales where id_usuario=a.id_usuario) as imagen,
		(select concat(nombres, ' ', apellido_paterno,' ', apellido_materno) from ts_datos_personales where id_usuario=a.id_usuario ) as nombres,
		(select id_unidad from ts_unidad_medida where Id=id_unidad_medida) as unidad_medida
 		 from ts_pedidos a order by id_usuario desc, fecha_pedido desc");
		return $query->result();
	}

	//actualizar pedidos por Id

	public function actualizar_pedido_recibido_si_o_no_update($id, $data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_pedidos",$data);
	}

	public function actualizar_pedidos_uno($id,$data)
	{
		$this->db->where("vista",$id);
		$this->db->update("ts_pedidos",$data);
	}

	//recargar pedidos model

	public function recargar_pagina_response($data)
	{
		$this->db->insert("ts_email_temporal",$data);
	}

	public function mostrar_registro_reponse($id_usuario)
	{
		/*$query = $this->db->query("select *, CONCAT(nombres, ' ', apellido_paterno, ' ', apellido_materno) AS Address from ts_datos_personales where id_usuario='".$id_usuario."'");
		return $query->result();*/
		$query = $this->db->query("select * from ts_email_enviado_users where id_usuario='".$id_usuario."'");
		return $query->result();
	}

	//mostrar pedidos por usuario


	public function mostrar_pedidos_por_usuariuo_fecha($id)
	{
		# code...
	}


} ?>