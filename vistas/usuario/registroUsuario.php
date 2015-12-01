<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarEstablecimientoVista#seccionRE">Registro Establecimiento</a></li>
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
			<h2>Registro Usuario</h2>
			<img class="dividerline" src="img/sep.png" alt="separador">
			<h3><br></h3>
		</div>
	</div>
	<div class="container">
		<form method="post" action="index.php?controller=usuario&amp;action=registrarPopular" id="registerform" >
			<div class="centrador">
				<input name="name" type="text" class="contact centrador" placeholder="Nombre" id="Nombre" onblur="validateEmpty('Nombre')">
				<input name="apellidos" type="text" class="contact centrador" placeholder="Apellidos" id="Apellidos"  onblur="validateEmpty('Apellidos')">
			</div>
			<div class="centrador">
				<input name="login" type="text" class="contact centrador" placeholder="Dni" id="DNI"  onblur="validateDNI('DNI')">
				<input name="direccion" type="text" class="contact centrador" placeholder="Direcci&oacute;n" id="Direccion" onblur="validateEmpty('Direccion')" >
			</div>
			<div class="input-group centrador">
				<input name="cp" type="text" class="contact centrador" placeholder="C&oacute;digo postal" id="CP" onblur="validateCP('CP')" >
			</div>
			<div class="centrador">
				<input name="pass" type="password" class="contact centrador" placeholder="Contrase&ntilde;a" id="Password" onfocus="ayudaPass()">
				<!--<span class="contact centrador" onClick="ayudaPass()"><i class="glyphicon glyphicon-info-sign"></i></span>-->
				<input name="pass2" type="password" class="contact centrador" placeholder="Repetir contrase&ntilde;a" id="RepeatPassword"  onblur="validatePassword('Password','RepeatPassword')">
			</div>
			<div class="centrador flash">
				<?php echo $view->popFlash();?>
			</div>
			<div class="input-group centrador">
				<button id="btn-login" type="button" onclick="validateNewUser('registerform')" class="contact submit" value="Registrar">Registrar </button>
				<!--					<input type="submit" class="contact submit" value="Registrar">-->
			</div>
		</form>
	</div>
</section>