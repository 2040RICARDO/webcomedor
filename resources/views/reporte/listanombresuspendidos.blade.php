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

   <table align="center" border="1">
    <thead>
      <tr style="border: #263238; background: #263238; color:#f5f5f5;">
      
        <th style="width:100px;font-size: 70%;" align="center">Nombre y Apellido</th>
        <th style="width:30px;font-size: 70%;" align="center">Ficha</th>
        <th style="width:80px;font-size: 70%;" align="center">Tarjeta</th>
        <th style="width:80px;font-size: 70%;" align="center">Carrera</th>
        <th style="width:50px;font-size: 70%;" align="center">Asistencia</th>
        <th style="width:50px;font-size: 70%;" align="center">Permiso</th>
        <th style="width:50px;font-size: 70%;" align="center">Faltas</th>
        <th style="width:50px;font-size: 70%;" align="center">Observación</th>
      </tr>
    </thead>

                                            <tbody>
                                            @if ($t2 = $totalpermisos->count())
                                            @endif
                                        
                                        {{-- */ $rh = 0; /*--}}
                                   
                                        @foreach($numeroasistencias as $asistenciass)
                                        {{--*/ @$nombre = str_replace(' ','&nbsp;', $comensal->nombre) /*--}}  

                                        <tr>
                                         
                                         <td style="width:150px;font-size: 60%;"><b>{{ $asistenciass->nombres }} {{ $asistenciass->apellidos }}</b></td>
                                         <td align="center" style="font-size: 60%;">{{ $asistenciass->numeros }}</td>
                                         <td align="center" style="font-size: 60%;">{{ $asistenciass->codigos }}</td>
                                         <td  style="font-size: 60%;">{{ $asistenciass->carrerass }}</td>








                                         @if($t2 != 0)<!--if 1 principal-->
                              <!--if 1-->@if($totalpermisos[$rh]->comensal_id == $asistenciass->comensal_id)
                                         <td align="center" style="font-size: 60%;"> {{ ($asistenciass->n_asistencia ) + ($totalpermisos[$rh]->totaldias) + $actividad }}</td>
                                         <td align="center" style="font-size: 60%;">{{ $totalpermisos[$rh]->totaldias }}</td>
                                        
                                     <!--if 2--> @if($totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias ) + $actividad == 0 )
                                         <td align="center" style="font-size: 60%;">0</td>
                                         @else
                                         <td align="center" style="font-size: 60%;">{{ $totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias ) + $actividad}}</td>
                                     <!--if 2--> @endif


                                     <!--if 3--> @if( $totalresul - ($asistenciass->n_asistencia  + $totalpermisos[$rh]->totaldias) + $actividad >=  3) 
                                         <td align="center" style="font-size: 60%;">Observado</td>


                                         @else
                                                    <td></td> 
                                                                                     
                                      <!--if 3-->@endif 
                                         {{-- */ $t2 = $t2 - 1 ; /*--}} 
                                          {{-- */ $rh = $rh + 1; /*--}} 
                                         

                                        @else
                                   
                                        <td align="center" style="font-size: 60%;">{{ ($asistenciass->n_asistencia + $actividad )}}</td>  
                                         <td align="center" style="font-size: 60%;">0</td>
                                         @if($totalresul - ($asistenciass->n_asistencia  + $actividad ) == 0 )<!--if 3-->
                                         <td align="center" style="font-size: 60%;">0</td>
                                         @else
                                         <td align="center" style="font-size: 60%;">{{ $totalresul - ($asistenciass->n_asistencia + $actividad )}}</td>
                                         @endif<!--if 3-->

                                         @if( $totalresul - ($asistenciass->n_asistencia  + $actividad ) >=  3)<!--if 4-->
                                         <td align="center" style="font-size: 60%;">Observado</td>
                                         @else 
                                         <td></td>
                                         @endif <!--if 4-->
                             <!--if 1--> @endif








                                         @else
                                         <td align="center" style="font-size: 60%;">{{ ($asistenciass->n_asistencia + $actividad)}}</td>  
                                         <td align="center" style="font-size: 60%;">0</td>
                                         @if($totalresul - ($asistenciass->n_asistencia   + $actividad )  == 0 )<!--if 1-->
                                         <td align="center" style="font-size: 60%;">0</td>
                                         @else
                                         <td align="center" style="font-size: 60%;">{{ $totalresul - ($asistenciass->n_asistencia  + $actividad) }}</td>
                                         @endif<!--if 1-->

                                         @if( $totalresul - ($asistenciass->n_asistencia ) + $actividad >=  3)<!--if 2-->
                                         <td align="center" style="font-size: 60%;">Observado</td>
                                         @else
                                         <td></td>
                                         @endif <!--if 2-->

                                         @endif<!--if 1 principal-->
                                       </tr>
                                       
                                       @endforeach


                                    @foreach($eventualcontrol as $eventual )
                                    <tr>
                                    <td align="center" style="font-size: 60%;"">{{ $ft }}</td>
                                      <td align="center" style="font-size: 60%;"><b>{{ $eventual->nombre }} {{ $eventual->apellido }}</b></td>
                                         <td align="center" style="font-size: 60%;">{{ $eventual->numero }}</td>
                                         <td align="center" style="font-size: 60%;">Eventual</td>
                                         <td  style="font-size: 60%;">{{ $eventual->carrerass }}</td>
                                        <td align="center" style="font-size: 60%;">{{ ($eventual->n_asistencia + $actividad )}}</td>  
                                         <td align="center" style="font-size: 60%;">0</td>
                                         
                                         <td align="center" style="font-size: 60%;">{{ $totalresul - ($asistenciass->n_asistencia  + $actividad )}}</td>
                                         <td></td>
                                        </tr>
                                      
                                      @endforeach




                                    </tbody>
                                        </table>
 
</body>
</html>






