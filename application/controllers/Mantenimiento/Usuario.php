<?php /**
 * 	
 */
use PHPMailer\PHPMailer\PHPMailer;
class Usuario extends CI_Controller
{
	
	function __construct()		
	{
		parent::__construct();
		
		ini_set('date.timezone', 'America/Lima'); 
		$this->load->model("Usuario_model");
	}
	public function index() 
	{
		if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
		}

		$data = array(
			'title' =>array("estas viendo la lista de Usuarios","Lista de Usuarios","<a class='btn-success btn-rounded btn d-none d-lg-block m-l-15' href='javascript:void(0)'><i class='fa fa-plus-circle'></i>&nbsp;Nuevo Usuario</a>","Evaristo Escudero Huillcamascco"),
			'mostrar_users'=>$this->Usuario_model->mostrar_users(),
			'id_sexo' =>$this->Usuario_model->id_sexo(),
			'id_perfil'=>$this->Usuario_model->id_perfil(),
			
		);
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('usuario/index',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function getDefaultPhoto($genero) {
		if ($genero == "1") {
			return "varon.jpg";
		} elseif ($genero=="2") {
			return "mujer.jpg";
		}
	}


	public function Agregar_nuevo()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		}
			//Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'upload/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = "Usuario_".rand(100000000000000,900000000000000).md5($_FILES['picture']['name']);
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = $this->getDefaultPhoto($this->input->post('id_genero'));;
                }
            }else{
                $picture = $this->getDefaultPhoto($this->input->post('id_genero'));;
            }

            if ($this->input->method() === 'post') {

            // aqui validamos el usuario 
        	$query_datas = $this->db->query("select * from ts_usuario where usuario='".$this->input->post("usuario")."'");
           	foreach ($query_datas->result() as $xx) {
           		$nombres_xxa = $xx->nombre.' '.$xx->apellido_paterno.' '.$xx->apellido_materno;
           	}
            $row_xs = $query_datas->row();
            if(isset($row_xs)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error_users'=>'Usuario esta asociado a '.$nombres_xxa.''));
             $this->output->set_status_header(403);
             exit();
        	}

        	//aqui validamos el dni
        	$query_datasss = $this->db->query("select * from ts_usuario where nro_documento='".$this->input->post("dni")."'");
           	foreach ($query_datasss->result() as $xx) {
           		$nombres_xxx = $xx->nombre.' '.$xx->apellido_paterno.' '.$xx->apellido_materno;
           	}
            $row_xsas = $query_datasss->row();
            if(isset($row_xsas)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error_dni'=>'DNI pertenece a '.$nombres_xxx.''));
             $this->output->set_status_header(404);
             exit();
        	}

            //validamos el email regsitrado
           	$query_data = $this->db->query("select * from ts_usuario where email='".$this->input->post("email")."'");
           	foreach ($query_data->result() as $xx) {
           		$nombres_xx = $xx->nombre.' '.$xx->apellido_paterno.' '.$xx->apellido_materno;
           	}
            $row_x = $query_data->row();
            if(isset($row_x)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error_email'=>'Email ya esta asociado al usuario '.$nombres_xx.''));
             $this->output->set_status_header(402);
             exit();
        	}
        	//validacion general nombres y apellidos

 			$query = $this->db->query("select * from ts_usuario where nombre='".$this->input->post("nombre")."' and apellido_paterno ='".$this->input->post('apellido_paterno')."' and apellido_materno ='".$this->input->post('apellido_materno')."'");
            $row = $query->row();
            if(isset($row)){ // cuando es mayor que vacio o cero
              echo json_encode(array('error'=>'El usuario ya se encuentra registrado'));
             $this->output->set_status_header(400);
        	}else{
        		//Prepare array of user data
            $userData = array(
                'usuario' => $this->input->post('usuario'),
                'clave' => md5($this->input->post('clave')),
                'clave_repeat' => md5($this->input->post('clave_repeat')),
                'email' => $this->input->post('email'),
                'id_perfil' => $this->input->post('id_perfil'),
                'nombre' => $this->input->post('nombre'),
                'apellido_paterno' => $this->input->post('apellido_paterno'),
                'apellido_materno' => $this->input->post('apellido_materno'),
                'nro_documento' => $this->input->post('dni'),
                'id_usuario_statico'=> 1,
                'status'=>1,
            );
            if ($this->Usuario_model->insert($userData)) {
            	
				$ultimoId = $this->db->insert_id();	

				$url = md5($this->input->post("usuario"));

				$data_xx = array(
					'id_genero' => $this->input->post('id_genero'),
					'email' => $this->input->post('email'),
					'nombres' => $this->input->post('nombre'),
					'puesto'=> $this->input->post('puesto'),
					'area'=> $this->input->post('area'),
					'nro_documento' => $this->input->post('dni'),
					'fecha_ingreso'=> $this->input->post('fecha_ingreso'),
					'apellido_paterno' => $this->input->post('apellido_paterno'),
					'apellido_materno' => $this->input->post('apellido_materno'),
					'id_perfil' => $this->input->post('id_perfil'),
					'celular'=>$this->input->post('celular'),
					'telefono_movil'=>$this->input->post('celular'),
					'status'=>1,
					'id_usuario_statico'=> 1,
					'id_usuario' => $ultimoId,
					'url' => $url,
					'imagen' => $picture
				);

				$this->Usuario_model->insert_ts_datos_personales($data_xx);
				//echo json_encode(array('mensaje'=>'Se registro de manera correcta'));

				$data_xx = $this->db->insert_id();


				$data_regimen = array(
					'id_usuario' => $ultimoId,
					'id_datos_personales' => $data_xx,
				);
				$this->Usuario_model->insert_ts_datos_regimen_penetenciario($data_regimen);

			
				// Datos salud
				$data_salud = array(
					'id_usuario' => $ultimoId,
					'id_datos_personales' => $data_xx,
					'url' => $url,
				);

				$this->Usuario_model->insert_ts_datos_salud($data_salud);
				
				//ts_Datos_familiares
				$data_datos_familiares = array(
					'id_usuario' => $ultimoId,
					'id_datos_personales' => $data_xx,
					'url' => $url,
				);
				
				$this->Usuario_model->insert_data_datos_familiares($data_datos_familiares);

        	}


        	// Mandamos usuario y contraseña al correo
        	$usuario = $this->input->post('usuario');
        	$contrasena = $this->input->post('clave');
        	$email = $this->input->post('email');
        	$nombres = $this->input->post('nombre').' '.$this->input->post('apellido_paterno').' '.$this->input->post('apellido_materno');
	        
	        // PHPMailer object
	        $mail = new PHPMailer();
	        
	        
	        // Creando la configuracion del correo
			$mail->isSMTP();
			$mail->Host = 'smtpout.secureserver.net';
	        $mail->SMTPSecure  = 'tls';
	        $mail->SMTPAuth = true;
	        $mail->SMTPDebug  = 3;
	        $mail->Username = 'reenviadorweb@innomedic.pe';
	        $mail->Password = 's0p0rt32411';
	        $mail->Port = 80; 
	        $mail->CharSet = 'UTF-8';                     
	     
	        
            $mail->setFrom('reenviadorweb@innomedic.pe', 'ACCESO AL SISTEMA - INTRANET');
	        $mail->addReplyTo($email, 'ACCESO AL SISTEMA - INTRANET');
	        
	        // Add a recipient
	        $mail->addAddress($email);
	        // Add cc or bcc 
	        $mail->addCC('reenviadorweb@innomedic.pe');
	        
	        // Email subject
	        $mail->Subject = 'Bienvenido '.$nombres.' | Acceso al sistema';
	        
	        // Set email format to HTML
	        $mail->isHTML(true);
	        
	        // Email body content
	        $mailContent = '<!DOCTYPE html>
			<html>
			<head>
				<title>Acceso al Sistema</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
			</head>
			<body>
				<tr><td valign="top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff; width: 600px"><tbody><tr><td style="vertical-align: top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" style="width: 600px"><tbody><tr><td class="logo" width="588" align="right" valign="top" style="color: #ffffff; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-bottom: 12px; text-align: right; width: 588px"><img class="logo" alt="Adobe" src="http://innomedic.metjetsac.com/public/assets/images/logo.png?v=2090565053"  border="0" hspace="0" vspace="0" style=" display: inline-block; vertical-align: top; width: 205px; height: 60px"></td>
			                <td width="12" style="width: 12px">&nbsp;</td>
			              </tr></tbody></table></td>
			        </tr><tr><td valign="top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background-color: #ffffff; width: 600px"><tbody><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp; </td>
			                <td style="color: #555555; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px">Estimado(a) Colaborador; '.$nombres.' <br>
			                El creado el acceso a Intranet - Innomedic <a href="http://intranet.innomedic.pe/" style="color: #1473e6; text-decoration: none">www.intranet.innomedic.pe</a></td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			                <td style="color: #000000; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px">Usuario:<strong> '.$usuario.' <br>
			                </strong>
			                Contraseña Temporal: <strong>'.$contrasena.'</strong><br>
			                La contraseña deberá ser cambiada en la Intranet <span style="color: red;">(Acceso Temporal)</span></td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			                <td style="color: #555555; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px">En caso de un error, <a href="http://innomedic.metjetsac.com/soporte/" style="color: #1473e6; text-decoration: none" target="_blank" rel="noreferrer">ponte en contacto con nosotros inmediatamente</a>.</td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr><tr><td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			                <td style="color: #555555; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; padding-top: 20px; padding-bottom: 30px">Muchas gracias,<br> RRHH</td>
			                <td class="mobile-spacer" width="30" style="width: 30px">&nbsp;</td>
			              </tr></tbody></table></td>
			            </tr><tr><td valign="top"><table class="full-width" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#313A3E" style="background-color: #313A3E; width: 600px"><tbody><tr><td width="22" style="width: 22px">&nbsp;</td>
			          			<td align="center" style="color: #ffffff; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 11px; line-height: 14px; padding-top: 30px; text-align: center"><strong><a href="http://intranet.metjetsac.com/" style="color: #ffffff; font-weight: bold; text-decoration: none" target="_blank" rel="noreferrer">Administrar tu cuenta</a> | <a href="http://innomedic.metjetsac.com/soporte/" style="color: #ffffff; font-weight: bold; text-decoration: none" target="_blank" rel="noreferrer">Asistencia al colaborador</a> | <a href="http://innomedic.metjetsac.com/soporte/" style="color: #ffffff; font-weight: bold; text-decoration: none" target="_blank" rel="noreferrer">Foros</a> </strong></td>
			          			<td width="22" style="width: 22px">&nbsp;</td>
			        		</tr>
			        		<tr>
			        			<td width="22" style="width: 22px">&nbsp;</td>
			          			<td class="legal" style="color: #999999; font-family: adobe-clean, Arial, Helvetica, sans-serif; font-size: 11px; line-height: 14px; padding-top: 30px; padding-bottom: 30px">
			          				Intranet Innomedic | desarrollado especialmente para los colaborades de Innomedic International E.I.R.L &copy; todo los derechos reservados.<br><br> 
			          				
			          				&reg; Av. Javier Prado Este 2638, San Borja, Lima, Perú<br/>
			                        <a target="_blank" href="http://innomedic.metjetsac.com/soporte/" style="color: #ffffff;"><font color="#ffffff">Mas informacion</font></a> Área de Sistemas T.I
			                        <br /><br />
			                        <a href="http://www.innomedic.pe" color="#ffffff" style="color: #ffffff;">Desarrollado por: Area de Sistemas</a>
			          			</td>

			          			<td width="22" style="width: 22px">&nbsp;</td>

			        		</tr>
			        	</tbody></table></td>
			            </tr></tbody></table></td>
			  </tr>

			</body>

			</html>
			';
	        $mail->Body = $mailContent;
	        
	        // Send email
	        /*if(!$mail->send()){
				echo json_encode(array("corereo_error" => "Verificar el correo e intentar Nuevamente!"));
				$this->output->set_status_header(401);
				exit();
	        } else {
				//echo json_encode(array("corereo_env" => "Message has been send"));

			}*/
			
			$mail->send();
			echo json_encode(array("response"=>"repsuesta aqui"));
	    
            }


		}else{
			redirect(base_url().'Inicio/Zona_roja/');
		}
            



	}
	

	
	/*
	Function show users:: Created Evaristo Escudero Huillcamascco
	*/
	public function mostrar()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		}
		
		
		$data['segmento']=$this->uri->segment(4,0);
		$data['title'] = array("estas mostrando datos de los usuarios","Lista de Usuarios","<a class='text-white' href='javascript:void(0)'>Agregar Nuevo Usuario</a>","Evaristo Escudero Huillcamascco");

		if (!$data['segmento']) {
			$data['show_users'] = $this->Usuario_model->show_users();
		}else{
			$data['show_users'] = $this->Usuario_model->show_users($data['segmento']);
		}
		
		
		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('usuario/show',$data);
		$this->load->view('intranet_view/footer',$data);
	}


	/*
		Update : show users from:: Evasristo Escudero
	*/

	public function editar()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		}
		
		$data['segmento']=$this->uri->segment(4,0);
		$data['title'] = array("estas mostrando actualizando los datos de los usuarios","Lista de Usuarios","<a class='text-white' href='javascript:void(0)'>Agregar Nuevo Usuario</a>","Evaristo Escudero Huillcamascco");

		if (!$data['segmento']) {
			$data['update'] = $this->Usuario_model->update();
		}else{
			$data['update'] = $this->Usuario_model->update($data['segmento']);
		}
		$data['genero_list'] = $this->Usuario_model->genero();


		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('usuario/update',$data);
		$this->load->view('intranet_view/footer',$data);

		
		
	}

	public function data_actualizar()
	{
		if ($this->session->userdata('session_id')=='') { 
			redirect(base_url().'Login');
		} 
		
		$id = $this->input->post("Id");

		$datax = array( 
			'modified' =>date('Y-m-d h:i:s'),
			'nombres' => $this->input->post('nombre'),
            'apellido_paterno' => $this->input->post('apellido_paterno'),
            'apellido_materno' => $this->input->post('apellido_materno'),
			'id_genero'=>$this->input->post('id_genero'),
			'fecha_nacimiento'=>$this->input->post('fecha_nacimiento'),
			'celular'=>$this->input->post('celular'),
			'telefono'=>$this->input->post('telefono'),
			'email'=>$this->input->post('email'),
			'direccion'=>$this->input->post('direccion'),
			'id_departamento'=>$this->input->post('departamento'),
			'id_provincia'=>$this->input->post('provincia'),
			'id_distrito'=>$this->input->post('distrito'),
			'pais'=>$this->input->post('pais'),
			'website'=>$this->input->post('website'),
			'instagram'=>$this->input->post('instagram'),
			'facebook'=>$this->input->post('facebook'),
			'google'=>$this->input->post('google'),
			'linkedIn'=>$this->input->post('linkedIn'),
		);
		$this->Usuario_model->data_actualizar_cliente($id,$datax);
		echo json_encode(array("mensaje"=>"Se actualizo de manera correcta"));

		$data = array(
			'modified' =>date('Y-m-d h:i:s'),
			'nombre' =>$this->input->post('nombre'),
			'apellido_paterno' => $this->input->post('apellido_paterno'),
			'apellido_materno'=>$this->input->post('apellido_materno'),
			
		);
		
		$this->Usuario_model->data_actualizar($id,$data);
		


		
		
		//redirect(base_url().'Mantenimiento/Usuario/editar/'.$id);
	}

	public function Cambiar_imagen()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		} 
		$id = $this->input->post('Id');


		if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'upload/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = "Usuario_".rand(100000000000000,900000000000000).$_FILES['picture']['name'];

                $this->load->library('upload',$config);

		        if (!$this->upload->do_upload("picture")) {
					echo "Erro al subir";
		        } else {
		            $this->Usuario_model->elimina_imagen_anterior($id);
		            $file_info = $this->upload->data();
		          	 //$this->crearMiniatura($file_info['file_name']);
		            $imagen = $file_info['file_name'];
		            $subir = $this->Usuario_model->data_actualizar_imagen($id,$imagen);   
		            
		            $info = new SplFileInfo($file_info['file_name']);
		            $extension = $info->getExtension();
		            //rename(base_url().'');
		            echo "Se actualizo Correctamente";           

		        }

               
		}
	}

	public function update_users_clave_perfil_status()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		} 

		$data['segmento']=$this->uri->segment(4,0);
		$data['title'] = array("stas apunto de actulizar los datos del Usuario","Lista de Usuarios","<a class='text-white' href='javascript:void(0)'>Agregar Nuevo Usuario</a>","Evaristo Escudero Huillcamascco");


		if (!$data['segmento']) {
			$data['update'] = $this->Usuario_model->update();
		}else{
			$data['update'] = $this->Usuario_model->update($data['segmento']);
		}
		$data['list_status']=$this->Usuario_model->list_status();
		$data['perfil_list'] = $this->Usuario_model->perfil_list();




		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('usuario/update_users',$data);
		$this->load->view('intranet_view/footer',$data);
		
		
		
		
	}

	public function update_users()
	{

		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		}  

		$id = $this->input->post('Id');
		$datos = array(
			'usuario'=>$this->input->post('usuario'),
			'id_perfil' =>$this->input->post('id_perfil'),
			'status' =>$this->input->post('estado')


		);
		$this->Usuario_model->update_users($datos,$id);
		echo "Se actualizó Correctamente";


		$data_datos_users = array(
			'status' =>$this->input->post('estado'),
			'id_perfil' =>$this->input->post('id_perfil'),
		);

		$this->Usuario_model->update_users_datos_personales($data_datos_users,$id);


	}


	public function CambiarClave()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		} 
		$id = $this->input->post('id');
		$datos = array(
			"clave" =>md5($this->input->post("clave")),
			"clave_repeat" =>md5($this->input->post("clave_repeat")),
		);
		$this->Usuario_model->update_clave_users($datos,$id);
		echo "Se actualizó Correctamente";

	} 
 

	public function eliminar_usuario()
	{
        $this->Usuario_model->eliminar_usuario($_POST["user_id"]); 
        $this->Usuario_model->elimina_imagen_anterior_id_usuario($_POST["user_id"]);
        $this->Usuario_model->eliminar_ts_desarrollo_capacitacion_archivo($_POST["user_id"]);
        $this->Usuario_model->eliminar_datos_personales($_POST["user_id"]); 
        $this->Usuario_model->ts_datos_educacion_superior($_POST["user_id"]); 
        $this->Usuario_model->eliminar_data_datos_familiares($_POST["user_id"]);
        $this->Usuario_model->eliminar_datos_regimen_penitenciario($_POST["user_id"]);
        $this->Usuario_model->eliminar_ts_datos_salud($_POST["user_id"]);
        $this->Usuario_model->eliminar_ts_datos_formacion_academica($_POST["user_id"]);
		$this->Usuario_model->eliminar_ts_datos_referentes($_POST["user_id"]);
		$this->Usuario_model->eliminar_ts_desarrollo_capacitacion($_POST["user_id"]);






	}

	public function mi_perfil()
	{
		if ($this->session->userdata('session_id')=='') {
			redirect(base_url().'Login');
		}

		$data = array(
			'title' => array("tu perfil","Lista de Usuarios","<a class='text-white' href='javascript:void(0)'>Agregar Nuevo Usuario</a>","Evaristo Escudero Huillcamascco"),
			'nombre_empresa' => $this->Usuario_model->nombre_empresa(),
			'miperfil'=> $this->Usuario_model->mi_perfil(),
			'publicidad'=>$this->Usuario_model->publicidad(),
		);

		$this->load->view('intranet_view/head',$data);
		$this->load->view('intranet_view/title',$data);
		$this->load->view('usuario/perfil',$data);
		$this->load->view('intranet_view/footer',$data);
	}

	public function actualizar_empresa_id_empresa()
	{
		if ($this->session->userdata('session_id')=="") {
			redirect(base_url());
		}
		$id_empresa = $this->input->post('id_empresa');
		$data = array(
			'empresa' =>$this->input->post('empresa'),
			'razon_social' =>$this->input->post('razon_social'),
			'ruc' =>$this->input->post('ruc'),
			'web' =>$this->input->post('web'),
			'url_ubicacion'=>$this->input->post('url_ubicacion'),
			'pais' =>$this->input->post('pais'),
		);
		$this->Usuario_model->actualizar_empresa_id_empresa($id,$data);
		echo json_encode(array("mensaje"=>"Se registro correctamente"));
	}

	public function Generate_ficha_personal()
	{
		$data['segmento']=$this->uri->segment(4,0); 
		if (!$data['segmento']) {
			$data['generate_pdf_users'] = $this->Usuario_model->generate_pdf_users();
		}else{
			$data['generate_pdf_users'] = $this->Usuario_model->generate_pdf_users($data['segmento']);
		}
		$data['lista_registro_familiares_parentesco'] = $this->Usuario_model->lista_registro_familiares_parentesco($this->uri->segment(4,0));
		$data['ts_datos_formacion_academica']= $this->Usuario_model->ts_datos_formacion_academica($this->uri->segment(4,0));
		$data['ts_datos_educacion_superior']= $this->Usuario_model->ts_datos_educacion_superiorxx($this->uri->segment(4,0));
		$data['ts_datos_ediomasxx']= $this->Usuario_model->ts_datos_ediomasxx($this->uri->segment(4,0));
		$data['ts_datos_experiencia_laboral']= $this->Usuario_model->ts_datos_experiencia_laboral($this->uri->segment(4,0));
		$data['ts_datos_desarrollo_capacitacionxx']= $this->Usuario_model->ts_datos_desarrollo_capacitacionxx($this->uri->segment(4,0));
		$data['tipo_enfermedades'] = $this->Usuario_model->tipo_enfermedades($this->uri->segment(4,0));
		//contar
		$data['cuenta'] = $this->Usuario_model->cuenta($this->uri->segment(4,0));
		$this->load->view('pdf/generate_pdf_users',$data);
		 
   	 
	}


/*
	public function Generate_ficha_personal()
	{
		$query = $this->db->query("select * from ts_datos_personales where url='".$this->uri->segment(4,0)."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
		}
		ini_set('max_execution_time', 300);

		$data['segmento']=$this->uri->segment(4,0);

		if (!$data['segmento']) {
			$data['generate_pdf_users'] = $this->Usuario_model->generate_pdf_users();
		}else{
			$data['generate_pdf_users'] = $this->Usuario_model->generate_pdf_users($data['segmento']);
		}
		$data['lista_registro_familiares_parentesco'] = $this->Usuario_model->lista_registro_familiares_parentesco($this->uri->segment(4,0));
		$data['ts_datos_formacion_academica']= $this->Usuario_model->ts_datos_formacion_academica($this->uri->segment(4,0));
		$data['ts_datos_educacion_superior']= $this->Usuario_model->ts_datos_educacion_superiorxx($this->uri->segment(4,0));
		$data['ts_datos_ediomasxx']= $this->Usuario_model->ts_datos_ediomasxx($this->uri->segment(4,0));
		$data['ts_datos_experiencia_laboral']= $this->Usuario_model->ts_datos_experiencia_laboral($this->uri->segment(4,0));
		$data['ts_datos_desarrollo_capacitacionxx']= $this->Usuario_model->ts_datos_desarrollo_capacitacionxx($this->uri->segment(4,0));
		//contar
		$data['cuenta'] = $this->Usuario_model->cuenta($this->uri->segment(4,0));

        $this->load->view('pdf/generate_pdf_users',$data);
        
        // Get output html 
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation or portrait
        $this->pdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream($nombrex, array("Attachment"=>0));
   	 
	}*/

	//mpdf
	public function Declaracion_jurada()
	{
		$this->load->view('pdf/declaracion_jurada');
	}


	/*public function Declaracion_jurada()
	{
		$query = $this->db->query("select * from ts_datos_personales where url='".$this->uri->segment(4,0)."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
		}
		$this->load->view('pdf/declaracion_jurada');
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation or portrait
        $this->pdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream($nombrex, array("Attachment"=>0));


	}*/
	public function Constancia_entrega_boletin_informativo()
	{
		
		$this->load->view('pdf/Constancia_entrega_boletin_informativo_view');

	}
/*
	public function Constancia_entrega_boletin_informativo()
	{
		$query = $this->db->query("select * from ts_datos_personales where url='".$this->uri->segment(4,0)."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
		}
		$this->load->view('pdf/Constancia_entrega_boletin_informativo_view');
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation or portrait
        $this->pdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream($nombrex, array("Attachment"=>0));
	}*/

	public function Reclamento_trabajo()
	{
		
		$this->load->view('pdf/Reclamento_trabajo_view');
        
	}
/*
	public function Reclamento_trabajo()
	{
		$query = $this->db->query("select * from ts_datos_personales where url='".$this->uri->segment(4,0)."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
		}
		$this->load->view('pdf/Reclamento_trabajo_view');
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation or portrait
        $this->pdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream($nombrex, array("Attachment"=>0));
	}
*/
	public function Boletin_Informativo()
	{
		
		$this->load->view('pdf/boletin_informativo');
        
        // Get output html

	}

	/*public function Boletin_Informativo()
	{
		$query = $this->db->query("select * from ts_datos_personales where url='".$this->uri->segment(4,0)."'");
		foreach ($query->result() as $emp) {
			$nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
		}
		$this->load->view('pdf/boletin_informativo');
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation or portrait
        $this->pdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream($nombrex, array("Attachment"=>0));
	}
	*/

	public function declaracion_jurada_domicilio()
	{
		$this->load->view("pdf/declaracion_jurada_domicilio");
	}


	//CON MDP -- REALIZACION DE A FUTURO

	public function mpdf()
	{
		$mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('prueba',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
	}

	//funcion listar ts_puesto

	public function listar_ts_puesto()
	{
		 // POST data
	    $postData = $this->input->post();
	    // Get data
	    $data = $this->Usuario_model->listar_ts_puesto_xx($postData);
	    echo json_encode($data);
	}

	public function listar_ts_areas()
	{
		 // POST data
	    $postData = $this->input->post();
	    // Get data
	    $data = $this->Usuario_model->listar_ts_areas_xx($postData);
	    echo json_encode($data);
	}
 

} ?>