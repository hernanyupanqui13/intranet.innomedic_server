<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * 
  */
 class Compras_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}


 	public function lista_compra($numcomprobante,$desde,$hasta){        
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
        $query = $this->db->query("select * from ta_compras $consulta");
        return $query->result();        
    }

    function listamoneda(){
        $query = $this->db->query("select * from ta_moneda order by Id asc");
        return $query->result();
    }

    function combotipo(){
        $query = $this->db->query("select * from ta_tipocomprobante where compra='1' ");
        return $query->result();
    }

      function listacombo1(){
        $query = $this->db->query("select * from ta_proveedores order by nombre asc");
        return $query->result();
    }

     function data_nuevo($dato){
        $randon =   rand(10000,99999);
                
        $data = array(
            'fecha'             =>  date('Y-m-d h:i:s'),
            'seriecomprobante'  =>  $dato['serie'],
            'numcomprobante'    =>  $dato['numboleta'],
            'tipocomprobante'   =>  $dato['tipocomprobante'],
            'proveedor'         =>  $dato['razon_social'],
            'ruc'               =>  $dato['ruc'],
            'telefono'          =>  $dato['telefono'],                         
            'direccion'         =>  $dato['direccion'],
            'moneda'            =>  $dato['tipo'],
            'cambio'            =>  $dato['txt_cambio'],
            'randon'            =>  $randon
        );
        
        $this->db->insert('ta_compras', $data); 
            
        return $randon;
    }

    function id_comprobante($randon){
        $query = $this->db->query("select * from ta_compras where randon='".$randon."' ");
        foreach ($query->result() as $x)
        {
            $id = $x->Id;
        }
        
        $data = array(
            'randon' => ''
        );
        
        $this->db->where('Id', $id);
        $this->db->update('ta_compras', $data); 
        
        return $id;
    }

    function actualiza_razonsocial($dato01){
        
        // buscamos si existe el ruc o dni 
        $query = $this->db->query("select * from ta_proveedores where ruc='".$dato01['ruc']."'");
        foreach ($query->result() as $x)
        {
            $idd    =   $x->Id; 
        }
        
        $data = array(
            'telefono'      => $dato01['telefono'],
            'direccion'     => $dato01['direccion']
        );
        
        $this->db->where('Id', $idd);
        $this->db->update('ta_proveedores', $data); 
    }

    function listacomprobante(){
        $query = $this->db->query("select * from ta_tipocomprobante order by tipocomprobante asc");
        return $query->result();
    }

    function dato_editar($id){
        $query = $this->db->query("select * from ta_compras where Id='".$id."'");
        return $query->result();
    }

    function producto(){
        $query = $this->db->query("select * from ta_productos order by nombre asc");
        return $query->result();
    }
    
    function listavistarevia($id){
        $query = $this->db->query("select * from ta_detalles_compra a where id_compra='".$id."' order by id asc");
        return $query->result();
    }
    


 } ?>