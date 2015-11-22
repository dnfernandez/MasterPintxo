<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaPinchosVotar = $view->getVariable("listaPinchosVotar");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="menuItem"><a href="#">Modificar perfil</a></li>
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

<!--Una vez se hayan introducido los 3 codigos mostramos esto-->
<section id="seccionI" name="Elegir Finalistas">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2>Votar pincho</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h3><br></h3>

            <h3><br></h3>
        </div>
    </div>
    <div class="container">
        <form class="form-vertical" action="index.php?controller=popular&amp;action=votar" method="post">
            <div class="form centrador">
                <div class="row">
                    <!--Esto va dentro del bucle-->
                    <?php foreach ($listaPinchosVotar as $pincho): ?>
                        <div class="col-md-4">
                            <input type="radio" class="contact" name="pincho" value="<?php echo $pincho["idPincho"]; ?>">
                            <a href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["idPincho"]; ?>"
                               class="contact pincho"><?php echo $pincho["nombreP"]; ?></a>
                            </input>
                            <input type="hidden" name="pinchos[]" value="<?php echo $pincho["idPincho"]; ?>">
                            <input type="hidden" name="codigos[]" value="<?php echo $pincho["idCodigo"]; ?>">
                        </div>
                    <?php endforeach; ?>
                    <!------>
                </div>
            </div>
            <div class="input-group centrador">
                <h3><br></h3>
                <input type="submit" class="contact submit" value="Votar">
            </div>
        </form>
    </div>
</section>