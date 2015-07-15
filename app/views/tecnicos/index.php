<?php 
	$titulo = "Técnicos";
	$position = 3;	
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
            data-url="public/tecnicos/show"
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
            <th data-field="cedula"  data-sortable="true" data-align="center">Cédula</th>
            <th data-field="nombre" data-sortable="true" data-align="center">Nombre</th>            
            <th data-field="apellido" data-align="center">Apellido</th>
            <th data-field="telefono" data-sortable="true" data-align="center">Teléfono</th>
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
                <h4 class="modal-title" id="myModalLabel">Insertar Técnico</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputCodigo" class="col-sm-4 control-label">Cédula</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCed" placeholder="Cédula" id="inputCed" required autofocus>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputNombre" placeholder="Nombre" id="inputNombre" required >
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputApe" placeholder="Apellido" id="inputApe" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputTlf" placeholder="Teléfono" id="inputTlf" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Clave</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control input-md" name="inputClav" placeholder="Clave" id="inputClav" required>
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
                <h4 class="modal-title" id="myModalLabel">Modificar Técnico</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">Cédula</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCed2" placeholder="Cédula" id="inputCed2" readonly>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputNom2" placeholder="Nombre" id="inputNom2" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputApe2" placeholder="Apellido" id="inputApe2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputTlf2" placeholder="Teléfono" id="inputTlf2" required>
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
            '<a class="remove " href="javascript:void(0)" title="Eliminar">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }

    window.actionEvents = {

        'click .edit': function (e, value, row, index) {

            $("#inputCed2").val(row.cedula);
            $("#inputNom2").val(row.nombre);
            $("#inputApe2").val(row.apellido);
            $("#inputTlf2").val(row.telefono);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .remove': function (e, value, row, index) {
            swal({
                title: "¿Desea eliminar?",
                text: "¿Seguro desea eliminar el técnico "+row.nombre+" "+row.apellido+"?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#368ee0",
                confirmButtonText: "Aceptar",
               closeOnConfirm: true},
                    function(){   
                        eliminarTecnico(row.cedula);
                    });

                
        }
    };

    function eliminarTecnico(cedula){
         $.ajax({
              url: "http://localhost/proyectobd/public/tecnicos/eliminar/"+cedula,
              complete: function (response) {                  
                  location.reload();
              },
              error: function () {

              },
           
        });
        return false;
    }

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




</body>
</html>

