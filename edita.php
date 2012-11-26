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
		$id=0;

		if(!isset($_REQUEST['idEventoToUpdate'])){
			$id=1;
		}else{
			$id=$_REQUEST['idEventoToUpdate'];
		}

		require_once("php/crud_evento.php");
		$evento=read($id);
?>

<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>HackerGarage :: Edición</title>
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
		
		
		<script type="text/javascript" src="js/resetForm.js"></script>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />	
		<link rel="stylesheet" type="text/css" href="css/estiloError.css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
           php_erasable();
        });
    </script>

	</head>
	
	
	<body class="page" onLoad="">
		<?php
			$date=date_create_from_format('Y-m-d',$evento['fecha_evento']);
			$dateStr=$date->format('j / m / Y');
			$img = "http://alanturing.cucei.udg.mx/pekes-tote/data/img/". end(split('/',$evento['imagen']));
			echo "
				<div id='php_erasable'>
					<script type='text/javascript'>
						function php_erasable(){
							nicEditors.findEditor('descripcion').setContent('".$evento['descripcion']."');
							\$('#precio').attr('value','".$evento['precio']."');
							\$('#name').attr('value','".$evento['nombre']."');
							\$('#nameHidden').attr('value','".$evento['nombre']."');
							\$('#idEventoToUpdate').attr('value','".$id."');
							\$('#imagen').attr('src','".$img."');
							if('".$evento['capacidad']."'=='ilimitada'){
								document.contactForm.capacidad[0].checked=true;
							}else{
								document.contactForm.capacidad[1].checked=true;
								\$('#cap').attr('value','".$evento['capacidad']."');
								\$('#cap').attr('disabled','');

							}
							document.getElementById('opcionesCat').selectedIndex='".$evento['categoria']."';
							\$('#datepicker').attr('value','".$dateStr."')
							\$('#php_erasable').remove();
						}
					</script>
				</div>
			";	
		?>
	
		<!-- HEADER -->
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
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<div class="wrapper cf">
				<!-- page content-->
	        	<div id="page-content" class="cf">        		
		        	<!-- entry-content -->	
		        	<div class="entry-content cf">	
					
						<p><h2>Formulario de Edición de Eventos</h2></p>
						
						<?php echo '<h5>Estas editando el evento: '.$evento['nombre'].' </h5><br/>'; ?>
				<!-- form -->
				<script type="text/javascript" src="js/valida.js"></script><!-- php/crud_evento.php" -->
				<form id="contactForm" name="contactForm" action="php/crud_evento.php" method="post" enctype="multipart/form-data"
					<fieldset>
														
						<p>
							<label for="name" >Nombre del Evento</label>
							<input id="name" type="text" name="name" class="form-poshytip" title="Campo inhabilitado, no lo puedes modificar" disabled/>
							<input id="nameHidden" type="hidden" name="nameHidden">
						</p>
                        
                  <p>
                  	<label for="imagenEvento">Imagen del Evento</label>
                  	<img id="imagen"  alt="imagen de evento" width="255" height="300">
        					<input type="file" id="imagenEvento" name="imagenEvento"  accept="image/*" title="Ingresa una imagen" class="form-poshytip"/>
                  </p>  
                  
                  <p>
                  	<label for="descripcion">Descripcion del Evento</label>
        					<textarea id="descripcion"  name="descripcion" rows="5" cols="50" placeholder="Escribe aqui" required title="Ingresa la descripción del evento" class="form-poshytip"></textarea>
       					<div class="error" id="errDesc">
        						Ingresa una Descripcion
        					</div>
                  </p>  
                  
                  <p>
							<label for="precio">Precio</label>
	        				<input type="text" id="precio" name="precio" required pattern="(([0-9])*.([0-9])*)" title="Ingresa el precio del evento" class="form-poshytip"/>
        					<div class="error" id="errPrecio">
        						El formato es invalido ingresa un precio mayor a 0 con o sin decimal, Ejemplo 10.0
        					</div>                  
                  </p>  
                  
                  <p>
							<label for="capacidad">Capacidad</label>
        					<input type="radio" name="capacidad" value="ilimitada" onClick="hab2()"/>Ilimitada
       						<input type="radio" name="capacidad" value="limitada" onClick="hab2()"/>Limitada
        					<input type="text" id="cap" name="capacidad" disabled="disabled" title="Ingresa la capacidad de tu evento" class="form-poshytip"/>
        					<div class="error" id="errCap">
 								Selecciona si es capaciad Limitada o Ilimitada      
        					</div>
        					<div class="error" id="errCap2">
        						Ingresa la capacidad especifica
        					</div>
        					<div class="error" id="errCap3">
        						La cantidad es invalida (mínimo 10, máximo 1000)
        					</div>                  
                  </p>
                  
                  <p>
							<label for="opcionesCat">Categoria</label><br />
        					<select id="opcionesCat" name="opcCat" disabled title="Campo inhabilitado, no lo puedes modificar" class="form-poshytip">
        						<option selected value="0">Elige una categoria</option>
            				<option value="1">Curso/Taller</option>
            				<option value="2">Conferencia</option>
            				<option value="3">Convivencia</option>
        					</select>                 
                  </p>
                  
                  <p>
							<label for="datepicker">Fecha del Evento</label>
        					<input id="datepicker" type="text" name="date" readonly="readonly" placeholder="Elige la fecha" title="Selecciona la fecha de tu evento" class="form-poshytip"/>
        					<div class="error" id="errFecha">
        						La fecha debe ser posterior a la actual
        					</div>
        					<input id="fecCre" type="hidden" name="fecCre"/>             
                  </p>
                  
		  
        <p><input type="button" value="Enviar" onClick="validaEdicion()"/>
        <!--<span id="error" class="warning">Message</span>-->
        <input type="button" value="Borrar Datos" onClick="resetForm();"/></p> 
        <!--<span id="error" class="warning">Message</span></p>-->
					</fieldset>
		<input type="hidden" name="crud_action" value="modify"/>
		<input id="idEventoToUpdate" type="hidden" name="idEventoToUpdate"/>

				</form>
				<!--<p id="sent-form-msg" class="success">Form data sent. Thanks for your comments.</p>-->
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