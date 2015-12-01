<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$profesional = $view->getVariable("modProfesional");
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
	
	<section id="seccionMPRO">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Modificar Datos Jurado Profesional</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=modificarProfesional" id="modjpro">
				<div class="centrador">
					<input name="name" type="text" class="contact centrador" id="modNameJPro" onblur="validateEmpty('modNameJPro')" value="<?php echo $profesional["nombreJPro"];?>" >
					<input name="telef" type="text" class="contact centrador" id="modTelefJPro" onblur="validateTelefono('modTelefJPro')" value="<?php echo $profesional["telefJPro"];?>" >
				</div>
				<div class="centrador">
					<input name="pass" type="password" class="contact centrador" placeholder="Contrase&ntilde;a" id="modPassJPro" onfocus="ayudaPass2()" >
					<input name="pass2" type="password" class="contact centrador" placeholder="Repetir contrase&ntilde;a" id="modRepeatPassJPro" onblur="validatePassword('modPassJPro','modRepeatPassJPro')" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
<!--					<input type="submit" class="contact submit" value="Modificar">-->
					<button id="btn-login" type="button" onclick="validateModJPro('modjpro')" class="contact submit" value="Modificar">Modificar </button>

				</div>	
			</form>
		</div>
	</section>