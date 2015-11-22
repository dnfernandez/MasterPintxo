<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarEstablecimientoVista#seccionME">Modificar Perfil</a></li>
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
            <h2>Crear pincho</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h3><br></h3>
        </div>
    </div>
    <div class="container">
        <form method="post" action="index.php?controller=establecimiento&amp;action=crearPincho" enctype="multipart/form-data">
            <div class="centrador">
                <input name="namePin" type="text" class="contact centrador" placeholder="Nombre pincho" >
                <input name="precioPin" type="text" class="contact centrador" placeholder="Precio" >
            </div>
            <div class="centrador">
                <textarea class="contact textDes" name="descripPin" placeholder="Descripci&oacute;n"></textarea>
            </div>
            <div class="form-group centradorCajFile">
                <input name="uploadedfile" type="file" style="width: 480px;" class="contact" >
            </div>
            <div class="input-group centrador">
                <input type="submit" class="contact submit" value="Presentar">
            </div>
        </form>
    </div>
</section>