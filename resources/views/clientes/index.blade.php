@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-users"></i> Clientes</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('clientes.create') }}" class="btn btn-primary float-left"><i class="fa fa-plus"></i>
            Cadastrar</a>
        <form action="{{ route('clientes.index') }}" method="POST" class="form-inline d-flex justify-content-end">
            @csrf
            @method('POST')
            <div class="input-group">
                <input type="text" class="form-control rounded-left col-xs-4" name="term" placeholder="Buscar cliente"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="rounded-right btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

    </div>
    <div class="card-body">
        @include("flash::message")
        <h5 class="card-title"></h5>
        <div class="table-responsive">
            <table class="table table-striped table-condensed">
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th></th>
                </tr>
                @forelse($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ $cliente->cliente }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <button
                            onclick="window.location.href='{{ route('clientes.show', ['cliente' => $cliente->id_cliente]) }}'"
                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                        <button data-toggle="modal" onclick="deleteData({{$cliente->id_cliente}})"
                            data-target="#DeleteModal" class="btn btn-danger btn-sm"><i
                                class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                @empty
                <div class="alert alert-warning">
                    Não há dados a carregar!
                </div>
                @endforelse
            </table>
            @if(count($clientes) > 1)
            {{  $clientes->links() }}
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
                    <h4 class="modal-title text-light"><i class="fa fa-check-circle"></i> Remover cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p class="text-center text-danger"><i class="fa fa-exclamation-triangle"></i> Tem certeza de que deseja remover este Cliente?</p>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                            onclick="formSubmit()"><i class="fa fa-check"></i> Excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function deleteData(id)
    {
    var id = id;
    var url = '{{ route("clientes.destroy", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
    $("#deleteForm").submit();
    }
</script>

@endsection
