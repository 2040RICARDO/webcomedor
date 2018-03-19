<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="border: 1px solid #000;" >


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
          <td colspan="8" style="font-size: 120%; font-weight: bold;">Reporte por carrera: {{ $carreraa }}</td>
     
      </tr>
    </thead>
   </table>
  
    <br>
       <table align="center" border="1">

    <thead class="table" >
      <tr style="border: #263238; background: #263238; color:#f5f5f5;">
        <th style="width:10px;font-size: 70%;" align="center">N°</th>
        <th style="width:100px;font-size: 70%;" align="center">NOMBRE Y APELLIDO</th>
        <th style="width:90px;font-size: 70%;" align="center"> CI </th>
        <th style="width:90px;font-size: 70%;" align="center"> CARRERA </th>
        <th style="width:90px;font-size: 70%;" align="center"> PROCEDENCIA </th>
        <th style="width:30px;font-size: 70%;" align="center"> FICHA </th>
   
      </tr>
    </thead>
          <tbody>
         {{-- */ $rh = 1; /*--}} 
        @foreach($data as $comensal) 

        <tr>
        <td style="width:2px;font-size: 60%;">{{ $rh }}</td>
        <td style="width:150px;font-size: 60%;">{{ $comensal->nombre }} {{ $comensal->apellido }}</td>
        <td align="center" style="font-size: 60%;">{{ $comensal->ci }}</td>
        <td style="padding: 3px; width:150px;font-size: 60%;">{{ $comensal->carrerass }}</td>
        <td style="width:150px;font-size: 60%;">{{ $comensal->procedencia }}</td>
        <td align="center" style="font-size: 60%;">{{ $comensal->numero }}</td>
       
      </tr>
     {{-- */ $rh = $rh+1; /*--}} 
      @endforeach
      </tbody>

       </table>
  </body>
</html>







