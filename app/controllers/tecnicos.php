<?php


/**
* 
*/
class Tecnicos extends Controller
{
	public function index()
	{
        if ($this->isLogin()==false){
            header('Location: http://localhost/proyectobd/public/login/');
            return false;
        }else{
    		$this->view('tecnicos/index');
    		if (isset($_POST['enviar'])) {

    			$cedula=$_POST['inputCed'];
    			$nombre=$_POST['inputNombre'];
    			$apellido=$_POST['inputApe'];
    			$clave=$_POST['inputClav'];
    			$telefono=$_POST['inputTlf'];
    			
    			$this->insertarTecnico($cedula,$nombre,$apellido,$clave,$telefono);
    		}
    		if (isset($_POST['enviar2'])) {

    			$cedula=$_POST['inputCed2'];
    			$nombre=$_POST['inputNom2'];
    			$apellido=$_POST['inputApe2'];
    			$telefono=$_POST['inputTlf2'];
    			
    			$this->modificarTecnico($cedula,$nombre,$apellido,$telefono);
    		}
        }
	}

	 public function eliminar($ced){
        $this->eliminarTec($ced);
    }

	public function show()
    {
        echo $tecnico = $this->getTecnico();
    }

}