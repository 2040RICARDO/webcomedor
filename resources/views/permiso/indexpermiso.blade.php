 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-icon" data-background-color="green">
          <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
          <div class="row">
           <div class="col-sm-10 col-md-offset-1">
             <h4 class="card-title">Lista de permisos registrados</h4>      
           </div>
           <div class="col-sm-1 " >

           </div>
         </div>
         <div class="toolbar">
           <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">      
         </div>
         <div class="material-datatables">
          <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

           <div class="row">
             <div class="col-sm-12">
               <section  id="contenido_list">
                 <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline table-responsive" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                  <thead>
                  <tr role="row" style="background-color:#263238;">
                      
                    <tr role="row" style="background-color:#263238;">
                      <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 60px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
                      <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre y Apellido</th>

                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Carrera</th>

                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ficha</th>

                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Motivo</th>
                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Observación</th>

                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Fecha inicio</th>
                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Fecha conclusión</th>
                      <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1">Id</th>
                      <th rowspan="1" colspan="1">Nombre</th>
                      <th rowspan="1" colspan="1">Carrera</th>
                      <th rowspan="1" colspan="1">Ficha</th>
                      <th rowspan="1" colspan="1">Motivo</th>
                      <th rowspan="1" colspan="1">Observación</th>
                      <th rowspan="1" colspan="1">Fecha inicio</th>
                      <th rowspan="1" colspan="1">Fecha conclusión</th>
                      <th class="text-right" rowspan="1" colspan="1">Acción</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($permisos as $permiso)
                    {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                    <tr role="row" class="odd">
                    <td>{{ $permiso ->id }}</td>
                     <td><b>{{$permiso->nombres." ".$permiso->apellidos}}</b></td>
                     <td>{{ $permiso ->carrerass }}</td>
                     <td>{{ $permiso->numeros}}</td>
                     <td>{{$permiso->motivo}}</td>
                      <td><textarea>{{$permiso->observacion}}</textarea></td>
                     <td>{{$permiso->fecha_inicio}}</td>
                     @if($permiso->fecha_final >= $date)
                     <td><span class="label label-success">{{$permiso->fecha_final}}</span></td>
                     @else
                     <td><span class="label label-danger">{{$permiso->fecha_final}}</span></td>
                     @endif
                     
                    @if($permiso->fecha_final >= $date)
                    <td class="td-actions text-right"> 
                     <a href="#" OnClick='MostrarPermisoEdit({{$permiso->id}});'  class="btn btn-success btn-simple"> <i class="material-icons" >edit</i>
                      </a>
                      <a href="#"></a>
                      </td>
                     @else
                     <td>
                     <a href="#"   class="btn btn-success btn-simple" disabled="disabled"> <i class="material-icons" >edit</i>
                      </a>
                      <a href="#"></a>
                      </td>
                     @endif

                      
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </section>
          </div></div></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>






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
        searchPlaceholder: "Búsqueda",
      }

    });
    $('.card .material-datatables label').addClass('form-group');
  });

  function MostrarPermisoEdit(id) {

    var url = "frmeditarpermiso/"+id+""; 
    $("#contenido_principal").html($("#cargador_empresa").html());
    $.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
  }  


  var EliminarPermiso= function(id)
  { 
     // ALERT JQUERY
     $.alertable.confirm("¿Está seguro de eliminar el registro?").then(function() {

      var route = "{{url('eliminarpermiso')}}/"+id+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(data){
          cargarformulario(11);

        }
      });


    });

   };
 </script>
