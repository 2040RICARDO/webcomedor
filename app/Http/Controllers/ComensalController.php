<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ComensalRequest;
use App\Http\Requests\SuspenderRequest;
use App\Http\Requests\ComensalEditRequest;
use App\Http\Controllers\Controller;

use App\Comensal;
use App\Carrera;
use App\Eventual;

use Session;
use Image;
use Storage;
use Illuminate\Support\Facades\Validator;




class ComensalController extends Controller
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
        
    $listac=Carrera::lists('carrera','id')->toArray();

    $comensales = \DB::table('comensal')
    ->select('comensal.*','carreras.carrera as carrerass')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->get();
return view('comensal.indexcomensal',compact('comensales','listac'));
    }
    
public function listarc($op)
    {
        ini_set('max_execution_time',900);
        $comensales = \DB::table('comensal')
    ->select('comensal.*','carreras.carrera as carrerass')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->where('comensal.carreras_id',$op)
    ->get();
        
        
        return view('comensal.listcarrera')->with('comensales',$comensales);
    }

    
    
public function photo($id_photo_comensal)
    {
        $comensal = Comensal::find($id_photo_comensal);
        
        return view('comensal.photo')->with('comensal',$comensal);
    }








public function update_photo(Request $request)
    {
    if($request->ajax()){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(380, 600)->save(public_path('imagenes/' . $filename ) );
            $comensal= Comensal::find($request->get('id'));
            $comensal->imagen = $filename;
            $resul= $comensal->save();
            return response()->json([
            "mensaje" => "listo"
        ]);
    }    
}
    
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function agregar()
    {


        $carreras=Carrera::lists('carrera','id')->toArray();
       
        return view('comensal.frmregistrocomensal',compact('carreras'));
    }
    
    
    public function agregar_nuevo_usuario(ComensalRequest $request)
    {
        $numeroeventual = Eventual::where('numero',$request->numero)->count();
        if($numeroeventual == 0){

            if($request->ajax()){
            $comensal= new Comensal;
            $comensal->nombre = $request->nombre;
            $comensal->apellido = $request->apellido;
            $comensal->ci = $request->ci;
           // $comensal->carrera = $request->carrera;
            
            $comensal->carreras_id = $request->carreras_id;
            $comensal->procedencia = $request->procedencia;
            $comensal->numero = $request->numero;
            $comensal->genero = $request->genero;


               

            if ( $request->hasfile('imagen')) {
                 $file = $request->file('imagen');  
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(380, 600)->save(public_path('imagenes/' . $filename ) );
                $comensal->imagen = $filename;
            }else if($request->hasfile('imagencam')){

                $file = $request->file('imagencam');  
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(380, 600)->save(public_path('imagenes/' . $filename ) );
                $comensal->imagen = $filename;
            }
            
            $resul= $comensal->save();
        
           return response()->json(1);
        }
        }else{
            return response()->json(2);
        }

        
    }
    
    
    
    public function perfilcomensal($comensal_id)
    {



 $comensal = \DB::table('comensal')
    ->select('comensal.*','carreras.carrera as carrerass')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->where('comensal.id',$comensal_id)
    ->first();

    return response()->json($comensal);
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
    
public function edit($id_edit_comensal)
    {

     //$comensales=Comensal::lists('nombre','id')->toArray();
     $carreras=Carrera::lists('carrera','id')->toArray();
     $comensales = Comensal::find($id_edit_comensal);
       return view('comensal.frmeditarcomensal',compact('comensales','carreras'));




       //$comensal = Comensal::find($id);
       //return response()->json($comensal);
    }

    
    
/*public function editar_usuario()
	{

		$data=Request::all();
		$idComensal=$data["id"];
		$comensal=Comensal::find($idComensal);
        $comensal->nombre  =  $data["nombre"];
		$comensal->apellido=$data["apellido"];
        $comensal->ci=$data["ci"];
        $comensal->carrera=$data["carrera"];
        $comensal->procedencia=$data["procedencia"];
        $comensal->numero=$data["numero"];
        $comensal->genero=$data["genero"];
        

		$resul= $comensal->save();


	}*/
    

public function update(ComensalEditRequest $request, $id)
    {
     $comensal = Comensal::find($id);
     $comensal->fill($request->all());
        $comensal->save();
        return response()->json([
            "mensaje" => "listo"
        ]);
    }
      
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
 
        $comensal = Comensal::FindOrFail($id);
        $resul = $comensal->delete();

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
