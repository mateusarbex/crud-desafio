<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Venda;
use App\User;

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
        $vendas = DB::table('vendas')->simplePaginate(10);
        foreach($vendas as $venda){
            $user = User::find($venda->vendendor_responsavel);
            $venda->vendendor_responsavel_nome = $user->nome;
        }
        return view('home',['vendas'=>$vendas]);
    }
}
