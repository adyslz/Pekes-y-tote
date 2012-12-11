<?php
		session_start();
		$_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

		$id=0;

		if(!isset($_REQUEST['id'])){
			header("location: /pekes-tote/errorDetalle.php");
		}else{
			$id=$_REQUEST['id'];
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
				
				<?php
				if($id!=-1){
			echo "
				<div id='php_erasable'>
					<script type='text/javascript'>
						 $(document).ready(function() {
					           php_erasable();
					        });

						function php_erasable(){
							$.ajax({ url: '/pekes-tote/php/crud_evento.php',
							         data: {crud_action: 'read',idEvento:".$id."},
							         type: 'post',dataType: 'json',
							         success: function(html){
								        var evento=html;
								        if(evento==null){
							         		alert('el id no existe :)');
											window.location.href ='index.php';
							         	}
								        var n=evento.imagen.split('/');
										var nombre=n[n.length-1];
										n=evento.fecha_evento.split('-');
										var fecha=n[2]+'/'+n[1]+'/'+n[0];
							          	var img='http://alanturing.cucei.udg.mx/pekes-tote/data/img/'+evento.userid+'/'+evento.nombre+'/'+nombre;
										\$('#Rprecio').replaceWith(evento.precio);
										\$('#Rnombre').replaceWith(evento.nombre);
										\$('#Rdesc').replaceWith(evento.descripcion);
										\$('#idEventoToUpdate').attr('value',evento.id);
										\$('#imagen').attr('src',img);
										\$('#Rcat').replaceWith(evento.categoria);
										\$('#Rcap').replaceWith(evento.capacidad);
										\$('#Rdate').replaceWith(fecha);
										\$('#Rnick').replaceWith(evento.nickname);
										\$('#php_erasable').remove();
							  		},
							  		error: function(html){
							  			alert('el id no existe :)');
										window.location.href ='index.php';
							  		}

							});

						
						}
					</script>
				</div>
			";
				}
		?>

		</header>
		<!-- ENDS HEADER -->
		<div id="main">

			<div class="wrapper cf">
				<div id="page-content" class="cf">        		
		        		<div class="entry-content cf">	
						<div id="nombre-evento" class="cf">
						
							<h2><div id="Rnombre"/></h2><br />	
						</div>

						<div id="descripcion-evento" class="cf">
							<h4>Descripción del evento</h4><br />

							<pre>		<div id="Rdesc"/></pre>

						</div>		

						<div id="imagen-evento" class="cf">
							<h4>Imágen del Evento</h4><br />
							<img id ="imagen" src="" alt="imagenEvento" />
						</div>	

						<div id="precio-evento" class="cf">
							<h4>Precio del Evento</h4><br />
							<pre>		$<div id="Rprecio"/> Pesos!</pre>
						</div>

						<div id="cat-evento" class="cf">
							<h4>Categoria del Evento</h4><br />
							<pre>		<div id="Rcat"/></pre>
						</div>

						<div id="capacidad-evento" class="cf">
							<h4>Capacidad del Evento</h4><br />
							<pre>		<div id="Rcap"/></pre>
						</div>

						<div id="fecha-evento" class="cf">
							<h4>Fecha del Evento</h4><br />
							<pre>		<div id="Rdate"/></pre>
						</div>	

						<div id="usuario-evento" class="cf">
							<h4>Usuario de Registro</h4><br />
							<pre>		@<div id="Rnick"></pre>
						</div>					
					</div>
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

		</div>
				</div>
	
			</div>
		</div>

				
		<?php
		  include("secciones/footer.html");
		?>
		
	</body>
	
	
	
</html>
