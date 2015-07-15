<?php 
	$titulo = "Repuestos";
	$position = 2;	
	require_once '../app/res/templates/header.php';
?>

<div id="toolbar" class="btn-group">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
        <i class="glyphicon glyphicon-plus"></i>
    </button>
</div>

<div class="container" style="margin-top:40px;">
    <table  id="table"
            class="table table-hover table-bordered"
            data-url="public/repuestos/show"
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
            <th data-field="codigo"  data-sortable="true" data-align="center">Codigo</th>
            <th data-field="nombre" data-sortable="true" data-align="center">Nombre</th>            
            <th data-field="descripcion" data-align="center">Descripción</th>
            <th data-field="cantidad" data-sortable="true" data-align="center">Cantidad</th>
            <th data-field="precio_unitario" data-sortable="true" data-align="center">Precio Unitario</th>
            <th data-field="action" data-align="center" data-formatter="actionFormatter" data-events="actionEvents">Accion</th>
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
                <h4 class="modal-title" id="myModalLabel">Insertar Repuesto</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputCodigo" class="col-sm-4 control-label">Código</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCodigo" placeholder="Código" id="inputCodigo" required autofocus>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputNombre" placeholder="Nombre" id="inputNombre" required >
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputDes" placeholder="Descripcion" id="inputDes" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cantidad</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCant" placeholder="Cantidad" id="inputCant" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Precio unitario</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputPrecio" placeholder="Precio unitario" id="inputPrecio" required>
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

<!-- Modal para modificar-->
<div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificar Repuesto</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">Código</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCod2" placeholder="Código" id="inputCod2" readonly>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputNom2" placeholder="Nombre" id="inputNom2" required >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputDesc2" placeholder="Descripción" id="inputDesc2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cantidad</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCant2" placeholder="Cantidad" id="inputCant2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Precio unitario</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputPrecio2" placeholder="Precio unitario" id="inputPrecio2" required>
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
            /*'<a class="remove " href="javascript:void(0)" title="Eliminar">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'*/
        ].join('');
    }

    window.actionEvents = {

        'click .edit': function (e, value, row, index) {

            $("#inputCod2").val(row.codigo);
            $("#inputNom2").val(row.nombre);
            $("#inputDesc2").val(row.descripcion);
            $("#inputCant2").val(row.cantidad);
            $("#inputPrecio2").val(row.precio_unitario);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .remove': function (e, value, row, index) {
            swal({
                title: "¿Desea eliminar?",
                text: "¿Seguro desea eliminar el repuesto "+row.descripcion+"?",
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

