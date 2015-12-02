<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarEstablecimientoVista#seccionRE"><?= i18n("Registro Establecimiento")?></a></li>
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

<section id="seccionRU">
	<div class="container">
		<div class="heading">
			<img class="dividerline" src="img/sep.png" alt="separador">
			<h2><?= i18n("Registro Usuario")?></h2>
			<img class="dividerline" src="img/sep.png" alt="separador">
			<h3><br></h3>
		</div>
	</div>
	<div class="container">
		<form method="post" action="index.php?controller=usuario&amp;action=registrarPopular" id="registerform" >
			<div class="centrador">
				<?php $trad = i18n("Tienes un campo vac\u00edo") ?>
				<input name="name" type="text" class="contact centrador" placeholder="<?php echo i18n("Nombre"); ?>" id="Nombre" onblur="validateEmpty('Nombre','<?php echo $trad ;?>')">
				<input name="apellidos" type="text" class="contact centrador" placeholder="<?php echo i18n("Apellidos"); ?>" id="Apellidos"  onblur="validateEmpty('Apellidos','<?php echo $trad ;?>')">
			</div>
			<div class="centrador">
				<?php $trad2 = i18n("Introduzca un DNI v\u00E1lido") ?>
				<input name="login" type="text" class="contact centrador" placeholder="Dni" id="DNI"  onblur="validateDNI('DNI','<?php echo $trad2 ;?>')">
				<input name="direccion" type="text" class="contact centrador" placeholder="<?php echo i18n("Direcci&oacute;n"); ?>" id="Direccion" onblur="validateEmpty('Direccion','<?php echo $trad ;?>')" >
			</div>
			<div class="input-group centrador">
				<?php $trad = i18n("Introduzca un CP v\u00E1lido") ?>
				<input name="cp" type="text" class="contact centrador" placeholder="<?php echo i18n("C&oacute;digo postal"); ?>" id="CP" onblur="validateCP('CP','<?php echo $trad ;?>')" >
			</div>
			<div class="centrador">
				<?php $trad = i18n("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres") ?>
				<input name="pass" type="password" class="contact centrador" placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>" id="Password" onfocus="ayudaPass('<?php echo $trad ;?>')">
				<input name="pass2" type="password" class="contact centrador"placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>" id="RepeatPassword"  onblur="validatePassword('Password','RepeatPassword','<?php echo $trad ;?>')">

			</div>
			<div class="centrador flash">
				<?php echo $view->popFlash();?>
			</div>
			<div class="input-group centrador">
				<button id="btn-login" type="button" onclick="validateNewUser('registerform')" class="contact submit" value="Registrar"><?php echo i18n("Registrar"); ?> </button>
				<!--					<input type="submit" class="contact submit" value="Registrar">-->
			</div>
		</form>
	</div>
</section>