@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-at" aria-hidden="true"></i> E-mail</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> e-mail</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <div class="card-title">
            <i class="fas fa-sliders-h" aria-hidden="true"></i> Configurações de e-mail
        </div>
    </div>
    @foreach ($emails as $email)

    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('emails.update', [$email->id_email]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Servidor SMTP:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="servidor"
                        value="{{old('servidor', $email->servidor)}}">
                    @error('servidor')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Porta:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="porta"
                        value="{{ old('porta', $email->porta) }}">
                    @error('porta')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Segurança:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="seguranca" value="{{ old('seguranca', $email->seguranca) }}">
                    @error('seguranca')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Usuário:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="usuario" value="{{ old('usuario', $email->usuario) }}">
                    @error('usuario')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="senha"
                        value="{{ old('senha', $email->senha) }}">
                    @error('senha')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
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
    @endforeach
</div>
<script>

</script>

@endsection
