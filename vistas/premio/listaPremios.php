<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
$premios = $view->getVariable("premios");
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

<section id="seccionPre" name="crearPincho">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?= i18n("Premios")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h3><br></h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="restmenuwrap">
                    <h3 class="maincat notopmarg text-center"><?= i18n("1º PREMIO")?></h3>
                    <?php foreach($premios as $p):
                        if(stristr($p["nombrePremio"],"1")!=false):
                            ?>
                            <div class="restitem clearfix">
                                <h4><?php echo $p["nombreP"]; ?></h4>
                                <a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $p["idPincho"]; ?>#seccionI">
                                    <img class="rm-thumb" src="<?php echo $p["rutaImagen"]; ?>" alt="imagen">
                                </a>
                                <h5><?php echo $p["nombrePremio"]; ?></h5>
                                <p>
                                    <?php echo $p["descripcionPremio"]; ?>
                                </p>
                            </div>
                            <?php
                        endif;
                    endforeach;?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="restmenuwrap">
                    <h3 class="maincat notopmarg text-center"><?= i18n("2º PREMIO")?></h3>
                    <?php foreach($premios as $p):
                        if(stristr($p["nombrePremio"],"2")!=false):
                            ?>
                            <div class="restitem clearfix">
                                <h4><?php echo $p["nombreP"]; ?></h4>
                                <a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $p["idPincho"]; ?>#seccionI">
                                    <img class="rm-thumb" src="<?php echo $p["rutaImagen"]; ?>" alt="imagen">
                                </a>
                                <h5><?php echo $p["nombrePremio"]; ?></h5>
                                <p>
                                    <?php echo $p["descripcionPremio"]; ?>
                                </p>
                            </div>
                            <?php
                        endif;
                    endforeach;?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="restmenuwrap">
                    <h3 class="maincat notopmarg text-center"><?= i18n("3º PREMIO")?></h3>
                    <?php foreach($premios as $p):
                        if(stristr($p["nombrePremio"],"3")!=false):
                            ?>
                            <div class="restitem clearfix">
                                <h4><?php echo $p["nombreP"]; ?></h4>
                                <a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $p["idPincho"]; ?>#seccionI">
                                    <img class="rm-thumb" src="<?php echo $p["rutaImagen"]; ?>" alt="imagen">
                                </a>
                                <h5><?php echo $p["nombrePremio"]; ?></h5>
                                <p>
                                    <?php echo $p["descripcionPremio"]; ?>
                                </p>
                            </div>
                            <?php
                        endif;
                    endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>