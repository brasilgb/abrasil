@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-users"></i> Ordens</h3>
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
        <form action="{{ route('ordens.update',['orden' => $orden->id_ordem]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Nome do  cliente:</label>
                <div class="col-sm-10">
                    <input id="cliente" type="text" class="form-control" name="cliente" value="{{old('cliente', $orden->clientes->cliente)}}">
                    <input id="cliente_id" type="hidden" class="form-control" name="cliente_id" value="{{old('cliente_id', $orden->cliente_id)}}">
                    @error('cliente_id')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo cliente deve ser preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Equipamento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="equipamento" value="{{old('equipamento', $orden->equipamento)}}">
                    @error('equipamento')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Modelo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modelo" value="{{old('modelo', $orden->modelo)}}">
                    @error('modelo')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Senha:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="senha" value="{{old('senha', $orden->senha)}}">
                    @error('senha')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Defeito:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="defeito" value="{{old('defeito', $orden->defeito)}}">
                    @error('defeito')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Estado:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="estado" value="{{old('estado', $orden->estado)}}">
                    @error('estado')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Acessórios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="acessorios" value="{{old('acessorios', $orden->acessorios)}}">
                </div>
            </div>

            <fieldset class="col-12 col-md-12 px-3">
                <legend><h1 class="center">Oçamento</h1></legend>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Orçamento:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="orcamento">{{old('orcamento', $orden->orcamento)}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Val. Orçamento:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valorcamento" value="{{old('valorcamento', $orden->valorcamento)}}">
                    </div>
                </div>
            </fieldset>

            <fieldset class="col-12 col-md-12 px-3">
                <legend><h1 class="center">Peças</h1></legend>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Pecas:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="pecas">{{old('pecas', $orden->pecas)}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Val. Peças:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="valpecas" value="{{old('valpecas', $orden->valpecas)}}">
                </div>
            </div>
            </fieldset>

            <fieldset class="col-12 col-md-12 px-3">
                <legend><h1 class="center">Serviço</h1></legend>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Serviço:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="servico">{{old('servico', $orden->servico)}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Val. Serviço:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="valservico" value="{{old('valservico', $orden->valservico)}}">
                </div>
            </div>
            </fieldset>
            @php
            $status = [
                '0' => 'Selecione o status',
                '1' => 'Em avaliação',
                '2' => 'Orçamento gerado',
                '3' => 'Na bancada',
                '4' => 'Serviço concluído',
                '5' => 'Serviço não efetuado',
                '6' => 'Ordem fechada',
                '7' => 'Equipamento entregue'
                     ];
            @endphp
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Status:</label>
                <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" name="status">
                        @foreach ($status as $key => $value)
                        <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Observações:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="observacoes" rows="3">{{old('observacoes', $orden->observacoes)}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Previsão:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="previsao" value="{{old('previsao', $orden->previsao)}}">
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
</script>
@endsection
