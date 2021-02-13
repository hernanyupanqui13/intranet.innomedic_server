<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function verificar($usuario,$clave)
	{
		$result = $this->db->get_where('ts_usuario',array('usuario'=>$usuario,'clave'=>$clave, 'status'=>1),1);
		/*$this->db->where('usuario',$usuario);
        $this->db->where('clave',$clave);
        $this->db->or_where('email',$usuario);
        $this->db->or_where('nro_documento',$usuario);
        $result = $this->db->get('ts_usuario',1);*/
        if (!$result->result()) {
            return false;
        }else{
            return $result->row();
        }
	}

	public function ts_rubro()
	{
		$query = $this->db->query("select * from ts_rubro");
		return $query->result();
	}

	//actialiamoz cuando estamos conectados si o no

	public function update_connect($id_users,$data)
	{
		$this->db->where("Id",$id_users);
		$this->db->update("ts_usuario",$data);
	}

	//update a estado 1

	public function update_connect_1($id,$data_update)
	{
		$this->db->where("Id",$id);
		$this->db->update("ts_usuario",$data_update);
	}

	public function connected()
	{
		$query =  $this->db->query("
				select Id,imagen,
				(select CONCAT(nombre,' ', apellido_paterno,' ', apellido_materno) from ts_usuario where Id=id_usuario ) as nombres,
				(select CASE
							    WHEN connect = 1 THEN 'Conectado'
							    WHEN connect = 2 THEN 'Desconectado'
							    ELSE 'Fuera de Linea'
							END
				from ts_usuario where Id=id_usuario) as conec,
				(select	CASE
							    WHEN connect = 1 THEN 'text-success'
							    WHEN connect = 2 THEN 'text-danger'
							    ELSE 'text-mute'
							END 
				from ts_usuario where Id=id_usuario) as color
				from ts_datos_personales  ");
		return $query->result();

	}

} ?>