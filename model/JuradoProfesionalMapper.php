<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

class JuradoProfesionalMapper
{
    private $db;

    /**
     * JuradoProfesionalMapper constructor.
     */
    public function __construct()
    {
        $this->db = PDOConnection::getInstance();
    }

    /**
     * Comprobar si existe el login
     */

    public function existeUsuario($login)
    {
        $stmt = $this->db->prepare("select count(dniJPro) from JuradoProfesional where dniJPro=?");
        $stmt->execute(array($login));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    /**
     * Obtener datos de un jurado profesional
     */

    public function comprobarDatos($login)
    {
        $stmt = $this->db->prepare("select * from JuradoProfesional where dniJPro=?");
        $stmt->execute(array($login));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Comprobar usuario JuradoProfesional
     */

    public function comprobarUsuario($login, $contrasenha)
    {
        $stmt = $this->db->prepare("select count(dniJPro) from JuradoProfesional where dniJPro=? and contrasenhaJPro=?");
        $stmt->execute(array($login, $contrasenha));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    /**
     * Insertar
     */

    public function insertar(JuradoProfesional $Jpro)
    {
        $stmt = $this->db->prepare("insert into JuradoProfesional(dniJPro, contrasenhaJPro, nombreJPro, telefJPro) values (?,?,?,?)");
        $stmt->execute(array($Jpro->getDniJpro(), $Jpro->getContrasenhaJpro(), $Jpro->getNombreJpro(), $Jpro->getTelefJpro()));
    }

    /**
     * Modificar
     */

    public function modificar(JuradoProfesional $Jpro)
    {
        $stmt = $this->db->prepare("update JuradoProfesional set nombreJPro=?, contrasenhaJPro=?, telefJPro=? where dniJPro=?");
        $stmt->execute(array($Jpro->getNombreJpro(), $Jpro->getContrasenhaJpro(), $Jpro->getTelefJpro(), $Jpro->getDniJpro()));
    }

    /**
     * Eliminar
     */

    public function eliminar(JuradoProfesional $Jpro)
    {
        $stmt = $this->db->prepare("delete from JuradoProfesional where dniJPro=?");
        $stmt->execute(array($Jpro->getDniJpro()));
    }

    /**
     *  Metodo que devuelve la lista de pinchos asignados para elegir si van a ser finalistas
     */
    public function listarElegirFinalistas($dniJPro)
    {
        $stmt = $this->db->prepare("select * from Pincho_Elegido_JP,Pincho where Pincho_idPincho=idPincho and JuradoProfesional_dniJpro=? and valoracion='0' and confirmado<>'1'");
        $stmt->execute(array($dniJPro));
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    /**
     * @param $idPincho
     * @param $valoracion
     * @param $dniJPro
     * Metodo que actualiza si el pincho es finalista
     */

    public function elegirFinalistas($idPincho, $valoracion, $dniJPro)
    {
        $stmt = $this->db->prepare("UPDATE Pincho_Elegido_JP set valoracion=? where Pincho_idPincho=? and JuradoProfesional_dniJPro=?");
        $stmt->execute(array($valoracion, $idPincho, $dniJPro));
    }

    /**
     * Metodo que devuelve la lista de pinchos para puntuar
     * @param $dniJPro
     * @return array
     */
    public function listarValorarPinchosJpro($dniJPro)
    {
        $stmt = $this->db->prepare("select * from Pincho_Finalista_JuradoProfesional, Pincho where Pincho_idPincho=idPincho and JuradoProfesional_dniJpro=?");
        $stmt->execute(array($dniJPro));
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    /**
     * @param $idPincho
     * @param $puntuacion
     * @param $dniJPro
     */
    public function valorarPinchosJpro($idPincho, $dniJPro, $puntuacion)
    {
        $stmt = $this->db->prepare("UPDATE Pincho_Finalista_JuradoProfesional set puntuacion=? where Pincho_idPincho=? and JuradoProfesional_dniJPro=?");
        $stmt->execute(array($puntuacion, $idPincho, $dniJPro));
    }

    /**
     * metodo para listar todos los jurados profesionales
     */

    public function listarJurados(){
        $stmt = $this->db->query("select * from JuradoProfesional");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}