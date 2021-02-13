<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * 
  */
 class Compras extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Compras_model");
		$this->load->helper(array("funciones"));
 	}
 	public function index()
 	{
 		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}
		$data['title'] = array("estas viendo Compras","Lista de Compras", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Compras/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nueva Compra</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>");
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

        $data['lista_compra']  =   $this->Compras_model->lista_compra($numcomprobante,$desde,$hasta);

 		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view('inventario/compras_index',$data);
		$this->load->view("intranet_view/footer",$data);
 		
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

         echo json_encode(array('retorno' =>base_url().'Inventario/Compras/index/'.$numcomprobante.'/'.$desde.'/'.$hasta));
    }


 	public function Nuevo()
 	{
 		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}

		$data['title'] = array("estas en nueva compra","Lista de Compras", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Compras/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Pedido</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>");

        $data['listamoneda']    =   $this->Compras_model->listamoneda();
        $data['combotipo']      =   $this->Compras_model->combotipo();
         $data['action']         =   base_url().'Inventario/Compras/data_nuevo/';
        $data['listacombo1']    =   $this->Compras_model->listacombo1();

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view('inventario/nuevo_compra',$data);
		$this->load->view("intranet_view/footer",$data);

		
 	}

 	public function comborazonsocial()
 	{
 		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
		}

 		 $id = $this->input->post('id');
        
        if($id==''){
            $query = $this->db->query("select * from ta_proveedores");
        }else{
            $query = $this->db->query("select * from ta_proveedores where Id='".$id."'");
        }
        
        foreach ($query->result() as $x)
        {
            $date["direccion"]  =   $x->direccion;
            $date["ruc"]        =   $x->ruc;
            $date["telefono"]   =   $x->telefono;
        }

        echo json_encode($date);
 	}

 	public function cambio()
 	{
 		$id = $this->input->post('id');
        
        if($id==''){
            $query = $this->db->query("select * from ta_moneda");
        }else{
            $query = $this->db->query("select * from ta_moneda where Id='".$id."'");
        }
        
        foreach ($query->result() as $x)
        {
            $date["cantidad"]  =   $x->cantidad;
        }

        echo json_encode($date);
 	}

 	public function data_nuevo()
 	{
 		$dato=array(
            'razon_social'  =>  $this->input->post('razon_social'),
            'ruc'           =>  $this->input->post('ruc'),
            'telefono'      =>  $this->input->post('telefono'),
            'serie'         =>  $this->input->post('serie'),
            'numboleta'     =>  $this->input->post('numboleta'),
            'tipocomprobante'  =>  $this->input->post('tipocomprobante'),
            'direccion'     =>  $this->input->post('direccion'),
            'tipo'          =>  $this->input->post('tipo'),
            'txt_cambio'    =>  $this->input->post('txt_cambio')
        );
        
        $randon         =   $this->Compras_model->data_nuevo($dato);
        $id_comprobante =   $this->Compras_model->id_comprobante($randon);
        
        // actualiza datos del proveedor
        $dato01 =   array(
            'ruc'           =>  $this->input->post('ruc'),
            'telefono'      =>  $this->input->post('telefono'),
            'direccion'     =>  $this->input->post('direccion')
        );
        $this->Compras_model->actualiza_razonsocial($dato01);
        
        redirect(base_url().'Inventario/Compras/editar/'.$id_comprobante);
 	}


 	 function editar(){

        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->uri->segment(4,0)==''){
            redirect(base_url()."Inventario/Compras/");
        }

        $data['title'] = array("estas en editar la compra","Detalle de Compras", "<a  class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='".base_url('Inventario/Compras/Nuevo/')."'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Compra</a>","<a href='https://www.facebook.com/escudero05'>Evaristo Escudero Huillcamascco</a>");
        $data['listacombo1']    =   $this->Compras_model->listacombo1();
        $data['listacomprobante']    =   $this->Compras_model->listacomprobante();
        $data['listamoneda']    =   $this->Compras_model->listamoneda();
        
        $data['dato']           =   $this->Compras_model->dato_editar($this->uri->segment(4,0));
        $data['producto']       =   $this->Compras_model->producto();
        $data['listaprevia']    =   $this->Compras_model->listavistarevia($this->uri->segment(4,0));

        $this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("inventario/_view_form",$data);
		$this->load->view('inventario/editar_compra',$data);
		$this->load->view("intranet_view/footer",$data);
        
	/*	$this->load->view('diseno/cabezera', $dato);
        $this->load->view('compra/editar', $data);
        $this->load->view('diseno/final', $dato);*/
    }

     function listadatos(){
        $producto = $this->input->post('productox');
        $registro = $this->input->post('registro');
        
        // buscamos los datos del producto para agregar al detalle
        $query = $this->db->query("select * from ta_productos where Id='".$producto."' ");
        foreach ($query->result() as $x)
        {
            $date['codigo']         =   $x->Id;
            $date['producto']       =   $x->nombre." (".$x->description.")";
            $date['precioventa']    =   0; // $x->precioventa
            $date['importe']        =   0;
            $id_producto            =   $x->Id;
            $preciov                =   0;  // $x->precioventa
        }
        
        // verificamos en el detalle si ya existe ese producto para ya no agregarlo de nuevo
        $queryx = $this->db->query("select * from ta_detalles_compra where producto='".$id_producto."' and id_compra='".$registro."' ");
        $row = $queryx->row();
        if($registro!=''){
            if($row==0){
                // grabamos en el detalle si no existe el producto
                $data = array(
                    'fecha'    => date('Y-m-d h:i:s'),
                    'id_compra' => $registro,
                    'cantidad'  => 0,
                    'producto'  => $id_producto,
                    'precio'    => $preciov,
                    'importe'   => 0
                );
                $this->db->insert('ta_detalles_compra', $data); 
                echo json_encode($date);
            }
        } 
    }



    function calcular(){    
        $total = count($this->input->post('id[]'));
        $registro = $this->input->post('pagina');        
        // preguntamos si es dolares para transformarlo a soles
        $moneda=0;
        $queryy = $this->db->query("select * from ta_compras where Id='".$registro."' ");
        foreach ($queryy->result() as $xy)
        {
            $moneda =   $xy->moneda;
            $cambio =   $xy->cambio;
        }
        if($moneda==1){  // dolar

                // actualizamos las cantidades con el detalle
                for($x=0;$x<=$total;$x++){
                    $codigo     =   $this->input->post('id['.$x.']');
                    $cantidad   =   $this->input->post('cantidad['.$x.']');
                    $venta      =   $this->input->post('venta['.$x.']');

                    $query = $this->db->query("select * from ta_detalles_compra where id_compra='".$registro."' and producto='".$codigo."' ");
                    foreach ($query->result() as $xx)
                    {
                        $precio_soles   =   $venta*$cambio;
                        
                        $data = array(
                            'cantidad'  =>  $cantidad,
                            'precio'    =>  $venta,
                            'importe'   =>  ($cantidad*$venta),
                            
                            'precio_soles'  =>  $precio_soles,
                            'importe_soles'  =>  ($cantidad*$precio_soles)
                        );

                        $where = array(
                            'producto'  => $codigo,
                            'id_compra' => $registro
                        );
                        $this->db->where($where);
                        $this->db->update('ta_detalles_compra', $data); 
                    }

                }
        }else{  // soles
                // actualizamos las cantidades con el detalle
                for($x=0;$x<=$total;$x++){
                    $codigo     =   $this->input->post('id['.$x.']');
                    $cantidad   =   $this->input->post('cantidad['.$x.']');
                    $venta      =   $this->input->post('venta['.$x.']');

                    $query = $this->db->query("select * from ta_detalles_compra where id_compra='".$registro."' and producto='".$codigo."' ");
                    foreach ($query->result() as $xx)
                    {
                      
                        $data = array(
                            'cantidad'  => $cantidad,
                            'importe'   => 0,
                            'precio'    =>  0,
                            
                            'precio_soles'  =>  $venta,
                            'importe_soles'  =>  ($cantidad*$venta)
                        );

                        $where = array(
                            'producto'  => $codigo,
                            'id_compra' => $registro
                        );
                        $this->db->where($where);
                        $this->db->update('ta_detalles_compra', $data); 

                    }

                }
        }
                
        // actualizamos el estado t_compra para que se active el boton finalizar
        $data = array(
            'estado' => 1
        );
        
        $this->db->where('Id', $registro);
        $this->db->update('ta_compras', $data); 
        
        if($this->input->post('boton')=='1'){
            redirect(base_url().'Inventario/Compras/editar/'.$registro);
        }else if($this->input->post('boton')=='2'){
            redirect(base_url().'Inventario/Compras/finalizar/'.$registro);
        }
                
    }


    public function igv(){
        $id     =   $this->input->post('id');
        $pagina =   $this->input->post('pagina');
        
        $data = array(
            'igv' => $id
        );
        
        $this->db->where('Id', $pagina);
        $this->db->update('ta_compras', $data); 
    }


     function temporalvistaprevia(){
        $cod        = str_replace(" ","-",$this->input->post('codigo'));
        $registro   = $this->input->post('registro');
        
        // buscamos los datos del producto para agregar al detalle
        $query = $this->db->query("select * from ta_productos where codigobarra='".$cod."' ");
        $rowx = $query->row();
        foreach ($query->result() as $x)
        {
            $date['codigo']         =   $x->id;
            $date['producto']       =   $x->nombre." (".$x->descripcion.")";
            $date['precioventa']    =   0; // $x->precioventa
            $date['importe']        =   0;
            $id_producto            =   $x->id;
            $preciov                =   0; // $x->precioventa
        }
            
        if(isset($rowx)){
            // verificamos en el detalle si ya existe ese producto para ya no agregarlo de nuevo
            $queryx = $this->db->query("select * from ta_detalles_compra where producto='".$id_producto."' and id_compra='".$registro."' ");
            $row = $queryx->row();
            if($row==0){
                // grabamos en el detalle si no existe el producto
                $data = array(
                    'fecha'     => date('Y-m-d h:i:s'),
                    'id_compra' => $registro,
                    'cantidad'  => 0,
                    'producto'  => $id_producto,
                    'precio'    => $preciov,
                    //'sede'      => $this->session->userdata('session_sede'),
                    'importe'   => 0
                );
                $this->db->insert('ta_detalles_compra', $data); 
                echo json_encode($date);
            }
        }
                
    }


    function finalizar(){
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        $query = $this->db->query("select * from ta_detalles_compra where id_compra='".$this->uri->segment(4,0)."' ");
        foreach ($query->result() as $x)
        {
            $producto = $x->producto;
            $cantidad = $x->cantidad;
            
            $queryx = $this->db->query("select * from ta_almacen where producto='".$producto."' ");
            foreach ($queryx->result() as $xx)
            {
                $total  =   $xx->total;
            }
            
            $suma=$total+$cantidad;
            
            $data = array(
                'total' => $suma
            );
            
            $this->db->where('producto', $producto);
            $this->db->update('ta_almacen', $data);
        }
        
        // cambiar estado t_compra para que ya finalice completamente
        $data = array(
            'estado' => 2
        );
        
        $this->db->where('Id', $this->uri->segment(4,0));
        $this->db->update('ta_compras', $data);
        
        $data = array(
            'estado' => 1
        );
        
        $this->db->where('id_compra', $this->uri->segment(4,0));
        $this->db->update('ta_detalles_compra', $data);
        
        // --------------------------- agregamos al historial -----------------------------
        $query_01 = $this->db->query("select * from ta_detalles_compra where id_compra='".$this->uri->segment(4,0)."'");
            foreach ($query_01->result() as $x_01)
            {                
                $data = array(
                    'fecha'     => date('Y-m-d h:i:s'),
                    'id_compra' =>  $this->uri->segment(4,0),
                    'producto'  => $x_01->producto,
                    'stock'     => $x_01->cantidad,
                    'precio'    => $x_01->precio_soles,
                   // 'sede'      => $this->session->userdata('session_sede'),
                    'importe'   => $x_01->importe_soles
                );
                
                $this->db->insert('hi_compra', $data); 
            }
        // --------------------------- agregamos al historial -----------------------------
                
        redirect(base_url().'Inventario/Compras/editar/'.$this->uri->segment(4,0));
    }



    function eliminar(){
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->uri->segment(4,0)==0){
            redirect(base_url().'Inventario/Compras/');
        }
        
        // capturamos las cantidades de los prodcutos del detalle para restarlos en el almacen
        $query = $this->db->query("select * from ta_detalles_compra where id_compra='".$this->uri->segment(4,0)."' ");
        foreach ($query->result() as $x)
        {
            $cantidad       =   $x->cantidad;
            $id_producto    =   $x->producto;

            $query1 = $this->db->query("select * from ta_almacen where producto='".$id_producto."' ");
            foreach ($query1->result() as $x1)
            {
                $id_al =    $x1->Id;
                $total =    $x1->total-$cantidad;
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
            
            $this->db->where('Id', $x->id);
            $this->db->update('ta_detalles_compra', $data); 
        }
        
        // anulamos cabeceza
        $data = array(
            'estado' => 3 // es anulado en cabecera
        );

        $this->db->where('Id', $this->uri->segment(4,0));
        $this->db->update('ta_compras', $data); 
        
        redirect(base_url().'Inventario/Compras/');
    }


     function eliminar_temporal(){
        $registro   = $this->uri->segment(4,0);
        $id         = $this->uri->segment(5,0);
        
        $this->db->delete('ta_detalles_compra', array('producto' => $id, 'id_compra' => $registro));
        redirect(base_url().'Inventario/Compras/editar/'.$registro);
    }
    
      




 } ?>