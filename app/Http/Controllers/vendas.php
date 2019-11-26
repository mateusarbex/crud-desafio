<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Venda;
use App\Venda_Produto;
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
        $id = Venda::orderBy('id_venda','desc')->first();
        $numero = 0;
        $id?$numero = $id->id_venda+1:1;
        foreach($produtos as $item){
            if($request->input($item->id_produto. '-qtd')>0){
                array_push($compra,['produto'=>$item->id_produto,'nome'=>$item->nome,'preco'=>$item->preco,'quantidade'=>$request->input($item->id_produto . '-qtd')]);
            }

        }
        foreach($compra as $item){
            $total = $total + ($item['preco']*$item['quantidade']);
        }
        if($id){
            $venda = Venda::create([
                'numero_venda'=>$numero+1   ,
                'valor'=>$total,
                'vendendor_responsavel'=>$id_vendendor,
                'cliente' =>$request->input('cliente')
        ]);
        }
        else{
            $venda = Venda::create([
                'numero_venda'=>$numero+1,
                'valor'=>$total,
                'vendendor_responsavel'=>$id_vendendor,
                'cliente' =>$request->input('cliente')
            ]);

        }
        foreach($compra as $item){
            Venda_Produto::create([
                'venda'=>$venda->id_venda,
                'produto'=>$item['produto'],
                'qtd'=>$item['quantidade']
            ]);
        }
        return back();
    }
    public function vendendores($id_vendendor){
        return User::where('id',$id_vendendor);
    }
}
