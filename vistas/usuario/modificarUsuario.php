<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$popular = $view->getVariable("modPopular");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
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
	
	<section id="seccionMU">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Modificar Datos Usuario</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&action=modificarUsuario" id="modificaruser">
				<div class="centrador">
					<input name="name" type="text" class="contact centrador" id="newName"  onblur="validateEmpty('newName')" value="<?php echo $popular["nombreJP"];?>" >
					<input name="apellidos" type="text" class="contact centrador" id="newApellido"  onblur="validateEmpty('newApellido')" value="<?php echo $popular["apellidosJP"];?>" >
				</div>
				<div class="centrador">
					<input name="direccion" type="text" class="contact centrador" id="newDireccion" onblur="validateEmpty('newDireccion')" value="<?php echo $popular["direccion"];?>" >
					<input name="cp" type="text" class="contact centrador" id="newCP" onblur="validateCP('newCP')" value="<?php echo $popular["cp"];?>" >
				</div>
				<div class="centrador">
					<input name="pass" type="password" class="contact centrador" id="newPass" placeholder="Contrase&ntilde;a" >
					<input name="pass2" type="password" class="contact centrador" id="newRepeatPass" placeholder="Repetir contrase&ntilde;a" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<button id="btn-login" type="button" onclick="validateModUser('modificaruser')" class="contact submit" value="Modificar">Modificar</button>

				</div>	
			</form>
		</div>
	</section>