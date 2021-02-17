@extends('layouts.app')

@section('content')
<div class="box box-default">
    <div class="box-header border">
        <h5><i class="fa fa-file-invoice"></i> Relatório de clientes</h5>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                {{ $clientes->count() }}
                @foreach ($clientes as $cliente)
                    {{ $clientes->count() }} <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection
