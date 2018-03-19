                                    
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
                       <h4 class="card-title">Lista de publicaciones</h4>
                   </div>
                   <div class="col-sm-1 " >
                            <a href="javascript:void(0);" onclick="cargarformulario(35);" class="btn btn-primary btn-round btn-fab btn-fab-mini" title="" data-original-title="hola">
                             <i class="material-icons">add</i>
                             <div class="ripple-container"></div>
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
                     
                 </header>
                 <div class="panel-body">
                  <div class="table-responsive">
                    <table id="datatablest1" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">

                        <thead>
                            <tr role="row" style="background-color:#263238;">
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Usuario
                             </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Fecha publicación
                             </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">estado
                             </th>
                             <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Descripción
                             </th>



                             <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 124px;color: #fafafa;font-size:1.2em;" aria-label="Date: activate to sort column ascending" align="center">Archivo
                             </th>
                             <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>
                         </tr>
                     </thead>
                     <tfoot>
                        <tr>
                         <th rowspan="1" colspan="1">Id</th>
                         <th rowspan="1" colspan="1">Fecha publicación</th>
                         <th rowspan="1" colspan="1">Estado</th>
                         <th rowspan="1" colspan="1">Descripción</th>
                         <th rowspan="1" colspan="1">Archivo</th>
                         <th class="text-right" rowspan="1" colspan="1">Acción</th>
                     </tr>
                 </tfoot>
                 <tbody>
                   
                    {{--*/ @$codigo = str_replace(' ','&nbsp;', $tarjeta->codigo) /*--}}  
                    @foreach($publicaciones as $publicacion)
                    <tr role="row" class="odd">
                     <td tabindex="0" class="sorting_1">{{ $publicacion->nombre }}</td>
                     <td tabindex="0" class="sorting_1">{{ $publicacion->fechapublicacion }}</td>
                     @if($publicacion->estado == 1)
                     <td tabindex="0" class="sorting_1"><span class="label label-success">Visible</span></td>
                     @else
                     <td tabindex="0" class="sorting_1"><span class="label label-danger">No visible</span></td>
                     @endif
                     
                     <td tabindex="0" class="sorting_1"><textarea>{{ $publicacion->descripcion }}</textarea></td>

                     <td><a href="descargar_publicacion/<?=  $publicacion->id;   ?>"><button class="btn  btn-info btn-xs">Ver</button></a>  
                   
                   </td>
                     <td class="td-actions text-right">
                        <a href="#" OnClick='Mostrarpublicacion({{ $publicacion->id }});'  class="btn btn-success btn-simple"> <i class="material-icons" >edit</i>
                        </a>

                        <a href="#" onclick="Eliminarpublicacion('{{$publicacion->id}}')" class="btn btn-danger btn-simple"  rel="tooltip" data-original-title="" title=""><i class="material-icons">delete</i></a>

                    </td>
                </tr>
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


function Mostrarpublicacion(id) {
    
  var url = "frmeditarpublicacion/"+id+""; 
 $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })

}   

var Eliminarpublicacion = function(id)
{ 
    $.alertable.confirm("¿Está seguro de eliminar la publicación? ").then(function() {
  
      var route = "{{url('eliminarpublicacion')}}/"+id+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(resul){
          cargarformulario(34);  
      }
      });
    });
};
</script>