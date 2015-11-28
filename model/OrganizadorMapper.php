<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

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

    public function comprobarUsuario($login)
    {
        $stmt = $this->db->prepare("select count(idOrganizador) from Organizador where idOrganizador=?");
        $stmt->execute(array($login));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    /**
     * Existe usuario Organizador
     */

    public function existeUsuario($login, $contrasenha)
    {
        $stmt = $this->db->prepare("select count(idOrganizador) from Organizador where idOrganizador=? and contrasenhaOrganizador=?");
        $stmt->execute(array($login, $contrasenha));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    /**
     * modificar
     */

    public function modificar(Organizador $organizador)
    {
        $stmt = $this->db->prepare("update Organizador set contrasenhaOrganizador=? where idOrganizador=?");
        $stmt->execute(array($organizador->getContrasenhaOrganizador(), $organizador->getIdOrganizador()));
    }

    /**
     * Listar todos los pinchos no asignados
     * @return array
     */
    public function listarNoAsignados()
    {
        $stmt = $this->db->query("select * from Pincho where not idPincho in (select Pincho_idPincho from Pincho_Elegido_JP);");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Comprobar si pincho ya esta asignado
     */

    public function comprobarAsignado($idPincho)
    {
        $stmt = $this->db->prepare("select count(Pincho_idPincho) from Pincho_Elegido_JP where Pincho_idPincho=?");
        $stmt->execute(array($idPincho));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Asignar los pinchos a cada jurado profesional para poder elegir si va a ser finalista
     */

    public function asignarElegidos($idPincho, $dniJpro)
    {
        $stmt = $this->db->prepare("insert into Pincho_Elegido_JP(Pincho_idPincho, JuradoProfesional_dniJPro, valoracion) values(?,?,?)");
        $stmt->execute(array($idPincho, $dniJpro, "0"));
    }

    /**
     * Asignar los pinchos finalistas para que los Jpros puedan puntuarlos
     */

    public function asignarFinalistas()
    {
        $stmt1 = $this->db->query("select * from Pincho where finalista='1'");
        $pinchos_db = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        $stmt2 = $this->db->query("select * from JuradoProfesional");
        $jurado_db = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($pinchos_db as $pincho) {
            foreach ($jurado_db as $jurado) {
                $stmt3=$this->db->prepare("select count(*) from Pincho_Finalista_JuradoProfesional where Pincho_idPincho=? and JuradoProfesional_dniJPro=?");
                $stmt3->execute(array($pincho["idPincho"],$jurado["dniJPro"]));
                if(!$stmt3->fetchColumn()>0){
                    $stmt = $this->db->prepare("insert into Pincho_Finalista_JuradoProfesional(Pincho_idPincho, JuradoProfesional_dniJPro,puntuacion) values(?,?,?)");
                    $stmt->execute(array($pincho["idPincho"], $jurado["dniJPro"],""));
                }
            }
        }


    }

    /**
     * Buscar baneados
     */

    public function buscarBaneo($id){
        $stmt = $this->db->prepare("select count(*) from Baneos where idUsuario=?");
        $stmt->execute(array($id));

        if($stmt->fetchColumn()>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Banear
     */

    public function banear($id){
        $stmt = $this->db->prepare("insert into Baneos(idUsuario) values(?)");
        $stmt->execute(array($id));
    }

    /**
     * Desbanear
     */

    public function desBanear($id){
        $stmt = $this->db->prepare("delete from Baneos where idUsuario=?");
        $stmt->execute(array($id));
    }
}