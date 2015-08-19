	<html> 
    <body> 
<?php 

	if(isset($_POST['contacto']) && !empty($_POST['contacto'])){
		// Validar y almacenar la información en la base de datos
		//alert('Gracias por dejar el mensaje '.$_POST['contacto']['nombre'].' '.$_POST['contacto']['apellido']);
		
		$db = pg_connect('host=localhost dbname=eureka user=eureka password=eureka'); 

        $firstname = pg_escape_string($_POST['contacto']['nombre']); 
        $surname = pg_escape_string($_POST['contacto']['apellido']); 
		$tlf = pg_escape_string($_POST['contacto']['tlf']);
        $emailaddress = pg_escape_string($_POST['contacto']['correo']);
		$mensaje = pg_escape_string($_POST['contacto']['mensaje']);  
		
		
		$query = "INSERT INTO mensajes(nombre, apellido, telefono, correo, mensaje) VALUES('" . $firstname . "', '" . $surname . "', '" . $tlf . "', '" . $emailaddress . "', '" . $mensaje . "')"; 
        $result = pg_query($query); 
		
		if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
		//printf ("These values were inserted into the database - %s %s %s", $firstname, $surname, $emailaddress);
		echo "Mensaje recibido cone éxito."; 
        pg_close(); 
		
		header('Location: http://www.eureksolutions.com/');
		//echo 'Hola';
	}
	
        ?> 
		
    </body> 
</html> 
