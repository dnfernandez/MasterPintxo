<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

/**
 * Created by PhpStorm.
 * User: MARCOGP
 * Date: 17/11/2015
 * Time: 15:49
 */
class EstablecimientoMapper
{
    private $db;

    public function __construct()
    {
        $this->db = PDOConnection::getInstance();
    }

    public function crear(Establecimiento $establecimiento)
    {
        $stmt_2 = $this->db->prepare("INSERT INTO Establecimiento(nombreE, direccionE, nif, contrasenhaE,telfE) values (?,?,?,?,?)");
        $stmt_2->execute(array($establecimiento->getNombreE(), $establecimiento->getDireccionE(), $establecimiento->getNif(), $establecimiento->getContrasenha(), $establecimiento->getTelfE()));
        }


    public function consultar($nif)
    {
        $stmt = $this->db->prepare("select count(*) from Establecimiento where nif=?");
        $stmt->execute(array($nif));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }

    }

    /**
     * Obtener los datos de un establecimiento
     */

    public function consultarDatos($nif)
    {
        $stmt = $this->db->prepare("select * from Establecimiento where nif=?");
        $stmt->execute(array($nif));
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    /**
     * Comprobar usuario establecimiento
     */

    public function comprobarUsuario($login, $contrasenha)
    {
        $stmt = $this->db->prepare("select count(nif) from Establecimiento where nif=? and contrasenhaE=?");
        $stmt->execute(array($login,$contrasenha));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    public function modificar(Establecimiento $establecimiento)
    {
        $stmt = $this->db->prepare("UPDATE  Establecimiento set nombreE=?,direccionE=?,contrasenhaE=?,telfE=? where nif=?");
        $stmt->execute(array($establecimiento->getNombreE(), $establecimiento->getDireccionE(), $establecimiento->getContrasenha(), $establecimiento->getTelfE(), $establecimiento->getNif()));

    }

    public function eliminar(Establecimiento $establecimiento)
    {
        $stmt = $this->db->prepare("delete from Establecimiento where nif=?");
        $stmt->execute(array($establecimiento->getNif()));
    }


    public function findAll()
    {
        $stmt = $this->db->query("SELECT * FROM Establecimiento");
        $esta_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $esta_db;
        /*
        $establecimientos = array();

        foreach ($esta_db as $establecimiento) {
            array_push($establecimientos, new Establecimiento($establecimiento["nombreE"], $establecimiento["direccionE"], $establecimiento["nif"], $establecimiento["contrasenha"], $establecimiento["telefE"]));
        }

        return $establecimientos;
        */
    }


    public function findPincho($nif)
    {
        $stmt = $this->db->prepare("SELECT * FROM Pincho WHERE Establecimiento_nif =?");
        $stmt->execute(array($nif));
        $pincho = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pincho;
        /*   $aux = $stmt->rowCount();
        if(aux!=0) {
            return new Pincho(
                $pincho["idPincho"],
                $pincho["nombreP"],
                $pincho["descripcionP"],
                $pincho["precio"],
                $pincho["concursante"],
                $pincho["finalista"]

			);
        } else {
            return NULL;
        }*/
    }

    public function pinchoPresentado($nif){
	$stmt = $this->db->prepare("SELECT count(*) FROM Pincho WHERE Establecimiento_nif =?");
        $stmt->execute(array($nif));
	if($stmt->fetchColumn()>0){
            return true;
        }	
    }

    public function generarCodigo($nif)
    {


            $characters = '123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 9; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

        $stmt = $this->db->prepare("select count(*) from Codigo where idCodigo=?");
        $stmt->execute(array($randomString));
        if ($stmt->fetchColumn() > 0) {
            $this->generarCodigo();

        }else{
            $stmt_2 = $this->db->prepare("INSERT INTO Codigo(idCodigo, usado, JuradoPopular_dniJP, Establecimiento_nif) values (?,?,?,?)");
            $stmt_2->execute(array($randomString, 0, "000000000", $nif));
        }

        /*
        $stmt = $this->db->prepare("SELECT MAX(idCodigo) as idCodigo FROM Codigo WHERE Establecimiento_nif=?");
        $stmt->execute(array($nif));
        $codigo = $stmt->fetch(PDO::FETCH_ASSOC);
        //$aux = $stmt->rowCount();
        if ($stmt->fetchColumn() > 0) {
            $codigo["idCodigo"] += 100000000;
            $stmt_2 = $this->db->prepare("INSERT INTO Codigo(idCodigo, usado, JuradoPopular_dniJP, Establecimiento_nif) values (?,?,?,?)");
            $stmt_2->execute(array($codigo["idCodigo"], 0, "000000000", $nif));
           // $codigo = $stmt_2->fetch(PDO::FETCH_ASSOC);
        } else {
            $rest = substr($nif, 0, -1);
            $rest = "1000" . $rest;
            $stmt_2 = $this->db->prepare("INSERT INTO Codigo(idCodigo, usado, JuradoPopular_dniJP, Establecimiento_nif) values (?,?,?,?)");
            $stmt_2->execute(array($rest, 0, "000000000", $nif));
         //   $codigo = $stmt_2->fetch(PDO::FETCH_ASSOC);
        }
      //  return $codigo;
        */
    }


    public function generarCodigos($nif,$numVeces)
    {

        for ($i = 0; $i < $numVeces; $i++) {
            $this->generarCodigo($nif);
        }

    }
	
	public function listarCodigosDisponibles($nif){
		$stmt=$this->db->prepare("select * from Codigo where Establecimiento_nif=? and JuradoPopular_dniJP='000000000' and usado='0'");
        $stmt->execute(array($nif));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}
