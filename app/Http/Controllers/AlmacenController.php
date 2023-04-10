<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
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
        $almacenes = DB::select(DB::raw("  SELECT *
                                        FROM almacen
                                        ORDER BY id DESC"));
        return view('almacenes.almacen-index', ["almacenes" => $almacenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacenes.almacen-create-form');
    }

    public function crearAlmacen(Request $request){

        $almacen = new Almacen();

        $almacen->numero = $request->numero;
        $almacen->tipo = $request->tipo;
        $almacen->descripcion = $request->descripcion;

        $almacen->save();                 

        return [
            "inserted" => 1,
            "almacen" => $almacen
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = new Almacen();

        $almacen->numero = $request->numero;
        $almacen->tipo = $request->tipo;
        $almacen->descripcion = $request->descripcion;

        $almacen->save();   

        return redirect('/almacen');
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
    public function edit(Almacen $almacen)
    {
        return view('almacenes.almacen-edit-form',compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        //$marca->fill($request->all());
        $almacen->numero = $request->numero;
        $almacen->tipo = $request->tipo;
        $almacen->descripcion = $request->descripcion;

        $almacen->save();

        $almacenes = Almacen::all();

        return view('almacenes.almacen-index', compact('almacenes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAlmacen($id)
    {
        DB::table('movimiento')->where('id_almacen', $id)->delete();
        Almacen::destroy($id);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {
        $almacen->delete();

        return redirect('/almacen');
    }
}
