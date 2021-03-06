<?php
	error_reporting(E_ERROR);
	require_once("/home/cc409/pekes-tote/data/dbData.inc");
	$create_permited=array("localhost:8888/Github/Pekes-y-tote/reg.php","alanturing.cucei.udg.mx/pekes-tote/reg.php");
	$modify_permited=array("localhost:8888/Github/Pekes-y-tote/edita.php","alanturing.cucei.udg.mx/pekes-tote/edita.php");
	$delete_permited=array("localhost:8888/Github/Pekes-y-tote/usuario.php","alanturing.cucei.udg.mx/pekes-tote/usuario.php");
	$changeStatus_permited=array("localhost:8888/Github/Pekes-y-tote/aprobEvento.php","alanturing.cucei.udg.mx/pekes-tote/aprobEvento.php");


	session_start();
	$referer=$_SESSION['referer'];
	$action=$_REQUEST["crud_action"];
	//error_log("aasfd");
	switch($action){
		case "create":
			if(in_array($referer, $create_permited)){
				create();
			}
		break;
		case "eventosXañoXmes":
			 agnoXmes();
		break;
		case "read":
			$x=read($_REQUEST['idEvento']);
			header('Content-Type: application/json');
			echo json_encode($x);
		break;
		case "modify":
			if(in_array($referer, $modify_permited)){
				modify();
			}
		break;
		case "delete":
			if(in_array($referer, $delete_permited)){
				delete($_REQUEST['idEvento']);
			}
		break;
		case "changeStatus":
			if(in_array($referer, $changeStatus_permited)){
				changeStatus($_REQUEST['idEvento']);
			}
		break;
		
	}

	function imagen($name,$usuarioId){
		$filedir="/home/cc409/pekes-tote/www/data/img/$usuarioId/";
		$tamanioPermitido = 200 * 1024;
		$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");
		$explodeRes=explode(".", $_FILES["imagenEvento"]["name"]);
		$extension = end($explodeRes);
		if(!is_dir($filedir)){
	      mkdir($filedir, 0777);
	      chmod($filedir,0777);//mkdir no respeta la configuracion del 0777
	    }
	    $filedir=$filedir.$name.'/';
      	if(!is_dir($filedir)){// no uso un mkdir true para poder asignarle 777 a las dos carpetas que se crean
      		mkdir($filedir, 0777);
      		chmod($filedir,0777);//mkdir no respeta la configuracion del 0777
      	}
		if ((($_FILES["imagenEvento"]["type"] == "image/gif")
	   	|| ($_FILES["imagenEvento"]["type"] == "image/jpeg")
	   	|| ($_FILES["imagenEvento"]["type"] == "image/png")
	   	|| ($_FILES["imagenEvento"]["type"] == "image/pjpeg"))
		&& ($_FILES["imagenEvento"]["size"] < $tamanioPermitido)
		&& in_array($extension, $extensionesPermitidas)){
	  		if ($_FILES["imagenEvento"]["error"] > 0){
	     		echo "Código de error: " . $_FILES["imagenEvento"]["error"] . "<br />";
	  		}
	  		else{
				if (file_exists('$filedir' . $_FILES["imagenEvento"]["name"])){
	       			echo $_FILES["imagenEvento"]["name"] . " ya existe. ";
	    		}
	    		else{
					$rutaDestino = $filedir.$_FILES["imagenEvento"]["name"];
	        		if(move_uploaded_file($_FILES["imagenEvento"]["tmp_name"],$rutaDestino)){
						return $rutaDestino;
					}
					else{
						echo 'Problema con la movida';
					}
	    		}
	  		}
		}
		else{
		  echo "Archivo inválido";
		}
	}

//regresa el id del autoincrement o 0 si no habia un autoincrement si falla regresa null
// notas de mejora recibir un arreglo seria lo mejor para solo insertar los campos que se tienen o son necesarios.
	function insert($str){
		$conexion=conexion();
		if (!$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
        	return -1;
    	}else{
    		$result=$conexion->insert_id;
    		$conexion->close();
    		return $result;
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
		$id_usuario=$_SESSION['usuario']['id'];
		$name=addslashes($_REQUEST['name']);
		$rutaDestino=imagen($name,$id_usuario);
		if(!is_null($rutaDestino)){
			$comment=addslashes($_REQUEST['comments']);
			$precio=addslashes($_REQUEST['precio']);
			$categoria=addslashes($_REQUEST['opcCat']);
			$capacidad=addslashes($_REQUEST['capacidad']);
			$fevento=date_create_from_format('j / m / Y',$_REQUEST['date']);
			$feventoStr=$fevento->format('Y-m-d H:i:s');
			$fcreacion=new DateTime();
			$fcreacionStr=$fcreacion->format('Y-m-d H:i:s');
			$query="INSERT INTO Evento(imagen,usuario,nombre,descripcion,precio,categoria,capacidad,fecha_evento,fecha_creacion,estado)
				VALUES ('$rutaDestino',$id_usuario,'$name','$comment','$precio','$categoria','$capacidad','$feventoStr','$fcreacionStr',1)";
			if(insert($query)==-1){
				deletePic($rutaDestino);
			}
			header("Location: ../index.php");
		}
	}

	function deletePic($str){
		if (is_writable($val)){// sin esta linea unlink no funciona bravo :)
			unlink($val);
		}
	}


	function read($id){
		$conexion=conexion();
		$query="SELECT 
    		Evento.id, 
    		Evento.nombre, 
    		Evento.descripcion, 
    		Evento.imagen, 
    		Evento.precio, 
    		Evento.fecha_evento, 
    		Evento.fecha_creacion, 
    		Evento.categoria, 
    		Evento.capacidad,
    		Usuario.nickname,
    		Usuario.id AS userid ,
    		Categoria.descripcion AS categoria
			FROM Evento
			LEFT JOIN Categoria ON Evento.categoria = Categoria.id
			LEFT JOIN Usuario ON Evento.usuario = Usuario.id
			WHERE Evento.id=".$id;
		$result=$conexion->query($query);
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
		deletePic($val);
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

	function changeStatus($id){
		$newStatus=$_REQUEST['stat'];
		$conexion=conexion();
		$aux="";
		if(isset($_REQUEST['comment'])){
			$aux='coment_admin =\''.addslashes($_REQUEST['comment']).'\',';
		}
		$str='UPDATE 
				Evento
			  set 
			  	'.$aux.'
			  	estado='.$newStatus.'
			  where
			  	id='.$id;
		if (!$conexion->query($str)) {
        	printf("Error: %s\n", $conexion->error);
        	$conexion->close();
    	}else{
    		$result=$conexion->affected_rows;
    		$conexion->close();
    		return $result;
    	}	
	}
	function agnoXmes(){
		$mes=$_REQUEST['mes'];
		$agno=$_REQUEST['agno'];
		$query="SELECT id,nombre FROM `Evento` where fecha_evento >= '".$agno."-".$mes."-1' and fecha_evento<date_add('".$agno."-".$mes."-1',interval 1 month)";
		$datos=select($query);
		$str="";
		foreach($datos as $dato){
			$str=$str.'
				<a href="detalle.php?id='.$dato['id'].'" ><h5>'.$dato['nombre'].'</h5></a><br />
			';
		}
		echo $str;
	}

	function readAll(){
		$conexion=conexion();
		$str="SELECT * FROM Evento WHERE 1";
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