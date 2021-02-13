
<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Impresion_model extends CI_Model {

    public function getNombrePlantilla($url) {
        $query = $this->db->query(
            "SELECT id_paquete
            FROM exam_datos_generales AS edg
            WHERE url_unico = '$url'"
        );

        $response = $query->row();
        $nombre_plantilla="";

        $id_paquete= $response->id_paquete;
        
        if($id_paquete == "5") {
            $nombre_plantilla = "prueba-rapida-imprimir";    
        } elseif ($id_paquete =="580") {
            $nombre_plantilla = "prueba-rapida-cuanti-imprimir";    
        } elseif ($id_paquete=="581") {
            $nombre_plantilla ="prueba-antigeno-imprimir";
        } elseif ($id_paquete =="582") {
            $nombre_plantilla ="prueba-molecular-imprimir";
        } elseif ($id_paquete =="583") {
            $nombre_plantilla = "prueba-antigeno-cuanti-imprimir";
        } else {
            $nombre_plantilla = $id_paquete;
        }

        return $nombre_plantilla;
    }

    public function fromUrlToId($url) {
        $query = $this->db->query(
            "SELECT Id
            FROM exam_datos_generales AS edg
            WHERE url_unico = '$url'"
        );

        $response = $query->row();

        return $response->Id;
    }

    public function getEstadoProgreso($id_examen) {
        
        $query_string = 
            "SELECT estado_progreso
            FROM exam_datos_generales
            WHERE Id = $id_examen"
        ;

        $query = $this->db->query($query_string);
        return $query->row()->estado_progreso;
    }

    public function getLabEstado($id_examen) {
        
        $query_string = 
            "SELECT lab_llenado
            FROM exam_datos_generales
            WHERE Id = $id_examen"
        ;

        $query = $this->db->query($query_string);
        return $query->row()->lab_llenado;
    }

    public function getResultadoEstado($id_examen) {
        
        $query_string = 
            "SELECT resultado_enviado
            FROM exam_datos_generales
            WHERE Id = $id_examen"
        ;

        $query = $this->db->query($query_string);
        return $query->row()->resultado_enviado;
    }

}

?>