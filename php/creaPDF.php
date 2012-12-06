<?php
	require('/fpdf/fpdf.php');
	session_start();
        
	$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
   if(!isset($_SESSION['access_token'])){
   	header("location: /pekes-tote/secciones/login.php?authenticate=1&force=1");
   }

   $query="select * from Evento where Evento.usuario=".$_SESSION["usuario"]["id"];
   $dato[]=select($query);
        
	class PDF extends FPDF{
		function Header() {
			$this -> SetFont('Courier','B',35);
			$this -> Cell(0,15,'Eventos',0,1,'C');
		}	
	}
	
	$pdf= new PDF();
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',16);
	
	foreach($pendientes as $dato){
		$pdf -> Cell(0,50,"Nombre: ".$dato['nombre'],1,2,'L');
		$pdf -> SetFont('Arial','',14);
		$pdf -> Image($dato['imagen'],140,40,60,40);
		$pdf -> Cell(0,50,"Descripción: ".$dato['descripcion'],0,2,'L');   
		$pdf -> Cell(0,50,"Precio: ".$dato['precio'].
			"     Categoría: ".$dato['categoria'],0,2,'L');
		$pdf -> Cell(0,50,"Capacidad: ".$dato['capacidad'].
			"     Fecha del Evento: ".$dato['fecha_evento'],0,2,'L');
		  
		if($dato["estado"]==3){
      	$pdf -> Cell(0,50,"Estado: Aprobado",0,2,'L');   	
      }
      elseif($dato["estado"]==2){
      	$pdf -> Cell(0,50,"Estado: ".$dato['Rechazado'],0,2,'L');
      }
      elseif($dato["estado"]==1){
         $pdf -> Cell(0,50,"Estado: ".$dato['Pendiente'],0,2,'L');
      } 	
   }	
	
	$pdf -> Output();
?>