<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Correo_generator_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }

    public function saveTemplate($creator_user_id, $template, $template_name) {
        $data = array(
            'creator_id'=>$creator_user_id,
            'html_content'=>$template,
            'template_name'=>$template_name,
            'is_live'=>1
        );

        $this->db->insert('saved_editable_templates',$data);
    }

    public function obtainSavedTemplatesList($user_id) {
        $query = $this->db->query(
            "SELECT Id, template_name, creator_id, date_of_modification
            FROM saved_editable_templates
            WHERE creator_id = $user_id AND is_live = 1"            
        );

        return $query->result();
    }

    public function obtainSavedTemplate($template_id) {
        $query = $this->db->query(
            "SELECT *
            FROM saved_editable_templates
            WHERE Id = $template_id"
        );

        return $query->row();
    }

    public function removeTemplate($template_id) {
        $data = array("is_live"=>0);
        $this->db->where("Id", $template_id);
        $this->db->update("saved_editable_templates", $data);
        return true; 
    }

}
