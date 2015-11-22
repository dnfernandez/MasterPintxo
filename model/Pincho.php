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
    private $confirmado;

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
    public function __construct($idPincho = NULL, $nombreP = NULL, $descripcionP = NULL, $precio = NULL, $concursante = NULL, $finalista = NULL, $Establecimiento_nif = NULL, $rutaImagen = NULL, $confirmado = NULL)
    {
        $this->idPincho = $idPincho;
        $this->nombreP = $nombreP;
        $this->descripcionP = $descripcionP;
        $this->precio = $precio;
        $this->concursante = $concursante;
        $this->finalista = $finalista;
        $this->Establecimiento_nif = $Establecimiento_nif;
        $this->rutaImagen = $rutaImagen;
	$this->confirmado = $confirmado;
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

    /**
     * @return mixed
     */
    public function getConfirmado()
    {
        return $this->confirmado;
    }

    /**
     * @param mixed $confirmado
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;
    }

    /**
     * Método para comprobar si el
     * objeto  es
     * válido para el registro
     * en la base de datos
     */

    public function validoParaCrear()
    {
        $errors = array();
        if (strlen($this->nombreP) < 1) {
            $errors["nombreP"] = "El campo nombre no puede estar vacio";
        }
        if (strlen($this->descripcionP) < 1) {
            $errors["descripcionP"] = "El campo descripcion no puede estar vacio";
        }
        if (sizeof($this->precio) < 1) {
            $errors["precioP"] = "El campo precio no puede estar vacio";
        }
        if (strpos($this->rutaImagen,'.') == false) {
            $errors["rutaImagen"] = "El campo imagen no puede estar vacio";
        }
        if (sizeof($errors) > 0) {
            throw new ValidationException ($errors, "pincho no valido");
        }
    }

    /**
     * Método para comprobar si el
     * objeto  es
     * válido para modificarse
     */

    public function validoParaActualizar()
    {
        $errors = array();

        if (!isset($this->idPincho)) {
            $errors["idPincho"] = "idPincho es obligatorio";
        }

        try {
            $this->validoParaCrear();
        } catch (ValidationException $ex) {
            foreach ($ex->getErrors() as $key => $error) {
                $errors[$key] = $error;
            }
        }

        if (sizeof($errors) > 0) {
            throw new ValidationException($errors, "pincho no valido");
        }
    }
}
