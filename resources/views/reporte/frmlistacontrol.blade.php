            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form id="f_lista_suspender"  method="post" enctype="multipart/form-data" action= "/listanumerosuspender"  class="form-horizontal frmentrada" >
                            <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Reporte Control por numeros</h4>
                                        
                                    </div>
                                    <br>
                                    <p class="category text-center">
                                       Ingrese el rago de fecha del control 
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">today</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                
                                                <input type="text" class="form-control datepickercc" id="" name="fecha1" value="">
                                            <span class="material-input"></span>


                                            </div>
                                        </div>

                                         <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">today</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                              
                                                <input type="text" class="form-control datepickercc" id="" name="fecha2" value="">
                                            <span class="material-input"></span>


                                            </div>
                                        </div>            
                                    </div>
                                    <div class="footer text-center">
                                        
                                         <a href="javascript:void(0);" onclick="cargarformulario(13);" class="btn btn-danger" rel="tooltip" data-placement="bottom" >
                                            Regresar
                                        </a>
                                        <button type="submit" class="btn btn-finish btn-fill btn-primary btn-wd" style="background-color: #263238;">Enviar</button>
                    </div>
                                </div>
                            </form>


                                  






                        </div>
                    </div>
                </div>
            </div>



   <script type="text/javascript">
     $('.datepickercc').datepicker({
  format: "yyyy/mm/dd",
        language: "es",
        color: 'red',
 }) .on('changeDate', function(ev){ $('.datepickercc').datepicker('hide'); });
  </script>
  