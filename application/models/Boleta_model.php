<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Boleta_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }
    
    public function lista_escudero_by_boleta($desde,$hasta,$estado,$numboleta,$ano,$mes){        
        if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)!=0 and $this->uri->segment(6,0)!=0 and $this->uri->segment(7,0)!=0){
            $consulta = " where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59') and view like '%".$estado."%' and num_boleta like '%".$numboleta."%' and  ano like '%".$ano."%' and  mes like '%".$mes."%' id_usuario='".$this->session->userdata('session_id')."' order by fecha_enviado desc";
        }else{
            if($this->uri->segment(6,0)!=0 and $this->uri->segment(7,0)==0){
                $consulta = " where view like '%".$estado."%' and id_usuario='".$this->session->userdata('session_id')."' order by fecha_enviado desc";
            }else if($this->uri->segment(7,0)!=0 ){
                $consulta = " where tipo_boleta like '%".$numboleta."%' and id_usuario='".$this->session->userdata('session_id')."' order by fecha_enviado desc";
            }else if($this->uri->segment(4,0)==0 and $this->uri->segment(5,0)!=0){
                $consulta = " where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59') and id_usuario='".$this->session->userdata('session_id')."' order by fecha_enviado desc";
            }else{
                $consulta = "where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59') and id_usuario='".$this->session->userdata('session_id')."' order by fecha_enviado desc";
            }
        }
        $query = $this->db->query("select * from ts_entrega_boleta  $consulta ");
        return $query->result();        
    }

    public function lista_escudero_by_boleta_administrador($desde,$hasta,$estado,$numboleta)
    {
         if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)!=0 and $this->uri->segment(6,0)!=0 and $this->uri->segment(7,0)!=0){
            $consulta = " where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59') and view like '%".$estado."%' and num_boleta like '%".$numboleta."%'  order by fecha_enviado desc";
        }else{
            if($this->uri->segment(6,0)!=0 and $this->uri->segment(7,0)==0){
                $consulta = " where view like '%".$estado."%'  order by fecha_enviado desc";
            }else if($this->uri->segment(4,0)==0 and $this->uri->segment(5,0)!=0){
                $consulta = " where (fecha_enviado>='".$desde." 00:00:01'  order by fecha_enviado desc";
            }else{
                $consulta = "where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59') order by fecha_enviado desc";
            }
        }
        $query = $this->db->query("select * from ts_entrega_boleta  $consulta ");
        return $query->result(); 
    }
    public function tipo_documento()
    {
        $data = $this->db->query("select * from do_tipo_documento");
        return $data->result();
    }
    public function id_perfil()
    {
        $data = $this->db->query("select * from ts_perfil_users");
        return $data->result();
    }
    //envio de boletas aqui valismoa para lñista
    public function lista_trabajadores($id)
    {
      // $data = $this->db->query("select * from ts_datos_personales");
       $data = $this->db->query(
           "SELECT apellido_paterno, apellido_materno, nombres, 
                nro_documento, puesto, email, area, id_usuario
            FROM ts_datos_personales
            WHERE NOT EXISTS (SELECT * FROM ts_entrega_boleta WHERE ts_datos_personales.id_usuario = ts_entrega_boleta.id_usuario and ts_entrega_boleta.fija='".$id."') 
                AND ts_datos_personales.status = '1';");
        return $data->result();

       
    }

    public function lastID()
    {
          return $this->db->insert_id();

        //return $this->db->insert_id();
       // return $this->db->mysql_insert_id();
    }

    public function getComprobante(){
        $this->db->where("Id",'3');
        $resultado = $this->db->get("ta_correlativo");
        return $resultado->row();
    }

    /*public function updateComprobante($data){
        $this->db->where("Id",'3');
    }

    public function save_detalle($data){ 
        $this->db->insert("ts_entrega_boleta",$data);
    
    }*/

    public function agregar_boleta($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("fecha", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("fecha", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert gallery data 
            $insert = $this->db->insert("bo_cabecera", $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 

     public function save_detalle($data = array()) { 
        if(!empty($data)){ 
            // Insert gallery data 
            $insert = $this->db->insert_batch("ts_entrega_boleta", $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 


    public function lista_fecha_boleta($id)
    {
        $query = $this->db->query("select * from ts_entrega_boleta where estado = 1 and url='".$id."'");
        return $query->result();
    }

    //listra_entrega de boleta


   /* public function lista_entrega_boleta()
    {
       $query = $this->db->query("select * from ts_entrega_boleta ");
        return $query->result();
    }*/


    public function lista_entrega_boleta($numcomprobante,$desde,$hasta)
    { 
        if($this->uri->segment(4,0)!=0 and $this->uri->segment(5,0)!=0 and $this->uri->segment(6,0)!=0){
            $consulta = " where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59') and dni like '%".$numcomprobante."%'  order by fecha_enviado desc";
        }else{
            if($this->uri->segment(6,0)!=0 and $this->uri->segment(5,0)==0){
                $consulta = " where dni like '%".$numcomprobante."%' order by fecha_enviado desc";
            }else if($this->uri->segment(5,0)==0 and $this->uri->segment(6,0)!=0){
                $consulta = " where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59')  order by fecha_enviado desc";
            }else{
                $consulta = "where (fecha_enviado>='".$desde." 00:00:01' and fecha_enviado<='".$hasta." 23:59:59')  order by fecha_enviado desc";
            }
        }
        $query = $this->db->query("select * from  ts_entrega_boleta  $consulta");
        return $query->result(); 
    }


    //buscar por ajax

    public function buscar_por_ajax($nombres,$numboleta)
    {
 
         // Produces: WHERE `title` LIKE 'match' ESCAPE '!'

        $this->db->like('nombres',$nombres, 'both');
        $this->db->or_like('apellido_paterno', $nombres);
        $this->db->or_like('apellido_materno', $nombres);
        $this->db->or_like('nro_documento', $numboleta);
      //  $this->db->like('nro_documento',$numboleta, 'both');
        $this->db->select('*,concat(apellido_paterno ," ", apellido_materno," ",nombres) as nombres');
        $data = $this->db->get('ts_datos_personales ');
        return $data->result(); 
    }

    public function obtener_detalle_de_boleta_por_usuario($id_usuario,$ano)
    {
        $query = $this->db->query("SET lc_time_names = 'es_PE'");
        $query = $this->db->query(
            "SELECT a.*,DATE_FORMAT(a.fecha_recibido,'%W %d de %M %Y %H:%i:%s %p') AS fecha_enviado_xx,
                CASE
                    WHEN a.view = '1' THEN 'No visto'
                    WHEN a.view = '2' AND a.conforme IS NULL THEN 'Visto'
                    WHEN a.view = '2' AND a.conforme = '1' THEN 'Visto y conforme'               
                END AS estado_xx         
            ,concat(a.mes,' ',a.ano) AS periodos,(SELECT nombre FROM do_tipo_boleta WHERE Id=a.tipo_boleta) AS boleta 
            FROM ts_entrega_boleta a 
            WHERE id_usuario='".$id_usuario."' AND ano='".$ano."'");
        
        return $query->result();
    }

    //exportar a boleta


    public function fetch_data($id_usuario,$ano_xx)
    {
        $query = $this->db->query("SET lc_time_names = 'es_PE'");
        $query = $this->db->query("select a.*,DATE_FORMAT(a.fecha_recibido,'%W %d de %M %Y %r') as fecha_enviado_xx,
            CASE
                WHEN a.view = '1' THEN 'No visto'
                WHEN a.view = '2' THEN 'Visto'
               
            END as estado_xx         
            ,
        concat(a.mes,' ',a.ano) as periodos,(select nombre from do_tipo_boleta where Id=a.tipo_boleta) as boleta from ts_entrega_boleta a where id_usuario='".$id_usuario."' and ano='".$ano_xx."'");
                return $query->result();
       /* $this->db->order_by("Id", "DESC");
        $this->db->where("id_usuario",$id_usuario);
        $this->db->where("ano",$ano_xx);
        $query = $this->db->get("ts_entrega_boleta");
        return $query->result();*/
    }



    //exportar a pdf


    public function cuenta($id_usuario,$ano_xx)
    {
       /* $this->db->order_by("Id", "DESC");
        $this->db->where("id_usuario",$id_usuario);
        $this->db->where("ano",$ano_xx);
        $query = $this->db->get("ts_entrega_boleta");
        return $query->result();*/

        $query = $this->db->query("SET lc_time_names = 'es_PE'");// %p ESTO ES SI ES AM O PM 
        $query = $this->db->query("select a.*,DATE_FORMAT(a.fecha_recibido,'%W %d de %M %Y %r') as fecha_enviado_xx,DATE_FORMAT(a.fecha_enviado, '%d-%m-%Y') as fecha_,DATE_FORMAT(a.fecha_recibido,'%d-%m-%Y %H:%i:%s') as fecha_esc,
            CASE
                WHEN a.view = '1' THEN 'No visto'
                WHEN a.view = '2' THEN 'Visto'
               
            END as estado_xx         
            ,
        concat(a.mes,' ',a.ano) as periodos,(select nombre from do_tipo_boleta where Id=a.tipo_boleta) as boleta from ts_entrega_boleta a where id_usuario='".$id_usuario."' and ano='".$ano_xx."'");
                return $query->result();
    }

    public function actualizar_estadode_conformidad_x($user_id,$data)
    {
        $this->db->where("Id",$user_id);
        $this->db->update("ts_entrega_boleta",$data);
    }

 
  

}