<?php /**
 * 
 */
class Cotizacion_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function fetch_single_user($user_id)  
	{  
	       $this->db->where("Id", $user_id);  
	       $query=$this->db->get('t_cita');  
	       return $query->result();  
	} 

	public function cargar_cita_online()
	{
		$query = $this->db->query("SELECT * FROM t_cita WHERE LEFT(date,10)=CURDATE() ORDER BY date");
		return $query->result();
	}

	public function get_products($limit, $offset, $search, $count)
	{
		$this->db->select('*');
		$this->db->from('t_cita');
		if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->db->where("name LIKE '%$keyword%'");
			}
		}
		if($count){
			return $this->db->count_all_results();
		}
		else {
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		return array();
	}

} ?>