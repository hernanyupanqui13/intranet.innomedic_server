<?php defined('BASEPATH') OR exit('No direct script access allowed');	/**
 * 
 */
use PHPMailer\PHPMailer\PHPMailer;

class Correo_generator extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct(); 
        ini_set('date.timezone', 'America/Lima'); 
        $this->load->model("Correo_generator_model");
	} 

    public function index() {

        if ($this->session->userdata("session_id")=="") {
			redirect(base_url().'Inicio/Zona_roja/'); 
			
        }

        
		$data = array(
            'title' =>array("estas viendo el generador de plantillas","Chat","","<a>Area de Sistemas</a>"),
        );

        $this->load->view('intranet_view/head',$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('email_template_builder/email_iframe');
        $this->load->view('intranet_view/footer',$data);
    }

    public function mainIframe() {
        $this->load->view('email_template_builder/template_builder');
    }


    /*
    Esta funcion envia el correo con la plantilla a la direccion especificada. Esta funcion por ahora no se esta usando
    */
    public function enviarCorreo() {
        $config = json_decode($_POST["config"]);

        $mi_correo = $config->mi_correo;
        $my_password = $config->mi_contrasena;
        $asunto = $config->asunto;
        $destination_list = $config->destination_list;

        $content = $_POST["content"];


        
        // PHPMailer object
        $mail = new PHPMailer();
	        
	        
        // Creando la configuracion del correo
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtpout.secureserver.net';
        $mail->SMTPSecure = false;
        $mail->SMTPDebug  = 3;
        $mail->Username = $mi_correo;
        $mail->Password = $my_password;
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false; 
        $mail->SMTPSecure = 'ssl';   
        $mail->Port     = 465;
        $mail->CharSet = 'UTF-8';
        $mail->AllowEmpty = true;                        
     
        
        $mail->setFrom($mi_correo, $asunto);
        $mail->addReplyTo($mi_correo, $asunto);
        
        // Add a recipient
        $mail->addAddress($destination_list);
        
        
        
        // Email subject
        $mail->Subject = $asunto;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = $content;
        $head = $this->load->view("email_template_builder/header_template", "", TRUE);
        $mail->Body = $head . $mailContent . "</body></html>";
        $mail->send();

    }

    public function guardarPlantilla() {

        $template = $_POST["template"];
        $template_name = $_POST["name"];

        $creator_user_id =  $this->session->userdata("session_id");

        
        $this->Correo_generator_model->saveTemplate($creator_user_id, $template, $template_name);
        
        echo json_encode($template); 
    }

    public function obtainSavedTemplatesList() {
        $user_id = $this->session->userdata("session_id");
        $the_list = $this->Correo_generator_model->obtainSavedTemplatesList($user_id);
        echo json_encode($the_list);        
    }

    public function obtainSavedTemplate($template_id) {
        //$template_id = $_POST["template_id"];

        echo json_encode($this->Correo_generator_model->obtainSavedTemplate($template_id));

    }

    public function removeTemplate() {
        $template_id = $_POST["template_id"];

        if($this->Correo_generator_model->removeTemplate($template_id)){
            echo "Template Removed";
        }
    }
}

?>