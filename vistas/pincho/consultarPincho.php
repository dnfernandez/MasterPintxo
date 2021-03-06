<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$pincho = $view->getVariable("datosPincho");
$organizador = $view->getVariable("organizador");
$popular = $view->getVariable("popular");
$usuario = $view->getVariable("currentusername");
$comentarios = $view->getVariable("comentarios");
?>

                                    <?php
                                            if (isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">'.i18n("Inicio").'</a></li>';
                                            if (!isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>';
                                            if (!isset($usuario)) echo '
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> '.i18n("Registro").' <span class="caret"></span></a>
                                                    <ul class="dropdown-menu menuOc" role="menu">
                                                        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarPopularVista#seccionRU">'.i18n("Registro Usuario").'</a></li>
                                                        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarEstablecimientoVista#seccionRE">'.i18n("Registro Establecimiento").'</a></li>
                                                    </ul>
                                                </li>';
                                            if (isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=logout">'.i18n("Cerrar sesi&oacute;n").'</a></li>';
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
                                <h5><?= i18n("Descripci&oacute;n")?></h5>

                                <div>
                                    <?php echo htmlentities($p["descripcionP"]);?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5><?= i18n("Precio")?></h5>

                                <div>
                                    <?php echo $p["precio"];?> euros
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5><?= i18n("Establecimiento")?></h5>

                                <div>
                                    <?php echo htmlentities($p["nombreE"]);?>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h5><?= i18n("Tel&eacute;fono")?></h5>

                                <div>
                                    <?php echo $p["telfE"];?>
                                </div>
                                <h5><?= i18n("Direcci&oacute;n")?></h5>

                                <div>
                                    <?php echo htmlentities($p["direccionE"]);?>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($organizador)): ?>
                            <div class="row text-center">
                            <br>
                                <form class="form-vertical" method="POST" action="index.php?controller=organizador&amp;action=validarPropuesta">
                                    <div class="col-md-12">
                                        <button type="submit" name="aceptar" class="contact submit"><?= i18n("Aceptar")?></button>
                                        <button type="submit" name="denegar" class="contact submit"><?= i18n("Denegar")?></button>
                                    </div>
                                    <input type="hidden" name="idPincho" value="<?php echo $p["idPincho"]; ?>">
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>
<section id="seccionCom">
    <div class="container">
        <div class="heading text-center">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?= i18n("Comentarios")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
        </div>
        <div class="comentarios centrador3">
            <?php if(isset($popular)):?>
                <div class="row">
                    <div class="col-md-12">
                        <form action="index.php?controller=pincho&amp;action=insertarComentario" method="post">
                            <textarea name="comentario" class="textCom" placeholder="<?php echo i18n("Escribe aqu&iacute; tu comentario p&uacute;blico"); ?>"></textarea>
                            <input type="hidden" name="idPincho" value="<?php echo $_GET["idPincho"];?>">
                            <div class="btnCom">
                                <button type="submit"><?= i18n("Comentar")?></button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            <!--Bucle-->
            <?php foreach($comentarios as $c):?>
            <div class="row cajaComentarios">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 nombCom">
                            <?php echo $c["nombreJP"];?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 comCom">
                            <?php echo $c["comentario"];?>
                        </div>
                    </div>
                    <div class="linCom">

                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <!--->
        </div>
    </div>
</section>
