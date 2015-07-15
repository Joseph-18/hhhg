<?php 
	$titulo = "Reparaciones";
	$position = 4;	
	require_once '../app/res/templates/header.php';
    
?>

<div class="container" style="margin-top:40px;">
    <table  id="table"
            class="table table-hover table-bordered"
            data-url="public/reparaciones/show"
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
            <th data-field="fecha_recibido" data-sortable="true" data-align="center">Fecha Recibido</th>
            <th data-field="descripcion" data-align="center" data-visible="false">Descripción</th>            
            <th data-field="observacion" data-align="center" data-visible="false">Observación</th>
             <th data-field="historia" data-align="center" data-visible="false">Historia</th>
            <th data-field="cedula_tecnico" data-sortable="true" data-align="center">Cedula del Técnico</th>
            <th data-field="estado" data-sortable="true" data-align="center">Estado</th>
            <th data-field="action" data-align="center" data-formatter="actionFormatter" data-events="actionEvents">Accion</th>
            <!--<th data-field="estado" data-width= "0"data-sortable="true" data-align="center" data-cell-style="cellStyle" data-formatter="stateFormatter">Estado</th>-->
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
                <h4 class="modal-title" id="myModalLabel">Modificar Reparación</h4>
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
                        <label for="inputEmail3" class="col-sm-4 control-label">Fecha Recibido</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputfechaRec2" placeholder="Fecha de Recibo" id="inputfechaRec2" readonly >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cedula del Tecnico</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCedulaTec2" placeholder="Cedula del Tecnico" id="inputCedulaTec2" readonly>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputDescrip2" placeholder="Descripcion" id="inputDescrip2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Historia</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputHist2" placeholder="Historia" id="inputHist2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Estado</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputEstado2" placeholder="Estado" id="inputEstado2" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Observación</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputObser2" placeholder="Observación" id="inputObser2" required>
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

<!-- Modal para Detalles-->
<div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Insertar Detalle</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">IMEI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputImei3" placeholder="Imei" id="inputImei3" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Fecha Recibido</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputfechaRec3" placeholder="Fecha de Recibo" id="inputfechaRec3" readonly >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cantidad</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCantidad3" placeholder="Cantidad" id="inputCantidad3" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Codigo del Repuesto</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCodigoRep3" placeholder="Codigo" id="inputCodigoRep3" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Costo</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCosto3" placeholder="Costo" id="inputCosto3" readonly value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <input type="submit" name="enviar3" value="Aceptar" class="btn btn-primary">
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
            /*'<a class="remove" href="javascript:void(0)" title="Eliminar">',
             '<i class="glyphicon glyphicon-remove"></i>',
             '</a>',*/
            '<a class="factura" data-toggle="modal" data-target="#facturarModal" style="margin-left:10px; margin-right:10px;" style href="javascript:void(0)" title="Facturar">',
            '<i class="glyphicon glyphicon-list-alt"></i>',
            '</a>',
            '<a class="detalle" data-toggle="modal" data-target="#detalleModal" style="margin-left:10px; margin-right:10px;" style href="javascript:void(0)" title="Detalles">',
            '<i class="glyphicon glyphicon-paperclip"></i>',
            '</a>'
        ].join('');
    }

    window.actionEvents = {

        'click .edit': function (e, value, row, index) {

            $("#inputImei2").val(row.imei);
            $("#inputfechaRec2").val(row.fecha_recibido);
            $("#inputDescrip2").val(row.descripcion);
            $("#inputEstado2").val(row.estado);
            $("#inputHist2").val(row.historia);
            $("#inputObser2").val(row.observacion);
            $("#inputCedulaTec2").val(row.cedula_tecnico);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .detalle': function (e, value, row, index) {

            $("#inputImei3").val(row.imei);
            $("#inputfechaRec3").val(row.fecha_recibido);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        /* 'click .remove': function (e, value, row, index) {
         swal({
         title: "¿Desea eliminar?",
         text: "¿Seguro desea eliminar la reparacion "+row.imei+"?",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#368ee0",
         confirmButtonText: "Aceptar",
         closeOnConfirm: false });
         },*/
        'click .factura': function (e, value, row, index) {
            swal({
                    title: "¿Desea generar la factura?",
                    text: "Al momento de generar la factura usted no podra seguir trabajando sobre la reparacion!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#368ee0",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: true},
                function(){
                    crearFactura(row.imei,row.fecha_recibido);
                });
        }

    };

    function crearFactura(imei,fecha) {
        $.ajax({
            url:'http://localhost/proyectobd/public/data/crearFactura/'+imei+'/'+fecha,
            complete: function (response) {
                swal("Factura creada.", "Factura creada.", "success");
                window.location.href =response.responseText;
            },
            error: function () {

            }

        });
        return false;
    }

    function cellStyle(value, row, index) {

        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (row.estado=='REPARADO') {
            return {
                classes: classes[4]
            };
        }

        if (row.estado=='EN PROCESO DE REPARACION') {
            return {
                classes: classes[3]
            };
        }

        return {
            classes: classes[1]
        };
    }



</script>


</body>
</html>

