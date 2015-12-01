<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$lista=$view->getVariable("listado");
$usuario = $view->getVariable("currentusername");
?>
<li class="menuItem"><a href="index.php?controller=usuario&amp;action=index#seccionI"><?= i18n("Inicio")?></a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= i18n("+ opciones")?>  <span class="caret"></span></a>
    <ul class="dropdown-menu menuOc" role="menu">
        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=modificarOrganizadorVista#seccionMO"><?= i18n("Modificar perfil")?></a></li>
        <li class="menuItem"><a href="index.php?controller=usuario&amp;action=registrarProfesionalVista#seccionCJP"><?= i18n("Crear Jurado Profesional")?></a></li>
        <li class="menuItem"><a href="index.php?controller=organizador&amp;action=asignarPinchosVista#seccionAP"><?= i18n("Asignar pinchos")?></a></li>
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

<section id="seccionL">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2><?= i18n("Listado de Establecimientos")?></h2>
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h3><br></h3>
            <h3><br></h3>
        </div>
    </div>
    <div class="container control tabla">
        <div class="row tituloTab">
            <div class="col-md-3">
                <h4>DNI/NIF</h4>
            </div>
            <div class="col-md-3">
                <h4><?= i18n("Nombre")?></h4>
            </div>
            <div class="col-md-3">
                <h4><?= i18n("Estado")?></h4>
            </div>
            <div class="col-md-3">
                <h4><?= i18n("Acci&oacute;n")?></h4>
            </div>
        </div>
        <!-- Bucle-->
        <?php foreach($lista as $est): ?>
            <div class="row usuTab">
                <div class="col-md-3">
                    <?php echo $est["nif"]; ?>
                </div>
                <div class="col-md-3">
                    <?php echo $est["nombreE"]; ?>
                </div>
                <div class="col-md-3">
                    <?php echo $est["estado"]; ?>
                </div>
                <div class="col-md-3">
                    <?php if($est["estado"]=="baneado"){
                        echo '<a href="index.php?controller=organizador&amp;action=desbanear&amp;listar=listarEst&amp;idUsuario='.$est["nif"].'"><button class="submit button" type="button">Desbanear</button></a>';
                    }else{
                        echo '<a href="index.php?controller=organizador&amp;action=banear&amp;listar=listarEst&amp;idUsuario='.$est["nif"].'"><button class="submit button" type="button">Banear</button></a>';
                    }
                    ?>
                </div>
            </div>
        <?php endforeach ; ?>
        <!---->
    </div>
</section>

