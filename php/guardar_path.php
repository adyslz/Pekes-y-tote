<?php

require_once("base.inc");

$conexion = new mysqli($dbhost, $dbuser, $dbpass, $db);

if ($conexion->connect_error) {
	die('Error de Conexión (' . $conexion->connect_errno . ') ' . $conexion->connect_error);
	}


$tamanioPermitido = 200 * 1024;


$extensionesPermitidas = array("jpg", "jpeg", "gif", "png");


$extension = end(explode(".", $_FILES["imagenEvento"]["name"]));

if(!is_dir(getcwd().'/img/'))
      mkdir(getcwd().'/img/', 0777);   


if ((($_FILES["imagenEvento"]["type"] == "image/gif")
   || ($_FILES["imagenEvento"]["type"] == "image/jpeg")
   || ($_FILES["imagenEvento"]["type"] == "image/png")
   || ($_FILES["imagenEvento"]["type"] == "image/pjpeg"))
&& ($_FILES["imagenEvento"]["size"] < $tamanioPermitido)
&& in_array($extension, $extensionesPermitidas))
{

  if ($_FILES["imagenEvento"]["error"] > 0)
  {
     echo "Código de error: " . $_FILES["imagenEvento"]["error"] . "<br />";
  }
  else
  {

    if (file_exists('/img/' . $_FILES["imagenEvento"]["name"]))
    {
       echo $_FILES["imagenEvento"]["name"] . " ya existe. ";
    }
    else
    {
	$rutaDestino = getcwd().'/img/'.$_FILES["imagenEvento"]["name"];

        if(move_uploaded_file($_FILES["imagenEvento"]["tmp_name"],$rutaDestino)){
		$query="
			insert into
				Evento
			values(imagen)
				\"$rutaDestino\"	
		";        	
		$conexion->query($query);
		$conexion->close();
		echo "Archivo guardado";
	}
		else
			echo 'Problema con la movida';
    }
  }
}
else
{
  echo "Archivo inválido";
}
?>
