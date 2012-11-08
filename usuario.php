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
        <!-- START especificos de la pagina -->
        <script type="text/javascript" src="js/script.js"></script>
        <link rel="stylesheet" type="text/css" href="css/toteCss.css">
        <!-- END especificos de la pagina -->
    </head>
    <body>
    	<header>
         <header>
            <div class="wrapper cf">
                
                <div id="logo">
                    <a href="index.php"><h1>Eventos</h1></a>
                </div>
                
                <?php
                	include("secciones/navegacion.html");
                ?>
            </div>
        </header>
    <article>
        <div class="containerBox">
            <div class="box1">
                <h1>Eventos Pendientes</h1>
                <div class="eventos">
                    <div id="idEvento1" class="evento style1">
                        <h3>id1-NOMBRE EVENTO</h3>
                        <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                    </div>
                    <div id="idEvento2" class="evento style2">
                        <h3>id2-NOMBRE EVENTO</h3>
                        <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                        <p>Lorem ipsum dolor >sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                    </div>
                    <div id="idEvento3" class="evento style1">
                        <h3>id3-NOMBRE EVENTO</h3>
                        <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                    </div>
                </div>
            </div>
   	        <div class="box2">
                <h1>Eventos Rechazados</h1>
                <div class="eventos">
                    <div id="idEvento1" class="evento style1">
                        <h3>id1-NOMBRE EVENTO</h3>
                       <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                        <div class="rechazado">
                            No cumple con blah blah.
                        </div>
                    </div>
                    <div id="idEvento2" class="evento style2">
                        <h3>id2-NOMBRE EVENTO</h3>
                        <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                        <div class="rechazado">
                            Evento ofensivo para el publico.
                        </div>
                    </div>
                    <div id="idEvento3" class="evento style1">
                        <h3>id3-NOMBRE EVENTO</h3>
                        <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                        <div class="rechazado">
                            Prohibido mencionar a la mama del administrador en los eventos.
                        </div>
                    </div>
                </div>
            </div>	
            <div class="box3">
                <h1>Eventos Aceptados</h1>
                    <div class="eventos">
                        <div id="idEvento1" class="evento style1">
                            <h3>id1-NOMBRE EVENTO</h3>
                           <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                        </div>
                        <div id="idEvento2" class="evento style2">
                            <h3>id2-NOMBRE EVENTO</h3>
                            <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                        </div>
                        <div id="idEvento3" class="evento style1">
                            <h3>id3-NOMBRE EVENTO</h3>
                            <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                        <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                        <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nec tellus quis nibh accumsan accumsan. Morbi tincidunt dictum justo scelerisque porttitor. Fusce egestas consectetur massa. In hac habitasse platea dictumst. Morbi porta, tellus ac blandit tincidunt, nisl sapien viverra nisi, vel suscipit dolor arcu nec diam. Vestibulum posuere tortor sit amet justo hendrerit vel mattis velit ultrices. Aenean tincidunt facilisis turpis. Ves</p>
                        </div>
                    </div>
                </div>
        </div>
        <form id="borrarForm" action="borrar.php" method="post">
            <input type="hidden" id="idEventoField" name="idEvento"/>
        </form>
    </article>
    
    <?php
    	include("secciones/footer.html");
    ?>
</body>
</html>
