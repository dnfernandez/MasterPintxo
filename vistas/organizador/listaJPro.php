<?php
require_once(__DIR__ . "/../../nucleo/ViewManager.php");
$view = ViewManager::getInstance();
$lista=$view->getVariable("listado");
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

<section id="seccionL">
    <div class="container">
        <div class="heading">
            <img class="dividerline" src="img/sep.png" alt="separador">
            <h2>Listado de Jurado Profesional</h2>
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
                <h4>Nombre</h4>
            </div>
            <div class="col-md-3">
                <h4>Estado</h4>
            </div>
            <div class="col-md-3">
                <h4>Accion</h4>
            </div>
        </div>
        <!-- Bucle-->
        <?php foreach($lista as $jp): ?>
            <div class="row usuTab">
                <div class="col-md-3">
                    <?php echo $jp["dniJP"]; ?>
                </div>
                <div class="col-md-3">
                    <?php echo $jp["nombreJP"]; ?>
                </div>
                <div class="col-md-3">
                    <?php echo $jp["estado"]; ?>
                </div>
                <div class="col-md-3">
                    <?php if($jp["estado"]=="baneado"){
                        echo '<a href="index.php?controller=organizador&amp;action=desbanear&amp;listar=listarJPro&amp;idUsuario='.$jp["dniJP"].'"><button class="submit button" type="button">Desbanear</button></a>';
                    }else{
                        echo '<a href="index.php?controller=organizador&amp;action=banear&amp;listar=listarJPro&amp;idUsuario='.$jp["dniJP"].'"><button class="submit button" type="button">Banear</button></a>';
                    }
                    ?>
                </div>
            </div>
        <?php endforeach ; ?>
        <!---->
    </div>
</section>

