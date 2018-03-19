<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Validator;
use Storage;


use App\Http\Requests;
use App\Publicaciones;
use App\Suspender;
use App\Comensal;
use App\User;

class PublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion = Publicaciones::where('estado',1)->get();
    return view('welcome',compact('publicacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   


    public function verificar(Request $request)
    {
        $numeroci= $request->numeroci;
        Carbon::setlocale('es');
        $now = Carbon::now();
        $month = date('m');
        $year = date('y');
        $primero = date('y-m-d',mktime(0,0,0,$month,1,$year)); 
        $fechaa = new Carbon($primero);
        
        $fechaa->addMonth(); 




        if(Comensal::where('ci',$numeroci)->count() != 0){
            $extraer = Comensal::where('ci',$numeroci)->first();
            $id = $extraer->id;
            if(Suspender::where('comensal_id',$id)->count() != 0){
                if (Suspender::where('fecha_inicio','>=',$fechaa)->count() != 0) {
                    return response()->json(1);
                }else{
                    return response()->json(2);
                }

            }else{
                return response()->json(2);
            }
 
            
            
           
        }else{
            return response()->json(3);
        }

         
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function descargar_publicacion($id){
        
        $publicacion=Publicaciones::find($id);
         $rutaarchivo= "../storage/archivos/".$publicacion->ruta;
         return response()->download($rutaarchivo);

       }


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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
