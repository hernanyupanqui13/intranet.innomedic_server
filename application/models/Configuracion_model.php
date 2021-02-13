<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */ 
class Configuracion_model extends CI_Model
{ 
	
	function __construct()
	{
		parent::__construct();
	}

	public function configuracion_usuarios_x($url)
	{
		$query = $this->db->query("select *,
			(select distrito from ts_distrito where Id=id_distrito) as distrito,
			(select departamento from ts_departamento where Id=id_departamento) as departamento,
            (select provincia from ts_provincia where Id=id_provincia) as provincia,
            (select nombre from ts_rubro where Id=id_rubro) as rubro
                         from ts_empresas where url='".$url."'");
		return $query->result();
	}

	public function actualizar_usuario_x_empresa($id, $data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_usuario",$data);
	}

	public function actualizar_usuario_x_empresa_x($idxx,$data_empresa)
	{
		$this->db->where("id_usuario",$idxx);
		$this->db->update("ts_empresas",$data_empresa);
	}





	// de aqui abajo es de empleado
	public function configuracion_usuarios_empleado($url)
	{
		$query = $this->db->query("select *,(select usuario from ts_usuario where Id=id_usuario) as usuario
		 from ts_datos_personales where url='".$url."'");
		return $query->result();
	}

	public function actualizar_usuario_x_empleado_x($id, $data)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_usuario",$data);
	}

	public function actualizar_usuario_x_empleado_xx($idxx,$data_empresa)
	{
		$this->db->where("id_usuario",$idxx);
		$this->db->update("ts_datos_personales",$data_empresa);
	}


} ?>