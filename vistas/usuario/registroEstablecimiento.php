<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarPopularVista#seccionRU"><?= i18n("Registro Usuario")?></a></li>
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
	
	<section id="seccionRE">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Registro Establecimiento")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=registrarEstablecimiento" id="registerestablishmentform">
				<div class="centrador">
					<?php $trad = i18n("Tienes un campo vac\u00edo") ?>
					<input name="name" type="text" class="contact centrador" placeholder="<?php echo i18n("Nombre"); ?>" id="NombreEstablecimiento" onblur="validateEmpty('NombreEstablecimiento','<?php echo $trad ;?>')">
					<?php $trad = i18n("Introduzca un NIF v\u00E1lido") ?>
					<input name="login" type="text" class="contact centrador" placeholder="Nif" id="NIF" onblur="validateNIF('<?php echo $trad ;?>')" >
				</div>
				<div class="centrador">
					<?php $trad = i18n("Introduzca una Direcci\u00F3n v\u00E1lida") ?>
					<?php $trad1 = i18n("La dirección debe ser Calle, Numero, Ciudad") ?>
					<input name="direccion" type="text" class="contact centrador" placeholder="<?php echo i18n("Direcci&oacute;n"); ?>" id="DireccionEstablecimiento" onfocus="ayudaDir('<?php echo $trad1 ;?>')" onblur="validateDir('DireccionEstablecimiento','<?php echo $trad ;?>')">
					<?php $trad = i18n("Introduzca un Telefono v\u00E1lido") ?>
					<input name="telf" type="text" class="contact centrador"  placeholder="<?php echo i18n("Tel&eacute;fono"); ?>" id="Telefono" onblur="validateTelefono('Telefono','<?php echo $trad ;?>')">
				</div>
				<div class="centrador">
					<?php $trad = i18n("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres") ?>
					<input name="pass" type="password" class="contact centrador" placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>" id="PassEstablecimiento" onfocus="ayudaPass('<?php echo $trad ;?>')">
					<input name="pass2" type="password" class="contact centrador"  placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>" id="RepeatPassEstablecimiento" onblur="validatePassword('PassEstablecimiento','RepeatPassEstablecimiento','<?php echo $trad ;?>')">

				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<button id="btn-login" type="button" onclick="validateNewEstablishment('registerestablishmentform')" class="contact submit" value="Registrar"><?php echo i18n("Registrar"); ?></button>

<!--					<input type="submit" class="contact submit" value="Registrar">-->
				</div>	
			</form>
		</div>
	</section>