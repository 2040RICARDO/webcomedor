	    <div class="container">
	    	<div class="row">
	    		<div class="col-sm-11 ">
	    			<div class="wizard-container">
	    				<div class="card wizard-card" data-color="purple" id="wizard">

	    					{!!Form::open(['url'=>'fechacontrol','method'=>'POST','id'=>'f_nueva_fecha','enctype'=>'multipart/form-data','class'=>'form-inline frmentrada'])!!}

	    					<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">

	    					<input type="hidden" id="id" value="">
	    					<div class="wizard-header">
	    						<h3 class="wizard-title">
	    							Control de asistencia
	    						</h3>
	    					</div>
	    					<div class="wizard-navigation">
	    						<ul>
	    							<li><a href="#location" data-toggle="tab">Ingrese el rango de fechas</a></li>
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
	    											<label class="control-label">De</label>
	    											<input type="text" class="form-control datepickercc" id="" name="fecha1" value=" ">
	    										</div>
	    									</div>

	    								</div>

	    								<div class="col-sm-5 ">
	    									<div class="input-group">
	    										<span class="input-group-addon">
	    											<i class="material-icons">today</i>
	    										</span>
	    										<div class="form-group label-floating">
	    											<label class="control-label">Al</label>
	    											<input type="text" class="form-control datepickercc" id="" name="fecha2" value=" ">
	    										</div>
	    									</div>

	    								</div>


	    								<div class="col-sm-5 col-sm-offset-1" >


	    									<div class="col-sm-5 " >

	    									</div>

	    									<div class="col-sm-5">

	    									</div>
	    								</div>
	    							</div>
	    							<br><br><br><br><br><br><br><br>
	    							<div class="wizard-footer" style="margin-bottom: 10px;">
	    								<div class="pull-right">
	    									<input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />


	    									<a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(9);">Cancelar</a>


	    									<button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Enviar</button>

	    								</div>

	    								<div class="clearfix"></div>
	    							</div>

	    						</div>
	    						{!!Form::close()!!}

	    					</div> 
	    				</div>
	    			</div> 
	    		</div> 
	    
	    

	<script src="assets/js/material-bootstrap-wizard.js"></script>

	<script src="assets/js/jquery.validate.min.js"></script>

	
	
	
	
	<script type="text/javascript">
		$('.datepickercc').datepicker({
			format: "yyyy/mm/dd",
			language: "es",
			color: 'red',
		}) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
	</script>
	
	
