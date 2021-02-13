<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Ficha_personal_model extends CI_Model
{
	
	function __construct()		
	{ 
		parent::__construct();
	}

	public function estado_civil()		
	{
		$query = $this->db->get("ts_estado_civil");
		return $query->result();
	}

	function lista_departamento_x($postData){

     $response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("departamento like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_departamento')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->Id,"label"=>$row->departamento);
       }

     }

     return $response;
  } 

  public function inserdatospersonales($id,$data)
  {
      $this->db->where("id_usuario",$id);
  		$this->db->update("ts_datos_personales",$data);
  }

  public function actualizar_datos_usuario($id_user,$data_users)
  {
      $this->db->where("Id",$id_user);
      $this->db->update("ts_usuario",$data_users);
  }


  	public function data_ficha_personal()
  	{
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
  		$query = $this->db->query("select *,(
  			select departamento from ts_departamento where Id=id_departamento) as departamento,
        (select 
        CASE
            WHEN genero = 'Masculino' THEN 'varon.png'
            WHEN genero = 'Femenino' THEN 'mujer.png'
            WHEN genero = 'Preguntame' THEN 'medio.png'
            ELSE 'distinto.png'
        END
         from ts_genero where Id=id_genero) as id_otros,
  			(select provincia from ts_provincia where Id=id_provincia) as provincia,
  			(select distrito from ts_distrito where Id=id_distrito) as distrito,
        (select civil from ts_estado_civil where Id=id_estado ) as estado_civil,
        (select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as nacimiento,
        DATE_FORMAT(fecha_nacimiento,'%d de %M %Y') AS fecha_nac_dia
  			from ts_datos_personales where id_usuario=".$this->session->userdata("session_id")."");
  		return $query->result();
  	}

    public function datos_familiares()
    {
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ts_datos_familiares where id_usuario=".$this->session->userdata("session_id")."");
      return $query->result();
    }

    public function datos_referentes()
    {
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ts_datos_referentes where id_usuario=".$this->session->userdata("session_id")."");
      return $query->result();
    }

    public function update_crud($user_id, $data)  
      {  
           $this->db->where("Id", $user_id);  
           $this->db->update("ts_datos_referentes", $data);  
      }   


 

    public function eliminar_datos_referentes($id)
    {
      $this->db->where("Id",$id);
      $this->db->delete("ts_datos_referentes");
    }


  public function fetch_single_user($user_id)  
    {  
        /* $this->db->where("Id", $user_id);  
         $query=$this->db->get('ts_datos_referentes');  
         return $query->result();  */

      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select *,(select civil from ts_estado_civil where Id=id_estado_civil) as estado,
        CASE WHEN vive = 1 THEN 'SI'
        WHEN vive = 2 THEN 'NO'
        ELSE 'N/A'
        END AS vive_x
from ts_datos_referentes where Id=".$user_id."");
      return $query->result();
    } 


    public function actualizar_campos()
    {
      $query = $this->db->get("ts_datos_personales");
    return $query->result();
    }



    //actualizar imagen
    //
    //
    public function data_actualizar_imagen($id,$imagen)
    {
      $dat = array(
        'imagen' =>$imagen,
      );
      $this->db->where('id_usuario',$id);
      $this->db->update('ts_datos_personales',$dat);
    }

    public function elimina_imagen_anterior($id)
    {
       $query = $this->db->query("select * from ts_datos_personales where id_usuario='".$id."'");
          foreach ($query->result() as $x)
          {
              $imagenx =   $x->imagen;
          }
          /*    
          $row = $query->row();
          */
          if($imagenx!=''){ // cuando es mayor que vacio o cero
              //unlink('./assets/'.$imagen);
              unlink('upload/images/'.$imagenx);
          }else{
              echo "";            
          }
    }

        //insertamos los datos de for de array
       function insertar_datos_xxxx($data){

            $this->db->insert('ts_datos_referentes',$data); 
            
        }
          


        public function datos_familiares_updating_id($id,$data)
        {
          $this->db->where("id_usuario",$id);
          $this->db->update("ts_datos_familiares",$data);
        }


        //salud
        



      public function lista_de_salud($user_id)
      {
      $query = $this->db->query("SET lc_time_names = 'es_PE'");
      $query = $this->db->query("select * from ts_datos_salud where id_usuario=".$user_id."");
      return $query->result();
      }

      public function Insertar_data($id_usuario_xx,$data)
      {
        $this->db->where("id_usuario",$id_usuario_xx);
        $this->db->update('ts_datos_salud', $data); 
        //$this->db->insert_batch('ts_datos_salud', $data); 
      }

      //obtener emfermedades

      function Obetener_registros($postData){

       $response = array();

       if(isset($postData['search']) ){
         // Select record
         $this->db->select('*');
         $this->db->where("nombre like '%".$postData['search']."%' ");

         $records = $this->db->get('ts_enfermedades')->result();

         foreach($records as $row ){
            $response[] = array("value"=>$row->nombre,"label"=>$row->nombre);
         }

       }

       return $response;
    }



    public function getDatosPersonalesImpr($id) {
      $query = $this->db->query(
        "SELECT *,(select departamento from ts_departamento where Id=id_departamento) AS departamento,
          imagen,


            CASE
              WHEN id_genero ='1' THEN 'Masculino'
              WHEN id_genero = '2' THEN 'Femenino'
            END AS genero,  

          (select provincia from ts_provincia where Id=id_provincia) as provincia,
          (select distrito from ts_distrito where Id=id_distrito) as distrito,
          (select civil from ts_estado_civil where Id=id_estado ) as estado_civil,
          (select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as nacimiento,
        DATE_FORMAT(fecha_nacimiento,'%d de %M %Y') AS fecha_nac_dia
  			FROM ts_datos_personales where id_usuario=$id");
      
      return $query->row();
    }

    public function getUserSimpleData($id){
      $query = $this->db->query(
        "SELECT ");
    }
} ?>