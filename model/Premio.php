<?php

require_once(__DIR__."/../nucleo/PDOConnection.php");

class Premio {
	private $codigoPremio;
	private $tipoPremio;
	private $nombrePremio;
	private	$descripcionPremio;
	private $JuradoPopular_dniJP;

	/**
	 * Premio constructor.
	 * @param $codigoPremio
	 * @param $tipoPremio
	 * @param $nombrePremio
	 * @param $descripcionPremio
	 * @param $JuradoPopular_dniJP
	 */
	public function __construct($codigoPremio, $tipoPremio, $nombrePremio, $descripcionPremio, $JuradoPopular_dniJP)
	{
		$this->codigoPremio = $codigoPremio;
		$this->tipoPremio = $tipoPremio;
		$this->nombrePremio = $nombrePremio;
		$this->descripcionPremio = $descripcionPremio;
		$this->JuradoPopular_dniJP = $JuradoPopular_dniJP;
	}

	/**
	 * @return mixed
	 */
	public function getCodigoPremio()
	{
		return $this->codigoPremio;
	}

	/**
	 * @param mixed $codigoPremio
	 */
	public function setCodigoPremio($codigoPremio)
	{
		$this->codigoPremio = $codigoPremio;
	}

	/**
	 * @return mixed
	 */
	public function getTipoPremio()
	{
		return $this->tipoPremio;
	}

	/**
	 * @param mixed $tipoPremio
	 */
	public function setTipoPremio($tipoPremio)
	{
		$this->tipoPremio = $tipoPremio;
	}

	/**
	 * @return mixed
	 */
	public function getNombrePremio()
	{
		return $this->nombrePremio;
	}

	/**
	 * @param mixed $nombrePremio
	 */
	public function setNombrePremio($nombrePremio)
	{
		$this->nombrePremio = $nombrePremio;
	}

	/**
	 * @return mixed
	 */
	public function getDescripcionPremio()
	{
		return $this->descripcionPremio;
	}

	/**
	 * @param mixed $descripcionPremio
	 */
	public function setDescripcionPremio($descripcionPremio)
	{
		$this->descripcionPremio = $descripcionPremio;
	}

	/**
	 * @return mixed
	 */
	public function getJuradoPopularDniJP()
	{
		return $this->JuradoPopular_dniJP;
	}

	/**
	 * @param mixed $JuradoPopular_dniJP
	 */
	public function setJuradoPopularDniJP($JuradoPopular_dniJP)
	{
		$this->JuradoPopular_dniJP = $JuradoPopular_dniJP;
	}




}