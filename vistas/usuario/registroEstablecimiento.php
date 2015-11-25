<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionL">Login</a></li>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarPopularVista#seccionRU">Registro Usuario</a></li>
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
					<h2>Registro Establecimiento</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=registrarEstablecimiento" id="registerestablishmentform">
				<div class="centrador">
										<input name="name" type="text" class="contact centrador" placeholder="Nombre establecimiento" id="NombreEstablecimiento" onblur="validateEmpty('NombreEstablecimiento')">
					<input name="login" type="text" class="contact centrador" placeholder="Nif" id="NIF" onblur="validateNIF()" >
				</div>
				<div class="centrador">
					<input name="direccion" type="text" class="contact centrador" placeholder="Direcci&oacute;n" id="DireccionEstablecimiento" onblur="validateEmpty('DireccionEstablecimiento')">
					<input name="telf" type="text" class="contact centrador" placeholder="Tel&eacute;fono" id="Telefono" onblur="validateTelefono('Telefono')">
				</div>
				<div class="centrador">
					<input name="pass" type="password" class="contact centrador" placeholder="Contrase&ntilde;a" id="PassEstablecimiento" >
					<input name="pass2" type="password" class="contact centrador" placeholder="Repetir contrase&ntilde;a" id="RepeatPassEstablecimiento" onblur="validatePassword('PassEstablecimiento','RepeatPassEstablecimiento')">
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<button id="btn-login" type="button" onclick="validateNewEstablishment('registerestablishmentform')" class="contact submit" value="Registrar">Registrar</button>

<!--					<input type="submit" class="contact submit" value="Registrar">-->
				</div>	
			</form>
		</div>
	</section>