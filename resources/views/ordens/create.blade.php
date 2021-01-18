@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-tools"></i> Ordens</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ordens.index') }}">Ordens</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
            </ol>
          </nav>
    </div>
  </div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('ordens.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i> Voltar</a>
        <form id="form-search" action="{{ route('ordens.busca') }}" method="POST"
        class="form-inline d-flex justify-content-end">
        @csrf
        @method('POST')
        <div class="input-group">
            <input id="input-search" type="text" name="term" class="form-control rounded-left col-xs-4" name="term"
                placeholder="Buscar ordem">
            <div class="input-group-append">
                <button class="rounded-right btn btn-outline-secondary" type="submit"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    </div>
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('ordens.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> <span class="bg-primary">Ordem n°:</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="" value="{{ $proxordem }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Cliente</label>
                <div class="col-sm-10">
                    <input  id="cliente" type="text" class="form-control" name="cliente" value="{{old('cliente')}}">
                    <input id="cliente_id" type="hidden" class="form-control" name="cliente_id" value="{{old('cliente_id')}}">
                    @error('cliente_id')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo cliente deve ser preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Equipamento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="equipamento" value="{{old('equipamento')}}">
                    @error('equipamento')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Modelo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modelo" value="{{old('modelo')}}">
                    @error('modelo')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Senha:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="senha" value="{{old('senha')}}">
                    @error('senha')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Defeito:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="defeito" value="{{old('defeito')}}">
                    @error('defeito')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Estado:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="estado" value="{{old('estado')}}">
                    @error('estado')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Acessórios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="acessorios" value="{{old('acessorios')}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Observações:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="observacoes">{{old('observacoes')}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Previsão:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="previsao" value="{{old('previsao')}}">
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
                url: '{{ route("ordens.autocomplete") }}',
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
            $('#input-search').val(ui.item.value);
           return false;
        }
});

$('#cliente').autocomplete({
    minLength: 1,
    autoFocus: true,
    delay: 300,
    source: function(request, response) {
        _token = $("input[name='_token']").val();
        $.ajax({
                url: '{{ route("clientes.autocomplete") }}',
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
            $('#cliente').val(ui.item.label);
            $('#cliente_id').val(ui.item.value);
           return false;
        }
});
</script>
@endsection
