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
                <li class="breadcrumb-item active" aria-current="page">Alterar</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('ordens.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i>
            Voltar</a>
        <form id="form-search" action="{{ route('ordens.busca') }}" method="POST"
            class="form-inline d-flex justify-content-end">
            @csrf
            @method('POST')
            <div class="input-group">
                <input id="input-search" type="text" name="term" class="form-control rounded-left col-xs-4" name="term"
                    placeholder="Buscar ordem">
                <div class="input-group-append">
                    <button class="rounded-right btn btn-default" type="submit"><i class="fa fa-search"></i></button>
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
                <label class="col-sm-2 col-form-label" for=""> Ordem n°:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="" value="{{ $orden->id_ordem }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Nome do
                    cliente:</label>
                <div class="col-sm-10">
                    <input id="cliente" type="text" class="form-control" name="cliente"
                        value="{{old('cliente', $orden->clientes->cliente)}}" readonly>
                    <input id="cliente_id" type="hidden" class="form-control" name="cliente_id"
                        value="{{old('cliente_id', $orden->cliente_id)}}">
                    @error('cliente_id')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo cliente deve ser
                        preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Equipamento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="equipamento"
                        value="{{old('equipamento', $orden->equipamento)}}">
                    @error('equipamento')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Modelo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modelo" value="{{old('modelo', $orden->modelo)}}">
                    @error('modelo')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Senha:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="senha" value="{{old('senha', $orden->senha)}}">
                    @error('senha')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Defeito:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="defeito" value="{{old('defeito', $orden->defeito)}}">
                    @error('defeito')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Estado:</label>
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
                    <input type="text" class="form-control" name="acessorios"
                        value="{{old('acessorios', $orden->acessorios)}}">
                </div>
            </div>

            <fieldset class="col-12 col-md-12 px-3">
                <legend>
                    <h1 class="center">Oçamento</h1>
                </legend>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Orçamento:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"
                            name="orcamento">{{old('orcamento', $orden->orcamento)}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Val. Orçamento:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valorcamento"
                            value="{{old('valorcamento', $orden->valorcamento)}}">
                    </div>
                </div>
            </fieldset>

            <fieldset class="col-12 col-md-12 px-3">
                <legend>
                    <h1 class="center">Peças</h1>
                </legend>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Adicionar peças:</label>
                    <div class="input-group col-sm-10">
                        <div class="input-group-append">
                            <button id="addpeca" class="rounded-left btn btn-info text-white" title="Adiciona peça a ordem de serviço"><i
                                    class="fa fa-plus"></i></button>
                        </div>
                        <input type="text" class="peca form-control rounded-right col-xs-4" name="term"
                            placeholder="Buscar por peça" aria-label="Recipient peças"
                            aria-describedby="basic-addon2">
                    </div>
                    <input id="pecaid" type="hidden" name="id_peca">
                    <input id="ordemid" type="hidden" name="id_ordem" value="{{$orden->id_ordem}}">
                </div>
                <div class="form-group row">
                <div class="col-sm-2"></div>
                @if ($pecas->count() > 0)
                <ul class="listpecas">
                    <li></li>
                </ul>
                @else
                <ul class="listpecas" style="display: none"></ul>
                @endif
            </div>
            </fieldset>


            <fieldset class="col-12 col-md-12 px-3">
                <legend>
                    <h1 class="center">Serviço</h1>
                </legend>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Serviço:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control"
                            name="servico">{{old('servico', $orden->servico)}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for=""> Val. Serviço:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valservico"
                            value="{{old('valservico', $orden->valservico)}}">
                    </div>
                </div>
            </fieldset>
            @php
            $status = [
            '1' => 'Em avaliação',
            '2' => 'Orçamento gerado',
            '3' => 'Orçamento aprovado',
            '4' => 'Na bancada',
            '5' => 'Serviço concluído',
            '6' => 'Serviço não efetuado',
            '7' => 'Ordem fechada',
            '8' => 'Equipamento entregue'
            ];
            @endphp
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Status:</label>
                <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" name="status">
                        @foreach ($status as $key => $value)
                        <option value="{{ $key }}" {{ old('status',  $orden->status) == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
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
                    <textarea type="text" class="form-control" name="observacoes"
                        rows="3">{{old('observacoes', $orden->observacoes)}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Previsão:</label>
                <div class="col-sm-10">
                    <input id="dateform" type="text" class="form-control" name="previsao"
                        value="{{old('previsao', date("d/m/Y", strtotime($orden->previsao)))}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Enviar e-mail ao cliente:</label>
                <div class="col-sm-10">
                    <label class="alterbtn btn btn-default">
                        <input type="checkbox" name="getemail" id="ativaemail">
                    </label>
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
$('.peca').autocomplete({
    minLength: 1,
    autoFocus: true,
    delay: 300,
    source: function(request, response) {
        _token = $("input[name='_token']").val();
        $.ajax({
                url: '{{ route("pecas.autocomplete") }}',
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
            $('.peca').val(ui.item.label);
           $('#pecaid').val(ui.item.value);
           return false;
        }
});
$( "#dateform, #searchform" ).datepicker({
        locale: 'pt-BR'
    });

    $(function () {
        $("#addpeca").click(function(e){
            e.preventDefault();
            pecaid = $("#pecaid").val();
            ordemid = $("#ordemid").val();
            _token = $("input[name='_token']").val();
            //console.log('Peça:' + pecaid +'Ordem:' + ordemid + 'Token:' + _token);
            if(this){
            $.ajax({
                url: '{{ route("pecas.pecasordens") }}',
                type: 'POST',
                data: {
                    '_token': _token,
                    'pecaid': pecaid,
                    'ordemid': ordemid
                    },
                    success:function(data){
                    //     $.each(response, function (key, value) {

                    //     $('#aviariosdolote').append('<option value="' + key + '">' + value + '</option>');

                    // });
                        $(".listpecas").show().html("<li>"+data.pecas+"</li>")
                    }
            });
            }
        });
    });
</script>
@endsection
