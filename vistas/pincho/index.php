<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaPinchosAcep = $view->getVariable("listaPinchosAcep");
$descripcionC = $view->getVariable("descripcionC");
$usuario = $view->getVariable("currentusername");
?>
<?php
    if (isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">'.i18n("Inicio").'</a></li>';
    if (!isset($usuario)) echo '<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>';
        if (!isset($usuario)) echo '
                                        <li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> '.i18n("Registro").' <span class="caret"></span></a>
											<ul class="dropdown-menu menuOc" role="menu">
                                                <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarPopularVista#seccionRU">'.i18n("Registro Usuario").'</a></li>
												<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarEstablecimientoVista#seccionRE">'.i18n("Registro Establecimiento").'</a></li>
											</ul>
										</li>';
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

<!--about us-->
<section class="aboutus" id="aboutus">
    <div class="container">
        <div class="heading text-center">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2><?= i18n("Acerca de MasterPintxo")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h3><?php foreach ($descripcionC as $des) {
                    echo $des["descripcionC"];
                } ?></h3>
        </div>
    </div>
</section>

<!--gallery-->
<section class="gallery" id="gallery">
    <div class="container">
        <div class="heading text-center">
            <img class="dividerline" src="img/sep.png" alt="separador">

            <h2><?= i18n("Lista de pinchos concursantes")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
        </div>
        <div id="grid-gallery" class="grid-gallery">

            <section class="grid-wrap">
                <ul class="grid">
                    <li class="grid-sizer"></li><!-- for Masonry column width -->
                    <?php foreach ($listaPinchosAcep as $pinAcep): ?>
                        <li>
                            <figure>
                                <img class="pinchoPec" src="<?php echo $pinAcep["rutaImagen"]; ?>" alt="Imagen"/>
                                <figcaption>
                                    <h3 class="texto"><?php echo htmlentities($pinAcep["nombreP"]); ?></h3>

                                    <p class="texto"><?php echo htmlentities($pinAcep["descripcionP"]); ?></p>
                                </figcaption>
                            </figure>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section><!-- // end small images -->

            <section class="slideshow">
                <ul>
                    <?php foreach ($listaPinchosAcep as $pinAcep): ?>
                        <li>
                            <figure id="pinchoAmp">
                                <img class="imgPinchoAmp" src="<?php echo $pinAcep["rutaImagen"]; ?>" alt="Imagen"/>
                                <figcaption class="texImgPinchoAmp">
                                    <a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pinAcep["idPincho"]; ?>#seccionI">
                                        <h3><?php echo htmlentities($pinAcep["nombreP"]); ?></h3>
                                    </a>
                                    <p><?php echo htmlentities($pinAcep["descripcionP"]); ?></p>
                                </figcaption>
                            </figure>
                        </li>
                    <?php endforeach; ?>

                </ul>
                <nav>
                    <span class="icon nav-prev"></span>
                    <span class="icon nav-next"></span>
                    <span class="icon nav-close"></span>
                </nav>
                <div class="info-keys icon">Navega con las teclas</div>
            </section><!-- // end slideshow -->

        </div><!-- // grid-gallery -->
    </div>

</section>
