<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarreraRequest;
use App\Http\Requests;
use App\Carrera;
class CarreraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $carreras=Carrera::all();
        return view('carrera.indexcarrera',compact('carreras'));
           

    }
     public function agregar()
    {
     
        
        return view('carrera.frmregistrocarrera');
    }



    public function agregar_nuevo_carrera(CarreraRequest $request)
    {
        if($request->ajax()){
            $carrera= new Carrera;
            $carrera->universidad = $request->universidad;
            $carrera->area = $request->area;
            $carrera->carrera = $request->carrera;
            $resul =  $carrera->save();
           return response()->json([
               "mensaje" => "creado"
            ]);
        }
    }


    public function edit($id_edit_carrera)
    {
    
      $carrera = Carrera::find($id_edit_carrera);
       return view('carrera.frmeditarcarrera',compact('carrera'));
    }

    public function update(CarreraRequest $request, $id)
    {
     $carrera = Carrera::find($id);
     $carrera->fill($request->all());
        $carrera->save();
        return response()->json([
            "mensaje" => "listo"
        ]);
    }

    public function destroy($id)
    {
        
 
        $carrera = Carrera::FindOrFail($id);
        $resul = $carrera->delete();

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
