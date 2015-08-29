<?php include_once('conex.php');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$link = Conexion::singleton();

	
		


		function correo($email)
		{
			$email = pg_escape_string($email); 

			
			
				$query = "INSERT INTO newsletter(correo) VALUES('" . $email . "')"; 

		        $result = @pg_query($query); 
				
				if (!$result) { 
		            $errormessage = pg_last_error(); 
		            return "Error with query: " . $errormessage;     
		        }
				
				return  "Listo, correo suscrito, te mantendremos informado"; 

			
			   return "Vaya, este correo ya ha sido suscrito";
			
		}

		

		function mensaje($datos)
		{
			$firstname = pg_escape_string($datos['contacto']['nombre']); 
	        $surname = pg_escape_string($datos['contacto']['apellido']); 
			$tlf = pg_escape_string($datos['contacto']['tlf']);
	        $emailaddress = pg_escape_string($datos['contacto']['correo']);
			$mensaje = pg_escape_string($datos['contacto']['mensaje']);  
			
			
			$query = "INSERT INTO mensajes(nombre, apellido, telefono, correo, mensaje) VALUES('" . $firstname . "', '" . $surname . "', '" . $tlf . "', '" . $emailaddress . "', '" . $mensaje . "')"; 
	        $result = pg_query($query); 
			
			if (!$result) { 
	            $errormessage = pg_last_error(); 

	            echo json_encode(['code'=>0,'mensaje'=>'Hubo un error procesando tu mensaje, por favor intentalo de nuevo.']);
	            return "Error with query: " . $errormessage; 
	             
	        } 

	/*		@mail("eureka@eureksolutions.com",
			        "Mensaje de: ".$firstname." ".$surname,
			        "Datos de contacto: ".$tlf."<br><br>".$mensaje,
			        "From: ". $emailaddress . "\r\n" . "Content-Type: text/html; charset=utf-8"/*,
			        "-fsender@example.com");*/

			// Guardar en archivo.txt
			doLog("Datos de la persona: ".$firstname." ".$surname." Teléfono: ".$tlf." Correo: ".$emailaddress." Mensaje: ".$mensaje."", "logs/mensajes.txt");
			// Guardar en archivo CSV
			doLog("".$firstname.";".$surname.";".$tlf.";".$emailaddress.";".$mensaje."", "logs/mensajes.csv");


			echo json_encode(["code"=>1,"mensaje"=>"Listo, tu mensaje ya fue recibido, te contactaremos."]);
			//return  "Listo, tu mensaje ya fue recibido, te contactaremos."; 

		}


		function doLog($text, $filename)
		{
		  // Abrir archivo log
		  $filename = $filename;
		  $fh = fopen($filename, "a") or die("No se pudo abrir el archivo de mensajes..");
		  fwrite($fh, date("d-m-Y, H:i")." - $text\n") or die("No se pudo guardar el mensaje en el log!");
		  fclose($fh);
		}

	if(@$_POST)
	{
		if(@$_POST['scenario']==1)
		{

			$aux = correo(@$_POST['email']);

			return $aux;

		}elseif (@$_POST['scenario']==2) {
			
		
			parse_str(@$_POST['datos'],$datos);

			$aux = mensaje($datos);

			return $aux;
		}
	}
?>