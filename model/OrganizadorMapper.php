<?php

require_once(__DIR__."/../nucleo/PDOConnection.php");
class OrganizadorMapper
{
    private $db;

    /**
     * OrganizadorMapper constructor.
     */
    public function __construct()
    {
        $this->db = PDOConnection::getInstance();
    }

    /**
     * Comprobar usuario Organizador
     */

    public function comprobarUsuario($login,$contrasenha){
        $stmt = $this->db->prepare("select count(idOrganizador) from Organizador where idOrganizador=? and contrasenhaOrganizador=?");
        $stmt->execute(array($login,$contrasenha));
        if($stmt->fetchColumn()>0){
            return true;
        }
    }

    /**
     * modificar
     */

    public function modificar(Organizador $organizador){
        $stmt = $this->db->prepare("update Organizador set contrasenhaOrganizador=? where idOrganizador=?");
        $stmt->execute(array($organizador->getContrasenhaOrganizador(), $organizador->getIdOrganizador()));
    }


}