 

	    <div class="container">
	        <div class="row">
		        <div class="col-sm-11 ">
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizard">
		                
		
		                 {!!Form::open(['url'=>'agregar_nuevo_tarjeta','method'=>'POST','id'=>'f_nuevo_tarjeta','enctype'=>'multipart/form-data','class'=>'form-horizontal frmentrada'])!!}
		                
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
			                                          <input type="text" class="form-control" id="tags" name="codigo" value=" ">
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
			                                          <input type="text" class="form-control datepickercc" id="fecha_registro" name="fecha_registro" value="{{date('Y/m/d')}}">
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
			                                         <textarea class="form-control" placeholder="" rows="6" id="comentario" name="comentario"></textarea>
			                                        </div>
												</div>


		                                    	
		                                	</div>

		                            	</div>
		                            </div>
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                     <a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(2);">Cancelar</a>
	                                    <button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Registrar</button>
	                                </div>
	                               
		                            <div class="clearfix"></div>
		                        </div>
                      {!!Form::close()!!}
		                </div>
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
	    	$('.datepickercc').datepicker({
	    		format: "yyyy/mm/dd",
	    		language: "es",
	    		color: 'red',
	    	}) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
	    </script>