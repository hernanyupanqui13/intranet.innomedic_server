<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ResultadoFinal_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }
    
    function obtener_registro_ajax() {
        $query = $this->db->query("select e.Id as id ,e.nro_identificador, concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) as nombrex, e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status, date(e.fecha_registro) as fecha_ ,e.url_unico, e.id_paquete , e.archivo, e.correo, e.boleta_pago, e.total, e.precio from exam_datos_generales as e where (fecha_registro>='".date('Y-m-d')." 00:00:01' and fecha_registro<='".date('Y-m-d')." 23:59:59')  ORDER BY Id desc, nro_identificador desc");
        return $query->result();       
    }

    public function mostrar_datos_busqueda_($initial_date,$final_date,$nombre_busqueda,$dni_busqueda, $tipo_de_examen)
    {
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

        $condition_1="(DATE(e.fecha_registro)>=$initial_date AND DATE(e.fecha_registro)<=$final_date)";

        // Busqueda por nombre o apellido
        if($nombre_busqueda == null || $nombre_busqueda=="null") {
            $condition_2="AND TRUE";
        } else {
            $condition_2="AND (e.nombre LIKE '%$nombre_busqueda%' OR e.apellido_paterno LIKE '%$nombre_busqueda%' OR e.apellido_materno LIKE '%$nombre_busqueda%')";
        }

        // Busqueda por DNI
        if($dni_busqueda == null || $dni_busqueda=="null") {
            $condition_3="AND TRUE";
        } else {
            $condition_3="AND dni LIKE '%$dni_busqueda%'";
        }

        // Tipo de examenes
        if($tipo_de_examen == null || $tipo_de_examen == "null") {
            $condition_4 = "AND TRUE";
        } else {
            $condition_4 = "AND e.id_paquete = $tipo_de_examen";
        }
        
        
        // Armando el pedido e insertando las condiciones
        $query_string=(
        "SELECT e.Id AS id , e.nro_identificador, e.estado_progreso,
            concat(e.nombre,' ',e.apellido_paterno,' ',e.apellido_materno) AS nombrex,
            TIMESTAMPDIFF(YEAR,e.fecha_nacimiento,CURDATE()) AS edad,
            ts_sexo.nombre AS sexo,
            e.dni,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_sexo,e.empresa,e.status, 
            DATE(e.fecha_registro) AS fecha_ ,
            e.url_unico, e.id_paquete, e.total, e.precio,e.boleta_pago,e.archivo,
            (SELECT l.nombre FROM exam_paquetes AS l WHERE l.Id=e.id_paquete) AS nombre_paquete,
            el.igm, el.igg, el.concentracion_igm, el.concentracion_igg, el.antigeno_resultado, el.concentra_atig,
            molecular_url
        FROM exam_datos_generales AS e
            INNER JOIN ts_sexo
                ON ts_sexo.Id = e.id_sexo
            INNER JOIN exam_laboratorio el
                ON el.id_paciente = e.Id
        WHERE $condition_1 $condition_2 $condition_3 $condition_4
        ORDER BY Id DESC, nro_identificador DESC"
        );

        // Haciendo el pedido a la base de datos
        $query = $this->db->query($query_string);

        // Regresando el pedido como respuesta
		return $query->result();
    }

    public function laboratorio_view_register($id)
    {
        $query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select html from exam_paquetes where Id=a.id_paquete) as html_paquete from exam_datos_generales as a where Id='".$id."'");
        return $query->result();
    }
    public function laboratorio_view_register_url($url)
    {
        
        $query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad,(select html from exam_paquetes where Id=a.id_paquete) as html_paquete from exam_datos_generales as a where url_unico='".$url."'");
        return $query->result();
        
        
    }



    //desde aqui vemos lod datos de los rayox x


    public function mostramos_archivos_pdf_id_paciente($id)
    {
        $query = $this->db->query("select * from exam_archivos where id_paciente='".$id."'");
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
          from exam_rayox as a where url='".$id."'");
        return $query->row();
    }

    public function Mostrar_paquete_01($id_paciente)
    {
         $query = $this->db->query("select * from exam_laboratorio where url='".$id_paciente."'");
       // return $query->result();
        return $query->row();
    }

    public function Impoirmir_prueba_rapida($id)
    {
        $query = $this->db->query("select a.*,
            (select nombre from ts_sexo where Id=a.id_sexo) as sexo,
            (select igm from exam_laboratorio where id_paciente=a.Id) as igm,
            (select igg from exam_laboratorio where id_paciente=a.Id) as igg,
            (select update_covid from exam_laboratorio where id_paciente=a.Id) as update_covid,
            TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad 
             from exam_datos_generales a where url_unico='".$id."'");
        return $query->row();
    }


    public function mostramosdatos_del_paciente($id)
    {
        $query = $this->db->query("select a.*,TIMESTAMPDIFF(YEAR,a.fecha_nacimiento,CURDATE()) as edad, concat(a.nombre,' ', a.apellido_paterno,' ',a.apellido_materno) as nombres, a.correo, a.boleta_pago, a.total,a.url_unico,a.boleta_pago from exam_datos_generales as a where Id='".$id."'");
        return $query->row();
    }

    public function update_insert_file($id,$data)
    {
        $this->db->where("Id",$id);
        $this->db->update("exam_datos_generales",$data);
    }

    public function actualizarResultadoProgreso($id,$data) {

        $data_to_send = array("resultado_enviado"=> $data);
        
        $this->db->where("Id",$id);
        $this->db->update("exam_datos_generales",$data_to_send);
    }

    public function actualizarEstadoProgreso($estado_progreso, $id) {
        $data=array('estado_progreso'=>$estado_progreso);

        $this->db->where('Id', $id);
        $this->db->update('exam_datos_generales', $data);
    }

}