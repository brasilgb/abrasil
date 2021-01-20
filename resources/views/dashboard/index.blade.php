@extends('layouts.app')

@section('content')
<div class="box box-default">
    <div class="box-header border">
        <h5><i class="fa fa-tachometer-alt"></i> Dashboard</h5>
    </div>
    <div class="box-body">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $ordens->count()}}</h3>

                            <p>Ordens de Serviço</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tools"></i>
                        </div>
                        <a href="{{ route('ordens.index') }}" class="small-box-footer">
                            Acessar ordens <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $clientes->count() }}</h3>

                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('clientes.index') }}" class="small-box-footer">
                            Acessar clientes <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $pecas->count() }}</h3>

                            <p>Peças</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-memory"></i>
                        </div>
                        <a href="{{ route('pecas.index') }}" class="small-box-footer">
                            Acessar peças <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $agendas->count() }}</h3>

                            <p>Agendamentos</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <a href="{{ route('agendas.index') }}" class="small-box-footer">
                            Acessar agendamentos <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
</div>

<div class="row">
    <div class="col-lg-6 col-xs-12">
        <div class="box box-default">
            <div class="box-header border">
                <h5><i class="fa fa-calendar"></i> Agendamentos aguardando atendimento</h5>
            </div>
            <div class="box-body @if($agendas->where('status', 1)->count() > 5) table-overflow @else table-fixa @endif">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr class="table-secundary">
                            <th>#ID</th>
                            <th>Cliente</th>
                            <th>Data/Hora</th>
                            <th style="width: 50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agendas->where('status', 1)->orderby('id_agenda', 'DESC')->get() as $agenda)
                        <tr>
                            <td>{{ $agenda->id_agenda }}</td>
                            <td>{{ $agenda->clientes->cliente }}</td>
                            <td>{{ formatDateTime( $agenda->data) }}</td>
                            <td><button
                                    onclick="window.location.href='{{ route('agendas.show', ['agenda' => $agenda->id_agenda]) }}'"
                                    class="btn btn-sm btn-default"><i class="fas fa-eye"></i></button></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="box box-default">
            <div class="box-header border">
                <h5><i class="fa fa-tools"></i> Orçamentos gerados</h5>
            </div>
            <div class="box-body @if($ordens->where('status', 2)->count() > 5) table-overflow @else table-fixa @endif">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr class="table-default">
                            <th>#Ordem</th>
                            <th>Cliente</th>
                            <th>Previsão</th>
                            <th style="width: 50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordens->where('status', 2)->orderby('id_ordem', 'DESC')->get() as $ordem)
                        <tr>
                            <td>{{ $ordem->id_ordem }}</td>
                            <td>{{ $ordem->clientes->cliente }}</td>
                            <td>{{ formatDateTime( $ordem->previsao) }}</td>
                            <td><button
                                    onclick="window.location.href='{{ route('ordens.show', ['orden' => $ordem->id_ordem]) }}'"
                                    class="btn btn-sm btn-warning text-white"><i class="fas fa-eye"></i></button></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-xs-12">
        <div class="box box-default">
            <div class="box-header border">
                <h5><i class="fa fa-tools"></i> Orçamentos aprovados</h5>
            </div>
            <div class="box-body @if($ordens->where('status', 3)->count() > 5) table-overflow @else table-fixa @endif">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr class="table-secundary">
                            <th>#Ordem</th>
                            <th>Cliente</th>
                            <th>Previsão</th>
                            <th style="width: 50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordens->where('status', 3)->orderby('id_ordem', 'DESC')->get() as $ordem)
                        <tr>
                            <td>{{ $ordem->id_ordem }}</td>
                            <td>{{ $ordem->clientes->cliente }}</td>
                            <td>{{ formatDateTime( $ordem->previsao) }}</td>
                            <td><button
                                    onclick="window.location.href='{{ route('ordens.show', ['orden' => $ordem->id_ordem]) }}'"
                                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></button></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="box box-default">
            <div class="box-header border">
                <h5><i class="fa fa-tools"></i> Ordens concluídas <small>( serviço concluído avisar cliente)</small></h5>
            </div>
            <div class="box-body @if($ordens->where('status', 5)->count() > 5) table-overflow @else table-fixa @endif">
                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr class="table-default">
                            <th>#Ordem</th>
                            <th>Cliente</th>
                            <th>Previsão</th>
                            <th style="width: 50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordens->where('status', 5)->orderby('id_ordem', 'DESC')->get() as $ordem)
                        <tr>
                            <td>{{ $ordem->id_ordem }}</td>
                            <td>{{ $ordem->clientes->cliente }}</td>
                            <td>{{ formatDateTime( $ordem->previsao) }}</td>
                            <td><button
                                    onclick="window.location.href='{{ route('ordens.show', ['orden' => $ordem->id_ordem]) }}'"
                                    class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    </div>
</div>
<script>

</script>

@endsection
