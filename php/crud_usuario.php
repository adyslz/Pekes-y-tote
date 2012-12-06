<?php
	error_reporting(E_ERROR);

	function insert($str){
		$conexion=conexion();
		if (!$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
    	}else{
    		$result=$conexion->insert_id;
    		$conexion->close();
    		return $result;
    	}	
	}
	function checkInsert($name,$imagen){
		$conexion=conexion();
		$mi_query="	SELECT id
				FROM `Usuario`
				WHERE nickname ='$name'";
	 	$result=$conexion->query($mi_query);
		 if($result->num_rows>=1){
	 		while($fila = $result -> fetch_assoc()){
	 			$datos[]=$fila;
	 		}
	 		$conexion->close();
	 		return $datos[0]['id'];
	 	}else{
	 		return insert("INSERT INTO Usuario(nickname,imagen,tipo)
	 					 VALUES	('$name','$imagen',2);");
	 	}

		
	}
//update regresa null si hay un error o columnas afectadas si sale bien.
// notas de mejora recibir un arreglo seria lo mejor, asi podria solo hacer update a los campos
//necesarios.
	function update($str){
		$conexion=conexion();
		if (!$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
    	}else{
    		$result=$conexion->affected_rows;
    		$conexion->close();
    		return $result;
    	}	
	}
//select regresa si hay un error o si no hay valores
//null o el arreglo de arreglos asociativos
	function select($str){
		$conexion=conexion();
		if (!$resultSet=$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
    	}else{
			if($resultSet->num_rows>=1){
		 		while($fila = $resultSet -> fetch_assoc())
		 			$result[]=$fila;    		
	 			$conexion->close();
    			return $result;
    		}	
		}
	}

	function create(){
		$usuario=addslashes($_SESSION['usuario']);
		$name=addslashes($_REQUEST['name']);
		$rutaDestino=imagen($name,$usuario['id']);
		if(!is_null($rutaDestino)){
			
			$comment=addslashes($_REQUEST['comments']);
			$precio=addslashes($_REQUEST['precio']);
			$categoria=addslashes($_REQUEST['opcCat']);
			$capacidad=addslashes($_REQUEST['capacidad']);
			$fevento=date_create_from_format('j / m / Y',$_REQUEST['date']);
			$feventoStr=$fevento->format('Y-m-d H:i:s');
			$fcreacion=new DateTime();
			$fcreacionStr=$fcreacion->format('Y-m-d H:i:s');
			$id_usuario=$usuario['id'];
			insert("INSERT INTO Evento(imagen,usuario,nombre,descripcion,precio,categoria,capacidad,fecha_evento,fecha_creacion,estado)
				VALUES ('$rutaDestino',$id_usuario,'$name','$comment','$precio','$categoria','$capacidad','$feventoStr','$fcreacionStr',1)");
			
			header("Location: ../index.php");
		}
	}

	function read($id){
		$conexion=conexion();
		$result=$conexion->query("select * from Evento where id=$id");
		if($result->num_rows==1){
	 		$evento = $result -> fetch_assoc();
	 	}
	 	return $evento;
	}


	function modify(){
		$id=addslashes($_REQUEST['idEventoToUpdate']);
		$band=0;
		$aux="";
		if(!empty($_FILES['imagenEvento']['name'])){
			deleteImagenDeEvento($id);
			$usuario=$_SESSION['usuario'];
			$name=addslashes($_REQUEST['nameHidden']);
			$rutaDestino=imagen($name,$usuario['id']);
			if(!is_null($rutaDestino)){
				$aux="imagen='$rutaDestino',";
			}
			else{
				$band=1;
			}
		}
		if($band==0){
			$comment=addslashes($_REQUEST['descripcion']);
			$precio=addslashes($_REQUEST['precio']);
			$capacidad=addslashes($_REQUEST['capacidad']);
			$fevento=date_create_from_format('j / m / Y',$_REQUEST['date']);
			$feventoStr=$fevento->format('Y-m-d H:i:s');
			update("UPDATE Evento
				SET
					$aux
					descripcion='$comment',
					precio='$precio',
					capacidad='$capacidad',
					fecha_evento='$feventoStr'
				WHERE
					id=$id");
			header("Location: ../index.php");

		}
	}

	function deleteImagenDeEvento($id){
		$mi_query="SELECT imagen
				FROM `Evento`
				WHERE id =$id";
	 	$result=select($mi_query);
	 	$val=$result[0]['imagen'];
		if (is_writable($val)){// sin esta linea unlink no funciona bravo :)
			unlink($val);
		}
	}

	function delete($id){ 
		$conexion=conexion();
		$str="DELETE FROM
				Evento
			  WHERE
			  	id=$id";
		if (!$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
    	}else{
    		$result=$conexion->affected_rows;
    		$conexion->close();
    		return $result;
    	}	
	}

	function readAll(){
		$conexion=conexion();
		$str="SELECT * FROM Evento WHERE 1";
		if (!$resultSet=$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
    	}else{
			if($resultSet->num_rows>=1){
		 		while($fila = $resultSet -> fetch_assoc()){
		 			$result[]=$fila;    		
		 		}
	 			$conexion->close();
    			return $result;
    		}	
		}
	}
//1 si es llamada de include en un  archivo directo en la raiz
//0 si es de php supongo que deberia de cambiar para mandarle la direccion del archivo inc
//tote
	function conexion(){

		require("/home/cc409/pekes-tote/data/dbData.inc");
		$conexion=new mysqli($host,$user,$pass,$database);
		if($conexion->connect_errno){
        	die('Error de Conexion '. $conexion->connect_errno ." : ".$conexion->connect_error);
        }
        return $conexion;
    }

?>