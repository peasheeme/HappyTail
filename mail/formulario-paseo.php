<?php
//revisar que los campos no estén vacíos
	if(empty($_POST['c_name']) ||
		empty($_POST['c_lastname']) ||
		empty($_POST['c_phone']) ||
		empty($_POST['c_city']) ||
		empty($_POST['c_col']) ||
		empty($_POST['c_cantidad']) || 
		empty($_POST['c_petname']) || 
		empty($_POST['c_raza']) ||
		empty($_POST['exampleRadios1']) ||
		empty($_POST['exampleRadios2']) || 
		empty($_POST['c_motivo'])
		
	){
		echo "<script>alert('Favor de llenar todos los campos');</script>";
		echo "<script>window.location.href='http://www.happytail.mx/';</script>";
	}
	else{
		$nombre=htmlspecialchars($_POST['c_name']);
		$apellido=htmlspecialchars($_POST['c_lastname']);
		$telefono=htmlspecialchars($_POST['c_phone']);
		$ciudad=htmlspecialchars($_POST['c_city']);
		$col=htmlspecialchars($_POST['c_col']);
		$cantidad=htmlspecialchars($_POST['c_cantidad']);
		$petname=htmlspecialchars($_POST['c_petname']);
		$raza=htmlspecialchars($_POST['c_raza']);
		$raza=htmlspecialchars($_POST['exampleRadios1']);
		$raza=htmlspecialchars($_POST['exampleRadios2']);
		$motivo=htmlspecialchars($_POST['c_motivo']);
		

		//destinatario
		$destino="perla.holguin@3e-digital.com";

		//asunto
		$asunto="'.$nombre.' Solicitó un paseo gratis a HappyTail";

		//cabeceras
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		//contenido del mensaje
		$contenido = '
			<html>
			<head></head>
			<body>
				<p> <strong> '.$nombre.' ha llenado la solicitud para ser parte del equipo HappyTail a través del sitio HappyTail.mx </strong> </p>
				
				<p>Nombre: '.$nombre.'</p> 
				<p>Edad: '.$apellido.' </p>
				<p>Celular: '.$telefono.' </p>
				<p>Instagram: '.$ciudad.' </p>
				<p>Escuela: '.$col.' </p>
				<p>Carrera: '.$cantidad.' </p>
				<p>Carrera: '.$petname.' </p>
				<p>Carrera: '.$raza.' </p>
				<p>Carrera: '.$motivo.' </p>
				<p> Llama a '.$nombre.' a su celular '.$telefono.'</p> 
			</body>
			</html>
		';

		//envío de correo electrónico
		$envio = mail($destino, $asunto, $contenido, $headers);

		if($envio){
			echo "<script>alert('Tu solicitud ha sido enviada exitosamente Gracias!!');</script>";
			//Enviando autorespuesta
			$pwf_header = "perla.holguin@3e-digital.com\n"
			."Reply-to:perla.holguin@3e-digital.com \n";
			$pwf_asunto = "HappyTail Confirmacion";
			$pwf_dirigido_a = "$correo";
			$pwf_mensaje = "Hola $nombre gracias por contactarnos desde nuestro sitio web, \n"
			."Su mensaje ha sido recibido satisfactoriamente.\n"
			."Nos pondremos en contacto lo antes posible a su e-mail: $correo o su telefono $telefono \n"
			."Saludos!\n"
			."\n"
			."-----------------------------------------------------------------"
			."Favor de NO responder este e-mail ya que es generado Automaticamente.\n"
			."Este mensaje de correo electrónico puede contener información confidencial o
			 legalmente protegida y está destinado únicamente para el uso del destinatario (s)
			 previsto. Cualquier divulgación, difusión, distribución, copia o la toma de
			 cualquier acción basada en la información aquí contenida está prohibido.
			 Los correos electrónicos no son seguros y no se puede garantizar que esté 
			 libre de errores, ya que pueden ser interceptados, modificado, o contener virus.
			 Cualquier persona que se comunica con nosotros por e-mail se considera que ha 
			 aceptado estos riesgos.
			 HappyTail no se hace responsable de los errores u omisiones de este mensaje y
			 niega cualquier responsabilidad por daños derivados de la utilización del 
			 correo electrónico. 
			 Cualquier opinión y otra declaración contenida en este mensaje y cualquier
			 archivo adjunto son de exclusiva responsabilidad del autor y no representan 
			 necesariamente las de la empresa."
			."Atte: HappyTail \n";
			
			@mail($pwf_dirigido_a, $pwf_asunto, $pwf_mensaje, $pwf_header);
			echo "<script>window.location.href='http://www.happytail.mx/';</script>";
		}else{
			echo "<script>alert('Intentelo de nuevo en unos momentos, Redireccionando');</script>";
			echo "<script>window.location.href='http://www.happytail.mx/';</script>";
		}
	}

	?>