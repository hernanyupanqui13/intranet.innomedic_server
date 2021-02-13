<?php defined('BASEPATH') OR exit('No direct script access allowed');/**
 * 			
 */
class Employe_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//Mostrandolos dato de
	public function viewemploye()
	{
		$query = $this->db->query("select * from th_employe");
		return $query->result();
	}


} ?>