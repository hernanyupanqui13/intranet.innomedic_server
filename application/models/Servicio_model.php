<?php /**
 * 
 */
class Servicio_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function service()
	{
		$query = $this->db->query("select * from t_view_service");
		return  $query->result();
	}
} ?>