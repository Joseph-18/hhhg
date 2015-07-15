<?php


class Factura{

    public $numero;
    public $monto_total;
    public $fecha_entrega;
    public $imei;
    public $ced_cli;
    public $fecha_recibido;

    public function __construct($numero,$monto_total,$fecha_entrega,$imei,$ced_cli,$fecha_recibido)
    {
        $this->numero = $numero;
        $this->monto_total = $monto_total;
        $this->fecha_entrega = $fecha_entrega;
        $this->imei = $imei;
        $this->ced_cli = $ced_cli;
        $this->fecha_recibido = $fecha_recibido;
    }

}