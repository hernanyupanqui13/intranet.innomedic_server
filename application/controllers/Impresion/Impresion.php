<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impresion extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
        $this->load->helper(array('url','funciones'));
        $this->load->model("Laboratorio_model");
        $this->load->model("ResultadoFinal_model");
        $this->load->model("Impresion_model");


        
    } 
    

    public function getPruebaRapidaPlantilla() {
        return $this->load->view("laboratorio/prueba-rapida-imprimir");
    }

    public function getPruebaRapidaCuantiPlantilla() {
        return $this->load->view("laboratorio/prueba-rapida-cuanti-imprimir");
    }

    public function getPruebaMolecularPlantilla($id) {
        $molecular_url = $this->Laboratorio_model->obtenerMolecularUrl($id);
        $molecular_url = $molecular_url->molecular_url;
        $imprimir_data = array("molecular_url"=>$molecular_url);
        return $this->load->view("laboratorio/prueba-molecular-imprimir", $imprimir_data);
    }

    public function getPruebaAntigenoPlantilla() {
        return $this->load->view("laboratorio/prueba-antigeno-imprimir");
    }

    public function getPruebaAntigenoCuantiPlantilla() {
        return $this->load->view("laboratorio/prueba-antigeno-cuanti-imprimir");
    }

    public function getPaquete1Plantilla($the_id) {
        $imprimir_data = array("laboratorio_view_register"=>$this->Laboratorio_model->laboratorio_view_register($the_id));
        return $this->load->view("laboratorio/paquete1-imprimir", $imprimir_data);
    }

    public function getPlantilla($nombre_plantilla, $id = NULL) {

        //$id_del_paquete = $this->Laboratorio_model->laboratorio_view_register($id)[0]->id_paquete;

        if ($nombre_plantilla =="prueba-rapida-imprimir") {
            return $this->getPruebaRapidaPlantilla();
        } else if($nombre_plantilla =="prueba-antigeno-imprimir") {
            return $this->getPruebaAntigenoPlantilla();
        } else if($nombre_plantilla =="prueba-antigeno-cuanti-imprimir") {
            return $this->getPruebaAntigenoCuantiPlantilla();
        }else if ($nombre_plantilla=="prueba-rapida-cuanti-imprimir") {
            return $this->getPruebaRapidaCuantiPlantilla();
        } else if ($nombre_plantilla =="prueba-molecular-imprimir" && $id!= NULL) {
            return $this->getPruebaMolecularPlantilla($id);
        } else if ($nombre_plantilla == "paquete1-imprimir") {
            return $this->getPaquete1Plantilla($id);
        } else {
            echo "No se encontro la informacion: " . $nombre_plantilla ;
        }
    }

    public function getData($id) {
        
        $data = $this->Laboratorio_model->Impoirmir_prueba_rapida($id);
        echo json_encode($data);

    }

    public function getPlantillaFinal($id)
    {
    	if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        $query = $this->db->query("select * from exam_datos_generales where Id='".$id."'");
        $result = $query->row();
        
        $nombrex = $result->apellido_paterno." ".$result->apellido_materno.", ".$result->nombre;

		$data['title'] = array($nombrex);

    	$data['laboratorio_view_register'] = $this->ResultadoFinal_model->laboratorio_view_register($id);
                
        
        if ($result->id_paquete=="5") {
            $view_path_imprimir ="laboratorio/prueba-rapida-imprimir";

        } elseif ($result->id_paquete=="580") {
            $view_path_imprimir = "laboratorio/prueba-rapida-cuanti-imprimir";


        } elseif ($result->id_paquete=="581") {
            $view_path_imprimir = "laboratorio/prueba-antigeno-imprimir";

        } elseif ($result->id_paquete=="582"){
            $view_path_imprimir = "laboratorio/prueba-molecular-imprimir";
            $molecular_url = $this->Laboratorio_model->obtenerMolecularUrl($id);
            $molecular_url = $molecular_url->molecular_url;
            $data = array("molecular_url"=>$molecular_url);


        } elseif ($result->id_paquete=="583") {
            $view_path_imprimir = "laboratorio/prueba-antigeno-cuanti-imprimir";
        } elseif (in_array($result->id_paquete, array("1", "2", "3"))) {
            $view_path_imprimir = "resultadofinal/paquetes-impresion-final";
        }
    	$this->load->view($view_path_imprimir,$data);


    }

    public function isAllowedToPrint($id_examen) {
        $estado = $this->Impresion_model->getLabEstado($id_examen);
        if ($estado == "1") {
            echo json_encode(array("respuesta"=>true));
        } else {
            echo json_encode(array("respuesta"=>false));
        }
    }

    

}
