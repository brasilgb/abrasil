@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-calendar"></i> Agendamentos</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('agendas.index') }}">Agendamentos</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
            </ol>
          </nav>
    </div>
  </div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('agendas.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i> Voltar</a>
        <form id="form-search" action="{{ route('agendas.busca') }}" method="POST"
        class="form-inline d-flex justify-content-end">
        @csrf
        @method('POST')
        <div class="input-group">
            <input id="searchform" type="text" class="form-control rounded-left col-xs-4" name="term"
                placeholder="Buscar por data" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="rounded-right btn btn-default" type="submit"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

    </div>
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('agendas.store') }}" method="POST" autocomplete="off">
            @method('POST')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Cliente:</label>
                <div class="col-sm-10">
                    <input type="text" class="cliente form-control" name="cliente" value="{{old('cliente')}}">
                    <input type="hidden" class="cliente_id form-control" name="cliente_id" value="{{old('cliente_id')}}">
                    @error('cliente_id')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo cliente deve ser preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Data:</label>
                <div class="col-sm-10">
                    <input id="dateform" type="text" class="form-control" name="data">
                    @error('data')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Hora:</label>
                <div class="col-sm-10">
                    <input id="timeform" type="text" class="form-control" name="hora">
                    @error('hora')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Serviço:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="servico">
                    @error('servico')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Detalhes:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="detalhes"></textarea>
                    @error('detalhes')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Técnico:</label>
                <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" name="tecnico_id">
                        <option value="">Selecione o Técnico</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @error('tecnico_id')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
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
                <label class="col-sm-2 col-form-label" for=""> Observações:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="observacoes"></textarea>
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

$('.cliente').autocomplete({
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
            $('.cliente').val(ui.item.label);
           $('.cliente_id').val(ui.item.value);
           return false;
        }
});

    $( "#dateform, #searchform" ).datepicker({
        locale: 'pt-BR'
    });

    $('#ativaemail').click(function () {

    if ($(this).is(':checked')) {
        $( ".alterbtn" ).removeClass( "btn-default" ).addClass( "btn-info" );
    } else {
        $( ".alterbtn" ).removeClass( "btn-info" ).addClass( "btn-default" );
    }
});
</script>

@endsection
