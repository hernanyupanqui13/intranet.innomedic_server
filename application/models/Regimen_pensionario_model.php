<?php /**
 * 
 */
class Regimen_pensionario_model extends CI_Model
{
	
	function __construct()		
	{
		parent::__construct();
	}

	public function lista_pensionario_regimen()
	{
		$query = $this->db->query("select * from ts_datos_regimen_pensionario where id_usuario=".$this->session->userdata("session_id")."");
		return $query->result();
	}

	public function update_regimen($id,$data)
	{
		$this->db->where("id_usuario",$id);
		$this->db->update("ts_datos_regimen_pensionario",$data);
	}

	public function ts_datos_enfermedades()
	{
		$query = $this->db->query("select * from ts_datos_salud where id_usuario=".$this->session->userdata("session_id")."");
		return $query->result();
	}

	public function lista_de_salud($user_id)
	  {
	  $query = $this->db->query("SET lc_time_names = 'es_PE'");
	  $query = $this->db->query("select * from ts_datos_salud where id_usuario=".$user_id."");
	  return $query->result();
	  }
	
} ?>