@extends('layouts.app')

@section('content')
@yield('functions')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input oninvalid="this.setCustomValidity('Preencha com seu nome')"
                                oninput="this.setCustomValidity('')"  id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Nome preenchido incorretamente</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-mail') }}</label>

                            <div class="col-md-6">
                                <input oninvalid="this.setCustomValidity('Preencha com seu E-mail')" oninput="this.setCustomValidity('')" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>E-mail já cadastrado</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                            <div class="col-md-4">
                                <input oninvalid="this.setCustomValidity('Coloque os números corretamente')" oninput="this.setCustomValidity('')" id="cep" type="tel" pattern="[0-9]+" minlength="8" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="cep" autofocus>
                                
                            </div>
                            <button type="button" id="cep-search" onclick="searchCEP(document.querySelector('#cep'))" class="btn btn-primary">Procurar</button>
                        </div>
                        <div class="form-group row">
                            <label for="rua" class="col-md-4 col-form-label text-md-right">{{ __('Rua') }}</label>

                            <div class="col-md-6">
                                <input oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Preencha com rua do seu endereço')" id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" value="{{ old('rua') }}" required autocomplete="rua" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Senha precisa de no mínimo 6 caracteres')" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" minlength="6" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme sua senha') }}</label>

                            <div class="col-md-6">
                                <input oninput="check(this)" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        @yield('functions')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Criar conta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('functions')
    <script src="js/app.js">
    </script>
    
    
@endsection
