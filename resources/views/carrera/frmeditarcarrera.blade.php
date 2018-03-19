
<div class="container">
	<div class="row">
		<div class="col-sm-11 ">
			<!--      Wizard container        -->
			<div class="wizard-container">
				<div class="card wizard-card" data-color="purple" id="wizard">



					<form id="form"  class="form-horizontal frmactualizar" enctype="multipart/form-data"  >
						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">

						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
						<input type="hidden" id="id" value="{{$carrera->id}}">
						<div class="wizard-header">
							<h3 class="wizard-title">
							Formulario de edición
							</h3>

						</div>
						<div id="msj-error" class="alert alert-danger alert-with-icon" data-notify="container" style="display: none;">
							<i class="material-icons" data-notify="icon">notifications</i>
							<button class="close" type="button"   aria-hidden="true"><i class="material-icons">clear</i></button>
							<strong id="msj"></strong>
						</div>
						<div class="wizard-navigation">
							<ul>
								<li><a href="#location" data-toggle="tab">Datos de carrera o convenio</a></li>


							</ul>
						</div>

						<div class="tab-content">


							<div class="tab-pane" id="location">
								<div class="row">
									<div class="col-sm-10 ">



										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">store</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Universidad</label>
												<input type="text" class="form-control"  name="universidad" value="{{ $carrera->universidad }}">
											</div>
										</div>

									</div>
									<div class="col-sm-10">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">store</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Area</label>
												<input type="text" class="form-control"  name="area" value="{{ $carrera->area }}">
											</div>
										</div>
									</div>
									<div class="col-sm-10">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">store</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Carrera</label>
												<input type="text" class="form-control"  name="carrera" value="{{ $carrera->carrera }}">
											</div>
										</div>
									</div>





								</div>

							</div>

							<div class="wizard-footer">
								<div class="pull-right">


									<a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(14);">Cancelar</a>



									{!! link_to('#','Actualizar',['id'=>'actualizarcarrera','class'=>'btn btn-finish  btn-fill btn-primary btn-wd','style'=>'background-color: #263238']) !!}

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


	<script type="text/javascript">
		$("#actualizarcarrera").click(function()
		{
  //event.preventDefault();
  var id = $("#id").val();
  //var nombre = $("#nombre").val();
  var data =$(".frmactualizar").serialize();
  var route = "{{url('editarcarrera')}}/"+id+"";
  var token = $("#token").val();
  $.ajax({
  	url: route,
  	headers: {'X-CSRF-TOKEN': token},
  	type: 'PUT',
  	dataType: 'json',
    //data: {nombre: nombre},
    data: data,
    success: function(){
    	cargarformulario(14);
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