<?php
	require_once("base.inc");
	$conexion = new mysqli($dbhost, $dbuser, $dbpass, $db);

	if ($conexion->connect_error) {
		die('Error de Conexión (' . $conexion->connect_errno . ') ' 
		. $conexion->connect_error);
	}

	$comentario = $_GET['textarea'];
		//rechazado=1;
		//aceptado=2;	

	//Validar las entradas para evitar inyecciones de sql 
	//Usar expresiones regulares y la función de mysqli 
	$comentario = $conexion -> real_escape_string($comentario); 
	
	$query = " 
		insert into 
			Estado_Evento 
		values(descripcion) 
			\"1\"
		";
	
	//Ejecutar el query 
	$conexion -> query($query);
	
	if($comentario=!'') {
		$query = " 
		update Estado_Evento 
		IF NOT EXISTS
			set comentario;
		insert into
			 Estado_Evento
		values(comentario) 
			\"$comentario\"
		";
		//Ejecutar el query 
		$conexion -> query($query);
	}
	
	//Cerrar la conexion 
	$conexion -> close();
?>