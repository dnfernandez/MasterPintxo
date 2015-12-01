<?php

require_once(__DIR__."/../nucleo/ValidationException.php");


class Establecimiento{

	private $nif;
	private $nombreE;
	private $direccionE;
	private $contrasenha;
	private $telfE;


	public function __construct($nif = NULL, $nombreE = NULL, $direccionE = NULL, $contrasenha = NULL, $telfE = NULL) {
		
		$this->nif = $nif;
		$this->nombreE = $nombreE;    
		$this->direccionE = $direccionE;
		$this->contrasenha = $contrasenha;
		$this->telfE = $telfE;

	}

	/**
	 * @return mixed
	 */
	public function getNif()
	{
		return $this->nif;
	}

	/**
	 * @param mixed $nif
	 */
	public function setNif($nif)
	{
		$this->nif = $nif;
	}

	/**
	 * @return mixed
	 */
	public function getNombreE()
	{
		return $this->nombreE;
	}

	/**
	 * @param mixed $nombreE
	 */
	public function setNombreE($nombreE)
	{
		$this->nombreE = $nombreE;
	}

	/**
	 * @return mixed
	 */
	public function getDireccionE()
	{
		return $this->direccionE;
	}

	/**
	 * @param mixed $direccionE
	 */
	public function setDireccionE($direccionE)
	{
		$this->direccionE = $direccionE;
	}

	/**
	 * @return mixed
	 */
	public function getContrasenha()
	{
		return $this->contrasenha;
	}

	/**
	 * @param mixed $contrasenha
	 */
	public function setContrasenha($contrasenha)
	{
		$this->contrasenha = $contrasenha;
	}

	/**
	 * @return mixed
	 */
	public function getTelfE()
	{
		return $this->telfE;
	}

	/**
	 * @param mixed $telfE
	 */
	public function setTelfE($telfE)
	{
		$this->telfE = $telfE;
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
		if (strlen($this->nombreE) < 1) {
			$errors["nombreE"] = "El campo nombre no puede estar vacio";
		}
		if (strlen($this->contrasenha) < 5) {
			$errors["contrasenhaE"] = "Contrase&ntilde;a no v&aacute;lida. 5 caracteres m&aicute;nimo";
		}
		if (strlen($this->direccionE) < 1) {
			$errors["direccionE"] = "El campo direccion no puede estar vacio";
		}
		if (strlen($this->nif) !=9) {
			$errors["nifE"] = "Nif no v&aacute;lido";
		}
		if (strlen($this->telfE) !=9) {
			$errors["telE"] = "Tel&eacute;fono no v&aacute;lido";
		}
		if (sizeof($errors) > 0) {
			throw new ValidationException ($errors, "establecimiento no v&aacute;lido");
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

		if (!isset($this->nif)) {
			$errors["nifEM"] = "El nif es obligatorio";
		}

		try {
			if (strlen($this->nombreE) < 1) {
				$errors["nombreE"] = "El campo nombre no puede estar vacio";
			}
			if (strlen($this->contrasenha) < 5 && strlen($this->contrasenha) >0) {
				$errors["contrasenhaE"] = "Contrase&ntilde;a no v&aacute;lida. 5 caracteres m&aicute;nimo";
			}
			if (strlen($this->direccionE) < 1) {
				$errors["direccionE"] = "El campo direccion no puede estar vacio";
			}
			if (strlen($this->nif) !=9) {
				$errors["nifE"] = "Nif no v&aacute;lido";
			}
			if (strlen($this->telfE) !=9) {
				$errors["telE"] = "Tel&eacute;fono no v&aacute;lido";
			}
			if (sizeof($errors) > 0) {
				throw new ValidationException ($errors, "establecimiento no v&aacute;lido");
			}
		} catch (ValidationException $ex) {
			foreach ($ex->getErrors() as $key => $error) {
				$errors[$key] = $error;
			}
		}

		if (sizeof($errors) > 0) {
			throw new ValidationException($errors, "establecimiento no valido");
		}
	}


}



