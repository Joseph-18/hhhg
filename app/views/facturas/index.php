<?php 
	$titulo = "Facturas";
	$position = 5;	
	require_once '../app/res/templates/header.php';
?>

<div class="container" style="margin-top:40px;">
    <table  id="table"
            class="table table-hover table-bordered"
            data-url="public/facturas/show"
            data-toggle="table"
            data-height="0"
            data-page-size = "10"
            data-page-list = "[0]"
            data-show-columns="true"
            data-search="true"
            data-pagination="true"
            data-show-refresh="true"
            data-toolbar="#toolbar"
            data-query-params="queryParams"
            data-advanced-search="true"
            data-locale="es-SP">
        <thead>
        <tr>
            <th data-field="numero"  data-sortable="true" data-align="center">Numero</th>
            <th data-field="monto_total" data-sortable="true" data-align="center">Monto Total</th>
            <th data-field="fecha_entrega" data-align="center">Fecha</th>            
            <th data-field="cedula_cli" data-align="center">Cedula del Cliente</th>
             <th data-field="imei" data-align="center">IMEI</th>
            <th data-field="fecha_recibido" data-sortable="true" data-align="center">Fecha Recibido</th>
            <th data-field="action" data-align="center" data-formatter="actionFormatter" data-events="actionEvents">Accion</th>
            <!--<th data-field="estado" data-width= "0"data-sortable="true" data-align="center" data-cell-style="cellStyle" data-formatter="stateFormatter">Estado</th>-->
        </tr>
        </thead>
    </table>
</div>

<!-- Modal para insertar-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Insertar Reparación</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">IMEI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputImei" placeholder="IMEI" id="inputImei" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Fecha Recibido</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control input-md" name="inputfechaRec" placeholder="Fecha de Recibo" id="inputfechaRec" required >
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="textarea" class="form-control input-md" name="inputDescrip" placeholder="Descripcion" id="inputDescrip" required>
                        </div>
                    </div>
                                        
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cedula del Tecnico</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCedulaTec" placeholder="Cedula del Tecnico" id="inputCedulaTec" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" name="enviar" value="Aceptar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function actionFormatter(value, row, index) {
        return [
            '<a class="download" style="margin-left:10px; margin-right:10px;" style href="javascript:void(0)" title="Descargar">',
            '<i class="glyphicon glyphicon-download-alt"></i>',
            '</a>'
        ].join('');
    }

    window.actionEvents = {

        'click .download': function (e, value, row, index) {
        	 swal({
                title: "¿Desea generar la factura?",
                text: "",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#368ee0",
                confirmButtonText: "Aceptar",
                closeOnConfirm: true},
                    function(){                           
                        window.location.href ="http://localhost/proyectobd/public/facturas/imprimir/"+row.numero+"/"+row.monto_total;
                    });
          
        }
           
    };

</script>

</body>
</html>

