<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function crearPersona(Request $request){

        $person = new Person();

        $person->username = $request->username;
        $person->password = Hash::make($request->password);
        $person->correo = $request->correo;
        $person->nombre = $request->nombre;
        $person->apellido = $request->apellido;
        $person->doc_persona = $request->doc_persona;
        $person->fec_nac = $request->fec_nac;
        $person->id_rol = $request->id_rol;
        $person->telefono = $request->telefono;

        $person->save();                 

        return [
            "inserted" => 1,
            "person" => $person
        ];
    }

    public function editarPersona(Request $request, $id){
        $person = Person::where('id', $id)->first();
        $person->username = $request->username;
        $person->correo = $request->correo;
        $person->nombre = $request->nombre;
        $person->apellido = $request->apellido;
        $person->doc_persona = $request->doc_persona;
        $person->fec_nac = $request->fec_nac;
        $person->id_rol = $request->id_rol;
        $person->telefono = $request->telefono;

        $person->save();

        return [
            "inserted" => 1,
            "person" => $person
        ];
    }

    public function deletePersona($id)
    {
        Person::destroy($id);
        return redirect('/');
    }
}
