<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$pincho = $view->getVariable("datosPincho");
$usuario = $view->getVariable("currentusername");
?>

                                    <?php
                                            if (isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>';
                                            if (!isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>';
                                            if (!isset($usuario)) echo '
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Registro <span class="caret"></span></a>
                                                    <ul class="dropdown-menu menuOc" role="menu">
                                                        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarPopularVista#seccionRU">Registro Usuario</a></li>
                                                        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarEstablecimientoVista#seccionRE">Registro Establecimiento</a></li>
                                                    </ul>
                                                </li>';
                                            if (isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=logout">Cerrar sesión</a></li>';
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php foreach ($pincho as $p): ?>
<!--about us-->
<section class="aboutus" id="seccionI">
    <div class="container">
        <div class="heading text-center">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?php echo htmlentities($p["nombreP"]);?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tamPin">
                    <div class="papers cenConPin">
                        <img src="<?php echo $p["rutaImagen"];?>" alt="imagen"><br/>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Descripci&oacute;n</h5>

                                <div>
                                    <?php echo htmlentities($p["descripcionP"]);?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Precio</h5>

                                <div>
                                    <?php echo $p["precio"];?> euros
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Establecimiento</h5>

                                <div>
                                    <?php echo htmlentities($p["nombreE"]);?>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h5>Tel&eacute;fono</h5>

                                <div>
                                    <?php echo $p["telfE"];?>
                                </div>
                                <h5>Direcci&oacute;n</h5>

                                <div>
                                    <?php echo htmlentities($p["direccionE"]);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>