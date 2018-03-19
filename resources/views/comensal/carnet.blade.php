
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
                       <h4 class="card-title">Carnetización</h4>      
                   </div>
                   <div class="col-sm-1">
                    <a href="cargar_carnet/2"  class="btn btn-primary btn-round btn-fab btn-fab-mini">
                       <i class="material-icons">contacts</i>
                   </a>

               </div>
           </div>
           <div class="toolbar">             
           </div>
           <div class="material-datatables">
            <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

             <div class="row">
                 <div class="col-sm-12">
                   <section  id="contenido_list">
                     <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline table-responsive" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">

                        <thead>
                            <tr role="row" style="background-color:#263238;">
                                <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre y Apellido</th>

                                <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Carrera</th>

                                <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Procedencia</th>

                                <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Género</th>

                                <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ficha</th>

                                <th    style="width: 193px;color: #fafafa;font-size:1.2em;">Imagen</th>


                                <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Nombre</th>
                                <th rowspan="1" colspan="1">Carrera</th>
                                <th rowspan="1" colspan="1">Procedencia</th>
                                <th rowspan="1" colspan="1">Género</th>
                                <th rowspan="1" colspan="1">Ficha</th>
                                <th rowspan="1" colspan="1">Imagen</th>
                                <th class="text-right" rowspan="1" colspan="1">Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>


                           @foreach($comensales as $comensal)
                           {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                           <tr role="row" class="odd">
                           <td ><b>{{$comensal->nombre." ".$comensal->apellido}}</b></td>
                             <td>{{ $comensal->carrerass }}</td>
                             <td>{{ $comensal->procedencia}}</td>
                             <td>{{$comensal->genero}}</td>
                             <td>{{$comensal->numero}}</td>
                             <td><a href="#"  OnClick='MostrarFoto({{$comensal->id}});'><img class="img-circle" src="imagenes/{{$comensal->imagen}}" alt="nofoto.jpg" style="width: 30px;height: 30px;"></a></td>

                             <td class="td-actions text-right">
                                <a href="{{url('carnete',$comensal->id)}}"  class="btn btn-info btn-round" data-original-title="" title="">
                                   <i class="material-icons">contacts</i>
                               </a>

                           </td>
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
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });



function carnetgeneral(){
    var url = "carnetgeneral"; 
    $("#contenido_principal").html($("#cargador_empresa").html());
    $.get(url,function(resul){
       // $("#contenido_principal").html(resul);
        
    });
} 
</script>






