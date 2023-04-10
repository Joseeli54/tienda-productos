<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Almacen;
use App\Models\Movimiento;
use App\Models\Marca;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $products = DB::select(DB::raw("
                    SELECT p.*, m.id_almacen
                    FROM producto p 
                    LEFT JOIN movimiento m ON p.id = m.id_producto
                    ORDER BY p.id DESC"));
        $almacenes = Almacen::all();
        $marcas = Marca::all();
        return view('products.product-index', ["products" => $products, 
                                               "almacenes" => $almacenes,
                                               "marcas" => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagen')){
          $file = $request->file('imagen');
          $name = time().$file->getClientOriginalName();
          $file->move(public_path().'/insertado/producto', $name);
        }
        else {
            $name='producto.png';
        }

        $product = new Product();

        $product->codigo = $request->codigo;
        $product->nombre = $request->nombre;
        $product->tipo = $request->tipo;
        $product->precio = $request->precio;
        $product->estado = 'Nuevo';
        $product->moneda = $request->moneda;
        $product->tipo = $request->tipo;
        $product->descripcion = $request->descripcion;
        $product->id_marca = $request->id_marca;
        $product->imagen = $name;

        $product->save();  

        $movimiento = new Movimiento();
        $movimiento->id_almacen = $request->id_almacen;
        $movimiento->id_producto = $product->id;

        $movimiento->save();

        $product->id_almacen = $request->id_almacen;

        return [
            "inserted" => 1,
            "product" => $product
        ];       
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
        $product = Product::where('id', $id)->first();
        $product->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
          $file = $request->file('imagen');
          $name = time().$file->getClientOriginalName();
          $file->move(public_path().'/insertado/producto', $name);
        } else {
          $name= $request->imagen;
        }

        $product->imagen = $name;

        $product->save();

        $movimiento = Movimiento::where('id_producto', $product->id)->first();
        if(!empty($movimiento)){
            if($movimiento->id_almacen !== $request->id_almacen){
                DB::table('movimiento')->where([
                                                  ['id_producto', $product->id], 
                                                  ['id_almacen', $movimiento->id_almacen]
                                               ])->update(['id_almacen' => $request->id_almacen]);
            }
        }else{
            $movimiento = new Movimiento();
            $movimiento->id_almacen = $request->id_almacen;
            $movimiento->id_producto = $product->id;

            $movimiento->save();
        }

        return [
            "updated" => 1,
            "product" => $product
        ];       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('movimiento')->where('id_producto', $id)->delete();
        Product::destroy($id);

        return redirect('/productos');
    }
}
