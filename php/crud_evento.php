<?php
//	error_reporting(E_ERROR);
	$create_permited=array("localhost:8888/Github/Pekes-y-tote/reg.php","alanturing.cucei.udg.mx/pekes-tote/reg.php");
	session_start();
	$referer=$_SESSION['referer'];

	$action=$_REQUEST["crud_action"];
	switch($action){
		//error_log("aasfd")
		case "create":
			if(in_array($referer, $create_permited)){
			create();
			}
		break;
	}


	function create(){
		$filedir="/home/cc409/pekes-tote/data/img/";
		$conexion=conexion(0);
		$tamanioPermitido = 200 * 1024;
		$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");
		$explodeRes=explode(".", $_FILES["imagenEvento"]["name"]);
		$extension = end($explodeRes);
		if(!is_dir('/home/cc409/pekes-tote/data/img/'))
	      mkdir($filedir, 0777);

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
						$name=$_REQUEST['name'];
						$comment=$_REQUEST['comments'];
						$precio=$_REQUEST['precio'];
						$categoria=$_REQUEST['opcCat'];
						$capacidad=$_REQUEST['capacidad'];
						$fevento=date_create_from_format('j / m / Y',$_REQUEST['date']);
						$feventoStr=$fevento->format('Y-m-d H:i:s');
						$fcreacion=new DateTime();
						$fcreacionStr=$fcreacion->format('Y-m-d H:i:s');
						$usuario=$_SESSION['usuario'];
						$id_usuario=$usuario['id'];
						$query="INSERT INTO Evento(imagen,usuario,nombre,descripcion,precio,categoria,capacidad,fecha_evento,fecha_creacion,estado)
							VALUES ('$rutaDestino',$id_usuario,'$name','$comment','$precio','$categoria','$capacidad','$feventoStr','$fcreacionStr',1)";
			
						$conexion->query($query);
						$conexion->close();
						header("Location: ../index.php");
					}
					else
						echo 'Problema con la movida';
	    		}
	  		}
		}
		else{
		  echo "Archivo inválido";
		}
	}

	function read($id){
		$conexion=conexion(1);
		$result=$conexion->query("select * from Evento where id=$id");
		if($result->num_rows==1){
	 		$evento = $result -> fetch_assoc();
	 	}
	 	return $evento;
	}

	function update(){

	}

	function delete(){ 

	}

	function readAll(){

	}

	function conexion($val){
		if($val){
			require_once("../data/dbData.inc");
		}
		else{
			require_once("../../data/dbData.inc");
		}
		
		$conexion=new mysqli($host,$user,$pass,$database);
		if($conexion->connect_errno){
        	die('Error de Conexion '. $conexion->connect_errno ." : ".$conexion->connect_error);
        }
        return $conexion;
    }
	
	
?>