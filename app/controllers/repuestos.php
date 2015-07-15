<?php


/**
* 
*/
class Repuestos extends Controller
{

	public function index()
	{			
		if ($this->isLogin()==false){
            header('Location: http://localhost/proyectobd/public/login/');
            return false;
        }else{
    		$this->view('repuestos/index');

    		if (isset($_POST['enviar'])) {

    			$codigo=$_POST['inputCodigo'];
    			$nombre=$_POST['inputNombre'];
    			$descripcion=$_POST['inputDes'];
    			$cantidad=$_POST['inputCant'];
    			$precio_unitario=$_POST['inputPrecio'];
    			
    			$this->insertarRepuesto($codigo,$nombre,$descripcion,$cantidad,$precio_unitario);
    		}
    		if (isset($_POST['enviar2'])) {

    			$codigo=$_POST['inputCod2'];
    			$nombre=$_POST['inputNom2'];
    			$descripcion=$_POST['inputDesc2'];
    			$cantidad=$_POST['inputCant2'];
    			$precio_unitario=$_POST['inputPrecio2'];
    			
    			$this->modificarRepuesto($codigo,$nombre,$descripcion,$cantidad,$precio_unitario);
    		}
        }
	}

	public function show()
    {

        echo $repuesto = $this->getRepuesto();
    }
	

}