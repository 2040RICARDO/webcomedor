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
                                                     <h4 class="card-title">Lista control de asistencia de  : <b>{{ $fecha1 }}</b> al <b>{{ $fecha2 }}</b></h4>      
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
                            
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre y Apellido</th>
                                                    
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Ficha</th>
                                                    
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Comensal</th>
                                                    
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Carrera</th>
                                                    
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Asistencia</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Permiso</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Faltas</th>
                                                    
                                                    <th class="disabled-sorting text-right sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 138px;color: #fafafa;font-size:1.3em;" aria-label="Actions: activate to sort column ascending">Suspender</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                
                                                    <th rowspan="1" colspan="1">Nombre</th>
                                                    <th rowspan="1" colspan="1">Ficha</th>
                                                    <th rowspan="1" colspan="1">Comensal</th>
                                                    <th rowspan="1" colspan="1">Carrera</th>
                                                    <th rowspan="1" colspan="1">Asistencia</th>
                                                    <th rowspan="1" colspan="1">Permiso</th>
                                                    <th rowspan="1" colspan="1">Falta</th>
                                                    
                                                    <th rowspan="1" colspan="1">Suspender</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            @if ($t2 = $totalpermisos->count())
                                            @endif
                                        
                                        {{-- */ $rh = 0; /*--}} 
                                        @foreach($numeroasistencias as $asistenciass)
                                        {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  

                                        <tr  role="row" class="odd">
                                         <input type="hidden" id="id_tag" value="{{$asistenciass->tarjeta_id }}" name="tarjeta_id">
                                         <input type="hidden" id="id_co" value="{{$asistenciass->comensal_id }}" name="comensal_id">
                                         <td ><b>{{ $asistenciass->nombres }} {{ $asistenciass->apellidos }}</b></td>
                                         <td>{{ $asistenciass->numeros }}</td>
                                         <td>Titular</td>
                                         <td>{{ $asistenciass->carrerass }}</td>






                                         @if($t2 != 0)<!--if 1 principal-->
                              <!--if 1-->@if($totalpermisos[$rh]->comensal_id == $asistenciass->comensal_id)
                                         <td> {{ ($asistenciass->n_asistencia ) + ($totalpermisos[$rh]->totaldias) + $actividad }}</td>
                                         <td>{{ $totalpermisos[$rh]->totaldias }}</td>
                                        
                                     <!--if 2--> @if($totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias ) + $actividad == 0 )
                                         <td>0</td>
                                         @else
                                         <td>{{ $totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias ) + $actividad}}</td>
                                     <!--if 2--> @endif


                                     <!--if 3--> @if( $totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias) + $actividad >=  4) 
                                         <td class="sus"><a href="#" onclick='MostrarSuspender(<?= $asistenciass->comensal_id; ?>,<?= $asistenciass->tarjeta_id; ?>);' data-toggle='modal' data-target='#asistenciac' class="btn btn-success btn-simple"> <i class="material-icons" >edit</i></a></td>


                                         @else
                                                    <td></td> 
                                                                                     
                                      <!--if 3-->@endif 
                                         {{-- */ $t2 = $t2 - 1 ; /*--}} 
                                          {{-- */ $rh = $rh + 1; /*--}} 
                                         

                                        @else
                                   
                                        <td>{{ ($asistenciass->n_asistencia + $actividad )}}</td>  
                                         <td>0</td>
                                         @if($totalresul - ($asistenciass->n_asistencia  + $actividad ) == 0 )<!--if 3-->
                                         <td>0</td>
                                         @else
                                         <td>{{ $totalresul - ($asistenciass->n_asistencia + $actividad )}}</td>
                                         @endif<!--if 3-->

                                         @if( $totalresul - ($asistenciass->n_asistencia  + $actividad ) >=  4)<!--if 4-->
                                         <td class="sus"><a href="#" onclick='MostrarSuspender(<?= $asistenciass->comensal_id; ?>,<?= $asistenciass->tarjeta_id; ?>);' data-toggle='modal' data-target='#asistenciac' class="btn btn-success btn-simple"> <i class="material-icons" >edit</i></a></td>
                                         @else 
                                         <td></td>
                                         @endif <!--if 4-->
                             <!--if 1--> @endif








                                         @else
                                         <td>{{ ($asistenciass->n_asistencia + $actividad)}}</td>  
                                         <td>0</td>
                                         @if($totalresul - ($asistenciass->n_asistencia   + $actividad )  == 0 )<!--if 1-->
                                         <td>0</td>
                                         @else
                                         <td>{{ $totalresul - ($asistenciass->n_asistencia  + $actividad) }}</td>
                                         @endif<!--if 1-->

                                         @if( $totalresul - ($asistenciass->n_asistencia ) + $actividad >=  4)<!--if 2-->
                                         <td class="sus"><a href="#" onclick='MostrarSuspender(<?= $asistenciass->comensal_id; ?>,<?= $asistenciass->tarjeta_id; ?>);' data-toggle='modal' data-target='#asistenciac' class="btn btn-success btn-simple"> <i class="material-icons" >edit</i></a></td>
                                         @else
                                         <td></td>
                                         @endif <!--if 2-->

                                         @endif<!--if 1 principal-->
                                       </tr>
                                       @endforeach






































                                    @foreach($eventualcontrol as $eventual )
                                    <tr>
                                      <td ><b>{{ $eventual->nombre }} {{ $eventual->apellido }}</b></td>
                                         <td>{{ $eventual->numero }}</td>
                                         <td>Eventual</td>
                                         <td>{{ $eventual->carrerass }}</td>
                                        <td>{{ ($eventual->n_asistencia + $actividad )}}</td>  
                                         <td>0</td>
                                         
                                         <td>{{ $totalresul - ($asistenciass->n_asistencia  + $actividad )}}</td>
                                         <td></td>
                                        </tr>
                                      @endforeach




                                    </tbody>
                                        </table></div></div></div>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
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

</script>
