<?php
require_once("base.inc");
	$conexion = new mysqli($dbhost, $dbuser, $dbpass, $db);

	if ($conexion->connect_error) {
		die('Error de Conexión (' . $conexion->connect_errno . ') ' 
		. $conexion->connect_error);
	}

	$estatus = $_GET[opc];
		//rechazado=1;
		//aceptado=2;	

	//Validar las entradas para evitar inyecciones de sql 
	//Usar expresiones regulares y la función de mysqli 
	$estatus = $conexion -> real_escape_string($estatus); 
	
	$query = " 
		insert into 
			Estado_Evento 
		values(descripcion) 
			\"2\"
		";
	
	//Ejecutar el query 
	$conexion -> query($query);

	
	//Cerrar la conexion 
	$conexion -> close();
?>