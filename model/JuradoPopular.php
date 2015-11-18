<?php

require_once(__DIR__."/../nucleo/ValidationException.php");

class JuradoPopular {
	private $nombreJP;
	private $apellidosJP;
	private	$dniJP;
	private $direccion;
	private $cp;
	private $contrasenhaJP;

	public function __construct($nombreJP = NULL, $apellidosJP = NULL, $dniJP = NULL, $direccion = NULL, $cp= NULL, $contrasenhaJP = NULL){
		$this->nombreJP = $nombreJP;
		$this->apellidosJP = $apellidosJP;
		$this->dniJP = $dniJP;
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
	
	
	
}