<?php /**
 * 
 */
class Nosotros_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function process_booking1($data)
	{
		$this->db->insert("t_cita",$data);
	}
 

	public function lista_ventajas_mas()
	{
		$query = $this->db->query("select * from t_ventajas limit 7,50 ");
		return $query->result();
	}
	public function lista7_areas()
	{
		$query = $this->db->query("select * from t_ventajas limit 0,7");
		return $query->result();
	}

	public function consultoriasname()
	{
		$query = $this->db->query("select * from t_consultorias");
		return $query->result();
	}
	public function oficina_view()
	{
		$query = $this->db->query("select * from t_oficina");
		return $query->result();
	}
	public function t_employe_view()
	{
		$query = $this->db->query("select * from th_employe");
		return $query->result();
	}
	public function lista_valores()
	{
		$query = $this->db->query("select * from t_valores");
		return $query->result();
	}
	
	public function gallery()
	{
		$query = $this->db->query("select * from t_gallery");
		return $query->result();
	}

	public function obtener_valores()
	{
		$query = $this->db->query("select * from t_valores");
		return $query->result();
	}
} ?>