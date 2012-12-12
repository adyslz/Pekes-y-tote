<?php
// Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
function clrAll($str) {
	$str=str_replace("&","&amp;",$str);
	$str=str_replace("\"","&quot;",$str);
	$str=str_replace("'","&apos;",$str);
	$str=str_replace(">","&gt;",$str);
	$str=str_replace("<","&lt;",$str);
	return $str;
}

//creo cabeceras desde PHP para decir que devuelvo un XML
header('Content-type: text/xml; charset="iso-8859-1"',true);

//comienzo a escribir el código del RSS
echo '<?xml version="1.0" encoding="iso-8859-1"?>';

//conexion a la base y consulta de datos
require_once("crud_usuario.php");
session_start();
$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
   if(!isset($_SESSION['access_token'])){
   	header("location: /pekes-tote/secciones/login.php?authenticate=1");
   }

   $query="select * from Evento where Evento.usuario=".$_SESSION["usuario"]["id"];
   $datos[]=select($query);
   $datos=$datos[0];

//Cabeceras del RSS
echo '<rss version="2.0" >';

//Datos generales del Canal. Edítalos conforme a tus necesidades
echo "<channel>\n";
echo "<title>Novedades de Eventos HackerGarage</title>";
echo "<link>http://alanturing.cucei.udg.mx/pekes-tote/index.php</link>";
echo "<description>Eventos recientes de HackerGarage.</description>";
echo "<language>es-es</language>";
echo "<copyright>PekesyTote</copyright>\n";

//para cada registro encontrado en la base de datos
//tengo que crear la entrada RSS en un item
foreach($datos as $dato)
{
	//elimino caracteres extraños en campos susceptibles de tenerlos
	$titulo=clrAll($dato['nombre']);			
	$desc=clrAll($dato['descripcion']);

	echo "<item>\n";
	echo "<title>$titulo</title>\n";
	echo "<description>$desc</description>\n";

	echo "</item>\n";
}

//cierro las etiquetas del XML
echo "</channel>";
echo "</rss>";


?>
