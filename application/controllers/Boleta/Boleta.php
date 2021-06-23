<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 use PHPMailer\PHPMailer\PHPMailer;

 //use PHPExcel_IOFactory;
class Boleta extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();

        ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
        $this->load->model(array('Boleta_model'));
	} 
    //esta parte de index y el boton buscar se quito a pedido de RRHH melissa salas chilo
    
	function index()
	{
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        $data['title'] = array("estas viendo la lista de boletas","Boleta","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>");

        if($this->uri->segment(4,0)==0 and $this->uri->segment(5,0)==0){
            //$desde  =   date('Y-m-d');
            //$hasta  =   date('Y-m-d');
            $desde  =   fecha_ymd(date('m/d/Y'));
            $hasta  =   fecha_ymd(date('m/d/Y'));
             
            $data['desdex']  =   "";
            $data['hastax']  =   "";
        }else{
            $desde  =   $this->uri->segment(4,0);
            $hasta  =   $this->uri->segment(5,0);
             
            $data['desdex']  =   fecha_mdy($this->uri->segment(4,0));
            $data['hastax']  =   fecha_mdy($this->uri->segment(5,0));
        }
        
           
        $data['desde']  =   $desde;
        $data['hasta']  =   $hasta;

        $estado =   $this->uri->segment(6,0);
        $numboleta =   $this->uri->segment(7,0);
        $ano =   $this->uri->segment(8,0);
        $mes =   $this->uri->segment(9,0);

        $data['lista_escudero_by_boleta']  =   $this->Boleta_model->lista_escudero_by_boleta($desde,$hasta,$estado,$numboleta,$ano,$mes);
        $data['lista_escudero_by_boleta_administrador']  =   $this->Boleta_model->lista_escudero_by_boleta_administrador($desde,$hasta,$estado,$numboleta);
        $data['tipo_documento'] = $this->Boleta_model->tipo_documento();
        $data['id_perfil'] = $this->Boleta_model->id_perfil();

        
		$this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('boleta/boleta_index',$data);
        $this->load->view("intranet_view/footer",$data);
	}


    public function buscar()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->input->post('desde')=='' or $this->input->post('hasta')==''){
            $desde  =   0;
            $hasta  =   0;
        }else{
            $desde  =   fecha_ymd($this->input->post('desde'));
            $hasta  =   fecha_ymd($this->input->post('hasta'));
        }

        $estado = $this->input->post('estado');
        
        if($estado==''){
            $estado =   0;
        }

        $numboleta = $this->input->post('numboleta');
        
        if($numboleta==''){
            $numboleta =   0;
        }

        $ano = $this->input->post('ano');
        
        if($ano==''){
            $ano =   0;
        }

        $mes = $this->input->post('mes');
        
        if($mes==''){ 
            $mes =   0;
        }
        
        echo json_encode(array('retorno' =>base_url().'Boleta/Boleta/index/'.$desde.'/'.$hasta.'/'.$estado.'/'.$numboleta.'/'.$ano.'/'.$mes.'/'));
        
        
    }

    //Ahora funciona desde aquí. 

    public function Nuevo_boleta()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        

        $data = array(
            'title' => array("estas viendo la lista de boletas","Boleta","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
            'lista_trabajadores' => $this->Boleta_model->lista_trabajadores($this->uri->segment(4,0)),
             );

        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('boleta/nueva_boleta_index',$data);
        $this->load->view("intranet_view/footer",$data);
    }

 

    public function regitrar_boletas(){ 

        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        

        $data = $galleryData = array(); 
        $errorUpload = ''; 

        $nombre = $this->input->post("nombrexx");
       // $numcomprobante =correlativo($this->input->post("nro"));
        $numcomprobante =$this->input->post("nro");
        $fecha = $this->input->post("fecha");
        $url =  md5($this->input->post("nombrexx").'-'.$this->input->post("nro").'-'.$this->input->post("fecha"));
        $usuario = $this->session->userdata("session_id");

        $count = $this->input->post('count');
        $nombres = $this->input->post('nombres');
        $email = $this->input->post('email');
        $id_usuario = $this->input->post('id_usuario');
        $boleta = $this->input->post('boleta');
        $ano = $this->input->post('ano');
        $mes = $this->input->post('mes');
        $archivo = $this->input->post('archivo');
        $nro_documento = $this->input->post('nro_documento');
        $puesto = $this->input->post('puesto');
        $area = $this->input->post('area');
        $fija = date("m");
        $estado = "1";
        $view = "1";
        
         
        // If add request is submitted 
        if($this->input->method() === 'post'){ 

             
            // Prepare gallery data 
            $galleryData = array( 
                'nombre' =>$nombre, 
                'nro' =>$numcomprobante,
                'id_usuario' => $usuario,
                'fecha' =>$fecha,
                'url' => $url,
                'estado' => "1", 
            ); 
             

            // Insert gallery data 
            $insert = $this->Boleta_model->agregar_boleta($galleryData); 
            $galleryID = $insert;  
                
            if($insert){ 
                if(!empty($_FILES['images']['name'])){ 
                    $filesCount = count($_FILES['images']['name']); 
                    for($i = 0; $i < $filesCount; $i++){ 
                        //   $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                        $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                        $_FILES['file']['name']     = "Boletas_".rand(100000000000000,900000000000000).'_'.$_FILES['images']['name'][$i];
                            
                        // File upload configuration 
                        $uploadPath = 'upload/boletas/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|png|gif|pdf|mp3|mp4|AVI|3GP|FLV|doc|docm|docx|dot|dotm|dotx|htm|html|odt|csv|txt|xls|xlsm|xlsx|xps|bmp|emf|odp|ppt|pptx|jpge|zip'; 
                        $config['max_size'] = '1000000000000000'; // whatever you need
                            
                        // Load and initialize upload library 
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config); 
                            
                        // Upload file to server 
                        if($this->upload->do_upload('file')){ 
                            // Uploaded file data 
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['id_bo_cabecera'] = $galleryID; 
                            $uploadData[$i]['archivo'] = $fileData['file_name']; 
                            $uploadData[$i]['fecha_enviado'] = date("Y-m-d H:i:s");
                            $uploadData[$i]['para'] = $nombres[$i];  
                            $uploadData[$i]['id_usuario'] = $id_usuario[$i];  
                            $uploadData[$i]['tipo_boleta'] = $boleta[$i];  
                            $uploadData[$i]['ano'] = $ano[$i];  
                            $uploadData[$i]['mes'] = $mes[$i]; 
                            $uploadData[$i]['estado'] = $estado;
                            $uploadData[$i]['url'] = $url; 
                            $uploadData[$i]['view'] = $view;  
                            $uploadData[$i]['dni'] = $nro_documento[$i]; 
                            $uploadData[$i]['puesto'] = $puesto[$i]; 
                            $uploadData[$i]['area'] = $area[$i];
                            $uploadData[$i]['email'] = $email[$i];
                            $uploadData[$i]['fija'] = $fija; 

                            //VALIDMAOS LA BOLETA QUE SE A A ENVIAR 

                            if ($boleta[$i] ==1) {
                                    $data_boleta[$i] ="Haberes";
                                }else if ($boleta[$i] ==2) {
                                    $data_boleta[$i] ="CTS";
                                }else{
                                    $data_boleta[$i] ="Gratificación";
                                }
                                
                                

                            //enviar boleta php mailer inicio
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

                            
                            //Mandamos a los correos
                            $mail->setFrom('reenviadorweb@innomedic.pe', 'Innomedic.pe | Boleta de Pago');

                            $mail->addReplyTo($email[$i], 'Innomedic.pe | Boleta de Pago');
                            $mail->addAddress($email[$i],  $nombres[$i]); 
                            $mail->addCC('reenviadorweb@innomedic.pe', 'Mail verificado');


                            $mail->Subject = 'Colaborador(a) '. $nombres[$i].' |  Boleta de Pago';
                            
                            // Set email format to HTML
                            $mail->isHTML(true);
                            $mailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml">
                            <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <title>BOLETA DE PAGO DE INNOMEDIC</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                            </head>
                            <body style="margin: 0; padding: 0;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                                    <tr>
                                        <td style="padding: 10px 0 30px 0;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                                <tr>
                                                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
                                                                    <center><img src="http://innomedic.metjetsac.com/public/assets/images/logo.png" alt=""></center>
                                                                    <span style="margin-right: 270px;"><b>Estimado Colaborador</b></span><br>
                                                                    
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                    <p style="text-align: justify;">
                                                                        Se le comunica que su Boleta de '.$data_boleta[$i].' perteneciente al mes de '.$mes[$i].' año '.$ano[$i].', fue adjunta al Intranet de Innomedic. </p>
                                                                        <p>Podrá visualizarla a través del siguiente link <a target="_blank" href="http://intranet.innomedic.pe/">www.innomedic.pe</a>, accediendo con su usuario y contraseña.</p> 
                                                                        <p>Favor de revisarla y brindar su conformidad lo más pronto posible. </p>
                                                                    
                                                                    <span>Cualquier duda o consulta deberá ser realizada a:<br></span>
                                                                    <p>Correos: <a href="mailto:msalas@innomedic.pe">msalas@innomedic.pe</a> con copia a rrhh@innomedic.pe</p>
                                                                    <p> WhatsApp celular: <a href="tel:954 117 141">954 117 141</a></p>
                                                                    <p style="color: #EF1313">**En ambos casos, las consultas sobre boletas serán en el horario de Martes y Jueves de  15:00 a 17:00 horas.</p>
                                                                    <p><b>Saludos,</b></p>
                                                                    <p><b>Área de Recursos Humanos</b></p>
                                                                    <p><b>INNOMEDIC INTERNATIONAL E.I.R.L</b></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                        <h3 style="color: #153643; font-family: Arial, sans-serif;">¿Qué puedo hacer para mantener segura mi cuenta de Intranet?</h3>
                                                                        <tr>
                                                                            <td width="260" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <img src="http://intranet.innomedic.pe/upload/mail/left.gif" alt="" width="100%" height="140" style="display: block;" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                                            <b> Cambiar periódicamente la Contraseña:</b> Esto ayuda a que no rastreen tu contraseña y si alguien pudo obtenerlo, no podrá acceder si llegás a cambiarlo. Si te das cuenta que alguien ha estado enviando correo electrónico desde tu cuenta, es recomendable cambiar la contraseña lo antes posible.
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td style="font-size: 0; line-height: 0;" width="20">
                                                                                &nbsp;
                                                                            </td>
                                                                            <td width="260" valign="top">
                                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <img src="http://intranet.innomedic.pe/upload/mail/right.gif" alt="" width="100%" height="140" style="display: block;" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                                                <b>Usa contraseñas seguras:</b> Lo recomendable es que tengas una contraseña segura, indescifrable pero fácil de recordar. Algunas cuentas de correo de correo electrónico permiten incluir números y símbolos como contraseña, ejemplo: $%123//
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                                                    &reg; Av. Javier Prado Este 2638, San Borja, Lima, Perú<br/>
                                                                    <a href="#" style="color: #ffffff;"><font color="#ffffff">Mas informacion</font></a> Área de Sistemas T.I
                                                                    <br /><br />
                                                                    <a href="https://www.facebook.com/escudero05/" color="#ffffff" style="color: #ffffff;">Desarrollado por: Evaristo Escudero Huillcamascco</a>
                                                                </td>
                                                                <td align="right" width="25%">
                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                                                <a href="https://twitter.com/INNOMEDIC" style="color: #ffffff;">
                                                                                    <img src="http://intranet.innomedic.pe/upload/mail/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                                                </a>
                                                                            </td>
                                                                            <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                                            <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                                                <a href="https://www.facebook.com/InnomedicInternational" style="color: #ffffff;">
                                                                                    <img src="http://intranet.innomedic.pe/upload/mail/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                                                </a>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                            </html>';
                        
                        
                            $mail->Body = $mailContent;
                                        
                            // Send email
                            if(!$mail->send()) {
                                $this->session->set_flashdata('flash_messagex', 'No se a enviado el email '.$mail->ErrorInfo.'');
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                                echo json_encode(array("sms"=>"Su petición a sido enviada"));
                            }


                        } else { 
                            error_log("no se puedo intertar imagen");
                        } 
                    }
                        
                    if(!empty($uploadData)) {
                        $insert = $this->Boleta_model->save_detalle($uploadData);                     
                    } 
                }

                echo json_encode(array("mensaje"=> "Se registro de manera correcta"));
                    
                
            } else { 
                $data['error_msg'] = 'Some problems occurred, please try again.'; 
            } 
    
        } 
         
    } 


    public function view_bolesta_users($url)
    {
       $data = array(
            'title' => array("estas viendo la lista de boletas","Registro de Boleta","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
            'lista_fecha_boleta' => $this->Boleta_model->lista_fecha_boleta($url),
             );

        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('boleta/ver_por_fecha',$data);
        $this->load->view("intranet_view/footer",$data);
    }



  /*  public function regitrar_boletas()
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url());
        }
        if ($this->input->method() === 'post') {
            //cabecera
            $nombre = $this->input->post("nombre");
            $numcomprobante =correlativo($this->input->post("nro"));
            $fecha =$this->input->post("fecha");
            $url =  md5($this->input->post("nombre").'-'.$this->input->post("nro").'-'.$this->input->post("fecha"));
            $usuario = $this->session->userdata("session_id");

            $count = $this->input->post('count');
            $nombres = $this->input->post('nombres');
            $email = $this->input->post('email');
            $id_usuario = $this->input->post('id_usuario');
            $boleta = $this->input->post('boleta');
            $ano = $this->input->post('ano');
            $mes = $this->input->post('mes');
            $archivo = $this->input->post('archivo');
            $estado = "1";

            //agregar cabecera
            $data_number = array(
                'nombre' =>$nombre, 
                'nro' =>$numcomprobante,
                'id_usuario' => $usuario,
                'fecha' =>$fecha,
                'url' => $url,
                'estado' => "0",
            );
            
            if ($this->Boleta_model->agregar_boleta($data_number)) {
                 
                $id_boleta = $this->Boleta_model->lastID();
                $this->actualizar_comprobante();
                $this->save_detalle($count,$fecha,$id_boleta,$nombres,$id_usuario,$boleta,$ano,$mes, $archivo,$estado);
                echo json_encode(array("registro" => "Se registro de manera correcta"));
            }else{
                echo json_encode(array("error_registro" => "No se puedo registrar la venta"));
                $this->output->set_status_header(400);
            }
        }else{
            redirect(base_url().'Mantenimiento/Enviar_Boleta_Pago/');
        }
    }



    //actualizar numero de usuario
    protected function actualizar_comprobante(){

        $comprobanteActual = $this->Boleta_model->getComprobante();
        $data = array (
            'numero' => $comprobanteActual->numero + 1,
        );
        $this->Boleta_model->updateComprobante($data);
    }

    protected function save_detalle($count,$fecha,$id_boleta,$nombres,$id_usuario,$boleta,$ano,$mes, $archivo,$estado){
        for ($i =0; $i < count($count); $i++ ){

            $config['upload_path'] = 'upload/boletas/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['file_name'] = "Boleta_".rand().md5([$archivo][$i]);
            $config['max_size'] = '1000000';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
          
            if($this->upload->do_upload($archivo[$i])){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'][$i];

            }else{
                  $picture = "";

            }

            $data = array (
                    'fecha_enviado' =>$fecha, 
                    'id_bo_cabecera' => $id_boleta,
                    'para' => $nombres[$i],
                    'id_usuario' => $id_usuario[$i],
                    'tipo_boleta' =>$boleta[$i],
                    'ano' =>$ano[$i],
                    'mes' =>$mes[$i],
                    'archivo' =>$picture[$i],  
                    'estado' => $estado 
                );

                 $this->Boleta_model->save_detalle($data);

        } 
    }*/


    //mostrar registro de envio de boletas


    public function Registro_envio_boletas()
    {
        $data = array(
            'title' => array("estas viendo la lista de boletas","Registro de Boleta","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
            //'lista_entrega_boleta' => $this->Boleta_model->lista_entrega_boleta(),
             );


        if($this->uri->segment(4,0)==0 and $this->uri->segment(5,0)==0){
            $desde  =   date('Y-m-d');
            $hasta  =   date('Y-m-d');
            //$desde  =   fecha_ymd(date('m/d/Y'));
           // $hasta  =   fecha_ymd(date('m/d/Y'));
             
            $data['desdex']  =   "";
            $data['hastax']  =   "";
            }else{
                $desde  =   $this->uri->segment(4,0);
                $hasta  =   $this->uri->segment(5,0);
                 
                $data['desdex']  =   fecha_mdy($this->uri->segment(4,0));
                $data['hastax']  =   fecha_mdy($this->uri->segment(5,0));
            }
            if($this->uri->segment(6,0)==0){
                $data['num']    =  '';
            }else{
                $data['num']    =   $this->uri->segment(6,0);
            }
               

            $data['desde']  =   $desde;
            $data['hasta']  =   $hasta; 
            
            $numcomprobante =   $this->uri->segment(6,0);

            $data['lista_entrega_boleta']  =   $this->Boleta_model->lista_entrega_boleta($numcomprobante,$desde,$hasta);

        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('boleta/registro_envio_boletas_users',$data);
        $this->load->view("intranet_view/footer",$data);
    }


    public function buscar_users_boleta()
    {
       if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
        
        if($this->input->post('desde')=='' or $this->input->post('hasta')==''){
            $desde  =   0;
            $hasta  =   0;
        }else{
            $desde  =   fecha_ymd($this->input->post('desde'));
            $hasta  =   fecha_ymd($this->input->post('hasta'));
        }

       

        $numboleta = $this->input->post('numcomdni');
        
        if($numboleta==''){
            $numboleta =   0;
        }


        
        echo json_encode(array('retorno' =>base_url().'Boleta/Boleta/Registro_envio_boletas/'.$desde.'/'.$hasta.'/'.$numboleta.'/'));
    }

    public function buscar_ajax()
    {
        $nombres = $this->input->post('nombres');
        if($nombres==''){
            $nombres =  'innomedic';
        }
        
        $numboleta = $this->input->post('numcomdni');
        if($numboleta==''){
            $numboleta =   "00000000";
        }

        
      //  $ano = $this->input->post('ano');
       



        $data = $this->Boleta_model->buscar_por_ajax($nombres,$numboleta);

        echo json_encode($data);

    }

    public function obtener_detalle_de_boleta_por_usuario()
    {
        $id_usuario = $this->input->post('user_id');
        $ano = $this->input->post('fruit');
        $data = $this->Boleta_model->obtener_detalle_de_boleta_por_usuario($id_usuario,$ano);
        echo json_encode($data);

    }

   //descagar excel
    public function descargar_excel()
    {
       // $id_usuario = $this->input->post("id_usuario");
       // $ano_xx = $this->input->post("ano_xx");

        $id_usuario = $this->uri->segment(4,0);
        $ano_xx = $this->uri->segment(5,0);
       

        $data['lista'] = $this->Boleta_model->fetch_data($id_usuario,$ano_xx);
        
        $this->load->view('excel/reporte_users', $data);
         
    }

    

    public function descargar_pdf_view()
    {
       // $id_usuario = $this->input->post("id_usuario");
       // $ano_xx = $this->input->post("ano_xx");
        $id_usuario = $this->uri->segment(4,0);
        $ano_xx = $this->uri->segment(5,0);

        $query = $this->db->query("select * from ts_datos_personales where id_usuario='".$id_usuario."'");
        foreach ($query->result() as $emp) {
            $nombrex = $emp->apellido_paterno." ".$emp->apellido_materno.", ".$emp->nombres;
        }
        //ini_set('max_execution_time', 300);
        //contar
        $data['cuenta'] = $this->Boleta_model->cuenta($id_usuario,$ano_xx);

        $this->load->view('pdf/boleta',$data);


        
        // Get output html 
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
       $this->pdf->stream($nombrex, array("Attachment"=>1));
    }

    

    public function actualizar_estadode_conformidad()
    {
        if ($this->session->userdata("session_id")=="") {
            redirect(base_url());
        }

        $user_id = $this->input->post("user_id");
        if ($user_id =="" || $user_id ==NULL) {
            $data = array(
            'conforme' => 0
             );
        }else{
            $data = array(
            'conforme' => 1
            );
        } 

        $this->Boleta_model->actualizar_estadode_conformidad_x($user_id,$data);

 
    }

}
