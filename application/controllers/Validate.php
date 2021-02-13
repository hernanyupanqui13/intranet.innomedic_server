<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 		
 */
class Validate extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	    ini_set('date.timezone', 'America/Lima');
	}

	public function index()
	{
		$this->load->view("login/validate");
	}
} ?>