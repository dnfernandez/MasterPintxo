<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$popular = $view->getVariable("modPopular");
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
	
	<section id="seccionMU">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Modificar Datos Usuario")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&action=modificarUsuario" id="modificaruser">
				<div class="centrador">
					<?php $trad = i18n("Tienes un campo vac\u00edo") ?>
					<input name="name" type="text" class="contact centrador" id="newName"  onblur="validateEmpty('newName','<?php echo $trad ;?>')" value="<?php echo $popular["nombreJP"];?>" >
					<input name="apellidos" type="text" class="contact centrador" id="newApellido"  onblur="validateEmpty('newApellido','<?php echo $trad ;?>')" value="<?php echo $popular["apellidosJP"];?>" >
				</div>
				<div class="centrador">
					<input name="direccion" type="text" class="contact centrador" id="newDireccion" onblur="validateEmpty('newDireccion','<?php echo $trad ;?>')" value="<?php echo $popular["direccion"];?>" >
					<?php $trad = i18n("Introduzca un CP v\u00E1lido") ?>
					<input name="cp" type="text" class="contact centrador" id="newCP" onblur="validateCP('newCP','<?php echo $trad ;?>')" value="<?php echo $popular["cp"];?>" >
				</div>
				<div class="centrador">
					<?php $trad = i18n("Las contraseñas deben coincidir y tener un número ,una letra y entre 6 y 15 caracteres") ?>
					<input name="pass" type="password" class="contact centrador" id="newPass"  placeholder="<?php echo i18n("Contrase&ntilde;a"); ?>"  onfocus="ayudaPass2('<?php echo $trad ;?>')">
					<input name="pass2" type="password" class="contact centrador" id="newRepeatPass" placeholder="<?php echo i18n("Repetir contrase&ntilde;a"); ?>"" >

				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<button id="btn-login" type="button" onclick="validateModUser('modificaruser')" class="contact submit" value="Modificar"><?= i18n("Modificar")?></button>

				</div>	
			</form>
		</div>
	</section>