<?php
   	require_once("php/crud_usuario.php");
    session_start();
    $_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$query="SELECT 
    		Evento.id, 
    		Evento.nombre, 
    		Evento.descripcion, 
    		Evento.imagen, 
    		Evento.fecha_evento
		FROM Evento
		WHERE Evento.estado =1";

    $datos=select($query); 
    $eventList="";   
    $i=0;
 	foreach($datos as $dato)
    {
		try {
    		$date = new DateTime($dato["fecha_evento"]);
		} catch (Exception $e) {
    		echo $e->getMessage();
    		exit(1);
		}
		$time=getdate($date->getTimestamp());
    	if($i==0){
    		$i=1;
    	}else{
			$eventList=$eventList.',';
	    }
	    $mes=$time['mon']-1;
	    $eventList=$eventList.PHP_EOL.'
	    	{
	    		id:'.$dato['id'].',
	    		title:\''.$dato['nombre'].'\',
	    		start: new Date('.$time['year'].','.$mes.','.$time['mday'].'),
	    		allDay:true,
	    		url:"detalle.php?id='.$dato['id'].'"
	    	}';
    }

 ?>

<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>HackerGarage :: Calendario</title>
        <link rel="icon" href="img/icono.ico">
		 
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->		
				
		<!-- JS -->
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/tabs.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/jquery.columnizer.min.js"></script>
		
		<!-- Isotope -->
		<script src="js/jquery.isotope.min.js"></script>
		
		<!-- Lof slider -->
		<script src="js/jquery.easing.js"></script>
		<script src="js/lof-slider.js"></script>
		<link rel="stylesheet" href="css/lof-slider.css" media="all"  /> 
		<!-- ENDS slider -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  /> 
		<script src="js/tweet/jquery.tweet.js" ></script> 
		<!-- ENDS Tweet -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<script  src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script  src="js/superfish-1.4.8/js/superfish.js"></script>
		<script  src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- prettyPhoto -->
		<script  src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"  media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-twitter/tip-twitter.css"  />
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css"  />
		<script  src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- JCarousel -->
		<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<link rel="stylesheet" media="screen" href="css/carousel.css" /> 
		<!-- ENDS JCarousel -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>

		<!-- modernizr -->
		<script src="js/modernizr.js"></script>
		
		<!-- SKIN -->
		<link rel="stylesheet" media="all" href="css/skin.css"/>
		
		<!-- Less framework -->
		<link rel="stylesheet" media="all" href="css/lessframework.css"/>
		
		<!-- flexslider -->
		<link rel="stylesheet" href="css/flexslider.css" >
		<script src="js/jquery.flexslider.js"></script>
        
        <!-- Calendario -->
        <link rel='stylesheet' type='text/css' href='calendar/theme.css' />
        <link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />
        <link rel='stylesheet' type='text/css' href='css/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='js/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='js/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='js/fullcalendar.min.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {	
		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [
				<?php echo $eventList;?>
			]
		});
		
	});

</script>

	</head>
	
	
	<body class="page" onLoad="">
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="cal.php"><h1>Calendario</h1></a>
				</div>
				<?php
                	include("secciones/navegacion.html");
                ?>

			</div>
		</header>
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<div class="data" style="width:850px;padding-left:70px;">
        		<div id='calendar'></div>
        	</div>
            <div style="padding:45px;"> </div> 
		</div>
		<!-- ENDS MAIN -->
		<?php
		  include("secciones/footer.html");
		?>	
	</body>
	
	
	
</html>