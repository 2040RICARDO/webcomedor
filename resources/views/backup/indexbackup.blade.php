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
                                                     <h4 class="card-title">Lista de copias de seguridad</h4>      
                                               </div>
                                               <div class="col-sm-1 " >
                                                    <a href="javascript:void(0);" onclick="cargarbackup(1);" class="btn btn-primary btn-round btn-fab btn-fab-mini" title="" data-original-title="hola">
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
                                           <div class="col-sm-12">
                                         <section  id="contenido_list">
                                           <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline table-responsive" style="width: 100%;" role="grid" aria-describedby="datatables_info" width="100%" cellspacing="0">
                                            
                                            <thead>
                                                <tr role="row" style="background-color:#263238;">
                                                    <th class="sorting_asc " tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.3em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Número copia</th>
                                                    
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre copia de seguridad</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 193px;color: #fafafa;font-size:1.2em; ri" aria-sort="ascending" aria-label="Name: activate to sort column descending" align="left">Restaurar</th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Número de copia</th>
                                                    <th rowspan="1" colspan="1">Nombre copia de seguridad</th>
                                                    <th rowspan="1" colspan="1">Restaurar</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            {{-- */ $rh = 1; /*--}} 
                                             @foreach($backups as $file)
                                          {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  
                                                <tr role="row" class="odd">
                                                   
                                                    <td>{{ $rh }}</td>
                                                    <td>{{ $file['nombre']}}</td>


                                                    <td class="text-right" >
                                                        <a class="btn btn-xs btn-default"
                                                        href="{{ url('backup/download/'.$file['nombre']) }}"><i
                                                        class="fa fa-cloud-download"></i> Restaurar</a>
                                                        
                                                       </td>
                                                </tr>
                                                 {{-- */ $rh = $rh+1; /*--}} 
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

