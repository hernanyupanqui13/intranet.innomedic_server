<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * 
  */
 class Historial extends CI_controller
 {
 	
 	function __construct(	)
 	{
 		parent::__construct();
 		ini_set('date.timezone', 'America/Lima');
 		$this->load->model("Historial_model");
 	}

 	public function index()
 	{
 		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = array(
			'title' =>array("estas viendo historial de registro de pacientes","Registro por Usuario","","Evaristo Escudero Huillcamascco"),
			'lista_historia_registro_x_usuario'=> $this->Historial_model->lista_historia_registro_x_usuario(),
			
		);
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("atencion/index",$data);
		$this->load->view("intranet_view/footer",$data);
 	}

 	public function Actualizar_historial($id)
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$data = $this->Historial_model->get_by_id($id);
		echo json_encode($data);
	}

 	
 	public function ajax_list()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$list = $this->Historial_model->get_datatables();
		$data = array();
		$cont=0;
		$no = $_POST['start'];
		foreach ($list as $person) {
			$cont+=1;
			$no++;
			$row = array();
			$row[]=$cont;
			$row[] = $person->codigo_id;
			
			$row[] = $person->fecha;
			$row[] = $person->paciente;
			$row[] = $person->dni;
			$row[] = $person->check;
			if ($person->estado=="1") {
				$row[]='<span class="label label-table label-success">Activado</span>';
			}else{
				$row[]='<span class="label label-table label-danger">Observación</span>';
			}
			
			$row[] = $person->empresa;
			/*if($person->photo)
				$row[] = '<a href="'.base_url('upload/'.$person->photo).'" target="_blank"><img src="'.base_url('upload/'.$person->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';*/

			//add html for action
			$row[] = '<a class="btn btn-success" href="javascript:void(0)" title="Actualizar" onclick="edit_person('."'".$person->Id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn  btn-danger delete" href="javascript:void(0)"  title="Eliminar" id="'.$person->Id.'"><i class="fas fa-trash-alt"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Historial_model->count_all(),
						"recordsFiltered" => $this->Historial_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	


	public function Registrar_historial()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		//$this->_validate();
		
		$id_usuario = $this->session->userdata("session_id");

 		if ($this->input->method() === 'post') {
 			$query = $this->db->query("select * from ts_historial_registro where codigo_id='".$this->input->post("codigo_id")."' and id_usuario='".$this->session->userdata("session_id")."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El paciente ya se encuentra registrado'));
             $this->output->set_status_header(400);
        }else{
        $data = array(
            'id_usuario' => $id_usuario,
            'codigo_id' => $this->input->post("codigo_id"),
            'fecha' => date('Y-m-d h:i:s'),
            'paciente' => $this->input->post("paciente"),
            'dni' => $this->input->post("dni"),
            'empresa' => $this->input->post("empresa"),
            'check' => $this->input->post("check"),
            'observaciones' => $this->input->post('observaciones'),
            'estado' => "1",
        );
        $this->Historial_model->agregar_registrar_historial($data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se registro de manera Correcta'));
		}
 		}else{

 			redirect(base_url().'Inicio/Zona_roja/');
 		}

		
	}

	public function Eliminar_historial()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}
		
		$this->Historial_model->delete_by_id($this->input->post("user_id"));
		echo json_encode(array('mensaje'=>'Se registro de manera Correcta'));
	}

	public function Actualizar_historial_update()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/');
		}

		$id_usuario = $this->session->userdata("session_id");
		$id = $this->input->post("id");

		//if ($this->input->method()==="post") {
			// preguntamos si existe producto por codigo de barra
       	$query = $this->db->query("select * from ts_historial_registro where codigo_id='".$this->input->post("codigo_id")."' and id_usuario='".$this->session->userdata("session_id")."'");
        foreach ($query->result() as $x)
        {
            $idd   =   $x->Id;
        }
        $row = $query->row();
        
        if(isset($row)){ // cuando es mayor que vacio o cero
            if($idd == $id){
               $data = array(
	            'id_usuario' => $id_usuario,
	            'codigo_id' => $this->input->post("codigo_id"),
	            'fecha_modi' => date('Y-m-d h:i:s'),
	            'paciente' => $this->input->post("paciente"),
	            'dni' => $this->input->post("dni"),
	            'empresa' => $this->input->post("empresa"),
	            'check' => $this->input->post("checkx"),
	            'observaciones' => $this->input->post('observaciones'),
	            'estado' => "1",
	        );
	       		 $this->Historial_model->actualizar_registrar_historial($id,$data);
	     		 //  echo json_encode(array("status" => TRUE));
	       		 echo json_encode(array('mensaje'=>'Se actualizo de manera Correcta'));
            }else{
                echo json_encode(array('error'=>'El paciente ya se encuentra registrado'));
             	$this->output->set_status_header(400);
        	}
        }else{
            $data = array(
            'id_usuario' => $id_usuario,
            'codigo_id' => $this->input->post("codigo_id"),
            'fecha_modi' => date('Y-m-d h:i:s'),
            'paciente' => $this->input->post("paciente"),
            'dni' => $this->input->post("dni"),
            'empresa' => $this->input->post("empresa"),
            'check' => $this->input->post("check"),
            'observaciones' => $this->input->post('observaciones'),
            'estado' => "1",
        );
        $this->Historial_model->actualizar_registrar_historial($id,$data);
      //  echo json_encode(array("status" => TRUE));
        echo json_encode(array('mensaje'=>'Se actualizo de manera Correcta'));
        }
	/*	}else{

			redirect(base_url().'Inicio/Zona_roja/');
		}*/


		
	}

	public function listar_empresas()
	{
		 // POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Historial_model->listar_empresas($postData);

	    echo json_encode($data);
	}





 	
 } ?>