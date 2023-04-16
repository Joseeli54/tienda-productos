<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\Zona;
use Illuminate\Support\Facades\DB;


class ZonaController extends Controller
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
        $zonas = DB::select(DB::raw("  SELECT z.id, z.numero, z.descripcion, z.id_almacen, a.numero AS almacen
                                        FROM zona z
                                        LEFT JOIN almacen a ON a.id = z.id_almacen
                                        ORDER BY id DESC"));
        return view('zona.zona-index', ["zonas" => $zonas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacenes = Almacen::all();
        return view('zona.zona-create', ["almacenes" => $almacenes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zona = new Zona();

        $zona->numero = $request->numero;
        $zona->id_almacen = $request->id_almacen;
        $zona->descripcion = $request->descripcion;

        $zona->save();   

        return redirect('/zona');
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
    public function edit(Zona $zona)
    {

        $almacenes = Almacen::all();

        return view('zona.zona-edit', ["zona" => $zona, 
                                            "almacenes" => $almacenes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zona $zona)
    {
        $zona->numero = $request->numero;
        $zona->id_almacen = $request->id_almacen;
        $zona->descripcion = $request->descripcion;

        $zona->save();

        $zonas = DB::select(DB::raw("  SELECT z.id, z.numero, z.descripcion, z.id_almacen, a.numero AS almacen
                                        FROM zona z
                                        LEFT JOIN almacen a ON a.id = z.id_almacen
                                        ORDER BY id DESC"));

        return view('zona.zona-index', compact('zonas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {
        DB::table('producto')->where('id_zona', $zona->id)->delete();
        $zona->delete();

        return redirect('/zona');
    }
}
