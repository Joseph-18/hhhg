<?php


/**
* 
*/
class Reparaciones extends Controller
{
	public function index()
	{
        if ($this->isLogin()==false){
            header('Location: http://localhost/proyectobd/public/login/');
            return false;
        }else{
            $this->view('reparaciones/index');

            // MODIFICAR
            if (isset($_POST['enviar2'])) {

                $fechaRec=$_POST['inputfechaRec2'];
                $imei=$_POST['inputImei2'];
                $descripcion=$_POST['inputDescrip2'];
                $historia=$_POST['inputHist2'];
                $estado=$_POST['inputEstado2'];
                $observacion=$_POST['inputObser2'];
                $cedulaTec=$_POST['inputCedulaTec2'];
                $this->modificarReparacion($imei,$fechaRec,$descripcion,$estado,$observacion,$historia,$cedulaTec);
            }

            if (isset($_POST['enviar3'])) {

                $imei=$_POST['inputImei3'];
                $fecha_rec=$_POST['inputfechaRec3'];
                $cantidad=$_POST['inputCantidad3'];
                $codigo_rep=$_POST['inputCodigoRep3'];
                $costo=$_POST['inputCosto3'];
                $this->insertarDetalle($imei,$fecha_rec,$cantidad,$codigo_rep,$costo);
            }
        }
    }
	

	 public function show()
    {
        echo $reparacion = $this->getReparacion();

    }

}