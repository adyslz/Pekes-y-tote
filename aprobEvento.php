<?php
	require_once("php/crud_usuario.php");
	session_start();
	$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    if(!isset($_SESSION['access_token']))
    {
        header("location: /pekes-tote/secciones/login.php?authenticate=1&force=1");
    }


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
		WHERE Evento.estado =1";

    $datos=select($query);
    

    $listEvent="";
    $listButton="";
    $listEventLong="";
    foreach($datos as $dato)
    {
    	$listEvent=$listEvent.PHP_EOL.'
    	<li id="ls'.$dato['id'].'">'.$dato['nombre'].'</li>
    	';
    	$listButton=$listButton.PHP_EOL.'
    	<li><button type="button" id="btn'.$dato['id'].'" name="'.$dato['id'].'" onclick="eventoEleg(this)"> Ver evento </button></a></li>
    	';
    	$img = 'http://alanturing.cucei.udg.mx/pekes-tote/data/img/'.$dato['userid'].'/'.$dato['nombre']."/". end(split('/',$dato['imagen']));
    	$listEventLong=$listEventLong.PHP_EOL.'
		<div id="info'.$dato['id'].'" class="info" style="display: none; clear: both;">
			<br /><h3>'.$dato['fecha_evento'].': '.$dato['nombre'].'</h3><br />
            		<img src="'.$img.'" alt="" width="200" height="200"><br /><br />
            		<p>'.$dato['descripcion'].'</p>
						<p><label class="ref">Cuando: </label>'.$dato['fecha_evento'].'
						<label class="ref">Precio: </label>'.$dato['precio'].'<label class="ref"> Capacidad: </label>'.$dato['capacidad'].'<label class="ref"> Categoria: 
						"'.$dato['categoria'].'"</a> Publicado el '.$dato['fecha_creacion'].' por:'.$dato['nickname'].' </label>
         			</p>
         		<div>
         			<button type="button" onclick="aprobado(1)">Aprobar</button>
         			<button type="button" onclick="rechazado(1)">Rechazar</button>
         			<button type="button" onclick="admModificar(1)">Modificar</button>
         		</div>
         	</div>    	';


    }

    		

	
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8"/>
		<title>HackerGarage :: Aprobar Eventos</title>
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
		<script src="js/admEvent.js"></script>
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
<body>
	<header>
      <div class="wrapper cf">
				
				<div id="logo">
					<a href="index.php"><h1>Edición de Evento</h1></a>
				</div>
				<?php
                	include("secciones/navegacion.html");
                ?>
			</div>
    </header>
   <!-- MAIN -->
	<div id="main">
		<div class="wrapper cf">
			<!-- page content-->
	   	<div id="page-content" class="cf">        		
		     	<!-- entry-content -->	
		     	<div class="entry-content cf">	
    				<h2>Eventos</h2>
    				<ul class="listEvent"><a id="inicio"></a>
        				<?php echo $listEvent;?>
    				</ul>
    				<ul class="listBtnEvent">
    					<?php echo $listButton;?>	
    				</ul>
    				<?php echo $listEventLong;?>
        </div>		
        				</div>
				    </div>
				    <!-- ENDS entry content -->
	    		</div>
	    		<!-- ENDS page content-->
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->
    	<?php
        	include("secciones/footer.html");
        ?>
		
</body>
</html>