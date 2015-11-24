<?php
require_once(__DIR__ . "/./model/Pincho.php");
require_once(__DIR__ . "/./model/PinchoMapper.php");
require_once(__DIR__."/./model/JuradoProfesional.php");
require_once(__DIR__."/./model/JuradoProfesionalMapper.php");
require_once(__DIR__."/./model/Organizador.php");
require_once(__DIR__."/./model/OrganizadorMapper.php");
require_once(__DIR__."/./model/Concurso.php");
require_once(__DIR__."/./model/ConcursoMapper.php");

$pincho1 = new Pincho("1", "Croquetas", "Croquetas de masa", "2", "0", "0","44556677E","./images/pincho1.jpg");
$pinchoMapper = new PinchoMapper();

if (!$pinchoMapper->comprobarPincho($pincho1->getIdPincho())) {
    $pinchoMapper->insertar($pincho1);
    echo "Pincho insertado <br>";
}

$pincho2 = new Pincho("1", "Croquetas", "Croquetas congeladas", "5", "0", "0","44556677E","./images/pincho1.jpg");
if ($pinchoMapper->comprobarPincho($pincho2->getIdPincho())) {
    $pinchoMapper->modificar($pincho2);
    echo "Pincho modificado <br>";
}
/*
if($pinchoMapper->comprobarPincho($pincho2->getIdPincho())){
    $pinchoMapper->eliminar($pincho2);
    echo "Pincho eliminado <br>";
}*/

$pinchosPropuestos = $pinchoMapper->consultarPinchosPropuestos();
if ($pinchosPropuestos != null) {
    foreach ($pinchosPropuestos as $pincho) {
        echo $pincho["idPincho"] . " Nombre: " . $pincho["nombreP"] . " Concursante: " . $pincho["concursante"] . "<br>";
    }
}


$pinchosAceptados = $pinchoMapper->consultarPinchosAceptados();
if ($pinchosAceptados != null) {
    foreach ($pinchosAceptados as $pincho) {
        echo $pincho["idPincho"] . " Nombre: " . $pincho["nombreP"] . " Concursante: " . $pincho["concursante"] . "<br>";
    }
}

$pinchoMapper->actualizarPropuestaPincho($pincho1->getIdPincho());
$pinchosAceptados = $pinchoMapper->consultarPinchosAceptados();
if ($pinchosAceptados != null) {
    foreach ($pinchosAceptados as $pincho) {
        echo $pincho["idPincho"] . " Nombre: " . $pincho["nombreP"] . " Concursante: " . $pincho["concursante"] . "<br>";
    }
}

$pinchoMapper->actualizarPinchoFinalista("1");
$pinchoObtenido = $pinchoMapper->obtenerPincho("1");
if ($pinchoObtenido != null) {
    foreach ($pinchoObtenido as $pincho) {
        echo $pincho["idPincho"] . " Nombre: " . $pincho["nombreP"] . " Finalista: " . $pincho["finalista"] . " Nombre E: " . $pincho["nombreE"] . "<br>";
    }
}

echo "-----------------------------------<br><br>";


$juradoProfesional = new JuradoProfesional("44556677E","abc123.","Manolo","987456321");
$juradoProfesionalMapper = new JuradoProfesionalMapper();

if(!$juradoProfesionalMapper->existeUsuario($juradoProfesional->getDniJpro())){
    $juradoProfesionalMapper->insertar($juradoProfesional);
    echo "JPro insertado<br>";
}

if($juradoProfesionalMapper->comprobarUsuario($juradoProfesional->getDniJpro(), $juradoProfesional->getContrasenhaJpro())){
    echo "Usuario validado<br>";
}

$juradoProfesional2 = new JuradoProfesional("44556677E","abc123.","Manolito","987456321");
if($juradoProfesionalMapper->existeUsuario($juradoProfesional2->getDniJpro())){
    $juradoProfesionalMapper->modificar($juradoProfesional2);
    echo "JPro modificado<br>";
}
/*
if($juradoProfesionalMapper->existeUsuario($juradoProfesional2->getDniJpro())){
    $juradoProfesionalMapper->eliminar($juradoProfesional2);
    echo "JPro eliminado<br>";
}*/

$listadoElegirFinalistas = $juradoProfesionalMapper->listarElegirFinalistas("44112233E");
if($listadoElegirFinalistas != null){
    foreach($listadoElegirFinalistas as $finalistas){
        echo "Pincho: ".$finalistas["Pincho_idPincho"]." JPro: ".$finalistas["JuradoProfesional_dniJPro"]." Finalista: ".$finalistas["valoracion"]."<br>";
    }
}

$juradoProfesionalMapper->elegirFinalistas("1","1","44112233E");


$listadoValorarPinchos = $juradoProfesionalMapper->listarValorarPinchosJpro("44112233E");
if($listadoValorarPinchos != null){
    foreach($listadoValorarPinchos as $valorar){
        echo "Pincho: ".$valorar["Pincho_idPincho"]." JPro: ".$valorar["JuradoProfesional_dniJPro"]." Puntuacion: ".$valorar["puntuacion"]."<br>";
    }
}

$juradoProfesionalMapper->valorarPinchosJpro("1","44112233E","Sabor: 10, Color:5");

echo "-----------------------------------<br><br>";

$organizador = new Organizador("160609","abc132.");
$organizadorMapper = new OrganizadorMapper();

$organizadorMapper->modificar($organizador);

if($organizadorMapper->comprobarUsuario($organizador->getIdOrganizador(),$organizador->getContrasenhaOrganizador())){
    echo "Organizador validado<br>";
}

$listadoPinchosSinAsignar=$organizadorMapper->listarNoAsignados();
foreach($listadoPinchosSinAsignar as $pincho){
    echo $pincho["idPincho"] . " Nombre: " . $pincho["nombreP"] . " Finalista: " . $pincho["finalista"] . "<br>";
}

if(!$organizadorMapper->comprobarAsignado("3")){
    $organizadorMapper->asignarElegidos("3","44112233E");
}
if(!$organizadorMapper->comprobarAsignado("4")){
    $organizadorMapper->asignarElegidos("4","44112233E");
}

$organizadorMapper->asignarFinalistas();

echo "-----------------------------------<br><br>";

$concurso = new Concurso("MasterPintxo","Concurso de pinchos de cocina y tapas de botes");
$concursoMapper = new ConcursoMapper();

$concursoMapper->insertar($concurso);

$concurso = new Concurso("MasterPintxo","Concurso de pinchos de catctus y tapas de botes");
$concursoMapper->modificar($concurso);

$concursoMapper->eliminar($concurso);
