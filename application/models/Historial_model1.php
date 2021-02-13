<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * 
  */
 class Historial_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function lista_historia_registro_x_usuario()
 	{
 		$query = $this->db->query("select * from ts_historial_registro order by ID desc");
 		return $query->result();
 	}

 	public function agregar_registrar_historial($data)
 	{
 		$this->db->insert("ts_historial_registro",$data);
 	}

 	
 } ?>