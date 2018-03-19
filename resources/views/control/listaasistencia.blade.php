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
                           <h4 class="card-title">Lista de asistencia de comensales</h4>      
                           </div>

                         </div>
                         <div class="toolbar">
                          <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">       
                        </div>
                        <div class="material-datatables">
                          <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">    
                          </div>
                          <div class="row">
                           <div class="col-sm-12">
                             <section  id="contenido_list">
                               <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline table-responsive" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">

                                <thead>
                                  <tr role="row" style="background-color:#263238;">
                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 100px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Id</th>
                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre y Apellido</th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Carrera</th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Tarjeta</th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ficha</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">menú</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Fecha asistencia</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th rowspan="1" colspan="1">Id</th>
                                    <th rowspan="1" colspan="1">Nombre</th>
                                    <th rowspan="1" colspan="1">Carrera</th>
                                    <th rowspan="1" colspan="1">Tarjeta</th>
                                    <th rowspan="1" colspan="1">Ficha</th>
                                    <th rowspan="1" colspan="1">menú</th>
                                    <th rowspan="1" colspan="1">Fecha Asistencia</th>

                                  </tr>
                                </tfoot>
                                <tbody>


                                 @foreach($asistencias as $asistencia)
                                 {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                                 <tr role="row" class="odd">
                                  <td>{{ $asistencia->id }}</td>
                                  <td ><b>{{$asistencia->nombre." ".$asistencia->apellido}}</b></td>
                                  <td>{{ $asistencia->carrerass}}</td>
                                  <td>{{ $asistencia->codigos }}</td>
                                  <td>{{ $asistencia->numero}}</td>
                                  <td>{{$asistencia->menu}}</td>
                                  <td>{{$asistencia->fecha_asistencia}}</td>   
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
                [100, 200, 500, -1],
                [100, 200, 500, "Todo"]
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






