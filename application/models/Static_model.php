<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 			
 */
class Static_model extends CI_model
{
	
	function __construct() 
	{
		parent::__construct();
	}

	public function consultoriasname()
	{
		$query = $this->db->query("select *,name  from t_consultorias  where name IS NOT NULL");
		return $query->result();
	}
	public function oficina_view()
	{
		$query = $this->db->query("select * from t_oficina");
		return $query->result();
	}

	public function gallery()
	{
		$query = $this->db->query("select * from t_gallery");
		return $query->result();
	}

	public function view_service()
	{
		$query = $this->db->query("select * from t_view_service where Id=1");
		return $query->result();
	}
	public function view_service1()
	{
		$query = $this->db->query("select * from t_view_service where Id=2");
		return $query->result();
	}
	public function view_service2()
	{
		$query = $this->db->query("select * from t_view_service where Id=3");
		return $query->result();
	}
	public function view_service3()
	{
		$query = $this->db->query("select * from t_view_service where Id=4");
		return $query->result();
	}
	public function view_service4()
	{
		$query = $this->db->query("select * from t_view_service where Id=5");
		return $query->result();
	}


	public function view_doctor()
	{
		$query = $this->db->query("select * from t_empleado where estado=1");
		return $query->result();
	}




	//Mostrandolos dato de
	
	public function SendMail($data)
	{
		$this->db->insert("t_suscriptor",$data);
	}

	public function static_view_one()
	{
		$query = $this->db->query("select *,TIMESTAMPDIFF(YEAR,created,CURDATE()) AS anos from t_static_one");
		return $query->result();
	}

	public function areas()
	{
		$query = $this->db->query("select * from t_areas");
		return $query->result();
	}
	public function process_booking($data)
	{
		$this->db->insert("t_cita",$data);
	}

	public function process_booking_request($data)
	{
		$this->db->insert("t_cita",$data);
	}


	public function slider_view()
    {
        $query = $this->db->query("select * from t_slider");
        return $query->result();
        
    }

    //ventajas

    public function lista_ventajas_mas()
	{
		$query = $this->db->query("select * from t_ventajas limit 7,50 ");
		return $query->result();
	}
	public function lista7_areas()
	{
		$query = $this->db->query("select * from t_ventajas limit 0,7");
		return $query->result();
	}




} ?>