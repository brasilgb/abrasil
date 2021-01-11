@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-calendar"></i> Agendas</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('agendas.index') }}">Agendas</a></li>
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
            <input id="input-search" type="text" class="form-control rounded-left col-xs-4" name="term"
                placeholder="Buscar agenda" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="rounded-right btn btn-outline-secondary" type="submit"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

    </div>
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('agendas.update', [$agenda->id_agenda]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Cliente</label>
                <div class="col-sm-10">
                    <input  id="cliente" type="text" class="form-control" name="cliente" value="{{old('cliente', $agenda->clientes->cliente)}}">
                    <input id="cliente_id" type="hidden" class="form-control" name="cliente_id" value="{{old('cliente_id', $agenda->cliente_id)}}">
                    @error('cliente_id')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> O campo cliente deve ser preenchido!</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Data:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="data" value="{{ old('data', $agenda->data) }}">
                    @error('data')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Hora:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hora" value="{{ old('hora', $agenda->hora) }}">
                    @error('hora')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Serviço:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="servico" value="{{ old('servico', $agenda->servico) }}">
                    @error('servico')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Detalhes:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="detalhes">{{ old('detalhes', $agenda->detalhes) }}</textarea>
                    @error('detalhes')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Técnico:</label>
                <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" name="tecnico">
                        <option value="">Selecione o Técnico</option>
                        <option value="Jose" {{ old('tecnico', $agenda->tecnico) == $agenda->tecnico ? 'selected' : '' }}>{{ $agenda->tecnico }}</option>
                    </select>
                    @error('tecnico')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            @php
            $status = [
                '' => 'Selecione o status',
                '1' => 'Aberto',
                '2' => 'Em andamento',
                '3' => 'Cancelado',
                '4' => 'Concluído',
                     ];
            @endphp
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Status:</label>
                <div class="col-sm-10">
                    <select class="custom-select my-1 mr-sm-2" name="status">
                        @foreach ($status as $key => $value)
                        <option value="{{ $key }}" {{ old('status', $agenda->status ) == $agenda->status ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""> Observações:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="observacoes">{{ old('observacoes', $agenda->observacoes) }}</textarea>
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
                url: '{{ route("agendas.autocomplete") }}',
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
            $('#input-search').val(ui.item.label);
           //$('#employeeid').val(ui.item.value);
           return false;
        }
});

</script>

@endsection
