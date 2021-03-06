@extends('layouts.app')

@section('content')

    <div class="card bg-light shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="title-head"><i class="fa fa-users"></i> Clientes</h3>
                </div>
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-header clearfix">
            <a href="{{ route('clientes.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i>
                Voltar</a>
            <form id="form-search" action="{{ route('clientes.busca') }}" method="POST"
                class="form-inline d-flex justify-content-end">
                @csrf
                @method('POST')
                <div class="input-group">
                    <input id="input-search" type="text" class="form-control rounded-left col-xs-4" name="term"
                        placeholder="Buscar cliente" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="rounded-right btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body">
            @include("flash::message")
            <form action="{{ route('clientes.store') }}" method="POST" autocomplete="off">
                @method('POST')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Nome do
                        cliente:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cliente" value="{{ old('cliente') }}">
                        @error('cliente')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Nascimento:</label>
                    <div class="col-sm-10">
                        <input id="dateform" type="text" class="form-control" name="nascimento"
                            value="{{ old('nascimento') }}">
                        @error('nascimento')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        E-mail:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Telefone:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control telefone" name="telefone" value="{{ old('telefone') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Celular:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control celular" name="celular" value="{{ old('celular') }}">
                        @error('celular')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Logradouro:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}">
                        @error('logradouro')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Número:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="numero" value="{{ old('numero') }}">
                        @error('numero')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Complemento:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="complemento" value="{{ old('complemento') }}">
                        @error('complemento')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Bairro:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">
                        @error('bairro')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        UF:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="estado" value="{{ old('estado', 'RS') }}">
                        @error('estado')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> UF</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Cidade:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}">
                        @error('cidade')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        CEP:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control cep" name="cep" value="{{ old('cep') }}">
                        @error('cep')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        CPF:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control cpf" name="cpf" value="{{ old('cpf') }}">
                        @error('cpf')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">RG:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rg" name="rg" value="{{ old('rg') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Contato:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="contato" value="{{ old('contato') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Telefone do contato:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control telefone" name="telefone_contato"
                            value="{{ old('telefone_contato') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">Celular do contato:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control celular" name="celular_contato"
                            value="{{ old('celular_contato') }}">
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
        $('#input-search').autocomplete({
            minLength: 1,
            autoFocus: true,
            delay: 300,
            source: function(request, response) {
                _token = $("input[name='_token']").val();
                $.ajax({
                    url: '{{ route('clientes.autocomplete') }}',
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
            select: function(event, ui) {
                $('#input-search').val(ui.item.label);
                //$('#employeeid').val(ui.item.value);
                return false;
            }
        });
        $("#dateform, #searchform").datepicker({
            locale: 'pt-BR'
        });

    </script>

@endsection
