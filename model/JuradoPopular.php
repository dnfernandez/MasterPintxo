<?php

require_once(__DIR__."/../nucleo/ValidationException.php");

class JuradoPopular {
	private	$dniJP;
	private $nombreJP;
	private $apellidosJP;
	private $direccion;
	private $cp;
	private $contrasenhaJP;

	public function __construct($dniJP = NULL, $nombreJP = NULL, $apellidosJP = NULL, $direccion = NULL, $cp= NULL, $contrasenhaJP = NULL){
		$this->dniJP = $dniJP;
		$this->nombreJP = $nombreJP;
		$this->apellidosJP = $apellidosJP;
		$this->direccion = $direccion;
		$this->cp = $cp;
		$this->contrasenhaJP = $contrasenhaJP;
	}
	
	public function getNombreJp(){
		return $this->nombreJP;
	}

	public function setNombreJp($nombreJP){
		$this->nombreJP = $nombreJP;
	}

	public function getApellidosJp(){
		return $this->apellidosJP;
	}

	public function setApellidosJp($apellidosJP){
		$this->apellidosJP = $apellidosJP;
	}

	public function getDniJp(){
		return $this->dniJP;
	}

	public function setDniJp($dniJP){
		$this->dniJP = $dniJP;
	}

	public function getDireccionJp(){
		return $this->direccion;
	}

	public function setDireccionJp($direccion){
		$this->direccion = $direccion;
	}

	public function getCp(){
		return $this->cp;
	}

	public function setCp($cp){
		$this->cp = $cp;
	}

	public function getContrasenhaJp(){
		return $this->contrasenhaJP;
	}

	public function setContrasenhaJp($contrasenhaJP){
		$this->contrasenhaJP = $contrasenhaJP;
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
		if (strlen($this->nombreJP) < 1) {
			$errors["nombreJP"] = "El campo nombre no puede estar vacio";
		}
		if (strlen($this->contrasenhaJP) < 5) {
			$errors["contrasenhaJP"] = "Contrase&ntilde;a no v&aacute;lida. 5 caracteres m&aicute;nimo";
		}
		if (strlen($this->direccion) < 1) {
			$errors["direccionJP"] = "El campo direccion no puede estar vacio";
		}
		if (strlen($this->dniJP) !=9) {
			$errors["dniJP"] = "Dni no v&aacute;lido";
		}
		if (strlen($this->apellidosJP) <1) {
			$errors["apellidosJP"] = "El campo apellidos no puede estar vacio";
		}
		if (strlen($this->cp) <1) {
			$errors["cpJP"] = "El campo codigo postal no puede estar vacio";
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException ($errors, "Jpopular no v&aacute;lido");
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

		if (!isset($this->dniJP)) {
			$errors["dniJPM"] = "El dni es obligatorio";
		}

		try {
			if (strlen($this->nombreJP) < 1) {
				$errors["nombreJP"] = "El campo nombre no puede estar vacio";
			}
			if (strlen($this->contrasenhaJP) < 5 && strlen($this->contrasenhaJP) > 0 ) {
				$errors["contrasenhaJP"] = "Contrase&ntilde;a no v&aacute;lida. 5 caracteres m&aicute;nimo";
			}
			if (strlen($this->direccion) < 1) {
				$errors["direccionJP"] = "El campo direccion no puede estar vacio";
			}
			if (strlen($this->dniJP) !=9) {
				$errors["dniJP"] = "Dni no v&aacute;lido";
			}
			if (strlen($this->apellidosJP) <1) {
				$errors["apellidosJP"] = "El campo apellidos no puede estar vacio";
			}
			if (strlen($this->cp) <1) {
				$errors["cpJP"] = "El campo codigo postal no puede estar vacio";
			}
			if (sizeof($errors) > 0) {
				throw new ValidationException ($errors, "Jpopular no v&aacute;lido");
			}
		} catch (ValidationException $ex) {
			foreach ($ex->getErrors() as $key => $error) {
				$errors[$key] = $error;
			}
		}

		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "Jpopular no valido");
		}
	}
	
	
}