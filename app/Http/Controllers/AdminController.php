<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comensal;
use App\Tarjeta;
use App\Permiso;
use App\Eventual;
use App\Suspender;
use App\Carrera;
use App\Actividad;
use Session;
use App\User;

use App\Asistencia;
use Carbon\Carbon;


class AdminController extends Controller
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


        $c = Comensal::count();
        $t = Tarjeta::count();
        $p = Permiso::count();
        $e = Eventual::count();
        $s = Suspender::count();
        $ca = Carrera::count();
        $ac = Actividad::count();
        return view('admin',compact('c','t','p','s','e','ca','ac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function getRegister()
    {
        return view("auth.registro");
    }

    public function postRegister(Request $request)

   {
    
    $data = $request;
    $user=new User;
    $user->name=$data['name'];
    $user->username=$data['username'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);
    Session::flush();
    return redirect('login');

 
}































    public function generar()
    {
        $fecha1 = ('2017-10-16');
       

        $t1 = new Carbon($fecha1);
     
        for($j=1; $j <= 15; $j++){

        for ($i=1; $i <= 1; $i++) {

            if ($t1->dayOfWeek === Carbon::SUNDAY){
            $asistencia = new Asistencia;
            $asistencia->menu="almuerzo";
            $asistencia->fecha_asistencia = $t1;
            $asistencia->comensal_id = $i;
            $asistencia->tarjeta_id = $i;
            $asistencia->save();

            }else{

            $asistencia = new Asistencia;
            $asistencia->menu="almuerzo";
            $asistencia->fecha_asistencia = $t1;
            $asistencia->comensal_id = $i;
            $asistencia->tarjeta_id = $i;
            $asistencia->save();

            $asistenciaa = new Asistencia;
            $asistenciaa->menu="cena";
            $asistenciaa->fecha_asistencia = $t1;
            $asistenciaa->comensal_id = $i;
            $asistenciaa->tarjeta_id = $i;
            $asistenciaa->save();
          }
        }
         $t1->addDay();
        }
       
        echo "correcto";
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
