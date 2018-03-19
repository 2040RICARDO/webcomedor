         <div class="modal fade" id="asistenciac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
         	<div class="modal-dialog modal-lg" role="document">
         		<div class="modal-content">
         			<div class="modal-header">
         				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
         				<h5 class="modal-title" id="myModalLabel">Suspender</h5>
         			</div>
         			<div class="modal-body">
         				<div class="row">
         					<div class="col-sm-11 ">
         						<form  id="f_nuevo_suspendermodal"  method="post" enctype="multipart/form-data" action= "/agregar_nuevo_suspendermodal"  class="form-horizontal frmentrada" >
         							<input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
         							<input type="hidden" id="idc" name="comensal_id">
         							<input type="hidden" id="idt" name="tarjeta_id">
         							<div class="row">
         								<div class="col-sm-5 col-sm-offset-1">
                          <div class="input-group">
                           <span class="input-group-addon">
                            <i class="material-icons">today</i>
                          </span>
                          <div class="form-group label-floating">
                           <label class="control-label">De</label>
                           <input type="text" class="form-control datepickercc" id="" name="fecha_inicio" value=" ">
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
                         <input type="text" class="form-control datepickercc" id="" name="fecha_conclucion" value=" ">
                       </div>
                     </div>
                     <div class="pull-right">
                       <a type='button' class='btn  btn-fill btn btn-danger btn-wd ' href="#" data-dismiss="modal">Cancelar</a>
                       
                       
                       <button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Enviar</button>
                     </div>
                     <div class="clearfix"></div>
                   </form>
                 </div>
               </div>

             </div>
           </div>
         </div>
         
         
         
         


<script type="text/javascript">  
function MostrarSuspender(tarjeta_id,comensal_id) {
  var url = "frmsuspender/"+tarjeta_id+"/"+comensal_id+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(data){
      	$("#idc").val(data.cid);
      	$("#idt").val(data.tid)
        
        
  });
}  

</script>