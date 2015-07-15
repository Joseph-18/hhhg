<?php  

$factura='<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title></title>
</head>
<body>
<span style="text-align:justify;">
<h2 style="text-align:center">Distribuidora Filo</h2>
<br/>
<p><b>RIF. </b> J-06503284-7</p>
<p><b>Direccion: </b>Centro comercial AB, LOCAL 58, PAMPATAR, ISLA DE MARGARITA</p>
<p><b>Telefonos:</b> 0295-262.72.66 / 0295-262.76.54</p>
<p><b>Factura:</b> '.$nro_fact.'<b style="margin-left: 20px;">Fecha: </b>'.$fecha_factura.' </p>

<p><b>Cliente:</b> '.$nombre.'<b style="margin-left: 20px;">CI: </b>'.$cedula.'</p>
<p><b>Equipo:</b> '.$imei.' '.$marca.' '.$modelo.'</p>
<p><b>Descripcion:</b> '.$desc.'</p>
<p style="font-size:18px"><b>Total:</b> Bs. '.$total.' </p>
</body>
</html>
</span>';


?>
