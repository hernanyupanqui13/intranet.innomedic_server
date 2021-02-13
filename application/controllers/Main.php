<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
class Main extends CI_Controller {
        
        public $status; 
        public $roles;
    
        function __construct(){
            parent::__construct();
            ini_set('date.timezone', 'America/Lima');
            $this->load->model('User_model', 'user_model', TRUE);
            $this->load->library('form_validation');    
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->status = $this->config->item('status'); 
            $this->roles = $this->config->item('roles');
        }      
    
    public function index()
    {   
            if(empty($this->session->userdata['email'])){
                redirect(site_url().'Login/');
            }            
            /*front page*/
            $data = $this->session->userdata; 
            $this->load->view('header');            
            $this->load->view('index', $data);
            $this->load->view('footer');
    }
        
        
        public function register()
        {
             
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');    
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
                       
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('header');
                $this->load->view('register');
                $this->load->view('footer');
            }else{                
                if($this->user_model->isDuplicate($this->input->post('email'))){
                    $this->session->set_flashdata('flash_message', 'User email already exists');
                    redirect(site_url().'Login/');
                }else{
                    
                    $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                    $id = $this->user_model->insertUser($clean); 
                    $token = $this->user_model->insertToken($id);                                        
                    
                    $qstring = $this->base64url_encode($token);                    
                    $url = site_url() . 'Main/complete/token/' . $qstring;
                    $link = '<a href="' . $url . '">' . $url . '</a>'; 
                               
                    $message = '';                     
                    $message .= '<strong>You have signed up with our website</strong><br>';
                    $message .= '<strong>Please click:</strong> ' . $link;                          

                    echo $message; //send this in email
                    exit;
                     
                    
                };              
            }
        }
        
        
        protected function _islocal(){
            return strpos($_SERVER['HTTP_HOST'], 'local');
        }
        


        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'Login/');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('header');
                $this->load->view('complete', $data);
                $this->load->view('footer');
            }else{
                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);    
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->user_model->updateUserInfo($cleanPost);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your record');
                    redirect(site_url().'Login/');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'main/');
                
            }
        }
        

  
        
        public function forgot()
        {

            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
               // $this->load->view('header');
                $this->load->view('login/forgot');
                //$this->load->view('footer');
            }else{
                $email = $this->input->post('email');  
                //$clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($email);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'No podemos encontrar su dirección de correo electrónico.');
                    redirect(base_url().'Login/');
                }
              
                $nombre = $userInfo->nombre.' '.$userInfo->apellido_paterno.' '.$userInfo->apellido_materno; 
                $usuario = $userInfo->usuario; 
               //'user_id'=>$user_info->Id, 
               // 'token'=>$this->base64url_encode($token)
                

               // $nombres =  $this->user_model->nombres_completos($userInfo->Id);//
                
                $token = $this->user_model->insertToken($userInfo->Id);  
                                   
                $qstring = $this->base64url_encode($token);                  
                $url = base_url() . 'main/reset_password/token/' . $qstring;
                $link = '<a class="btn btn-rounded btn-success" href="' . $url . '">' . $url . ' Click Aqui</a>'; 
            
                // Load PHPMailer library
                $this->load->library('phpmailer_lib');
                
                // PHPMailer object
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'escudero059407@hotmail.com';
                $mail->Password = 'Escuderohh';
                $mail->SMTPSecure = 'tls';
                $mail->Port     = 587;
                $mail->CharSet = 'UTF-8';
               // $mail->Host = 'localhost';
                //$mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false; 
                $mail->CharSet = 'UTF-8';


                //Mandamos a los correos

                $mail->setFrom('escudero059407@hotmail.com', 'Innomedic.pe | Restablecer la Contraseña');

                $mail->addReplyTo($this->input->post('email'), 'Innomedic.pe | Restablecer la Contraseña');
                $mail->addAddress($this->input->post('email'),  $nombre); 
                $mail->addCC('resetpassword@innomedic.pe', 'Reset Password');


                $mail->Subject = 'Bienvenido '.$nombre.' | Restableceras tu Contraseña';
               
                // Set email format to HTML
                $mail->isHTML(true);
                $mailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Demystifying Email Design</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body style="margin: 0; padding: 0;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td style="padding: 10px 0 30px 0;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                    <tr>
                                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                            <img src="http://intranet.metjetsac.com/upload/mail/h1.gif" alt="INNOMEDIC INTERNATIONAL E.I.R.L" width="300" height="230" style="display: block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
                                                        <b>Innomedic.pe | Restablecer la Contraseña</b><br />
                                                        <span>Hola: '.$nombre.'</span>
                                                        <p>Usuario: '.$usuario.'</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                        Se solicitó un restablecimiento de contraseña para esta cuenta de correo electrónico
                                                        Por favor haga clic:
                                                        '.$link.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td width="260" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                        <tr>
                                                                            <td>
                                                                                <img src="http://intranet.metjetsac.com/upload/mail/left.gif" alt="" width="100%" height="140" style="display: block;" />
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
                                                                                <img src="http://intranet.metjetsac.com/upload/mail/right.gif" alt="" width="100%" height="140" style="display: block;" />
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
                                                                        <img src="http://intranet.metjetsac.com/upload/mail/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                                    </a>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                                    <a href="https://www.facebook.com/InnomedicInternational" style="color: #ffffff;">
                                                                        <img src="http://intranet.metjetsac.com/upload/mail/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
                            if(!$mail->send()){
                                 $this->session->set_flashdata('flash_message', 'No se a enviado el email');
                              //  echo json_encode(array("error"=>"Su petición no a sido enviada"));
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }else{
                                //echo json_encode(array("sms"=>"Su petición a sido enviada"));
                                
                                 $this->session->set_flashdata('flash_message', 'Email enviado correctamente');
                            }
                             redirect(base_url().'Login');
            }


            
        }


        //recuperar contraseña de  intranet
        //
         public function forgot_passwrod()
        {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
               // $this->load->view('header'); 
                $this->load->view('login/forgot_password');
                //$this->load->view('footer');
            }else{
                $email = $this->input->post('email');  
                //$clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($email);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_messagex', 'No podemos encontrar su dirección de correo electrónico.');
                    redirect(base_url());
                }
              
                $nombre = $userInfo->nombre.' '.$userInfo->apellido_paterno.' '.$userInfo->apellido_materno; 
                $usuario = $userInfo->usuario; 
               //'user_id'=>$user_info->Id, 
               // 'token'=>$this->base64url_encode($token)
                

               // $nombres =  $this->user_model->nombres_completos($userInfo->Id);//
                
                $token = $this->user_model->insertToken($userInfo->Id);  
                                   
                $qstring = $this->base64url_encode($token);                  
                $url = base_url() . 'main/reset_password/token/' . $qstring;
                $link = '<a class="btn btn-rounded btn-success" href="' . $url . '">' . $url . ' Click Aqui</a>'; 
            

                $mail = new PHPMailer();
                // Load PHPMailer library
              //  $this->load->library('phpmailer_lib');
                
                // PHPMailer object
               // $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();


                $mail->Host     = 'ssl://ssmtp.innomedic.pe';
                $mail->SMTPSecure = false;
              //  $mail->SMTPAuth = true;
                //$mail->SMTPDebug  = 3;
                $mail->Username = 'resetpassword@innomedic.pe';
                $mail->Password = 'resetpassword2019';
                $mail->Host = 'localhost';
                $mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false; 
               // $mail->Port = 465; 
               // $mail->SMTPSecure = 'ssl';
                $mail->Port     = 25;
                $mail->CharSet = 'UTF-8';
               // $mail->Host     = 'smtp.office365.com';
              /*  $mail->Host     = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'escudero059407@hotmail.com';
                $mail->Password = 'Escuderohh';
                //$mail->SMTPSecure = 'STARTTLS';
                $mail->SMTPSecure = 'tls';
              //  $mail->Port     = 587;
                $mail->Port     = 587;
                $mail->CharSet = 'UTF-8';
                $mail->SMTPDebug = 2;

               // $mail->Host = 'localhost';
                //$mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false; 
                $mail->CharSet = 'UTF-8';
                 $mail->AllowEmpty = true;*/

/*

                $mail->Host     = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'escudero059407@hotmail.com';
                $mail->Password = 'Escuderohh';
                $mail->SMTPSecure = 'tls';
                $mail->Port     = 587;
                $mail->CharSet = 'UTF-8';
               // $mail->Host = 'localhost';
                //$mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false; 
                $mail->CharSet = 'UTF-8';
*/



                //Mandamos a los correos

                $mail->setFrom('resetpassword@innomedic.pe', 'Innomedic.pe | Restablecer la Contraseña');

                $mail->addReplyTo($this->input->post('email'), 'Innomedic.pe | Restablecer la Contraseña');
                $mail->addAddress($this->input->post('email'),  $nombre); 
                $mail->addCC('resetpassword@innomedic.pe', 'Reset Password');


                $mail->Subject = 'Bienvenido '.$nombre.' | Restableceras tu Contraseña';
               
                // Set email format to HTML
                $mail->isHTML(true);
                $mailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Demystifying Email Design</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body style="margin: 0; padding: 0;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td style="padding: 10px 0 30px 0;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                    <tr>
                                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                            <img src="http://intranet.metjetsac.com/upload/mail/h1.gif" alt="INNOMEDIC INTERNATIONAL E.I.R.L" width="300" height="230" style="display: block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
                                                        <b>Innomedic.pe | Restablecer la Contraseña</b><br />
                                                        <span>Hola: '.$nombre.'</span>
                                                        <p>Usuario: '.$usuario.'</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                        Se solicitó un restablecimiento de contraseña para esta cuenta de correo electrónico
                                                        Por favor haga clic:
                                                        '.$link.'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td width="260" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                        <tr>
                                                                            <td>
                                                                                <img src="http://intranet.metjetsac.com/upload/mail/left.gif" alt="" width="100%" height="140" style="display: block;" />
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
                                                                                <img src="http://intranet.metjetsac.com/upload/mail/right.gif" alt="" width="100%" height="140" style="display: block;" />
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
                                                                        <img src="http://intranet.metjetsac.com/upload/mail/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                                    </a>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                                    <a href="https://www.facebook.com/InnomedicInternational" style="color: #ffffff;">
                                                                        <img src="http://intranet.metjetsac.com/upload/mail/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
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
                            if(!$mail->send()){
                                 $this->session->set_flashdata('flash_messagex', 'No se a enviado el email '.$mail->ErrorInfo.'');
                              //  echo json_encode(array("error"=>"Su petición no a sido enviada"));
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            }else{
                                //echo json_encode(array("sms"=>"Su petición a sido enviada"));
                                
                                  $this->session->set_flashdata('flash_messagexxx', 'Email enviado correctamente');
                            }
                redirect(base_url());
            }

            

          /*  
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
               // $this->load->view('header');
               $this->load->view('login/forgot_password');
                //$this->load->view('footer');
                
            }else{
                $email = $this->input->post('email');  
                //$clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($email);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_messagex', 'No podemos encontrar su dirección de correo electrónico.');
                    redirect(base_url().'Intranet/');
                }   
                
                $token = $this->user_model->insertToken($userInfo->Id);                        
                $qstring = $this->base64url_encode($token);                  
                $url = base_url() . 'main/reset_password/token/' . $qstring;
                $link = '<a  href="' . $url . '">' . $url . '</a>'; 
            
                
   

               $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                //$message = '';                     
               // $message .= '<strong>A password reset has been requested for this email account</strong><br>';
                //$message .= '<strong>Please click:</strong> ' . $link;             

                //echo $message; //send this through mail
                //exit;

                //$htmlContent = $url = base_url() . 'main/reset_password/token/' . $qstring;
                //$htmlContent .= $link = '<a href="' . $url . '">' . $url . '</a>'; 
                $this->load->library('email');
                $htmlContent = "<strong>Se solicitó un restablecimiento de contraseña para esta cuenta de correo electrónico</strong><br>";
                $htmlContent .= '<strong>Por favor haga clic:</strong> '.$link;

                    
                $config['mailtype'] = 'html';
               
                $config['protocol'] = 'ssmtp';
                $config["smtp_host"] = 'ssl://ssmtp.innomedic.pe';
                $config["smtp_user"] = 'resetpassword@innomedic.pe';
                $config["smtp_pass"] = 'resetpassword2019';   
                $config["smtp_port"] = '465';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['validate'] = true;

                $this->email->initialize($config);
                // datos a  mandar
                $this->email->from('resetpassword@innomedic.pe', 'Innomedic.pe | Restablecer la Contraseña');
                 //para quien va la nota
                $this->email->to($this->input->post('email'));
                 //Definimos el asunto del mensaje
                $this->email->subject('Innomedic.pe - Recuperacion Contraseña');
               //mensaje
                $this->email->message($htmlContent);   
                //mandamos datos
                if($this->email->send()){
                    $this->session->set_flashdata('flash_messagexxx', 'Email enviado correctamente');
                }else{
                    $this->session->set_flashdata('flash_messagex', 'No se a enviado el email');
                }


                redirect(base_url());

                
            }*/
            
        }



        public function reset_password()
        {
            $token = $this->base64url_decode($this->uri->segment(4));                  
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token es invalido o a expirado');
                redirect(base_url().'Intranet/');
            }            
            $data = array(
                'nombre'=> $user_info->nombre, 
                'email'=>$user_info->email, 
                'usuario' => $user_info->usuario, 
               //'user_id'=>$user_info->Id, 
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
               // $this->load->view('header');
                $this->load->view('email/reset_password', $data);
                //$this->load->view('footer');
            }else{
                                
               // $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post); 
                $hashed =md5($this->input->post("password"));               
              //  $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                $cleanPost['user_id'] = $user_info->Id;
                unset($cleanPost['passconf']);                
                if(!$this->user_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_messagexxx', 'Hubo un problema al actualizar tu contraseña');
                }else{
                    $this->session->set_flashdata('flash_messagexxx', 'Su contraseña ha sido actualizada Ahora puede iniciar sesión');
                }
                redirect(base_url());                
            }
        }
        
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }       
}
