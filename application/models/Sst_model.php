<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sst_model extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }


    function viewSstDocuments($user_id, $sst_document_id) {
        $data = array(
            "user_id"=>$user_id,
            "sst_document_id"=>$sst_document_id,
            "was_viewed"=>1
        );

        if (!$this->db->insert("sst_document_users", $data)) {
            return $error = $this->db->error();
        } else {
            return true;
        }

    }

    public function getDocumentIdByName($name) {

        $query_string = 
            "SELECT Id 
            FROM sst_tipo_documentos
            WHERE nombre = '$name'
        ";

        $query = $this->db->query($query_string);
        $result = $query->row();
        if($result != null && $result != "") {
            return $result->Id;
        } else {
            return "No se encontro un documento con ese nombre";
        }

    }
    
    public function checkIfWasConfirmed($user_id, $document_id) {
        $query_string = (
            "SELECT EXISTS (SELECT sd.user_id
                FROM sst_document_users sd
                WHERE sd.user_id = $user_id
                AND sst_document_id = $document_id
                AND was_viewed = 1) 
                AS result"
        );

        $query = $this->db->query($query_string);

        return $query->row()->result;
    }

    public function getFullReportData() {
        $query = $this->db->query('SELECT std.nombre AS tipo_documento
                , tu.nombre, tu.apellido_paterno
                , tu.apellido_materno, tdp.nro_documento
                , fecha_visto, tu.Id
            FROM sst_document_users sdu
                INNER JOIN ts_usuario tu 
                    ON sdu.user_id = tu.Id
                INNER JOIN sst_tipo_documentos std
                    ON std.Id = sdu.sst_document_id
                INNER JOIN ts_datos_personales tdp
                    ON tdp.Id = tu.Id
            WHERE tu.Id != 89 AND tu.`status` != 2'
        );

        return $query->result();

    }

    public function getIndividualReport($user_id) {
        $query = $this->db->query("SELECT std.nombre AS tipo_documento
                , tu.nombre, tu.apellido_paterno
                , tu.apellido_materno, tdp.nro_documento
                , fecha_visto, tdp.puesto
            FROM sst_document_users sdu
                INNER JOIN ts_usuario tu 
                    ON sdu.user_id = tu.Id
                INNER JOIN sst_tipo_documentos std
                    ON std.Id = sdu.sst_document_id
                INNER JOIN ts_datos_personales tdp
                    ON tdp.Id = tu.Id
            WHERE tu.Id = $user_id"
        );

        return $query->row();
    }

    public function getDataOfUser($user_id=null) {
        if($user_id == null) {
            $user_id = $this->session->userdata('session_id');
        }
        

        $query = $this->db->query("SELECT nombres, tu.apellido_paterno, tu.apellido_materno
                , tdp.nro_documento, tdp.puesto
            FROM ts_usuario tu
                INNER JOIN ts_datos_personales tdp
                    ON tdp.Id = tu.Id
            WHERE tu.Id = $user_id
        ");

        return $query->row();


    }

    public function test() {
        $this->db->query("USE intra_v3");
        return $this->db->query("SELECT * FROM empleados")->result();
    }
    







}