@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-users"></i> ordens</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">ordens</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('ordens.create') }}" class="btn btn-primary float-left"><i class="fa fa-plus"></i>
            Cadastrar</a>
        @if($term)
        @php
        $page = $term == 'clientes' ? 'clientes.index' : 'ordens.index';
        @endphp
        <a href="{{ route($page) }}" class="btn btn-default float-left"><i class="fa fa-angle-left"></i>
            Voltar</a>
        @endif
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
        <div class="autocomplete" style="display: none;">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        @include("flash::message")
        <h5 class="card-title"></h5>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <tr>
                    <th>#ID</th>
                    <th>Cliente</th>
                    <th>Data Entrada</th>
                    <th>Previsão Entrega</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                @forelse($ordens as $ordem)
                <tr>
                    <td>{{ $ordem->id_ordem }}</td>
                    <td>{{ $ordem->clientes->cliente }}</td>
                    <td>{{ formatDateTime($ordem->created_at, "d/y/Y") }}</td>
                    <td>{{ formatDateTime($ordem->previsao, "d/y/Y") }}</td>
                    @php
                    $status = function($func){
                    switch ($func) {
                    case null: return 'Recebido';
                    break;
                    case '1': return 'Em avaliação';
                    break;
                    case '2': return 'Orçamento gerado';
                    break;
                    case '3': return 'Na bancada';
                    break;
                    case '4': return 'Serviço concluído';
                    break;
                    case '5': return 'Serviço não efetuado';
                    break;
                    case '6': return 'Ordem fechada';
                    break;
                    case '7': return 'Equipamento entregue';
                    break;
                    }
                    };
                    @endphp
                    <td>{{ $status($ordem->status) }}</td>
                    <td>
                        <button
                            onclick="window.location.href='{{ route('ordens.show', ['orden' => $ordem->id_ordem]) }}'"
                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                        <button data-toggle="modal" onclick="deleteData({{$ordem->id_ordem}})"
                            data-target="#DeleteModal" class="btn btn-danger btn-sm"><i
                                class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    <i class="fa fa-frown"></i> Não há dados a carregar! <a href="{{ route('ordens.index') }}"
                        title="Listar ordens"><i class="fa fa-sync-alt"></i></a>
                </div>
                @endforelse
            </table>

            @if(count($ordens) > 1)
            {{  $ordens->links() }}
            @endif
        </div>
    </div>
</div>

<div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-light"><i class="fa fa-check-circle"></i> Remover ordem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p class="text-center text-danger"><i class="fa fa-exclamation-triangle"></i> Tem certeza de que
                        deseja remover esta ordem?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>
                        Cancelar</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()"><i
                            class="fa fa-check"></i> Excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function deleteData(id)
    {
    var id = id;
    var url = '{{ route("ordens.destroy", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
    $("#deleteForm").submit();
    }

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
