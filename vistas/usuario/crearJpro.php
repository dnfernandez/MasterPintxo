<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> + opciones <span class="caret"></span></a>
	<ul class="dropdown-menu menuOc" role="menu">
		<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarOrganizadorVista#seccionMO">Modificar perfil</a></li>
		<li class="menuItem"><a href="index.php?controller=organizador&amp;action=asignarPinchosVista#seccionAP">Asignar pinchos</a></li>
		<li class="menuItem"><a href="index.php?controller=organizador&amp;action=panelControlVista#seccionPC">Panel de control</a></li>
	</ul>
</li>
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
	
	<section id="seccionCJP">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Crear Jurado Profesional</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=registrarProfesional" id="registerjpro">
				<div class="centrador">
					<input name="login" type="text" class="contact centrador" placeholder="Dni" id="DNIJPro" onblur="validateDNI('DNIJPro')" >
					<input name="name" type="text" class="contact centrador" placeholder="Nombre y apellidos"  id="NombreJPro" onblur="validateEmpty('NombreJPro')">
				</div>
				<div class="centrador">
					<input name="telf" type="text" class="contact centrador" placeholder="Tel&eacute;fono" id="TelefJPro" onblur="validateTelefono('TelefJPro')">
				</div>
				<div class="centrador">
					<input name="pass" type="password" class="contact centrador" placeholder="Contrase&ntilde;a" id="PassJPro">
					<input name="pass2" type="password" class="contact centrador" placeholder="Repetir contrase&ntilde;a" id="PassRepeatJPro" onblur="validatePassword('PassJPro','PassRepeatJPro')" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<button id="btn-login" type="button" onclick="validateNewJPro('registerjpro')" class="contact submit" value="Registrar">Registrar </button>

<!--					<input type="submit" class="contact submit" value="Crear">-->
				</div>	
			</form>
		</div>
	</section>