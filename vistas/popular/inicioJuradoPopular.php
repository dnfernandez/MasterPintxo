<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$numCodigos = $view->getVariable("numCodigos");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarUsuarioVista#seccionMU">Modificar perfil</a></li>
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

<!--Si no hay codigos pendientes de votacion mostramos esto-->
<section id="seccionI" name="Introducir codigos">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2>Introducir c&oacute;digos</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h3><br></h3>

            <h3><br></h3>
        </div>
    </div>
    <div class="container">
        <form class="form-vertical" action="index.php?controller=popular&amp;action=introducirCodigos" method="POST">
            <div class="form centrador">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="contact" size="40" placeholder="Introducir primer c&oacute;digo"
                               name="cod1">
                    </div>
                </div>
                <?php if ($numCodigos <= 1):
                    echo '	<div class="row">
									<div class="col-md-12">
										<input type="text" class="contact" size="40" placeholder="Introducir segundo c&oacute;digo" name="cod2">
									</div>
								</div>';
                endif; ?>
                <?php if ($numCodigos == 0):
                    echo '	<div class="row">
										<div class="col-md-12">
											<input type="text" class="contact" size="40" placeholder="Introducir tercer c&oacute;digo" name="cod3">
										</div>
									</div>
								</div>';
                endif; ?>
                <div class="input-group centrador">
                    <h3><br></h3>
                    <input type="submit" class="contact submit" value="Enviar">
                </div>
        </form>
    </div>
</section>