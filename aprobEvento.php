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
        				<li id="lshackers">Hackers and Founders</li>
        				<li id="lscotorreo">Cotorreo Locochon</li>
        				<li id="lsparty">Party Night</li>
    				</ul>
    				<ul class="listBtnEvent">
    					<li><button type="button" id="btnhackers" name="hackers" onclick="eventoEleg(this)"> Ver evento </button></a></li>
        				<li><button type="button" id="btncotorreo" name="cotorreo"onclick="eventoEleg(this)"> Ver evento </button></li>
        				<li><button type="button" id="btnparty" name="party" onclick="eventoEleg(this)"> Ver evento </button></li>
    				</ul>
    			<div id="infohackers" class="info" style="display: none; clear: both;">
						<br /><h3>Jueves 30: Hacker and Founders</h3><br />
            		<img src="img/img1.png" alt="" width="200" height="200"><br /><br />
            		<p>Hacker & founders es una comunidad tecn&oacute;logica basada en la pregunta ¿Qu&eacute; Necesitas?
					Conoce a tus futuros socios, solicita ayuda, aprende. Nos reunimos en el &uacute;ltimo Jueves del mes.</p>
						<p><label class="ref">Cuando: </label>Jueves 30 Agosto de 2012, 19hrs
						<label class="ref">Donde: </label> HackerGarage, Vidrio #2188, entre Sim&oacute;n Bolivar y Gral. San Martin, Guadalajra.
						<label class="ref">Precio: </label>$50.00<label class="ref"> Capacidad: </label>50<label class="ref"> Categoria: 
						<a>Conferencia</a> Publicado el 23/08/12 por:<a>@levita</a> </label>
         			</p>
         		<div>
         			<button type="button" onclick="aprobado(1)">Aprobar</button>
         			<button type="button" onclick="rechazado(1)">Rechazar</button>
         			<button type="button" onclick="admModificar(1)">Modificar</button>
         		</div>
         	</div>
         	<div id="infocotorreo" class="info" style="display:none; clear: both;">
        			<br /><h3>Sabado 1: Cotorreo Locochon</h3><br />
            	<img src="img/img1.png" alt="" width="200" height="200"><br /><br />
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam arcu neque, iaculis ac lacinia sit amet, sollicitudin sit 
            	amet magna. Ut fermentum nunc eget odio dapibus eleifend. Aliquam accumsan, mi tristique fringilla mattis, arcu est commodo 
            	nisl, vel commodo est mi at risus. Cras ultrices augue et mauris tristique eget eleifend elit interdum. Duis magna enim, 
            	malesuada eu volutpat ac, dapibus blandit neque. Nulla a nisl felis.
	            </p>
					<p><label class="ref">Cuando: </label>Sabado 1 Septiembre de 2012, 21hrs
					<label class="ref">Donde: </label> Lisboa #112, entre Rogelio Bacon y Normalistas, Guadalajra.
					<label class="ref">Precio: </label>$70.00<label class="ref"> Capacidad: </label>50<label class="ref"> Categoria: 
					<a>Convivencia</a> Publicado el 23/08/12 por:<a>@levita</a> </label></p>
         	<div>
         		<button type="button" onclick="aprobado(2)">Aprobar</button>
         		<button type="button" onclick="rechazado(2)">Rechazar</button>
         		<button type="button" onclick="admModificar(2)">Modificar</button>
         	</div>
        </div>
        <div id="infoparty" class ="info" style="display:none; clear: both;">
        		<br /><h3>Sabado 6: Party Night</h3><br />
            <img src="img/img1.png" alt="" width="200" height="200"><br /><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam arcu neque, iaculis ac lacinia sit amet, sollicitudin sit 
            	amet magna. Ut fermentum nunc eget odio dapibus eleifend. Aliquam accumsan, mi tristique fringilla mattis, arcu est commodo 
            	nisl, vel commodo est mi at risus. Cras ultrices augue et mauris tristique eget eleifend elit interdum. Duis magna enim, 
            	malesuada eu volutpat ac, dapibus blandit neque. Nulla a nisl felis.
            </p>
				<p><label class="ref">Cuando: </label>Sabado 6 Octubre de 2012, 22hrs
					<label class="ref">Donde: </label> Federalismo #1234 esq. Circunvalación, Guadalajra.
					<label class="ref">Precio: </label>$70.00<label class="ref"> Capacidad: </label>50<label class="ref"> Categoria: 
					<a>Convivencia</a> Publicado el 30/09/12 por:<a>@levita</a> </label>
         	</p>
         	<div>
         		<button type="button" onclick="aprobado(3)">Aprobar</button>
         		<button type="button" onclick="rechazado(3)">Rechazar</button>
         		<button type="button" onclick="admModificar(3)">Modificar</button>
         	</div>
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