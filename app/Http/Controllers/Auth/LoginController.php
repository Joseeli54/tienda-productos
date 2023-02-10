<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    public function login(Request $request){
        //Verificos los datos
        $datos  = $this->validate(request(), [
           $this->getUsername() => 'required|string',
           $this->getAuthPassword() => 'required|string'
        ]);

        // Crea la sesión si los datos son correctos
        if (Auth::attempt($datos )) {
            return redirect('/');
        }

        return back()->withErrors(['username'=>trans('auth.failed')])->withInput(request(['username']));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function getAuthPassword () {
        return "password";
    }

    public function getUsername(){
        return "username";
    }
}
