<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        ini_set('date.timezone', 'America/Lima');
		$this->load->helper(array('url','funciones'));
        $this->load->model(array('Recursos_humanos_model'));
	} 
    

    
}
