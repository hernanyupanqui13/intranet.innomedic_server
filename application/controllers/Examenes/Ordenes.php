<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
        $this->load->model("Ordenes_model");
        
    } 
    

    public function index() {

        if($this->session->userdata('session_id')=='') {
            redirect(base_url());
        }

        $data = array(
            'title' =>array("estas viendo la lista de almacen","Almacen","","<a target='_blank' href='https://www.facebook.com'>Sistemas</a>"),
        );

        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('orden/index',$data);
        $this->load->view("intranet_view/footer",$data);
    }
    
    
    /*
    Funcion para obtener los datos de los examenes en ciertas fechas o, si no se especifica, del diag
    Se entrega los 4 datos de un formulario en el lado del cliente, se pide los datos al DB y se agrega etiquetas y formatos
    para luego enviarlos al lado del cliente
    */
    public function obtener_registro_ajax($fecha_inicio=null, $fecha_fin=null, $nombre_busqueda=null, $dni_busqueda=null)
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url().'Inicio/Zona_roja/');
        }
        
        // Obteniendo los datos con los valores entregados 
        $list = $this->Ordenes_model->obtener_registro_ajax($fecha_inicio, $fecha_fin, $nombre_busqueda, $dni_busqueda);
       
        // Dando formato a los datos recibidos
        $data = array();

        foreach ($list as $person) {

            $row = array();

            $row["nro_identificador"] = $person->nro_identificador;
            $row["fecha_registro"] = $person->fecha_;
            $row["nombrex"] = $person->nombrex;
            $row["tipo_examen"] = $person->nombre_paquete;

            if ($person->empresa=="" || $person->empresa==NULL) {
                $row["empresa"] = "____";
            } else {
                $row["empresa"] = $person->empresa;
            }
            // Revisando si les corresponde hacer laboratorio para crear el link
            if (in_array($person->id_paquete, array("1", "2", "3", "5", "580", "581", "582", "583"))) {
                $row["laboratorio"] = '<a class="btn btn-warning" href="javascript:void(0)" title="Laboratorio" onclick="laboraorio('."'".$person->id."'".')"><i class="  fas fa-vials"></i>&nbsp;</a>';                 
            } else {
                $row["laboratorio"] = '____';                 
            }

            // Revisando si les corresponde Rayos X para crear el link
            if ($person->id_paquete=="1" or $person->id_paquete=="2" or $person->id_paquete=="3" ) {
                $row["rayox"] = '<a class="btn btn-dark" href="javascript:void(0)" title="Rayos X" onclick="rayosx('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
            } else {
                $row["rayox"] = '____';
            }

            
            $row["final"] = '<a class="btn btn-info" href="javascript:void(0)" title="Actualizar" onclick="impresion_final('."'".$person->id."'".')"><i class=" fas fa-file-medical-alt"></i>&nbsp;</a>';
            $data[] = $row; // Añadiendo el row a data
            
        }

        // Enviando los datos con formato apropiado
        $output = $data;
        echo json_encode($output);
    }
    
}
