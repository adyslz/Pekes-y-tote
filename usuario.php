<?php
        require_once("php/crud_usuario.php");
        session_start();
        $_SESSION['referer'] = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        if(!isset($_SESSION['access_token']))
        {
            header("location: /pekes-tote/secciones/login.php?authenticate=1");
        }

        $query="select Evento.id,Evento.coment_admin,Evento.nombre,Evento.descripcion,Evento.estado from Evento where Evento.usuario=".$_SESSION["usuario"]["id"];
        $datos[]=select($query);
        $aprobados=array();
        $rechazados=array();
        $pendientes=array();
        $datos=$datos[0];

        foreach($datos as $dato){
            if($dato["estado"]==3){
                $aprobados[]=$dato;
            }
            elseif($dato["estado"]==2){
                $rechazados[]=$dato;
            }
            elseif($dato["estado"]==1){
                $pendientes[]=$dato;
            }
        }
        $pendientesStr="";
        $i=0;
        foreach($pendientes as $dato){
            $class="";
            $i++;
            if($i%2==1){
                $class="style1";
            }else{
                $class="style2";
            }
             $pendientesStr=$pendientesStr.PHP_EOL.'
             <div id="idEvento'.$dato['id'].'" class="evento '.$class.'">
                <a href="detalle.php?id='.$dato['id'].'"><h3>'.$dato['id'].'-'.$dato['nombre'].'</h3></a>
                <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                <div class="desc"><p>'.$dato['descripcion'].'</p></div>
            </div>';
        }
        $aprobadosStr="";
        $i=0;
        foreach($aprobados as $dato){
            $class="";
            $i++;
            if($i%2==1){
                $class="style1";
            }else{
                $class="style2";
            }
             $aprobadosStr=$aprobadosStr.PHP_EOL.'
             <div id="idEvento'.$dato['id'].'" class="evento '.$class.'">
                <a href="detalle.php?id='.$dato['id'].'"><h3>'.$dato['id'].'-'.$dato['nombre'].'</h3></a>
                <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                <div class="desc"><p>'.$dato['descripcion'].'</p></div>
            </div>';
        }
        $rechazadosStr="";
        $i=0;
        foreach($rechazados as $dato){
            $class="";
            $i++;
            if($i%2==1){
                $class="style1";
            }else{
                $class="style2";
            }
             $rechazadosStr=$rechazadosStr.PHP_EOL.'
             <div id="idEvento'.$dato['id'].'" class="evento '.$class.'">
                <a href="detalle.php?id='.$dato['id'].'"><h3>'.$dato['id'].'-'.$dato['nombre'].'</h3></a>
                <img src="img/down-circle.png" alt="Mas" title="Mas" onClick="switchImg(this)"/>
                <img src="img/editar.png" alt="Editar" title="Editar" onClick="editar(this)"/>
                <img src="img/borrar.png" alt="Borrar" title="Borrar" onClick="borrar(this)"/>
                <div class="desc"><p>'.$dato['descripcion'].'</p></div>
                <div class="rechazado">
                    '.$dato["coment_admin"].'
                </div>
            </div>';
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
        <!-- START especificos de la pagina -->
        <script type="text/javascript" src="js/script.js"></script>
        <link rel="stylesheet" type="text/css" href="css/toteCss.css">
        <!-- END especificos de la pagina -->
    </head>
    <body>
         <header>
            <div class="wrapper cf">
                
                <div id="logo">
                    <a href="usuario.php"><h1>Mis Eventos</h1></a>
                </div>
                
                <?php
                	include("secciones/navegacion.html");
                ?>
            </div>
        </header>
    <article>
        <div class="containerBox">
            <div class="box1">
                <h1>Eventos Pendientes   <a href="php/creaPDF.php" target="_blank"><img src="img/pdf.jpg"/ width="50px" height="50px"></a> </h1>
                <div class="eventos">
                    <?php echo $pendientesStr;?>
                </div>
            </div>
   	        <div class="box2">
                <h1>Eventos Rechazados   <a href="php/creaPDF.php" target="_blank"><img src="img/pdf.jpg"/ width="50px" height="50px"></a> </h1>
                <div class="eventos">
                    <?php echo $rechazadosStr;?>
                </div>
            </div>	
            <div class="box3">
                <h1>Eventos Aceptados   <a href="php/creaPDF.php" target="_blank"><img src="img/pdf.jpg"/ width="50px" height="50px"></a> </h1>
                    <div class="eventos">
                        <?php echo $aprobadosStr;?>
                    </div>
                </div>
        </div>
    </article>
    
    <?php
    	include("secciones/footer.html");
    ?>
</body>
</html>
