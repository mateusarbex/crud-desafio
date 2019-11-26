@extends('layouts.app')

@section('content')
<div class="container">
        @yield('produto')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Criar novo produto') }}</div>
                    <div class="card-body">
                    <form method="POST" id="form-criar"action="{{ route('produto.criar') }}">
                    @csrf
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label text-md-left">{{ __('Nome') }}</label>
                            <div class="col-md-3">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                            </div>
                            <label for="preco" class="col-md-2 col-form-label text-md-left">{{ __('Preço') }}</label>
                            <div class="col-md-3">
                                <input id="preco" type="number" step="0.01"   class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ old('preco') }}" required autocomplete="preco" autofocus>
                            </div>
                            <button class="btn btn-primary" type="submit">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
                <div class="card">
                    <div class="card-header">{{ __('Produtos existentes') }}
                    </div>        
                    <div class="card-body">
                        @if(count($produtos)>0)
                        @foreach ($produtos as $item)
                        <form style="border:solid thin lightgray;border-radius:10px;padding:20px;margin-bottom:10px;" id="form-{{$item->nome}}" method="POST" action="{{route('produto.alterar',$item->id_produto)}}">
                         @csrf
                            <div class="form-group row align-items-end">
                                <div class="col-md-3">
                                    <label for='nome'>Produto</label>
                                    <input onchange="alterado('{{$item->nome}}','nome')" name="nome" id="nome-{{$item->nome}}" class="form-control" required readonly value={{$item->nome}}>
                                </div>
                                <div class="col-md-3" style="padding-left:0;padding-right:0;">
                                    <button type="button" class="btn btn-primary"  onclick="alterarProduto('{{$item->nome}}','nome')">Alterar
                                    <button type="submit" class="btn btn-success" onclick="confirmarProduto('{{$item->nome}}','nome')">Confirmar
                                    <button type="button" class="btn btn-warning" onclick="cancelarProduto('{{$item->nome}}','{{$item->nome}}','nome')">Cancelar
                                </div>  
                                <div class="col-md-2">
                                    <label for='preco'>Preço</label>
                                    <input onchange="alterado('{{$item->nome}}','preco')" name="preco"id="preco-{{$item->nome}}" type="number" step="0.01" class="form-control" required minlength="1" readonly value={{$item->preco}}>
                                </div>
                                <div class="col-md-4" style="margin-left:5;margin-right:5; ">
                                    <button type="button" class="btn btn-primary" onclick="alterarProduto('{{$item->nome}}','preco')">Alterar
                                    <button type="submit" class="btn btn-success" onclick="confirmarProduto('{{$item->nome}}','preco')">Confirmar
                                    <button type="button" class="btn btn-warning" onclick="cancelarProduto('{{$item->nome}}',{{$item->preco}},'preco')">Cancelar
                                </div>  
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for='data-criada'>Data de criação</label>
                                    <input name='data-criada' class="form-control" disabled value={{$item->created_at}}>
                                </div>
                                <div class="col-md-2">
                                    <label for='data-alterada'>Alterado em</label>
                                    <input name='data-alterada' class="form-control" disabled value={{$item->updated_at}}>
                                </div>
                                
                            </div>
                           
                            </form> 
                            <form onsubmit="return confirm('Deseja apagar o produto {{$item->nome}}?')" method="POST" action="{{route('produto.delete',$item->id_produto)}}">
                                    @method('DELETE')
                                    @csrf
                                    <div style="margin-top:20px" class="form-group row"> 
                                        <div class="col-md-12 text-align-center">
                                        <button type="submit" style="width:40%;" class="btn btn-danger btn-lg">Apagar</button>
                                    </div>  
                            </div>
                        
                            </form>

                            @endforeach
                            @else
                                <div class="row justify-content-center">
                                    <div class="form-group" >Não há algum produto registrado</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  
@endsection
@section('produto'){
    <script src="js/app.js"></script>
}
    
@endsection