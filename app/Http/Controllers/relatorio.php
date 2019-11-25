<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use App\Venda;
use App\User;
use PDF;


class relatorio extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function getDataEhorario($venda){
        $data_e_horario = explode(' ', $venda->created_at);
        $venda->data = $data_e_horario[0];
        $venda->horario = $data_e_horario[1];
        return $venda;
    }
    public function filterMes($venda){
        $mes_atual = date('m');
        $mes_venda = date('m',strtotime($venda->created_at));
        return $mes_atual == $mes_venda;
    }
    public function createRelatorio($id){
        $vendendor = User::find($id);
        $vendas = Venda::where('vendendor_responsavel',$vendendor->id)->get();
        foreach($vendas as $venda){
           $venda = $this->getDataEhorario($venda);
        }
        return view('relatorio',['vendas'=>$vendas,'vendendor'=>$vendendor]);
    }
    public function downloadPDF($vendendor){
        $month = array('null','Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
        $mes = date('m');
        $total = 0;
        $vendas = array();
        $vendendor = User::find($vendendor);
        $total_vendas = Venda::where('vendendor_responsavel',$vendendor->id)->get();
        foreach($total_vendas as $venda){
            $venda = $this->getDataEhorario($venda);
            $mes_da_venda = date('m',strtotime($venda->data));
            if($mes_da_venda==$mes){
                array_push($vendas,$venda);
                $total+=$venda->valor;
            }
        }
        
        $mes = $month[$mes];
        $pdf = PDF::loadView('pdf', compact(['vendas','vendendor','mes','total']));
        return $pdf->download('relatorio.pdf');
    
    }
}
