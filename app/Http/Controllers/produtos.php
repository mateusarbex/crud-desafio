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
    public function alterar($id_produto,Request $request){
        if($request->input('nome')){
           Produto::where('id_produto',$id_produto)->update(['nome'=>$request->input('nome')]);
        }
        if($request->input('preco')){
            Produto::where('id_produto',$id_produto)->update(['preco'=>$request->input('preco')]);
        }
        $produtos = Produto::all();
        return view('produto',['produtos'=>$produtos]);
        }
    public function delete($id_produto){
        Produto::where('id_produto',$id_produto)->delete();
        $produtos = Produto::all();
        return view('produto',['produtos'=>$produtos]);
    }
}
