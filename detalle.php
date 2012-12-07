<?php
	require_once("php/crud_usuario.php");
    session_start();
    $_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$query="	SELECT Evento.*,
						Usuario.id as userid
				FROM `Evento`
				LEFT JOIN Usuario ON Evento.usuario = Usuario.id
				where estado=1
				ORDER BY id DESC
				LIMIT 10;";

    $datos=select($query); 
    $eventList=""; 
    $eventThumb="";  
    $i=0;
 	foreach($datos as $dato)
    {
    	$img = 'http://alanturing.cucei.udg.mx/pekes-tote/data/img/'.$dato['userid'].'/'.$dato['nombre']."/". end(split('/',$dato['imagen']));

    	 $eventList=$eventList.'
			<li class="piccontainer">
	         	<img src="'.$img.'" title="'.$dato['nombre'].'" alt="alt" />           
	          <div class="slider-description">
	            <h4>'.$dato['nombre'].'</h4>
	            <p>'.$dato['descripcion'].'
	            <a class="link" href="#abajo" data-filter=".web">Read more </a>
           		</p>
	         </div>
	    </li>
    	 ';
    	 $eventThumb=$eventThumb.'
	      <li class="piccontainer"><img src="'.$img.'" alt="alt" /></li>
    	 ';

    }
?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>HackerGarage :: Detalle</title>
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

	</head>
	<script type="text/javascript">
	$(window).load(function() {
    $('.piccontainer').find('img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    })
})
	</script>
	
	<body class="home">
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="detalle.php"><h1>Detalle de Evento</h1></a>
				</div>
				<?php
                	include("secciones/navegacion.html");
                ?>
				
				

		</header>
		<!-- ENDS HEADER -->
		<div id="main">
		
		
			<!--<div class="wrapper cf">
			

				
			</div>-->
			
			
					
			
			
		</div>

				
		<?php
		  include("secciones/footer.html");
		?>
		
	</body>
	
	
	
</html>
