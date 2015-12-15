<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$listaPinchos = $view->getVariable("listaPinchoO");
$listaJurados = $view->getVariable("listaJuradoProfesional");
$usuario = $view->getVariable("currentusername");
?>
										<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= i18n("+ opciones")?> <span class="caret"></span></a>
											<ul class="dropdown-menu menuOc" role="menu">
												<li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarOrganizadorVista#seccionMO"><?= i18n("Modificar perfil")?></a></li>
												<li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarProfesionalVista#seccionCJP"><?= i18n("Crear Jurado Profesional")?></a></li>
												<li class="menuItem"><a href="index.php?controller=organizador&amp;action=panelControlVista#seccionPC"><?= i18n("Panel de control")?></a></li>
											</ul>
										</li>
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
	
	<section id="seccionAP">
		<div class="container">
				<div class="heading">
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h2><?= i18n("Asignar pinchos concursantes")?></h2>
					<img class="dividerline" src="img/sep.png" alt="separador">
					<h3><br></h3>
					<h3><br></h3>
			</div>
		</div>
		<div class="container">
			<form class="form-vertical" action="index.php?controller=organizador&amp;action=asignarPinchos" method="POST">
				<div class="form centrador formAsig">
					<div class="row asigPin">
						<!--Esto va dentro del bucle-->
						<?php foreach($listaPinchos as $pincho):?>
							<div class="col-md-4 asignar">
								<div class="form-group">
									<a target="secundaria" href="index.php?controller=pincho&amp;action=consultarPincho&amp;idPincho=<?php echo $pincho["idPincho"]; ?>#seccionI" class="contact"><?php echo htmlentities($pincho["nombreP"]);?></a>
									<select multiple="multiple" class="contact submit" name="<?php echo "jurado".$pincho["idPincho"]; ?>[]">
										<?php foreach($listaJurados as $jurado):
											$pos = strpos($jurado["nombreJPro"]," ");
											$nombre =substr($jurado["nombreJPro"],0,$pos + 2);
											$nombre=$nombre.".";
									   		echo '<option value="'.$jurado["dniJPro"].'">'.$nombre.'</option>';
										 endforeach; ?>
									</select>
									<input type="hidden" name="<?php echo "pincho".$pincho["idPincho"]; ?>" value="<?php echo $pincho["idPincho"]; ?>">
								</div>
							</div>
						<?php endforeach ;?>
						<!------>
					</div>
				</div>
				<div class="input-group centrador">
					<h3><br></h3>
					<input type="submit" class="contact submit" value="<?php echo i18n("Asignar"); ?>">
				</div>
			</form>
		</div>
	</section>
	
