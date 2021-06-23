<?php defined('BASEPATH') OR exit('No direct script access allowed');	/**
 * 
 */
class Pedidos extends CI_Controller				
{
	
	function __construct()
	{ 
		parent::__construct(); 
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Inventario_model");
		$this->load->helper(array("funciones"));
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}
		$data['title'] = array("estas viendo Pedidos","Lista de Pedidos", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Pedidos/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>");

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

        $data['lista_ventas']  =   $this->Inventario_model->lista_ventas($numcomprobante,$desde,$hasta);

      
		

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view("inventario/pedidos",$data);
		$this->load->view("intranet_view/footer",$data);
		
	}

 
	// anular
    public function eliminar(){
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->uri->segment(4,0)==0){
            redirect(base_url().'Inventario/Pedidos/');
        }
        
        // capturamos las cantidades de los prodcutos del detalle para restarlos en el almacen
        $query = $this->db->query("select * from ta_detalles_venta where id_venta='".$this->uri->segment(4,0)."'");
        foreach ($query->result() as $x)
        {
            $cantidad       =   $x->cantidad;
            $id_producto    =   $x->producto;

            $query1 = $this->db->query("select * from ta_almacen where producto='".$id_producto."'");
            foreach ($query1->result() as $x1)
            {
                $id_al =    $x1->Id;
                $total =    $x1->total+$cantidad;
            }
                        
            $data = array(
                'total' => $total
            );
                    
            $this->db->where('Id', $id_al);
            $this->db->update('ta_almacen', $data); 
            
            // anulamos detalle
            $data = array(
                'estado' => 3 // es anulado en el detalle
            );
            
            $this->db->where('Id', $x->Id);
            $this->db->update('ta_detalles_venta', $data); 
             
        }
        // anulamos cabeceza
        $data = array(
            'estado' => 3 // es anulado en cabecera
        );

        $this->db->where('Id', $this->uri->segment(4,0));
        $this->db->update('ta_ventas', $data);
        
        // anulamos en caja
         /*   $query01 = $this->db->query("select * from t_venta where id='".$this->uri->segment(3,0)."'");
            foreach ($query01->result() as $x1x)
            {
                $cod_comprobante    =   $x1x->numcomprobante;
                $id_comprobante    =   $x1x->id;
            }

            $query001 = $this->db->query("select * from t_caja where cod_comprobante='".correlativo($cod_comprobante)."' and id_comprobante='".$id_comprobante."'");
            foreach ($query001->result() as $x001)
            {
                $id_caja01  =   $x001->id;
            }

            $datax = array(
                'estado' => 1 // caja estado 1  anulado
            );
            
            $this->db->where('id', $id_caja01);
            $this->db->update('t_caja', $datax); */
        
        // anulamos en caja
        
        redirect(base_url().'Inventario/Pedidos/');
    }


    public function eliminar_temporal_delete()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->uri->segment(4,0)==0){
            redirect(base_url().'Inventario/Pedidos/');
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
        
        redirect(base_url().'Inventario/Pedidos/');
    
    }
    

	public function eliminar_temporal(){
        $registro   = $this->uri->segment(4,0);
        $id         = $this->uri->segment(5,0);
        
        $this->db->delete('ta_detalles_venta', array('producto' => $id, 'id_venta' => $registro));
        redirect(base_url().'Inventario/Pedidos/editar_pedidos/'.$registro);
    }

	public function buscar()
	{
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
        echo json_encode(array('retorno' =>base_url().'Inventario/Pedidos/index/'.$numcomprobante.'/'.$desde.'/'.$hasta));
        
        //redirect(base_url().'Inventario/Pedidos/index/'.$numcomprobante.'/'.$desde.'/'.$hasta);
	}

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
            redirect(base_url().'Inventario/Pedidos/editar_pedidos/'.$registro.'/'.$errores);      
        }else if($this->input->post('boton')==2){
            redirect(base_url().'Inventario/Pedidos/editar_pedidos/'.$registro);
        }
    }



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
        
        redirect(base_url().'Inventario/Pedidos/editar_pedidos/'.$this->uri->segment(4,0));
    }

	//load generado
	
	private function __load_view($title_view,$title_view_one,$title_view_two,$index)
	{
		

		$data = array(
			'title' =>array("$title_view","$title_view_one", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Pedidos/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;$title_view_two</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>"),
			  'correlativo_numer_venta' => $this->Inventario_model->pedido_view_number(),



		 );
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view("inventario/$index",$data);
		$this->load->view("intranet_view/footer",$data);
	}
	//nuevo registro
	
	public function Nuevo()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}



		return $this->__load_view("estas viendo Pedidos","Lista de Pediddos","Nuevo Pedido","nuevo_pedido");
	}

	public function lista_trabajadores()
	{
		
		// POST data
	    $postData = $this->input->post();
		$data = $this->Inventario_model->lista_trabajadores_empl($postData);

	    echo json_encode($data);
	}
	//public 
	public function listar_trabajadores_por_id()
	{
		if ($this->session->userdata("session_id")=="") { 
			redirect(base_url().'Inicio/Zona_roja/');
		}

	if($this->input->post('country_id'))
	  {
	   $data =  $this->Inventario_model->listar_trabajadores_por_lis($this->input->post('country_id'));
	   echo json_encode($data);
	  }
	}
 
	//prodcutos
	//
	public function lista_productos_xx() 
	{	
		// POST data
	    $postData = $this->input->post();
		$data = $this->Inventario_model->lista_productos_xx_lis($postData);
		
		echo json_encode($data);
		//validamos los datos que esta mandando con ajax
		
		
	   
	} 

	//agregar Nuevo Pedido
	//
	public function listar_datos_producto()
	{
		$id_producto = $this->input->post("id_producto");
		$data = $this->Inventario_model->lista_productos_x_id($id_producto);
		echo json_encode($data);
	} 

	//registrar entrada de pedidos
	function registrar_entrada()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		if ($this->input->method() === 'post') {
	
			$serie = $this->input->post("serie");
			$numcomprobante =$this->input->post("numero");
			$usuario = $this->input->post("id_usuario_id_xx");
			$fecha =$this->input->post("fecha");
			$entregado_por = $this->session->userdata("nombre").' '.$this->session->userdata("apellido_paterno").' '.$this->session->userdata("apellido_materno");
			$url =  md5($this->input->post("serie").'-'.$this->input->post("numero").'-'.$this->input->post("trabajadores_empl_id"));

			//trabajador
			$dni = $this->input->post("dni_xx");
			$telefono_movil = $this->input->post("telefono_xx");
            $fecha_entregado = date('Y-m-d h:i:s');

			$id_producto = $this->input->post('id_producto');
			$cantidad = $this->input->post('cantidad');
            $unidad = $this->input->post("unidad");

			$count = $this->input->post('count');
			$estado = "1";
			$cod = $this->input->post('codigo');

			//verificamos el stock antes de registrar el producto

			//agregar cabecera
			$data_number = array(
				'seriecomprobante' =>$serie,
				'numcomprobante' =>$numcomprobante,
				'tipocomprobante' =>"2",
				'usuario' => $usuario,
				'fecha' =>$fecha,
                'fecha_entregado'=> $fecha_entregado,
				'entregado_por' => $entregado_por,
				'dni' => $dni,
				'telefono' => $telefono_movil,
				'url_view' => $url,
				'estado' => "2",
			);

			
			if ($this->Inventario_model->agregar_producto($data_number)) {
				 
				$idventa = $this->Inventario_model->lastID();
	            $this->actualizar_comprobante();
	            $this->actualiazar_trabajador($usuario,$dni,$telefono_movil);
	            $this->save_detalle($count,$fecha,$idventa,$cantidad,$id_producto,$url,$unidad);
	            echo json_encode(array("registro" => "Se registro de manera correcta"));
			}else{
				echo json_encode(array("error_registro" => "No se puedo registrar la venta"));
				$this->output->set_status_header(400);
			}
		}else{
			redirect(base_url().'Inventario/Pedidos/Nuevo/');
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
            $this->updateProducto($id_producto[$i],$cantidad[$i]);
        } 
    }

    protected function updateProducto($id_producto,$cantidad){
       $productoActual = $this->Inventario_model->getProducto($id_producto);
        $data = array (
            'total' => $productoActual->total - $cantidad,
        );
        $this->Inventario_model->update_stock($id_producto,$data);
    
    }


    public function editar_pedidos($id)
    {
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
		$this->load->view("inventario/editar_pedidos",$data);
		$this->load->view("intranet_view/footer",$data);
    }

 


    //detalles_pedido



    public function detalles_pedido($url) 
    {
    	if ($url==null) {
    		redirect(base_url().'Inventario/Pedidos/');
    	}

    	$data = array(
			'title' =>array("COMPROBANTE DE ENTREGA INNOMEDIC.PE","Lista detalles pedido", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Pedidos/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>"),
			'lista_detalles_pedidos' => $this->Inventario_model->lista_detalles_pedidos($url),
			'listacomprobante' => $this->Inventario_model->listacomprobante(),
			'listacombo1' => $this->Inventario_model->listacombo1(),
			'lista_detalle_pedido_general' => $this->Inventario_model->lista_detalle_pedido_general($url),

		


		 );
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		//$this->load->view("inventario/_view_form",$data);
		$this->load->view("inventario/detalles_pedido",$data);
		$this->load->view("intranet_view/footer",$data);	

    }
    //comprante factura ==pendiente


    public function comprobantefactura($url)
    {
    	$data = array(
			'title' =>array("COMPROBANTE DE ENTREGA INNOMEDIC.PE","Lista detalles pedido", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Pedidos/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>"),
			'lista_detalles_pedidos' => $this->Inventario_model->lista_detalles_pedidos($url),
			'listacomprobante' => $this->Inventario_model->listacomprobante(),
			'listacombo1' => $this->Inventario_model->listacombo1(),
			'lista_detalle_pedido_general' => $this->Inventario_model->lista_detalle_pedido_general($url),

		
		 );
    	$this->load->view("imprimir/index",$data);
    }

    //agregar porn codigo


    public function agregar_por_codigo()	
    {
    	$id_codigo = $this->input->post("id_codigo");
		$data = $this->Inventario_model->listar_por_codigo($id_codigo);
		echo json_encode($data);
    }



    function temporalvistaprevia(){
        $cod        = str_replace(" ","-",$this->input->post('codigo'));
        $registro   = $this->input->post('registro');
        $unidad   = $this->input->post('unidad');
         
        // buscamos el tipo de venta : publica|mayorista|distribuidor
        $queryxx = $this->db->query("select * from ta_ventas where Id='".$registro."'");
        foreach ($queryxx->result() as $xxx)
        {
            //$tipoventa  =   $xxx->tipoventa;
            $identificador = $xxx->url_view;
        }

        //lista de unidad medida

        $query = $this->db->query("select * from ts_unidad where Id='".$unidad."'");
        foreach ($query->result() as $xg)
        {
            $unidad_xx = $xg->Id;

      

        }
        
        // buscamos los datos del producto para agregar al detalle
        $query = $this->db->query("select * from ta_productos where codigo='".$cod."' ");
        foreach ($query->result() as $x)
        {
            $date['codigo']         =   $x->Id;
            $date['producto']       =   $x->nombre." (".$x->description.")";
            $date['unidad']        =   $unidad_xx;
           


            $date['importe']        =   0;
            $id_producto            =   $x->Id;
            


        }

         $queryxxxx = $this->db->query("select * from ta_almacen where producto='".$id_producto."' ");
            foreach ($queryxxxx->result() as $xx)
            {
                //$total  =   $xx->total;
                 $date['stock']        =    $xx->total;
            }
        

        
        
        // verificamos si tiene stock en almacen el producto
        $queryxx = $this->db->query("select Id,fecha,nombre,description,codigo,precioventa,status,(select total from ta_almacen where producto=a.Id) as stock 
        from ta_productos a where codigo='".$cod."' and Id in (select Id from ta_almacen where total>0) order by nombre asc");
        $rowxx = $queryxx->row();
        
        if(isset($rowxx)){
                // verificamos en el detalle si ya existe ese producto para ya no agregarlo de nuevo
                $queryx = $this->db->query("select * from ta_detalles_venta where producto='".$id_producto."' and id_venta='".$registro."'");
                $row = $queryx->row();
                if($row==0){
                    // grabamos en el detalle si no existe el producto
                    $data = array(
                        'fecha'     => date('Y-m-d h:i:s'),
                        'id_venta' => $registro,
                        'cantidad'  => 0,
                        'producto'  => $id_producto,
                        'unidad'    => $unidad_xx,
                        'identificador' => $identificador,
                      //  'sede'      => $this->session->userdata('session_sede'),
                        'importe'   => 0
                    );
                    $this->db->insert('ta_detalles_venta', $data); 
                    echo json_encode($date);
                }
        }else{
            $date['mensaje']    =   1; // error producto no tiene stock
            echo json_encode($date);
        }
    }



    function listadatos(){
        $producto = $this->input->post('productox');
        $registro = $this->input->post('registro');
        $unidad =$this->input->post('unidad');
        
        // buscamos el tipo de venta : publica|mayorista|distribuidor
        $queryxx = $this->db->query("select * from ta_ventas where Id='".$registro."'");
        foreach ($queryxx->result() as $xxx)
        {
            $tipoventa  =   $xxx->tipoventa;
            $identificador = $xxx->url_view;
        }
          // buscamos los datos del unidad medida para agregar al detalle
        $query = $this->db->query("select * from ts_unidad where Id='".$unidad."'");
        foreach ($query->result() as $xg)
        {
            $unidad_xx = $xg->Id;

      

        }
        $queryx = $this->db->query("select * from ta_almacen where producto='".$producto."' ");
            foreach ($queryx->result() as $xx)
            {
                $total  =   $xx->total;
        }

     
        
        // buscamos los datos del producto para agregar al detalle
        $query = $this->db->query("select * from ta_productos where Id='".$producto."'");
        foreach ($query->result() as $x)
        {
            $date['codigo']         =   $x->Id;
            $date['producto']       =   $x->nombre." (".$x->description.")";
            $date['importe']        =   0;
            $id_producto            =   $x->Id;
            $date['unidad']        =   $unidad_xx;
            $date['stock']        =    $total;

      

        }

       
        
        // verificamos en el detalle si ya existe ese producto para ya no agregarlo de nuevo
        $queryx = $this->db->query("select * from ta_detalles_venta where producto='".$id_producto."' and id_venta='".$registro."'");
        $row = $queryx->row();
        if($registro!=''){
            if($row==0){
                // grabamos en el detalle si no existe el producto
                $data = array(
                    'fecha'     => date('Y-m-d h:i:s'),
                    'id_venta' => $registro,
                    'cantidad'  => 0,
                    'producto'  => $id_producto,
                    'identificador' => $identificador,
                    'unidad'    => $unidad_xx,
                    'importe'   => 0
                );
                $this->db->insert('ta_detalles_venta', $data); 
                echo json_encode($date);
            }
        }
    }



} ?>