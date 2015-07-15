<?php


/**
* 
*/
class Login extends Controller
{
	
	public function index() 
	{	
		if ($this->isLogin()==true){
        	header('Location: http://localhost/proyectobd/public/clientes/');
            return false;
        }else{
			$this->view('login/login');
			if (isset($_POST['enviar'])){
			
				$cedula = $_POST['inputCed'];
				$clave = $_POST['inputPassword'];
				$this->login($cedula,$clave);		
			
			}

		}
			
		
	}			

	
}