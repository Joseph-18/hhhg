
<?php 



$titulo = "Iniciar sesión";
$contenido = 
'<h2>Iniciar sesi&oacute;n</h2>

<form class="form-login" method="post">
    <!-- <h2 class="form-login-heading">Iniciar sesion</h2> -->
    <div class="form-group">
    	<label for="inputCed" class="sr-only">Cedula</label>
    	<input type="text" name="inputCed" class="form-control" placeholder="Cedula" pattern="([0-9])*$" min="6" max="8" required autofocus>
    </div>
    
    <div class="form-group">
    	<label for="inputPassword" class="sr-only">Contraseña</label>
    	<input type="password" name="inputPassword" class="form-control" placeholder="Contraseña" required>
    </div>

  

    <div class="registrarse" style="margin-top:20px">
        <div class="row fila">
        	
        	<div class="col-md-12">
        		<input type="submit" name="enviar" value="Aceptar" class="btn btn-danger">
        	</div>
        </div>
    	 
    </div>	   			        
    
</form>';

require_once '../app/res/templates/login_registro.php';