<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Venda;
use App\User;
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
        $total = 0;
        $produtos = Produto::all();
        foreach($produtos as $item){
            array_push($compra,['nome'=>$item->nome,'preco'=>$item->preco,'quantidade'=>$request->input($item->id_produto . '-qtd')]);

        }
        foreach($compra as $item){
            $total = $total + ($item['preco']*$item['quantidade']);
        }
        return Venda::create([
            'numero_venda'=>$id_vendendor . Venda::last()->id_venda,
            'valor'=>$total,
            'vendendor_responsavel'=>$id_vendendor
        ]);
    }
    public function vendendores($id_vendendor){
        return User::where('id',$id_vendendor);
    }
}
