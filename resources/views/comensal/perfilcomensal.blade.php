         <div class="modal fade" id="perfilcomensal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
         	<div class="modal-dialog modal-lg" role="document">
         		<div class="modal-content">
         			<div class="modal-header">
         				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
         				
         			</div>
         			<div class="modal-body">


                        
                            <div class="card">
                                <form id="TypeValidation" class="form-horizontal" action="" method="" novalidate="novalidate">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">Datos</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                        <div class="col-md-2">
                                              <div class="imagenn">
                                                 <img src="assets/img/avatar.jpe" class="img-responsive" style="width: 250px;height: 305px;">
                                             </div>
                                         </div>
                                         <div class="col-md-2">
                                              
                                         </div>

                                         <div class="col-md-8">
                                           <div class="row">
                                              <div class="row">
                                                <label class="col-sm-2 label-on-left">Id</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="id" type="text">
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
                                            <label class="col-sm-2 label-on-left">C.I</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="ci"  type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <label class="col-sm-2 label-on-left">Procedencia</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="procedencia" type="text">
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
                                            <label class="col-sm-2 label-on-left">Género</label>
                                            <div class="col-sm-3">
                                                <div class="form-group label-floating column-sizing is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" id="genero" type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                            
                                        </div>
                                       
                                            
                                           
                                        </div>
                                      
                                       
                                      
                                    </div>
</div>


</div>




                                        
                                    
                                </form>
                            </div>

         			</div>
         		</div>
                                               
                                              
    
                     


<script type="text/javascript">  
function MostrarPerfil(comensal_id) {
  var url = "perfilcomensal/"+comensal_id+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(data){
     $("#id").val(data.id);
     $("#nombre").val(data.nombre);
     $("#apellido").val(data.apellido);
     $("#ci").val(data.ci);
     $("#procedencia").val(data.procedencia);
     $("#numero").val(data.numero);
     $("#genero").val(data.genero);
     $('.imagenn').html('<img src="{{ asset('imagenes/') }}/'+data.imagen+'" style="width: 245px;height: 305px;">');
    $("#carrera").val(data.carrerass);
     


  });
}  

</script>