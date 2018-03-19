	    <div class="container">
	    	<div class="row">
	    		<div class="col-sm-11 ">
	    			<div class="wizard-container">
	    				<div class="card wizard-card" data-color="purple" id="wizard">
	    					<form  id="form"  class="form-horizontal frmactualizar" enctype="multipart/form-data"  >
	    						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
	    						<input type="hidden" id="id" value="{{$tarjeta->id}}">
	    						<div class="wizard-header">
	    							<h3 class="wizard-title">
	    								Formulario de Edición
	    							</h3>
	    						</div>
	    						<div id="msj-error" class="alert alert-danger alert-with-icon" data-notify="container" style="display: none;">
	    							<i class="material-icons" data-notify="icon">notifications</i>
	    							<button class="close" type="button"   aria-hidden="true"><i class="material-icons">clear</i></button>
	    							<strong id="msj"></strong>
	    						</div>
	    						<div class="wizard-navigation">
	    							<ul>
	    								<li><a href="#location" data-toggle="tab">Datos de la tarjeta</a></li>
	    							</ul>
	    						</div>
	    						<div class="tab-content">
	    							<div class="tab-pane" id="location">
	    								<div class="row">
	    									<div class="col-sm-12">
	    										<h4 class="info-text"> Registro de tarjeta</h4>
	    									</div>
	    									<div class="col-sm-5 col-sm-offset-1">
	    										<div class="input-group">
	    											<span class="input-group-addon">
	    												<i class="material-icons">nfc</i>
	    											</span>
	    											<div class="form-group label-floating">
	    												<label class="control-label">Código</label>
	    												<input type="text" class="form-control" id="tags" name="codigo" value="{{$tarjeta->codigo}}">
	    											</div>
	    										</div>
	    									</div>
	    									<div class="col-sm-5 ">
	    										<div class="input-group">
	    											<span class="input-group-addon">
	    												<i class="material-icons">today</i>
	    											</span>
	    											<div class="form-group label-floating">
	    												<label class="control-label">Fecha de registro</label>
	    												<input type="text" class="form-control datepickercc" id="fecha_registro" name="fecha_registro" value="{{$tarjeta->fecha_registro}}">
	    											</div>
	    										</div>
	    									</div>
	    									<div class="col-sm-5 col-sm-offset-1" >
	    										<div class="input-group">
	    											<span class="input-group-addon">
	    												<i class="material-icons">forum</i>
	    											</span>
	    											<div class="form-group label-floating">
	    												<label>Comentario</label>
	    												<textarea class="form-control" placeholder="" rows="6" id="comentario" name="comentario" >{{$tarjeta->comentario}}</textarea>
	    											</div>
	    										</div>
	    									</div>
	    									<div class="col-sm-5 " >
	    										<div class="input-group">
	    											<span class="input-group-addon">
	    												<i class="material-icons">error</i>
	    											</span>
	    											<div class="form-group label-floating">
	    												<label class="control-label">Estado</label>
	    												<select  class="form-control" id="estado" name="estado">
	    													<option  selected=""></option>
	    													<option value="1">Activo</option>
	    													<option value="2">Inactivo</option>
	    													@if($tarjeta->estado == 1 || $tarjeta->estado == 2)
	    													<option value="0">Desactivar</option>
	    													@endif
	    												</select>
	    											</div>
	    										</div>

	    									</div>
	    									<div class="col-sm-5">
	    										<div class="input-group">
	    											<span class="input-group-addon">
	    												<i class="material-icons">face</i>
	    											</span>
	    											<div class="form-group label-floating">
	    												@if($tarjeta->estado == 0)
	    												<label class="control-label">Selecione comensal</label>
	    												{!! Form::select('comensal_id',['' => '']+$comensales,$tarjeta->comensal_id, array('class' => 'form-control')) !!}

	    												@else
	    												<label class="control-label">Comensal</label>
	    												<input type="text" class="form-control" id="comensal_id" name="comensal_id" value="{{$tarjeta->comensal->nombre}}" disabled="disabled">
	    												@endif

	    											</div>
	    										</div>
	    									</div>
	    								</div>
	    							</div>
	    							<div class="wizard-footer">
	    								<div class="pull-right">
	    									<a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(2);">Cancelar</a>
	    									@if($tarjeta->estado == 1)
	    									<a href="#" onclick='MostrarPermiso(<?= $tarjeta->comensal_id; ?>,<?= $tarjeta->id; ?>);' class="btn btn-finish btn-fill btn-info btn-wd">Permiso</a>
	    									<a href="#" onclick='MostrarSuspenderNuevo(<?= $tarjeta->comensal_id; ?>,<?= $tarjeta->id; ?>);'  class="btn btn-finish btn-fill btn-warning btn-wd">Suspender</a>
	    									@endif
	    									{!! link_to('#','Actualizar',['id'=>'actualizartarjeta','class'=>'btn btn-finish  btn-fill btn-primary btn-wd','style'=>'background-color: #263238']) !!}
	    								</div>
	    								<div class="clearfix"></div>
	    							</div>
	    						</div>
	    					</form>
	    				</div>  
	    			</div>
	    		</div> 
	    	</div> 
	<script src="assets/js/material-bootstrap-wizard.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>

   



	<script> 
		var socket = io.connect( 'http://localhost:3000' );
		socket.on('leer',function(leer){
			document.getElementById("tags").value ='';   
			document.getElementById("tags").value += leer;   
		});
	</script> 
	<script type="text/javascript">
		$('.datepicker').datepicker({
			weekStart:1,
			color: 'red'
		});
	</script>
	<script type="text/javascript">
		$("#actualizartarjeta").click(function()
		{
			var id = $("#id").val();
			var data =$(".frmactualizar").serialize();
			var route = "{{url('editartarjeta')}}/"+id+"";
			var token = $("#token").val();
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'PUT',
				dataType: 'json',
				data: data,
				success: function(){
					cargarformulario(2);
					demo.showSwal('auto-close');
					
				},
				error: function(data) {
					$("#msj-error").fadeIn();
					
					var lista_errores="";
					$.each(data.responseJSON,function(index, value) {
						lista_errores+='<li style="color:#263238;" >'+value+'</li>';
						
					})
					$("#msj").html(lista_errores)

				}
			});
		}); 
		
		function cargarestado(){
			$('#estado option:eq(<?= $tarjeta->estado; ?>)').prop('selected', true);	
		}

		cargarestado();
		

		function MostrarPermiso(comensal_id,id) {
			var url = "frmpermiso/"+comensal_id+"/"+id+""; 
			$("#capa_para_edicion").html($("#cargador_empresa").html());
			$.get(url,function(resul){
				$("#contenido_principal").html(resul);
			})

		}  
	</script>



	<script type="text/javascript">
		$('.datepickercc').datepicker({
			format: "yyyy/mm/dd",
			language: "es",
			color: 'red',
		}) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
	</script>




	<script type="text/javascript">  
		function MostrarSuspenderNuevo(comensal_id,id) {
			var url = "frmsuspendernuevo/"+comensal_id+"/"+id+""; 
			$("#capa_para_edicion").html($("#cargador_empresa").html());
			$.get(url,function(resul){
				$("#contenido_principal").html(resul);
			})

		} 
	</script>













































