<?php  defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Ediomas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function Cargar_ediomas()
	{
		$query = $this->db->query("	select *,
			(select ediomas from ts_ediomas_cat where Id=ediomas_id) as ediomas,
			(select imagen from ts_ediomas_cat where Id=ediomas_id) as imagen,
			(select nombre from ts_variable where id_codigo=nivel_id and codigo=2) as categoria from ts_ediomas where id_usuario=".$this->session->userdata("session_id")."");
		return $query->result();
	}

	public function edioma()
	{
		$query = $this->db->query("select * from ts_ediomas_cat");
		return $query->result();
	}

	public function tipo_nivel()
	{
		$query = $this->db->query("select * from ts_variable where codigo =2");
		return $query->result();
	}

	public function Insert_ediomas($data)
	{
		$this->db->insert("ts_ediomas",$data);
	}

	public function Eliminar_Ediomas($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ts_ediomas");
	}
} ?>