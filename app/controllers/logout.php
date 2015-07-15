<?php 


/**
* 
*/
class Logout extends Controller
{
	public function index(){  
        
        if($this->isLogin()==false){
            header("Location: http://localhost/proyectobd/public/login");
        }else{
            session_start();
            session_destroy();
            header('Location: http://localhost/proyectobd/public/login/');
        }   
    }

   

         
}
 ?>