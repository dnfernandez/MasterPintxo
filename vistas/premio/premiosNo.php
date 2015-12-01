<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
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
            <p><?= i18n("Todav&iacute;a no se han repartido los premios porque el concurso aun no se ha acabado.")?></p>
        </div>
    </div>
</section>