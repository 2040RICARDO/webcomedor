<div class="container">
	        <div class="row">
		        <div class="col-sm-11 ">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizard">
 
                   
                  
                    <form id="f_nuevo_eventualnuevo"  method="post" enctype="multipart/form-data" action= "/agregar_nuevo_eventualnuevo"  class="form-horizontal frmentrada">
		                        
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
			                            <li><a href="#location" data-toggle="tab">Datos personales</a></li>
			                           
			                          
			                        </ul>
								</div>

		                        <div class="tab-content">
                                
                                
		                            <div class="tab-pane" id="location">
		                            	<div class="row">
		                                	<div class="col-sm-12">
												

		                                    	<h4 class="info-text"> Registre los datos del eventual</h4>
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">



												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
			                                          <label class="control-label">Nombre</label>
			                                          <input type="text" class="form-control"  name="nombre">
			                                        </div>
												</div>
		                                	</div>
		                                	<div class="col-sm-5 ">


												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
			                                         <label class="control-label">Apellido</label>
			                                          <input type="text" class="form-control"  id="apellido" name="apellido">
			                                        </div>
												</div>

		                                    	
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">dns</i>
													</span>
													<div class="form-group label-floating">
			                                         <label class="control-label">Carnet de Identidad</label>
			                                          <input type="text" class="form-control"  id="ci" name="ci">
			                                        </div>
												</div>
		                                    	
		                                	</div>
		                                	
		                                	
		                                	<div class="col-sm-5">
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">toc</i>
													</span>
													<div class="form-group label-floating">
			                                         <label class="control-label">Carrera o convenio</label>
			                                          {!! Form::select('carreras_id',['' => '']+$carreras,null, array('class' => 'form-control')) !!}
			                                        </div>
												</div>

		                                    	

		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">train</i>
													</span>
													<div class="form-group label-floating">
			                                         <label class="control-label">Procedencia</label>
			                                          <input type="text" class="form-control" id="procedencia" name="procedencia" >
			                                        </div>
												</div>
		                                    	
		                                	</div>
		                                	<div class="col-sm-5">
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">dns</i>
													</span>
													<div class="form-group label-floating">
			                                        <label class="control-label">Número de ficha</label>
			                                         <input type="text" class="form-control" id="numero" name="numero" value="">
			                                        </div>
												</div>

		                                	</div>
		                                	
		                                	
		                                	<div class="col-sm-5 col-sm-offset-1" >
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">accessibility</i>
													</span>
													<div class="form-group label-floating">
			                                         <label class="control-label">Género</label>
			                                          <select  class="form-control" id="genero" name="genero">
	                                                	<option disabled="" selected=""></option>
	                                                	<option value="Varon">Varon</option>
	                                                	<option value="Mujer">Mujer</option>
	                                            	</select>
			                                        </div>
												</div>
		                                    	
		                                	</div>

		                                	<div class="col-sm-5">
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">today</i>
													</span>
													<div class="form-group label-floating">
			                                        <label class="control-label">Fecha inicio</label>
			                                         <input type="text" class="form-control datepickercc" id="fecharegistro" name="fecha_inicio" value=" ">
			                                        </div>
												</div>

		                                	</div>

		                                	<div class="col-sm-5 col-sm-offset-1" >
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">today</i>
													</span>
													<div class="form-group label-floating">
			                                         <label class="control-label">Fecha final</label>
			                                           <input type="text" class="form-control datepickercc" id="fecharegistro" name="fecha_final" value=" ">
			                                        </div>
												</div>
		                                    	
		                                	</div>

		                            	</div>

		                            </div>
		                            
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                            	

	                            	 <a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(12);">Cancelar</a>

	                                   
	                                    
	                                    <button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Guardar</button>
	                                    
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
	$('.datepickercc').datepicker({
  format: "yyyy/mm/dd",
        language: "es",
        color: 'red',
 }) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
</script>