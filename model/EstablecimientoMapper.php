<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");


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

    }


    public function findPincho($nif)
    {
        $stmt = $this->db->prepare("SELECT * FROM Pincho WHERE Establecimiento_nif =?");
        $stmt->execute(array($nif));
        $pincho = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pincho;

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
