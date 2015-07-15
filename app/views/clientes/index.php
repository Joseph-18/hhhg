
<?php 
	$titulo = "Clientes";
	$position = 0;	
	require_once '../app/res/templates/header.php';
?>
<div id="toolbar" class="btn-group">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" title="Agregar">
        <i class="glyphicon glyphicon-plus"></i>
    </button>
</div>


<div class="container" style="margin-top:40px;">
	<table  id="table" 
			class="table table-hover table-bordered"
			data-url="public/clientes/show"
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
	            <th data-field="cedula"  data-sortable="true" data-align="center">Cedula</th>
	            <th data-field="nombre" data-sortable="true" data-align="center">Nombre</th>
	            <th data-field="apellido" data-sortable="true" data-align="center">Apellido</th>
	            <th data-field="direccion" data-align="center" data-visible="false">Dirección</th>
	            <th data-field="email" data-align="center">Email</th>
	            <th data-field="telefono"  data-align="center">Teléfono</th>
	            <th data-field="action" data-align="center" data-formatter="actionFormatter" data-events="actionEvents">Accion</th>
	            <!--<th data-field="estado" data-width= "0"data-sortable="true" data-align="center" data-cell-style="cellStyle" data-formatter="stateFormatter">Estado</th>-->
	        </tr>
	    </thead>
	</table>
</div>

<!-- Modal Para Insertar-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Insertar cliente</h4>
      </div>
      <div class="modal-body modal-body-custom">
      
      	<form class="form-horizontal" method="post">
      	  <div class="form-group" >
		 	<label for="inputEmail3" class="col-sm-4 control-label">Cedula</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputCed" placeholder="Cedula" id="inputCed" required autofocus>
		  	
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputNom" placeholder="Nombre" id="inputNom" >
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputApe" placeholder="Apellido" id="inputApe" >
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Direccion</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputDir" placeholder="Direccion" id="inputDir">
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
		  	<div class="col-sm-6">
		  		 <input type="email" class="form-control input-md" name="inputEmail" placeholder="Email" id="inputEmail" required>
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputTel" placeholder="Teléfono" id="inputTel" required>
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
<!-- Fin de modal -->

<!-- Modal para insertar dispositivo-->
<div class="modal fade" id="insertarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Insertar Dispositivo</h4>
            </div>
            <div class="modal-body modal-body-custom">
                <form class="form-horizontal" method="post">
                    <div class="form-group" >
                        <label for="inputEmail3" class="col-sm-4 control-label">IMEI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputImei" placeholder="Imei" id="inputImei" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Marca</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputMarca" placeholder="Marca" id="inputMarca" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Modelo</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputModelo" placeholder="Modelo" id="inputModelo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Descripción</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputDescrip" placeholder="Descripcion" id="inputDescrip" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Cedula del Cliente</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-md" name="inputCedulaCli" placeholder="Cedula del Cliente" id="inputCedulaCli" readonly>
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

<!-- Modal Para Modificar-->
<div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar cliente</h4>
      </div>
      <div class="modal-body modal-body-custom">
      
      	<form class="form-horizontal" method="post">
      	  <div class="form-group" >
		 	<label for="inputEmail3" class="col-sm-4 control-label">Cedula</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md " name="inputCed2" placeholder="Cedula" id="inputCed2" readonly>
		  	
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Nombre</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputNom2" placeholder="Nombre" id="inputNom2" >
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Apellido</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputApe2" placeholder="Apellido" id="inputApe2" >
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Direccion</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputDir2" placeholder="Direccion" id="inputDir2">
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
		  	<div class="col-sm-6">
		  		 <input type="email" class="form-control input-md" name="inputEmail2" placeholder="Email" id="inputEmail2" required>
		  	</div> 
		  </div>
		  <div class="form-group">
		 	<label for="inputEmail3" class="col-sm-4 control-label">Teléfono</label>
		  	<div class="col-sm-6">
		  		 <input type="text" class="form-control input-md" name="inputTel2" placeholder="Teléfono" id="inputTel2" required>
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
<!-- Fin de modal -->


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
            '<a class="dispositivo" data-toggle="modal" data-target="#insertarModal" style="margin-left:10px; margin-right:10px;" style href="javascript:void(0)" title="Insertar">',
            '<i class="glyphicon glyphicon-phone"></i>',
            '</a>'
            /*'<a class="remove " href="javascript:void(0)" title="Eliminar">',
             '<i class="glyphicon glyphicon-remove"></i>',
             '</a>'*/
        ].join('');
    }

    window.actionEvents = {

        'click .edit': function (e, value, row, index) {

            $("#inputCed2").val(row.cedula);
            $("#inputNom2").val(row.nombre);
            $("#inputApe2").val(row.apellido);
            $("#inputDir2").val(row.direccion);
            $("#inputTel2").val(row.telefono);
            $("#inputEmail2").val(row.email);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .dispositivo': function (e, value, row, index) {

            $("#inputCedulaCli").val(row.cedula);

            $('#eventsTable').bootstrapTable('refresh'); //actualiza la tabla
        },
        'click .remove': function (e, value, row, index) {
            swal({
                    title: "¿Desea eliminar?",
                    text: "¿Seguro desea eliminar al cliente "+row.nombre+" "+row.apellido+"?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#368ee0",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false },
                function(){
                    eliminarCli(row.cedula,row.nombre,row.apellido);

                });
        }
    };
	
	
	

</script>




</body>
</html>

