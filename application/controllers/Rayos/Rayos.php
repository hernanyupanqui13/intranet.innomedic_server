<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Rayos extends CI_Controller
{
     
    function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
        $this->load->helper(array('url','funciones'));
        $this->load->model("Rayos_model");
    }
     public function Mostrar_registros()
    {
        if($this->session->userdata('session_id')==''){
            redirect(base_url());
        }
           $data = array(
            'title' =>array("estas viendo registro de Rayox X","Rayo X","","<a target='_blank' href='https://www.facebook.com/escudero05' title=''>Evaristo Escudero Huillcamascco</a>"),
            'seleccione_sexo' => $this->Rayos_model->seleccione_sexo(),
            
             );


        $data['segmento']=$this->uri->segment(4,0); 

        if (!$data['segmento']) {
            $data['rayos_view_register'] = $this->Rayos_model->rayos_view_register();
            $data['vista_rayox'] = $this->Rayos_model->vista_rayox();
            
        }else{
            $data['rayos_view_register'] = $this->Rayos_model->rayos_view_register($data['segmento']);
             $data['vista_rayox'] = $this->Rayos_model->vista_rayox($data['segmento']);
        }

      
        
        $this->load->view("intranet_view/head",$data);
        $this->load->view("intranet_view/title",$data);
        $this->load->view('rayos/index',$data);
        $this->load->view("intranet_view/footer",$data);
    }


     public function Register_users_id()
    {
        $id =  $this->input->post("id_unico_rayox");
        if(!empty($_FILES['archivo']['name'])){ 
            $filesCount = count($_FILES['archivo']['name']); 
            for($i = 0; $i < $filesCount; $i++){ 
             //   $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                $_FILES['file']['type']     = $_FILES['archivo']['type'][$i]; 
                $_FILES['file']['tmp_name'] = $_FILES['archivo']['tmp_name'][$i]; 
                $_FILES['file']['error']    = $_FILES['archivo']['error'][$i]; 
                $_FILES['file']['size']     = $_FILES['archivo']['size'][$i]; 
                $_FILES['file']['name']     = "Boletas_".rand(100000000000000,900000000000000).'_'.$_FILES['archivo']['name'][$i];
                 
                // File upload configuration 
                $uploadPath = 'upload/archivos/rayos/'; 
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
                    $uploadData[$i]['archivo'] = $fileData['file_name'];
                    $uploadData[$i]['id_paciente'] = $id;
                    $uploadData[$i]['fecha'] = date("Y-m-d");

                }else{ 
                   // $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                    error_log("no se puedo intertar imagen");
                } 
            }                         // File upload error message 
           // $errorUpload = !empty($errorUpload)?' Upload Error: '.trim($errorUpload, ' | '):''; 
             
            if(!empty($uploadData)){ 
                // Insert files info into the database 
                $insert = $this->Rayos_model->insert_archivos($uploadData); 

            

            }  
        } 

        if ($this->input->post("simod")=="" || $this->input->post("simod")==null ) {
            $od_radiogra = "";
        }else{
            $od_radiogra = $this->input->post("od_radiogra");
        }

          $data = array(
                'fechalec' => $this->input->post("fechalec"),
                'hora' => date('H:i:s'),
                'fecha_rad' => $this->input->post("fecha_rad"),
                'eacalidad' => $this->input->post("eacalidad"),
                'cauradio' => $this->input->post("cauradio"),
                'cauradio2' => $this->input->post("cauradio2"),
                'cauradio3' => $this->input->post("cauradio3"),
                'cauradio4' => $this->input->post("cauradio4"),
                'cauradio5' => $this->input->post("cauradio5"),
                'cauradio6' => $this->input->post("cauradio6"),
                'cauradio7' => $this->input->post("cauradio7"),
                'suder' => $this->input->post("suder"),
                'meder' => $this->input->post("meder"),
                'infder' => $this->input->post("infder"),
                'suizq' => $this->input->post("suizq"),
                'meizq' => $this->input->post("meizq"),
                'infizq' => $this->input->post("infizq"),
                'rxcem' => $this->input->post("rxcem"),
                'pepe' => $this->input->post("pepe"),
                'sepe' => $this->input->post("sepe"),
                'opacig' => $this->input->post("opacig"),
                'sipao' => $this->input->post("sipao"),
                'sifreo' => $this->input->post("sifreo"),
                'sidiao' => $this->input->post("sidiao"),
                'siotro' => $this->input->post("siotro"),
                'calpao' => $this->input->post("calpao"),
                'calfreo' => $this->input->post("calfreo"),
                'extpla' => $this->input->post("extpla"),
                'extplb' => $this->input->post("extplb"),
                'oblito' => $this->input->post("oblito"),
                'oblitd' => $this->input->post("oblitd"),
                'obliti' => $this->input->post("obliti"),
                'parpero' => $this->input->post("parpero"),
                'calpero' => $this->input->post("calpero"),
                'parfreo' => $this->input->post("parfreo"),
                'calfreno' => $this->input->post("calfreno"),
                'extpar' => $this->input->post("extpar"),
                'extparb' => $this->input->post("extparb"),
                'ancpara' => $this->input->post("ancpara"),
                'ancparb' => $this->input->post("ancparb"),
                'simaa' => $this->input->post("simaa"),
                'simat' => $this->input->post("simat"),
                'simax' => $this->input->post("simax"),
                'simbu' => $this->input->post("simbu"),
                'simca' => $this->input->post("simca"),
                'simcg' => $this->input->post("simcg"),
                'simcn' => $this->input->post("simcn"),
                'simco' => $this->input->post("simco"),
                'simcp' => $this->input->post("simcp"),
                'simcv' => $this->input->post("simcv"),
                'simdi' => $this->input->post("simdi"),
                'simef' => $this->input->post("simef"),
                'simem' => $this->input->post("simem"),
                'simes' => $this->input->post("simes"),
                'simfr' => $this->input->post("simfr"),
                'simhi' => $this->input->post("simhi"),
                'simho' => $this->input->post("simho"),
                'simid' => $this->input->post("simid"),
                'simih' => $this->input->post("simih"),
                'simkl' => $this->input->post("simkl"),
                'simme' => $this->input->post("simme"),
                'simpa' => $this->input->post("simpa"),
                'simpb' => $this->input->post("simpb"),
                'simpi' => $this->input->post("simpi"),
                'simpx' => $this->input->post("simpx"),
                'simra' => $this->input->post("simra"),
                'simrp' => $this->input->post("simrp"),
                'simtb' => $this->input->post("simtb"),
                'simod' => $this->input->post("simod"),
                'sidiad' =>$this->input->post("sidiad"),
                'cie_10' => $this->input->post("cie_10"),
                'diag' => $this->input->post("diag"),
                'reco1' => $this->input->post("reco1"),
                'cie_102' => $this->input->post("cie_102"),
                'diag2' => $this->input->post("diag2"),
                'reco2' => $this->input->post("reco2"),
                'cie_103' => $this->input->post("cie_103"),
                'diag3' => $this->input->post("diag3"),
                'reco3' => $this->input->post("reco3"),
                'diagnostico' => $this->input->post("diagnostico"),
                'antecedentes'=> $this->input->post("antecedentes"),
                'anopleu'=>$this->input->post("anopleu"),
                'simbolos'=>$this->input->post("simbolos"),
                'caldiao'=>$this->input->post("caldiao"),
                'calotro'=>$this->input->post("calotro"),
                'ancpla'=>$this->input->post("ancpla"),
                'ancplb'=>$this->input->post("ancplb"),
                'od_radiogra'=> $od_radiogra,
                

             );

            //valimos si el campo ya existe o no para que mande segun registro


             $this->Rayos_model->update_rayox_x($id,$data);
             echo json_encode(array("mensaje"=>"Se Actualizo de Manera Correcta"));
        
     // echo json_encode(array('error'=>'El registro ya se encuentra asociado al usuario verificar por favor'));

    // $this->output->set_status_header(400);
        
    }

    public function actualizar_consentimiento()
    {
        $id =  $this->input->post("id_unico_rayox");
        if ($this->input->post("motivo")==4) {
            $data = $this->input->post("motivo1");
        }else{
            $data = "";
        }
        $data = array(
            'motivo' => $this->input->post("motivo"),
            'motivo1' => $data,
        );

        $this->Rayos_model->actualizar_consentimiento_xx($id,$data);
        echo json_encode(array("mensaje"=>"Se Actualizo de Manera Correcta"));
    }

    //obtenemos todo los registros mediante ajax

    public function mostrar_registros_via_ajax()
    {
        $id_paciente = $this->input->post("id_paciente");

        $data = $this->Rayos_model->mostrar_registros_via_ajax($id_paciente);
        echo json_encode($data);
    }

    public function mostrar_registros_via_ajax_archivos()
    {
        # code...
         $id_paciente = $this->input->post("id_paciente");

        $data = $this->Rayos_model->mostrar_registros_via_ajax_archivos($id_paciente);
        echo json_encode($data);
    }

    //mandamos

    public function mostramos_archivos_pdf()
    {
        $user_id = $this->input->post("user_id");
        $data = $this->Rayos_model->mostramos_archivos_pdf($user_id);
        echo json_encode($data);
    }

    public function mostramos_archivos_pdf_id_paciente()
    {
        $user_id = $this->input->post("id_paciente");
        $data = $this->Rayos_model->mostramos_archivos_pdf_id_paciente($user_id);
        echo json_encode($data);
    }

    //eliminamos los archivos que estan en la vista previa
    public function delete_archivo_id_paciente()
    {
        $user_id = $this->input->post("user_id");

        $this->Rayos_model->delete_archivo_id_paciente_image($user_id);
        $this->Rayos_model->delete_archivo_id_paciente($user_id);
       
    }

    //funcioin imprimir oit

    public function imprimir_data_oit()
    {
        $user_id = $this->input->post("user_id");
        $data = $this->Rayos_model->imprimir_data_oit($user_id);
        echo json_encode($data);
    }

    public function mostrar_registros_motivos_list()
    {
        $data = $this->Rayos_model->mostrar_registros_motivos_list();
        echo json_encode($data);
    }

    //mostramos rewgistros del oit

    public function mostrar_rwegistros_online_del_oit()
    {
        $user_id = $this->input->post("id_paciente");
        $data = $this->Rayos_model->mostrar_rwegistros_online_del_oit($user_id);
        echo json_encode($data);
    }

} ?>
 