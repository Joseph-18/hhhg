<?php


/**
* 
*/
class Facturas extends Controller
{
	public function index()
	{
        if ($this->isLogin()==false){
            header('Location: http://localhost/proyectobd/public/login/');
            return false;
        }else{
		  $this->view('facturas/index');
        }
	}

	 public function show()
    {
        echo $factura = $this->getReportes();

    }

     public function imprimir($nro,$total=0){
        $this->getFactura($nro,$total);
    }

    public function insertar($imei,$fecha){
        $this->insertarFactura($imei,$fecha);
    }

}