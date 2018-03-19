            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="#" action="http://demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html?#">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Reporte comensal</h4>
                                        
                                    </div>
                                    <br>
                                    <p class="category text-center">
                                       Realiza reporte de los comensales por carrera ,convenio o de manera general
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Reporte carrera o convenio</label>
                                                {!! Form::select('rc',['' => '']+$carreras,null, array('class' => 'form-control', 'id' => 'rc')) !!}
                                            <span class="material-input"></span>


                                            </div>
                                        </div>
                                      <br>
                                        <div class="text-center">
                                        {!! link_to('#','Reporte General',['id'=>'rcomensalgeneral']) !!}

                                        
                                         <br><hr>
                                          
                                        {!! link_to('#','Reporte por ficha',['id'=>'rcomensalnumero']) !!}
                                            
                                        </div>
                                        
                                  
                                        
                                    </div>
                                    <div class="footer text-center">

                                         <a href="javascript:void(0);" onclick="cargarformulario(13);" class="btn btn-danger" rel="tooltip" data-placement="bottom" >
                                            Regresar
                                        </a>
        
         
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


<script type="text/javascript">
  
    $("#rc").on('change',function(e){
      var car_id =e.target.value;
      var url ="rcomensalc/"+car_id+""; 

      $.get(url, function(resul){
        $("#contenido_list").html(resul);
      })
  });


$("#rcomensalgeneral").click(function()
{
 
var url ="rcomensalgeneral"; 

  $.get(url, function(resul){
      $("#contenido_list").html(resul);
  })
 
}); 

$("#rcomensalnumero").click(function()
{
 
var url ="rcomensalnumero"; 

  $.get(url, function(resul){
      $("#contenido_list").html(resul);
  })
 
});
</script>
