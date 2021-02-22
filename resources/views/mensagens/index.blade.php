@extends('layouts.app')

@section('content')

    <div class="card bg-light shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="title-head"><i class="fa fa-comments" aria-hidden="true"></i> Mensagens</h3>
                </div>
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Mensagens</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-header clearfix">
            <div class="card-title">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> Configurações de mensagens
            </div>
        </div>
        @foreach ($mensagens as $mensagem)

            <div class="card-body">
                @include("flash::message")
                <form action="{{ route('mensagens.update', ['mensagen' => $mensagem->id_mensagem]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Recibo entrada:</label>
                        <div class="col-sm-10">
                            <textarea rows="4" type="text" class="form-control"
                                name="recebimento_recibo">{{ old('recebimento_recibo', $mensagem->recebimento_recibo) }}</textarea>
                            @error('recebimento_recibo')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Recibo entrega:</label>
                        <div class="col-sm-10">
                            <textarea rows="4" type="text" class="form-control"
                                name="entrega_recibo">{{ old('entrega_recibo', $mensagem->entrega_recibo) }}</textarea>
                            @error('entrega_recibo')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">E-mail agendamento:</label>
                        <div class="col-sm-10">
                            <textarea rows="4" type="text" class="form-control"
                                name="mensagem_agendamento">{{ old('mensagem_agendamento', $mensagem->mensagem_agendamento) }}</textarea>
                            @error('mensagem_agendamento')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Email serviço concluído:</label>
                        <div class="col-sm-10">
                            <textarea rows="4" type="text" class="form-control"
                                name="mensagem_servico_concluido">{{ old('mensagem_servico_concluido', $mensagem->mensagem_servico_concluido) }}</textarea>
                            @error('mensagem_servico_concluido')
                                <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}
                                </div>
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
