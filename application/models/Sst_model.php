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
    
    







}