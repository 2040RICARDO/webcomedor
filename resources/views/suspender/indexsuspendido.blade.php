                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-header-icon" data-background-color="green">
                          <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                          <div class="row">
                           <div class="col-sm-3">
                             <h4 class="card-title">Lista de comensales suspendidos</h4>      
                           </div>

                         </div>
                         <div class="toolbar">

                         </div>
                         <div class="material-datatables">
                          <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                           <div class="row">
                             <div class="col-sm-12">

                               <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline table-responsive" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                <thead>
                                  <tr role="row" style="background-color:#263238;">
                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>

                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre</th>

                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Carrera</th>

                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ficha</th>

                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Código</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Motivo</th>
                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Fecha inicio</th>
                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Fecha Conclusión</th>




                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Acción</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">Nombre</th>
                                    <th rowspan="1" colspan="1">Carrera</th>
                                    <th rowspan="1" colspan="1">Ficha</th>
                                    <th rowspan="1" colspan="1">Código</th>
                                    <th rowspan="1" colspan="1">Motivo</th>
                                    <th rowspan="1" colspan="1">Fecha inicio</th>
                                    <th rowspan="1" colspan="1">Fecha conclusión</th>
                                    <th class="text-right" rowspan="1" colspan="1">Acción</th>
                                  </tr>
                                </tfoot>
                                <tbody>


                                 @foreach($suspender as $suspendido)
                                 {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                                 <tr role="row" class="odd">
                                  <td>{{$suspendido->id}}</td>
                                  <td ><b>{{$suspendido->nombres." ".$suspendido->apellidos}}</b></td>
                                  <td>{{$suspendido->carrerass }}</td>
                                  <td>{{$suspendido->numeros}}</td>

                                  <td>{{$suspendido->codigoss}}</td>
                                  <td>{{$suspendido->motivo}}</td>
                                  
                                  <td>{{ $suspendido->fecha_inicio}}</td>
                                  <td><span class="label label-success">{{ $suspendido->fecha_conclucion}}</span></td>
                                  <td class="td-actions text-right">
                                    <a href="#" OnClick='MostrarSuspenderEdit({{$suspendido->id}});'  class="btn btn-info btn-simple"> <i class="material-icons" >edit</i>
                                    </a>

                                    @if($suspendido->asignacion  == 0)
                                    <a href="#" rel="tooltip" onclick='MostrarEventual(<?= $suspendido->id; ?>,<?= $suspendido->comensal_id; ?>,<?= $suspendido->tarjeta_id; ?>);' class="btn btn-info btn-simple btn-xs" title="" data-original-title="hola" >
                                      <i class="material-icons">person</i>
                                    </a>
                                    @else
                                    <a href="#" rel="tooltip" class="btn btn-info btn-simple btn-xs" title="" data-original-title="hola" disabled="disabled">
                                      <i class="material-icons">person</i>
                                    </a>

                                    <a href="#" onclick="EliminarSuspender('{{$suspendido->id}}')" class="btn btn-danger btn-simple"  rel="tooltip" data-original-title="sddsd" title=""><i class="material-icons">delete</i></a>

                                    @endif

                                  </td>
                                </tr>
                                @endforeach
                                @foreach($suspenderr as $suspendidoo)
                                {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                                <tr role="row" class="odd">
                                  <td>{{$suspendidoo->id}}</td>
                                  <td ><b>{{$suspendidoo->nombres." ".$suspendidoo->apellidos}}</b></td>
                                  <td>{{$suspendidoo->carrerass}}</td>
                                  <td>{{$suspendidoo->numeros}}</td>
                                  <td>{{$suspendidoo->codigos}}</td>
                                  <td>{{$suspendidoo->motivo}}</td>
                        
                                  <td>{{ $suspendidoo->fecha_inicio}}</td>
                                  <td><span class="label label-danger">{{ $suspendidoo->fecha_conclucion}}</span></td>
                                  <td class="td-actions text-right">
                                    <a href="#"   class="btn btn-info btn-simple" disabled="disabled"> <i class="material-icons" >edit</i>
                                    </a>

                                    <a href="#" rel="tooltip" class="btn btn-info btn-simple btn-xs" title="" data-original-title="hola" disabled="disabled">
                                      <i class="material-icons">person</i>
                                    </a>

                                    <a href="#" onclick="EliminarSuspender('{{$suspendidoo->id}}')" class="btn btn-danger btn-simple"  rel="tooltip" data-original-title="sddsd" title=""><i class="material-icons">delete</i></a>
                                  </td>
                                </tr>
                                @endforeach



                              </tbody>
                            </table></div></div></div>
                          </div>
                        </div>

                      </div>

                    </div>

                  </div>



                </div>













<!--//FUNCION ELIMINAR COMENSAL////////////////////////////////////////////////////////////////////////////////////////////-->  
<script type="text/javascript">  

 $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });



function MostrarSuspenderEdit(id) {
    
  var url = "frmeditarsuspendido/"+id+""; 
 $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })
}  


 function MostrarEventual(id,comensal_id,tarjeta_id) {
  var url = "frmeventual/"+id+"/"+comensal_id+"/"+tarjeta_id+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })

}  

</script>
<script type="text/javascript">  
var EliminarSuspender= function(id)
{ 
     // ALERT JQUERY
    $.alertable.confirm("¿Está seguro de eliminar el registro?").then(function() {
  
      var route = "{{url('eliminarsuspender')}}/"+id+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(resul){
          cargarformulario(9);  
          
  
      },
      error: function(resul){
        demo.showSwal('basic');
      }
      });
        
  
    });

};
</script>


