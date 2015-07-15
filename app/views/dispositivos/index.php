<?php 
	$titulo = "Dispositivos";
	$position = 1;	
	require_once '../app/res/templates/header.php';
?>

<div class="container" style="margin-top:40px;">
    <table  id="table"
            class="table table-hover table-bordered"
            data-url="public/dispositivos/show"
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
            <th data-field="imei"  data-sortable="true" data-align="center">IMEI</th>
            <th data-field="marca" data-sortable="true" data-align="center">Marca</th>
            <th data-field="modelo" data-sortable="true" data-align="center">Modelo</th>
            <th data-field="descripcion" data-align="center">Descripción</th>
            <th data-field="ced_cli" data-sortable="true" data-align="center">Cedula del Cliente</th>
            <th data-field="action" data-align="center" data-formatter="actionFormatter" data-events="actionEvents">Accion</th>
        </tr>
        </thead>
    </table>
</div>

<!-- Modal para modificar-->
<div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificar Dispositivo</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">IMEI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputImei2" placeholder="Imei" id="inputImei2" readonly>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Marca</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputMarca2" placeholder="Marca" id="inputMarca2" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Modelo</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputModelo2" placeholder="Modelo" id="inputModelo2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputDescrip2" placeholder="Descripcion" id="inputDescrip2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cedula del Cliente</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCedulaCli2" placeholder="Cedula del Cliente" id="inputCedulaCli2" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" name="enviar2" value="Aceptar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para insertar reparacion-->
<div class="modal fade" id="insertarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Insertar Reparacion</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">IMEI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputImei" placeholder="Imei" id="inputImei" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Fecha Recibido</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputfechaRec" placeholder="Marca" id="inputfechaRec" readonly >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputDescrip" placeholder="Descripcion" id="inputDescrip" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cedula del Tecnico</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCedulaTec" placeholder="Numero de cedula" id="inputCedulaTec" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" name=" enviar" value="Aceptar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function formatAdvancedSearch(){
        return 'Busqueda avanzada';
    }

    function queryParams() {
        return {
            type: 'owner',
            sort: 'updated',
            direction: 'desc',
            per_page: 100,
            page: 1
        };
    }

    function actionFormatter(value, row, index) {
        return [
            '<a class="edit" data-toggle="modal" data-target="#modificarModal" style="margin-left:10px; margin-right:10px;" style href="javascript:void(0)" title="Editar">',
            '<i class="glyphicon glyphicon-edit"></i>',
            '</a>',
            '<a class="reparacion" data-toggle="modal" data-target="#insertarModal" style="margin-left:10px; margin-right:10px;" style href="javascript:void(0)" title="Reparar">',
            '<i class="glyphicon glyphicon-wrench"></i>',
            '</a>',
            /*'<a class="remove " href="javascript:void(0)" title="Eliminar">',
             '<i class="glyphicon glyphicon-remove"></i>',
             '</a>'*/
        ].join('');
    }

    window.actionEvents = {

        'click .edit': function (e, value, row, index) {

            $("#inputImei2").val(row.imei);
            $("#inputMarca2").val(row.marca);
            $("#inputModelo2").val(row.modelo);
            $("#inputDescrip2").val(row.descripcion);
            $("#inputCedulaCli2").val(row.ced_cli);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .reparacion': function (e, value, row, index) {

            $("#inputImei").val(row.imei);
            var d = new Date();
            $("#inputfechaRec").val( d.getFullYear()+"-"+"0"+d.getMonth()+"-"+"0"+d.getDate());
            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .remove': function (e, value, row, index) {
            swal({
                title: "¿Desea eliminar?",
                text: "¿Seguro desea eliminar el dispositivo "+row.marca+" "+row.modelo+"?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#368ee0",
                confirmButtonText: "Aceptar",
                closeOnConfirm: false });
        }
    };

    function eliminar(){

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 0,
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": true
        }
        var msg = '¿Desea eliminar los registros seleccionados?</br></br> \
		<button type="button" class="btn btn-default" >Cancelar</button> \
		<button type="button" class="btn btn-primary " style="margin-left: 10px;" onclick="aceptarEliminar()">Aceptar</button>';
        toastr.warning(msg);
    }

    function aceptarEliminar(){
        registrosEliminados();
    }

    function registrosEliminados(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 0,
            "extendedTimeOut": 0,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": true
        }
        toastr.success("Se han eliminado x registros.");

    }

</script>

</body>
</html>

