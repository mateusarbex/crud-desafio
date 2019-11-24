@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-16">
        <div class="card">
            <div class="card-header">{{ __('Criar novo produto') }}</div>

            <div class="card-body">
                <form method="POST" id="form-criar"action="{{ route('produto.criar') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nome" class="col-sm-1 col-form-label text-md-left">{{ __('Nome') }}</label>

                        <div class="col-md-5">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                        </div>
                        <label for="preco" class="col-md-1 col-form-label text-md-left">{{ __('Preço') }}</label>

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
                        <form id="form-{{$item->nome}}" method="POST" action="{{route('produto.alterar',$item->id_produto)}}">
                         @csrf
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <input onchange="document.querySelector('#nome-{{$item->nome}}')" name="nome" id="nome-{{$item->nome}}" class="form-control" readonly value={{$item->nome}}>
                                </div>
                                <div class="col-md-1">
                                    <button type="button"  class="btn btn-primary"  onclick="
                                    const input = document.querySelector('#nome-{{$item->nome}}');
                                    input.removeAttribute('readonly');
                                    input.focus(); 
                                    input.addEventListener('blur',()=>{
                                        input.setAttribute('readonly','readonly');
                                        }
                                    )
                                    ">Alterar</button>
                                </div>  
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success" onclick="
                                    const input = document.querySelector('#nome-{{$item->nome}}');
                                    input.removeAttribute('readonly');
                                    ">Confirmar
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-warning" onclick="
                                    const input = document.querySelector('#nome-{{$item->nome}}');
                                    input.value='{{$item->nome}}'
                                    ">Cancelar
                                </div>
                                <div class="col-md-2">
                                    <input name="preco"id="preco-{{$item->nome}}" type="number" step="0.01" class="form-control" readonly value={{$item->preco}}>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-primary" onclick="
                                    const input = document.querySelector('#preco-{{$item->nome}}');
                                    input.removeAttribute('readonly');
                                    input.focus(); 
                                    input.addEventListener('blur',()=>{
                                        input.setAttribute('readonly','readonly')
                                        }
                                    )
                                    ">Alterar</button>  
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success" onclick="
                                    const input = document.querySelector('#preco-{{$item->nome}}');
                                    input.removeAttribute('readonly');
                                    ">Confirmar
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-warning" onclick="
                                    const input = document.querySelector('#preco-{{$item->nome}}');
                                    input.value='{{$item->nome}}'
                                    ">Cancelar
                                </div>
                        </form> 
                        <form method="POST" action="{{route('produto.delete',$item->id_produto)}}">
                        @method('DELETE')
                        @csrf
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </div>
                        </div>    
                        </form>
                        @endforeach
                        @else
                        <div class="row">
                        <h3 class="col-lg-20 center">Não há algum produto registrado</h3>
                        </div>
                        
                        @endif
                        
                    </div>
                </div>
        </div>
    </div>
@endsection