<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
		$this->load->database();
		$this->load->helper(array('url','funciones'));
        $this->load->model(array('Almacen_model'));
	} 
    
	function index()
	{
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }

        $data = array(
            'title' =>array("estas viendo la lista de almacen","Almacen","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
            'lista'  =>   $this->Almacen_model->lista(),
             );

        
		$this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view("inventario/_view_form",$data);
        $this->load->view('inventario/almacen_index',$data);
        $this->load->view("intranet_view/footer",$data);
	}

    public function actualizarInventario() {
        $json_string ='[{"codigo":"UO001","cantidad":55},
        {"codigo":"UO002","cantidad":155},
        {"codigo":"UO003","cantidad":615},
        {"codigo":"UO004","cantidad":43},
        {"codigo":"UO005","cantidad":15},
        {"codigo":"UO006","cantidad":16},
        {"codigo":"UO007","cantidad":37},
        {"codigo":"UO008","cantidad":12},
        {"codigo":"UO009","cantidad":64},
        {"codigo":"UO010","cantidad":111},
        {"codigo":"UO011","cantidad":990},
        {"codigo":"UO012","cantidad":21},
        {"codigo":"UO013","cantidad":38},
        {"codigo":"UO014","cantidad":9},
        {"codigo":"UO015","cantidad":36},
        {"codigo":"UO016","cantidad":12},
        {"codigo":"UO017","cantidad":22},
        {"codigo":"UO018","cantidad":7},
        {"codigo":"UO019","cantidad":6},
        {"codigo":"UO020","cantidad":7},
        {"codigo":"UO021","cantidad":5},
        {"codigo":"UO022","cantidad":13},
        {"codigo":"UO023","cantidad":5},
        {"codigo":"UO024","cantidad":12},
        {"codigo":"UO025","cantidad":10},
        {"codigo":"UO026","cantidad":9},
        {"codigo":"UO027","cantidad":21},
        {"codigo":"UO028","cantidad":51},
        {"codigo":"UO029","cantidad":12},
        {"codigo":"UO030","cantidad":6},
        {"codigo":"UO031","cantidad":0},
        {"codigo":"UO032","cantidad":8},
        {"codigo":"UO033","cantidad":10},
        {"codigo":"UO034","cantidad":17},
        {"codigo":"UO035","cantidad":5},
        {"codigo":"UO036","cantidad":7},
        {"codigo":"UO037","cantidad":4},
        {"codigo":"UO038","cantidad":10},
        {"codigo":"UO039","cantidad":3},
        {"codigo":"UO040","cantidad":2},
        {"codigo":"UO041","cantidad":3},
        {"codigo":"UO042","cantidad":0},
        {"codigo":"UO043","cantidad":2},
        {"codigo":"UNF001","cantidad":1},
        {"codigo":"UNF002","cantidad":1},
        {"codigo":"UNF003","cantidad":1},
        {"codigo":"UNF004","cantidad":1},
        {"codigo":"UNF005","cantidad":0},
        {"codigo":"UNF006","cantidad":0},
        {"codigo":"UNF007","cantidad":7},
        {"codigo":"UNF008","cantidad":1},
        {"codigo":"UNF009","cantidad":240},
        {"codigo":"UNF010","cantidad":1},
        {"codigo":"UNF011","cantidad":1},
        {"codigo":"UNF012","cantidad":3},
        {"codigo":"UNF013","cantidad":0},
        {"codigo":"UNF014","cantidad":3},
        {"codigo":"UNF015","cantidad":3},
        {"codigo":"UNF016","cantidad":5},
        {"codigo":"UNF017","cantidad":3},
        {"codigo":"UNF018","cantidad":25},
        {"codigo":"UNF019","cantidad":2},
        {"codigo":"UNF020","cantidad":0},
        {"codigo":"UNF021","cantidad":0},
        {"codigo":"UNF022","cantidad":300},
        {"codigo":"UNF023","cantidad":20},
        {"codigo":"UNF024","cantidad":20},
        {"codigo":"UNF025","cantidad":0},
        {"codigo":"UNF026","cantidad":0},
        {"codigo":"UNF027","cantidad":4},
        {"codigo":"UNF028","cantidad":32},
        {"codigo":"UNF029","cantidad":4},
        {"codigo":"UNF030","cantidad":0},
        {"codigo":"UNF031","cantidad":-47},
        {"codigo":"UNF032","cantidad":0},
        {"codigo":"UNF033","cantidad":0},
        {"codigo":"UNF034","cantidad":0},
        {"codigo":"UNF035","cantidad":2},
        {"codigo":"UNF036","cantidad":0},
        {"codigo":"UNF037","cantidad":0},
        {"codigo":"UNF038","cantidad":0},
        {"codigo":"UNF039","cantidad":0},
        {"codigo":"UNF040","cantidad":0},
        {"codigo":"UNF041","cantidad":1},
        {"codigo":"UNF042","cantidad":7},
        {"codigo":"UNF043","cantidad":1},
        {"codigo":"UNF044","cantidad":0},
        {"codigo":"UNF045","cantidad":57},
        {"codigo":"UNF046","cantidad":1},
        {"codigo":"UNF047","cantidad":0},
        {"codigo":"UNF048","cantidad":0},
        {"codigo":"UNF049","cantidad":0}]
        ';

        $json_obj = json_decode($json_string);

        foreach($json_obj as $item) {
            $this->Almacen_model->updateStockOfProduct($item->codigo, $item->cantidad);
        }

        echo "sucess";
    }
    
}
