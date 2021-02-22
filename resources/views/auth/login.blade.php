@extends('layouts.applogin')

@section('content')
<div class="container h-100">
    <div class="d-flex justify-content-center">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                @if(!empty(showModelTables('\App\Models\Empresa', 'logo')))
                <img src="{{ asset('img/'.showModelTables('\App\Models\Empresa', 'logo')) }}" class="brand_logo" alt="Logo">
                @else
                <img src="{{ asset('img/logo.jpg') }}" class="brand_logo" alt="Logo">
                @endif

                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="login" class="form-control input_user"
                            value="{{ old('username') ?: old('email') }}" placeholder="Usuário ou E-mail" required
                            autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password"
                            class="form-control input_pass @error('password') is-invalid @enderror"
                            value="{{ old('password') }}" placeholder="Senha" required autocomplete="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="customControlInline"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlInline">
                                {{ __('Lembre-me') }}
                            </label>
                        </div>
                    </div>



                        <button type="submit" class="btn login_btn">
                            {{ __('Entrar') }} <i class="fas fa-sign-in-alt"></i>
                        </button>



                </form>
            </div>

            <div class="mt-4">

                <div class="d-flex justify-content-center links">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="#" data-toggle="modal" data-target="#senhaModal">
                        {{ __('Perdeu sua senha?') }}
                    </a>
                    @endif
                </div>
                <div class="d-flex justify-content-center links">
                    @if (! App\Models\User::count())
                    <a class="btn btn-link" href="{{ route('register') }}">
                        {{ __('Cadastrar Administrador') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="senhaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom border-secundary">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle text-red"></i> Perda de Senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <i class="fa fa-lightbulb text-green"></i> Perdeu sua senha? Entre em contato com o administrador do sistema e solicite uma nova senha!
        </div>
        <div class="modal-footer border-top border-secundary">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
