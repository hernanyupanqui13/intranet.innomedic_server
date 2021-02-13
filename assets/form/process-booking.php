

<?php

	$to = "ventas@innomedic.pe";  // Your email here
	$from = $_REQUEST['bookingemail'];
	$name = $_REQUEST['bookingname'];
	$name = $_REQUEST['bookingemploye'];
	$phone = $_REQUEST['bookingphone'];
	$headers = "From: $from";
	$message = $_REQUEST['bookingmessage'];
	$subject = "Formulario de solicitud del sitio web de la clínica Innomedic International | Innomedic.pe";

	$fields = array();
	$fields{"bookingname"} = "Nombre del Cliente";
	$fields{"bookingemploye"} = "Nombre de la empresa";
	$fields{"bookingemail"} = "E-mail";
	$fields{"bookingphone"} = "Celular";
	$fields{"bookingmessage"} = "Mensaje del Cliente";

	$body = "Los datos del cliente:\n\n";
	foreach($fields as $a => $b){
		$body .= sprintf("%20s:%s\r\n",$b,$_REQUEST[$a]);
	}
	$send = mail($to, $subject, $body, $headers);

?>
