<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$codigos = $view->getVariable("codigosEst");
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

<!--Si ya tiene un pincho creado y concursante = 1 mostramos -->
<section id="seccionI" name="generarCodigos">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2>Generar c&oacute;digos</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h3><br></h3>

            <h3><br></h3>
        </div>
    </div>
    <div class="container">
        <form method="post" action="index.php?controller=establecimiento&amp;action=generarCodigos"
              class="form-vertical">
            <div class="form-group">
                <label>N&uacute;mero de c&oacutedigos:</label>

                <div class="btn-group">
                    <select class="contact submit" name="cantidad">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="contact submit">Generar</button>
                </div>
            </div>
        </form>
        <div>
            <label>Códigos generados:</label>

            <div class="form-control cajaCodigos">
                <div class="row centrador">
                    <?php foreach ($codigos as $codigo) : ?>
                        <div class="col-md-1">
                            <?php echo $codigo["idCodigo"];?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>