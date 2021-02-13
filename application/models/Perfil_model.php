<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 			
 */
class Perfil_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function listar_empresa_perfil($url)			
	{
		$query = $this->db->query("select *,
			(select distrito from ts_distrito where Id=id_distrito) as distrito,
			(select departamento from ts_departamento where Id=id_departamento) as departamento,
            (select provincia from ts_provincia where Id=id_provincia) as provincia,
            (select nombre from ts_rubro where Id=id_rubro) as rubro
                         from ts_empresas where url='".$url."'");
		return $query->result();
	}

	public function departamento()
	{
		$this->db->order_by("departamento", "ASC");
		$query = $this->db->get("ts_departamento");
		return $query->result();
	}

	public function fetch_single_details($customer_id)
	 {
	  $this->db->where('url', $customer_id);
	  $data = $this->db->get('ts_empresas');
	  $output = '<table width="100%" cellspacing="5" cellpadding="5">';
	  foreach($data->result() as $row)
	  {
	   $output .= '
	   <tr> 
	    <td width="25%"><img src="'.base_url().'images/'.$row->Id.'" /></td>
	    <td width="75%">
	     <p><b>Name : </b>'.$row->razon_social.'</p>
	     <p><b>Address : </b>'.$row->nombre_comercial.'</p>
	     <p><b>City : </b>'.$row->actividad_economica.'</p>
	     <p><b>Postal Code : </b>'.$row->direccion.'</p>
	     <p><b>Country : </b> '.$row->contacto.' </p>
	    </td>
	   </tr>
	   ';
	  }
	  $output .= '
	  <tr>
	   <td colspan="2" align="center"><a href="'.base_url().'htmltopdf" class="btn btn-primary">Back</a></td>
	  </tr>
	  ';
	  $output .= '</table>';
	  return $output;
	 }


	 //mostrar en modal
	 //
	 public function get_student_data_model($id)
	{
		return $this->db->select('*')
        ->from('ts_empresas')
	    ->where(['id'=>$id])
	    ->get()
	    ->row();
}
 

	

	//desde aqui para abajo es de empleado


	public function listar_empleado_perfil($url)
	{
		$query = $this->db->query("select *,
(select distrito from ts_distrito where Id=id_distrito) as distrito,
(select 
			CASE
			    WHEN Id = 1 THEN 'varon.png'
			    WHEN Id = 2 THEN 'mujer.png'
			    WHEN Id = 3 THEN 'medio.png'
			    ELSE 'distinto.png'
			END
from ts_genero where Id=t.id_genero) as id_otros,
			 
			(select departamento from ts_departamento where Id=id_departamento) as departamento,
			
      (select provincia from ts_provincia where Id=id_provincia) as provincia,
			
      (select CASE
		    WHEN id_perfil = 1 THEN 'Administrador'
		    WHEN id_perfil = 2 THEN 'Trabajador'
		    ELSE 'Otros'
		END
 from ts_usuario where Id=id_usuario) as perfil
 
from ts_datos_personales t where url='".$url."'");
		return $query->result();
	}
		










} ?>




















