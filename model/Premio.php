<?php

require_once(__DIR__."/../nucleo/PDOConnection.php");

class Premio {
	private $codigoPremio;
	private $tipoPremio
	private $nombrePremio
	private	$descripcionPremio
	private $JuradoPopular_dniJP


	public function __construct($codigoPremio, $tipoPremio, $nombrePremio, $descripcionPremio, $JuradoPopular_dniJP){
		$this->codigoPremio = $codigoPremio;
		$this->tipoPremio = $tipoPremio;
		$this->nombrePremio = $nombrePremio;
		$this->descripcionPremio = $descripcionPremio;
		$this->JuradoPopular_dniJP = $JuradoPopular_dniJP;
	}
	
	public function getCodigoPremio(){
		return $this->codigoPremio
	}

	public function setCodigoPremio($codigoPremio){
		$this->codigoPremio = $codigoPremio
	}

	public function getTipoPremio(){
		return $tipoPremio->tipoPremio
	}

	public function setTipoPremio($tipoPremio){
		$this->tipoPremio = $tipoPremio
	}

	public function getNombrePremio(){
		return $this->nombrePremio
	}

	public function setNombrePremio($nombrePremio){
		$this->nombrePremio = $nombrePremio
	}

	public function getDescripcionPremio(){
		return $this->descripcionPremio
	}

	public function setDescripcionPremio($descripcionPremio){
		$this->descripcionPremio = $descripcionPremio
	}

	public function getJuradoPopular_dniJP(){
		return $this->JuradoPopular_dniJP
	}

	public function setJuradoPopular_dniJP($JuradoPopular_dniJP){
		$this->JuradoPopular_dniJP = $JuradoPopular_dniJP
	}
	
	
	
	
	
	
	
}