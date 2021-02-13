

	<?php

		$to = "ventas@innomedic.pe";  // Your email here
		$from = $_REQUEST['requestemail'];
		$name = $_REQUEST['requestname'];
		$employe = $_REQUEST['requestemploye'];
		$phone = $_REQUEST['requestphone'];
		$headers = "From: $from";
		$message = $_REQUEST['requestmessage'];
		$subject = "Formulario de solicitud del sitio web de la clínica Innomedic International | Innomedic.pe";


		$fields = array();

		$fields{"requestname"} = "Nombre del Cliente";
		$fields{"requestemploye"}="Nombre de la empresa";
		$fields{"requestemail"} = "Email";
		$fields{"requestphone"} = "Nº Celular";
		$fields{"requestmessage"} = "Mensaje";

		$body = "Aquí está lo que se envió:\n\n";

		foreach($fields as $a => $b){
		$body .= sprintf("%20s:%s\r\n",$b,$_REQUEST[$a]);
		}
		$send = mail($to, $subject, $body, $headers);

	?>

