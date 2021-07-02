<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class AreaSistemas_Model extends CI_Model
{
  
  function __construct() {
    parent::__construct();
    ini_set('date.timezone', 'America/Lima');
  }

  public function test() {
    
    return $this->db->query("SELECT * FROM empleados")->result();
  }
  

}