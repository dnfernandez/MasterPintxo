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



}



