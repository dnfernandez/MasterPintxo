<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$profesional = $view->getVariable("modProfesional");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
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
	
	<section id="seccionMPRO">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Modificar Datos Jurado Profesional")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=modificarProfesional" id="modjpro">
				<div class="centrador">
					<?php $trad = i18n("Tienes un campo vac\u00edo") ?>
					<input name="name" type="text" class="contact centrador" id="modNameJPro" onblur="validateEmpty('modNameJPro','<?php echo $trad ;?>')" value="<?php echo $profesional["nombreJPro"];?>" >
					<?php $trad = i18n("Introduzca un Telefono v\u00E1lido") ?>
					<input name="telef" type="text" class="contact centrador" id="modTelefJPro" onblur="validateTelefono('modTelefJPro','<?php echo $trad ;?>')" value="<?php echo $profesional["telefJPro"];?>" >
				</div>
				<div class="centrador">
					<?php $trad = i18n("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres") ?>
					<input name="pass" type="password" class="contact centrador" placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>" id="modPassJPro" onfocus="ayudaPass2('<?php echo $trad ;?>')" >
					<input name="pass2" type="password" class="contact centrador" placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>" id="modRepeatPassJPro" onblur="validatePassword('modPassJPro','modRepeatPassJPro','<?php echo $trad ;?>')" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
<!--					<input type="submit" class="contact submit" value="Modificar">-->
					<button id="btn-login" type="button" onclick="validateModJPro('modjpro')" class="contact submit" value="Modificar"><?= i18n("Modificar")?> </button>

				</div>	
			</form>
		</div>
	</section>