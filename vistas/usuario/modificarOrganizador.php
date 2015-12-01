<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaPinProp = $view->getVariable("listaPinProp");
$usuario = $view->getVariable("currentusername");
?>
									<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?= i18n("+ opciones")?> <span class="caret"></span></a>
										<ul class="dropdown-menu menuOc" role="menu">
											<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarProfesionalVista#seccionCJP"><?= i18n("Crear Jurado Profesional")?></a></li>
											<li class="menuItem"><a href="index.php?controller=organizador&amp;action=asignarPinchosVista#seccionAP"><?= i18n("Asignar pinchos")?></a></li>
											<li class="menuItem"><a href="index.php?controller=organizador&amp;action=panelControlVista#seccionPC"><?= i18n("Panel de control")?></a></li>
										</ul>
									</li>
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
	
	<section id="seccionMO">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Modificar Datos Organizador")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=modificarOrganizador">
				<div class="centrador">
					<input name="pass" type="password" class="contact centrador" placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>" >
					<input name="pass2" type="password" class="contact centrador" placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<input type="submit" class="contact submit" value="<?php echo i18n("Modificar"); ?>">
				</div>	
			</form>
		</div>
	</section>