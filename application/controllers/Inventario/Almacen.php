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
        $json_string ='
            [{"codigo":"MM01", "cantidad":	6},
            {"codigo":"MM02", "cantidad":	4},
            {"codigo":"MM03", "cantidad":	12},
            {"codigo":"MM04", "cantidad":	9},
            {"codigo":"MM05", "cantidad":	5},
            {"codigo":"MM06", "cantidad":	4},
            {"codigo":"MM07", "cantidad":	5},
            {"codigo":"MM08", "cantidad":	4},
            {"codigo":"MM09", "cantidad":	2},
            {"codigo":"MM10", "cantidad":	0},
            {"codigo":"MM11", "cantidad":	0},
            {"codigo":"MM12", "cantidad":	0},
            {"codigo":"MM13", "cantidad":	0},
            {"codigo":"MM14", "cantidad":	0},
            {"codigo":"MM15", "cantidad":	4},
            {"codigo":"MM16", "cantidad":	0},
            {"codigo":"MM17", "cantidad":	0},
            {"codigo":"MM18", "cantidad":	0},
            {"codigo":"MM19", "cantidad":	0},
            {"codigo":"MM20", "cantidad":	3},
            {"codigo":"MM21", "cantidad":	0}]

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

    function iframeTableEditor() {
        $data = array(
            'lista'  =>   $this->Almacen_model->lista(),
        );

        $this->load->view("inventario/iframe_table_editor", $data);
    }

    function almacenTableEditor() {

        $numero = array_keys($_POST["data"])[0];     // Valor de la columna numero. Es el identificador unico de cada row del DataTable

        $data = $_POST["data"][$numero];

        $producto = $data["producto"];
        $codigo_barra = $data["codigo_barra"];
        $stock = $data["stock"];

        switch ($_POST["action"]) {
            case 'edit':
                $this->Almacen_model->updateStockOfProduct($numero, $stock, $producto, $codigo_barra);
                echo json_encode(array("data"=> 
                    array(array(
                        "numero"=>$numero
                        , "producto"=> $producto
                        , "codigo_barra"=>$codigo_barra
                        , "stock"=>$stock)
                    )
                ));
                
                break;
            
            default:
                # code...
                break;
        }
    }
    
}
