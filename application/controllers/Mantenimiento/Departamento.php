<?php /**
 * 
 */
class Departamento extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
	}

	public function index()
	{
		$data = array(
			'title' =>array("estas viendo Departamento","Lista de Departamentos","Agregar Departamento","Evaristo Escudero Huillcamascco"),
		);

		$this->load->view("diseno/head",$data);
		$this->load->view("diseno/title",$data);
		$this->load->view("diseno/footer");
	}
} ?>