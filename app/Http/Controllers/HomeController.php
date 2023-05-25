<?php

namespace App\Http\Controllers;
use App\Models\Almacen;
use App\Models\Person;
use Session;

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
        $totals_persons = 0;

        if($_GET){
            if(!empty($_GET['totals_persons'])){
                $persons = Person::all()->sortByDesc("id");
                $totals_persons = 1;
            }else{
                $persons = Person::all()->sortByDesc("id")->take(3);
                $totals_persons = 0;
            }
        }else{
            $persons = Person::all()->sortByDesc("id")->take(3);
            $totals_persons = 0;
        }
        
        $rol = Person::getRolePerson(Session::get('username'));

        return view('home', ["almacenes" => $almacenes, 
                            "persons" => $persons,
                            "rol" => $rol, 
                            "totals_persons" => $totals_persons]);
    }
}
