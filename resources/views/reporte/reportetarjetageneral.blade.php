<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body style="border: 1px solid #000;">
   
      <table align="center" >
      <thead>
      <tr align="right">
        <td colspan=""><h4 style="font-size: 70%;">fecha de impresión: {{ $date }}</h4></td>
      </tr>
      
       <tr align="center" >   
           <td colspan=""><img style="width: 16cm;height: 3cm;" src="{{  asset('assets/img/reporte.png')}}" ></td>
      </tr>
      <tr><td colspan="8"><hr></td></tr>
      <tr align="center">
          <td colspan="" style="font-size: 120%; font-weight: bold;">Reporte de tarjetas general</td>
     
      </tr>
    </thead>
   </table>
       <br>
    
    
       
       
       <table align="center" border="1"> 
        <thead>
          <tr style="border: #263238; background: #263238; color:#f5f5f5;">
             <th style="width:10px;font-size: 70%;" align="center">N°</th>
            <td style="width:90px;font-size: 70%;" align="center">NOMBRE Y APELLIDO</td>
            <td style="width:90px;font-size: 70%;" align="center">CI</td>
            <td style="width:90px;font-size: 70%;" align="center">CARRERA</td>
            <td style="width:90px;font-size: 70%;" align="center">PROCEDENCIA</td>
            <td style="width:30px;font-size: 70%;" align="center">FICHA</td>
            <td style="width:60px;font-size: 70%;" align="center">TARJETA</td>
            <td style="width:50px;font-size: 70%;" align="center">ESTADO</td>

          </tr>
        </thead>



          {{-- */ $rh = 1; /*--}} 
        @foreach($data as $tarjeta) 
        <tr>
        <td style="width:2px;font-size: 60%;" align="center">{{ $rh }}</td>
        <td style="width:150px;font-size: 60%;">{{ $tarjeta->nombre }} {{ $tarjeta->apellido }}</td>
        <td  align="center" style="font-size: 60%;">{{ $tarjeta->ci }}</td>
        <td style="width:150px; font-size: 60%;">{{ $tarjeta->carrerass }}</td>
        <td align="center" style="font-size: 60%;">{{ $tarjeta->procedencia }}</td>
        <td align="center" style="font-size: 60%;">{{ $tarjeta->numero }}</td>
        <td align="center" style="font-size: 60%;">{{ $tarjeta->codigo }}</td>
        
        @if($tarjeta->estado == 1)
         <td align="center" style="background: #00e676; color:#000;font-size: 60%;" >Activo</td>
        @endif 
        @if($tarjeta->estado == 2) 
          <td align="center" style="background: #dd2c00; color:#fff;font-size: 60%;">Bloqueado</td>
        @endif
        @if($tarjeta->estado == 3) 
          <td align="center" style="background: #00bfa5; color:#000;font-size: 60%;">Permiso</td>
        @endif
        @if($tarjeta->estado == 4) 
          <td align="center" style="background: #ff6d00; color:#000;font-size: 60%;">Suspendido</td>
        @endif

      </tr>
      

       {{-- */ $rh = $rh+1; /*--}}
     @endforeach
       </table>

    
   

  </body>
</html>


