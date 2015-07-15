<?php


class Dispositivo{

    public $marca;
    public $modelo;
    public $imei;
    public $descripcion;
    public $ced_cli;

    public function __construct($imei,$marca,$modelo,$descripcion,$ced_cli)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->imei = $imei;
        $this->descripcion = $descripcion;
        $this->ced_cli = $ced_cli;
    }

}