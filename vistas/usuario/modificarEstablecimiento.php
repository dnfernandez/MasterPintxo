<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$establecimiento=$view->getVariable("modEstablecimiento");
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
	
	<section id="seccionME">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Modificar Datos Establecimiento</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=modificarEstablecimiento" id="modestablishmentform" >
				<div class="centrador">
					<input name="name" type="text" class="contact centrador" id="newNameEsta" onblur="validateEmpty('newNameEsta')" value="<?php echo $establecimiento["nombreE"];?>" >
					<input name="telef" type="text" class="contact centrador" id="newTelefEsta" onblur="validateTelefono('newTelefEsta')" value="<?php echo $establecimiento["telfE"];?>" >
				</div>
				<div class="centrador">
					<input name="direccion" type="text" class="contact centrador" id="newDirEsta" onblur="validateEmpty('newDirEsta')" value="<?php echo $establecimiento["direccionE"];?>"" >
				</div>
				<div class="centrador">
					<input name="pass" type="password" class="contact centrador" id="newPassEsta" placeholder="Contrase&ntilde;a" >
					<input name="pass2" type="password" class="contact centrador" id="newRePassEsta" onblur="validatePassword('newPassEsta','newRePassEsta')" placeholder="Repetir contrase&ntilde;a" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
<!--					<input type="submit" class="contact submit" value="Modificar">-->
					<button id="btn-login" type="button" onclick="validateModEstablishment('modestablishmentform')" class="contact submit" value="Modificar">Modificar</button>

				</div>	
			</form>
		</div>
	</section>
