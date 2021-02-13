<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Sistema extends CI_Controller		
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('Sistema_model');
        ini_set('date.timezone', 'America/Lima');
        $this->load->library('Excel');
        $this->load->helper('fecha');
	}

	public function index()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("ingresaste al Sistema","Menú Principal","","Evaristo Escudero Huillcamascco"),
			
		);
		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('sistema/index',$data);
		$this->load->view('diseno/footer',$data);
		
		if (base_url().'Sistema/') {
			redirect(base_url().'Sistema/Programacion_online/');
		}
	} 

	public function Programacion_online()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Login/');
		}	
		$data = array(
			'title' =>array("ingresaste al Sistema","Programacion Online","","Evaristo Escudero Huillcamascco"),
			'empresa' => $this->Sistema_model->empresa(),
			
			
		);
		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('sistema/programacion_online',$data);
		$this->load->view('diseno/footer',$data);
	}

    public function batchInsert()
    {
    	if ($this->session->userdata("session_id")=="") {
    		redirect(base_url());
    	} 
    	//falta validar datos del acceso del administrador
        if ($this->input->method() === 'post') {
    		$result = $this->Sistema_model->batchInsert($_POST);
	        if($result){
	            echo 1;
	        }
	        else{
	            echo 0;
	        }
	        exit;  
    	}else{
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
          
        

    	

         
    }

    public function Lista_Registro()
    {
    	if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$data = array(
			'title' =>array("estas apunto de importar excel","Importando Excel","","Evaristo Escudero Huillcamascco"),
			'Listar_data_programacion' =>$this->Sistema_model->Listar_data_programacion(),
			
		);
		$this->load->view('diseno/head',$data);
		$this->load->view('diseno/title',$data);
		$this->load->view('sistema/importar_excel',$data);
		$this->load->view('diseno/footer',$data);
    }


    public function fetch()
	 {
	  $data = $this->Sistema_model->select();
	  
	  $output = '
	  <h3 align="center">Total Registros <span id="results"></span></h3>
	  <div class="col-md-4 my-2">
           <a  id="eliminar" href="javascript:void(0);" class="btn btn-outline-danger btn-rounded delete_all" id='.$this->session->userdata("session_id").'><i class="far fa-times-circle"></i>&nbsp;All delete</a>
       </div>
       <div class="table-responsive">
	  <table id="demo-foo-accordion" class="table table-bordered m-b-0 toggle-arrow-tiny" data-filtering="true" data-paging="true" data-sorting="true"  data-paging-size="7">
	  <thead>
		   <tr>
		   	<th class="tamano_sm">Opciones</th>
		    <th>Nombres</th>
		    <th class="tamano_sm">Apellido Paterno</th>
		    <th class="tamano_sm">Apellido Materno</th>
		    <th>Dni</th>
		    <th class="tamano_sm">Fecha Nac.</th>
		    <th>Sexo</th>
		    <th>Perfil</th>
		    <th>Area</th>
		    <th>Puesto</th>
		    <th>T. Examen</th>
		    <th>Fecha Atención</th>
		   </tr>
	   </thead>
	  ';
	  foreach($data->result() as $row)
	  {
	   $output .= '
	   <tbody class="div_load">
		   <tr>
		    <td>
		    <a href="Javascript:void(0);" class="btn waves-effect waves-light btn-outline-danger deletex" Id="'.$row->Id.'"><i class="far fa-times-circle"></i></a>
		    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-outline-success update" id="'.$row->Id.'"><i class=" far fa-edit"></i></a>
		    </td>
		    <td>'.$row->nombres.'</td>
		    <td>'.$row->apellido_paterno.'</td>
		    <td >'.$row->apellido_materno.'</td>
		    <td>'.$row->dni.'</td>
		    <td >'.$row->fecha_nacimiento.'</td>
		    <td>'.$row->sexo.'</td>
		    <td>'.$row->perfil.'</td>
		    <td>'.$row->area.'</td>
		    <td>'.$row->puesto.'</td>
		    <td>'.$row->tipo_examen.'</td>
		    <td>'.$row->fecha_atencion.'</td>
		   </tr>
	   </tbody>
	   ';
	  }
	  $output .= '</table></div>';
	  echo $output;
	 }

 
	public function import()
	 {
	  if(isset($_FILES["file"]["name"]))
	  {

		
	   $path = $_FILES["file"]["tmp_name"];
	   $object = PHPExcel_IOFactory::load($path);
	   foreach($object->getWorksheetIterator() as $worksheet)
	   {
	    $highestRow = $worksheet->getHighestRow();
	    $highestColumn = $worksheet->getHighestColumn();
	    $errors = array();
	    for($row=2; $row<=$highestRow; $row++)
	    {
	     $customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	     $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	     $city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	     $postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	     $country = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCellByColumnAndRow(4, $row)->getValue() + 1 ));
	    // $country =  $worksheet->getCellByColumnAndRow(4, $row)->getValue(); 
	     $sexo =  $worksheet->getCellByColumnAndRow(5, $row)->getValue();
	     $perfil =  $worksheet->getCellByColumnAndRow(6, $row)->getValue();
	     $area =  $worksheet->getCellByColumnAndRow(7, $row)->getValue();
	     $puesto =$worksheet->getCellByColumnAndRow(8, $row)->getValue();
	     $tipo_examen =  $worksheet->getCellByColumnAndRow(9, $row)->getValue();
	     $fecha_atencion = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCellByColumnAndRow(10, $row)->getValue() + 1 ));
	    // $fecha_atencion =  $worksheet->getCellByColumnAndRow(10, $row)->getValue(); 


	    	//validaciones de campos de excel
	     if($customer_name === NULL ){
              // $errors[] = array('nombre' => "Error en la Fila ".$row." Ingresar un nombre valido");
            	echo json_encode(array('msg'=>'Verifique que el campo nombre esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
            }
        if ($address === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo Apellido Paterno esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($city === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo Apellido Materno esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($postal_code === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo DNI esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($country === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo Fecha Nacimiento esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($sexo === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo Genero esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($perfil === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo perfil esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($area === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo area esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($puesto === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo area esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
        if ($tipo_examen === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo area esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }
      /*  if ($fecha_atencion === NULL) {
        	echo json_encode(array('msg'=>'Verifique que el campo area esta vacio'));
				$this->output->set_status_header(400);
               //Valido con una funcion si el correo esta bien escrito o no
              exit();
        }*/

	    //
        // preguntamos si existe inscripcion por email
         $query = $this->db->get_where('t_programacion', array(
         	'nombres' => $customer_name,
         	'apellido_paterno'=>$address,
         	'apellido_materno'=>$city,
         	'dni'=>$postal_code,

         ));
            if ($query->num_rows() > 0) {
                echo json_encode(array('error'=>'Verificamos en el sistema que estas intentando duplicar registros'));
	            $this->output->set_status_header(401);
	            exit();
            
	      /*  $query = $this->db->query("select * from t_programacion where nombres='".$customer_name."'");
	        $row = $query->row();
	        if(isset($row)){ // cuando es mayor que vacio o cero
	           echo json_encode(array('error'=>'Verificamos en el sistema que usted ya se registro'));
	            $this->output->set_status_header(401);*/
	        }else{
	        	$data[] = array(
			      'nombres'  => $customer_name,
			      'apellido_paterno'   => $address,
			      'apellido_materno'    => $city,
			      'dni'  => $postal_code,
			      'fecha_nacimiento'  => $country,
			      'sexo' =>$sexo,
			      'perfil' =>$perfil,
			      'area' =>$area,
			      'puesto'=>$puesto,
			      'tipo_examen' =>$tipo_examen,
			      'id_usuario' => $this->session->userdata("session_id"),
			      'fecha_atencion' => $fecha_atencion,
			      'fecha_registro' => date('Y-m-d h:i:s'),
			     );
	        }
	     
	    

	     
	    }
	   }
	   $datxxa = $this->Sistema_model->insert($data);
	  // echo "Datos Importados Correctamente";
	  echo json_encode(array("mensaje"=>"Datos Importados Correctamente"));
	  }
	  else{
	  
	  } 
	 }

	



	public function eliminar_paciente()
	{
		if ($this->session->userdata('session_id')=="") {
			redirect(base_url());
		}
		$this->Sistema_model->eliminar_pacientex_id($_POST["user_id"]);
       // $this->Sistema_model->eliminar_pacientex_id($this->input->post["user_id"]); 
	}
 
	public function cantidad_registro()
	{
		
		//and fecha_registro >= NOW() - INTERVAL 2 MINUTE
		 $query = $this->db->query("select *,count(*) as total from t_programacion where id_usuario='".$this->session->userdata("session_id")."' ");

        foreach($query->result_array() as $row){
            echo $row['total'];
        }


		
	}

	public function delete_all()
	{
		if ($this->session->userdata('session_id')=="") {
			redirect(base_url());
		}
		$this->Sistema_model->delete_all($_POST["user_id_all"]);
       // $this->Sistema_model->eliminar_paciente($this->input->post["user_id"]; 
	}


	//utlizandop ajax

	public function Obtener_columnas()
	{
		$data = $this->Sistema_model->Obtener_columnas_colums();
		echo json_encode($data);
	}

	public function Obtener_filas()
	{
		$data = $this->Sistema_model->Obtener_filas_file();
		echo json_encode($data);
	}
} ?>
