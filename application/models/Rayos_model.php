<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Rayos_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }

    public function rayos_view_register($url_unicio)
    {
    	$query = $this->db->query("select *,TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) as edad from exam_datos_generales where Id='".$url_unicio."'");
    	return $query->result();
    }

    public function vista_rayox($url_unicio)
    {
        $query = $this->db->query("select * from exam_rayox where id_paciente='".$url_unicio."'");
        return $query->result();
    }

    //sexo
    public function seleccione_sexo()
    {
    	$query = $this->db->query("select * from ts_sexo");
    	return $query->result();
    }


    //insertamos los datos mediante bajax 
    public function insert_data_rayos($data)
    {
        $this->db->insert("exam_rayox",$data);
    }

    //actualiamos los datos del paciente

    public function update_rayox_x($id,$data)
    {   
        $this->db->where("id_paciente",$id);
        $this->db->update("exam_rayox",$data);
    }

    public function actualizar_consentimiento_xx($id,$data)
    {
        $this->db->where("id_paciente",$id);
        $this->db->update("exam_rayox",$data);
    }

    //insertamos archicos

    public function insert_archivos($data = array()) { 
        if(!empty($data)){ 
            // Insert gallery data 
            $insert = $this->db->insert_batch("exam_archivos", $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 

 
    public function mostrar_registros_via_ajax($id)
    {
        $query = $this->db->query("select * from exam_rayox where id_paciente='".$id."'");
        return $query->row();
    }

    public function mostrar_registros_via_ajax_archivos($id)
    {
        $query = $this->db->query("select * from exam_archivos where id_paciente='".$id."'");
        return $query->result();
    }

    public function mostramos_archivos_pdf($id)
    {
        $query = $this->db->query("select * from exam_archivos where Id='".$id."'");
        return $query->row();
    }

    public function mostramos_archivos_pdf_id_paciente($id)
    {
        $query = $this->db->query("select * from exam_archivos where id_paciente='".$id."'");
        return $query->result();
    }

 
    public function delete_archivo_id_paciente_image($id)
    {
         $query = $this->db->query("select * from exam_archivos where Id='".$id."'");
        foreach ($query->result() as $x)
        {
            $imagenx =   $x->archivo;
        }
        /*    
        $row = $query->row();
        */
        if($imagenx!=''){ // cuando es mayor que vacio o cero
           // unlink('assets/'.$imagenx);
            unlink('upload/archivos/rayos/'.$imagenx);
        }else{
            echo "";            
        }
    }
    //eliminamos los registros
    public function delete_archivo_id_paciente($id)
    {
        $this->db->where("Id",$id);
        $this->db->delete("exam_archivos");
    }

    public function imprimir_data_oit($id)
    {
       $query = $this->db->query("select a.*,(select nombre from exam_motivos where Id=a.motivo) as motivo  from exam_rayox as a where id_paciente='".$id."'");
        return $query->row();
    }
    public function mostrar_registros_motivos_list()
    {
        $query = $this->db->query("select * from exam_motivos");
        return $query->result();
    }

    public function mostrar_rwegistros_online_del_oit($id)
    {
        $query = $this->db->query("select a.*,(select nombre from exam_motivos where Id=a.motivo) as motivo,
            DATE_FORMAT(a.fechalec,'%Y') as anox,
            DATE_FORMAT(a.fechalec,'%m') as mesx,
            DATE_FORMAT(a.fechalec,'%w') as diasx,
            DATE_FORMAT(a.fecha_rad,'%Y') as anox_rad,
            DATE_FORMAT(a.fecha_rad,'%m') as mesx_rad,
            DATE_FORMAT(a.fecha_rad,'%w') as diasx_rad
          from exam_rayox as a where id_paciente='".$id."'");
        return $query->row();
    }
  
 
  

}