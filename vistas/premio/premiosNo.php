<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
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

<section id="seccionPre" name="crearPincho">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2>Premios</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <p>Todav&iacute;a no se han repartido los premios porque el concurso aun no se ha acabado.</p>
        </div>
    </div>
</section>