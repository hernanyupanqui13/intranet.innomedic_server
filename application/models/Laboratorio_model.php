<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Laboratorio_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct(); 
        ini_set('date.timezone', 'America/Lima');
    }

    public function laboratorio_view_register($url_unicio)
    {
    	$query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select html from exam_paquetes where Id=a.id_paquete) as html_paquete from exam_datos_generales as a where Id='".$url_unicio."'");
    	return $query->result();
    }


    public function seleccione_sexo()
    {
    	$query = $this->db->query("select * from ts_sexo");
    	return $query->result();
    }

    //actualizamos los datos de pruebga rapida
    public function actualizar_prueba_rapida($id,$data)
    {
        # code...
        $this->db->where("id_paciente",$id);
        $this->db->update("exam_laboratorio",$data);
    }

    //obtenermos todo los registros mediante ajax

    public function Mostrar_prueba_rapida($id)
    {
        $query = $this->db->query("select * from exam_laboratorio where id_paciente='".$id."'");
        return $query->row();
    }


    /*
    Esta funcion devuelve los datos par auna rapida impresion de un examen en especifico de Laboratorio
    La data es procesada en el lado del cliente con JS
    */
    public function Impoirmir_prueba_rapida($id) {

        $query = $this->db->query(
            "SELECT edg.*, el.*, ts_sexo.nombre AS sexo,
                TIMESTAMPDIFF(YEAR,edg.fecha_nacimiento,CURDATE()) AS edad 
            FROM exam_datos_generales edg 
                INNER JOIN exam_laboratorio el 
                    ON el.id_paciente = edg.Id
                INNER JOIN ts_sexo
                    ON ts_sexo.Id=edg.id_sexo
            WHERE edg.Id =$id"
        );

        return $query->row();

    }

    public function Registrar_paquete_01($id,$data)
    {
        $this->db->where("id_paciente",$id);
        $this->db->update("exam_laboratorio",$data);
    }

    public function Mostrar_paquete_01($id_paciente)
    {
        $query = $this->db->query("select * from exam_laboratorio where id_paciente='".$id_paciente."'");
        return $query->row();
    }

    public function obtenerMolecularUrl($id_exam) {
        $query=$this->db->query("select molecular_url from exam_laboratorio where Id=$id_exam");
        return $query->row();
    }

    public function actualizarEstadoProgreso($estado_progreso, $id) {
        $data=array('estado_progreso'=>$estado_progreso);

        $this->db->where('Id', $id);
        $this->db->update('exam_datos_generales', $data);
    }

    public function actualizarLabProgreso($nuevo_valor, $id) {
        $data=array('lab_llenado'=>$nuevo_valor);

        $this->db->where('Id', $id);
        $this->db->update('exam_datos_generales', $data);
    }


}