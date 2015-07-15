<?php


/**
* 
*/
class Clientes extends Controller
{

	public function index()
	{			
		if ($this->isLogin()==false){
	        header('Location: http://localhost/proyectobd/public/login/');
	        return false;
	    }else{
	        $this->view('clientes/index');

            if (isset($_POST['enviar']))
            {
                $nombre = $_POST['inputNom'];
                $apellido = $_POST['inputApe'];
                $cedula = $_POST['inputCed'];
                $direccion = $_POST['inputDir'];
                $email = $_POST['inputEmail'];
                $telefono = $_POST['inputTel'];

                $cnx = $this->conectarBD();
                $query = "select cedula from cliente where cedula='$cedula'";
                $rs = pg_query($cnx, $query);
                $row = pg_fetch_row($rs);
                if ($row==null)
                {
                    $this->insertarCliente($cedula,$nombre,$apellido,$direccion,$email,$telefono);
                }else{
                    echo '<script language="javascript">';
                    echo 'success_msg("Cliente ya Agregado.");';
                    echo '</script>';
                }
                pg_close($cnx);

            }
            if (isset($_POST['enviar2']))
            {
                $nombre = $_POST['inputNom2'];
                $apellido = $_POST['inputApe2'];
                $cedula = $_POST['inputCed2'];
                $direccion = $_POST['inputDir2'];
                $email = $_POST['inputEmail2'];
                $telefono = $_POST['inputTel2'];
                $this->modificarCliente($cedula,$nombre,$apellido,$direccion,$email,$telefono);
            }
            // INSERTAR
            if (isset($_POST['enviar3'])) {

                $marca=$_POST['inputMarca'];
                $modelo=$_POST['inputModelo'];
                $imei=$_POST['inputImei'];
                $descripcion=$_POST['inputDescrip'];
                $ced_cli=$_POST['inputCedulaCli'];

                $cnx = $this->conectarBD();
                $query = "select imei from dispositivo where imei='$imei'";
                $rs = pg_query($cnx, $query);
                $row1 = pg_fetch_row($rs);

                $query = "select cedula from cliente where cedula='$ced_cli'";
                $rs = pg_query($cnx, $query);
                $row2 = pg_fetch_row($rs);
                if ($row1==null)
                {
                    if ($row2!=null){
                        $this->insertarDispositivo($marca,$modelo,$imei,$descripcion,$ced_cli);
                    }else{
                        echo '<script language="javascript">';
                        echo 'success_msg("Cliente no registrado, Por favor registrar");';
                        echo '</script>';

                    }
                }else{
                    echo '<script language="javascript">';
                    echo 'success_msg("IMEI del dispositivo ya esta Registrado.");';
                    echo '</script>';
                }
                pg_close($cnx);

            }
		}
	}

	public function eliminarCliente($cedula){
        $this->eliminarCli($cedula);
    }

    public function show()
	{		
		echo $clientes = $this->getCliente();
	}

}