@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header clearfix">
        <a href="#" class="btn btn-primary float-left"><i class="fa fa-plus"></i> Cadastrar</a>
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
        <h5 class="card-title">
            <i class="fa fa-users"></i> Clientes
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
          </nav></h5>
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
            {{ $clientes->links() }}
        </div>
    </div>
</div>
<script>

</script>

@endsection
