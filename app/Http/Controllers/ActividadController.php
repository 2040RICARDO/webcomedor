<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\Http\Requests\ActividadRequest;
use App\Http\Requests;

class ActividadController extends Controller
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
        $actividades = Actividad::all();
        return view('actividad.indexactividad',compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frmregistroactividad()
    {
        return view('actividad.frmregistroactividad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregar_nuevo_actividad(ActividadRequest $request)
    {

        if($request->ajax()){
        $actividad = new Actividad;

        $actividad->actividad = $request->actividad;
        $actividad->fecha_actividad = $request->fecha_actividad;
        $actividad->comentario = $request->comentario;
        $actividad->save();
        return response()->json([
               "mensaje" => "creado"
            ]);
            }
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
    public function edit($id_edit_actividad)
    {
     
     $actividad = Actividad::find($id_edit_actividad);
       return view('actividad.frmeditaractividad',compact('actividad'));
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
        
        $actividad = Actividad::find($id);
     $actividad->fill($request->all());
        $actividad->save();
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
         $actividad = Actividad::FindOrFail($id);
        $resul = $actividad->delete();

        if ($resul)
        {
            return response()->json(['success'=>'true']); 
        }
        else
        {
            return response()->json(['success'=> 'false']);
        }

    }
}
