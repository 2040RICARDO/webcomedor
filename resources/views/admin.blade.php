<!DOCTYPE html>
<html class="perfect-scrollbar-on" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Bienestar Social</title>
    <!-- Canonical SEO -->
    {!!Html::style('assets/css/bootstrap.min.css')!!}
    <!--  Material Dashboard CSS    -->
    {!!Html::style('assets/css/material-dashboard.css')!!}
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    {!!Html::style('assets/css/demo.css')!!}
    <!--     Fonts and icons     -->
    {!!Html::style('assets/css/font-awesome.min.css')!!}
    {!!Html::style('assets/css/css.css')!!}
    {!!Html::style('assets/css/jquery.alertable.css')!!}
    
    
    
    {!!Html::script('assets/js/common.js')!!}
    {!!Html::script('assets/js/util.js')!!}
    {!!Html::script('assets/js/stats.js')!!}
   
   
    {!!Html::script('assets/js/jquery.alertable.min.js')!!}
    {!!Html::script('http://localhost:3000/socket.io/socket.io.js')!!} 
   


</head>

<body>
    <div class="wrapper">
        @include('componets.lateral')
        <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="6bade46a-65c6-de3c-ebfe-89035753ea74">
@include('componets.nabvar')
            <div class="content">
                <div class="container-fluid">
                   
                   <section class="content"  id="contenido_principal"> 
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header"  data-background-color="rose">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Comensales</p>
                                    <h3 class="card-title">{{ $c }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <i class="material-icons">date_range</i> Comensales Registrados
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">nfcr</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Tarjetas</p>
                                    <h3 class="card-title">{{ $t }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i>Tarjetas Registradas
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">rv_hookup</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Permisos</p>
                                    <h3 class="card-title">{{ $p }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Permisos Registrados
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Eventuales</p>
                                    <h3 class="card-title">{{ $e }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <i class="material-icons">date_range</i> Eventuales Registrados
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header"  data-background-color="rose">
                                    <i class="material-icons">assignment_late</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Suspendidos</p>
                                    <h3 class="card-title">{{ $s }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <i class="material-icons">date_range</i> Suspendidos Registrados
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">school</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Carreras</p>
                                    <h3 class="card-title">{{ $ca }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <i class="material-icons">date_range</i> Carreras Registrados
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">grain</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Actividades</p>
                                    <h3 class="card-title">{{ $ac }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <i class="material-icons">date_range</i> Actividades Registrados
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
<!--<a href="javascript:void(0);" onclick="cargarformulario(30);">Generar y Borrar</a>-->

                    </section>
                    
               @include('suspender.frmsuspender')
               @include('comensal.perfilcomensal')
              
             
               
                    
                    <div style="display: none;padding-right: 50px;margin-top: 200px;" id="cargador_empresa">
                        <br>
                         
                        <center><img src="assets/img/cargando.gif" align="middle" alt="cargador"><br><label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>&nbsp;<label style="color:#ABB6BA;">Realizando tarea solicitada ...</label></center>
                           
                          <br>
                         <hr style="color:#003" width="50%">
                         <br>
                       </div>

                        



                </div>
            </div>



            <footer class="footer">

            </footer>

        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 628px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 238px;"></div></div></div>
    </div>

{!!Html::script('assets/js/jquery-3.js')!!}
{!!Html::script('assets/js/jquery-ui.js')!!}
{!!Html::script('assets/js/bootstrap.js')!!}
{!!Html::script('assets/js/material.js')!!}
{!!Html::script('assets/js/perfect-scrollbar.js')!!}
<!-- Forms Validations Plugin -->
{!!Html::script('assets/js/jquery_003.js')!!}
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
{!!Html::script('assets/js/moment.js')!!}
<!--  Charts Plugin -->
{!!Html::script('assets/js/chartist.js')!!}
<!--  Plugin for the Wizard -->
{!!Html::script('assets/js/jquery.js')!!}
<!--  Notifications Plugin    -->
{!!Html::script('assets/js/bootstrap-notify.js')!!}
<!--   Sharrre Library    -->
{!!Html::script('assets/js/jquery_005.js')!!}
<!-- DateTimePicker Plugin -->
{!!Html::script('assets/js/bootstrap-datetimepicker.js')!!}
<!-- Vector Map plugin -->
{!!Html::script('assets/js/jquery-jvectormap.js')!!}
<!-- Sliders Plugin -->
{!!Html::script('assets/js/nouislider.js')!!}
<!--  Google Maps Plugin    -->
{!!Html::script('assets/js/js')!!}
<!-- Select Plugin -->
{!!Html::script('assets/js/jquery_002.js')!!}
<!--  DataTables.net Plugin    -->

{!!Html::script('assets/js/jquery.datatables.js')!!}
<!-- Sweet Alert 2 plugin -->
{!!Html::script('assets/js/sweetalert2.js')!!}
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
{!!Html::script('assets/js/jasny-bootstrap.js')!!}
<!--  Full Calendar Plugin    -->
{!!Html::script('assets/js/fullcalendar.js')!!}
<!-- TagsInput Plugin -->
{!!Html::script('assets/js/jquery_004.js')!!}
<!-- Material Dashboard javascript methods -->
{!!Html::script('assets/js/material-dashboard.js')!!}
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
{!!Html::script('assets/js/demo.js')!!}
{!!Html::script('assets/js/jquery.alertable.min.js')!!}
{!!Html::script('assets/js/bootstrap-datepicker.js')!!}
{!!Html::style('assets/css/bootstrap-datepicker.css')!!}
  

    <script type="text/javascript">
 

    //FUNCION QUE CARGA LOS FORMULARIOS Y VISTAS//////////////////////////////////////////////////////////////////////////////////    
function cargarformulario(arg){

		if(arg==1){ var url = "indexcomensal"; }
		if(arg==2){ var url = "indextarjeta"; }
        if(arg==3){ var url = "frmregistrocomensal"; }
        if(arg==4){ var url = "frmregistrotarjeta"; }
        if(arg==5){ var url = "carnet";}
        if(arg==6){ var url = "frmregistropermiso";}
        if(arg==7){ var url = "indexasistencia";}
        if(arg==8){ var url = "frmfecha";}
        if(arg==9){ var url = "indexsuspendido";}
        if(arg==10){ var url = "frmsuspender";}
        if(arg==11){ var url = "indexpermiso";}
        if(arg==12){ var url = "indexeventual";}
        if(arg==13){ var url = "indexreporte";}
        if(arg==14){ var url = "indexcarrera";}
        if(arg==15){ var url = "frmregistrocarrera";}
        if(arg==16){ var url = "frmcomensal";}
        if(arg==17){ var url = "frmeventual";}
        if(arg==18){ var url = "frmpermiso";}
        if(arg==19){ var url = "frmsuspender";}
        if(arg==20){ var url = "frmtarjeta";}
        if(arg==21){ var url = "frmeventualnuevo";}
        if(arg==22){ var url = "frmlistacontrol";}
        if(arg==23){ var url = "indexactividad";}
        if(arg==24){ var url = "frmregistroactividad";}
        if(arg==25){ var url = "verificartarjeta";}
        if(arg==26){ var url = "listaasistencia";}
        if(arg==27){ var url = "indexbackup";}
        if(arg==30){ var url = "generarborrar";}
        if(arg==28){ var url = "frmlistaasistencia";}
        
        if(arg==32){ var url = "acerca";}
        if(arg==33){ var url = "acerca1";}
        if(arg==34){ var url = "publicacion";}
        if(arg==35){ var url = "frmregistropublicacion";}
        if(arg==36){ var url = "register";}
		$("#contenido_principal").html($("#cargador_empresa").html());
		$.get(url,function(resul){
        $("#contenido_principal").html(resul);
        
    });
}  


function cargarbackup(arg){
        if(arg==1){ var url = "backupcreate"; }
        $("#contenido_principal").html($("#cargador_empresa").html());
        $.get(url,function(resul){
        cargarformulario(27);
    });
}  



 
    
    
    
//FUNCION QUE RETORNA LA FOTO PARA LA EDICION ///////////////////////////////////////////////////////////////////////////////   
function MostrarFoto(id) {
  var url = "photo/"+id+""; 
  $("#capa_para_edicion").html($("#cargador_empresa").html());
  $.get(url,function(resul){
      $("#contenido_principal").html(resul);
  })

}
    
    
    


   
    


//FUNCION  QUE ATRAPA LOS DATOS Y REGISTRA COMENSAL TARJETA Y ACTUALIZA FOTO/////////////////////////////////////////////////    
$(document).on("submit",".frmentrada",function(e){
       e.preventDefault();
        $('html, body').animate({scrollTop: '0px'}, 200);
    
        var formu=new FormData($(".frmentrada")[0]);
    
        var quien=$(this).attr("id");
        if(quien=="f_nuevo_usuario"){ var varurl="agregar_nuevo_usuario";var token = $("#token").val(); var divresul="notificacion_resul_fanu"; }
        if(quien=="f_nuevo_tarjeta"){ var varurl="agregar_nuevo_tarjeta";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }
       if(quien=="f_nuevo_foto"){ var varurl="photoproduct";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }
       if(quien=="f_nuevo_foto_eventual"){ var varurl="photo_eventual";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }
    if(quien=="f_nuevo_permiso"){ var varurl="agregar_nuevo_permiso";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }
    if(quien=="f_nueva_fecha"){ var varurl="fechacontrol";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

    if(quien=="f_nuevo_suspendermodal"){ var varurl="agregar_nuevo_suspendermodal";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

    if(quien=="f_nuevo_eventual"){ var varurl="agregar_nuevo_eventual";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }
    if(quien=="f_nuevo_eventualnuevo"){ var varurl="agregar_nuevo_eventualnuevo";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

if(quien=="f_nuevo_carrera"){ var varurl="agregar_nuevo_carrera";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }


    if(quien=="f_reporte_comensal"){ var varurl="agregar_reporte_comensal";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }


    if(quien=="f_lista_suspender"){ var varurl="listanumerosuspender";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

    if(quien=="f_lista_nombre_suspender"){ var varurl="listanombresuspender";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

if(quien=="f_nuevo_suspendido"){ var varurl="agregar_nuevo_suspendido";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

if(quien=="f_nuevo_actividad"){ var varurl="agregar_nuevo_actividad";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

if(quien=="f_nuevo_restaurar"){ var varurl="restaurar";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }

if(quien=="f_nueva_publicacion"){ var varurl="agregar_nueva_publicacion";var token = $("#token").val(); var divresul="notificacion_resul_feu"; }
    

    
        $("#"+divresul+"").html($("#cargador_empresa").html());
              $.ajax({
                    url : varurl,
                    headers:{'X-CSRF-TOKEN':token},
                    type: "POST",
                    datatype:'json',
                    data : formu,
                    contentType: false,
                    processData: false,
                  
                  
                  
                    success : function(resul){
                        $("#"+divresul+"").html(resul);
                        if(quien=="f_nuevo_usuario"){


                        if(resul == 1){
                           cargarformulario(1);
                           demo.showSwal('success-message');
                         }if(resul == 2){
                            demo.showSwal('custom-html');
                         }
                        
                        }
                        if(quien=="f_nuevo_tarjeta"){
                        cargarformulario(2);
                        demo.showSwal('success-message');
                         $('#'+quien+'').trigger("reset");
                        }
                        if(quien=="f_nuevo_foto"){
                       cargarformulario(1);
                         demo.showSwal('auto-close');
                        }
                        if(quien=="f_nuevo_foto_eventual"){
                       cargarformulario(12);
                         demo.showSwal('auto-close');
                        }
                       if(quien=="f_nuevo_permiso"){
                       cargarformulario(2);
                       demo.showSwal('success-message');
                         $('#'+quien+'').trigger("reset");
                        }
                        if(quien=="f_nueva_fecha"){
                       $("#contenido_principal").html(resul);
                         $('#'+quien+'').trigger("reset");
                        }
                        if(quien=="f_nuevo_suspendermodal"){
                         if(resul == 1){
                            $("#asistenciac").modal('toggle');
                         }if(resul == 2){
                            demo.showNotification('bottom','right');
                         }
                        }
                        if(quien=="f_nuevo_eventual"){
                         if(resul == 1){
                         cargarformulario(9);
                           demo.showSwal('success-message');
                         }if(resul == 2){
                            demo.showSwal('custom-html');
                         }
                        }
                        if(quien=="f_nuevo_eventualnuevo"){
                        if(resul == 1){
                         cargarformulario(12);
                           demo.showSwal('success-message');
                         }if(resul == 2){
                            demo.showSwal('custom-html');
                         }
                        }
                        if(quien=="f_nuevo_carrera"){
                         cargarformulario(14);
                         
                         demo.showSwal('success-message');
                        }

                        if(quien=="f_nuevo_suspendido"){
                           cargarformulario(2);
                           demo.showSwal('success-message');
                         $('#'+quien+'').trigger("reset");
                        }
                         if(quien=="f_nuevo_actividad"){
                           cargarformulario(23);
                           demo.showSwal('success-message');
                         $('#'+quien+'').trigger("reset");
                        }
                        if(quien=="f_nueva_publicacion"){
                            if (resul == 1) {
                                cargarformulario(34);
                           demo.showSwal('success-message');
                         $('#'+quien+'').trigger("reset");
                            }
                           
                        }
                    },

                    error: function(data) {
                      $("#msj-error").fadeIn();
                     
                     var lista_errores="";
                      $.each(data.responseJSON,function(index, value) {
                             lista_errores+='<li style="color:#263238;" >'+value+'</li>';   
                      })
                     $("#msj").html(lista_errores)

                    }
                  
                });

});    
        

//FUNCION QUE ACTUALIZA LOS DATOS DEL COMENSAL/////////////////////////////////////////////////////////////////////////////////  

    
        
    
//FUNCION QUE ACTUALIZA LOS DATOS DE LA TARJETA//////////////////////////////////////////////////////////////////////////////// 

</script>



</body><!--   Core JS Files   --></html>