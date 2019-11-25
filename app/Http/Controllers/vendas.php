<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Venda;
class vendas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $produtos = Produto::all();
        return view('venda', ['produtos'=>$produtos]);
    }
    public function criar($id_vendendor,Request $request){
        $compra = array( );
        $produtos = Produto::all();
        foreach($produtos as $item){
            array_push($compra,['nome'=>$item->nome,'preco'=>$item->preco,'quantidade'=>$request->input($item->id_produto . '-qtd')]);

        }
        Venda::create(
            []
        );
        return $compra;
    }
}
