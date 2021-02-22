@extends('layouts.app')

@section('content')

    <div class="card bg-light shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="title-head"><i class="fa fa-memory"></i> Peças</h3>
                </div>
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pecas.index') }}">Peças</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-header clearfix">
            <a href="{{ route('pecas.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i>
                Voltar</a>
            <form id="form-search" action="{{ route('pecas.busca') }}" method="POST"
                class="form-inline d-flex justify-content-end">
                @csrf
                @method('POST')
                <div class="input-group">
                    <input id="" type="text" class="peca form-control rounded-left col-xs-4" name="term"
                        placeholder="Buscar por peça" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="rounded-right btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body">
            @include("flash::message")
            <form action="{{ route('pecas.store') }}" method="POST" autocomplete="off">
                @method('POST')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Peça:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="peca" value="{{ old('peca') }}">
                        @error('peca')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo peça deve ser
                                preenchido!</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Descrição:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="descricao">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Fabricante:</label>
                    <div class="col-sm-10">
                        <input id="" type="text" class="form-control" name="fabricante" value="{{ old('fabricante') }}">
                        @error('fabricante')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Quantidade:</label>
                    <div class="col-sm-10">
                        <input id="" type="text" class="form-control" name="quantidade" value="{{ old('quantidade') }}">
                        @error('quantidade')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Valor:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valor" value="{{ old('valor') }}">
                        @error('valor')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                @php
                    $situacao = [
                        '' => 'Selecione o situacao',
                        'Nova' => 'Nova',
                        'Usada' => 'Usada',
                        'Remanufaturada' => 'Remanufaturada',
                    ];
                @endphp
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                        Situação:</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" name="situacao">
                            @foreach ($situacao as $key => $value)
                                <option value="{{ $key }}" {{ old('situacao') == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('situacao')
                            <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Observações:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="observacaos">{{ old('fabricante') }}</textarea>
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
        $('.peca').autocomplete({
            minLength: 1,
            autoFocus: true,
            delay: 300,
            source: function(request, response) {
                _token = $("input[name='_token']").val();
                $.ajax({
                    url: '{{ route('pecas.autocomplete') }}',
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
                $('.peca').val(ui.item.label);
                //$('.peca_id').val(ui.item.value);
                return false;
            }
        });

    </script>

@endsection
