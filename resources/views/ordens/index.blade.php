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
              <li class="breadcrumb-item active" aria-current="page"> Ordens</li>
            </ol>
          </nav>   
    </div>
  </div>
 
<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="#" class="btn btn-primary float-left"><i class="fa fa-plus"></i> Cadastrar</a>

        <form class="form-inline d-flex justify-content-end">
            <div class="input-group">
                <input type="text" class="form-control rounded-left col-xs-4" placeholder="Buscar ordem"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="rounded-right btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
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
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Previsão</th>
                    <th></th>
                </tr>
                @forelse($ordens as $ordem)
                <tr>
                    <td>{{ $ordem->id_ordem }}</td>
                    <td>{{ $ordem->clientes->cliente }}</td>
                    <td>{{ $ordem->created_at }}</td>
                    <td>{{ $ordem->previsao }}</td>
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
            {{ $ordens->links() }}
        </div>
    </div>
</div>
<script>

</script>

@endsection
