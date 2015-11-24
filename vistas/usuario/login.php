<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$usuario = $view->getVariable("currentusername");
?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Registro <span class="caret"></span></a>
										<ul class="dropdown-menu menuOc" role="menu">
											<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarPopularVista#seccionRU">Registro Usuario</a></li>
											<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarEstablecimientoVista#seccionRE">Registro Establecimiento</a></li>
										</ul>
									</li>
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
	
	<section id="seccionL">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Login</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form method="post" action="index.php?controller=usuario&amp;action=login" >
				<div class="input-group centrador">
					<input name="login" type="text" class="contact" placeholder="Dni/Nif" >                                       
				</div>
				<div class="input-group centrador">
					<input name="pass" type="password" class="contact" placeholder="Contrase&ntilde;a" >
				</div>
				<div class="centrador flash">
					<?php echo $view->popFlash();?>
				</div>
				<div class="input-group centrador">
					<input type="submit" class="contact submit" value="Entrar">
				</div>	
			</form>
		</div>
	</section>
