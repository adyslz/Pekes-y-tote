<?php
		session_start();
		$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

	if(!isset($_SESSION['usuario']))
	{
		$usuario = array(
    		"id" => 7,
    		"nickname" => "loren"
    	);
		$_SESSION['usuario']=$usuario;
	}
?>


<!doctype html>
<html class="no-js"><head>
		<meta charset="utf-8"/>
		<title>HackerGarage :: Registro</title>
        <link rel="icon" href="img/icono.ico">
		<script type="text/javascript" src="js/valida.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloError.css"/>
        <script type="text/javascript" src="js/resetForm.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
     	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    	<link rel="stylesheet" type="text/css" href="css/calendar-brown.css" />
        <script type="text/javascript" src="js/calendar.js" ></script>
        <script type="text/javascript" src="js/calendar-es.js" ></script>
        <script type="text/javascript" src="js/calendar-setup.js" ></script>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
         </script>
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
	
	
	<body class="page" onLoad="">
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="index.html"><h1>Registro de Eventos</h1></a>
				</div>
				<?php
                	include("secciones/navegacion.html");
                ?>

			</div>
		</header>
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<div class="wrapper cf">
				<!-- page content-->
	        	<div id="page-content" class="cf">        		
		        	<!-- entry-content -->	
		        	<div class="entry-content cf">	
					
						<p><h2>Formulario de Registro de Eventos</h2></p>
				
				<!-- form -->
				<script type="text/javascript" src="js/form-validation.js"></script>
				<form id="contactForm" action="php/crud_evento.php" method="post" enctype="multipart/form-data" >
					<fieldset>
														
						<p>
							<label for="name" >Nombre del Evento</label>
							<input name="name"  id="name" type="text" class="form-poshytip" title="Ingresa el Nombre del Evento" />
						
                        <div class="error" id="errorName">
                        	El nombre no es valido
                         </div>
                  </p>
						<p>
                        	<label for="imagenEvento">Imagen del Evento</label>
        					<input type="file" id="imagenEvento" name="imagenEvento"  accept="image/*" class="form-poshytip" title="Ingresa una Imagen Valida (.png,.jpg,.gif)" />
                            <div class="error" id="errImagen">
                            Aun no has seleccionado una imagen
                            </div>
                        </p>
                        
						<p>
							<label for="comments">Descripci&oacute;n del Evento</label>
							<!--<textarea  name="comments"  id="comments" rows="5" cols="20" class="form-poshytip" title="Ingresa Descripcion"></textarea>-->
                            <textarea name="comments" id="comments" rows="5" cols="20"></textarea>
                            <div class="error" id="errDesc">
                            	Ingresa una descripción
                            </div>
						</p>
                        
                        <p> 
        <label class="regLab" for="precio">Precio</label>
        <input type="text" id="precio" name="precio" required pattern="(([0-9])*.([0-9])*)">
        <div class="error" id="errPrecio">
        	El formato es invalido ingresa un formato: 00.00 por ejemplo
        </div>
        			</p>
        <p>
        <label class="regLab" for="capacidad">Capacidad</label>
        <input type="radio" name="capacidad" value="ilimitada" id="ilimitada" onClick="hab()"/>Ilimitada<br /><br />
       	<input type="radio" name="capacidad" value="limitada" id="limitada" onClick="hab()" />Limitada
        <input type="text" id="cap" name="capacidad" disabled="disabled"/>
       
        <div class="error" id="errCap">
 			Selecciona si es capaciad Limitada o Ilimitada       
        </div>
        <div class="error" id="errCap2">
        	Ingresa la capacidad específica
        </div>
        <div class="error" id="errCap3">
        	La cantidad es invalida (mínimo 10, máximo 1000)
        </div>
        </p>
        <p>
        <label class="regLab" for="opcionesCat">Categoria</label>
        <select id="opcionesCat" name="opcCat">
        	<option selected value="0">Elige una categoria</option>
            <option value="1">Curso/Taller</option>
            <option value="2">Conferencia</option>
            <option value="3">Convivencia</option>
        </select>
        <div class="error" id="errCatego">
        	Selecciona una categoria
        </div>
        </p>
        <p>
     	<label class="regLab" for="fecEve">Fecha del Evento</label>
        <input id="date" type="text" name="date" readonly="readonly" placeholder="Elige la fecha"/>
       	<input type="button" value="Calendario" name="selector" id="selector"  />
        <script type="text/javascript">
			window.onload = function(){
				Calendar.setup({
					inputField: "date",
					ifFormat: "%d / %m / %Y",
					button: "selector"
				});
				}
				</script>

        <div class="error" id="errFecha">
        	La fecha debe ser posterior a la actual
        </div>
        </p>
        <input id="fecCre" type="hidden" name="fecCre"/>
        <p><input type="button" value="Enviar" onClick="validaFormulario()"/> <span id="error" class="warning">Message</span>
        <input type="button" value="Borrar Datos"  onClick="resetForm()"  /><!-- <span id="error" class="warning">Message</span></p>-->
					</fieldset>
		<input type="hidden" name="crud_action" value="create"/>
				</form>
				<p id="sent-form-msg" class="success">Form data sent. Thanks for your comments.</p>
				<!-- ENDS form -->
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