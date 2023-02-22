<?php

namespace App\Http\Controllers;
use App\Models\Almacen;
use App\Models\Person;

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
        $almacenes = Almacen::all()->sortByDesc("id")->take(3);
        $persons = Person::all()->sortByDesc("id")->take(3);

        return view('home', ["almacenes" => $almacenes, 
                            "persons" => $persons]);
    }
}
