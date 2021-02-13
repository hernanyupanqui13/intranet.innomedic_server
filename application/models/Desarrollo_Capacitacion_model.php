<?php /**
 * 	 
 */
class Desarrollo_Capacitacion_model extends CI_Model
{ 
	
	function __construct()
	{
		parent::__construct();

	}

	public function Desarrollo_Capacitacion_view()
	{
		$query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,
		IFNULL(curso,'---') AS curso,
		DATE_FORMAT(fecha_inicio,'%d de %M %Y') AS fecha_txt,
		DATE_FORMAT(fecha_fin,'%d de %M %Y') AS fecha_txt_fin,
		TIMESTAMPDIFF(MONTH,fecha_inicio, fecha_fin) as totaltxt
		 from ts_desarrollo_capacitacion where id_usuario=".$this->session->userdata("session_id")." and estado=1");
		if (!empty($query)=="") {
			return false;
		}else{
			return $query->result();
		}
	}
	public function Eliminar_Desarrollo_Capacitacion_id($id)
	{
		$this->db->where("Id",$id);
		$this->db->delete("ts_desarrollo_capacitacion"); 
	}

	public function Insert_desarrollo_capacitacion($data)
	{
	
		$this->db->insert("ts_desarrollo_capacitacion",$data);

	}

	public function fetch_single_user_experience($user_id)  
    {  
        
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ts_desarrollo_capacitacion where Id=".$user_id."");
      return $query->result();
    } 

    public function user_action_experience_update($id,$data)
    {
    	$this->db->where("Id",$id);
    	$this->db->update("ts_desarrollo_capacitacion",$data);
    } 

    public function elimina_imagen_anterior($id)
	{
		 $query = $this->db->query("select * from ts_desarrollo_capacitacion where Id='".$id."'");
        foreach ($query->result() as $x)
        {
            $imagenx =   $x->archivo;
        }
        /*    
        $row = $query->row();
        */
        if($imagenx!=''){ // cuando es mayor que vacio o cero
           // unlink('assets/'.$imagenx);
            unlink('upload/archivos/'.$imagenx);
        }else{
            echo "";            
        }
	}

	

	public function update_crud($user_id, $data)  
      {  
           $this->db->where("Id", $user_id);  
           $this->db->update("ts_desarrollo_capacitacion", $data);  
      }

    public function update_crud_x($user_id, $data)  
    {  
        $this->db->where("Id", $user_id);  
        $this->db->update("ts_desarrollo_capacitacion", $data);  
    }


    public function elimina_imagen_anterior_true($id)
	{
		$query_data = $this->db->query("select * from ts_desarrollo_capacitacion where Id='".$id."'");
	        foreach ($query_data->result() as $xx)
	        {
	            $imagenxx =  $xx->archivo;
	        }
	        /*    
	        $row = $query->row();
	        */
	        if($imagenxx!=''){ // cuando es mayor que vacio o cero
	           // unlink('assets/'.$imagenx);
	            unlink('upload/archivos/'.$imagenxx);
	        }else{
	            echo "";            
	        }
	} 


} ?>