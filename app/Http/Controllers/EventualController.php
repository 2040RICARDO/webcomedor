<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eventual;
use App\Comensal;
use App\Suspender;
use App\Carrera;
use Image;
use App\Http\Requests\EventualRequest;

use App\Http\Requests;

class EventualController extends Controller
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
        ini_set('max_execution_time',900);
        $date = date('Y-m-d');

        $eventuales = \DB::table('eventual')
        ->select('eventual.*','carreras.carrera as carrerass')
        ->join('carreras', 'carreras.id','=','eventual.carreras_id')
        ->get();


        return view ('eventual.indexeventual',compact('eventuales','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventual($idd,$comensal_idd,$tarjeta_idd)
    {
        
        $carreras=Carrera::lists('carrera','id')->toArray();

        $numero = Comensal::find($comensal_idd);
        $ficha = $numero->numero;
        $fecha = Suspender::find($idd);
        $fecha_inicio = $fecha->fecha_inicio;
        $fecha_conclucion = $fecha->fecha_conclucion;

        return view ('eventual.frmregistroeventual',compact('idd','comensal_idd','tarjeta_idd','ficha','carreras','fecha_inicio','fecha_conclucion'));      
    }

    public function eventualnuevo()
    {
        
        $carreras=Carrera::lists('carrera','id')->toArray();

        return view ('eventual.frmeventualnuevo',compact('carreras'));      
    }

public function agregar_nuevo_eventual(EventualRequest $request)
    {

     
        if($request->ajax()){

            $asignacion = Suspender::find( $request->suspender_id);
            $asignacion->asignacion =1;
            $asignacion->save();
            $eventual= new Eventual;
            $eventual->nombre = $request->nombre;
            $eventual->apellido = $request->apellido;
            $eventual->ci = $request->ci;
            $eventual->procedencia = $request->procedencia;
            $eventual->numero = $request->numero;
            $eventual->genero = $request->genero;
            $eventual->fecha_inicio = $request->fecha_inicio;
            $eventual->fecha_final = $request->fecha_final;
            $eventual->carreras_id= $request->carreras_id;
            $eventual->suspender_id= $request->suspender_id;
            $eventual->comensal_id= $request->comensal_id;
            $eventual->tarjeta_id= $request->tarjeta_id;
            $resul= $eventual->save();
           return response()->json(1);
        }
    
    }


    public function agregar_nuevo_eventualnuevo(EventualRequest $request)
    {

        $date = date('Y-m-d');
        $numerocomensal = Comensal::where('numero',$request->numero)->count();
        $disponible = Eventual::where('numero',$request->numero)->where('fecha_final','>=',$date)->count();

        
        if($numerocomensal == 0 && $disponible == 0){
            

        if($request->ajax()){


            $eventual= new Eventual;
            $eventual->nombre = $request->nombre;
            $eventual->apellido = $request->apellido;
            $eventual->ci = $request->ci;
            $eventual->procedencia = $request->procedencia;
            $eventual->numero = $request->numero;
            $eventual->genero = $request->genero;
            $eventual->fecha_inicio = $request->fecha_inicio;
            $eventual->fecha_final = $request->fecha_final;
            $eventual->carreras_id= $request->carreras_id;

            $resul= $eventual->save();
           return response()->json(1);

        }
    }else{
        return response()->json(2);
    }
    }


  



    public function edit($id_edit_eventual)
    {

     //$comensales=Comensal::lists('nombre','id')->toArray();
     $carreras=Carrera::lists('carrera','id')->toArray();
     $eventual = Eventual::find($id_edit_eventual);
       return view('eventual.frmeditareventual',compact('eventual','carreras'));




       //$comensal = Comensal::find($id);
       //return response()->json($comensal);
    }



    public function update(EventualRequest $request, $id)
    {
     $eventual = Eventual::find($id);
     $eventual ->nombre = $request->nombre;
     $eventual ->apellido = $request->apellido;
     $eventual ->ci = $request->ci;
     $eventual ->carreras_id = $request->carreras_id;
     $eventual ->procedencia = $request->procedencia;
     $eventual ->numero = $request->numero;
     $eventual ->genero = $request->genero;
     $eventual->fecha_inicio = $request->fecha_inicio;
     $eventual->fecha_final = $request->fecha_final;

        $eventual->save();
        return response()->json([
            "mensaje" => "listo eventual"
        ]);
    }


    public function destroy($id)
    {
         $eventual = Eventual::FindOrFail($id);
        $resul = $eventual->delete();

        if ($resul)
        {
            return response()->json(['success'=>'true']); 
        }
        else
        {
            return response()->json(['success'=> 'false']);
        }
    
    }



    public function photo($id_photo_eventual)
    {
        $eventual = Eventual::find($id_photo_eventual);
        
        return view('eventual.photo')->with('eventual',$eventual);
    }

    public function update_photo(Request $request)
    {
    if($request->ajax()){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(380, 600)->save(public_path('eventualimagenes/' . $filename ) );
            $eventual= Eventual::find($request->get('id'));
            $eventual->imagen = $filename;
            $resul= $eventual->save();
            return response()->json([
            "mensaje" => "listo"
        ]);
    }    
}
}
