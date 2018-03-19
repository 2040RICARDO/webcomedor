
<!DOCTYPE html>
<html>
<head>
  <title></title>
  
<link rel="stylesheet" type="text/css" href="rfid/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="rfid/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="rfid/css/bootstrap.min.css.map">
 <script type="text/javascript" src="rfid/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="rfid/js/jquery.min.js"></script>

  {!!Html::script('http://localhost:3000/socket.io/socket.io.js')!!}
    <script>
    var socket = io.connect( 'http://localhost:3000' );
    socket.on('leer',function(leer){
      document.getElementById("CodigoTag").value =''; 
        document.getElementById("CodigoTag").value += leer;
        
            $.ajax({
                    url: "{{ url('control')}}",
                    data: "leer="+leer+"&_token={{ csrf_token()}}",
                    dataType: 
                    "json",
                    method: "POST",
                    success: function(data)
                    {
                if(data == 1 || data == 2 || data == 3 || data == 4 || data == 5 || data == 6 || data == 7 || data == 8 ||  data == 9 || data == 10 ){
                      if(data == 1){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">No registrado en el sistema</div>');
                      }else if(data == 2){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-warning">No asignado</div>');     
                      }else if(data == 3){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                         $('.estadoo').html('<div class="alert alert-success">Ya almorzo</div>');
                      }else if(data == 4){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Tarjeta Bloqueada</div>');
                      }else if(data == 5){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-info">Permiso concluido vuelva a pasar la tarjeta</div>');
                      }else if(data == 6){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-info">Permiso</div>');
                      }else if(data == 7){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-info">Ssuspencion concluido vuelva a pasar la tarjeta</div>');
                      }
                      else if(data == 8){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Tarjeta suspendido</div>'); 
                      }else if(data == 9){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Fuera de horario</div>'); 
                      }else if(data == 10){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                         $('.estadoo').html('<div class="alert alert-success">Ya ceno</div>');
                      }
                       $('.imagenn').html('<img src="{{ asset('assets/img/') }}/'+'usuariorestringido.jpg'+'" style="width: 190px;height: 305px;">');
                       $("#nombree").html('no definido');
                       $("#fichaa").html('no definido');
                       $("#codigoo").html('no definido');
                       $("#menuu").html('no definido');
                       $("#fechaa").html('no definido');  
                      }
                      else{
                      $('.sonidoo').html('<audio src="assets/audio/activo.mp3" autoplay="autoplay"></audio>');
                      $('.estadoo').html('');
                      $('.chat-box').prepend('<tr><td>'+data['id']+'</td><td>'+data['nombre']+' '+data['apellido']+'</td><td>'+data['ficha']+'</td><td>'+data['codigo']+'</td><td>'+data['menu']+'</td><td>'+data['fecha_asistencia']+'</td></tr>');
                       $('.imagenn').html('<img src="{{ asset('imagenes/') }}/'+data['imagen']+'" style="width: 190px;height: 305px;">');
                       $("#nombree").html(data['nombre']+" "+data['apellido']);
                       $("#fichaa").html(data['ficha']);
                       $("#codigoo").html(data['codigo']);
                       $("#menuu").html(data['menu']);
                       $("#fechaa").html(data['fecha_asistencia']);  

                      }
                    },
                    error: function(data) {
                    },
                });
            });
    </script>

<script type="text/javascript">
 
function crearReloj() {
var ahora = new Date();
var h = ahora.getHours();
var m = ahora.getMinutes();
var s = ahora.getSeconds();
var dn="AM";
 
if (h>12){
dn="PM";
h=h-12;
}
 
m = corregirHora(m);
s = corregirHora(s);
document.getElementById('reloj').innerHTML = h+":"+m+":"+s+ " " + dn;
var t = setTimeout(function(){crearReloj()},1000);
}
 
function corregirHora(i) {
if (i<10) {i = "0" + i};
return i;
}
 
</script>

<style type="text/css">

  .profile-master{
      border: 1px solid #DCEBF7;
      display: table;
      width: 98%;
      width: calc(100% - 24px);
      margin: 0 auto;

  }


  .profile{
    display: table;width: 98%;width: calc(100% - 24px);margin: 0 auto;
  }
  .user-profile{
    border-top: none;text-align: right;padding: 6px 10px 6px 4px;font-weight: 400;color: #667E99;background-color: transparent;border-top: 1px dotted #D5E4F1;display: table-cell;width: 110px;vertical-align: middle;
  }
  .profile-name{
    display: table-cell;padding: 6px 4px 6px 6px;border-top: 1px dotted #D5E4F1;
  }
  .img-foto{
    border: 1px solid #CCC;background-color: #FFF;padding: 4px;display: inline-block;max-width: 100%;webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;box-shadow: 1px 1px 1px rgba(0,0,0,.15);
  }

.space{
  max-height: 1px;
min-height: 1px;
overflow: hidden;
margin: 12px 0;
margin: 12px 0 11px;
}
</style>
</head>
<body onLoad="crearReloj()" >
<header>
  <nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand">{{ $fecha }}</span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
      <h1></h1>
        <h1 id="reloj" style="font-style: arial; color: #fff; margin-right: 20px;"></h1>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<div class="container">
  <div class="row">
  <div class="col-md-2"></div>




  <div class="col-md-2">
    <form id="f_asistencia_eventual"  method="post" enctype="multipart/form-data" action= "/asistencia_eventual"  class="form-horizontal frmeventual">
     <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
      <div class="form-group">
        <input type="text" name="ficha" id="eventual" class="form-control" placeholder="Eventuales">
      </div>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </form>
    




    <div class="col-md-2">
    <form id="f_numero"  method="post" enctype="multipart/form-data" action= "/numero"  class="form-horizontal frmentrada">
     <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
      <div class="form-group">
     
        <input type="text" name="ficha" id="olvidado" class="form-control" placeholder="Olvidados">
       
      </div>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </form>
    <div class="col-md-1" >
    <a class="btn btn-warning" type="button" href="indexasistencia">refresh</a>
      
    </div>
  </div>


<section class="content"  id="contenido_control">
<div class="panel panel-success">
<br>
<div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-3">
      <div class="form-group">
        <input type="text" name="" id="CodigoTag" class="form-control"  placeholder="Código">
      </div>
    </div>
    <div class="col-md-2">
      <a href="admin" class="btn btn-primary">Panel de control</a>
    </div>
     
</div>
<div class="panel-body">
<div class="row">





<div class="col-md-3"> 
    <span class="img-foto" >
      <div class="imagenn">
       <img src="assets/img/avatar.jpe" class="img-responsive" style="width: 190px;height: 305px;">
      </div>
    </span>
</div>
  <div class="col-md-9">
  <div class="profile-master">
  <div class="space"></div>
    <div class="sonidoo"  style="display: table-row; ">
    </div>
  <div class="profile"  >
      <div class="estadoo"  style="display: table-row; ">
      </div>
    </div>
    <div class="profile"  >
      <div class="" style="display: table-row;">
        <div class="user-profile" >Nombre</div>
        <div class="profile-name">
          <span id="nombree">null</span>
        </div>
      </div>
    </div>
    <div class="profile"  >
      <div class="" style="display: table-row;">
        <div class="user-profile" >Número de Ficha</div>
        <div class="profile-name">
          <span id="fichaa">null</span>
        </div>
      </div>
    </div>
    <div class="profile"  >
      <div class="" style="display: table-row;">
        <div class="user-profile" >Código</div>
        <div class="profile-name">
          <span id="codigoo">null</span>
        </div>
      </div>
    </div>
    <div class="profile"  >
      <div class="" style="display: table-row;">
        <div class="user-profile" >Menú</div>
        <div class="profile-name">
          <span id="menuu">null</span>
        </div>
      </div>
    </div>
    <div class="profile"  >
      <div class="" style="display: table-row;">
        <div class="user-profile" >Fecha</div>
        <div class="profile-name">
          <span id="fechaa">null</span>
        </div>
      </div>
    </div>
    <!--<div class="profile"  >
      <div class="" style="display: table-row;">
        <div class="user-profile" >Hora</div>
        <div class="profile-name">
          <span id="horaa">null</span>
        </div>
      </div>
    </div>-->
    
   </div>
  </div>
</div>
</div>
</div>


  
  <table id="myTabla" class="table table-responsive table-bordered">
  <thead>
  <tr class="success">
    <td>id</td>
    <td>Nombre</td>
    <td>Ficha</td>
    <td>Código</td>
    <td>Menú</td>
    <td>Fecha asistencia</td>
  </tr>
  </thead>
  <tbody class="chat-box">
  @foreach($asistencia as $control)
    
    <tr>
      @if($control->eventual_id > 0)
      <td>{{ $control->id }}</td>
      <td>{{ $control->eventual->nombre}} {{ $control->eventual->apellido}}</td>
      <td>{{ $control->eventual->numero }}</td>
      <td>Eventual</td>
      <td>{{ $control->menu }}</td>
      <td>{{ $control->fecha_asistencia }}</td>
      @else
      <td>{{ $control->id }}</td>
      <td>{{ $control->comensal->nombre}} {{ $control->comensal->apellido}}</td>
      <td>{{ $control->comensal->numero }}</td>
      <td>{{ $control->tarjeta->codigo}}</td>
      <td>{{ $control->menu }}</td>
      <td>{{ $control->fecha_asistencia }}</td>
      @endif        

   </tr>
  
  @endforeach 
  </tbody>
</table>
</section>

</div>
</div>

<link rel="stylesheet" type="text/css" href="assets/datatables/jquery.dataTables.min.css"/>
 
{!!Html::script('assets/js/jquery.datatables.js')!!}




  <script type="text/javascript">




 $(document).ready(function() {
        $('#myTabla').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [100, 300, 500, -1],
                [100, 300, 500, "Todo"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Busqueda",
            }

        });
        $('.card .material-datatables label').addClass('form-group');
    });

</script>


<script type="text/javascript">
  $(document).on("submit",".frmentrada",function(e){

    e.preventDefault();
        $('html, body').animate({scrollTop: '0px'}, 200);
    
        var formu=new FormData($(".frmentrada")[0]);

        var quien=$(this).attr("id");
        if(quien=="f_numero"){ var varurl="numero";var token = $("#token").val(); }
        $.ajax({
                    url : varurl,
                    headers:{'X-CSRF-TOKEN':token},
                    type: "POST",
                    datatype:'json',
                    data : formu,
                    contentType: false,
                    processData: false,
                success: function(data)
                    {
                if(data == 1 || data == 2 || data == 3 || data == 4 || data == 5 || data == 6 || data == 7 || data == 8 ||  data == 9 || data == 10 ){
                      if(data == 1){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">No registrado en el sistema</div>');
                      }else if(data == 2){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-warning">No asignado</div>');     
                      }else if(data == 3){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                         $('.estadoo').html('<div class="alert alert-success">Ya almorzo</div>');
                      }else if(data == 4){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Tarjeta Bloqueada</div>');
                      }else if(data == 5){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-info">Permiso concluido vuelva a pasar la tarjeta</div>');
                      }else if(data == 6){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-info">Permiso</div>');
                      }else if(data == 7){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-info">Ssuspencion concluido vuelva a pasar la tarjeta</div>');
                      }
                      else if(data == 8){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Tarjeta suspendido</div>'); 
                      }else if(data == 9){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Fuera de horario</div>'); 
                      }else if(data == 10){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                         $('.estadoo').html('<div class="alert alert-success">Ya ceno</div>');
                      }
                       $('.imagenn').html('<img src="{{ asset('assets/img/') }}/'+'usuariorestringido.jpg'+'" style="width: 190px;height: 305px;">');
                       $("#nombree").html('no definido');
                       $("#fichaa").html('no definido');
                       $("#codigoo").html('no definido');
                       $("#menuu").html('no definido');
                       $("#fechaa").html('no definido');  
                      }
                      else{
                        $('.sonidoo').html('<audio src="assets/audio/activo.mp3" autoplay="autoplay"></audio>');
                      $('.estadoo').html('');
                      $('.chat-box').prepend('<tr><td>'+data['id']+'</td><td>'+data['nombre']+' '+data['apellido']+'</td><td>'+data['ficha']+'</td><td>'+data['codigo']+'</td><td>'+data['menu']+'</td><td>'+data['fecha_asistencia']+'</td></tr>');
                       $('.imagenn').html('<img src="{{ asset('imagenes/') }}/'+data['imagen']+'" style="width: 190px;height: 305px;">');
                       $("#nombree").html(data['nombre']+" "+data['apellido']);
                       $("#fichaa").html(data['ficha']);
                       $("#codigoo").html(data['codigo']);
                       $("#menuu").html(data['menu']);
                       $("#fechaa").html(data['fecha_asistencia']);  

                      }
                     $('#olvidado').val(""); 
                    },
              });

  });

</script>




<script type="text/javascript">
  $(document).on("submit",".frmeventual",function(e){

    e.preventDefault();
        $('html, body').animate({scrollTop: '0px'}, 200);
    
        var formu=new FormData($(".frmeventual")[0]);
        
        var quien=$(this).attr("id");
        if(quien=="f_asistencia_eventual"){ var varurl="asistencia_eventual";var token = $("#token").val(); }
        $.ajax({
                    url : varurl,
                    headers:{'X-CSRF-TOKEN':token},
                    type: "POST",
                    datatype:'json',
                    data : formu,
                    contentType: false,
                    processData: false,
               success: function(data)
                    {
                if(data == 1 || data == 2 || data == 3 || data == 4 || data == 5){
                      if(data == 1){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-danger">Eventual no registrado</div>');
                      }else if(data == 2){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-success">Ya almorzo</div>');
                      }else if(data == 3){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-warning">Eventual no activo</div>');
                      }else if(data == 4){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                        $('.estadoo').html('<div class="alert alert-success">Ya ceno</div>');
                      }else if(data == 5){
                        $('.sonidoo').html('<audio src="assets/audio/inactivo.mp3" autoplay="autoplay"></audio>');
                       $('.estadoo').html('<div class="alert alert-danger">Fuera de horario</div>');
                      }

                       $('.imagenn').html('<img src="{{ asset('assets/img/') }}/'+'usuariorestringido.jpg'+'" style="width: 190px;height: 305px;">');
                       $("#nombree").html('no definido');
                       $("#fichaa").html('no definido');
                       $("#codigoo").html('no definido');
                       $("#menuu").html('no definido');
                       $("#fechaa").html('no definido');  
                      }

                      else{
                        $('.sonidoo').html('<audio src="assets/audio/activo.mp3" autoplay="autoplay"></audio>');
                      $('.estadoo').html('');
                      $('.chat-box').prepend('<tr><td>'+data['id']+'</td><td>'+data['nombre']+' '+data['apellido']+'</td><td>'+data['ficha']+'</td><td>'+data['codigo']+'</td><td>'+data['menu']+'</td><td>'+data['fecha_asistencia']+'</td></tr>');
          
                       $('.imagenn').html('<img src="{{ asset('eventualimagenes/') }}/'+data['imagen']+'" style="width: 190px;height: 305px;">');
                       $("#nombree").html(data['nombre']+" "+data['apellido']);
                       $("#fichaa").html(data['ficha']);
                       $("#codigoo").html(data['codigo']);
                       $("#menuu").html(data['menu']);
                       $("#fechaa").html(data['fecha_asistencia']);  

                      }
                      $('#eventual').val(""); 
                    },
              });

  });

</script>
</body>
</html>

