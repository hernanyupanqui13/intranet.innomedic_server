<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Formacion_academica extends CI_Controller
{
	
	function __construct()		
	{
		parent::__construct();
		$this->load->model("Formacion_academica_model");
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data = array(
			'title' =>array("estas en formacion de Educación","Educación","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),

		);

		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/formacion_academica",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function cargar_academia()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		 $data = $this->Formacion_academica_model->datos_formacion_academica();
	    echo json_encode($data);

	}

	public function cargar_academia_educacion_superiro()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		 $data = $this->Formacion_academica_model->datos_formacion_superior();
	   	 echo json_encode($data);
	}

	public function lista_colegios(){
	    // POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Formacion_academica_model->lista_colegios($postData);

	    echo json_encode($data);
	}

	public function lista_espcialidad()
	{
		 // POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Formacion_academica_model->lista_espcialidad($postData);

	    echo json_encode($data);
	}

	public function grado_academico()
	{
		// POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Formacion_academica_model->grado_academico($postData);

	    echo json_encode($data);
	}

	public function lista_centro_estiudios()
	{
		// POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Formacion_academica_model->lista_centro_estiudios($postData);

	    echo json_encode($data);
	}

	public function lista_universidad()
	{
		// POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Formacion_academica_model->lista_universidad($postData);

	    echo json_encode($data);
	}

	public function insertar_datos()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		if ($this->input->method() === 'post') {
			//validamos para que l datos no se registre
			$query = $this->db->query("select * from ts_datos_formacion_academica where centro_estudios='".trim($this->input->post("centro_estudios"))."' and id_usuario='".$this->session->userdata("session_id")."'");
	        $row = $query->row();
	        if(isset($row)){ // cuando es mayor que vacio o cero
	          echo json_encode(array('error'=>'El registro ya se encuentra registrado'));
	         $this->output->set_status_header(400);
	    	}else{
	    		$data = array(
	    			'educacion' =>$this->input->post('educacion'),
	    			'comple_incomple'=> $this->input->post("completa"),
	    			'centro_estudios' => $this->input->post('centro_estudios'),
	    			'desde'=> $this->input->post("desde"),
	    			'hasta' => $this->input->post("hasta"),
	    			'id_usuario' => $this->session->userdata("session_id"),
	    			'url' => $this->input->post('url'),
	    		);

	    		$this->Formacion_academica_model->insertar_datos($data);
	    		 echo json_encode(array('mensaje'=>'Se realizo de manera correcta'));
	    	}
			
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}


		//$id = $this->session->userdata("session_id");

		
	      
	}

	//agregar grado academico
	//
	public function add_grado_academico()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		if ($this->input->method() === 'post') {
			//validamos para que l datos no se registre
			$query = $this->db->query("select * from ts_datos_educacion_superior where especialidad='".trim($this->input->post("espacialidad_vali"))."' and id_usuario='".$this->session->userdata("session_id")."'");
	        $row = $query->row();
	        if(isset($row)){ // cuando es mayor que vacio o cero
	          echo json_encode(array('error'=>'El registro ya se encuentra registrado'));
	         $this->output->set_status_header(400);
	    	}else{
	    		$id_usuario = $this->session->userdata("session_id");
				$datas = array(
					'especialidad' =>trim($this->input->post("espacialidad_vali")),
					'centro_estudios' => trim($this->input->post("centro_estudios_vali")),
					'desde' => trim($this->input->post("desde")),
					'hasta' => trim($this->input->post("hasta")),
					'comple_incomple' => trim($this->input->post("comple_incomple")),
					'grado_academica' => trim($this->input->post("grado_acedemico_x")),
					'id_usuario'=> $id_usuario,
					'url' => $this->input->post("urlx"),
				);
				//insertamos data a la base de datos
				$this->Formacion_academica_model->add_grado_academico($datas);
				echo json_encode(array("mensaje"=>"Se agrego de manera correcta"));
	    	}
			
		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}


		
	}

	public function eliminar_datos()
	{
		if ($this->session->userdata('session_id')=="") {
			redirect(base_url());
		}
        $this->Formacion_academica_model->eliminar_datos_referentes($_POST["user_id"]); 
	}

	public function eliminar_datos_idx()
	{
		if ($this->session->userdata('session_id')=="") {
			redirect(base_url());
		}
        $this->Formacion_academica_model->eliminar_datos_idx($this->input->post("user_id")); 
	}

	public function fetch_single_user()
	{

		 $output = array();  
           $data = $this->Formacion_academica_model->fetch_single_user($this->input->post("user_id"));
           foreach($data as $row)  
           { 

           		$output['educacion'] = $row->educacion;
                $output['comple_incomple'] = $row->comple_incomple;
                $output['centro_estudios'] = $row->centro_estudios; 
                $output['desde'] = $row->desde; 
                $output['hasta'] = $row->hasta; 
              /* $output['desde'] = '
                <input type="date" name="desde" class="form-control" value="'.date('Y-m-d', strtotime($row->desde)).'" placeholder="">';*/
               
                
           }  
           echo json_encode($output);
	}

	public function fetch_single_user_superior()
	{

		 $output = array();  
           $data = $this->Formacion_academica_model->fetch_single_user_superior($this->input->post("user_id"));
           foreach($data as $row)  
           { 

           		$output['especialidad_x'] = $row->especialidad_x;
           		$output['especialidad'] = $row->especialidad;
                $output['comple_incomple'] = $row->comple_incomple;
                $output['centro_estudios_x'] = $row->centro_estudios_x; 
                $output['centro_estudios'] = $row->centro_estudios;
                $output['grado_academico_x'] = $row->grado_academico_x; 
                $output['grado_academica'] = $row->grado_academica;
                $output['desde'] = $row->desde; 
                $output['hasta'] = $row->hasta; 

           }  
           echo json_encode($output);
	}

	public function user_action()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url()); 
		}
		if ($this->input->method() === 'post') {

			$id = $this->input->post("user_id");
			$query = $this->db->query("select * from ts_datos_formacion_academica where centro_estudios='".trim($this->input->post("centro_estudios"))."'");
		        foreach ($query->result() as $x)
		        {
		            $idd   =   $x->Id;
		        }
		        $row = $query->row();
		        if (isset($row)) {
		        	if ($idd == $id) {
		        		$data = array(
		        			'educacion' =>$this->input->post("educacion"),
							'comple_incomple' => $this->input->post("comple_incomple"),
							'centro_estudios'=> trim($this->input->post("centro_estudios")),
							'desde'=> $this->input->post("desde"),
							'hasta'=> $this->input->post("hasta"),
						);
						$this->Formacion_academica_model->user_action_update($id,$data);
						echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
		        	}else{
		        		echo json_encode(array('error'=>'No puedes duplicar registro dos veces'));
             			$this->output->set_status_header(400);
		        	}
		        	
					
		        }else{
		    		
					$data = array(
	        			'educacion' =>$this->input->post("educacion"),
						'comple_incomple' => $this->input->post("comple_incomple"),
						'centro_estudios'=> trim($this->input->post("centro_estudios")),
						'desde'=> $this->input->post("desde"),
						'hasta'=> $this->input->post("hasta"),
					);
					$this->Formacion_academica_model->user_action_update($id,$data);
					echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
		    	}
				
		}else{

			redirect(base_url().'Inicio/Zona_roja/');
		}
		
		
		
	}


	public function actualizar_datos_grado_superior()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		if ($this->input->method() === 'post') {

			$id = $this->input->post("user_id_x");
			$query = $this->db->query("select * from ts_datos_educacion_superior where especialidad='".trim($this->input->post("espacialidad_vali"))."'");

		        foreach ($query->result() as $x)
		        {
		            $idd   =   $x->Id;
		        }
		        $row = $query->row();
		        if (isset($row)) {
		        	if ($idd == $id) {
		        		$data = array(
		        			'especialidad' =>$this->input->post("espacialidad_vali"),
		        			'centro_estudios'=> $this->input->post("centro_estudios_valix"),
		        			'desde'=> $this->input->post("desde_x"),
							'hasta'=> $this->input->post("hasta_x"),
							'comple_incomple' => $this->input->post("comple_incomplex"),
							'grado_academica' => $this->input->post("grado_academico_validate_xx_updating_xx")
						);
						$this->Formacion_academica_model->actualizar_datos_grado_superior($id,$data);
						echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
		        	}else{
		        		echo json_encode(array('error'=>'No puedes duplicar registro dos veces'));
             			$this->output->set_status_header(400);
		        	}
		        	
					
		        }else{
		    		
					$data = array(
	        			'especialidad' => $this->input->post("espacialidad_vali"),
	        			'centro_estudios'=> $this->input->post("centro_estudios_valix"),
	        			'desde'=> $this->input->post("desde_x"),
						'hasta'=> $this->input->post("hasta_x"),
						'comple_incomple' => $this->input->post("comple_incomplex"),
						'grado_academica' => $this->input->post("grado_academico_validate_xx_updating_xx")
					);
					$this->Formacion_academica_model->actualizar_datos_grado_superior($id,$data);
					echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
		    	}
				
		}else{

			redirect(base_url().'Inicio/Zona_roja/');
		}
	}
} ?>

