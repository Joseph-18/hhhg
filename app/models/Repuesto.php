<?php


class Repuesto{

    public $codigo;
    public $nombre;
    public $cantidad;
    public $descripcion;
    public $precio_unitario;

    public function __construct($codigo,$nombre,$descripcion,$cantidad,$precio_unitario)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->descripcion = $descripcion;
        $this->precio_unitario = $precio_unitario;
    }

}