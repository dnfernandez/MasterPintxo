<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<?php
if (isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">'.i18n("Inicio").'</a></li>';
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

<section id="seccionMen" name="crearPincho">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?= i18n("Fin de concurso")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <p><?= i18n("MasterPintxo ha llegado a su fin.<br>
                En la secci&oacute;n + informaci&oacute;n est&aacute; disponible el reparto de premios.<br>
                Muchas gracias por participar.")?></p>
        </div>
    </div>
</section>