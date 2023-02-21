<?php

namespace App\Http\Controllers;
use App\Models\Almacen;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $almacenes = Almacen::all()->sortByDesc("id");
        return view('home', ["almacenes" => $almacenes]);
    }
}
