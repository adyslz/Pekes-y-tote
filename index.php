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

    $query="SELECT DISTINCT MAX(fecha_evento) as MAX , MIN(fecha_evento) as MIN FROM Evento;";
    $datos=select($query); 
    try {
    	$date = new DateTime($datos[0]['MIN']);
	} catch (Exception $e) {
		echo $e->getMessage();
		exit(1);
	}
	$time=getdate($date->getTimestamp());
	$minYear=$time['year'];

	try {
    	$date = new DateTime($datos[0]['MAX']);
	} catch (Exception $e) {
		echo $e->getMessage();
		exit(1);
	}
	$time=getdate($date->getTimestamp());
	$maxYear=$time['year'];

    $strYears="";
    $i=$minYear;
    while($i<=$maxYear){
    	if($i==$maxYear){
    		$strYears=$strYears.'
    		<li><a href="#filter-container" data-filter=".months" class="selected">'.$i.'</a></li>
    	';
    	}
    	else{
    		$strYears=$strYears.'
    			<li><a href="#filter-container" data-filter=".months">'.$i.'</a></li>
    		';
    	}
    	$i=$i+1;
    }
?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>HackerGarage :: Eventos</title>
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
					<a href="index.php"><h1>Eventos</h1></a>
				</div>
				<?php
                	include("secciones/navegacion.html");
                ?>
				
				
				<!-- SLIDER -->				
				<div id="home-slider" class="lof-slidecontent">
					
					<div class="preload"><div></div></div>
					
					<!-- slider content --> 
					<div class="main-slider-content" >
					<ul class="sliders-wrap-inner">
					   	<?php echo $eventList; ?> 
					  </ul>  	
					</div>
					<!-- ENDS slider content --> 
				           
					<!-- slider nav -->
					<div class="navigator-content">
					  <div class="navigator-wrapper">
					        <ul class="navigator-wrap-inner">
		  					   	<?php echo $eventThumb; ?> 
					        </ul>
					  </div>
					  <div class="button-next">Next</div>
					  <div  class="button-previous">Previous</div>
					  <!-- REMOVED TILL FIXED <div class="button-control"><span>STOP</span></div> -->
					</div> 
					<!-- slider nav -->       
				 </div> 
				<!-- ENDS SLIDER -->
			</div>
		</header>
		<!-- ENDS HEADER -->
		<div id="main">
		
		
			<div class="wrapper cf">
			
            <!--<a id="abajo"></a>-- LINK AL README-->
			<div class="home-featured">
			
				<ul id="filter-buttons">
					<li><a href="#filter-container" data-filter=".filtered-eventList" class="selected RealFilter">Listado General de Eventos</a></li>
				</ul>

				 
                
				<div id="filter-container" class="cf  filter-container">
					<div class="filtered-eventList">
	                    <figure style="width:940px">
							
							<figcaption>
								<a href="#" ><h3 class="heading">Eventos Registrados</h3></a>
								Aqui veras todos los eventos registrados en nuestra Web
							</figcaption>
						</figure>
						<ul id="filter-buttons" class="filterYear">
							<?php echo $strYears; ?>
						</ul>
						<script type='text/javascript'>
							mesSelected='1';
							añoSelected=<?php echo"'$maxYear'";?>;
							getEventosAjax();
						</script>
						<ul id="filter-buttons" class="filterMonth">
							<li><a href="#filter-container" data="1" class="selected">Enero</a></li>
							<li><a href="#filter-container" data="2">Febrero</a></li>	
							<li><a href="#filter-container" data="3">Marzo</a></li>	
							<li><a href="#filter-container" data="4">Abril</a></li>	
							<li><a href="#filter-container" data="5">Mayo</a></li>	
							<li><a href="#filter-container" data="6">Junio</a></li>	
							<li><a href="#filter-container" data="7">Julio</a></li>	
							<li><a href="#filter-container" data="8">Agosto</a></li>	
							<li><a href="#filter-container" data="9">Septiembre</a></li>	
							<li><a href="#filter-container" data="10">Octubre</a></li>	
							<li><a href="#filter-container" data="11">Noviembre</a></li>	
							<li><a href="#filter-container" data="12">Diciembre</a></li>	
						</ul>
					</div>
			<!--codigo disqus
					<figure class="photo">
						<div class="dis">
        	<div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'proyephp'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
         <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'proyephp'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
        </script>
   			final codigo disqus-->
        </div>
        <div id="EventosXFecha">
		</div>
					<!--	<figcaption>
							<a href="#" ><h3 class="heading">Comentarios</h3></a>
                            </figcaption>
					</figure>	-->
						
				</div>
				
			</div>
			
			
					
			
			
			</div>

		 
		<!--	</div>	-->
				
		<?php
		  include("secciones/footer.html");
		?>
		
	</body>
	
	
	
</html>
