<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarEstablecimientoVista#seccionME"><?= i18n("Modificar Perfil")?></a></li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=logout"><?= i18n("Cerrar sesi&oacute;n")?></a></li>
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

<!--Mostrar para crear Pincho-->
<section id="seccionI" name="crearPincho">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?= i18n("Información para establecimiento")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <p><?= i18n("El pincho presentado todavía se encuentra a la espera de ser aceptado en el concurso.<br>Por favor, tenga paciencia, disculpe las molestias.")?></p>
        </div>
    </div>
</section>