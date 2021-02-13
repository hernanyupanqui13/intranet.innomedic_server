<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ordenes_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }
    
    function obtener_registro_ajax($initial_date = null, $final_date = null, $nombre_busqueda = null, $dni_busqueda = null) {

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
        "SELECT e.Id AS id ,e.nro_identificador, 
            concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) AS nombrex, 
            e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status, 
            DATE(e.fecha_registro) AS fecha_ ,e.url_unico, e.id_paquete, 
            (SELECT l.nombre FROM exam_paquetes AS l WHERE l.Id=e.id_paquete) AS nombre_paquete 
        FROM exam_datos_generales AS e 
        WHERE $condition_1 $condition_2 $condition_3
        ORDER BY Id DESC, nro_identificador DESC"
        );

        // Haciendo el pedido a la base de datos
        $query = $this->db->query($query_string);

        // Regresando el pedido como respuesta
        return $query->result();
    }

}