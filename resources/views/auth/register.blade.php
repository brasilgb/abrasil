@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card" style="height: 500px!important;width: 400px;">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="{{ asset('img/logo.jpg') }}" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="name" type="text" class="form-control input_user @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" placeholder="Nome" required autocomplete="name"
                            autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" placeholder="Nome de usuário" required
                            autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="hidden" name="funcao" value="1">

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Senha" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="Repita a senha" required autocomplete="new-password">
                    </div>


                        <button type="submit" class="btn login_btn">
                            <i class="fa fa-user"></i>
                            {{ __('Cadastrar') }}
                        </button>

                </form>
            </div>
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    <span class="text-red" style="margin-bottom: 10px;font-size: 1rem;"><i class="fa fa-exclamation-triangle"></i> Este é um cadastro de Administrador do sistema.</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
