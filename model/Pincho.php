<?php
require_once(__DIR__."/../nucleo/ValidationException.php");
class Pincho
{
    private $idPincho;
    private $nombreP;
    private $descripcionP;
    private $precio;
    private $concursante;
    private $finalista;
    private $Establecimiento_nif;
    private $rutaImagen;

    /**
     * Pincho constructor.
     * @param $idPincho
     * @param $nombreP
     * @param $descripcionP
     * @param $precio
     * @param $concursante
     * @param $finalista
     * @param $rutaImagen
     * @param $Establecimiento_nif
     */
    public function __construct($idPincho, $nombreP, $descripcionP, $precio, $concursante, $finalista, $Establecimiento_nif, $rutaImagen)
    {
        $this->idPincho = $idPincho;
        $this->nombreP = $nombreP;
        $this->descripcionP = $descripcionP;
        $this->precio = $precio;
        $this->concursante = $concursante;
        $this->finalista = $finalista;
        $this->Establecimiento_nif = $Establecimiento_nif;
        $this->rutaImagen = $rutaImagen;
    }

    /**
     * @return mixed
     */
    public function getIdPincho()
    {
        return $this->idPincho;
    }

    /**
     * @param mixed $idPincho
     */
    public function setIdPincho($idPincho)
    {
        $this->idPincho = $idPincho;
    }

    /**
     * @return mixed
     */
    public function getNombreP()
    {
        return $this->nombreP;
    }

    /**
     * @param mixed $nombreP
     */
    public function setNombreP($nombreP)
    {
        $this->nombreP = $nombreP;
    }

    /**
     * @return mixed
     */
    public function getDescripcionP()
    {
        return $this->descripcionP;
    }

    /**
     * @param mixed $descripcionP
     */
    public function setDescripcionP($descripcionP)
    {
        $this->descripcionP = $descripcionP;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getConcursante()
    {
        return $this->concursante;
    }

    /**
     * @param mixed $concursante
     */
    public function setConcursante($concursante)
    {
        $this->concursante = $concursante;
    }

    /**
     * @return mixed
     */
    public function getFinalista()
    {
        return $this->finalista;
    }

    /**
     * @param mixed $finalista
     */
    public function setFinalista($finalista)
    {
        $this->finalista = $finalista;
    }

    /**
     * @return mixed
     */
    public function getRutaImagen()
    {
        return $this->rutaImagen;
    }

    /**
     * @param mixed $rutaImagen
     */
    public function setRutaImagen($rutaImagen)
    {
        $this->rutaImagen = $rutaImagen;
    }

    /**
     * @return mixed
     */
    public function getEstablecimientoNif()
    {
        return $this->Establecimiento_nif;
    }

    /**
     * @param mixed $Establecimiento_nif
     */
    public function setEstablecimientoNif($Establecimiento_nif)
    {
        $this->Establecimiento_nif = $Establecimiento_nif;
    }





}