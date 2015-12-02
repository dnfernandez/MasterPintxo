<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?= i18n("+ opciones")?> <span class="caret"></span></a>
	<ul class="dropdown-menu menuOc" role="menu">
		<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarOrganizadorVista#seccionMO"><?= i18n("Modificar perfil")?></a></li>
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
	
	<section id="seccionCJP">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Crear Jurado Profesional")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=registrarProfesional" id="registerjpro">
				<div class="centrador">
					<?php $trad = i18n("Introduzca un DNI v\u00E1lido") ?>
					<input name="login" type="text" class="contact centrador" placeholder="Dni" id="DNIJPro" onblur="validateDNI('DNIJPro','<?php echo $trad ;?>')" >
					<?php $trad = i18n("Tienes un campo vac\u00edo") ?>
					<input name="name" type="text" class="contact centrador" placeholder="<?= i18n("Nombre y apellidos")?>"  id="NombreJPro" onblur="validateEmpty('NombreJPro','<?php echo $trad ;?>')">
				</div>
				<div class="centrador">
					<?php $trad = i18n("Introduzca un Telefono v\u00E1lido") ?>
					<input name="telf" type="text" class="contact centrador" placeholder="<?= i18n("Tel&eacute;fono")?>" id="TelefJPro" onblur="validateTelefono('TelefJPro','<?php echo $trad ;?>')" >
				</div>
				<div class="centrador">
					<?php $trad = i18n("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres") ?>
					<input name="pass" type="password" class="contact centrador" placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>" id="PassJPro" onfocus="ayudaPass(<?php echo i18n("Contrase&ntilde;a"); ?>)">
					<input name="pass2" type="password" class="contact centrador" placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>" id="PassRepeatJPro" onblur="validatePassword('PassJPro','PassRepeatJPro')" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<button id="btn-login" type="button" onclick="validateNewJPro('registerjpro')" class="contact submit" value="Registrar"><?= i18n("Enviar")?> </button>

<!--					<input type="submit" class="contact submit" value="Crear">-->
				</div>	
			</form>
		</div>
	</section>