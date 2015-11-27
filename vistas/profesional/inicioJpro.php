<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaElegir = $view->getVariable("listaElegir");
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI">Inicio</a></li>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarProfesionalVista#seccionMPRO">Modificar perfil</a></li>
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
	
	<!--Si tiene que elegir finalistas mostramos esto-->
	<section id="seccionI" name="Elegir Finalistas">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2>Elegir pinchos finalistas</h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form class="form-vertical" action="index.php?controller=profesional&amp;action=elegirFinalistas" method="post">
				<div class="form centrador">
					<div class="row cenEleg">
						<!--Esto va dentro del bucle-->
						<?php foreach($listaElegir as $pincho):?>
							<div class="col-md-4 pinchoElegir">
								<input type="checkbox" class="contact" name="pincho[]" value="<?php echo $pincho["Pincho_idPincho"]; ?>">
									<a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["Pincho_idPincho"]; ?>" class="contact pincho"><?php echo htmlentities($pincho["nombreP"]);?></a>
								</input>
							</div>
						<?php endforeach; ?>
						<!------>
					</div>
				</div>
				<div class="input-group centrador">
					<h3><br></h3>
					<input type="submit" class="contact submit" value="Elegir">
				</div>
			</form>
		</div>
	</section>