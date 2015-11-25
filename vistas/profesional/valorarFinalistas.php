<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaFinalistas = $view->getVariable("listaFinalistas");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarProfesionalVista#seccionMPRO">Modificar perfil</a></li>
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


<!--Una vez acabado el plazo de elegir finalistas mostramos esto-->
<section id="seccionI" name="Valorar Finalistas">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2>Valorar pinchos finalistas</h2>
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h3><br></h3>

            <h3><br></h3>
        </div>
    </div>
    <div class="container">
        <form class="form-vertical" action="index.php?controller=profesional&amp;action=valorarFinalistas"
              method="POST">
            <div class="form">
                <div class="row">
                    <!--Esto va dentro del bucle-->
                    <?php foreach ($listaFinalistas as $pincho): ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["idPincho"]; ?>"
                                   class="pincho"><h4><?php echo $pincho["nombreP"]; ?></h4></a>

                                <div class="inputValoracion">
                                    <?php
                                    if (isset($pincho["puntuacion"])) {
                                        $comienzo = "n: ";
                                        $final = ";";
                                        $contC = strpos($pincho["puntuacion"], $comienzo);
                                        $contF = strpos($pincho["puntuacion"], $final);
                                        $descripcion = substr($pincho["puntuacion"], $contC + 3, $contF - $contC - 3);
                                    }
                                    ?>
                                    <input type="text" maxlength="3" name="presentacion[]" size="3"
                                           value="<?php if (isset($pincho["puntuacion"])) {
                                               echo $descripcion;
                                           } ?>">
                                    Presentaci&oacute;n
                                </div>
                                <div class="inputValoracion">
                                    <?php
                                    if (isset($pincho["puntuacion"])) {
                                        $comienzo = "r: ";
                                        $final = "!";
                                        $contC = strpos($pincho["puntuacion"], $comienzo);
                                        $contF = strpos($pincho["puntuacion"], $final);
                                        $sabor = substr($pincho["puntuacion"], $contC + 3, $contF - $contC - 3);
                                    }
                                    ?>
                                    <input type="text" maxlength="3" name="sabor[]" size="3"
                                           value="<?php if (isset($pincho["puntuacion"])) {
                                               echo $sabor;
                                           } ?>">
                                    Sabor
                                </div>
                                <div class="inputValoracion">
                                    <?php
                                    if (isset($pincho["puntuacion"])) {
                                        $comienzo = "a: ";
                                        $final = "?";
                                        $contC = strpos($pincho["puntuacion"], $comienzo);
                                        $contF = strpos($pincho["puntuacion"], $final);
                                        $textura = substr($pincho["puntuacion"], $contC + 3, $contF - $contC - 3);
                                    }
                                    ?>
                                    <input type="text" maxlength="3" name="textura[]" size="3"
                                           value="<?php if (isset($pincho["puntuacion"])) {
                                               echo $textura;
                                           } ?>">
                                    Textura
                                </div>
                                <div class="inputValoracion">
                                    <?php
                                    if (isset($pincho["puntuacion"])) {
                                        $comienzo = "d: ";
                                        $final = "¡";
                                        $contC = strpos($pincho["puntuacion"], $comienzo);
                                        $contF = strpos($pincho["puntuacion"], $final);
                                        $originalidad= substr($pincho["puntuacion"], $contC + 3, $contF - $contC - 3);
                                    }
                                    ?>
                                    <input type="text" maxlength="3" name="originalidad[]" size="3"
                                           value="<?php if (isset($pincho["puntuacion"])) {
                                               echo $originalidad;
                                           } ?>">
                                    Originalidad
                                </div>
                                <input type="hidden" name="pincho[]" value="<?php echo $pincho["idPincho"]; ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!------>
                </div>
            </div>
            <div class="input-group centrador">
                <h3><br></h3>
                <input type="submit" class="contact submit" value="Valorar">
            </div>
        </form>
    </div>
</section>