<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SuspenderRequest;
use App\Suspender;
use App\Eventual;
use App\Tarjeta;
use Carbon\Carbon;

class SuspendidoController extends Controller
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

        
        $fecha = Carbon::now();
        $fecha_hoy = $fecha->toDateString();




$suspender = \DB::table('suspender')
    ->select('suspender.*','comensal.nombre as nombres','comensal.apellido as apellidos','comensal.numero as numeros','carreras.carrera as carrerass','tarjeta.codigo as codigoss')
    ->join('comensal', 'comensal.id','=','suspender.comensal_id')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->join('tarjeta', 'tarjeta.id','=','suspender.tarjeta_id')
   ->where("fecha_conclucion",">=",$fecha_hoy)->get();


$suspenderr = \DB::table('suspender')
    ->select('suspender.*','comensal.nombre as nombres','comensal.apellido as apellidos','comensal.numero as numeros','carreras.carrera as carrerass','tarjeta.codigo as codigos')
    ->join('comensal', 'comensal.id','=','suspender.comensal_id')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->join('tarjeta', 'tarjeta.id','=','suspender.tarjeta_id')
  ->where("fecha_conclucion","<",$fecha_hoy)->get();


        return view('suspender.indexsuspendido',compact('suspender','suspenderr'));
    

    }
    public function frmsuspender($cid,$tid)
    {

       return response()->json(compact('cid','tid'));
      
    }


 public function frmsuspendernuevo($comensal_id,$tarjeta_id)
    {

     
      return view('suspender.frmagregarsuspendido',compact('comensal_id','tarjeta_id'));
      
    }

    public function suspenderlista($tag_id,$co_id)
    {

        $fecha = Carbon::now();
        $fechaactual = $fecha->toDateString();
            $suspender= new Suspender;
            $suspender->fecha_conclucion = $fechaactual;
            $suspender->comensal_id= $co_id;
            $suspender->tarjeta_id= $tag_id;
            $resul= $suspender->save();
    }

public function agregar_nuevo_suspendermodal(Request $request)
    {
        $fecha = Carbon::now();
        $fechaactual = $fecha->toDateString();
        if($request->ajax()){
            $suspenderr = Suspender::where('tarjeta_id',$request->tarjeta_id)->where('fecha_conclucion','>=',$fechaactual)->count();

            if($suspenderr == 0){
            $data = Tarjeta::where('id',$request->tarjeta_id)->first();
            $id = $data->id;
            $edit = Tarjeta::find($id);
            $edit->estado = 4;
            $edit->save();

            $suspender= new Suspender;
            $suspender->fecha_inicio = $request->fecha_inicio;
            $suspender->fecha_conclucion = $request->fecha_conclucion;
            $suspender->comensal_id= $request->comensal_id;
            $suspender->tarjeta_id= $request->tarjeta_id;
            $resul= $suspender->save();


           return response()->json(1); 
            }
           return response()->json(2); 
           
        }
    }



    public function agregar_nuevo_suspendido(SuspenderRequest $request)
    {


        
        $fecha = Carbon::now();
        $fechaactual = $fecha->toDateString();
        if($request->ajax()){
            $suspenderr = Suspender::where('tarjeta_id',$request->tarjeta_id)->where('fecha_conclucion','>=',$fechaactual)->count();

            if($suspenderr == 0){
            $data = Tarjeta::where('id',$request->tarjeta_id)->first();
            $id = $data->id;
            $edit = Tarjeta::find($id);
            $edit->estado = 4;
            $edit->save();

            $suspender= new Suspender;
            $suspender->motivo = $request->motivo;
            $suspender->fecha_inicio = $request->fecha_inicio;
            $suspender->fecha_conclucion = $request->fecha_conclucion;
            $suspender->comensal_id= $request->comensal_id;
            $suspender->tarjeta_id= $request->tarjeta_id;
            $resul= $suspender->save();
            }
           return response()->json();
        }
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_edit_suspendido)
    {
        ini_set('max_execution_time',900);
       $suspender = Suspender::find($id_edit_suspendido);
       return view('suspender.frmeditarsuspender',compact('suspender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suspender = Suspender::find($id);
    
        $suspender->fill($request->all());
        $suspender->save();
        return response()->json([
            "mensaje" => "listo"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $controlar = Suspender::where('id',$id)->first();
    $codigo = $controlar->tarjeta_id;
    $data = Tarjeta::where('id',$codigo)->first();

    $idtag = $data->id;
         $edit = Tarjeta::find($idtag);
         $edit->estado = 1;
         $edit->save();
    $suspender = Suspender::FindOrFail($id);
    $result = $suspender->delete(); 
        if ($result)
        {
            return response()->json(['success'=>'true']); 
        }
        else
        {
            return response()->json(['success'=> 'false']);
        }


    
    }
}
