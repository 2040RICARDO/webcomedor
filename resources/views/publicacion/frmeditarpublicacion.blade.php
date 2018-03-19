 

	    <div class="container">
	        <div class="row">
		        <div class="col-sm-11 ">
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizard">
		                
		
		                 

		                 <form id="form"  class="form-horizontal frmactualizar" enctype="multipart/form-data">
		                <input type="hidden" id="id" value="{{$publicacion->id}}">
		                <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
		                
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
			                            <li><a href="#location" data-toggle="tab">Datos de la publicación</a></li>
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
			                                         <label class="control-label">Fecha de registro</label>
			                                          <input type="text" class="form-control datepickercc" id="fechapublicacion" name="fechapublicacion" value="{{ $publicacion->fechapublicacion }}" >
			                                        </div>
												</div>
		                                	</div>
		                                	<div class="col-sm-5 ">

		                                	<div class="input-group">
	    											<span class="input-group-addon">
	    												<i class="material-icons">error</i>
	    											</span>
	    											<div class="form-group label-floating">
	    												<label class="control-label">Estado</label>
	    												<select  class="form-control" id="estado" name="estado" required>
	    													<option  selected=""></option>
	    													<option value="1">Visible</option>
	    													<option value="2">No visible</option>
	    												</select>
	    											</div>
	    										</div>
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">forum</i>
													</span>
													<div class="form-group label-floating">
			                                         <label>Descripción</label>
			                                         <textarea class="form-control" placeholder="" rows="6" id="comentario" name="descripcion">{{ $publicacion->descripcion}}</textarea>
			                                        </div>
												</div>
		                                	</div>
		                                	
		                            	</div>
		                            </div>
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                     <a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(34);">Cancelar</a>
	                                    {!! link_to('#','Actualizar',['id'=>'actualizarpermiso','class'=>'btn btn-finish  btn-fill btn-primary btn-wd','style'=>'background-color: #263238']) !!}
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




	    $("#actualizarpermiso").click(function()
		{
			var id = $("#id").val();
			var data =$(".frmactualizar").serialize();
			var route = "{{url('editarpublicacion')}}/"+id+"";
			var token = $("#token").val();
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'PUT',
				dataType: 'json',
				data: data,
				success: function(){
					cargarformulario(34);
					demo.showSwal('auto-close');
					
				},
				error: function(data) {
         $("#msj-error").fadeIn();
                     
                     var lista_errores="";
                      $.each(data.responseJSON,function(index, value) {
                             lista_errores+='<li style="color:#263238;" >'+value+'</li>';
                             
                      })
                     $("#msj").html(lista_errores)

                    },
				
			});
		}); 

	    	cargarestado();
	    	function cargarestado(){
			$('#estado option:eq(<?= $publicacion->estado; ?>)').prop('selected', true);	
		}

		
		
	    </script>