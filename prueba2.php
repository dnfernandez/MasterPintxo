<?php
require_once(__DIR__ . "/./model/Pincho.php");
require_once(__DIR__ . "/./model/PinchoMapper.php");
require_once(__DIR__ . "/./model/JuradoProfesional.php");
require_once(__DIR__ . "/./model/JuradoProfesionalMapper.php");
require_once(__DIR__ . "/./model/Organizador.php");
require_once(__DIR__ . "/./model/OrganizadorMapper.php");
require_once(__DIR__ . "/./model/Establecimiento.php");
require_once(__DIR__ . "/./model/EstablecimientoMapper.php");
require_once(__DIR__ . "/./model/JuradoPopular.php");
require_once(__DIR__ . "/./model/JuradoPopularMapper.php");

//-----JP--------

$juradoPopular = new JuradoPopular("pepin","selles","89988998X","Paris","98765","abp123");
$juradoPopularMapper = new JuradoPopularMapper();

if(!$juradoPopularMapper->existeUsuario($juradoPopular->getDniJp())){
    $juradoPopularMapper->insertar($juradoPopular);
    echo "JP insertado<br>";
}
/*
if($juradoPopularMapper->comprobarUsuario($juradoPopular->getDniJp(),$juradoPopular->getContrasenhaJp())){
    echo "JP Validado<br>";
}
*/
/*
$juradoPopular2 = new JuradoPopular("Allu","Akbar","89988998X","Paris","98765","abp123");
if($juradoPopularMapper->existeUsuario($juradoPopular2->getDniJp())){
    $juradoPopularMapper->modificar($juradoPopular2);
    echo "JP modificado<br>";
}
*/

/*
$juradoPopular2 = new JuradoPopular("Allu","Akbar","89988998X","Paris","98765","abp123");
if($juradoPopularMapper->existeUsuario($juradoPopular2->getDniJp())){
    $juradoPopularMapper->eliminar($juradoPopular2);
    echo "JP borrado<br>";
}
*/

/*
$result = $juradoPopularMapper->introducirCodigosJP("305779");
echo "Pincho: " .$result . "<----";
*/


$juradoPopularMapper->seleccionarPinchoJP("1","89988998X");


//-----Establecimiento--------

/*
$establecimiento = new Establecimiento("12345678K","Bar Manolo","nu se nu se","abc123","123456789");
$establecimientoMapper = new EstablecimientoMapper();

if(!$establecimientoMapper->consultar($establecimiento->getNif())){
    $establecimientoMapper->crear($establecimiento);
    echo "establecimiento insertado<br>";
}

*/
/*
if($establecimientoMapper->consultar($establecimiento->getNif())){
    $establecimiento2 = new Establecimiento("12345678K","Bar La pepa","ya se ya se","abc123","123456789");
    $establecimientoMapper->modificar($establecimiento2);
    echo "establecimiento modificado<br>";
}
*/

/*
if($establecimientoMapper->consultar($establecimiento->getNif())){
    $establecimiento2 = new Establecimiento("12345678K","Bar La pepa","ya se ya se","abc123","123456789");
    $establecimientoMapper->eliminar($establecimiento2);
    echo "establecimiento eliminado<br>";
}
*/
/*
$establecimiento3 = new Establecimiento("12345666K","Bar Titanic","my house","abc123","123456789");
if(!$establecimientoMapper->consultar($establecimiento3->getNif())){
    $establecimientoMapper->crear($establecimiento3);
    echo "establecimiento insertado<br>";
}

$establecimientos =$establecimientoMapper->findAll();
if ($establecimientos != null) {
    foreach ($establecimientos as $esta) {
        echo " Nombre: " . $esta["nombreE"] . " Direccion: " . $esta["direccionE"] . " Nif: " . $esta["nif"] . " contrasenha: " . $esta["contrasenha"] . " telefE: " . $esta["telefE"] ."<br>";
    }
}
*/

/*
$pincho1 = new Pincho("1", "Croquetas", "Croquetas de masa", "2", "0", "0","12345678K","./images/pincho1.jpg");
$pinchoMapper = new PinchoMapper();

if (!$pinchoMapper->comprobarPincho($pincho1->getIdPincho())) {
    $pinchoMapper->insertar($pincho1);
    echo "Pincho insertado <br>";
}

$pincho = $establecimientoMapper->findPincho($establecimiento->getNif());
if ($pincho != null) {
      echo $pincho["idPincho"] . " " . $pincho["nombreP"] . " " . $pincho["concursante"] . "<br>";

}
*/
/*
$establecimientoMapper->generarCodigos($establecimiento->getNif(),20);
echo "Codigo creado";
//echo $codigo . " <br>";
*/

//-----Establecimiento--------