<?php /**
 * 	
 */
class Experiencia_laboral_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function Cargar_Experiencia_laboral()
	{
		$query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,IFNULL(telefono,'Falta Asignar') AS telefono,
		IFNULL(direccion,'Falta Asignar Dirección') AS direccion,
		IFNULL(motivo_cese,'---') AS motivo_cese,
		IFNULL(descripcion_laboral,'---') AS descripcion_laboral,
		DATE_FORMAT(fecha_inicio,'%d de %M %Y') AS fecha_txt,
		DATE_FORMAT(fecha_fin,'%d de %M %Y') AS fecha_txt_fin,
		TIMESTAMPDIFF(MONTH,fecha_inicio, fecha_fin) as totaltxt
		 from ts_experiencia_laboral where id_usuario=".$this->session->userdata("session_id")."");
		if (!empty($query)=="") {
			return false;
		}else{
			return $query->result();
		}
	}
	public function Eliminar_experiencia_laboral($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ts_experiencia_laboral");
	}

	public function Insert_experiencia_laboral($data)
	{
	
		$this->db->insert("ts_experiencia_laboral",$data);

	}

	public function fetch_single_user_experience($user_id)  
    {  
        
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ts_experiencia_laboral where Id=".$user_id."");
      return $query->result();
    } 

    public function user_action_experience_update($id,$data)
    {
    	$this->db->where("Id",$id);
    	$this->db->update("ts_experiencia_laboral",$data);
    }


} ?>