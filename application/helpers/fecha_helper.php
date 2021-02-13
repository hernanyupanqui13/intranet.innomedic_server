<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

function fecha($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
 ?>