<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function login_rules()
{
	return array(
       array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'El campo %s. es requerido',
                ),
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'El campo %s. es requerido',
                ),
        ),

		);
}
 ?>