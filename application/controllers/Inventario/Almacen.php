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

    public function corregirCodigos() {
        $string = '
            [{"antiguo":"UO001","nuevo":"UO018", "temporal":1},
            {"antiguo":"UO002","nuevo":"UO019", "temporal":2},
            {"antiguo":"UO004","nuevo":"UO033", "temporal":3},
            {"antiguo":"UO005","nuevo":"UO020", "temporal":4},
            {"antiguo":"UO006","nuevo":"UO009", "temporal":5},
            {"antiguo":"UO007","nuevo":"UO010", "temporal":6},
            {"antiguo":"UO008","nuevo":"UO035", "temporal":7},
            {"antiguo":"UO009","nuevo":"UO023", "temporal":8},
            {"antiguo":"UO010","nuevo":"UO025", "temporal":9},
            {"antiguo":"UO011","nuevo":"UO031", "temporal":10},
            {"antiguo":"UO012","nuevo":"UNF012", "temporal":11},
            {"antiguo":"UO013","nuevo":"UNF027", "temporal":12},
            {"antiguo":"UO014","nuevo":"UO028", "temporal":13},
            {"antiguo":"UO015","nuevo":"UNF028", "temporal":14},
            {"antiguo":"UO016","nuevo":"UO039", "temporal":15},
            {"antiguo":"UO017","nuevo":"UO021", "temporal":16},
            {"antiguo":"UO018","nuevo":"UO032", "temporal":17},
            {"antiguo":"UO019","nuevo":"UO001", "temporal":18},
            {"antiguo":"UO020","nuevo":"UO011", "temporal":19},
            {"antiguo":"UO021","nuevo":"UO002", "temporal":20},
            {"antiguo":"UO023","nuevo":"UO012", "temporal":21},
            {"antiguo":"UO024","nuevo":"UO027", "temporal":22},
            {"antiguo":"UO025","nuevo":"UO005", "temporal":23},
            {"antiguo":"UO026","nuevo":"UO014", "temporal":24},
            {"antiguo":"UO027","nuevo":"UO007", "temporal":25},
            {"antiguo":"UO028","nuevo":"UNF011", "temporal":26},
            {"antiguo":"UO029","nuevo":"UNF018", "temporal":27},
            {"antiguo":"UO030","nuevo":"UO015", "temporal":28},
            {"antiguo":"UO031","nuevo":"UNF025", "temporal":29},
            {"antiguo":"UO032","nuevo":"UO038", "temporal":30},
            {"antiguo":"UO033","nuevo":"UO026", "temporal":31},
            {"antiguo":"UO034","nuevo":"UNF013", "temporal":32},
            {"antiguo":"UO035","nuevo":"UO006", "temporal":33},
            {"antiguo":"UO036","nuevo":"UO004", "temporal":34},
            {"antiguo":"UO037","nuevo":"UNF019", "temporal":35},
            {"antiguo":"UO038","nuevo":"UNF019", "temporal":36},
            {"antiguo":"UO039","nuevo":"UO030", "temporal":37},
            {"antiguo":"UO040","nuevo":"UO024", "temporal":38},
            {"antiguo":"UO041","nuevo":"UO022", "temporal":40},
            {"antiguo":"UO042","nuevo":"UO029", "temporal":41},
            {"antiguo":"UO043","nuevo":"UO016", "temporal":42},
            {"antiguo":"UO044","nuevo":"UNF005", "temporal":43},
            {"antiguo":"UO045","nuevo":"UO041", "temporal":44},
            {"antiguo":"UO050","nuevo":"UNF022", "temporal":45},
            {"antiguo":"UO051","nuevo":"UO013", "temporal":46},
            {"antiguo":"UO052","nuevo":"UO003", "temporal":47},
            {"antiguo":"UO053","nuevo":"UO034", "temporal":48},
            {"antiguo":"UO054","nuevo":"UNF017", "temporal":49},
            {"antiguo":"UO055","nuevo":"UO037", "temporal":50},
            {"antiguo":"UO056","nuevo":"UO036", "temporal":51},
            {"antiguo":"UO057","nuevo":"UNF015", "temporal":52},
            {"antiguo":"UNF001","nuevo":"UNF031", "temporal":53},
            {"antiguo":"UNF002","nuevo":"UNF032", "temporal":54},
            {"antiguo":"UNF003","nuevo":"UNF016", "temporal":55},
            {"antiguo":"UNF004","nuevo":"UNF012", "temporal":56},
            {"antiguo":"UNF005","nuevo":"UNF014", "temporal":57},
            {"antiguo":"UNF006","nuevo":"UNF033", "temporal":58},
            {"antiguo":"UNF007","nuevo":"UNF034", "temporal":59},
            {"antiguo":"UNF009","nuevo":"UNF035", "temporal":60},
            {"antiguo":"UNF010","nuevo":"UO006", "temporal":61},
            {"antiguo":"UNF012","nuevo":"UNF029", "temporal":62},
            {"antiguo":"UNF013","nuevo":"UNF036", "temporal":63},
            {"antiguo":"UNF014","nuevo":"UNF037", "temporal":64},
            {"antiguo":"UNF015","nuevo":"UNF038", "temporal":65},
            {"antiguo":"UNF016","nuevo":"UNF026", "temporal":66},
            {"antiguo":"UNF017","nuevo":"UNF023", "temporal":67},
            {"antiguo":"UNF018","nuevo":"UNF024", "temporal":68},
            {"antiguo":"UNF019","nuevo":"UO017", "temporal":69},
            {"antiguo":"UN058","nuevo":"UNF004", "temporal":70},
            {"antiguo":"UO058","nuevo":"UNF040", "temporal":71}]

        ';

        $json_obj = json_decode($string);

        foreach($json_obj as $item) {
            $this->Almacen_model->corregirCodigo($item->antiguo, $item->temporal);
            echo $item->antiguo . $item->temporal;
        }

        echo "sucess<br>";

        foreach($json_obj as $item) {
            echo"one tiem";
            echo ($this->Almacen_model->corregirCodigo($item->temporal, $item->nuevo));
        }

        echo "sucess 2";
    }
    
}
