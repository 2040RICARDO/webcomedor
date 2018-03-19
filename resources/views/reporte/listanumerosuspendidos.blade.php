<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="utf-8">
  <title></title>
<style>
        .medida{
        width: 12px;
        height: 12px;
        float: left;
        border:1px solid #000;
        

           
        }

</style>
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
          <td colspan="8" style="font-size: 120%; font-weight: bold;">Reporte control de: {{ $fecha1 }} Al: {{ $fecha2 }}</td>
     
      </tr>
    </thead>
   </table>

      @if ($t2 = $totalpermisos->count())
      @endif
      {{-- */ $rh = 0; /*--}} 
      {{-- */ $t = 0 ; /*--}} 
      
      {{-- */ $tw = 1 ; /*--}} 
     @foreach($numeroasistencias as $asistenciass)

      @if($tw != 40)

       <div class="medida" style="display: inline-block;">






        @if($t2 != 0)<!--if 1 principal-->

       @if($totalpermisos[$rh]->tarjeta_id == $asistenciass->tarjeta_id)<!--if 1-->
  
       @if($totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias ) + $actividad  >= 3 )<!--if 2-->
       <h1 style="font-size: 40%;background-color: #d50000;" align="center">{{ $asistenciass->numeros }}</h1>
        
       @else 
       <h1 style="font-size: 40%;background-color: #fff;" align="center">{{ $asistenciass->numeros }}</h1>
       @endif<!--if 2-->
       {{-- */ $t2 = $t2 - 1 ; /*--}} 
       {{-- */ $rh = $rh + 1 ; /*--}} 

       @else
       @if($totalresul - ($asistenciass->n_asistencia  )  + $actividad  >= 3 )<!--if 3-->
       <h1 style="font-size: 40%;background-color: #d50000;" align="center">{{ $asistenciass->numeros }}</h1>
       
       @else
       <h1 style="font-size: 40%;background-color: #fff;" align="center">{{ $asistenciass->numeros }}</h1>
      
       @endif<!--if 3-->

       @endif<!--if 1-->

       @else
       
       @if($totalresul - ($asistenciass->n_asistencia  ) + $actividad   >= 3 )<!--if 1-->
       <h1 style="font-size: 40%;background-color: #d50000;" align="center">{{ $asistenciass->numeros }}</h1>
    
       @else
       <h1 style="font-size: 40%;background-color: #fff;" align="center">{{ $asistenciass->numeros }}</h1>
      
       @endif<!--if 1-->

       @endif<!--if 1 principal-->
        
      </div>
      @else
        <div class="medida" style="display: inline-block;">
           
        @if($t2 != 0)<!--if 1 principal-->

       @if($totalpermisos[$rh]->tarjeta_id == $asistenciass->tarjeta_id)<!--if 1-->
  
       @if($totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias ) + $actividad  >= 3 )<!--if 2-->
       <h1 style="font-size: 40%;background-color: #d50000;" align="center">{{ $asistenciass->numeros }}</h1>
        
       @else 
       <h1 style="font-size: 40%;background-color: #fff;" align="center">{{ $asistenciass->numeros }}</h1>
       @endif<!--if 2-->
       {{-- */ $t2 = $t2 - 1 ; /*--}} 
       {{-- */ $rh = $rh + 1 ; /*--}} 

       @else
       @if($totalresul - ($asistenciass->n_asistencia  )  + $actividad  >= 3 )<!--if 3-->
       <h1 style="font-size: 40%;background-color: #d50000;" align="center">{{ $asistenciass->numeros }}</h1>
       
       @else
       <h1 style="font-size: 40%;background-color: #fff;" align="center">{{ $asistenciass->numeros }}</h1>
      
       @endif<!--if 3-->

       @endif<!--if 1-->

       @else
       
       @if($totalresul - ($asistenciass->n_asistencia  ) + $actividad   >= 3 )<!--if 1-->
       <h1 style="font-size: 40%;background-color: #d50000;" align="center">{{ $asistenciass->numeros }}</h1>
    
       @else
       <h1 style="font-size: 40%;background-color: #fff;" align="center">{{ $asistenciass->numeros }}</h1>
      
       @endif<!--if 1-->

       @endif<!--if 1 principal-->
        </div>
        <br></br>
        {{-- */ $tw = 1 ; /*--}} 
      @endif
      {{-- */ $tw = $tw + 1 ; /*--}} 
       @endforeach



@foreach($eventualcontrol as $eventual )
 <div class="medida" style="display: inline-block;">
                                    
       <h1 style="font-size: 40%;background-color: #00c853;" align="center">{{ $eventual->numero }}</h1>                                 
 
</div>
      
@endforeach
 
</body>
</html>






