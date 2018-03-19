<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;



use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

use App\Comensal;
use App\Tarjeta;
use App\Permiso;
use App\Eventual;
use App\Suspender;
use App\Publicaciones;
use App\Carrera;
use App\Actividad;

class AuthController extends Controller
{
       /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view("login");
    }


       

public function postLogin(Request $request)
   {
    $this->validate($request, [
        'username' => 'required',
        'password' => 'required',
    ]);



    $credentials = $request->only('username', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
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

    return redirect('welcome');

    }


//login

 //registro   


        protected function getRegister()
    {
        return view("auth.registro");
    }


        

    protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);


    $data = $request;


    $user=new User;
    $user->name=$data['name'];
    $user->username=$data['username'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);


    if($user->save()){

         return redirect('login');
               
    }
}


//registro

protected function getLogout()
    {
        $publicacion = Publicaciones::where('estado',1)->get();
        $this->auth->logout();

        Session::flush();

        return view('welcome',compact('publicacion'));
    }

}
