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

    /**
     * Método para comprobar si el
     * objeto  es
     * válido para modificarse
     */

    public function validoParaActualizar()
    {
        $errors = array();

        if (!isset($this->idOrganizador)) {
            $errors["idOrganizador"] = "El id es obligatorio";
        }

        if (strlen($this->contrasenhaOrganizador) < 5) {
            $errors["contrasenhaOrg"] = "Contrase&ntilde;a no v&aacute;lida. 5 caracteres m&aicute;nimo";
        }

        if (sizeof($errors) > 0) {
            throw new ValidationException($errors, "Organizador no valido");
        }
    }




}