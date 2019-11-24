@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Criar novo produto') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('criar') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nome" class="col-sm-1 col-form-label text-md-left">{{ __('Nome') }}</label>

                        <div class="col-md-5">
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                        </div>
                        <label for="preco" class="col-md-1 col-form-label text-md-left">{{ __('Preço') }}</label>

                        <div class="col-md-3">
                            <input id="preco" type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ old('preco') }}" required autocomplete="preco" autofocus>
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
                        @foreach ($produtos as $item)
                        <form id="form-{{$item->nome}}" method="PUT" action="{{url('/produto')}}">
                                @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-3">
                                <input name="nome" id="nome-{{$item->nome}}" class="form-control" disabled value={{$item->nome}}>
                            </div>
                                <div class="col-md-2">
                                  <button type="button" class="btn btn-primary" onclick="
                                      const input = document.querySelector('#nome-{{$item->nome}}');
                                      input.removeAttribute('disabled');
                                      input.focus(); 
                                      input.addEventListener('blur',()=>{
                                      if(confirm('Deseja altera o nome?')){
                                        input.setAttribute('disabled','disabled');
                                        const form = document.querySelector('#form-{{$item->nome}}')
                                        form.submit();
                                        console.log(form)
                                      }
                                      else{
                                        setTimeout(()=>{input.focus()},1)
                                         
                                        }})
                                    ">Alterar</button>
                            </form>
                            </div>
                            <div class="col-md-3">
                                <input name="preco" id="preco-{{$item->nome}}" class="form-control" disabled value={{$item->preco}}>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" onclick="
                                const input = document.querySelector('#preco-{{$item->nome}}');
                                input.removeAttribute('disabled');
                                input.focus(); 
                                input.addEventListener('blur',()=>{
                                    if(confirm('Deseja altera o nome?')){
                                        input.setAttribute('disabled','disabled')
                                        
                                    }
                                    else{
                                        setTimeout(()=>{input.focus()},1)
                                         
                                    }}
                                    )
                               ">Alterar</button> 
                            </div>
                        </form> 
                        <form>
                            <div class="col-md-2">
                                <button class="btn btn-danger">Apagar</button>
                            </div>
                        </div>    
                    </form>
                        @endforeach
                    </div>
                </div>
    
        </div>
    </div>
@endsection