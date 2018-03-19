<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comensal;
use App\Tarjeta;
use App\Permiso;
use App\Eventual;
use App\Suspender;
use App\Asistencia;
use App\Actividad;
use App\Carrera;
use Carbon\Carbon;
use App\Http\Requests;

class ReporteController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $c = Comensal::count();
        $t = Tarjeta::count();
        $p = Permiso::count();
        $e = Eventual::count();
        $s = Suspender::count();
        $ca = Carrera::count();
        $ac = Actividad::count();
        return view('reporte.indexreporte',compact('c','t','p','e','s','ca','ac'));
    }

    public function agregar_reporte_comensal(Request $request)
    {
        

      $carrera = $request->uno;
     echo $carrera; 
     return response()->json($carrera);  

    
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function reportecomensal()
    {
        return response()->json();
    }

    public function frmcomensal()
    {
     
       $carreras=Carrera::lists('carrera','id')->toArray();
       return view('reporte.frmcomensal',compact('carreras'));    
   }
    public function frmeventual()
    {
     
       $carreras=Carrera::lists('carrera','id')->toArray();
       return view('reporte.frmeventual',compact('carreras'));    
   }
   public function frmpermiso()
    {
     
       
       return view('reporte.frmpermiso');    
   }
   public function frmsuspender()
    {
     
       
       return view('reporte.frmsuspender');    
   }
   public function frmtarjeta()
    {
     
       
       return view('reporte.frmtarjeta');    
   }

   public function frmlistacontrol()
    {
     
       
       return view('reporte.frmlistacontrol');    
   }
  
  public function frmlistaasistencia()
    {
     
       
       return view('reporte.frmlistaasistencia');    
   }
    

    public function rcomensalc($car_id)
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportecomensalcarrera";
        $comensales = \DB::table('comensal')
        ->select('comensal.*','carreras.carrera as carrerass')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->where('comensal.carreras_id',$car_id)
        ->orderBy('comensal.nombre', 'asc')
        ->orderBy('comensal.apellido', 'asc')
        ->orderBy('comensal.numero', 'asc')
        ->orderBy('comensal.procedencia', 'asc')
        ->get();

        $carrerass = Carrera::where('id',$car_id)->first();
        $carreraa = $carrerass->carrera;

        $data=$comensales;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data','carreraa', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_comensal_carrera_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }
  









    public function rcomensalgeneral()
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportecomensalgeneral";
        $comensales = \DB::table('comensal')
        ->select('comensal.*','carreras.carrera as carrerass', 'carreras.area as areas')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->orderBy('carreras.area', 'desc')
        ->orderBy('carreras.carrera', 'asc')
        ->orderBy('comensal.nombre', 'asc')
        ->orderBy('comensal.apellido', 'asc')
        ->orderBy('comensal.numero', 'asc')
        ->orderBy('comensal.procedencia', 'asc')
        ->get();
        $data=$comensales;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$pdf->loadHTML($view)->setPaper('A4', 'landscape');
        $filename = "reporte_comensal_general_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);     
    }








    public function rcomensalnumero()
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportecomensalnumero";
        $comensales = \DB::table('comensal')
        ->select('comensal.*','carreras.carrera as carrerass', 'carreras.area as areas')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->orderBy('comensal.numero', 'asc')
        ->orderBy('comensal.nombre', 'asc')
        ->orderBy('comensal.apellido', 'asc')
        ->orderBy('comensal.procedencia', 'asc')
        ->get();


        $data=$comensales;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_comensal_numero_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);     
    }








public function rtarjetae($car_id)
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportetarjetaestado";
        $tarjeta = \DB::table('tarjeta')
        ->select('tarjeta.*','comensal.*','carreras.carrera as carrerass')
        ->join('comensal', 'comensal.id','=','tarjeta.comensal_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->where('tarjeta.estado',$car_id)

        ->orderBy('carreras.area', 'asc')
        ->orderBy('comensal.nombre', 'asc')
        ->orderBy('comensal.apellido', 'asc')
        ->orderBy('comensal.procedencia', 'asc')
        ->orderBy('comensal.numero', 'asc')
        ->get();
        $data=$tarjeta;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_tarjetas_estados_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }








    public function rtarjetageneral()
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportetarjetageneral";
        $tarjeta = \DB::table('tarjeta')
        ->select('tarjeta.*','comensal.*','carreras.carrera as carrerass' )
        ->join('comensal', 'comensal.id','=','tarjeta.comensal_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->orderBy('carreras.area', 'desc')
        ->get();
        $data=$tarjeta;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_tarjeta_general_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }









public function rpermisov($car_id)
    {
        ini_set('max_execution_time',900);
        $fecha = Carbon::now();
        $fecha_hoy = $fecha->toDateString();
        $vistareporte="reporte.reportepermisovijente";
        if($car_id == 1){
             $permiso = \DB::table('permiso')
        ->select('permiso.*','comensal.*','carreras.carrera as carrerass')
        ->join('comensal', 'comensal.id','=','permiso.comensal_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->where('permiso.fecha_final','>=',$fecha_hoy)
        ->orderBy('carreras.area', 'asc')
        ->get();
        }
        if($car_id == 2){
             $permiso = \DB::table('permiso')
        ->select('permiso.*','comensal.*','carreras.carrera as carrerass')
        ->join('comensal', 'comensal.id','=','permiso.comensal_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->where('permiso.fecha_final','<',$fecha_hoy)
        ->orderBy('carreras.area', 'asc')
        ->get();
        }
        $data=$permiso;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_permiso_estado_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }











public function rpermisogeneral()
    {
        ini_set('max_execution_time',900);
        $fecha = Carbon::now();
        $fecha_hoy = $fecha->toDateString();
        $vistareporte="reporte.reportepermisogeneral";
     
             $permiso = \DB::table('permiso')
        ->select('permiso.*','comensal.*','carreras.carrera as carrerass')
        ->join('comensal', 'comensal.id','=','permiso.comensal_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->orderBy('carreras.area', 'asc')
        ->get();
        $data=$permiso;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_permiso_general_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }










public function rcomensaleventualc($car_id)
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportecomensaleventualcarrera";
        $eventuales = \DB::table('eventual')
        ->select('eventual.*','carreras.carrera as carrerass')
        ->join('carreras', 'carreras.id','=','eventual.carreras_id')
        ->where('eventual.carreras_id',$car_id)
        ->orderBy('eventual.nombre', 'asc')
        ->orderBy('eventual.apellido', 'asc')
        ->orderBy('eventual.numero', 'asc')
        ->orderBy('eventual.procedencia', 'asc')
        ->get();
        $carrerass = Carrera::where('id',$car_id)->first();
        $carreraa = $carrerass->carrera;
        $data=$eventuales;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data','carreraa', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_eventual_carrera_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }
  









    public function rcomensaleventualgeneral()
    {
        ini_set('max_execution_time',900);
        $vistareporte="reporte.reportecomensaleventualgeneral";
        $eventuales = \DB::table('eventual')
        ->select('eventual.*','carreras.carrera as carrerass', 'carreras.area as areas')
        ->join('carreras', 'carreras.id','=','eventual.carreras_id')
        ->orderBy('carreras.area', 'asc')
        ->orderBy('carreras.carrera', 'asc')
        ->orderBy('eventual.nombre', 'asc')
        ->orderBy('eventual.apellido', 'asc')
        ->orderBy('eventual.numero', 'asc')
        ->orderBy('eventual.procedencia', 'asc')
        ->get();
        $data=$eventuales;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_eventual_general_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);     
    }





public function rsuspender($car_id)
    {
        ini_set('max_execution_time',900);
        $fecha = Carbon::now();
        $fecha_hoy = $fecha->toDateString();
        $vistareporte="reporte.reportesuspendervijente";
        if($car_id == 1){
             $suspender = \DB::table('suspender')
        ->select('suspender.*','comensal.*','carreras.carrera as carrerass' ,'tarjeta.codigo as codigos')
        ->join('comensal', 'comensal.id','=','suspender.comensal_id')
        ->join('tarjeta', 'tarjeta.id','=','suspender.tarjeta_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->where('suspender.fecha_conclucion','>=',$fecha_hoy)
        ->orderBy('carreras.area', 'asc')
        ->get();
        }
        if($car_id == 2){
             $suspender = \DB::table('suspender')
        ->select('suspender.*','comensal.*','carreras.carrera as carrerass' ,'tarjeta.codigo as codigos')
        ->join('comensal', 'comensal.id','=','suspender.comensal_id')
        ->join('tarjeta', 'tarjeta.id','=','suspender.tarjeta_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->where('suspender.fecha_conclucion','<',$fecha_hoy)
        ->orderBy('carreras.area', 'asc')
        ->get();
        }
        $data=$suspender;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_suspender_estado_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }












public function rsuspendergeneral()
    {
        ini_set('max_execution_time',900);
     
        $vistareporte="reporte.reportesuspendergeneral";
     
             $suspender = \DB::table('suspender')
        ->select('suspender.*','comensal.*','carreras.carrera as carrerass','tarjeta.codigo as codigos')
        ->join('comensal', 'comensal.id','=','suspender.comensal_id')
        ->join('tarjeta', 'tarjeta.id','=','suspender.tarjeta_id')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        ->orderBy('carreras.area', 'asc')
        ->get();
   


        $data=$suspender;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
       


        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "reporte_suspender_general_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }














public function numerosuspendidos(Request $request){
ini_set('max_execution_time',900);
$vistareporte="reporte.listanumerosuspendidos";
   
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
    ->orderBy('comensal.numero', 'asc')
    ->get();

    $eventualcontrol = \DB::table('asistencia')
    ->select('asistencia.eventual_id','eventual.*','carreras.carrera as carrerass', \DB::raw('COUNT(fecha_asistencia) as n_asistencia'))
    ->join('eventual', 'eventual.id','=','asistencia.eventual_id')
    ->join('carreras', 'carreras.id','=','eventual.carreras_id')
    ->whereBetween('fecha_asistencia', array($fecha1, $fecha2))
    ->groupBy('eventual_id')
    ->orderBy('eventual.numero', 'asc')
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

        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('date','totalpermisos','numeroasistencias','totalresul','domingos','fecha1','fecha2','actividad','eventualcontrol'))->render();
        $pdf = \App::make('dompdf.wrapper');
    
       $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "lista_asistencia_numeros_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }













public function nombresuspendidos(Request $request){
ini_set('max_execution_time',900);
$vistareporte="reporte.listanombresuspendidos";
   
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
    ->orderBy('carreras.area','desc')
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

        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('date','totalpermisos','numeroasistencias','totalresul','domingos','fecha1','fecha2','eventualcontrol','actividad'))->render();
        $pdf = \App::make('dompdf.wrapper');
    
       $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        $filename = "lista_asistencia_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);  
    }
}
