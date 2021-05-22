<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Inventario_model extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}
 
	public function Nuevo_registro($data)
	{
		$insert = $this->db->insert("ta_productos",$data);

		if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }  
	}

	public function addd_almacen($data)
	{
		$this->db->insert("ta_almacen",$data); 
	}

	public function lista_productos()
	{	
		$query = $this->db->query("select *,(select total from ta_almacen where producto=d.Id ) as total from ta_productos d where status=1 order by fecha desc");
		return $query->result();
	}
	public function eliminar_producto($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ta_productos");
	} 
	public function eliminar_producto_almacen($id)
	{
		$this->db->where("producto",$id);
		$this->db->delete("ta_almacen");
	}

	public function fetch_single_user_experience($user_id)  
    {  
        
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ta_productos where Id=".$user_id."");
      return $query->result();
    } 
    public function elimina_imagen_anterior($id)
	{
		 $query = $this->db->query("select * from ta_productos where Id='".$id."'");
        foreach ($query->result() as $x)
        {
            $imagenx =   $x->archivo;
        }
        /*    
        $row = $query->row();
        */
        if($imagenx!=''){ // cuando es mayor que vacio o cero
           // unlink('assets/'.$imagenx);
            unlink('upload/productos/'.$imagenx);
        }else{
            echo "";            
        }
	}
	public function update_crud($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ta_productos",$data);
	}

	///
	///
	///
	///
		//proveedores de modelos
	///
	///
	///
	///
	///
	public function Nuevo_registro_proveedor($data)
	{
		$this->db->insert("ta_proveedores",$data);
	}
	public function lista_productos_proveedor()
	{	
		$query = $this->db->query("select * from ta_proveedores where status=1 order by fecha desc");
		return $query->result();
	}
	public function eliminar_producto_proveedor($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ta_proveedores");
	}

	public function fetch_single_user_experience_proveedor($user_id)  
    {  
        
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ta_proveedores where Id=".$user_id."");
      return $query->result();
    } 
   
	public function update_crud_proveedor($id,$data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ta_proveedores",$data);
	}



	//pedidos atendidos
	// 
	public function lista_ventas($numcomprobante,$desde,$hasta){        
        if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)!=0 and $this->uri->segment(6,0)!=0){
            $consulta = " where (fecha>='".$desde." 00:00:01' and fecha<='".$hasta." 23:59:59') and numcomprobante like '%".$numcomprobante."%' order by fecha desc";
        }else{
            if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)==0){
                $consulta = " where numcomprobante like '%".$numcomprobante."%'  order by fecha desc";
            }else if($this->uri->segment(5,0)==0 and $this->uri->segment(6,0)!=0){
                $consulta = " where (fecha>='".$desde." 00:00:01' and fecha<='".$hasta." 23:59:59') order by fecha desc";
            }else{
                $consulta = "where (fecha>='".$desde." 00:00:01' and fecha<='".$hasta." 23:59:59') order by fecha desc";
            }
        }
        $query = $this->db->query("select * from ta_ventas  $consulta ");
        return $query->result();        
    }

    //empleados lista
    public function lista_trabajadores_empl($postData)
    {
    	$response = array();

	     if(isset($postData['search']) ){
	       // Select record
	       $this->db->select('*');
	       $this->db->where("nombres like '%".$postData['search']."%' or apellido_paterno like '%".$postData['search']."%' or apellido_materno like '%".$postData['search']."%' ");

	       $records = $this->db->get('ts_datos_personales')->result();

	       foreach($records as $row ){
	          $response[] = array("value"=>$row->nombres, "id"=>$row->Id, "label"=>trim($row->nombres.' '.$row->apellido_paterno.' '.$row->apellido_materno));
	       }

	     }

     return $response;
    }
    //
    //
    //
    //listar trabajadores por datos a completar
    public function listar_trabajadores_por_lis($country_id)
	 {
	  $this->db->where('Id', $country_id);
	 // $this->db->order_by('id_unidad', 'ASC');
	  $query = $this->db->get('ts_datos_personales');
	//  $output = '<option value="" >--Selecciona unidad medida--</option>';
	  foreach($query->result() as $row)
	  {
	  // $output .= '<option value="'.$row->Id.'">'.$row->id_unidad.'</option>';
	     //$output =  $row->nro_documento;
	    	$output["direccion"]  =   $row->direccion;
            $output["nro_documento"]        =   $row->nro_documento;
            $output["telefono"]   =   $row->telefono_movil;
	    // $output =  '<option value="'.$row->Id.'">'.$row->id_unidad.'</option>';
	  }
	  return $output;
	 }

	 //lista de prodcutos lis 
	 
	public function lista_productos_xx_lis($postData)
    {

    	/*if(isset($postData['search']) ){
    	$this->db->select("Id,codigo,description as label, stock");
    	$this->db->from("ta_productos");
    	$this->db->like("nombre",$postData['search']);
    	//$this->db->where("nombre like '%".$postData['search']."%' ");
    	$resultado = $this->db->get();
    	return $resultado->result();
    	 }
*/
    	$response = array();

	     if(isset($postData['search']) ){
	       // Select record

	     	$this->db->select('*,ta_productos.Id,ta_productos.codigo,CONCAT(ta_productos.nombre, " (", ta_productos.description,")") AS nombre , a.total');
			$this->db->from('ta_productos ');
			$this->db->join('ta_almacen a', 'a.producto = ta_productos.Id');
			$this->db->where("nombre like '%".$postData['search']."%' ");
			$records = $this->db->get()->result();
	       /*$this->db->select('*,Id,codigo,nombre as label, stock');
	       $this->db->join('ta_almacen', 'ta_almacen.producto = ta_productos.Id');
	       $this->db->where("nombre like '%".$postData['search']."%' ");*/

	       //$records = $this->db->get('ta_productos')->result();

	       foreach($records as $row ){
	          $response[] = array(
	          	"value"=>$row->nombre, 
	          	"id"=>$row->Id, 
	          	"codigo"=>$row->codigo,
	          	"stock"=>$row->total,
	          	//"eva2"=>$row->label
	          );
	       }

	     }

     return $response;
    }
    
    //
    //
    public function lista_productos_x_id($id)
    {
    	$this->db->where('Id', $id);
		 // $this->db->order_by('id_unidad', 'ASC');
		  $query = $this->db->get('ta_productos');
		//  $output = '<option value="" >--Selecciona unidad medida--</option>';
		
			
		  foreach($query->result() as $row)

		  {
		  	     
		  		
		       // $output .= '<option value="'.$row->Id.'">'.$row->id_unidad.'</option>';
		     //$output =  $row->nro_documento;
		    	$output["codigo"]  =   $row->codigo;
	            $output["nombre"]        =   $row->nombre;
	            $output["stock"]   =   $row->stock;
		    // $output =  '<option value="'.$row->Id.'">'.$row->id_unidad.'</option>';
		  }
		  return $output;
    }

    //retorna caja
    public function caja_view()
    {
    	$query = $this->db->query("select * from ta_correlativo where id='1'");
        foreach ($query->result() as $x)
        {
            return $x->numero+1;
        }
    }



    //return numero de pedido

    public function pedido_view_number()
    {
    	$query = $this->db->query("select * from ta_correlativo where id='2'");
        foreach ($query->result() as $x)
        {
            return $x->numero+1;
        }
    }

    public function agregar_producto($data)
    {

		return $this->db->insert('ta_ventas', $data);

    }

    //
    public function actualiazar_trabajador_lista($id_trabajador,$data_trabajador)
    {
    	$this->db->where("Id",$id_trabajador);
    	$this->db->update("ts_datos_personales",$data_trabajador);
    }



	//


	public function lastID()
    {
          return $this->db->insert_id();

        //return $this->db->insert_id();
       // return $this->db->mysql_insert_id();
    }

    //obtenermos el ultimo numero de compronate
   

    public function getComprobante(){
		$this->db->where("Id",'2');
		$resultado = $this->db->get("ta_correlativo");
		return $resultado->row();
	}

    //actualizamos el comproabante

    public function updateComprobante($data){
        $this->db->where("Id",'2');
        $this->db->update("ta_correlativo",$data);
    }


    public function registrar_detalle_produfcto_evaristo($data)
    {
    	$this->db->insert("ta_detalles_venta",$data);
    }

    //registro de datops

   

    //register de datos valicion de dstos

    public function save_detalle($data){
        $this->db->insert("ta_detalles_venta",$data);
    }

    //lista detalles pedidos

    public function lista_detalles_pedidos($url)
    {
    	$query = $this->db->query("select * from ta_ventas where url_view='".$url."'");
    	
		return $query->result();

    }
    //lista comprabante

    public function listacomprobante()
    {
    	$query = $this->db->query("select * from ta_correlativo");
    	
		return $query->result();
    }

    function dato_editar($id){
        $query = $this->db->query("select * from ta_ventas where Id='".$id."' ");
        return $query->result();
    }


    //lista cliente

    public function listacombo1()
    {
    	$query = $this->db->query("select * from ts_datos_personales");
    	
		return $query->result();
    }

    public function lista_detalle_pedido_general($url)
    {
    	$query = $this->db->query("select * from ta_detalles_venta where identificador='".$url."'");
    	return $query->result();
    } 
    public function listar_por_codigo($id)
    {
		$this->db->where('s.codigo',$id);
	    $this->db->select('s.*,CONCAT(s.nombre, " (", s.description,")") as nombres, a.total');
		$this->db->from('ta_productos s');
		$this->db->join('ta_almacen a', 'a.producto = s.Id');
		$query = $this->db->get();
		//validamos antes de registrar y mandar mensaje de entrada cuando el stock es menor que
		
		foreach($query->result() as $row)
		  {

	  		$output["Id"] = $row->Id;
	    	$output["codigo"]  =   $row->codigo;
            $output["nombre"]        =   $row->nombres;
            $output["stock"]   =   $row->total;
	 	 }
		  if (!$output) {
		  	return false;
		  }else{
		  	return $output;
		  }
    	
    }

    //actualizar stock del producto
	public function update_stock($id,$data){
		$this->db->where("producto",$id);
		return $this->db->update("ta_almacen",$data);
	}

	public function getProducto($id){ 
		$this->db->where("producto",$id);
		$resultado = $this->db->get("ta_almacen");
		return $resultado->row();
	}

	 function producto(){
        $query = $this->db->query("select Id,fecha,nombre,description,codigo,precioventa,status,(select total from ta_almacen where producto=a.Id) as stock from ta_productos a  order by nombre asc");
        return $query->result();
    }

    function listavistarevia($id){
        $query = $this->db->query("select Id,id_venta,cantidad,producto,precio,importe,estado,unidad, (select total from ta_almacen where producto=a.producto ) as stock from ta_detalles_venta a where id_venta='".$id."' order by id asc");
        return $query->result();
    }

	function pedidosAlDia($userId) {
		$query = $this->db->query("SELECT COUNT(*) AS total
			FROM ta_ventas
			WHERE usuario = $userId
				AND DATE(fecha) = DATE(NOW())"
		);

		return $query->row();
	}




    

    

} ?>