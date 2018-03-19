 

<div class="container">
    <div class="row">
        <div class="col-sm-11 ">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="purple" id="wizard">


                   <form id="TypeValidation" class="form-horizontal" action="" method="" novalidate="novalidate">
                    <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">Datos de Tarjeta</h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-12">
                             <div class="row">
                              <div class="row">
                                <label class="col-sm-2 label-on-left">Codigo</label>
                                <div class="col-sm-3">
                                    <div class="form-group label-floating column-sizing is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" id="CodigoTag" type="text">
                                        <span class="material-input"></span></div>
                                    </div>


                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Nombre</label>
                                    <div class="col-sm-3">
                                        <div class="form-group label-floating column-sizing is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" id="nombre"  type="text">
                                            <span class="material-input"></span></div>
                                        </div>
                                        <label class="col-sm-2 label-on-left">Apellido</label>
                                        <div class="col-sm-3">
                                            <div class="form-group label-floating column-sizing is-empty">
                                                <label class="control-label"></label>
                                                <input class="form-control" id="apellido" type="text">
                                                <span class="material-input"></span></div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Ficha</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="numero"  type="text">
                                                    <span class="material-input"></span></div>
                                                </div>
                                                <label class="col-sm-2 label-on-left">Estado</label>
                                                <div class="col-sm-3">
                                                    <div class="form-group label-floating column-sizing is-empty">
                                                        <label class="control-label"></label>
                                                        <input class="form-control" id="estado" type="text">
                                                        <span class="material-input"></span></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                       <a type='button' class='btn  btn-fill btn btn-danger btn-wd' href="javascript:void(0);" onclick="cargarformulario(2);">Cerrar</a>

                                   </div>
                                   
                                   <div class="clearfix"></div>
                               </div>
                           </div>
                       </form>
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
      document.getElementById("CodigoTag").value =''; 
        document.getElementById("CodigoTag").value += leer;
        
            $.ajax({
                    url: "{{ url('verificartag')}}",
                    data: "leer="+leer+"&_token={{ csrf_token()}}",
                    dataType: 
                    "json",
                    method: "POST",
                    success: function(data)
                    {
                    if(data['estado'] == 1 || data['estado'] == 2  ||data['estado'] == 3  || data['estado'] == 4 ){
                    $("#codigo").val(data['codigo']);
                     $('#nombre').val(data['nombre']);
                     $('#apellido').val(data['apellido']);
                     $('#numero').val(data['numero']);
                     if(data['estado'] == 1 ){
                        $('#estado').val("Activo"); 
                    }else if(data['estado'] == 2 ){

                     $('#estado').val("Inactivo"); 
                    }else if (data['estado'] == 3 ) {
                            $('#estado').val("Permiso");
                    }else if (data['estado'] == 4 ) {
                            $('#estado').val("Suspendido");
                    }
                 }else if(data == 5){
                        $("#codigo").val("No registrado");
                     $('#nombre').val("No registrado");
                     $('#apellido').val("No registrado");
                     $('#numero').val("No registrado");
                     $('#estado').val("No registrado");
                 }else{
                     $("#codigo").val("No asignado");
                     $('#nombre').val("No asignado");
                     $('#apellido').val("No asignado");
                     $('#numero').val("No asignado");
                     $('#estado').val("No asignado");
                 }
                    
                        
                    },
                    error: function(data) {

                    },
                });
            });
    </script>
        
        
    

    
     
































