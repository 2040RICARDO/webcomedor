                                    
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                  <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                  <div class="row">
                     <div class="col-sm-10 col-md-offset-1">
                       <h4 class="card-title">Lista de tarjetas RFID registrados</h4>
                   </div>
                   <div class="col-sm-1" >
                    <a href="javascript:void(0);" onclick="cargarformulario(4);" class="btn btn-primary btn-round btn-fab btn-fab-mini">
                       <i class="material-icons">add</i>
                   </a>
               </div>
           </div>
           <div class="toolbar">
           </div>
           <div class="material-datatables">
            <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
             <div class="row">

              <div class="col-sm-12">
                <section class="panel">
                  <header class="panel-heading">
                     <h3>Nuevas tarjetas : <a href="javascript:void(0);" onclick="cargarformulario(25);" style="font-size: 90%;color: #dd2c00;"> Verificar</a> </h3>
                 </header>
                 <div class="panel-body">
                  <div class="table-responsive">
                    <table id="datatablest2" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                        <thead>
                            <tr role="row" style="background-color:#263238;">
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id
                             </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Código
                             </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Comentario
                             </th>



                             <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 124px;color: #fafafa;font-size:1.2em;" aria-label="Date: activate to sort column ascending" align="center">Fecha de registro
                             </th>
                             <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>
                         </tr>
                     </thead>
                     <tfoot>
                        <tr>
                         <th rowspan="1" colspan="1">Id</th>
                         <th rowspan="1" colspan="1">Código</th>
                         <th rowspan="1" colspan="1">Comentario</th>
                         <th rowspan="1" colspan="1">Fecha de Registro</th>
                         <th class="text-right" rowspan="1" colspan="1">Acción</th>
                     </tr>
                 </tfoot>
                 <tbody>
                    @foreach($tarjetas as $tarjeta)
                    {{--*/ @$codigo = str_replace(' ','&nbsp;', $tarjeta->codigo) /*--}}  
                    @if($tarjeta->estado == 0)  
                    <tr role="row" class="odd">
                     <td tabindex="0" class="sorting_1">{{$tarjeta->id}}</td>
                     <td tabindex="0" class="sorting_1">{{$tarjeta->codigo}}</td>
                     <td tabindex="0" class="sorting_1"><textarea>{{$tarjeta->comentario}}</textarea></td>

                     <td>{{$tarjeta->fecha_registro}}</td>
                     <td class="td-actions text-right">
                        <a href="#" OnClick='Mostrartarjeta({{$tarjeta->id}});'  class="btn btn-success btn-simple"> <i class="material-icons" >edit</i>
                        </a>

                        <a href="#" onclick="EliminarTarjeta('{{$tarjeta->id}}','{{$codigo}}')" class="btn btn-danger btn-simple"  rel="tooltip" data-original-title="" title=""><i class="material-icons">delete</i></a>

                    </td>
                </tr>
                @endif
                @endforeach       
            </tbody>
        </table>
    </div>
</div>
</section>
</div>








<div class="col-sm-6">
 <section class="panel">
  <header class="panel-heading">
     <h3>Tarjetas activas y permisos</h3>
 </header>
 <div class="panel-body">
  <div class="table-responsive">
     <table id="datatablest1" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
        <thead>
            <tr role="row" style="background-color:#263238;">
            <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 30px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id
                </th>
                <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Código
                </th>
                <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 283px;color: #fafafa;font-size:1.2em;" aria-label="Position: activate to sort column ascending">Nombre
                </th>
                <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 146px;color: #fafafa;font-size:1.2em;" aria-label="Office: activate to sort column ascending">Estado
                </th>
                <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
            <th rowspan="1" colspan="1">Id</th>
                <th rowspan="1" colspan="1">Código</th>
                <th rowspan="1" colspan="1">Nombre</th>
                <th rowspan="1" colspan="1">Estado</th>
                <th class="text-right" rowspan="1" colspan="1">Acción</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach($tarjetas as $tarjeta)
            {{--*/ @$codigo = str_replace(' ','&nbsp;', $tarjeta->codigo) /*--}}
            @if($tarjeta->estado == 1 || $tarjeta->estado == 3)  
            <tr role="row" class="odd">
            <td tabindex="0" class="sorting_1">{{$tarjeta->id}}</td>
                <td tabindex="0" class="sorting_1">{{$tarjeta->codigo}}</td>
                <td><b>{{$tarjeta->comensal->nombre}}  {{$tarjeta->comensal->apellido}}</b></td>
                @if($tarjeta->estado == 1)
                <td><span class="label label-success">activo</span></td>
                @else
                <td><span class="label label-info">permiso</span></td>
                @endif
                @if($tarjeta->estado == 1)
                <td class="td-actions text-right">
                    <a href="#" OnClick='Mostrartarjeta({{$tarjeta->id}});'  class="btn btn-success btn-simple"> <i class="material-icons" >edit</i>
                    </a>
                    <a href="#" ></a>
                </td>
                @else
                <td class="td-actions text-right">
                    <a href="#"  class="btn btn-success btn-simple" disabled="disabled"> <i class="material-icons" >edit</i>
                    </a>

                    <a href="#"></a>
                </td>
                @endif
            </tr>
            @endif
            @endforeach       
        </tbody>

    </table>
</div>
</div>
</section>
</div>







<div class="col-sm-6 ">
  <section class="panel">
      <header class="panel-heading">
         <h3>Tarjetas bloquedas y suspendidas</h3>
     </header>
     <div class="panel-body">
      <div class="table-responsive">
         <table id="datatablest3" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
            <thead>
                <tr role="row" style="background-color:#263238;">
                <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 30px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id
                    </th>
                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Código
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 283px;color: #fafafa;font-size:1.2em;" aria-label="Position: activate to sort column ascending">Nombre
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 146px;color: #fafafa;font-size:1.2em;" aria-label="Office: activate to sort column ascending">Estado
                    </th>

                 
                    <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                <th rowspan="1" colspan="1">Id</th>
                    <th rowspan="1" colspan="1">Código</th>
                    <th rowspan="1" colspan="1">Nombre</th>
                    <th rowspan="1" colspan="1">Estado</th>
                    <th class="text-right" rowspan="1" colspan="1">Acción</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach($tarjetas as $tarjeta)
                {{--*/ @$codigo = str_replace(' ','&nbsp;', $tarjeta->codigo) /*--}}  
                @if($tarjeta->estado == 2 || $tarjeta->estado == 4)
                <tr role="row" class="odd">
                <td tabindex="0" class="sorting_1">{{$tarjeta->id}}</td>
                    <td tabindex="0" class="sorting_1">{{$tarjeta->codigo}}</td>
                    <td><b>{{$tarjeta->comensal->nombre}} {{$tarjeta->comensal->apellido}}</b></td>
                    @if($tarjeta->estado == 2)
                    <td><span class="label label-danger">Bloqueado</span></td>
                    @else
                    <td><span class="label label-warning">suspendido</span></td>
                    @endif


                    @if($tarjeta->estado == 2)
                    <td class="td-actions text-right">
                        <a href="#" OnClick='Mostrartarjeta({{$tarjeta->id}});'  class="btn btn-success btn-simple"> <i class="material-icons" >edit</i>
                        </a>

                        <a href="#"></a>

                    </td>
                    @else
                    <td class="td-actions text-right">
                        <a href="#"  class="btn btn-success btn-simple" disabled="disabled"> <i class="material-icons" >edit</i>
                        </a>

                        <a href="#"></a>

                    </td>
                    @endif
                </tr>
                @endif
                @endforeach       
            </tbody>
        </table>
    </div>
</div>
</section>
</div>


</div>




</div>
</div>
</div>

</div>

</div>

</div>

</div>

<script type="text/javascript">

    
function Mostrartarjeta(id) {
    
  var url = "frmeditartarjeta/"+id+""; 
 $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })

}   
    



function Mostrartarjeta1(id) {
    
  var url = "frmeditartarjeta1/"+id+""; 
 $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })

} 


var EliminarTarjeta = function(id,codigo)
{ 
     // ALERT JQUERY
    $.alertable.confirm("¿Está seguro de eliminar el registro?").then(function() {
  
      var route = "{{url('eliminartarjeta')}}/"+id+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(data){
        cargarformulario(2);
      }
      });
        
  
    });

};
    
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatablest1').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10,25,50, -1],
                [10,25,50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Búsqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });
    $(document).ready(function() {
        $('#datatablest2').DataTable({
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
    $(document).ready(function() {
        $('#datatablest3').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10,25,50, -1],
                [10,25,50, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Búsqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });
</script>