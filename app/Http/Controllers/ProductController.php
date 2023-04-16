<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Almacen;
use App\Models\Movimiento;
use App\Models\Marca;
use App\Models\Zona;
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
        $zonas = Zona::all();
        return view('products.product-index', ["products" => $products, 
                                               "almacenes" => $almacenes,
                                               "marcas" => $marcas,
                                               "zonas" => $zonas]);
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
        $product->id_zona = $request->id_zona;
        $product->imagen = $name;
        $product->cantidad = $request->cantidad;

        $product->save();  

        $movimiento = new Movimiento();
        $movimiento->id_producto = $product->id;
        $movimiento->id_almacen = $request->id_almacen;

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
        $product = DB::select(DB::raw("
                    SELECT p.id,
                           p.nombre,
                           p.codigo,
                           p.cantidad,
                           p.estado,
                           p.precio,
                           p.moneda,
                           p.tipo,
                           p.descripcion,
                           p.imagen,
                           m.id_almacen,
                           p.id_marca,
                           a.numero,
                           z.numero AS zona,
                           ma.nombre AS marca
                    FROM producto p 
                    LEFT JOIN movimiento m ON p.id = m.id_producto
                    LEFT JOIN almacen a ON a.id = m.id_almacen
                    LEFT JOIN marca ma ON ma.id = p.id_marca
                    LEFT JOIN zona z ON z.id = p.id_zona
                    WHERE p.id = $id
                    ORDER BY p.id DESC"));

        $unidadmedida = DB::select(DB::raw("
                    SELECT um.*
                    FROM unidadmedida um
                    WHERE um.id_producto = $id
                    ORDER BY um.id DESC"));

        $almacenes = Almacen::all();
        $marcas = Marca::all();
        $zonas = Zona::all();

        return view('products.product-show', ["product" => $product[0], 
                                               "unidadmedida" => $unidadmedida, 
                                               "almacenes" => $almacenes,
                                               "marcas" => $marcas,
                                               "zonas" => $zonas]);
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
        DB::table('unidadmedida')->where('id_producto', $id)->delete();
        Product::destroy($id);

        return redirect('/productos');
    }
}
