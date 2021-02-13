<?php /**
 * 		
 */
class Experiencia_laboral extends CI_Controller					
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
		$this->load->model("Experiencia_laboral_model");
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("estas viendo Ediomas","Experiencia Laboral","<a href='javascript:void(0)' class='btn btn-info d-none d-lg-block m-l-15' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-plus-circle'></i>&nbsp;Agregar Experiencia</a>","Evaristo Escudero Huillcamascco"),

		); 
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/experiencia_laboral",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function Cargar_Experiencia_laboral()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		$data = $this->Experiencia_laboral_model->Cargar_Experiencia_laboral();
		echo json_encode($data);
	}

	public function Eliminar_experiencia_laboral()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id = $this->input->post("user_id");
		$this->Experiencia_laboral_model->Eliminar_experiencia_laboral($id);
	}

	public function Insert_experiencia_laboral()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		if ($this->input->method() === 'post') {

			$query = $this->db->query("select * from ts_experiencia_laboral where cargo='".trim($this->input->post("cargo"))."' and empresa='".trim($this->input->post("empresa"))."' and id_usuario = '".$this->session->userdata("session_id")."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'No puedes duplicar el registro dos veces'));
             $this->output->set_status_header(400);
          }else{
          	$data = array(
				'url' => $this->input->post("url"),
				'cargo' =>$this->input->post("cargo"),
				'empresa' =>$this->input->post("empresa"),
				'fecha_inicio' =>$this->input->post("fecha_inicio"),
				'fecha_fin' =>$this->input->post("fecha_fin"),
				'motivo_cese' =>$this->input->post("motivo_cese"),
				'direccion' =>$this->input->post("direccion"),
				'telefono' =>$this->input->post("telefono"),
				'descripcion_laboral' =>$this->input->post("descripcion_laboral"),
				'estado' =>"1",
				'id_usuario' => $this->session->userdata("session_id"),
				'created'=>date('Y-m-d h:i:s'),
			 );

			$this->Experiencia_laboral_model->Insert_experiencia_laboral($data);
			echo json_encode(array("mensaje"=>"Se registro de manera correcta"));
          }
			
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}

	public function fetch_single_user_experience()
	{ 

		 $output = array();  
           $data = $this->Experiencia_laboral_model->fetch_single_user_experience($this->input->post("user_id"));
           foreach($data as $row)  
           { 

           		$output['cargo'] = $row->cargo;
                $output['empresa'] = $row->empresa;
                $output['fecha_inicio'] = $row->fecha_inicio;
                $output['fecha_fin'] = $row->fecha_fin;
                $output['motivo_cese'] = $row->motivo_cese;
                $output['direccion'] = $row->direccion;
                $output['telefono'] = $row->telefono;
                $output['descripcion_laboral'] = $row->descripcion_laboral;
                //$output['descripcion_laboral'] = '<textarea name="descripcion_laboral" id="descripcion_laboral" class="form-control" rows="5">'.$row->descripcion_laboral.'</textarea>';
                


                
           }  
           echo json_encode($output);
	}

	public function user_action_experience_update()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		if ($this->input->method() === 'post') {

			$id = $this->input->post("user_id");
			$query = $this->db->query("select * from ts_experiencia_laboral where cargo='".trim($this->input->post("cargo"))."' and empresa='".trim($this->input->post("empresa"))."' and id_usuario = '".$this->session->userdata("session_id")."'");
	            foreach ($query->result() as $x)
	            {
	                $idd   =   $x->Id;
	            }
	            $row = $query->row();
	            if (isset($row)) {
	            	if ($idd == $id) {
	            		$data = array(
							'cargo' =>$this->input->post("cargo"),
							'empresa' =>$this->input->post("empresa"),
							'fecha_inicio' =>$this->input->post("fecha_inicio"),
							'fecha_fin' =>$this->input->post("fecha_fin"),
							'motivo_cese' =>$this->input->post("motivo_cese"),
							'direccion' =>$this->input->post("direccion"),
							'telefono' =>$this->input->post("telefono"),
							'descripcion_laboral' =>$this->input->post("descripcion_laboral"),
							'estado' =>"1",
							'update'=>date('Y-m-d h:i:s'),
						 );
						$this->Experiencia_laboral_model->user_action_experience_update($id,$data);
						echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));
	            	}else{
	            		echo json_encode(array('error'=>'No puedes duplicar registro dos veces'));
                      	$this->output->set_status_header(400);
	            	}
	            }else{
	            	$data = array(
							'cargo' =>$this->input->post("cargo"),
							'empresa' =>$this->input->post("empresa"),
							'fecha_inicio' =>$this->input->post("fecha_inicio"),
							'fecha_fin' =>$this->input->post("fecha_fin"),
							'motivo_cese' =>$this->input->post("motivo_cese"),
							'direccion' =>$this->input->post("direccion"),
							'telefono' =>$this->input->post("telefono"),
							'descripcion_laboral' =>$this->input->post("descripcion_laboral"),
							'estado' =>"1",
							'update'=>date('Y-m-d h:i:s'),
						 );

						$this->Experiencia_laboral_model->user_action_experience_update($id,$data);
						echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));

	            }

			
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
	}
} ?>