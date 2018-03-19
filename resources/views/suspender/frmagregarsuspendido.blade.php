
<div class="container">
	<div class="row">
		<div class="col-sm-11 ">
			<!--      Wizard container        -->
			<div class="wizard-container">
				<div class="card wizard-card" data-color="purple" id="wizard">


					<form id="f_nuevo_suspendido"  method="post" enctype="multipart/form-data" action= "/agregar_nuevo_suspendido"  class="form-horizontal frmentrada">


						<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
						<div class="wizard-header">
							<h3 class="wizard-title">
								Formulario de Registro 
							</h3>
						</div>
						<div id="msj-error" class="alert alert-danger alert-with-icon" data-notify="container" style="display: none;">
							<i class="material-icons" data-notify="icon">notifications</i>
							<button class="close" type="button"   aria-hidden="true"><i class="material-icons">clear</i></button>
							<strong id="msj"></strong>
						</div>
						<div class="wizard-navigation">
							<ul>
								<li><a href="#location" data-toggle="tab">Datos de suspencion</a></li>

							</ul>
						</div>

						<div class="tab-content">


							<div class="tab-pane" id="location">
								<div class="row">
									<div class="col-sm-5 col-sm-offset-1">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">today</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Fecha de inicio</label>
												<input type="text" class="form-control datepickercc" id="fecha_inicio" name="fecha_inicio" value=" ">
											</div>
										</div>



									</div>
									<div class="col-sm-5 ">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">today</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Fecha final</label>
												<input type="text" class="form-control datepickercc" id="fecha_final" name="fecha_conclucion" value=" ">
											</div>
										</div>
									</div>
									


									<div class="col-sm-5 col-sm-offset-1">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">place</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Motivo</label>
												<input type="text" class="form-control" id="motivo" name="motivo">
											</div>
										</div>

									</div>		                                	
									<input type="hidden" name="comensal_id" value="{{$comensal_id}}"/>
									<input type="hidden" name="tarjeta_id" value="{{$tarjeta_id}}"/>


								</div>
							</div>

							<div class="wizard-footer">
								<div class="pull-right">
									<a type='button' class='btn btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(2);">Cancelar</a>



									<button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Registrar</button>

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
	<link href="assets/css/bootstrap-datepicker.css" rel="stylesheet" />  
    <script src="assets/js/bootstrap-datepicker.js"></script>
    
   <script type="text/javascript">
	$('.datepickercc').datepicker({
  format: "yyyy/mm/dd",
        language: "es",
        color: 'red',
 }) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
	</script>
