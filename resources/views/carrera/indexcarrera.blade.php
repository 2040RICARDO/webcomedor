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
                           <h4 class="card-title">Lista de carreras y convenios registrados</h4>      
                           </div>
                           <div class="col-sm-1 " >
                            <a href="javascript:void(0);" onclick="cargarformulario(15); " class="btn btn-primary btn-round btn-fab btn-fab-mini" title="" data-original-title="hola">
                             <i class="material-icons">add</i>
                             <div class="ripple-container"></div>
                           </a>
                         </div>
                       </div>
                       <div class="toolbar">
                        <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">       
                      </div>
                      <div class="material-datatables">
                        <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                         <div class="row">


                         </div>
                         <div class="row">
                           <div class="col-sm-12">
                             <section  id="contenido_list">
                               <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline table-responsive" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">

                                <thead>
                                  <tr role="row" style="background-color:#263238;">
                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 100px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Universidad</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Área</th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Carrera</th>




                                    <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.2em;" aria-label="Actions: activate to sort column ascending">Acción</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">Universidad</th>
                                    <th rowspan="1" colspan="1">Área</th>
                                    <th rowspan="1" colspan="1">Carrera</th>


                                    <th class="text-right" rowspan="1" colspan="1">Acción</th>
                                  </tr>
                                </tfoot>
                                <tbody>


                                 @foreach($carreras as $carrera)
                                 {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                                 <tr role="row" class="odd">

                                  <td>{{$carrera->id}}</td>
                                  <td>{{ $carrera->universidad}}</td>
                                  <td>{{ $carrera->area}}</td>
                                  <td>{{$carrera->carrera}}</td>


                                  <td class="td-actions text-right">

                                    <a href="#" OnClick='Mostrarcarrera({{$carrera->id}});'  class="btn btn-success btn-simple"> <i class="material-icons" >edit</i>
                                    </a>
                                    <a href="#" onclick="EliminarCarrera('{{$carrera->id}}')" class="btn btn-danger btn-simple"  rel="tooltip" data-original-title="sddsd" title=""><i class="material-icons">delete</i></a>
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
  function Mostrarcarrera(id) {
    
  var url = "frmeditarcarrera/"+id+""; 
 $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })

}
</script>


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
</script>






<!--//FUNCION ELIMINAR COMENSAL////////////////////////////////////////////////////////////////////////////////////////////-->  
<script type="text/javascript">  
var EliminarCarrera = function(id)
{ 
     // ALERT JQUERY
    $.alertable.confirm("¿Está seguro de eliminar el registro?").then(function() {
  
      var route = "{{url('eliminarcarrera')}}/"+id+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(resul){
          cargarformulario(14);  
      }
      });
        
  
    });

};
</script>


<script type="text/javascript">
  $("#carp").on('change',function(e){
      var cat_id =e.target.value;
      var url ="list/"+cat_id+""; 

      $.get(url, function(resul){
        $("#contenido_list").html(resul);
      })
  });
</script>
