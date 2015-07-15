<?php 
	
class Tecnico{

	public $nombre;
	public $apellido;
	public $cedula;
	public $clave;
	public $telefono;

	public function __construct($nombre,$apellido,$cedula,$clave,$telefono)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->cedula = $cedula;
		$this->clave = $clave;
		$this->telefono = $telefono;
	}


}


 ?>