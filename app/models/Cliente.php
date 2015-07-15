<?php 
	
	class Cliente{

		public $nombre;
		public $apellido;
		public $cedula;
		public $direccion;
		public $telefono;
		public $email;

		public function __construct($cedula,$nombre,$apellido,$direccion,$email,$telefono)
		{
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->cedula = $cedula;
			$this->direccion = $direccion;
			$this->telefono = $telefono;
			$this->email = $email;
		}


	}


 ?>