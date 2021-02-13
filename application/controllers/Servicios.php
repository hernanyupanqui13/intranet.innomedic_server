<?php defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');/**

 * 
 */
class Servicios extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model('Servicio_model');
	}

	public function index()
	{
		$data = array(
			'title' =>array("Nuestros Servicios | Innomedic | Servicios de salud ocupacional"),
			'service' => $this->Servicio_model->service(),
		);

		$this->load->view('principal/head',$data);
		$this->load->view('servicios/index',$data);
		$this->load->view('principal/footer',$data);
	}


	public function cantidad_registro()
	{

		$query = $this->db->query("select *,count(*) as total from t_visitas");

        foreach($query->result_array() as $row){
            echo $row['total'];
        } 


		
	}


} ?>