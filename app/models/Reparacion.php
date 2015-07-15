<?php


class Reparacion
{

    public $fecha_recibido;
    public $imei;
    public $descripcion;
    public $estado;
    public $observacion;
    public $cedula_tecnico;
    public $historia;
    public function __construct($imei, $fecha_recibido, $descripcion, $estado, $observacion, $historia, $cedula_tecnico)
    {
        $this->fecha_recibido = $fecha_recibido;
        $this->imei = $imei;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->observacion = $observacion;
        $this->cedula_tecnico = $cedula_tecnico;
        $this->historia = $historia;
    }
}