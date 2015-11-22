<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="menuItem"><a href="#">Modificar Perfil</a></li>
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

<!--Mostrar para crear Pincho-->
<section id="seccionI" name="crearPincho">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2>Información para establecimiento</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <p>El pincho presentado todavía se encuentra a la espera de ser aceptado en el concurso.<br>
                Por favor, tenga paciencia, disculpe las molestias.</p>
        </div>
    </div>
</section>