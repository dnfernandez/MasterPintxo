<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

class PremioMapper{
	
	private $db
		
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

    public function insertar(Premio $Pr)
    {
        $stmt = $this->db->prepare("insert into Premio(codigoPremio, tipoPremio, nombrePremio, descripcionPremio, JuradoPopular_dniJP) values (?,?,?,?,?)");
        $stmt->execute(array($Pr->getCodigoPremio(), $Pr->getTipoPremio(), $Pr->getNombrePremio(), $Pr->getDescripcionPremio(), $Pr->getJuradoPopular_dniJP()));
    }

    /**
     * Modificar
     */

    public function modificar(Premio $Pr)
    {
        $stmt = $this->db->prepare("Premio(codigoPremio, tipoPremio, nombrePremio, descripcionPremio, JuradoPopular_dniJP) values (?,?,?,?,?)");
        $stmt->execute($Pr->getCodigoPremio(), $Pr->getTipoPremio(), $Pr->getNombrePremio(), $Pr->getDescripcionPremio(), $Pr->getJuradoPopular_dniJP()));
    }

    /**
     * Eliminar
     */

    public function eliminar(JuradoProfesional $Pr)
    {
        $stmt = $this->db->prepare("delete from Premio where codigoPremio=?");
        $stmt->execute(array($Pr->getCodigoPremio()));
    }