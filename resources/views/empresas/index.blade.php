@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-industry" aria-hidden="true"></i> Empresa</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Empresa</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <div class="card-title">
            <i class="fas fa-sliders-h" aria-hidden="true"></i> Configurações da Empresa
        </div>
    </div>
    @foreach ($empresas as $empresa)

    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('empresas.update', [$empresa->id_empresa]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Empresa:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="empresa"
                        value="{{old('empresa', $empresa->empresa)}}">
                    @error('empresa')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo cliente deve ser
                        preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Razão
                    Social:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="razao"
                        value="{{ old('razao', $empresa->razao) }}">
                    @error('razao')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    CNPJ:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="cnpj" value="{{ old('cnpj', $empresa->cnpj) }}">
                    @error('cnpj')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Logo:</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="validatedCustomFile"
                            value="{{ old('logo', $empresa->logo) }}" required>
                        <label class="custom-file-label" for="validatedCustomFile"></label>
                    </div>
                    @error('logo')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Endereço:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="endereco"
                        value="{{ old('endereco', $empresa->endereco) }}">
                    @error('endereco')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Bairro:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bairro" value="{{ old('bairro', $empresa->bairro) }}">
                    @error('bairro')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Cidade:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cidade" value="{{ old('cidade', $empresa->cidade) }}">
                    @error('cidade')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    CEP:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cep" value="{{ old('cep', $empresa->cep) }}">
                    @error('cep')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Telefone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefone"
                        value="{{ old('telefone', $empresa->telefone) }}">
                    @error('telefone')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Site:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="site" value="{{ old('site', $empresa->site) }}">
                    @error('site')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    E-mail:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{ old('email', $empresa->email) }}">
                    @error('email')
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
