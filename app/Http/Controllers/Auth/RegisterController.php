<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Person;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'doc_persona' => ['required', 'string', 'max:255'],
            'fec_nac' => ['required', 'date', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:persona'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:persona'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_rol' => ['required', 'int', 'max:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Person
     */
    protected function create(array $data)
    {
        Session::put('username', $data['username']);

        return Person::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'doc_persona' => $data['doc_persona'],
            'fec_nac' => $data['fec_nac'],
            'telefono' => $data['telefono'],
            'username' => $data['username'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
            'id_rol' => $data['id_rol'],
        ]);
    }
}
