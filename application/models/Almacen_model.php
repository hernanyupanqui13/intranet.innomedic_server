<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Almacen_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'America/Lima');
    }
    
    function lista(){
        $query = $this->db->query("select Id,producto,(select codigo from ta_productos where Id=a.producto) as codigo,total from ta_almacen a  order by Id asc");
        return $query->result();
    }

}