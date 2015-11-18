<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

class JuradoPopularMapper
{

	private $db;
	private $varn;

	/**
	 * JuradoPopularMapper constructor.
	 */
	public function __construct()
	{
		$this->db = PDOConnection::getInstance();
		$this->varn = 0;
	}

	/**
	 * Comprobar si existe el login
	 */
	public function existeUsuario($login)
	{
		$stmt = $this->db->prepare("select count(dniJP) from JuradoPopular where dniJP=?");
		$stmt->execute(array($login));
		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}

	/**
	 * Comprobar usuario JuradoPopular
	 */

	public function comprobarUsuario($login, $contrasenha)
	{
		$stmt = $this->db->prepare("select count(dniJP) from JuradoPopular where dniJP=? and contrasenhaJP=?");
		$stmt->execute(array($login, $contrasenha));
		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}

	/**
	 * Insertar
	 */

	public function insertar(JuradoPopular $Jp)
	{
		$stmt = $this->db->prepare("insert into JuradoPopular(dniJP, contrasenhaJP, nombreJP, apellidosJP, direccion, cp) values (?,?,?,?,?,?)");
		$stmt->execute(array($Jp->getDniJp(), $Jp->getContrasenhaJp(), $Jp->getNombreJp(), $Jp->getApellidosJp(), $Jp->getDireccionJp(), $Jp->getCp()));
	}

	/**
	 * Modificar
	 */

	public function modificar(JuradoPopular $Jp)
	{
		$stmt = $this->db->prepare("UPDATE JuradoPopular SET contrasenhaJP=?, nombreJP=?, apellidosJP=?, direccion=?, cp=? WHERE dniJP=?");
		$stmt->execute(array( $Jp->getContrasenhaJp(), $Jp->getNombreJp(), $Jp->getApellidosJp(), $Jp->getDireccionJp(), $Jp->getCp(),$Jp->getDniJp()));
	}

	/**
	 * Eliminar
	 */

	public function eliminar(JuradoPopular $Jpro)
	{
		$stmt = $this->db->prepare("delete from JuradoPopular where dniJP=?");
		$stmt->execute(array($Jpro->getDniJp()));
	}

	/**
	 * Método que devuelve si un código es correcto o no.
	 */

	public function introducirCodigosJP($codigo)
	{
		$stmt = $this->db->prepare("SELECT idCodigo FROM Codigo WHERE idCodigo=?");
		$stmt->execute(array($codigo));
		$var=1;

		if ($stmt->fetchColumn() > 0) {
			$stmtt = $this->db->prepare("SELECT usado FROM Codigo WHERE idCodigo=?");
			$stmtt->execute(array($codigo));
			$consulta2 = $stmtt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($consulta2 as $consultita) {
				$var2 = $consultita["usado"];
			}
			if ($var2 == 0) {
				$stmttt = $this->db->prepare("SELECT idPincho as idPincho FROM Codigo C,Establecimiento E,Pincho P WHERE C.idCodigo=? AND C.Establecimiento_nif=E.nif AND E.nif=P.Establecimiento_nif");
				$stmttt->execute(array($codigo));
				$consulta3 = $stmttt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($consulta3 as $consultita) {

					$ret = $consultita["idPincho"];
				}

				return $ret;

			} else {
				return NULL;
			}
		} else {
			return NULL;
		}
	}


	/**
	 * Método que actualiza el estado de un voto, y en caso de que no exista actualizarlo en la tabla JuradoPopular_Vota_Pincho
	 */

	public function seleccionarPinchoJP($idPincho, $dniJP)
	{

		$stmt = $this->db->prepare("SELECT numVotos FROM JuradoPopular_Vota_Pincho WHERE Pincho_idPincho=? AND JuradoPopular_dniJP=?");
		$stmt->execute(array($idPincho, $dniJP));
		$lineas = $stmt->rowCount();

		if ($lineas == 0) {
			$stmti = $this->db->prepare("INSERT INTO JuradoPopular_Vota_Pincho (numVotos,Pincho_idPincho,JuradoPopular_dniJP) VALUES (?,?,?)");
			$stmti->execute(array('1', $idPincho, $dniJP));
		} else {
			$consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($consulta as $consultita) {
				$varn = $consultita["numVotos"];
			}
		//	$varn = $lineas["numVotos"];
			$varn = $varn + 1;
			$stmtt = $this->db->prepare("UPDATE JuradoPopular_Vota_Pincho set numVotos=? where Pincho_idPincho=? AND JuradoPopular_dniJP=?");
			$stmtt->execute(array($varn, $idPincho, $dniJP));
		}
	}
}