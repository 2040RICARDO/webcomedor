<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .medida{
        width: 321px;
        height: 220px;
        float: left;
        border:2px solid #000;
        

           
        }
        .page-break {
    page-break-after: always;
}
        table {
        border-collapse:collapse;
      
      }
      td {
          
          font-size: 10px;
        padding:2px;
     
      }
</style>
  </head>
  <body>
  {{-- */ $rh = 0; /*--}} 
  {{-- */ $r = 0; /*--}} 
    @foreach($data as $comensal)
      {{-- */ $r = $r+1; /*--}}
      {{-- */ $rh = $rh+1; /*--}}
    @if($rh != 2)

     <div class="medida" style="display: inline-block;">
       <img src="assets/carnet.jpg" style="width:321px ;height: 1.5cm;">
       <table>
          <tbody >
           <tr>
        <td rowspan="4"><img src="{{asset('imagenes/')}}/{{$comensal->imagen}}"  style="width: 2cm;height: 2.5cm;"></td>
        <td style="font-weight: bold;font-family: Arial;">Univ.:</td>
        <td style="width: 177px; font-weight: bold;font-family: Courier;">{{ $comensal->nombre }} {{ $comensal->apellido }}</td>
      </tr>
     
     <tr>
        <td style="font-weight: bold;font-family: Arial;">C.I.:</td>
        <td style="font-weight: bold;font-family: Courier;">{{  $comensal->ci }}</td>
      </tr>
      <tr>
      <td style="font-weight: bold;font-family: Arial;">Carrera:</td>
        <td style="font-weight: bold;font-family: Courier;">{{  $comensal->carrerass }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;font-family: Arial;">Procedencia:</td>
        <td style="font-weight: bold;font-family: Courier;">{{  $comensal->procedencia }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold;font-family: Arial;text-align: center; ">N° {{  $comensal->numero }}</td>
        <td colspan="2" style="font-weight: bold;font-family: Courier;">Fecha de emision : {{  $date }}</td>
      </tr>
      </tbody>
       </table>
       <h1 style="font-size: 10px;text-align: center; margin-top: 16px;">INTERESADO</h1>
     </div>
     @else
         <div class="medida" style="display: inline-block;">
       <img src="assets/carnet.jpg" style="width:321px ;height: 1.5cm;">
       <table>
          <tbody >
           <tr>
        <td rowspan="4"><img src="{{asset('imagenes/')}}/{{$comensal->imagen}}"  style="width: 2cm;height: 2.5cm;"></td>
        <td style="font-weight: bold;font-family: Arial;">Univ.:</td>
        <td style="width: 177px; font-weight: bold;font-family: Courier;">{{ $comensal->nombre }} {{ $comensal->apellido }}</td>
      </tr>    
     <tr>
        <td style="font-weight: bold;font-family: Arial;">C.I.:</td>
        <td style="font-weight: bold;font-family: Courier;">{{  $comensal->ci }}</td>
      </tr>
      <tr>
      <td style="font-weight: bold;font-family: Arial;">Carrera:</td>
        <td style="font-weight: bold;font-family: Courier;">{{  $comensal->carrerass }}</td>
      </tr>
      <tr>
      
        
        <td style="font-weight: bold;font-family: Arial;">Procedencia:</td>
        <td style="font-weight: bold;font-family: Courier;">{{  $comensal->procedencia }}</td>
      </tr>
      <tr>
      
        <td style="font-weight: bold;font-family: Arial;text-align: center; ">N° {{  $comensal->numero }}</td>
        <td colspan="2" style="font-weight: bold;font-family: Courier;">Fecha de emision : {{  $date }}</td>
      </tr>
      </tbody>
       </table>
       <h1 style="font-size: 10px;text-align: center; margin-top: 16px;">INTERESADO</h1>
     </div>
       <br></br>
         {{-- */ $rh = 0; /*--}}  
      @endif

    @endforeach
  </body>
</html>




