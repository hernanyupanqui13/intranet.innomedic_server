<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Ficha_personal extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Ficha_personal_model");
		ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
	}

	public function index()			
	{
		$this->load->model("Empresas_model");

		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$data = array(
			'title' =>array("estas llenando tu ficha personal","Ficha Personal","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
			
			'departamento' => $this->Empresas_model->departamento(),
			'estado_civil' => $this->Ficha_personal_model->estado_civil(),
			'data_ficha_personal' => $this->Ficha_personal_model->data_ficha_personal(),
			
			
		);
		$this->load->view("intranet_view/head",$data);
		$this->load->view("intranet_view/title",$data);
		$this->load->view("intranet/ficha_personal",$data);
		$this->load->view("intranet_view/footer",$data);
	}

	public function eliminar_datos_referentes()
	{
		if ($this->session->userdata('session_id')=="") {
			redirect(base_url());
		}
        $this->Ficha_personal_model->eliminar_datos_referentes($_POST["user_id"]); 

	}

	

	public function fetch_single_user()
	{

		 $output = array();  
           $data = $this->Ficha_personal_model->fetch_single_user($this->input->post("user_id"));
                               
           foreach($data as $row)  
           {  

           		$output['vive'] = $row->vive;
                $output['nombre'] = $row->nombres;
                $output['parentescos'] = $row->parentescos; 
                $output['fecha_nacimiento'] = '
                <input type="date" name="fecha_nacimiento" class="form-control" value="'.date('Y-m-d', strtotime($row->fecha_nacimiento)).'" placeholder="">';
                $output['estado'] = $row->estado; 
                $output['id_estado_civil'] = $row->id_estado_civil; 
                $output['ocupacion'] = $row->ocupacion;  
                $output['estado'] = $row->estado;


                
           }  
           echo json_encode($output);
	}

	public function lista_departamento(){
	    // POST data
	    $postData = $this->input->post();

	    // Get data
	    $data = $this->Ficha_personal_model->lista_departamento_x($postData);

	    echo json_encode($data);
	}

	public function Datos_personales()		
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}
		$id = $this->session->userdata("session_id");

		$data = array(
			'apellido_paterno' =>$this->input->post("apellido_paterno"),
			'apellido_materno' => $this->input->post("apellido_materno"),
			'nombres' => $this->input->post("nombres_completos"),
			'id_departamento' => $this->input->post("id_departamento"),
			'id_provincia' => $this->input->post("id_provincia"),
			'id_distrito' => $this->input->post("id_distrito"),
			'nro_documento' => $this->input->post("dni_mostrar_dni"),
			'direccion' => $this->input->post("direccionx"),
			'fecha_nacimiento' => $this->input->post("fecha_nacimiento"),
			'id_genero' => $this->input->post("genero"),
			'id_estado' => $this->input->post("id_estado"),
			'id_lugar_nacimiento_dep' => $this->input->post("lugar_nacimiento"),
			'telefono_movil' => $this->input->post("telefono_movil"),
			'telefono_domicilio' =>$this->input->post("telefono_domicilio"),
			'email' => $this->input->post("emailx"),
			'talla' => $this->input->post("talla"),
			'talla_pantalon' => $this->input->post("talla_pantalon"),
			'comunicarse_con' => $this->input->post("comunicare"),
			'nro_emergencia' => $this->input->post("telefono_comu"),
			'numero' => $this->input->post("numerox"),
			'interior' => $this->input->post("interiorx"),
			'mzlote' => $this->input->post("mzlote"),
			'urbanizacion' => $this->input->post("urbanizacionx"),
			'referencia' => $this->input->post("referenciax"),

		);

		$this->Ficha_personal_model->inserdatospersonales($id,$data);
		echo json_encode(array("mensaje"=>"Se actualizo correctamente"));

		//actualizamos los registros del usuario
		//
		$id_user = $this->session->userdata("session_id");
		$data_users = array(
			'nombre' =>$this->input->post("nombres_completos"), 
			'apellido_paterno' =>$this->input->post("apellido_paterno"),
			'apellido_materno' => $this->input->post("apellido_materno"),
		);

		$this->Ficha_personal_model->actualizar_datos_usuario($id_user,$data_users);


	}

	//actualizar campos por id
	//
	public function update_campos()
	{
		$data = $this->Ficha_personal_model->actualizar_campos();
		echo json_encode($data);
	}


	public function user_action(){   
           if($this->input->method() === "post")  
           {  
           	 
            	$updated_data = array(  
                 'nombres'  =>     $this->input->post('nombres'),  
                 'parentescos'    =>  $this->input->post("parentescos"), 
                 'ocupacion'    =>  $this->input->post("ocupacion"),  
                 'fecha_nacimiento'    =>  $this->input->post("fecha_nacimiento"),  
                 'id_estado_civil'    =>  $this->input->post("estado"),  
                 'vive'    =>  $this->input->post("options"),   
                 
            	);
                
                $this->Ficha_personal_model->update_crud($this->input->post("user_id"), $updated_data); 
                echo json_encode(array("mensaje"=>"Se actualizo de manera Correcta")); 
               //echo 'Se actualizo Correctamente los datos'; 
               
          
     	 }
    }

	//Ac

    public function uploadimg(){

            
        $id = $this->session->userdata("session_id");


		if(!empty($_FILES['picture']['name'])){
			/*
			crad*/
			   
				

			/* creade**/
                $config['upload_path'] = 'upload/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = "Usuario".rand(100000000000000,900000000000000).md5($_FILES['picture']['name']);
               // $config['max_size'] = '241';
        		//$config['max_width'] = '2024';
        		//$config['max_height'] = '286';

		

                $this->load->library('upload',$config);

		        if (!$this->upload->do_upload("picture")) {

					echo json_encode(array("error"=>"Ingrese una Imagen Valida de 128 x 128 px"));
					$this->output->set_status_header(400);
		        } else {
		            $this->Ficha_personal_model->elimina_imagen_anterior($id);
		            $file_info = $this->upload->data();
		          	$this->watermark($file_info['file_name']);
		          	$this->crop($file_info['file_name']);
		          	
		            $imagen = $file_info['file_name'];
		            $subir = $this->Ficha_personal_model->data_actualizar_imagen($id,$imagen);   
		            
		            $info = new SplFileInfo($file_info['file_name']);
		            $extension = $info->getExtension();
		            //rename(base_url().'');
		           // echo "Se actualizo Correctamente";    
		           echo json_encode(array("sms"=>"Muy Bien se actualizo Correctamente"));       

		        }

               
		}
            
        
    }

    public function watermark($filename) {
    $this->load->library('image_lib');
    $config['image_library'] = 'NetPBM';
    $config['source_image'] = 'upload/images/'.$filename;
    $config['wm_text'] = 'Copyright '.date('Y').' - Innomedic.pe';
    $config['wm_type'] = 'text';
   // $config['wm_font_path'] = 'upload/texto/texto.otf'; //la fuente que deseamos que se utilize
    $config['wm_font_size'] = '30';
    $config['wm_font_color'] = '2BBAE6';
    $config['wm_vrt_alignment'] = 'bottom';
    $config['wm_hor_alignment'] = 'center';
    $config['wm_padding'] = '2';
    $config['quality'] = '100%';
    //$config['new_image'] = 'uploads/paysheet/new_image.jpg';

    $this->image_lib->initialize($config);
    if (!$this->image_lib->watermark()) {
        echo $this->image_lib->display_errors();
    }
}

	public function crop($filename) {

		$this->load->library('image_lib');
		
		       $config['image_library'] = 'gd2';
		        $config['source_image'] = 'upload/images/'.$filename;
		       $config['create_thumb'] = FALSE;
		       $config['maintain_ratio'] = TRUE;
		       $config['width']     = 128;
		       $config['height']   = 128;

		       $this->image_lib->clear();
		       $this->image_lib->initialize($config);
		       $this->image_lib->resize();
		

	   
	}




    //insertar datos familiares
    //
    public function insertar_datos_xx()
    {
    	if ($this->session->userdata("session_id")=="") {
    		redirect(base_url());
    	} 
    	if ($this->input->method() === 'post') {

    		$query = $this->db->query("select * from ts_datos_referentes where nombres='".trim($this->input->post("nombres_completos_xx"))."' and parentescos='".trim($this->input->post("parentescos_xx"))."' and id_usuario = '".$this->session->userdata("session_id")."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'No puedes duplicar el registro dos veces'));
             $this->output->set_status_header(400);
          }else{
          	$data = array(
    			'nombres' => $this->input->post("nombres_completos_xx"),
    			'parentescos' => $this->input->post("parentescos_xx"),
    			'fecha_nacimiento' => $this->input->post("fecha_nacimiento_xx"),
    			'ocupacion' => $this->input->post("ocupacion_xx"),
    			'id_estado_civil' => $this->input->post("estado_xx"),
    			'vive' => $this->input->post("options_xx"),
    			'id_usuario' => $this->session->userdata("session_id"),
    			'fecha_registro' => date('Y-m-d h:i:s'),
    			'url' => $this->input->post("url_xx"),

    		);
    		$this->Ficha_personal_model->insertar_datos_xxxx($data);
          }
          
        }else{
    		redirect(base_url().'Inicio/Zona_roja/');
    	}
    }
    //




	//
	//
	//
	//
	public function datos_familiares_update()
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url());
		}

		$id = $this->session->userdata("session_id");

		$data = array(
			'cantidad_hijos' =>$this->input->post("cantidad_hijos"),
			'hijos_estudian' => $this->input->post("hijos_estudian"),
			'hijos_menores_18' => $this->input->post("hijos_menores_18"),
			'hijos_menores_3' => $this->input->post("hijos_menores_3"),
		);

		$this->Ficha_personal_model->datos_familiares_updating_id($id,$data);
		echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));
		
	}
	/*
	Esta funcion obtiene los datos personales de un colaborador y los envia al cliete para ser descargados en pdf
	Se usa en diferentes pestañas para obtener los datos personales. Solo personal de RRHH, Logistica y Administrador
	 tiene acceso a esta funcion
	*/
	function descargarInformacion($id) {
		$data["impr"] = $this->Ficha_personal_model->getDatosPersonalesImpr($id);
		
		$this->load->view('pdf/inf-personal-colaborador',$data);

		$html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');

		// Load HTML content
		$this->pdf->loadHtml($html);//loadHtml

		$this->pdf->set_option('isRemoteEnabled', true);
		// (Optional) Setup the paper size and orientation or portrait
		$this->pdf->setPaper('A4', 'orientation');

		// Render the HTML as PDF
		$this->pdf->render();

		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream($data["impr"]->nombres, array("Attachment"=>1));
	}


	

}?>