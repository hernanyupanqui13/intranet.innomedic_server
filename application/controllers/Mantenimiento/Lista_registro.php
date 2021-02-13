<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 
 */
class Lista_registro extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		ini_set('date.timezone', 'America/Lima');
	}
	public function index()
	{
		echo "trabajando";
	}
} ?>