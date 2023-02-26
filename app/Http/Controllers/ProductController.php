<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $products = Product::all()->sortByDesc("id");
        return view('products.product-index', ["products" => $products]);
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
        $product->imagen = $name;

        $product->save();  

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
        Product::destroy($id);

        $products = Product::all()->sortByDesc("id");
        return view('products.product-index', ["products" => $products]);
    }
}
