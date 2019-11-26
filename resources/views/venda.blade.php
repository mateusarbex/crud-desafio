@extends('layouts.app')
@section('content')
    

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Criar Venda') }}</div>
                  
                    
                    <div class="card-body">
                    <form method="POST" action="{{ route('venda.criar',Auth::user()->id) }}">
                    @csrf
                        <div class="form-group row">
                            <label for="cliente" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Cliente') }}</label>
            
                            <div class="col-md-6">
                                <input oninvalid="this.setCustomValidity('Diga o nome do cliente')"
                                oninput="this.setCustomValidity('')" id="cliente" type="text" class="form-control" placeholder="Cliente" name="cliente" value="" required autocomplete="nome" autofocus>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            @foreach ($produtos as $item)
                                <div class="row">
                                    <div class="form-group col-md-7">
                                        <label for='{{$item->id_produto}}-nome'>Produto</label>
                                        <div name='{{$item->id_produto}}-nome' id="nome-{{$item->nome}}"class="form-control">{{$item->nome}}</div>   
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="{{$item->id_produto}}-preco">Preço</label>
                                        <div name="{{$item->id_produto}}-preco"  id="preco-{{$item->nome}}" class="form-control">{{$item->preco}} </div> 
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="{{$item->id_produto}}-qtd">Quantidade</label>
                                        <input name="{{$item->id_produto}}-qtd" id="qtd-{{$item->nome}}" type="number" class="form-control prod-qtd">
                                    </div>
                                </div>
                            @endforeach  
                        </div>
                    </div>
                    <button type="submit" style="margin-top:10px;" class="btn btn-primary block ">Criar Venda
                        </form>
                </div>
                 
            </div>
            
        </div>
</div>
@endsection