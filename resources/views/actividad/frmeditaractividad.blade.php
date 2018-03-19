
<div class="container">
	<div class="row">
		<div class="col-sm-11 ">
			<!--      Wizard container        -->
			<div class="wizard-container">
				<div class="card wizard-card" data-color="purple" id="wizard">
					
					
					<form id="form"  class="form-horizontal frmactualizar" enctype="multipart/form-data"  >
						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" id="id" value="{{$actividad->id}}">
						
						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
						<div class="wizard-header">
							<h3 class="wizard-title">
								Formulario de Edicion
							</h3>
						</div>
						<div id="msj-error" class="alert alert-danger alert-with-icon" data-notify="container" style="display: none;">
							<i class="material-icons" data-notify="icon">notifications</i>
							<button class="close" type="button"   aria-hidden="true"><i class="material-icons">clear</i></button>
							<strong id="msj"></strong>
						</div>
						<div class="wizard-navigation">
							<ul>
								<li><a href="#location" data-toggle="tab">Editar datos de permiso</a></li>
								
							</ul>
						</div>

						<div class="tab-content">
							
							
							<div class="tab-pane" id="location">
								<div class="row">
									
									<div class="col-sm-5 col-sm-offset-1">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">grain</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Actividad</label>
												<input type="text" class="form-control" id="" name="actividad" value="{{ $actividad->actividad }}">
											</div>
										</div>
										
										
										
									</div>
									<div class="col-sm-5 ">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">today</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Fecha de actividad</label>
												<input type="text" class="form-control datepickercc" id="" name="fecha_actividad" value="{{ $actividad->fecha_actividad }}">
											</div>
										</div>
									</div>
									<div class="col-sm-5 col-sm-offset-1">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">forum</i>
											</span>
											<div class="form-group label-floating">
												<label>Comentario</label>
												<textarea class="form-control" placeholder="" rows="5" id="" name="comentario">{{ $actividad->comentario }}</textarea>
											</div>
										</div>
										
									</div>
									
									
									
									
								</div>
							</div>
							
							<div class="wizard-footer">
								<div class="pull-right">
									<a type='button' class='btn btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(23);">Cancelar</a>


									

									{!! link_to('#','Actualizar',['id'=>'actualizaractividad','class'=>'btn btn-finish btn-fill btn-primary btn-wd"','style'=>'background-color: #263238']) !!}
									
								</div>
								
								<div class="clearfix"></div>
							</div>
						</form>
						
						
					</div>
				</div> 
			</div>
		</div> 
	</div> 
	    
	<script src="assets/js/material-bootstrap-wizard.js"></script>

	<script src="assets/js/jquery.validate.min.js"></script>
	
	
	
	<link href="cal/assets/css/bootstrap-datepicker.css" rel="stylesheet" />  
    <script src="cal/assets/js/bootstrap-datepicker.js"></script>
    
    <script type="text/javascript">
    	$('.datepickercc').datepicker({
    		format: "yyyy/mm/dd",
    		language: "es",
    		color: 'red',
    	}) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });


    	$("#actualizaractividad").click(function()
    	{
  //event.preventDefault();
  var id = $("#id").val();
  //var nombre = $("#nombre").val();
  var data =$(".frmactualizar").serialize();
  var route = "{{url('editaractividad')}}/"+id+"";
  var token = $("#token").val();
  $.ajax({
  	url: route,
  	headers: {'X-CSRF-TOKEN': token},
  	type: 'PUT',
  	dataType: 'json',
    //data: {nombre: nombre},
    data: data,
    success: function(){
    	cargarformulario(23);
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


</script>
