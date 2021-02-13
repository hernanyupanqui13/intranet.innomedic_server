<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */ 
class Enviar_Boleta_Pago_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($data) 
	{
		$this->db->insert("ts_entrega_boleta",$data);
	}


	public function listar_usuarios_por_nombre_y_correo($postData)
	{
		$response = array(); 
 
     if(isset($postData['search']) ){
       // Select record
       $this->db->select('*');
       $this->db->where("nombres like '%".$postData['search']."%' or apellido_paterno like '%".$postData['search']."%' or apellido_materno like '%".$postData['search']."%' ");

       $records = $this->db->get('ts_datos_personales')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->email, "id"=>$row->Id,"label"=>trim($row->nombres.' '.$row->apellido_paterno.' '.$row->apellido_materno.' <'.$row->email.'>'));
       }

     } 
 
     return $response;
	}

	public function listar_boleta_pago_por_usuario()
	{
		$query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,(select nombre from do_tipo_boleta where Id=a.tipo_boleta) as boleta,
			DATE_FORMAT(fecha_enviado,'%W %d de %M %Y %r') as fecha_enviado_xx
		from ts_entrega_boleta a where id_usuario='".$this->session->userdata("session_id")."' and  view=1 order by view asc, fecha_enviado desc");
		return $query->result();
	}

	//cambiar estado de view

	public function cambia_estado_url_($id_boleta,$data)
	{
		$this->db->where("Id",$id_boleta);
		$this->db->update("ts_entrega_boleta",$data);
	}

	public function lista_boleta_entrega()
	{
		/*$query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,DATE_FORMAT(fecha_recibido,'%r') as hora,
DATE_FORMAT(fecha_recibido,'%W %d de %M %Y') as fecha_recibido_xx
 from ts_entrega_boleta order by Id desc");
		return $query->result();*/
		$query = $this->db->query("SET lc_time_names = 'es_PE'");
		$query = $this->db->query("select *,DATE_FORMAT(fecha,'%W %d de %M %Y') as fecha_recibido_xx from bo_cabecera ");
		return $query->result();
	}

	public function registrar_formulario_de_contacto($data)
	{
		$this->db->insert("ts_email_enviado_users",$data);
	}

	public function lista_boleta_entrada()
	{
		$query = $this->db->query("select * from ts_email_enviado_users");
		return $query->result();
	}

} ?>