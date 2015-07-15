<?php

class Controller
{	

    public function isLogin(){
        session_start();
        $estado = false;
        if(isset($_SESSION['user'])){
            $estado = true;
        }
        return $estado;
    }	

	public function model($model)
	{
		require_once '../app/models/'. $model .'.php';
		return new $model;
	}

	public function view($view,$data = [])
	{
		require_once '../app/views/'. $view .'.php';
	}

	
	//Conectar con base de datos postgresql

	public function conectarBD()
	{

		$usuario = "postgres";$passwd = "12345";$db = "dfilo";$port = 5432;$host = "localhost";

		$con = "host=$host port=$port dbname=$db user=$usuario password=$passwd";
		$cnx = pg_connect($con) or die ("Error de conexion. ". pg_last_error());
		return $cnx;

	}

    public function genpdf($nro_fact='',$fecha_factura='',$nombre='',$cedula='',$imei='',$marca='',$modelo='',$desc='', $total=''){
       
            require_once("../app/res/dompdf/dompdf_config.inc.php");
            require_once("../app/res/templates/factura.php");

            $dompdf = new DOMPDF();
            $dompdf->load_html($factura);
            $dompdf->render();
            $dompdf->stream("factura-".$fecha_factura."-".$cedula.".pdf");


    }

    public function getFactura($nro_fact,$total){
        $cnx = $this->conectarBD();
        $sql =  "SELECT * from factura where numero='$nro_fact'";
        $rs = pg_query($cnx, $sql);
        $row = pg_fetch_row($rs);

        $fecha_recibido = $row[5];
        $fecha_entrega = $row[2];
        $cedula = $row[3];
        $imei = $row[4];

        $sql =  "SELECT * from cliente where cedula='$cedula'";
        $rs = pg_query($cnx, $sql);
        $row = pg_fetch_row($rs);

        $nombre = $row[1];
        $apellido = $row[2];

        $sql =  "SELECT * from dispositivo where imei='$imei'";
        $rs = pg_query($cnx, $sql);
        $row = pg_fetch_row($rs);

        $marca = $row[1];
        $modelo = $row[2];

        $sql =  "SELECT descripcion from reparacion where fecha_recibido='$fecha_recibido' and
                imei = '$imei'";
        $rs = pg_query($cnx, $sql);
        $row = pg_fetch_row($rs);
        $descripcion = $row[0];

        $sql =  "SELECT * from detalle where fecha_recibido='$fecha_recibido' and
                    imei = '$imei'";
        $rs = pg_query($cnx, $sql);
        $row = pg_fetch_row($rs);
        $codigorep = $row[3];
        $cantidad=$row[2];
        $costorep = $row[4];

        $nro_fact = $nro_fact;
        $fecha_factura = $fecha_entrega;
        $nombre = $nombre.' '.$apellido;
        $cedula = $cedula;
        $imei = $imei;
        $marca = $marca;
        $modelo = $modelo;
        $desc = $descripcion;
        $codrep=$codigorep;
        $cant=$cantidad;
        $costrep=$costorep;
        $total = $total;
        pg_close($cnx);

        $this->genpdf($nro_fact,$fecha_factura,$nombre,$cedula,$imei,$marca,$modelo,$desc, $total,$codrep,$cant,$costrep);


    }

	//GET

	public function getCliente()
	{
		$cnx = $this->conectarBD();

		$query = 'select array_to_json(array_agg(row_to_json(t)))
				    from (
				      select * from cliente Order by cedula
				    ) t'; 
		$rs = pg_query($cnx, $query);
		$row = pg_fetch_row($rs);

		pg_close($cnx);

		return $row[0];
	}

    public function getDispositivo()
    {
        $cnx = $this->conectarBD();

        $query = 'SELECT array_to_json(array_agg(row_to_json(t)))
				    FROM (
				      SELECT * FROM dispositivo Order BY imei
				    ) t';
        $rs = pg_query($cnx, $query);
        $row = pg_fetch_row($rs);

        pg_close($cnx);

        return $row[0];
    }

    public function getRepuesto()
    {
        $cnx = $this->conectarBD();

        $query = 'select array_to_json(array_agg(row_to_json(t)))
				    from (
				      select * from repuesto Order By codigo
				    ) t';
        $rs = pg_query($cnx, $query);
        $row = pg_fetch_row($rs);

        pg_close($cnx);

        return $row[0];
    }

	public function getTecnico()
    {
        $cnx = $this->conectarBD();

        $query = 'SELECT array_to_json(array_agg(row_to_json(t)))
				    FROM (
				      SELECT * FROM tecnico WHERE activo=true ORDER BY cedula
				    ) t';
        $rs = pg_query($cnx, $query);
        $row = pg_fetch_row($rs);

        pg_close($cnx);

        return $row[0];
    }

    public function getReparacion()
    {
        $cnx = $this->conectarBD();

        $query = 'select array_to_json(array_agg(row_to_json(t)))
				    from (
				      select * from reparacion Order By imei
				    ) t';
        $rs = pg_query($cnx, $query) or die("No se puede ejecutar la consulta $query\n");
        $row = pg_fetch_row($rs);

        pg_close($cnx);

        return $row[0];
    }

    public function getReportes()
    {
        $cnx = $this->conectarBD();

        $query = 'select array_to_json(array_agg(row_to_json(t)))
                    from (
                      select * from factura Order by numero
                    ) t'; 
        $rs = pg_query($cnx, $query);
        $row = pg_fetch_row($rs);

        pg_close($cnx);

        return $row[0];
    }
	//---------Realizar LOGIN

	public function login($cedula,$clave)
    {
        $sql = "SELECT * FROM tecnico where activo=true and cedula= '$cedula' and pass= '$clave'";
        $cnx = $this->conectarBD();
        $user = pg_query($cnx, $sql);

        if ($row = pg_fetch_array($user)) 
        {   
            session_destroy();
            session_start();
            $_SESSION['user'] = $row['nombre'];
            header('Location: http://localhost/proyectobd/public/clientes');

        } else {
                
            echo '<script language="javascript">';
            echo 'error_msg("Datos invalidos.");';
            echo '</script>';
        }

    }

   

	// ----------------------------  INSERTAR ----------------------------------


	public function insertarCliente($cedula,$nombre,$apellido,$direccion,$email,$telefono)
	{
		require_once '../app/models/Cliente.php';
		$cliente = new Cliente($cedula,$nombre,$apellido,$direccion,$email,$telefono);

		$sql = 	"INSERT INTO cliente
				 VALUES ('$cliente->cedula','$cliente->nombre',
				 		 '$cliente->apellido','$cliente->direccion',
				 		 '$cliente->email','$cliente->telefono')";

		$cnx = $this->conectarBD();
		$rs = pg_query($cnx, $sql);
		if ($rs)
		{
			echo '<script language="javascript">';
			echo 'success_msg("Cliente agregado correctamente.");';
			echo '</script>';
		}else{
			$error = pg_last_error($cnx);	
			echo '<script language="javascript">';
			echo 'error_msg("'.$error.'");';
			echo '</script>';
		}	
		pg_close($cnx);
	}

    public function insertarDispositivo($marca,$modelo,$imei,$descripcion,$ced_cli)
    {
        require_once '../app/models/Dispositivo.php';
        $dispositivo = new Dispositivo($imei,$marca,$modelo,$descripcion,$ced_cli);

        $sql = 	"INSERT INTO dispositivo
				 VALUES ('$dispositivo->imei','$dispositivo->marca',
				 		 '$dispositivo->modelo','$dispositivo->descripcion',
				 		 '$dispositivo->ced_cli')";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Dispositivo agregado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

    public function insertarRepuesto($codigo,$nombre,$descripcion,$cantidad,$precio_unitario)
    {
        require_once '../app/models/Repuesto.php';
        $repuesto = new Repuesto($codigo,$nombre,$descripcion,$cantidad,$precio_unitario);

        $sql = 	"INSERT INTO repuesto
				 VALUES ('$repuesto->codigo','$repuesto->nombre',
				 		 '$repuesto->descripcion','$repuesto->cantidad',
				 		 '$repuesto->precio_unitario')";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Repuesto agregado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

    public function insertarTecnico($cedula,$nombre,$apellido,$clave, $telefono)
    {
        require_once '../app/models/Tecnico.php';
        $tecnico = new Tecnico($nombre,$apellido,$cedula,$clave,$telefono);

        $sql = 	"INSERT INTO tecnico
				 VALUES ('$tecnico->cedula','$tecnico->nombre',
				 		 '$tecnico->apellido','$tecnico->telefono',
				 		 '$tecnico->clave')";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Tecnico agregado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

    public function insertarReparacion($imei,$fechaRec,$descripcion,$observacion,$cedulaTec)
    {
        require_once '../app/models/Reparacion.php';
        $reparacion = new Reparacion($imei,$fechaRec,$descripcion,'EN PROCESO',$observacion,'',$cedulaTec);

        $sql = 	"INSERT INTO reparacion
				 VALUES ('$reparacion->imei','$reparacion->fecha_recibido',
				 		 '$reparacion->descripcion','$reparacion->estado',
				 		 '$reparacion->observacion','$reparacion->historia',
                          '$reparacion->cedula_tecnico')";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql) or die("No se puede ejecutar la consulta $sql\n");
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Reparacion agregado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

     public function insertarFactura($imei,$fecha){

        $fecha_entrega = date('Y-m-d'); 

        $sql =  "SELECT ced_cli from dispositivo where imei='$imei'";
        $sql2 = "INSERT into factura (imei,fecha_recibido,fecha_entrega,cedula_cli)
                 values ('$imei','$fecha','$fecha_entrega',($sql))";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql2) or die ("No se puede ejecutar la consulta");
        //echo "Factura generada correctamente.";

        $sql =  "SELECT monto_total,numero from factura where numero in(select max(numero) from factura)";
        $rs = pg_query($cnx, $sql) or die ("No se puede ejecutar la consulta");

        $data = pg_fetch_row($rs);

        echo 'http://localhost/proyectobd/public/data/imprimirFactura/'.$data[1].'/'.$data[0];
        
        pg_close($cnx);

    }

    public function insertarDetalle($imei,$fecha_rec,$cantidad,$codigo_rep,$costo)
    {
        require_once '../app/models/Detalle.php';
        $detalle = new Detalle($imei,$fecha_rec,$cantidad,$codigo_rep,$costo);

        $sql = 	"INSERT INTO detalle
				 VALUES ('$detalle->imei','$detalle->fecha_rec',
				 		 '$detalle->cantidad','$detalle->codigo_rep',
				 		 '$detalle->costo')";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql) or die("No se puede ejecutar la consulta $query\n");
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Detalle agregado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

	//-------------------------------MODIFICAR--------------------------------
	public function modificarCliente($cedula,$nombre,$apellido,$direccion,$email,$telefono)
	{
		require_once '../app/models/Cliente.php';
		$cliente = new Cliente($cedula,$nombre,$apellido,$direccion,$email,$telefono);
		
		$sql = 	"UPDATE cliente 
				set 
				nombre='$cliente->nombre',
				apellido='$cliente->apellido', 
				direccion='$cliente->direccion', 
				email='$cliente->email', 
				telefono='$cliente->telefono'
				WHERE
				cedula = $cliente->cedula";

		$cnx = $this->conectarBD();
		$rs = pg_query($cnx, $sql);
		if ($rs)
		{
			echo '<script language="javascript">';
			echo 'success_msg("Cliente modificado correctamente.");';
			echo '</script>';
		}else{
			$error = pg_last_error($cnx);	
			echo '<script language="javascript">';
			echo 'error_msg("'.$error.'");';
			echo '</script>';
		}	
		pg_close($cnx);
	}

    public function modificarDispositivo($imei,$marca,$modelo,$descripcion,$ced_cli)
    {
        require_once '../app/models/Dispositivo.php';
        $dispositivo = new Dispositivo($imei,$marca,$modelo,$descripcion,$ced_cli);

        $sql = 	"UPDATE dispositivo
				set
				marca='$dispositivo->marca',
				modelo='$dispositivo->modelo',
				descripcion='$dispositivo->descripcion',
				ced_cli='$dispositivo->ced_cli'
				WHERE
				imei = '$dispositivo->imei'";
        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Dispositivo modificado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

    public function modificarRepuesto($codigo,$nombre,$descripcion,$cantidad,$precio_unitario)
    {
        require_once '../app/models/Repuesto.php';
        $repuesto = new Repuesto($codigo,$nombre,$descripcion,$cantidad,$precio_unitario);

        $sql = 	"UPDATE repuesto
				set
				nombre='$repuesto->nombre',
				cantidad='$repuesto->cantidad',
				descripcion='$repuesto->descripcion',
				precio_unitario='$repuesto->precio_unitario'
				WHERE
				codigo = '$repuesto->codigo'";
        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Repuesto modificado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }
    public function modificarTecnico($cedula,$nombre,$apellido,$telefono)
    {
        require_once '../app/models/Tecnico.php';
        $tecnico = new Tecnico($nombre,$apellido,$cedula,'00000',$telefono);

        $sql = 	"UPDATE tecnico
				set
				nombre='$tecnico->nombre',
				apellido='$tecnico->apellido',
				telefono='$tecnico->telefono'
				WHERE
				cedula = '$tecnico->cedula'";
        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Técnico modificado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }

    public function modificarReparacion($imei,$fechaRec,$descripcion,$estado,$observacion,$historia,$cedulaTec)
    {
        require_once '../app/models/Reparacion.php';
        $reparacion = new Reparacion($imei,$fechaRec,$descripcion,$estado,$observacion,$historia,$cedulaTec);

        $sql = 	"UPDATE reparacion
				 set  
                      descripcion='$reparacion->descripcion',
                      estado='$reparacion->estado', historia='$reparacion->historia',
                      observacion='$reparacion->observacion',
                      cedula_tecnico='$reparacion->cedula_tecnico'
                      WHERE
                      imei='$reparacion->imei' AND fecha_recibido='$reparacion->fecha_recibido'";

        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
        if ($rs)
        {
            echo '<script language="javascript">';
            echo 'success_msg("Reparacion modificado correctamente.");';
            echo '</script>';
        }else{
            $error = pg_last_error($cnx);
            echo '<script language="javascript">';
            echo 'error_msg("'.$error.'");';
            echo '</script>';
        }
        pg_close($cnx);
    }


    //***-----*-*-* Eliminar -------------------

    public function eliminarTec($ced){
        $sql =  "UPDATE tecnico
                 set  
                      activo=false
                      WHERE
                      cedula=$ced";
        $cnx = $this->conectarBD();
        $rs = pg_query($cnx, $sql);
    }
}
