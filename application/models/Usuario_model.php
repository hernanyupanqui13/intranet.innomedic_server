<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	 /**
 * 
 */
class Usuario_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function publicidad()  
	{

		$query = $this->db->query('select * from publicidad order by Id DESC LIMIT 1');
		return $query->result(); 
	}


	 public function insert($data = array()){
	 	$this->tableName = 'ts_usuario';
        $this->primaryKey = 'Id';
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

    public function insert_ts_datos_personales($data_xx)
    {
    	$this->db->insert("ts_datos_personales",$data_xx);
    	return $this->db->insert_id();
    	
    }

	public function id_perfil()
	{
		$data = $this->db->get('ts_perfil_users');
		if (empty($data)) {
			return false;
		}else{
			return $data->result();
		}
	}

	public function id_sexo()
	{
		$data = $this->db->get('ts_genero');
		if (!isset($data)) { 
			return false;
		}else{
			return $data->result();
		}
	}

	public function mostrar_users()
	{

		$query = $this->db->query("select *,(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,
			(select genero from ts_genero where Id=id_genero) as txtgenero,
			(select Id from ts_usuario where Id=id_usuario) as Idx,
			TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
			(select 
	        CASE
	            WHEN genero = 'Masculino' THEN 'varon.png'
	            WHEN genero = 'Femenino' THEN 'mujer.png'
	            WHEN genero = 'Preguntame' THEN 'medio.png'
	            ELSE 'distinto.png'
	        END
	         from ts_genero where Id=id_genero) as id_otros
 from ts_datos_personales where id_usuario_statico = 1 ");
		//WHERE not estado=3 esto es para que no muestre el estado 3 del usuario
		if (!isset($query)) {
			return false;
		}else{
			return $query->result();
		}

	}

	public function show_users($id)
	{
		$query=$this->db->query("select *,(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,(select genero from ts_genero where Id=id_genero) as txtgenero,
			TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
			(select usuario from ts_usuario where Id=id_usuario) as usuario_txt
 			from ts_datos_personales where id_usuario='".$id."' ");
		if (empty($query)) {
			return false;
		}else{
			return $query->result();
		}
	}

	/*
		function model ::: update users 
	*/

	public function update($id)
	{
		$query=$this->db->query("select *,(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,(select genero from ts_genero where Id=id_genero) as txtgenero,
			TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
			(select usuario from ts_usuario where Id=id_usuario) as usuario_txt
 			from ts_datos_personales where id_usuario='".$id."'");
		if (empty($query)) {
			return false;
		}else{
			return $query->result();
		}
	}

	public function genero()
	{
		$query = $this->db->query("select * from ts_genero");
		if (!isset($query)) {
			return false;
		}else{
			return $query->result();
		}
	}


	public function data_actualizar($id,$data)
	{

		$this->db->where('Id',$id);
		$this->db->update('ts_usuario',$data);
		
	}

	public function data_actualizar_cliente($id,$datax)
	{
		$this->db->where('id_usuario',$id);
		$this->db->update('ts_datos_personales',$datax);
	}

	public function data_actualizar_imagen($id,$imagen)
	{
		$dat = array(
			'imagen' =>$imagen ,
		);
		$this->db->where('Id',$id);
		$this->db->update('ts_datos_personales',$dat);
	}

	//eliminar imagen anteriro por Id usuario
	public function elimina_imagen_anterior_id_usuario($idxx)
	{
		$query_xx = $this->db->query("select * from ts_datos_personales where id_usuario = ".$idxx."");
        foreach ($query_xx->result() as $xx)
        {
            $imagen =   $xx->imagen;
        }
        /*    
        $row = $query->row();
        */
        if($imagen!=''){ // cuando es mayor que vacio o cero
            //unlink('./assetsfrom/'.$imagen);
            unlink('./upload/images/'.$imagen);
        }else{
            echo "";            
        }
	}

	public function elimina_imagen_anterior($id)
	{
		 $query = $this->db->query("select * from ts_datos_personales where Id='".$id."'");
        foreach ($query->result() as $x)
        {
            $imagen =   $x->imagen;
        }
        /*    
        $row = $query->row();
        */
        if($imagen!=''){ // cuando es mayor que vacio o cero
            //unlink('./assetsfrom/'.$imagen);
            unlink('./upload/images/'.$imagen);
        }else{
            echo "";            
        }
	}

	public function update_users($datos,$id)
	{
		$this->db->where('Id',$id);
		$this->db->update('ts_usuario',$datos);

		
	}


	public function update_users_datos_personales($data_datos_users,$id)
	{
		$this->db->where('id_usuario',$id);
		$this->db->update('ts_datos_personales',$data_datos_users);
	}
	//cambiar clave

	public function update_clave_users($datos,$id)
	{
		$this->db->where('Id',$id);
		$this->db->update('ts_usuario',$datos);
	}

	public function perfil_list()
	{
		$query =$this->db->get('ts_perfil_users');
		return $query->result();
	}

	public function list_status()
	{
		$query=$this->db->query("select * from ts_variable where codigo='1'");
		return $query->result();
	}

	/**eliminacion de usuario de todo los registros**/

	//Eliminar ts_usuario
	public function eliminar_usuario($id)
	{
		//$query = $this->db->query("delete from ts_usuario ")
		$this->db->where("Id", $id);  
        $this->db->delete("ts_usuario");
	}

	//Eliminar ts_datos_personales
	public function eliminar_datos_personales($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_datos_personales");
	}

	//Eliminar ts_datos_educacion_superior
	public function ts_datos_educacion_superior($vid)
	{
		$this->db->where("id_usuario", $vid);  
        $this->db->delete("ts_datos_educacion_superior");
	}

	//Eliminar ts_datos_familiares
	public function eliminar_data_datos_familiares($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_datos_familiares");
	}

	//eliminar datos ts_regimen penetenciario

	public function eliminar_datos_regimen_penitenciario($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_datos_regimen_pensionario");
	}

	//eliminar datos salud

	public function eliminar_ts_datos_salud($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_datos_salud");
	}

	//eliminar datos formacion academica
	public function eliminar_ts_datos_formacion_academica($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_datos_formacion_academica");
	}

	//eliminar _ts_datos_referentes

	public function eliminar_ts_datos_referentes($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_datos_referentes");
	}
	//eliminar datos desarrollo capacitacion
	public function eliminar_ts_desarrollo_capacitacion($id)
	{
		$this->db->where("id_usuario", $id);  
        $this->db->delete("ts_desarrollo_capacitacion");
	}
	//eliminar desarrollar
	public function eliminar_ts_desarrollo_capacitacion_archivo($id)
	{
		$query = $this->db->query("select * from ts_desarrollo_capacitacion where id_usuario='".$id."'");
        foreach ($query->result() as $x)
        {
            $imagen =   $x->archivo;
        }
        /*    
        $row = $query->row();
        */
        if($imagen!=''){ // cuando es mayor que vacio o cero
            //unlink('./assetsfrom/'.$imagen);
            unlink('./upload/archivos/'.$imagen);
        }else{
            echo "";            
        }
	}







	public function mi_perfil()
	{
		$query = $this->db->query("select * from ts_usuario where Id ='".$this->session->userdata('session_id')."'");
		return $query->result();

	}

	public function nombre_empresa()
	{
		$query = $this->db->query("select *, empresa as txtempresa from ts_usuario where Id='".$this->session->userdata('session_id')."'");
		return $query->result();
	}
	public function actualizar_empresa_id_empresa($data,$id)
	{
		$this->db->where('Id',$id);
		$this->db->update('ts_usuario',$datos);
	}


	//regimen penetenciario

	public function insert_ts_datos_regimen_penetenciario($data_regimen)
	{
		$this->db->insert("ts_datos_regimen_pensionario",$data_regimen);
	}

	//salud

	public function insert_ts_datos_salud($data_salud)
	{
		$this->db->insert("ts_datos_salud",$data_salud);
	}

	
	//ts_datos_familiares

	public function insert_data_datos_familiares($data_datos_familiares)
	{
		$this->db->insert("ts_datos_familiares",$data_datos_familiares);
	}




	//importar pdf
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Observacion  de datos fallidos

	public function generate_pdf_users($url)
	{
		$query = $this->db->query("select *,
(select departamento from ts_departamento where Id=id_departamento) as departamento,
(select provincia from ts_provincia where Id=id_provincia) as provincia,
		(select distrito from ts_distrito where Id=id_distrito) as distrito,
			TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
		(select genero from ts_genero where Id=id_genero) as txtgenero,
		(select civil from ts_estado_civil where Id=id_estado) as txt_civil, 
		(select departamento from ts_departamento where Id=id_lugar_nacimiento_dep) as lugar_nacimiento,
			(select regimen from ts_datos_regimen_pensionario where id_datos_personales=a.Id) as pension,
			(select id_tipo_emfermedad from ts_datos_salud where id_datos_personales=a.Id) as salud
 from ts_datos_personales a where url='".$url."'");
		return $query->result();
	}

	public function lista_registro_familiares_parentesco($url)
	{
		$query = $this->db->query("select *,(select civil from ts_estado_civil where Id=e.id_estado_civil) as txt_civil
		 from ts_datos_referentes e where url='".$url."' ");
		return $query->result();
	}

	public function ts_datos_formacion_academica($urlx)
	{
		$query = $this->db->query("select * from ts_datos_formacion_academica where url='".$urlx."'");
		return $query->result();
	}

	public function ts_datos_educacion_superiorxx($urlxx)
	{
		$query = $this->db->query("select *,(select especialidad from ts_datos_especialidad where Id=e.especialidad) as especialidadtxt,
			(select nombre from ts_datos_uni_tec where Id=e.centro_estudios) as centro_estudiostxt,
			(select nombre from ts_grado_academico where Id=e.grado_academica) as grado_academicatxt
		 from ts_datos_educacion_superior e where url='".$urlxx."' ");
		return $query->result();
	}

	public function ts_datos_ediomasxx($urlxxx)
	{
		$query = $this->db->query("select *,(select ediomas from ts_ediomas_cat where Id=e.ediomas_id) as ediomas_idx,
			(select nombre from ts_variable where id_codigo=e.nivel_id and codigo=2) as nivel_idx
		 from ts_ediomas e where url='".$urlxxx."'  order by Id desc");
		return $query->result();
	}
	public function ts_datos_experiencia_laboral($urlxxxx)
	{
		$query = $this->db->query("select *,TIMESTAMPDIFF(MONTH,fecha_inicio, fecha_fin) as totaltxt from ts_experiencia_laboral  where url='".$urlxxxx."' order by Id desc ");
		return $query->result();
	}
	public function ts_datos_desarrollo_capacitacionxx($urlxxxxx)
	{
		$query = $this->db->query("select e.*,TIMESTAMPDIFF(MONTH,e.fecha_inicio, e.fecha_fin) as totaltxt from ts_desarrollo_capacitacion e  where url='".$urlxxxxx."' LIMIT 3");
		return $query->result();
	}
	public function cuenta($url)
	{
		$query= $this->db->query("select * ,count(url) as counta from ts_desarrollo_capacitacion where url='".$url."'");
		return $query->result();
	}


	//ts_puesto lñiostar

	public function listar_ts_puesto_xx($postData)
	{
		$response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombre like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_puesto')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->nombre,"label"=>$row->nombre);
       }

     }

     return $response;
	}


	public function listar_ts_areas_xx($postData)
	{
		$response = array();

     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombre like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_areas')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->nombre,"label"=>$row->nombre);
       }

     }

     return $response;
	}

	public function tipo_enfermedades($url)
	{
		$query = $this->db->query("select * from ts_datos_salud where url='".$url."'");
		return $query->result();
	}




} ?> 