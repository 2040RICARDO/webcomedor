<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Validator;
use Storage;
use App\Http\Requests\PublicacionRequest;
use App\Http\Requests\PublicacionUpdateRequest;


use App\Http\Requests;
use App\Publicaciones;
use App\User;

class PublicarController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

ini_set('max_execution_time',900);
    $publicaciones = \DB::table('publicaciones')
    ->select('publicaciones.*','users.name as nombre')
    ->join('users', 'users.id','=','publicaciones.users_id')
    ->get();
      return view('publicacion.indexpublicacion',compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function vistapublicacion(){
        $usuario=\Auth::user();
        return view('publicacion.frmregistropublicacion',compact('usuario'));
    }



    public function create(PublicacionRequest $request)
    {
         $usuario=\Auth::user();
        $archivo = $request->file('file');
        $input = array('file' => $archivo);
        $reglas = array('file' => 'required|mimes:pdf|max:50000');
        $validacion = Validator::make($input, $reglas);
        if($validacion->fails())
        {
            Session::flash('save1','La publicacion no fue registrada revise el tipo de archivo');
            return redirect('admin');
        }
        else{
          $publicacion = new Publicaciones;
          $publicacion->users_id = $request->users_id;
          $publicacion->fechapublicacion = $request->fechapublicacion;
          $publicacion->estado = $request->estado;
          $publicacion->descripcion = $request->descripcion; 

          $carpeta = "publicaciones";
          $ruta = time() . '.' .$archivo->getClientOriginalName(); 
          $r1 = Storage::disk('archivos')->put($ruta, \File::get($archivo));
          $publicacion->ruta=$ruta;
          $resul = $publicacion->save(); 

          return response()->json(1);

    }
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
    public function edit($id)
    {
        $publicacion = Publicaciones::find($id);
        return view('publicacion.frmeditarpublicacion',compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     *s
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicacionUpdateRequest $request, $id)
    {
        $publicar = Publicaciones::find($id);
        $publicar->fechapublicacion = $request->fechapublicacion;
         $publicar->estado = $request->estado;
         $publicar->descripcion = $request->descripcion;
    
        $publicar->save();
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion = Publicaciones::FindOrFail($id);
        $resul = $publicacion->delete();

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
