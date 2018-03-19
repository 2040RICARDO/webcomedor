
<div class="container">
	<div class="row">
		<div class="col-sm-11 ">
			<div class="wizard-container">
				<div class="card wizard-card" data-color="purple" id="wizard">
					<form id="f_nuevo_usuario"  method="post" enctype="multipart/form-data" action= "/agregar_nuevo_usuario"  class="form-horizontal frmentrada">
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

								<li><a href="#facilities" data-toggle="tab">Imagen</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane" id="location">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="info-text"> Registre los datos del comensal</h4>
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
												<input type="text" class="form-control" id="numero" name="numero">
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
								</div>
							</div>
							<div class="tab-pane" id="facilities">
								<h4 class="info-text">Ingrese la fotografía del comensal  <a type="button" class="btn btn-success btn-xs" href="#" onclick="Iniciar()">Iniciar camara</a> 
											</h4>
								<div class="row">
									<div class="col-md-6 ">      
										<div class="picture-container">
											<div class="picture">
												<img  src="assets/img/avatar.jpe"  class="picture-src" id="wizardPicturePreview" title=""/>

												<input  type="file" id="wizard-picture" name="imagen" > </input>
											</div>
											<h6>Fotografía</h6>
										</div>
									</div>

									
		                                <div class="col-md-6 ">
		                                
		                                <div class="row">
											
		                                	<div class="col-md-3">

		                                		<img src="assets/img/avatar.jpe"  class="picture-src img-circle" id="imagen" title="" style="width: 200px;height: 200px; border:1px solid;" />
		                                	</div>
											
											<div class="col-md-3 col-md-offset-3">
												<video id="video" width="200" height="220"></video>
												<a type="button" class="btn btn-success btn-xs" href="#" id="camara">Foto</a>
												 <canvas  id="canvas" width='20'  height='20' style="display: none;" >
											</div>

										</div>
		                             </div>

								</div>
							</div>
							<div class="wizard-footer">
								<div class="pull-right">
									<a type='button' class='btn btn-next btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(1);">Cancelar</a>
									<input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Siguiente' style="background-color: #263238;" />
									<button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Guardar</button>
								</div>
								<div class="pull-left">
									<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Atras' />
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


function Iniciar() {
    
var video =document.querySelector('#video'),
	 canvas =document.querySelector('#canvas'),
	 btn =document.querySelector('#camara'),
	 img =document.querySelector('#imagen'),
	 int =document.querySelector('#int');


	//funcion para acceder a la camara
	navigator.getUserMedia =(
		navigator.getUserMedia || 
		navigator.webkitGetUserMedia || 
		navigator.mozGetUserMedia ||
		navigator.msGetUserMedia
		);

	if(navigator.getUserMedia){
		//Reproduce lo que vea la camara en el video
		navigator.getUserMedia({video:true},function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		},function(e){console.log(e);})
	}else{
		alert("navegador no acepta las opciones de html5");
	}

	video.addEventListener('loadedmetadata',function(){canvas.width = video.videoWidth;canvas.height = video.videoHeight;},false);
	btn.addEventListener('click',function(){
		canvas.getContext('2d').drawImage(video,0,0);
		var imgData = canvas.toDataURL('image/png');
		var intdata = canvas.toDataURL('image/png');
		img.setAttribute('src',imgData);
		
		



	});

}



  //window.addEventListener('load', init);


</script>
