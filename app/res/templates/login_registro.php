<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
	<base href="http://localhost/proyectobd/">
	<link href="app/res/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="app/res/css/awesome-bootstrap-checkbox.css"         rel="stylesheet">
	<link href="app/res/css/custom.css"        rel="stylesheet" type="text/css">
	<link href="app/res/css/login.css"         rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script src="app/res/js/jquery.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="principal">

			<h1> <img src="app/res/img/logo.png" alt="" width="50" height="50">Dist. Filo</h1>

			<div class="cuerpo-login">
				
				<?php echo $contenido; ?>

			</div>
			
					
		</div>
	</div>
	
</body>
</html>