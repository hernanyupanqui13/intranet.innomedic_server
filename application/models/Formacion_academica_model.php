<?php /**
 * 
 */
class Formacion_academica_model extends CI_Model
{
	
	function __construct()			
	{
		parent::__construct(); 
	}

	public function insertar_datos($data)
	{
		$this->db->insert("ts_datos_formacion_academica",$data);
	}

	public function datos_formacion_academica()
	{
		$query = $this->db->query("select * from ts_datos_formacion_academica where id_usuario=".$this->session->userdata("session_id")."");
		return $query->result();
	}

	public function datos_formacion_superior()
	{
		$query = $this->db->query("select *,
			(select especialidad from ts_datos_especialidad where Id=a.especialidad) as especialidad_x,
			(select nombre from ts_datos_uni_tec where Id=a.centro_estudios) as centro_estudios_x,
			(select nombre from ts_grado_academico where Id=a.grado_academica) as grado_academico_x
			from ts_datos_educacion_superior a where id_usuario=".$this->session->userdata("session_id")."");
		return $query->result();
	}

	public function add_grado_academico($datas)
	{
		$this->db->insert("ts_datos_educacion_superior",$datas);
	}

  public function lista_universidad($postData)
  { 
    $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombre like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_datos_uni_tec')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Id,"label"=>$row->nombre);
       }

     }

     return $response;
  }


	function lista_colegios($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombre like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_colegios_peru')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Id,"label"=>$row->nombre);
       }

     }

     return $response;
  }

  public function lista_centro_estiudios($postData)
  {
  	$response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombre like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_datos_uni_tec')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Id,"label"=>$row->nombre);
       }

     }

     return $response;
  }

  public function grado_academico($postData)
  {
  	$response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombre like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_grado_academico')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->nombre,"label"=>$row->nombre);
       }

     }

     return $response;
  }
  

  public function lista_espcialidad($postData)
  {
  	 $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("especialidad like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_datos_especialidad')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Id,"label"=>$row->especialidad);
       }

     }

     return $response;
  }

  	public function eliminar_datos_referentes($id)
    {
      $this->db->where("Id",$id);
      $this->db->delete("ts_datos_formacion_academica");
    }

    public function eliminar_datos_idx($id)
    {
      $this->db->where("Id",$id);
      $this->db->delete("ts_datos_educacion_superior");
    }


    public function fetch_single_user($user_id)  
    {  
        

      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ts_datos_formacion_academica where Id=".$user_id."");
      return $query->result();
    } 

    public function fetch_single_user_superior($user_id)
    {
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select *,
      (select especialidad from ts_datos_especialidad where Id=a.especialidad) as especialidad_x,
      (select nombre from ts_datos_uni_tec where Id=a.centro_estudios) as centro_estudios_x,
      (select nombre from ts_grado_academico where Id=a.grado_academica) as grado_academico_x
      from ts_datos_educacion_superior  a where Id=".$user_id."");
      return $query->result();
    }

    public function user_action_update($id,$data)
    {
    	$this->db->where("Id",$id);
    	$this->db->update("ts_datos_formacion_academica",$data);
    }

    public function actualizar_datos_grado_superior($id,$data)
    {
      $this->db->where("Id",$id);
      $this->db->update("ts_datos_educacion_superior",$data);
    }
} ?>