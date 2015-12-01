<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

class PremioMapper{
	
	private $db;
		
	/**
     * PremioMapper constructor.
     */
	 
	public function __construct()
    {
        $this->db = PDOConnection::getInstance();
    }
	
	/**
     * Insertar
     */

    public function insertar(Premio $Pr, $idPincho)
    {
        $stmt = $this->db->prepare("insert into Premio(codigoPremio, tipoPremio, nombrePremio, descripcionPremio, JuradoPopular_dniJP) values (?,?,?,?,?)");
        $stmt->execute(array($Pr->getCodigoPremio(), $Pr->getTipoPremio(), $Pr->getNombrePremio(), $Pr->getDescripcionPremio(), $Pr->getJuradoPopularDniJP()));

        $stmt2=$this->db->prepare("select codigoPremio from Premio where nombrePremio=?");
        $stmt2->execute(array($Pr->getNombrePremio()));
        $codigo = $stmt2->fetch(PDO::FETCH_ASSOC);

        $stmt3 = $this->db->prepare("insert into Premio_Entrega_Pincho(Premio_codigoPremio,Pincho_idPincho) values(?,?)");
        $stmt3->execute(array($codigo["codigoPremio"],$idPincho));
    }

    /**
     * Insertar premio Popular
     */

    public function insertarPopular(Premio $Pr)
    {
        $stmt = $this->db->prepare("insert into Premio(codigoPremio, tipoPremio, nombrePremio, descripcionPremio, JuradoPopular_dniJP) values (?,?,?,?,?)");
        $stmt->execute(array($Pr->getCodigoPremio(), $Pr->getTipoPremio(), $Pr->getNombrePremio(), $Pr->getDescripcionPremio(), $Pr->getJuradoPopularDniJP()));
    }

    /**
     * Modificar
     */

    public function modificar(Premio $Pr)
    {
        $stmt = $this->db->prepare("Premio(codigoPremio, tipoPremio, nombrePremio, descripcionPremio, JuradoPopular_dniJP) values (?,?,?,?,?)");
        $stmt->execute($Pr->getCodigoPremio(), $Pr->getTipoPremio(), $Pr->getNombrePremio(), $Pr->getDescripcionPremio(), $Pr->getJuradoPopularDniJP());
    }

    /**
     * Eliminar
     */

    public function eliminar(JuradoProfesional $Pr)
    {
        $stmt = $this->db->prepare("delete from Premio where codigoPremio=?");
        $stmt->execute(array($Pr->getCodigoPremio()));
    }

    /**
     * Obtener valoración jurado Profesional
     */

    public function obtenerValoracion($idPincho){
        $stmt = $this->db->prepare("select * from Pincho_Finalista_JuradoProfesional where Pincho_idPincho=?");
        $stmt->execute(array($idPincho));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Existen premios
     */

    public function existenPremios(){
        $stmt = $this->db->query("select count(*) from Premio where JuradoPopular_dniJP is null");
        if($stmt->fetchColumn()>0){
            return true;
        }
    }

    /**
     * Existen premios jp
     */

    public function existenPremiosJP(){
        $stmt = $this->db->query("select count(*) from Premio where not JuradoPopular_dniJP is null");
        if($stmt->fetchColumn()>0){
            return true;
        }
    }

    /**
     * Listar premios y usuario asociado
     */

    public function listarPremiosJP(){
        $stmt = $this->db->query("select * from Premio, JuradoPopular where JuradoPopular_dniJP=dniJP");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Listar premios y pincho asociado
     */

    public function listarPremios(){
        $stmt = $this->db->query("select * from Premio, Premio_Entrega_Pincho, Pincho where codigoPremio=Premio_codigoPremio and Pincho_idPincho=idPincho ORDER BY codigoPremio");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Contar votos JuradoPopular
     */

    public function contarVotos(){
        $stmt = $this->db->query("select sum(numVotos) as sumaTotal, dniJP, nombreJP, apellidosJP from JuradoPopular, JuradoPopular_Vota_Pincho where dniJP=JuradoPopular_dniJP  group by JuradoPopular_dniJP ORDER BY sumaTotal DESC LIMIT 3");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);




    }
}