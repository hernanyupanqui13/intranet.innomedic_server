<?php /**
 * 		
 */
class Empresas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function lista_empresas_por_id_usuario($data)
	{
		$query = $this->db->query("select *,
			(select distrito from ts_distrito where Id=id_distrito) as distrito,
			(select departamento from ts_departamento where Id=id_departamento) as departamento,
            (select provincia from ts_provincia where Id=id_provincia) as provincia,
            (select nombre from ts_rubro where Id=id_rubro) as rubro
                         from ts_empresas where url='".$data."'");
		return $query->result();
	}

	public function departamento()
	{
		$this->db->order_by("departamento", "ASC");
		$query = $this->db->get("ts_departamento");
		return $query->result();
	}

	public function lista_provincia($country_id)
	 {
	  $this->db->where('id_departamento', $country_id);
	  $this->db->order_by('provincia', 'ASC');
	  $query = $this->db->get('ts_provincia');
	  $output = '<option value="">--Selecciona Provincia--</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->provincia.'</option>';
	  }
	  return $output;
	 }

	public function lista_distrito($state_id)
	 {
	  $this->db->where('id_provincia', $state_id);
	  $this->db->order_by('distrito', 'ASC');
	  $query = $this->db->get('ts_distrito');
	  $output = '<option value="">--Seleccione Distrito--</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->Id.'">'.$row->distrito.'</option>';
	  }
	  return $output;
	 }

	 public function update_empresas_por_usuario($id,$datas)
	 {
	 	$this->db->where("id_usuario",$id);
	 	$this->db->update("ts_empresas",$datas);
	 }
} ?>