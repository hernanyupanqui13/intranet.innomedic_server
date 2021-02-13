<?php /**
 * 
 */
class Sistema_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


    //eliminar paciente
    //
    
    public function registrada_social($data)
    {
      $this->db->insert("ts_empresas",$data);
    }

    public function eliminar_pacientex_id($id)
    {
      $this->db->where("Id",$id);
      $this->db->delete("t_programacion");
    }

    public function Listar_data_programacion()
    {
      $query = $this->db->query("select * from t_programacion");
      return $query->result();
    }



    function select()
     {
      /*$this->db->select()
      $this->db->where('id_usuario', $this->session->userdata("session_id") and  fecha_registro(DATE_sub(NOW(), INTERVAL 2 MINUTE)) );
      fecha_registro BETWEEN CURDATE() and CURDATE() + INTERVAL 1 DAY
      and fecha_registro >= NOW() - INTERVAL 2 MINUTE
      $this->db->order_by('Id', 'DESC');
      $query = $this->db->get('t_programacion');*/

      $query = $this->db->query("select * from t_programacion WHERE id_usuario='".$this->session->userdata("session_id")."'");
      return $query;
     }

     function insert($data)
     {
      $this->db->insert_batch('t_programacion', $data);
     }

    public function registrar($data)
    {
        $this->db->insert("ts_usuario",$data);
        return $this->db->insert_id();
    }

    public function delete_all($id_all)
    {
      $this->db->where('id_usuario', $id_all);
      $this->db->delete('t_programacion');
    }
 

    public function empresa()
    {
        $query = $this->db->query("select * from ts_empresas where id_usuario='".$this->session->userdata("session_id")."'");
        return $query->result();
    }

    function batchInsert($data){
        //get bill entries 
      
        $count = count($data['count']);

        for($i = 0; $i<$count; $i++){
            $entries[] = array(
                'nombres'=>$data['nombres'][$i],
                'apellido_paterno'=>$data['apellidop'][$i],
                'apellido_materno'=>$data['apellidom'][$i],
                'fecha_nacimiento' =>$data['date'][$i],
                'dni'=>$data['dni'][$i],
                'sexo'=>$data['sexo'][$i],
                'perfil'=>$data['perfil'][$i],
                'area'=>$data['area'][$i],
                'puesto'=>$data['puesto'][$i],
                'tipo_examen'=>$data['tipoexamen'][$i],
                'fecha_atencion'=>$data['date_fec'][$i],
                'id_usuario' => $data['Id'][$i],
                'fecha_registro'=>$data['fec_rec'][$i],
                'empresa'=>$data['empresaxx'][$i],
                'subcontrata'=>$data['subcontratoxx'][$i],
                );
        }

        $this->db->insert_batch('t_programacion',$entries); 
        if($this->db->affected_rows() > 0)
            return 1;
        else
            return 0;
        }


    //esto es una prueba

    public function Obtener_columnas_colums()
    {
     $query = $this->db->query("SELECT COLUMN_NAME as columns FROM 
      information_schema.columns WHERE 
      table_schema = 'innomedic'
      AND 
      table_name = 't_programacion'");
      return $query->result();
    }
    public function Obtener_filas_file()
    {
      $query = $this->db->query("select * from t_programacion");
       return $query->result();
    }
	
} ?>