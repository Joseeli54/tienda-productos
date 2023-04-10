<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use Illuminate\Support\Facades\DB;


class UnidadMedidaController extends Controller
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
        $unidadmedida = DB::select(DB::raw("SELECT *
                                            FROM unidadmedida
                                            ORDER BY id DESC"));

        return view('unidadmedida.unidadmedida-index', ["unidadmedida" => $unidadmedida]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = DB::select(DB::raw("SELECT *
                                            FROM producto
                                            ORDER BY id DESC"));
        $unidades = ["Longitud", "Masa", "Volumen"];
        $abreviaturas = ["Longitud" => "m", "Masa" => "kg", "Volumen" => "m2"];

        return view('unidadmedida.unidadmedida-create', ["productos" => $productos,
                                                         "unidades" => $unidades, 
                                                         "abreviaturas" => $abreviaturas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidadmedida = new UnidadMedida();

        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->tipo = $request->tipo;
        $unidadmedida->abreviatura = $request->abreviatura;
        $unidadmedida->id_producto = $request->id_producto;
        $unidadmedida->valor = $request->valor;

        $unidadmedida->save();   

        return redirect('/unidadmedida');
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
