@extends('layouts.app')

@section('content')
<div class="card bg-light shadow-sm">
    <div class="card-header">
        <h5><i class="fa fa-file-invoice"></i> Relatório de ordens</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped rounded-top">
                    <thead>
                        <tr class="table-secondary">
                            <th colspan="8" class="text-center">Resumo de Ordens de Serviço</th>
                        </tr>
                        <tr class="table-active">
                            <th>Avaliação</th>
                            <th>Orç. gerados</th>
                            <th>Orç. aprovadoos</th>
                            <th>Na bancada</th>
                            <th>Serv.Concluído</th>
                            <th>Serv. não efetuado</th>
                            <th>Fechadas</th>
                            <th>Entregues</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-light">
                            <td>{{ $ordens->where('status', 1)->count() }}</td>
                            <td>{{ $ordens->where('status', 2)->count() }}</td>
                            <td>{{ $ordens->where('status', 3)->count() }}</td>
                            <td>{{ $ordens->where('status', 4)->count() }}</td>
                            <td>{{ $ordens->where('status', 5)->count() }}</td>
                            <td>{{ $ordens->where('status', 6)->count() }}</td>
                            <td>{{ $ordens->where('status', 7)->count() }}</td>
                            <td>{{ $ordens->where('status', 8)->count() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

</script>

@endsection
