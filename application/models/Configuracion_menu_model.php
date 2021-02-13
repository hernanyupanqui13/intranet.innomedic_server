<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Configuracion_menu_model extends CI_Model
{ 
	
	function __construct()
	{
		parent::__construct();
	}

	public function perfil()
	{
		$query = $this->db->query("select * from ts_perfil_users order by Id asc");
		return $query->result();
	}
	public function menu()
	{
		$query = $this->db->query("select * from ts_menu order by Id asc");
		return $query->result();
	}
	public function lista_accesos($perfil)
	{
		$query = $this->db->query("select *,
			(select icono from ts_menu where Id=a.menu) as iconox,
			(select perfil from ts_perfil_users where Id=a.perfil) as perfilx,
			(select nombre from ts_menu where Id=a.menu) as menux,
			(select url from ts_menu where Id=a.menu) as urlx
			 from ts_menu_items a where perfil ='".$perfil."' order by Id asc");
		return $query->result();
	
	}

	public function eliminar_datos_idx($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ts_menu_items");
	}

	public function insert_data($data)
	{
		$this->db->insert("ts_menu_items",$data);
	}





} ?>