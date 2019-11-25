<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;

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
        $vendas = Venda::all();
        return view('home',['vendas'=>$vendas]);
    }
}
