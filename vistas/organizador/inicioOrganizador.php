<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaPinProp = $view->getVariable("listaPinProp");
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> + opciones <span class="caret"></span></a>
											<ul class="dropdown-menu menuOc" role="menu">
												<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarOrganizadorVista#seccionMO">Modificar perfil</a></li>
												<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarProfesionalVista#seccionCJP">Crear Jurado Profesional</a></li>
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
	
	<section id="seccionI">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Validar propuestas de pinchos</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<div class="form centrador">
				<div class="row">
					<!--Esto va dentro del bucle-->
					<?php foreach($listaPinProp as $pincho) :?>
						<form class="form-vertical" method="POST" action="index.php?controller=organizador&amp;action=validarPropuesta">
								<div class="col-md-4">
									<a class="contact pincho" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["idPincho"]; ?>">
										<?php echo $pincho["nombreP"]; ?>
									</a>
									<div>
										<input type="hidden" name="idPincho" value="<?php echo $pincho["idPincho"]; ?>">
										<button type="submit" name="aceptar" class="contact submit">Aceptar</button>
										<button type="submit" name="denegar" class="contact submit">Denegar</button>
									</div>
									<br>
								</div>
						</form>
					<?php endforeach; ?>
					<!------>
				</div>
			</div>
		</div>
	</section>