@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="{{ asset('img/logo.jpg') }}" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="login" class="form-control input_user" value="{{ old('username') ?: old('email') }}" placeholder="Usuário ou E-mail" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror" value="{{ old('password') }}"  placeholder="Senha" required autocomplete="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customControlInline">
                                        {{ __('Lembre-me') }}
                                    </label>
                        </div>
                    </div>

                        <div class="d-flex justify-content-center mt-3 login_container">

                 <button type="submit" class="btn login_btn">
                    {{ __('Entrar') }} <i class="fas fa-sign-in-alt"></i>
                </button>

               </div>

                </form>
            </div>

            <div class="mt-4">

                <div class="d-flex justify-content-center links">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Perdeu sua senha?') }}
                    </a>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
