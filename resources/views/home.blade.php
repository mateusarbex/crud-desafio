
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
                        @else
                        <div class="col-md-12 justify-content-center" style="text-align:center;margin-top:20px;">Não há vendas realizadas</div>
                        @endif
                        <div class="card-body">
                    </div>
                </div>  
            </div>
                
</div>
@endsection
