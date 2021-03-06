<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6 no-js" lang="es"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7 no-js" lang="es"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8 no-js" lang="es"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9 no-js" lang="es"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->
<head>

    <meta charset="UTF-8"/>

    <title>MasterPintxo</title>

    <meta name="description" content="Onepage Multipurpose Bootstrap HTML Template">

    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/estilo.css">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

</head>
<body onload="direcciones(arrayDirecc)">
<!--wrapper start-->
<div class="wrapper" id="wrapper">

    <!--header-->
    <header>
        <div class="banner row" id="banner">
            <div class="parallax text-center" style="margin-top:20px; background-image: url(img/pincho_fondo.jpg);">
                <div class="parallax-pattern-overlay">
                    <div class="container text-center" style="height:580px;padding-top:170px;">
                        <a href="#"><img id="site-title" class=" wow fadeInDown" wow-data-delay="0.0s"
                                         wow-data-duration="0.9s" src="img/logo.png" alt="logo"/></a>

                        <h1 class="intro wow zoomIn" wow-data-delay="0.4s" wow-data-duration="0.9s">MasterPintxo</h1>

                        <h2 class="intro wow zoomIn" wow-data-delay="0.4s" wow-data-duration="0.9s"><?= i18n("Concurso de pinchos")?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="navbar-wrapper">
                <div class="container">
                    <div class="navwrapper">
                        <div class="navbar navbar-inverse navbar-static-top ">
                            <div class="container">
                                <div class="navArea">
                                    <div class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav">
                                            <li class="menuItem"><a href="index.php">MasterPintxo</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= i18n("+ informaci&oacute;n")?>  <span class="caret"></span></a>
                                                <ul class="dropdown-menu menuOc" role="menu">
                                                    <li class="menuItem"><a href="index.php?controller=pincho&amp;action=gastromapa#seccionG">Gastromapa</a></li>
                                                    <li class="menuItem"><a href="index.php?controller=premio&amp;action=index#seccionPre"><?= i18n("Premios pinchos")?></a></li>
                                                    <li class="menuItem"><a href="index.php?controller=premio&amp;action=premioJP#seccionPreJP"><?= i18n("Premios jurado popular")?></a></li>
                                                </ul>
                                            </li>
											<li>
											<?php
													include(__DIR__."/language_select_element.php");
												?>
											</li>
                                            <!------------------------------------- Se añade el contenido ------------------------------------------->
                                            <?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
                                            <!------------------------------------------------------------------------------------------------------->



                                            <!--footer-->
                                            <section class="footer" id="footer">
                                                <p class="text-center">
                                                    <a href="#wrapper" class="gototop"><i
                                                            class="fa fa-angle-double-up fa-2x"></i></a>
                                                </p>

                                                <div class="container">
                                                    <p>
                                                        &copy; 2015 Copyright Aprendizaxe basado en proxectos<br>
                                                    </p>
                                                </div>
                                            </section>

                                    </div><!--wrapper end-->

                                    <!--Javascripts-->
                                    <script src="js/jquery.js"></script>
                                    <script src="js/modernizr.js"></script>
                                    <script src="js/bootstrap.js"></script>
                                    <script src="js/menustick.js"></script>
                                    <script src="js/parallax.js"></script>
                                    <script src="js/easing.js"></script>
                                    <script src="js/wow.js"></script>
                                    <script src="js/smoothscroll.js"></script>
                                    <script src="js/masonry.js"></script>
                                    <script src="js/imgloaded.js"></script>
                                    <script src="js/classie.js"></script>
                                    <script src="js/colorfinder.js"></script>
                                    <script src="js/gridscroll.js"></script>
                                    <script src="js/contact.js"></script>
                                    <script src="js/common.js"></script>
                                    <script src="js/notify.js"></script>
                                    <script src="js/md5.js"></script>
                                    <script src="js/Validaciones.js"></script>
                                    <script src="js/gastromapa.js"></script>
                                    <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJTjtoTHR0kgmC22A1bfQ4qPPI6MOUizU&callback=initMap">
                                    </script>

                                    <script type="text/javascript">
                                        jQuery(function ($) {
                                            $(document).ready(function () {
                                                //enabling stickUp on the '.navbar-wrapper' class
                                                $('.navbar-wrapper').stickUp({
                                                    itemClass: 'menuItem',
                                                    itemHover: 'active',
                                                    topMargin: 'auto'
                                                });
                                            });
                                        });
                                    </script>
</body>
</html>
