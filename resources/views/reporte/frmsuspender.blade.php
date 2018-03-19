            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="#" action="http://demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html?#">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Reporte suspender</h4>
                                        
                                    </div>
                                    <br>
                                    <p class="category text-center">
                                       Realiza reporte de los comensales suspendidos vijentes no vijentes, o de manera general
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">dns</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Selecione un estado</label>
                                                <select name="country" class="form-control" id="rs">
                                                            <option disabled="disabled" selected="selected"></option>
                                                            <option value="1"> Vijentes</option>
                                                            <option value="2"> No vijentes </option>
                                                        </select>
                                            <span class="material-input"></span>


                                            </div>
                                        </div>
                                      <br>
                                        <div class="text-center">
                                        {!! link_to('#','Reporte General',['id'=>'rsuspendergeneral']) !!}
                                            
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
  
    $("#rs").on('change',function(e){
      var car_id =e.target.value;
      var url ="rsuspender/"+car_id+""; 

      $.get(url, function(resul){
        $("#contenido_list").html(resul);
      })
  });


$("#rsuspendergeneral").click(function()
{
 
var url ="rsuspendergeneral"; 

  $.get(url, function(resul){
      $("#contenido_list").html(resul);
  })
 
}); 
</script>
