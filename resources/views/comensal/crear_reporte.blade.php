<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .medida{
        width: 321px;
        height: 223px;
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
     <div class="medida">
       <img src="assets/carnet.jpg" style="width:321px ;height: 1.5cm;">
       
       <table>
          <tbody>
           <tr>
        <td rowspan="4"><img  src="{{asset('imagenes/')}}/{{$data->imagen}}"  style="width: 2cm;height: 2.5cm;"></td>
        <td style="font-weight: bold;font-family: Arial;">Univ.:</td>
        <td style="width: 177px; font-weight: bold;font-family: Courier;">{{ $data->nombre }} {{ $data->apellido }}</td>
      </tr>
     <tr>
    
        <td style="font-weight: bold;font-family: Arial;">C.I.:</td>
        <td style="font-weight: bold;font-family: Courier;">{{ $data->ci }}</td>
      </tr>
      <tr>
      <td style="font-weight: bold;font-family: Arial;">Carrera:</td>
        <td style="font-weight: bold;font-family: Courier;">{{ $data->carrerass }}</td>
      </tr>
      <tr>
      
        
        <td style="font-weight: bold;font-family: Arial;">Procedencia:</td>
        <td style="font-weight: bold;font-family: Courier;">{{ $data->procedencia }}</td>
      </tr>
      <tr>
      
        <td style="font-weight: bold;font-family: Arial;text-align: center; ">N° {{ $data->numero }}</td>
        <td colspan="2" style="font-weight: bold;font-family: Courier;">Fecha de emision : {{  $date }}</td>
        
      </tr>
      
      
      
      </tbody>
       </table>
       <h1 style="font-size: 10px;text-align: center; margin-top: 16px;">INTERESADO</h1>
     </div>
    
  </body>
</html>




