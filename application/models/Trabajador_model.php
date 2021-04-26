<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Trabajador_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	} 

	public function mostrar_users()
	{
       $query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query(
			"SELECT apellido_paterno, apellido_materno, nombres, 
				nro_documento, email,`status`, imagen,puesto,
				DATE_FORMAT(fecha_ingreso,'%W %d de %M %Y') AS fecha_ingresoxx,
				(select perfil from ts_perfil_users where Id=id_perfil) as txtperfil,
				(select genero from ts_genero where Id=id_genero) as txtgenero,
				(select Id from ts_usuario where Id=id_usuario) as Idx,
				(select 
				CASE 
					WHEN genero = 'Masculino' THEN 'varon.png'
					WHEN genero = 'Femenino' THEN 'mujer.png'
					WHEN genero = 'Preguntame' THEN 'medio.png'
					ELSE 'distinto.png'
				END FROM ts_genero where Id=id_genero) AS id_otros

			FROM ts_datos_personales 
			WHERE id_usuario_statico = 1 AND `status`=1 
			ORDER BY apellido_paterno ASC"
		);

		//WHERE not estado=3 esto es para que no muestre el estado 3 del usuario
		if (!isset($query)) {
			return false;
		}else{
			return $query->result();
		}
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

	public function ultimo_registrado($id)
	{   $query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,concat(apellido_paterno,' ',apellido_materno,' ', nombre) as nombres, DATE_FORMAT(fecha_ingreso_sistema,'%d de %M %Y' ' ' '%r' ) AS fecha_txt from ts_usuario where Id='".$id."'");
		//return $query->result();
		foreach ($query->result() as $xx) {
			$output["nombres"]  =    $xx->nombres;
			$output["fecha_ingreso_sistema"]   = $xx->fecha_txt;
		}
		return $output;

	}

	public function Mostrar_datos_para_actualiozar_xx($id)
	{
		$query = $this->db->query(
			"SELECT *,concat(apellido_paterno,' ',apellido_materno,' ', nombres) AS nombre, 
				email AS correo, 
				ts_sexo.nombre AS genero,
				(select usuario from ts_usuario where ts_usuario.Id = a.Id) AS el_usuario,
				(select clave from ts_usuario where ts_usuario.Id = a.Id) AS la_clave,
				(select clave_repeat from ts_usuario where ts_usuario.Id = a.Id) AS la_clave_repeat,
				(select id_perfil from ts_usuario where ts_usuario.Id = a.Id) AS el_id_perfil
			FROM ts_datos_personales a 
				INNER JOIN ts_sexo 
					ON ts_sexo.Id = a.id_genero				
			WHERE id_usuario='".$id."'"
		);



		//return $query->result();
		/*foreach ($query->result() as $xx) {
			
			$output["nombre"]  =    $xx->nombres;
			$output["puesto"]  =    $xx->puesto;
			$output["correo"]  =    $xx->email;
			$output["status"]  =    $xx->status;
			$output["id_usuario"]  =    $xx->id_usuario;
			$output["fecha_ingreso"]  =    $xx->fecha_ingreso;
			
		}*/
		return $query->row();
	}

	public function actualizar_area_emaail_puesto($id_usuario,$data)
	{
		

		$this->db->where("id_usuario",$id_usuario);
		$this->db->update("ts_datos_personales",$data);
	}
	/*
	Actualiza los datos de una cuenta de usuario incluyendo contraseña
	Actualiza contraseña solo si tiene permisos de Administrador
	*/
	public function actualizarDataOnTsUsuario($id_usuario,$t_suaurio)
	{
		// Guardando al contraseña nueva
		$clave_nueva = $t_suaurio["clave"];

		// Pbteniendo la contraseña actual de la base de datos
		$query = $this->db->query("SELECT clave
			FROM ts_usuario 
			WHERE Id = $id_usuario
		");
		$clave_antigua = $query->row()->clave;

		// Cambiamos la contraseña solo si es que no es la misma que mostramos
		if($clave_antigua != $clave_nueva) {
			$t_suaurio["clave"] = md5($clave_nueva);
		}

		// Subiendo los cambios a la base de datos
		$this->db->where("Id",$id_usuario);
		$this->db->update("ts_usuario",$t_suaurio);
	}

	//aqui mostramos los trabajadores cesados
	public function mostrar_users_cesados() {
		$query = $this->db->query(
			"SELECT *,(SELECT perfil FROM ts_perfil_users WHERE Id=id_perfil) AS txtperfil,
				(SELECT genero FROM ts_genero WHERE Id=id_genero) AS txtgenero,
				(SELECT Id from ts_usuario where Id=id_usuario) as Idx,
				(SELECT usuario from ts_usuario where Id=id_usuario) as usuario,
				TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
				(SELECT 
					CASE
						WHEN genero = 'Masculino' THEN 'varon.png'
						WHEN genero = 'Femenino' THEN 'mujer.png'
						WHEN genero = 'Preguntame' THEN 'medio.png'
						ELSE 'distinto.png'
					END
				FROM ts_genero where Id=id_genero) AS id_otros
 			FROM ts_datos_personales 
			WHERE id_usuario_statico = 1 AND STATUS=2
			ORDER BY apellido_paterno"
		);


		//WHERE not estado=3 esto es para que no muestre el estado 3 del usuario

		if (!isset($query)) {
			return false;
		}else{
			return $query->result();
		}
	}

} ?>