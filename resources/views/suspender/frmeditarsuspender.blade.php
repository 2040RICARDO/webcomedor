	    <div class="container">
	        <div class="row">
		        <div class="col-sm-11 ">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizard">
		                
                  
                    <form id="form"  class="form-horizontal frmactualizar" enctype="multipart/form-data">
                        
		                        
                               <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                               <input type="hidden" id="id" value="{{$suspender->id}}">
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
			                            <li><a href="#location" data-toggle="tab">Datos de Suspencion</a></li>			                          
			                        </ul>
								</div>

		                        <div class="tab-content">
                                
                                
		                            <div class="tab-pane" id="location">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h4 class="info-text"> Edite los datos de Suspencion de :<b> {{ $suspender->comensal->nombre }}</b></h4>
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                	<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">today</i>
													</span>
													<div class="form-group label-floating">
			                                          <label class="control-label">Fecha de inicio</label>
			                                           <input type="text" class="form-control datepickercc" id="fecha_inicio" name="fecha_inicio" value="{{ $suspender->fecha_inicio }} " >
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
			                                           <input type="text" class="form-control datepickercc" id="fecha_conclucion" name="fecha_conclucion" value="{{ $suspender->fecha_conclucion}} ">
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
			                                           <input type="text" class="form-control" id="motivo" name="motivo" value="{{ $suspender->motivo }} ">
			                                        </div>
												</div>
		                                    	
		                                	</div>		                                	
		                                	
		                              
		                            	</div>
		                            </div>
	
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                    
	                                    

										<a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(9);">Cancelar</a>
	                                

	                                
	                                    {!! link_to('#','Actualizar',['id'=>'actualizarsuspender','class'=>'btn btn-finish  btn-fill btn-primary btn-wd','style'=>'background-color: #263238']) !!}
	                                    
	                                </div>
	                               
		                            <div class="clearfix"></div>
		                        </div>
			                </form>
			     
			                
		                </div>
		            </div> <!-- wizard container -->  
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->
	    
	    


	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>
	
	
	
	<link href="assets/css/bootstrap-datepicker.css" rel="stylesheet" />  
    <script src="assets/js/bootstrap-datepicker.js"></script>
    
   <script type="text/javascript">
	$('.datepickercc').datepicker({
  format: "yyyy/mm/dd",
        language: "es",
        color: 'red',
 }) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
	


$("#actualizarsuspender").click(function()
{
  //event.preventDefault();
  var id = $("#id").val();
  //var nombre = $("#nombre").val();
  var data =$(".frmactualizar").serialize();
  var route = "{{url('editarsuspender')}}/"+id+"";
  var token = $("#token").val();
  $.ajax({
    url: route,
    headers: {'X-CSRF-TOKEN': token},
    type: 'PUT',
    dataType: 'json',
    //data: {nombre: nombre},
    data: data,
    success: function(){
        cargarformulario(9);
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
