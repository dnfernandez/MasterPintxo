<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaPinchosVotar = $view->getVariable("listaPinchosVotar");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarUsuarioVista#seccionMU"><?= i18n("Modificar perfil")?></a></li>
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

<!--Una vez se hayan introducido los 3 codigos mostramos esto-->
<section id="seccionI" name="Elegir Finalistas">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2><?= i18n("Votar pincho")?></h2>
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
                            <a class="contact pincho" target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["idPincho"]; ?>">
                                <img class="imgPeq" alt="imagen pincho" src="<?php echo $pincho["rutaImagen"];?>"/>
                            </a>
                            <br>
                            <br>
                            <div>
                                <input type="radio" class="contact" name="pincho" value="<?php echo $pincho["idPincho"]; ?>">
                                <a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["idPincho"]; ?>"
                                   class="contact pincho"><?php echo htmlentities($pincho["nombreP"]); ?></a>
                                </input>
                            </div>
                            <input type="hidden" name="pinchos[]" value="<?php echo $pincho["idPincho"]; ?>">
                            <input type="hidden" name="codigos[]" value="<?php echo $pincho["idCodigo"]; ?>">
                        </div>
                    <?php endforeach; ?>
                    <!------>
                </div>
            </div>
            <div class="input-group centrador">
                <h3><br></h3>
                <input type="submit" class="contact submit" value="<?php echo i18n("Votar"); ?>">
            </div>
        </form>
    </div>
</section>