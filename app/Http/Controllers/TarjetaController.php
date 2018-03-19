<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TarjetaRequest;
use App\Http\Requests\TarjetaEditRequest;
use App\Http\Requests;

use App\Http\Controllers\Controller;


use App\Tarjeta;
use App\Comensal;
use Session;
use Illuminate\Support\Facades\Validator;


class TarjetaController extends Controller
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
        $tarjetas = Tarjeta::all();
        return view('tarjeta.indextarjeta')->with('tarjetas',$tarjetas);
    }


    
     public function agregar(Request $request)
    {
     
        
        return view('tarjeta.frmregistrotarjeta');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregar_nuevo_tarjeta(TarjetaRequest $request)
    {
        if($request->ajax()){
            $tarjeta= new Tarjeta;
            $tarjeta->codigo =  utf8_decode($request->codigo); 
            $tarjeta->fecha_registro = $request->fecha_registro;
            //$tarjeta->estado = $request->estado;
            $tarjeta->comentario = $request->comentario;
            $tarjeta->comensal_id= null;
            $resul= $tarjeta->save();
           return response()->json([
               "mensaje" => "creado"
            ]);
        }
    }
    
  public function registrar(Request $request)
    {
        $add = new Tarjeta;
        $add->codigo = $request->input('leer');
        $add->estado = 1;
        $add->fecha_registro = '2017-09-06';
        $add->comentario = 0;
        $add->comensal_id = 1;

        $add->save();
    }
    

    public function create()
    {

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
   public function edit($id_edit_tarjeta)
    {
      $comensales=Comensal::where('designacion', 0)->lists('nombre','id')->toArray();
     $tarjeta = Tarjeta::find($id_edit_tarjeta);
       return view('tarjeta.frmeditartarjeta')->with('tarjeta',$tarjeta)->with('comensales',$comensales);
    }

public function edit1($id_edit_tarjeta1)
    {
     $tarjeta = Tarjeta::find($id_edit_tarjeta1);
       return view('tarjeta.frmeditartarjeta1')->with('tarjeta',$tarjeta);
    }

   
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(TarjetaEditRequest $request, $id)
    {
     $tarjeta = Tarjeta::find($id);
    $idcomensal = $tarjeta->comensal_id;

   if ($request->estado == 0) { 
                       
         $edit = Comensal::find($idcomensal);
         $edit->designacion = 0;
         $edit->save();
        $tarjeta->codigo = $request->codigo;
        $tarjeta->estado = 0;
        $tarjeta->fecha_registro = $request->fecha_registro;
        $tarjeta->comentario = $request->comentario;
        $tarjeta->comensal_id = null;
        $tarjeta->save();
        return response()->json([
            "mensaje" => "listo"
        ]);
          }else if ($idcomensal == NULL){
              $edit = Comensal::find($request->comensal_id);
               $edit->designacion = 1;
                $edit->save();
                $tarjeta->fill($request->all());
                $tarjeta->save();
                return response()->json([
                    "mensaje" => "listo"
                ]);
            }else{
                $tarjeta->fill($request->all());
                $tarjeta->save();
                return response()->json([
                    "mensaje" => "listo"
                ]);
            }
          }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $tarjeta = Tarjeta::FindOrFail($id);
    $result = $tarjeta->delete();

        if ($result)
        {
            return response()->json(['success'=>'true']); 
        }
        else
        {
            return response()->json(['success'=> 'false']);
        }
    }





    public function verificartarjeta()
    {
        return view('tarjeta.verificartarjeta');
    }
      public function verificartag(Request $request)
    {

        $lecturacodigo = $request->input('leer');
        $leccodigo = preg_replace('/[^a-zA-Z0-9_.-]/', '', $lecturacodigo);


        $dato = Tarjeta::where('codigo', $leccodigo )->count();
        
       if($dato != 0){
            
            $tarjeta = \DB::table('tarjeta')
            ->select('tarjeta.*','comensal.*')
            ->join('comensal', 'comensal.id','=','tarjeta.comensal_id')
            ->where('tarjeta.codigo', $leccodigo)
            ->first();      
         return response()->json($tarjeta);
                      
       }else{
            return response()->json(5);
       }

   
    }

}
