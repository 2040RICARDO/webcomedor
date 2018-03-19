<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Asistencia;
use App\Tarjeta;
use App\Comensal;
use App\Eventual;
use App\Carrera;
use App\Permiso;
use App\Suspender;
use App\Actividad;
use App\Tag;
use Carbon\Carbon;


class AsistenciaController extends Controller
{
  
    public function index()
    {
        Carbon::setlocale('es');
        $now = Carbon::now();
        $fecha = $now->format('l jS \d\e F Y  '); 
        $fecha_actual = $now->toDateString(); 
        $asistencia =Asistencia::where('fecha_asistencia',$fecha_actual)->orderBy('id','desc')->get();
        return view('control.indexasistencia')->with('asistencia',$asistencia)->with('fecha',$fecha);

    }


    public function fechaindex()
    {

        return view('control.frmfecha');
    }


public function listacontrol(Request $request)
    {
        ini_set('max_execution_time',900);
        $fecha1 = $request->input('fecha1');
       
        $fecha2 = $request->input('fecha2');

        $t1 = new Carbon($fecha1);
        $t11 = new Carbon($fecha1);
        $t12 = new Carbon($fecha1);
        $t2 = new Carbon($fecha2);
        $sumadias = 1;
        while ($t1 != $t2) {
            $sumadias = $sumadias +1 ;
            $t1->addDay();
         }
         $totalsuma = $sumadias + $sumadias;
         

         $rr = new Carbon($fecha1);
         $domingos = 0;
         for ($i=0; $i <$sumadias ; $i++) { 
            if ($rr->dayOfWeek === Carbon::SUNDAY) {
                $domingos = $domingos + 1;  
            }
            $rr->addDay();  
        }
        $totalresul = $totalsuma - $domingos;
  

//////////////////////////////ATIVIDAD///////////////////////////////////////////
        $actividades = Actividad::count();
        $actividad = 0;
        if($actividades != 0){
            $now1 = Carbon::now();
            $fecha_actual = $now1->toDateString();
            $activi = Actividad::all();
            foreach ($activi as $actividadd) {
                $fecha_actividad = $actividadd->fecha_actividad;
                if (strtotime($fecha1) <= strtotime($fecha_actividad) && strtotime($fecha2) >= strtotime($fecha_actividad)) {
                    $actividad = $actividad +1;
                }
            }
        }
     
//////////////////////////////ATIVIDAD///////////////////////////////////////////





      $numeroasistencias = \DB::table('asistencia')
    ->select('asistencia.comensal_id','asistencia.tarjeta_id','comensal.nombre as nombres','comensal.numero as numeros','comensal.apellido as apellidos','tarjeta.codigo as codigos','carreras.carrera as carrerass', \DB::raw('COUNT(fecha_asistencia) as n_asistencia'))
    ->join('comensal', 'comensal.id','=','asistencia.comensal_id')
    ->join('tarjeta', 'tarjeta.id','=','asistencia.tarjeta_id')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->whereBetween('fecha_asistencia', array($fecha1, $fecha2))
    ->groupBy('comensal_id')
    ->get();

$eventualcontrol = \DB::table('asistencia')
    ->select('asistencia.eventual_id','eventual.*','carreras.carrera as carrerass', \DB::raw('COUNT(fecha_asistencia) as n_asistencia'))
    ->join('eventual', 'eventual.id','=','asistencia.eventual_id')
    ->join('carreras', 'carreras.id','=','eventual.carreras_id')
    ->whereBetween('fecha_asistencia', array($fecha1, $fecha2))
    ->groupBy('eventual_id')
    ->get();





//CALCULA LOS PERMISOS
     $permisos = Permiso::select('id')->count();

     if ($permisos != 0) {

  for ($i=1; $i <= $permisos ; $i++) { 

        $datapermiso = Permiso::where('id', $i)->first();
        $fechainit =$datapermiso->fecha_inicio;
        $fechainit1 = new Carbon($fechainit);
        $fechafin =$datapermiso->fecha_final;
        $fechafin1 = new Carbon($fechafin);

    if (strtotime($fechainit1) >= strtotime($t11) && strtotime($fechainit1) <= strtotime($t2)){
        
            $fechafinagregado = $fechafin1->addDay();
            $fecha_de_conclusion_permiso = $fechafinagregado;
            if (strtotime($fechafinagregado) >= strtotime($t2)) {
                $fechafinagregado1 = $t2->addDay();
                $fecha_de_conclusion_permiso = $fechafinagregado1;
            }
            





            $suma = 0;
            $domingoss = 0;
            while (strtotime($fechainit1) != strtotime($fecha_de_conclusion_permiso) ) {
              if ($fechainit1->dayOfWeek === Carbon::SUNDAY) {
                $domingoss = $domingoss + 1;
              }
                $suma = $suma + 1;
                $fechainit1->addDay(); 
            }

            $totaldiasresulpermiso = ($suma + $suma) - $domingoss ; 

            $fecha_p = Carbon::now();
            $idpermiso = $datapermiso->id;
            $edit_permiso =Permiso::find($idpermiso);
            $edit_permiso ->totaldias = $totaldiasresulpermiso;
            $edit_permiso->fecha_modificacion = $fecha_p->toDateString();
            $edit_permiso->save();
            

    }else if(strtotime($fechafin1) >= strtotime($t12) && strtotime($fechafin1) <= strtotime($t2) ){
      
            $fechafinagregado1 = $fechafin1->addDay();
            $fecha_de_conclusion_permiso1 = $fechafinagregado1;

            $suma = 0;
            $domingoss = 0;
            while (strtotime($t12) != strtotime($fecha_de_conclusion_permiso1)) {
              if ($t12->dayOfWeek === Carbon::SUNDAY) {
                $domingoss = $domingoss + 1;
              }
                $suma = $suma + 1;
                $t12->addDay(); 
            }
            $totaldiasresulpermiso = ($suma + $suma) - $domingoss ; 
            $fecha_p = Carbon::now();
            $idpermiso = $datapermiso->id;
            $edit_permiso =Permiso::find($idpermiso);
            $edit_permiso ->totaldias = $totaldiasresulpermiso;
            $edit_permiso->fecha_modificacion = $fecha_p->toDateString();
            $edit_permiso->save();
         
    }

      }
      
     }

        $fecha_t = Carbon::now();
        $fr = $fecha_t->toDateString();
        $totalpermisos = Permiso::select('id', 'tarjeta_id', 'comensal_id', 'totaldias')->where('fecha_modificacion' ,$fr)->orderBy('comensal_id','asc')->get();





      
        foreach ($totalpermisos as $tpermisos) {
            $tpermisos->fecha_modificacion="0000-00-00";
            $tpermisos->save();
        }

   return view('control.listacontrol',compact('totalpermisos','numeroasistencias','totalresul','domingos','fecha1','fecha2','eventualcontrol','actividad'));
    
}






public function store(Request $request)
    {
        ini_set('max_execution_time',900);

        $now1 = Carbon::now();
        $h12_00 = Carbon::createFromTime(17, 00);
        $h14_05 = Carbon::createFromTime(23, 10);
        $h18_00 = Carbon::createFromTime(11, 00);
        $h20_05 = Carbon::createFromTime(14, 10);

        if($now1 >= $h12_00 && $now1 <= $h14_05){
        $lecturacodigo = $request->input('leer');
        $leccodigo = preg_replace('/[^a-zA-Z0-9_.-]/', '', $lecturacodigo);
        $dato = Tarjeta::where('codigo', $leccodigo )->count();
        if( $dato == 0 ){
         return response()->json(1);
        }
        else{
            $data = Tarjeta::where('codigo', $leccodigo)->first();
            $estado =$data->estado;
            $idtarjeta =$data->id;
            if ($estado == 0) {
                return response()->json(2);
                
            }else if($estado == 1){
           
            $fechacontrol = $now1->toDateString();
            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechacontrol) ->count();
              if ( $contador == 0) {
                $comensal_id =$data->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'almuerzo';
                    $add->fecha_asistencia = $fechacontrol;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();
                    return response()->json([
                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $data->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);   
              }else{
                return response()->json(3);
              } 
            }else if ($estado == 2) {
                return response()->json(4);
            } else if($estado == 3){
                $fechacomparacion = $now1->toDateString();
                $contadorpermiso = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_final','>=',$fechacomparacion)->count();





                $contadorpermiso1 = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_inicio','<=',$fechacomparacion)->count();





                $contadorpermiso1 = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_inicio','<=',$fechacomparacion)->where('fecha_final','>=',$fechacomparacion)->count();
                if($contadorpermiso == 0){
                     $data = Tarjeta::where('id',$idtarjeta)->first();
                     $idtag = $data->id;
                     $edit = Tarjeta::find($idtag);
                     $edit->estado = 1;
                     $edit->save();
                     return response()->json(5);
                }else if($contadorpermiso1 == 0){
                    $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechacomparacion) ->count();
                        if ($contador == 0) {
                            $comensal_id =$data->comensal_id;
                             $add = new Asistencia;
                            $add->menu = 'almuerzo';
                            $add->fecha_asistencia = $fechacomparacion;
                            $add->comensal_id = $comensal_id;
                            $add->tarjeta_id = $idtarjeta;
                            $add->save();
                            $consultacomensal = Comensal::where('id',$comensal_id)->first();

                            return response()->json([

                            'id' => $add->id,
                            'nombre' => $consultacomensal->nombre,
                            'apellido' => $consultacomensal->apellido,
                            'ficha' => $consultacomensal->numero,
                            'imagen' => $consultacomensal->imagen,
                            'codigo' => $data->codigo,
                            'menu' => $add->menu,
                            'fecha_asistencia' => $add->fecha_asistencia
                            ]);    

                        }else{
                            return response()->json(3);
                        }









                }else{
                    return response()->json(6);
                }  
            }else if($estado == 4){
               $fechaactualsuspender = $now1->toDateString();
              $suspenderr = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->count();

              $suspendercomparar = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->first();

              if($suspenderr == 0){
                $data = Tarjeta::where('id',$idtarjeta)->first();
                $idtag = $data->id;
                $edit = Tarjeta::find($idtag);
                $edit->estado = 1;
                $edit->save();
                return response()->json(7);
              }else if(strtotime($fechaactualsuspender) < strtotime($suspendercomparar->fecha_inicio)){

            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechaactualsuspender) ->count();
                 if ( $contador == 0) {
                $comensal_id =$data->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'almuerzo';
                    $add->fecha_asistencia = $fechaactualsuspender;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();

                    return response()->json([

                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $data->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);    

                    }else{
                        return response()->json(3);
                    } 
                }else{
                return response()->json(8);
                 }
                }
             }




//HORA DE 12  DE LA TARDE A 2 DE LA TARDE

        }else if ($now1 >= $h18_00 && $now1 <= $h20_05) {

         $lecturacodigo = $request->input('leer');
        $leccodigo = preg_replace('/[^a-zA-Z0-9_.-]/', '', $lecturacodigo);
        $dato = Tarjeta::where('codigo', $leccodigo )->count();
        if( $dato == 0 ){
         return response()->json(1);
        }
        else{
            $data = Tarjeta::where('codigo', $leccodigo)->first();
            $estado =$data->estado;
            $idtarjeta =$data->id;
            if ($estado == 0) {
                return response()->json(2);
            }else if($estado == 1){
            $fechacontrol = $now1->toDateString();
            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechacontrol) ->count();
              if ( $contador == 0) {
                $comensal_id =$data->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'cena';
                    $add->fecha_asistencia = $fechacontrol;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();
                    return response()->json([
                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $data->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);   
              }else{
                
                return response()->json(10);
              
              } 
            }else if ($estado == 2) {


                return response()->json(4);
            } else if($estado == 3){
                $fechacomparacion = $now1->toDateString();
                $contadorpermiso = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_final','>=',$fechacomparacion)->count();
                





                $contadorpermiso1 = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_inicio','<=',$fechacomparacion)->where('fecha_final','>=',$fechacomparacion)->count();
                if($contadorpermiso == 0){
                     $data = Tarjeta::where('id',$idtarjeta)->first();
                     $idtag = $data->id;
                     $edit = Tarjeta::find($idtag);
                     $edit->estado = 1;
                     $edit->save();
                     return response()->json(5);
                }else if($contadorpermiso1 == 0){
                    $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechacomparacion) ->count();
                        if ($contador == 0) {
                            $comensal_id =$data->comensal_id;
                             $add = new Asistencia;
                            $add->menu = 'cena';
                            $add->fecha_asistencia = $fechacomparacion;
                            $add->comensal_id = $comensal_id;
                            $add->tarjeta_id = $idtarjeta;
                            $add->save();
                            $consultacomensal = Comensal::where('id',$comensal_id)->first();

                            return response()->json([

                            'id' => $add->id,
                            'nombre' => $consultacomensal->nombre,
                            'apellido' => $consultacomensal->apellido,
                            'ficha' => $consultacomensal->numero,
                            'imagen' => $consultacomensal->imagen,
                            'codigo' => $data->codigo,
                            'menu' => $add->menu,
                            'fecha_asistencia' => $add->fecha_asistencia
                            ]);    

                        }else{
                            return response()->json(10);
                        }






                }else{
                    return response()->json(6);
                }  
            }else if($estado == 4){
               $fechaactualsuspender = $now1->toDateString();
              $suspenderr = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->count();

              $suspendercomparar = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->first();

              if($suspenderr == 0){
                $data = Tarjeta::where('id',$idtarjeta)->first();
                $idtag = $data->id;
                $edit = Tarjeta::find($idtag);
                $edit->estado = 1;
                $edit->save();
                return response()->json(7);
              }else if(strtotime($fechaactualsuspender) < strtotime($suspendercomparar->fecha_inicio)){

            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechaactualsuspender) ->count();
                 if ( $contador == 0) {
                $comensal_id =$data->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'cena';
                    $add->fecha_asistencia = $fechaactualsuspender;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();

                    return response()->json([

                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $data->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);    

                    }else{
                        return response()->json(10);
                    } 
                }else{
                return response()->json(8);
                 }
                }
             }
        }
        else{
            return response()->json(9);
        }
    }





public function numero(Request $request)
    {
        ini_set('max_execution_time',900);
        $now1 = Carbon::now();
        $h12_00 = Carbon::createFromTime(17, 00);
        $h14_05 = Carbon::createFromTime(24, 10);
        $h18_00 = Carbon::createFromTime(11, 00);
        $h20_05 = Carbon::createFromTime(14, 10);
        if($now1 >= $h12_00 && $now1 <= $h14_05){
        $dato = Comensal::where('numero', $request->ficha )->count();
        if( $dato == 0 ){
        return response()->json(1);
        }
        else{ 
          ///////////////////AUMENTADO
        $comensal = Comensal::where('numero',$request->ficha)->first();
        $idcomensal = $comensal->id;
        $tarjeta = Tarjeta::where('comensal_id', $idcomensal)->first();
        $codigo = $tarjeta->codigo;
        //////////////////////AUMENTADO
            $estado = $tarjeta->estado;
            $idtarjeta =$tarjeta->id;
            if ($estado == 0) {
                return response()->json(2);
            }else if($estado == 1){
            $fechacontrol = $now1->toDateString();
            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechacontrol) ->count();
              if ( $contador == 0) {
                $comensal_id =$tarjeta->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'almuerzo';
                    $add->fecha_asistencia = $fechacontrol;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();
                    return response()->json([
                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $tarjeta->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);   
              }else{
                
                return response()->json(3);
                //return new JsonResponse($erroralmuerzo,422);
              } 
            }else if ($estado == 2) {
                return response()->json(4);
            } else if($estado == 3){
                $fechacomparacion = $now1->toDateString();
                $contadorpermiso = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_final','>=',$fechacomparacion)->count();
               



                $contadorpermiso1 = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_inicio','<=',$fechacomparacion)->where('fecha_final','>=',$fechacomparacion)->count();
                if($contadorpermiso == 0){
                     $data = Tarjeta::where('id',$idtarjeta)->first();
                     $idtag = $data->id;
                     $edit = Tarjeta::find($idtag);
                     $edit->estado = 1;
                     $edit->save();
                     return response()->json(5);
                }else if($contadorpermiso1 == 0){
                    $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechacomparacion) ->count();
                        if ($contador == 0) {
                            $comensal_id =$tarjeta->comensal_id;
                            $add = new Asistencia;
                            $add->menu = 'almuerzo';
                            $add->fecha_asistencia = $fechacomparacion;
                            $add->comensal_id = $comensal_id;
                            $add->tarjeta_id = $idtarjeta;
                            $add->save();
                            $consultacomensal = Comensal::where('id',$comensal_id)->first();

                            return response()->json([

                            'id' => $add->id,
                            'nombre' => $consultacomensal->nombre,
                            'apellido' => $consultacomensal->apellido,
                            'ficha' => $consultacomensal->numero,
                            'imagen' => $consultacomensal->imagen,
                            'codigo' => $tarjeta->codigo,
                            'menu' => $add->menu,
                            'fecha_asistencia' => $add->fecha_asistencia
                            ]);   

                        }else{
                            return response()->json(3);
                        }










                }else{
                    return response()->json(6);
                }  
            }else if($estado == 4){
               $fechaactualsuspender = $now1->toDateString();
              $suspenderr = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->count();

              $suspendercomparar = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->first();

              if($suspenderr == 0){
                $data = Tarjeta::where('id',$idtarjeta)->first();
                $idtag = $data->id;
                $edit = Tarjeta::find($idtag);
                $edit->estado = 1;
                $edit->save();
                return response()->json(7);
              }else if(strtotime($fechaactualsuspender) < strtotime($suspendercomparar->fecha_inicio)){

            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechaactualsuspender) ->count();
                 if ( $contador == 0) {
                $comensal_id =$tarjeta->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'almuerzo';
                    $add->fecha_asistencia = $fechaactualsuspender;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();

                    return response()->json([

                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $tarjeta->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);    

                    }else{
                        return response()->json(3);
                    } 
                }else{
                return response()->json(8);
                 }
            }
        }




//HORA DE 12  DE LA TARDE A 2 DE LA TARDE
        }else if ($now1 >= $h18_00 && $now1 <= $h20_05) {

         $dato = Comensal::where('numero', $request->ficha )->count();
        if( $dato == 0 ){
        return response()->json(1);
        }
        else{ 
          ///////////////////AUMENTADO
        $comensal = Comensal::where('numero',$request->ficha)->first();
        $idcomensal = $comensal->id;
        $tarjeta = Tarjeta::where('comensal_id', $idcomensal)->first();
        $codigo = $tarjeta->codigo;
        //////////////////////AUMENTADO
            $estado = $tarjeta->estado;
            $idtarjeta =$tarjeta->id;
            if ($estado == 0) {
                return response()->json(2);
            }else if($estado == 1){
            $fechacontrol = $now1->toDateString();
            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechacontrol) ->count();
              if ( $contador == 0) {
                $comensal_id =$tarjeta->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'cena';
                    $add->fecha_asistencia = $fechacontrol;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();
                    return response()->json([
                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $tarjeta->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);   
              }else{
                
                return response()->json(10);
                //return new JsonResponse($erroralmuerzo,422);
              } 
            }else if ($estado == 2) {
                return response()->json(4);
            } else if($estado == 3){
                $fechacomparacion = $now1->toDateString();
                $contadorpermiso = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_final','>=',$fechacomparacion)->count();
               




                $contadorpermiso1 = Permiso::where('tarjeta_id',$idtarjeta)->where('fecha_inicio','<=',$fechacomparacion)->where('fecha_final','>=',$fechacomparacion)->count();
                if($contadorpermiso == 0){
                     $data = Tarjeta::where('id',$idtarjeta)->first();
                     $idtag = $data->id;
                     $edit = Tarjeta::find($idtag);
                     $edit->estado = 1;
                     $edit->save();
                     return response()->json(5);
                }else if($contadorpermiso1 == 0){
                    $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechacomparacion) ->count();
                        if ($contador == 0) {
                             $comensal_id =$tarjeta->comensal_id;
                            $add = new Asistencia;
                            $add->menu = 'cena';
                            $add->fecha_asistencia = $fechacomparacion;
                            $add->comensal_id = $comensal_id;
                            $add->tarjeta_id = $idtarjeta;
                            $add->save();
                            $consultacomensal = Comensal::where('id',$comensal_id)->first();

                            return response()->json([

                            'id' => $add->id,
                            'nombre' => $consultacomensal->nombre,
                            'apellido' => $consultacomensal->apellido,
                            'ficha' => $consultacomensal->numero,
                            'imagen' => $consultacomensal->imagen,
                            'codigo' => $tarjeta->codigo,
                            'menu' => $add->menu,
                            'fecha_asistencia' => $add->fecha_asistencia
                            ]);      

                        }else{
                            return response()->json(10);
                        }







                }else{
                    return response()->json(6);
                }  
            }else if($estado == 4){
               $fechaactualsuspender = $now1->toDateString();
              $suspenderr = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->count();

              $suspendercomparar = Suspender::where('tarjeta_id',$idtarjeta)->where('fecha_conclucion','>=',$fechaactualsuspender )->first();

              if($suspenderr == 0){
                $data = Tarjeta::where('id',$idtarjeta)->first();
                $idtag = $data->id;
                $edit = Tarjeta::find($idtag);
                $edit->estado = 1;
                $edit->save();
                return response()->json(7);
              }else if(strtotime($fechaactualsuspender) < strtotime($suspendercomparar->fecha_inicio)){

            $contador = \DB::table('asistencia') ->where('tarjeta_id', '=', $idtarjeta) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechaactualsuspender) ->count();
                 if ( $contador == 0) {
                $comensal_id =$tarjeta->comensal_id;
                $add = new Asistencia;
                    $add->menu = 'cena';
                    $add->fecha_asistencia = $fechaactualsuspender;
                    $add->comensal_id = $comensal_id;
                    $add->tarjeta_id = $idtarjeta;
                    $add->save();
                    $consultacomensal = Comensal::where('id',$comensal_id)->first();

                    return response()->json([

                    'id' => $add->id,
                    'nombre' => $consultacomensal->nombre,
                    'apellido' => $consultacomensal->apellido,
                    'ficha' => $consultacomensal->numero,
                    'imagen' => $consultacomensal->imagen,
                    'codigo' => $tarjeta->codigo,
                    'menu' => $add->menu,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);    

                    }else{
                        return response()->json(10);
                    } 
                }else{
                return response()->json(8);
                 }
            }
        }
        }
        else{ 
            return response()->json(9);
        }
    }











 public function asistencia_eventual(Request $request)
    {
        ini_set('max_execution_time',900);
        $now1 = Carbon::now();
        $h12_00 = Carbon::createFromTime(17, 00);
        $h14_05 = Carbon::createFromTime(24, 10);
        $h18_00 = Carbon::createFromTime(11, 00);
        $h20_05 = Carbon::createFromTime(14, 10);
        $fecha_actual = $now1->toDateString();
        if($now1 >= $h12_00 && $now1 <= $h14_05){
        $contador_eventual = Eventual::where('numero',$request->ficha)->count();
        if( $contador_eventual == 0 ){
        return response()->json(1);
        }
        else{ 
        $conta=$contador_eventual;
        $conta1=1;
        $controlador_fecha = Eventual::where('numero',$request->ficha)->get();
        foreach ($controlador_fecha as $controlador) {
           $eventual_controlar= Eventual::where('id',$controlador->id)->first();
           $fecha_inicio = $eventual_controlar->fecha_inicio;
           $fecha_final = $eventual_controlar->fecha_final;

             if (strtotime($fecha_actual) >= strtotime($fecha_inicio) && strtotime($fecha_actual) <= strtotime($fecha_final)){
               $conta1 = $conta1+1000;
               $fechacontrol = $now1->toDateString();
                $eventual = Eventual::where('id',$controlador->id)->first();
                $ideventual = $eventual->id;
                $contador = \DB::table('asistencia') ->where('eventual_id', '=', $ideventual) ->where('menu', '=', 'almuerzo') ->where('fecha_asistencia', '=', $fechacontrol) ->count();
                if ( $contador == 0) {
              
                $add = new Asistencia;
                    $add->menu = 'almuerzo';
                    $add->fecha_asistencia = $fechacontrol;
                    $add->eventual_id = $ideventual;
                    $add->save();
                    $identificador = "Eventual";
                    return response()->json([
                    'id' => $add->id,
                    'nombre' => $eventual->nombre,
                    'apellido' => $eventual->apellido,
                    'ficha' => $eventual->numero,
                    'codigo' => $identificador,
                    'menu' => $add->menu,
                    'imagen' => $eventual->imagen,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);   
              }else{
                return response()->json(2);
              } 
             }else if($conta1 == $conta){
                return response()->json(3);
             }

             $conta1 = $conta1+1;
        }
         
        }

      
    }else if ($now1 >= $h18_00 && $now1 <= $h20_05){

 $contador_eventual = Eventual::where('numero',$request->ficha)->count();
        if( $contador_eventual == 0 ){
        return response()->json(1);
        }
        else{ 
        $conta=$contador_eventual;
        $conta1=1;
        $controlador_fecha = Eventual::where('numero',$request->ficha)->get();
        foreach ($controlador_fecha as $controlador) {
           $eventual_controlar= Eventual::where('id',$controlador->id)->first();
           $fecha_inicio = $eventual_controlar->fecha_inicio;
           $fecha_final = $eventual_controlar->fecha_final;

             if (strtotime($fecha_actual) >= strtotime($fecha_inicio) && strtotime($fecha_actual) <= strtotime($fecha_final)){
               $conta1 = $conta1+1000;
               $fechacontrol = $now1->toDateString();
                $eventual = Eventual::where('id',$controlador->id)->first();
                $ideventual = $eventual->id;
                $contador = \DB::table('asistencia') ->where('eventual_id', '=', $ideventual) ->where('menu', '=', 'cena') ->where('fecha_asistencia', '=', $fechacontrol) ->count();
                if ( $contador == 0) {
              
                $add = new Asistencia;
                    $add->menu = 'cena';
                    $add->fecha_asistencia = $fechacontrol;
                    $add->eventual_id = $ideventual;
                    $add->save();
                    $identificador = "Eventual";
                    return response()->json([
                    'id' => $add->id,
                    'nombre' => $eventual->nombre,
                    'apellido' => $eventual->apellido,
                    'ficha' => $eventual->numero,
                    'codigo' => $identificador,
                    'menu' => $add->menu,
                    'imagen' => $eventual->imagen,
                    'fecha_asistencia' => $add->fecha_asistencia
                    ]);   
              }else{
                return response()->json(4);
              } 
             }else if($conta1 == $conta){
                return response()->json(3);
             }

             $conta1 = $conta1+1;
        }
         
        }

    }else{
      return response()->json(5);
    }
}

   

  public  function listaasistencia(){
    ini_set('max_execution_time',900);

    $listac=Carrera::lists('carrera','id')->toArray();

    $asistencias = \DB::table('asistencia')
    ->select('asistencia.*','comensal.*','carreras.carrera as carrerass','tarjeta.codigo as codigos')
    ->join('comensal', 'comensal.id','=','asistencia.comensal_id')
    ->join('tarjeta', 'tarjeta.id','=','asistencia.tarjeta_id')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->get();


    return view('control.listaasistencia',compact('asistencias','listac'));
  }

 

}




