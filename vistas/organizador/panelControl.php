<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> + opciones <span class="caret"></span></a>
    <ul class="dropdown-menu menuOc" role="menu">
        <li class="menuItem"><a href="#">Modificar perfil</a></li>
        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarProfesionalVista#seccionCJP">Crear Jurado Profesional</a></li>
        <li class="menuItem"><a href="index.php?controller=organizador&amp;action=asignarPinchosVista#seccionAP">Asignar pinchos</a></li>
    </ul>
</li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=logout">Cerrar sesi&oacute;n</a></li>
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
            <h2>Panel de control</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h3><br></h3>
            <h3><br></h3>
        </div>
    </div>
    <div class="container control">
        <span class="panel">
            <a href="index.php?controller=organizador&amp;action=asignarFinalistas"><button class="btnPanel" type="button">Valoraci&oacute;n de finalistas</button></a>
        </span>
        <span class="panel">
            <a href=""><button class="btnPanel" type="button">Lista de Jurado Popular</button></a><br>
        </span>
        <span class="panel">
            <a href=""><button class="btnPanel" type="button">Lista de Jurado Profesional</button></a>
        </span>
        <span class="panel">
            <a href=""><button class="btnPanel" type="button">Lista de Establecimientos</button></a>
        </span>
    </div>
</section>

