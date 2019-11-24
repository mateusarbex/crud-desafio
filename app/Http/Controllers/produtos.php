<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class produtos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $produtos = Produto::all();
        return view('produto',['produtos'=>$produtos]);
    }
    public function criar(Request $request){
        
        Produto::create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
        ]);
        return back();
    }
    public function alterar(Request $request){
        Produto::where('nome',$request->input('nome'))->update(['nome'=>$request->input('nome')]);
        return back();
        }
    public function voltar(){
        echo 'ok';
        return;
    }
}
