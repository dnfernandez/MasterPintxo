<?php

require_once(__DIR__."/../nucleo/ValidationException.php");

class JuradoProfesional
{
    private $dniJpro;
    private $contrasenhaJpro;
    private $nombreJpro;
    private $telefJpro;

    /**
     * JuradoProfesional constructor.
     * @param $dniJpro
     * @param $contrasenhaJpro
     * @param $nombreJpro
     * @param $telefJpro
     */
    public function __construct($dniJpro=NULL, $contrasenhaJpro=NULL, $nombreJpro=NULL, $telefJpro=NULL)
    {
        $this->dniJpro = $dniJpro;
        $this->contrasenhaJpro = $contrasenhaJpro;
        $this->nombreJpro = $nombreJpro;
        $this->telefJpro = $telefJpro;
    }

    /**
     * @return mixed
     */
    public function getDniJpro()
    {
        return $this->dniJpro;
    }

    /**
     * @param mixed $dniJpro
     */
    public function setDniJpro($dniJpro)
    {
        $this->dniJpro = $dniJpro;
    }

    /**
     * @return mixed
     */
    public function getContrasenhaJpro()
    {
        return $this->contrasenhaJpro;
    }

    /**
     * @param mixed $contrasenhaJpro
     */
    public function setContrasenhaJpro($contrasenhaJpro)
    {
        $this->contrasenhaJpro = $contrasenhaJpro;
    }

    /**
     * @return mixed
     */
    public function getNombreJpro()
    {
        return $this->nombreJpro;
    }

    /**
     * @param mixed $nombreJpro
     */
    public function setNombreJpro($nombreJpro)
    {
        $this->nombreJpro = $nombreJpro;
    }

    /**
     * @return mixed
     */
    public function getTelefJpro()
    {
        return $this->telefJpro;
    }

    /**
     * @param mixed $telefJpro
     */
    public function setTelefJpro($telefJpro)
    {
        $this->telefJpro = $telefJpro;
    }

}