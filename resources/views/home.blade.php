
@extends('layouts.app')
@section('content')
<div class="container">
    <a  href="{{ url('/produto') }}" class="btn btn-primary"> Adicionar Produto</a>
    <a  href="{{ url('venda')}}" class="btn btn-primary float-right">Criar Venda</a>
            <div class="row justify-content-center block" style="margin-top:20px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header col-md-12 ">{{ __('Vendas realizadas') }}</div>
                        @if(count($vendas)>0)
                        @foreach ($vendas as $item)
                            <div class="row" style="margin:10px;">
                                <div class="col-md-2">
                                <label for={{$item->numero_venda}}>Número da venda</label>
                                <input name={{$item->numero_venda}} class="form-control" readonly value={{$item->numero_venda}}>
                            </div>
                            <div class="col-md-4">
                                <label for={{$item->vendendor_responsavel_nome}}>Vendendor Responsável</label>
                                <div  name={{$item->vendendor_responsavel_nome}} class="form-control" readonly  >{{$item->vendendor_responsavel_nome}}</div>
                            </div>
                            <div class="col-md-3">
                                <label for={{$item->valor}}>Total da venda (R$)</label>
                                <input name={{$item->valor}} class="form-control text-align-center" readonly value={{$item->valor}} >
                            </div>
                            <div class="col-md-3">
                                <label for={{$item->id_venda}}>Data da venda</label>
                                <input name={{$item->id_venda}} class="form-control text-align-center" readonly value={{$item->created_at}} >
                            </div>
                        </div>      
                        @endforeach
                        @else
                        <div class="col-md-12 justify-content-center" style="text-align:center;margin-top:20px;">Não há vendas realizadas</div>
                        @endif
                        
                        <div class="card-body text-align-center">
                            <div>
                                <button class="btn btn-primary btn-lg">Ver relatório de vendas</button>
                            </div>
                    </div>
                </div>  
            </div>
                
</div>
@endsection
