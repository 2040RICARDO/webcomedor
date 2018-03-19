<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PermisoRequest;
use App\Http\Requests\PermisoEditRequest;
use App\Http\Controllers\Controller;
use App\Permiso;
use App\Tarjeta;
use App\Comensal;
use Carbon\Carbon;

class PermisoController extends Controller
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

    $permisos = \DB::table('permiso')
    ->select('permiso.*','comensal.nombre as nombres','comensal.apellido as apellidos','comensal.numero as numeros','carreras.carrera as carrerass')
    ->join('comensal', 'comensal.id','=','permiso.comensal_id')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->get();






        return view('permiso.indexpermiso',compact('permisos','date'));
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

    
    public function permiso($comensal_id,$id_tarjeta)
    {
      $com = Comensal::where('id',$comensal_id)->first();
      $nombre = $com->nombre;
      return view('permiso.frmregistropermiso', compact('comensal_id','id_tarjeta','nombre'));
    }



    public function agregar_nuevo_permiso(PermisoRequest $request)
    {
        if($request->ajax()){

            $data = Tarjeta::where('id',$request->tarjeta_id)->first();
            $id = $data->id;
            $edit = Tarjeta::find($id);
            $edit->estado = 3;
            $edit->save();
            $permiso= new Permiso;
            $permiso->motivo = $request->motivo;
            $permiso->fecha_inicio = $request->fecha_inicio;
            $permiso->fecha_final = $request->fecha_final;
            //$tarjeta->estado = $request->estado;
            $permiso->observacion = $request->observacion;
            $permiso->comensal_id= $request->comensal_id;
            $permiso->tarjeta_id= $request->tarjeta_id;
            $resul= $permiso->save();
           return response()->json([
               "mensaje" => "creado"
            ]);
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id_edit_permiso)
    {
       $permiso = Permiso::find($id_edit_permiso);
       return view('permiso.frmeditarpermiso',compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(PermisoEditRequest $request, $id)
    {
    $permiso = Permiso::find($id);
    //$permiso->codigo = $request->codigo;
     $permiso->fill($request->all());
        $permiso->save();
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

    $fecha = Carbon::now();
    $fecha_hoy = $fecha->toDateString();
    $controlar = Permiso::where('id',$id)->first();
    $fechafin = $controlar->fecha_final;
    $codigo = $controlar->tarjeta_id;
    $data = Tarjeta::where('id',$codigo)->first();
    $es = $data->estado;
    if (strtotime($fechafin) >= strtotime($fecha_hoy)) {
         $idtag = $data->id;
         $edit = Tarjeta::find($idtag);
         $edit->estado = 1;
         $edit->save();
    }else if( $es == 3 ){
        $idtag = $data->id;
         $edit = Tarjeta::find($idtag);
         $edit->estado = 1;
         $edit->save();
    }

    $permiso = Permiso::FindOrFail($id);
    $result = $permiso->delete();

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
