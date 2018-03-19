
<div class="container">
	<div class="row">
		<div class="col-sm-11">
			<div class="wizard-container">
				<div class="card wizard-card" data-color="purple" id="wizard">
					{!!Form::open(['url'=>'photo_eventual','method'=>'POST','id'=>'f_nuevo_foto_eventual','enctype'=>'multipart/form-data','class'=>'form-horizontal frmentrada'])!!}

					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<div class="wizard-header">
						<h3 class="wizard-title">
							Formulario de Edición
						</h3>
					</div>
					<div class="wizard-navigation">
						<ul>
							<li><a href="#location" data-toggle="tab">Seleccione una imagen</a></li>
						</ul>
					</div>	
					<div class="tab-content">
						<div class="tab-pane" id="location">
						<h4 class="info-text">Ingrese la fotografía del comensal eventual <a type="button" class="btn btn-success btn-xs" href="#" onclick="Iniciar()">Iniciar camara</a> 
											</h4>
							<div class="row">
								<div class="col-md-6 col">

									<div class="picture-container">
										<div class="picture">
											<img class="picture-src" src="{{asset('eventualimagenes/')}}/{{$eventual->imagen}}" title="Su fotografía"   id="wizardPicturePreview">
											<input type="file" id="wizard-picture" name="photo" required="true">
											<input type="hidden" name="id" id="inputimages" value="{{ $eventual->id }}">
										</div>
										<h6>{{ $eventual->nombre }}</h6>
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
						<div class="wizard-footer">
							<div class="pull-right">
								<br><br><br><br>
								<a type='button' class=' btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(12);">Cancelar</a>  
								<button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Guardar</button>
							</div>
						</div>
						{!!Form::close()!!}
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

	
