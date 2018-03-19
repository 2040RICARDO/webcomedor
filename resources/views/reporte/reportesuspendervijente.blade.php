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
          <td colspan="" style="font-size: 120%; font-weight: bold;">Reporte suspendidos segun estado</td>
     
      </tr>
    </thead>
   </table>
       <br>
   
    
       
       
       <table align="center" border="1">
        <thead>
          <tr style="border: #263238; background: #263238; color:#f5f5f5;">
          <th style="width:10px;font-size: 70%;" align="center">N°</th>
            <td  style="width:100px;font-size: 70%;" align="center">NOMBRE Y APELLIDO</td>
            <td style="width:90px;font-size: 70%;" align="center">CARRERA</td>
            <td style="width:30px;font-size: 70%;" align="center">FICHA</td>
            <td style="width:70px;font-size: 70%;" align="center">TARJETA</td>
            <td style="width:60px;font-size: 70%;" align="center">FECHA INICIO</td>
            <td style="width:60px;font-size: 70%;" align="center">FECHA CONCLUSION</td>

          </tr>
        </thead>



          <tbody>



        {{-- */ $rh = 1; /*--}} 
        @foreach($data as $suspender) 
        <tr>
        <td style="width:2px;font-size: 60%;" align="center">{{ $rh }}</td>
        <td style="width:150px;font-size: 60%;">{{ $suspender->nombre }} {{ $suspender->apellido }}</td>
        <td style="width:100px;font-size: 60%;">{{ $suspender->carrerass}}</td>
        <td align="center" style="font-size: 60%;">{{ $suspender->numero}}</td>
        <td align="center" style="font-size: 60%;">{{ $suspender->codigos}}</td>
        <td align="center" style="font-size: 60%;">{{ $suspender->fecha_inicio}}</td>
        <td align="center" style="font-size: 60%;">{{ $suspender->fecha_conclucion}}</td>
        
      </tr>
      {{-- */ $rh = $rh+1; /*--}}
     @endforeach
 
      </tbody>
       </table>

    
   

  </body>
</html>


