<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$direcciones = $view->getVariable("direcciones");
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

<section class="aboutus" id="seccionG">
    <div class="container">
        <div class="heading text-center">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2>Gastromapa</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
        </div>
        <h3><br></h3>

        <div class="row">
            <div class="col-md-12 ">
                <?php $arrayAJS=json_encode($direcciones);?>
                <script type="text/javascript">
                    var arrayDirecc= new Array();
                    arrayDirecc=<?php echo json_encode($direcciones);?>
                </script>
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>