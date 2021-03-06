<?php
	require('../fpdf/fpdf.php');
	require_once("crud_usuario.php");
	session_start();
        
	$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
   if(!isset($_SESSION['access_token'])){
   	header("location: /pekes-tote/secciones/login.php?authenticate=1");
   }

   $query="select * from Evento where Evento.usuario=".$_SESSION["usuario"]["id"];
   $datos[]=select($query);
   $datos=$datos[0];
     
	class PDF extends FPDF{
		function Header() {
			$this -> SetFont('Courier','B',35);
			$this -> Cell(0,15,'Eventos',0,1,'C');
		}	
	}
	
	$pdf= new PDF();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',16);
	$i=50;
	
	foreach($datos as $dato){
		$pdf -> Cell(0,10,"Nombre: ".utf8_decode($dato['nombre']),1,2,'L');
		$pdf -> SetFont('Arial','',14);

		$str=$dato['descripcion'];	
		$str= str_replace("&nbsp;"," ", $str);
		$str= str_replace("<div>"," ", $str);
		$str= str_replace("</div>"," ", $str);
		$str= str_replace("<br>"," ", $str);
		if(strlen($str)>70) {
			$str1=utf8_decode(substr($str,0,70));
			$str2=utf8_decode(substr($str,71));
			$pdf -> Cell(80,10,"Descripcion: ".$str1,0,2,'L');   
			$pdf -> Cell(80,10,$str2,0,2,'L');   
		}
		else{
			$str1=$str;
			$pdf -> Cell(80,10,"Descripcion: ".$str1,0,2,'L');   
		}
		switch($dato['categoria']) {
			case 1: $categoria="Curso/Taller";break;
			case 2: $categoria="Conferencia";break;
			case 3: $categoria="Convivencia";break;
		}	
		
		$pdf -> Cell(120,10,"Precio: ".$dato['precio'].
			"     Categoria: ".$categoria,0,2,'L');
		
		$pdf -> Cell(120,10,"Capacidad: ".$dato['capacidad'].
			"     Fecha del Evento: ".$dato['fecha_evento'],0,2,'L');
		  
		switch($dato["estado"]) {		
			case 1: $estado="Pendiente";break;	
			case 2: $estado="Rechazado";break;	
			case 3: $estado="Aprobado";break;	
      }
      
     	$pdf -> Cell(120,10,"Estado: ".$estado,0,2,'L');
      $pdf -> Image($dato['imagen'],140,$i,60,40);
      $i+=70;
      $pdf -> Cell(120,20,"",0,2,'L');
		
   }	
	
	$pdf -> Output();
?>