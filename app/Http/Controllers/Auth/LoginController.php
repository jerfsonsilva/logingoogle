<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logarFacebook(Request $request)
    {
        $usuario = \App\Models\User::where('email',$request['email'])->first();

      if ($usuario==null) { //Cado não exista o usuario ele cria um novo no banco
          $usuario = new \App\Models\User;
          $usuario['name'] = $request['name'];
          $usuario['idfacebook'] = $request['id'];
          $usuario['foto'] = $request['foto'];
          $usuario['email'] = $request['email'];

          if ($usuario->save()) {
             \Auth::loginUsingId($usuario->id);//Loga o usuario
         }else{
            return response()->json(['resultado'=>false]);
        }
    }else{//Caso já exista apenas faça o login no sistema
         \Auth::loginUsingId($usuario->id);//Loga o usuario
     }
     return response()->json(['resultado'=>true]);
 }


}
