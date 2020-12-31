@extends('layouts.app')

@section('content')
<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="#" class="btn btn-primary float-left">Cadastrar</a>

        <form class="form-inline d-flex justify-content-end">
            <div class="input-group">
                <input type="text" class="form-control rounded-left col-xs-4" placeholder="Buscar clientes"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="rounded-right btn btn-outline-secondary" type="button">Buscar</button>
                </div>
            </div>
        </form>


    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="table-responsive">

            <table class="table table-striped table-condensed">
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Cadastro</th>
                    <th></th>
                </tr>
                @forelse($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->username }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
                @empty
                <div class="alert alert-warning">
                    Não há dados a carregar!
                </div>
                @endforelse
            </table>
            {{ $usuarios->links() }}
        </div>
    </div>
</div>
<script>

</script>

@endsection
