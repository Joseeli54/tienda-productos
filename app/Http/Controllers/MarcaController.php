<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Session;

class MarcaController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = DB::select(DB::raw("  SELECT *
                                        FROM marca
                                        ORDER BY id DESC"));
        $rol = Person::getRolePerson(Session::get('username'));
        return view('marcas.marca-index', ["marcas" => $marcas, "rol" => $rol]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.marca-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Marca();

        $marca->nombre = $request->nombre;
        $marca->pais = $request->pais;
        $marca->descripcion = $request->descripcion;

        $marca->save();   

        return redirect('/marcas');
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
    public function edit(Marca $marca)
    {
        return view('marcas.marca-edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //$marca->fill($request->all());
        $marca->nombre = $request->nombre;
        $marca->pais = $request->pais;
        $marca->descripcion = $request->descripcion;

        $marca->save();

        $marcas = Marca::all();

        return view('marcas.marca-index', compact('marcas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect('/marcas');
    }
}
