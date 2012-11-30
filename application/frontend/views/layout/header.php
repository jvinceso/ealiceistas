<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $titulo; ?></title>
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>style.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>prettyPhoto/prettyPhoto.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>superfish-custom.css" type="text/css" media="screen"  /> 
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>jquery.tabs.css" type="text/css" media="print, projection, screen" />
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>pod.css" type="text/css" media="screen"  /> 
        <link rel="stylesheet" href="<?php echo URL_CSS; ?>podstyle.css" type="text/css" media="screen"  /> 
        <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" media="screen" href="css/ie-hacks.css" />
        <script type="text/javascript" src="js/DD_belatedPNG.js"></script>
        <script>
        /* EXAMPLE */
        DD_belatedPNG.fix('*');
        </script>
        <![endif]-->
        <!--[if IE 7]>
                <link rel="stylesheet" href="css/ie7-hacks.css" type="text/css" media="screen" />
        <![endif]-->
        <!--[if IE 8]>
                <link rel="stylesheet" href="css/ie8-hacks.css" type="text/css" media="screen" />
        <![endif]-->

        <script type="text/javascript" src='<?php echo URL_JS; ?>jquery-1.8.1.min.js'></script>
<!--        <script type="text/javascript" src="<?php //echo URL_JS;   ?>jquery-ui-1.8.23.min.js"></script>-->
        <script type="text/javascript" src="<?php echo URL_JS; ?>easing.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>tooltip/jquery.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>filterable.pack.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>prettyPhoto/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>twitter.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jquery.tabs/jquery.tabs.pack.js"></script>        
        <script type="text/javascript" src="<?php echo URL_JS; ?>custom.js"></script>        
        <script type="text/javascript" src="<?php echo URL_JS; ?>cufon-yui.js" ></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>fonts/bebas-neue_400.font.js" ></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>superfish-1.4.8/js/hoverIntent.js"></script> 
        <script type="text/javascript" src="<?php echo URL_JS; ?>superfish-1.4.8/js/superfish.js"></script> 
        <script type="text/javascript" src="<?php echo URL_JS; ?>plugins.js"></script> 
        <script type="text/javascript" src="<?php echo URL_JS; ?>script.js"></script> 
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=es"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>map.js"></script>


    </head>
    <body id="page1">
        <!-- HEADER -->
        <div id="home-header">
            <div class="degree">
                <!-- wrapper -->
                <div class="wrapper">
                    <a href="index.html">
                        <img src="<?php echo URL_IMG; ?>logo.png" alt="Logo" id="logo" />
                    </a>

                    <!-- search -->
                    <div class="top-search">
                        <form  method="get" id="searchform" action="">
                            <div>
                                <input type="text" value="Search..." name="s" id="s" onfocus="defaultInput(this)" onblur="clearInput(this)" />
                                <input type="submit" id="searchsubmit" value=" " />
                            </div>
                        </form>
                    </div>
                    <!-- ENDS search -->

                    <!-- navigation -->
                    <div id="nav-holder">
                        <ul id="nav" class="sf-menu">
                            <li class="<?php if (isset($seleccionadoi)) echo $seleccionadoi; ?>"><?php echo anchor('inicio/inicio', 'INICIO'); ?></li>
                            <li class="<?php if (isset($seleccionadon)) echo $seleccionadon; ?>"><?php echo anchor('nosotros/nosotros', 'NOSOTROS'); ?></li>
                            <li class="<?php if (isset($seleccionados)) echo $seleccionados; ?>"><?php echo anchor('servicios/servicios', 'SERVICIOS'); ?></li>
                            <li class="<?php if (isset($seleccionadod)) echo $seleccionadod; ?>"><?php echo anchor('directiva/directiva', 'DIRECTIVA'); ?></li>
                            <li class="<?php if (isset($seleccionadoe)) echo $seleccionadoe; ?>"><?php echo anchor('exalumnos/exalumnos', 'EX-ALUMNOS'); ?></li>
                            <li class="<?php if (isset($seleccionadoc)) echo $seleccionadoc; ?>"><?php echo anchor('contacto/contacto', 'CONTACTO'); ?></li>
                            <li class="<?php if (isset($seleccionadog)) echo $seleccionadog; ?>"><a href="gallery.html">GALERIA</a></li>
                        </ul>
                    </div>
                    <!-- ENDS navigation -->

                </div>
                <!-- ENDS HEADER-wrapper -->
            </div>
        </div>
        <!-- ENDS HEADER -->
        <!-- MAIN -->
        <div id="main">
            <!-- wrapper -->
            <div class="wrapper">
                <!-- home-content -->
                <div class="home-content">
                    <!-- slideshow -->
                    <div id="slideshow">
                        <a href="#" id="prev"></a>
                        <a href="#" id="next"></a>
                        <a href="" id="slideshow-link" ><span></span></a>
                        <!-- slides -->
                        <ul id="slides">
                            <li><a href="#1"><img src="<?php echo URL_IMG; ?>1.jpg"  alt="Imagen" /></a></li>
                            <li><a href="#2"><img src="<?php echo URL_IMG; ?>2.jpg"  alt="Imagen" /></a></li>
                            <li><a href="#3"><img src="<?php echo URL_IMG; ?>3.jpg"  alt="Imagen" /></a></li>
                            <li><a href="#4"><img src="<?php echo URL_IMG; ?>4.jpg"  alt="Imagen" /></a></li>
                        </ul>
                        <!-- ENDS slides -->
                    </div>
                    <!-- ENDS slideshow -->
                    <!-- headline -->
                    <div class="headline">
                        ULTIMOS EVENTOS REALIZADOS POR LA AEAL. <a href="http://themeforest.net/item/simple-wordpress/160159?ref=Ansimuz" target="_blank" >LICEO TRUJILLO</a>
                    </div>
                    <!-- ENDS headline -->
                    <div class="shadow-divider"></div>
                    <!-- front-left-col -->

                    <!-- COMIENZO DEL CONTENIDO DINAMICO -->    

                    <!-- FIN DEL CONTENIDO DINAMICO -->     


