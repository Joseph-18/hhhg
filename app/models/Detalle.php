<?php

class Detalle{

    public $imei;
    public $fecha_rec;
    public $cantidad;
    public $codigo_rep;
    public $costo;

    public function __construct($imei,$fecha_rec,$cantidad,$codigo_rep,$costo)
    {
        $this->imei = $imei;
        $this->fecha_rec = $fecha_rec;
        $this->cantidad = $cantidad;
        $this->codigo_rep = $codigo_rep;
        $this->costo = $costo;
    }


}