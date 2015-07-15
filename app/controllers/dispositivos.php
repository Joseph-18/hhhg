<?php


/**
* 
*/
class Dispositivos extends Controller
{

	public function index()
	{
        if ($this->isLogin()==false){
            header('Location: http://localhost/proyectobd/public/login/');
            return false;
        }else{
            $dispositivos = $this->getDispositivo();
    		$this->view('dispositivos/index',[$dispositivos]);
            // INSERTAR
            if (isset($_POST['enviar'])) {

                $fechaRec=$_POST['inputfechaRec'];
                $imei=$_POST['inputImei'];
                $descripcion=$_POST['inputDescrip'];

                $observacion='';
                $cedulaTec=$_POST['inputCedulaTec'];

                $cnx = $this->conectarBD();
                $query = "select imei from reparacion where fecha_recibido='$fechaRec' and imei='$imei'";
                $rs = pg_query($cnx, $query);
                $row1 = pg_fetch_row($rs);

                $query = "select cedula from tecnico where cedula='$cedulaTec'";
                $rs = pg_query($cnx, $query);
                $row2 = pg_fetch_row($rs);

                $query = "select imei from dispositivo where imei='$imei'";
                $rs = pg_query($cnx, $query);
                $row3 = pg_fetch_row($rs);
                pg_close($cnx);
                if ($row3!=null){
                    if ($row1==null)
                    {
                        if ($row2!=null){

                            $this->insertarReparacion($imei,$fechaRec,$descripcion,$observacion,$cedulaTec);
                        }else{
                            echo '<script language="javascript">';
                            echo 'error_msg("Tecnico no registrado");';
                            echo '</script>';

                        }
                    }else{
                        echo '<script language="javascript">';
                        echo 'error_msg("Esa reparacion ya existe.");';
                        echo '</script>';
                    }
                }else {

                    echo '<script language="javascript">';
                    echo 'error_msg("El dispositivo no esta registrado.");';
                    echo '</script>';
                }

            }
            // MODIFICAR
            if (isset($_POST['enviar2'])) {

                $marca=$_POST['inputMarca2'];
                $modelo=$_POST['inputModelo2'];
                $imei=$_POST['inputImei2'];
                $descripcion=$_POST['inputDescrip2'];
                $ced_cli=$_POST['inputCedulaCli2'];
                $this->modificarDispositivo($imei,$marca,$modelo,$descripcion,$ced_cli);
            }
        }
	}

	public function show()
    {
        echo $dispositivo = $this->getDispositivo();
    }

}