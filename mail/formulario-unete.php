<?php
	//revisar que los campos no estén vacíos
	if(empty($_POST['c_name']) ||
		empty($_POST['c_age']) ||
		empty($_POST['c_phone']) ||
		empty($_POST['c_insta']) ||
		empty($_POST['c_school']) ||
		empty($_POST['c_carrera'])  
		
	){
		echo "<script>alert('Favor de llenar todos los campos');</script>";
		echo "<script>window.location.href='http://www.happytail.mx/';</script>";
	}else{
		$nombre=htmlspecialchars($_POST['c_name']);
		$edad=htmlspecialchars($_POST['c_age']);
		$telefono=htmlspecialchars($_POST['c_phone']);
		$instagram=htmlspecialchars($_POST['c_insta']);
		$escuela=htmlspecialchars($_POST['c_school']);
		$carrera=htmlspecialchars($_POST['c_carrera']);
		

		//destinatario
		$destino="hola@happytail.mx";

		//asunto
		$asunto="'.$nombre.' Solicitó unirse a HappyTail";

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
				<p>Edad: '.$edad.' </p>
				<p>Celular: '.$telefono.' </p>
				<p>Instagram: '.$instagram.' </p>
				<p>Escuela: '.$escuela.' </p>
				<p>Carrera: '.$carrera.' </p>
				<p> Llama a '.$nombre.' a su celular '.$telefono.'</p> 
			</body>
			</html>
		';

		//envío de correo electrónico
		$envio = mail($destino, $asunto, $contenido, $headers);

		if($envio){
			echo "<script>alert('Tu solicitud ha sido enviada exitosamente Gracias!!');</script>";
			//Enviando autorespuesta
			$pwf_header = "hola@happytail.mx\n"
			."Reply-to: hola@happytail.mx \n";
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