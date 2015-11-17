<?php

require_once(__DIR__."/../nucleo/ValidationException.php");
class Organizador
{
    private $idOrganizador;
    private $contrasenhaOrganizador;

    /**
     * Organizador constructor.
     * @param $idOrganizador
     * @param $contrasenhaOrganizador
     */
    public function __construct($idOrganizador=NULL, $contrasenhaOrganizador=NULL)
    {
        $this->idOrganizador = $idOrganizador;
        $this->contrasenhaOrganizador = $contrasenhaOrganizador;
    }

    /**
     * @return mixed
     */
    public function getIdOrganizador()
    {
        return $this->idOrganizador;
    }

    /**
     * @param mixed $idOrganizador
     */
    public function setIdOrganizador($idOrganizador)
    {
        $this->idOrganizador = $idOrganizador;
    }

    /**
     * @return mixed
     */
    public function getContrasenhaOrganizador()
    {
        return $this->contrasenhaOrganizador;
    }

    /**
     * @param mixed $contrasenhaOrganizador
     */
    public function setContrasenhaOrganizador($contrasenhaOrganizador)
    {
        $this->contrasenhaOrganizador = $contrasenhaOrganizador;
    }




}