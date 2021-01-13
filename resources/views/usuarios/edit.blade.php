@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-calendar"></i> Usuário</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuário</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alterar</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i>
            Voltar</a>
        <form id="form-search" action="{{ route('usuarios.busca') }}" method="POST"
            class="form-inline d-flex justify-content-end">
            @csrf
            @method('POST')
            <div class="input-group">
                <input id="" type="text" class="usuario form-control rounded-left col-xs-4" name="term"
                    placeholder="Buscar por usuario" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="rounded-right btn btn-outline-secondary" type="submit"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

    </div>
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('usuarios.update',['usuario' => $usuario->id]) }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{old('name', $usuario->name)}}">
                    @error('name')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo peça deve ser
                        preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="{{ old('username', $usuario->username) }}">
                    @error('username')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    E-mail:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="email" value="{{ old('email', $usuario->email) }}">
                    @error('email')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            @php
            $funcao = [
            '' => 'Selecione a função',
            '1' => 'Administrador',
            '2' => 'Operador',
            '3' => 'Técnico'
            ];
            @endphp
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Função:</label>
                <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" name="funcao">
                        @foreach ($funcao as $key => $value)
                        <option value="{{ $key }}" {{ old('funcao', $usuario->funcao) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('funcao')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    @error('password')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo senha deve ser preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Repita e senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Confirme a senha para continuar!</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                </div>
            </div>
        </form>

    </div>
</div>
<script>
    $('.usuario').autocomplete({
    minLength: 1,
    autoFocus: true,
    delay: 300,
    source: function(request, response) {
        _token = $("input[name='_token']").val();
        $.ajax({
                url: '{{ route("usuarios.autocomplete") }}',
                type: 'POST',
                dataType: "json",
                data: {
                    '_token': _token,
                    'term': request.term
                    },
                    success: function(data) {
                        response(data);
                    }
            });
        },
        select: function (event, ui) {
            $('.usuario').val(ui.item.label);
           //$('.usuario_id').val(ui.item.value);
           return false;
        }
});
</script>

@endsection
