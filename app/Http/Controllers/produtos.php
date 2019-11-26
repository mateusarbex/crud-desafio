<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Venda_Produto;
use PDF;
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
        Venda_Produto::where('produto',$id_produto)->delete();
        Produto::where('id_produto',$id_produto)->delete();
        $produtos = Produto::all();
        return view('produto',['produtos'=>$produtos]);
    }
    public function generate(){
        $produtos = $this->getProdTotal();
        $pdf = PDF::loadView('pdf-produtos', compact('produtos'));
        return $pdf->download('relatorio-produtos.pdf');
    
    }
    public function getProdTotal(){
        $total_prod = array();
        $produtos = Produto::all();
        foreach($produtos as $prod){
            $result = Venda_Produto::where('produto',$prod->id_produto)->sum('qtd');
            $criado = explode(' ',$prod->created_at)[0];
            $alterado = explode(' ',$prod->updated_at)[0];
            array_push($total_prod,['id_produto'=>$prod->id_produto,'nome'=>$prod->nome,'preco'=>$prod->preco,'created_at'=>$criado,'updated_at'=>$alterado,'total'=>$result]);
        }
        return $total_prod;
    }
    public function relatorio(){
        $total_prod = $this->getProdTotal();
        return view('produto-relatorio',['produtos'=>$total_prod]);  
    }
}
