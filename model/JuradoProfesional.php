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

    /**
     * Método para comprobar si el
     * objeto  es
     * válido para el registro
     * en la base de datos
     */

    public function validoParaCrear()
    {
        $errors = array();
        if (strlen($this->nombreJpro) < 1) {
            $errors["nombreJpro"] = "El campo nombre no puede estar vacio";
        }
        if (strlen($this->contrasenhaJpro) < 5) {
            $errors["contrasenhaJpro"] = "Contrase&ntilde;a no v&aacute;lida. 5 caracteres m&aicute;nimo";
        }
        if (strlen($this->dniJpro) !=9) {
            $errors["dniJpro"] = "Dni no v&aacute;lido";
        }
        if (strlen($this->telefJpro) !=9) {
            $errors["telefonoJpro"] = "Tel&eacute;fono no v&aacute;lido";
        }
        if (sizeof($errors) > 0) {
            throw new ValidationException ($errors, "Jprofesional no v&aacute;lido");
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

        if (!isset($this->dniJpro)) {
            $errors["dniJproM"] = "El dni es obligatorio";
        }

        try {
            $this->validoParaCrear();
        } catch (ValidationException $ex) {
            foreach ($ex->getErrors() as $key => $error) {
                $errors[$key] = $error;
            }
        }

        if (sizeof($errors) > 0) {
            throw new ValidationException($errors, "Jprofesional no valido");
        }
    }
}