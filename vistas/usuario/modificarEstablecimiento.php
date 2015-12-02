<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$establecimiento=$view->getVariable("modEstablecimiento");
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
	
	<section id="seccionME">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Modificar Datos Establecimiento")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=modificarEstablecimiento" id="modestablishmentform" >
				<div class="centrador">
					<?php $trad = i18n("Tienes un campo vac\u00edo") ?>
					<input name="name" type="text" class="contact centrador" id="newNameEsta" onblur="validateEmpty('newNameEsta','<?php echo $trad ;?>')" value="<?php echo $establecimiento["nombreE"];?>" >
					<?php $trad = i18n("Introduzca un Telefono v\u00E1lido") ?>
					<input name="telef" type="text" class="contact centrador" id="newTelefEsta" onblur="validateTelefono('newTelefEsta','<?php echo $trad ;?>')" value="<?php echo $establecimiento["telfE"];?>" >
				</div>
				<div class="centrador">
					<?php $trad = i18n("Introduzca una Direcci\u00F3n v\u00lida") ?>
					<?php $trad1 = i18n("La dirección debe ser Calle, Numero, Ciudad") ?>
					<input name="direccion" type="text" class="contact centrador" id="newDirEsta" onfocus="ayudaDir('<?php echo $trad1 ;?>')" onblur="validateDir('newDirEsta','<?php echo $trad ;?>')" value="<?php echo $establecimiento["direccionE"];?>"" >
				</div>
				<div class="centrador">
					<?php $trad = i18n("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres") ?>
					<input name="pass" type="password" class="contact centrador" id="newPassEsta" placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>"  onfocus="ayudaPass('<?php echo $trad ;?>')">
					<input name="pass2" type="password" class="contact centrador" id="newRePassEsta" onblur="validatePassword('newPassEsta','newRePassEsta','<?= $trad?>')" placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>" >

				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
<!--					<input type="submit" class="contact submit" value="Modificar">-->
					<button id="btn-login" type="button" onclick="validateModEstablishment('modestablishmentform')" class="contact submit" value="Modificar"><?= i18n("Modificar")?></button>

				</div>	
			</form>
		</div>
	</section>
