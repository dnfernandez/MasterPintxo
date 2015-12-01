<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= i18n("+ opciones")?>  <span class="caret"></span></a>
    <ul class="dropdown-menu menuOc" role="menu">
        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarOrganizadorVista#seccionMO"><?= i18n("Modificar perfil")?></a></li>
        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarProfesionalVista#seccionCJP"><?= i18n("Crear Jurado Profesional")?></a></li>
        <li class="menuItem"><a href="index.php?controller=organizador&amp;action=asignarPinchosVista#seccionAP"><?= i18n("Asignar pinchos")?></a></li>
    </ul>
</li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=logout"><?= i18n("Cerrar sesi&oacute;")?>n</a></li>
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

<section id="seccionPC">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?= i18n("Panel de control")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h3><br></h3>
            <h3><br></h3>
        </div>
    </div>
    <div class="container control">
        <span class="panel">
            <a href="index.php?controller=organizador&amp;action=asignarFinalistas"><button class="btnPanel" type="button"><?= i18n("Valoraci&oacute;n de finalistas")?></button></a>
        </span>
        <span class="panel">
            <a href="index.php?controller=organizador&amp;action=listarJPop#seccionL"><button class="btnPanel" type="button"><?= i18n("Lista de Jurado Popular")?></button></a><br>
        </span>
        <span class="panel">
            <a href="index.php?controller=organizador&amp;action=listarJPro#seccionL"><button class="btnPanel" type="button"><?= i18n("Lista de Jurado Profesional")?></button></a>
        </span>
        <span class="panel">
            <a href="index.php?controller=organizador&amp;action=listarEst#seccionL"><button class="btnPanel" type="button"><?= i18n("Lista de Establecimientos")?></button></a>
        </span>
        <span class="panel">
            <a href="index.php?controller=premio&amp;action=calcularPremio"><button class="btnPanel" type="button"><?= i18n("Repartir premios")?></button></a>
        </span>
    </div>
</section>

