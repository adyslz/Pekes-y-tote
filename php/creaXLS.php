<?php
	require('../fpdf/fpdf.php');
	require_once("crud_usuario.php");
	session_start();
        
	$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
   if(!isset($_SESSION['access_token'])){
   	header("location: /pekes-tote/secciones/login.php?authenticate=1");
   }
   
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	$query="select * from Evento where Evento.usuario=".$_SESSION["usuario"]["id"];
   $datos[]=select($query);
   $datos=$datos[0];
?>

<table cellspacing="0" cellpadding="0">
	<caption>Tabla de eventos</caption>
 	<tr>
		<th>Nombre</th>
 		<th>Categoria</th>
 		<th>Precio</th>
 		<th>Fecha del Eveto</th>
 	</tr>
 	<tr>
 	<?php
 		foreach($datos as $dato){
 			echo "<td>".$dato['nombre']."</td>
 			<td>".$dato['categoria']."</td>
 			<td>".$dato['precio']."</td>
 			<td>".$dato['fecha_evento']."</td>
 			</tr>";
 		}
 	?>
</table>