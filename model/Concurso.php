<?php

require_once(__DIR__."/../nucleo/ValidationException.php");
class Concurso
{
    private $nombreC;
    private $descripcionC;

    public function __construct($nombreC=NULL, $descripcionC=NULL)
    {
        $this->nombreC = $nombreC;
        $this->descripcionC = $descripcionC;
    }

    /**
     * @return mixed
     */
    public function getNombreC()
    {
        return $this->nombreC;
    }

    /**
     * @param mixed $nombreC
     */
    public function setNombreC($nombreC)
    {
        $this->nombreC = $nombreC;
    }

    /**
     * @return mixed
     */
    public function getDescripcionC()
    {
        return $this->descripcionC;
    }

    /**
     * @param mixed $descripcionC
     */
    public function setDescripcionC($descripcionC)
    {
        $this->descripcionC = $descripcionC;
    }




}