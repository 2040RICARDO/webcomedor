<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comensal;

class CarnetController extends Controller
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
    $comensales = \DB::table('comensal')
    ->select('comensal.*','carreras.carrera as carrerass')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->get();
    return view('comensal.carnet',compact('comensales'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPDF($datos, $vistacarnet, $tipo)
    {
        ini_set('max_execution_time',900);
        $data=$datos;
        $date = date('Y-m-d');
        $view = \View::make($vistacarnet, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){
        $filename = "carnet_general_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);    
        //return $pdf->download('Pdf/temporales/verfactura.pdf',array('Attachment' => 1));
            
        //return $pdf->download('reporte.pdf');
                    
        }
    }
    

    public function carnet($tipo){
        ini_set('max_execution_time',900);
        $vistacarnet="comensal.prueba";
        $comensales = \DB::table('comensal')
        ->select('comensal.*','carreras.carrera as carrerass', 'carreras.area as areas')
        ->join('carreras', 'carreras.id','=','comensal.carreras_id')
        
        ->orderBy('comensal.numero', 'asc')
        
        ->get();
        return $this->crearPDF($comensales, $vistacarnet, $tipo);
    }
    
    
    
    
   public function crearPDFF($datos, $vistacarnet)
    {
        ini_set('max_execution_time',900);
        $data=$datos;
        $date = date('Y-m-d');
        $view = \View::make($vistacarnet, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        

        $filename = "carnet_individual_".$date.'.pdf';
        file_put_contents($filename, $pdf);
        return $pdf->download($filename);    
        //return $pdf->download('Pdf/temporales/verfactura.pdf',array('Attachment' => 1));
            
        //return $pdf->download('reporte.pdf');
                    
 
    }  
    
    
    
    
    public function carneti($individual){
        ini_set('max_execution_time',900);
        $vistacarnet="comensal.crear_reporte";





$comensal = \DB::table('comensal')
    ->select('comensal.*','carreras.carrera as carrerass')
    ->join('carreras', 'carreras.id','=','comensal.carreras_id')
    ->where('comensal.id','=',$individual)
    ->first();

       return $this->crearPDFF($comensal, $vistacarnet); 
        
        
    }
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
