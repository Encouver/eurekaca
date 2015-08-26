<?php include_once('conex.php');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$link = Conexion::singleton();

	
		


		function correo($email)
		{
			$email = pg_escape_string($email); 

			
			
				$query = "INSERT INTO newsletter(correo) VALUES('" . $email . "')"; 

		        $result = pg_query($query); 
				
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
	            return "Error with query: " . $errormessage; 
	             
	        } 

			return  "Listo, tu mensaje ya fue recibido, te contactaremos"; 

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