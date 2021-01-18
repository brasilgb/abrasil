@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-database" aria-hidden="true"></i> Backup</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Backup</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <div class="card-title">
            <i class="fas fa-sliders-h" aria-hidden="true"></i> Configurações de Backup
        </div>
    </div>
    @foreach ($backups as $backup)
    
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('backups.update', [$backup->id_backup]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Nome do BD:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="bancodedados"
                        value="{{old('bancodedados', $backup->bancodedados)}}">
                    @error('bancodedados')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Usuário BD:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="usuario"
                        value="{{ old('usuario', $backup->usuario) }}">
                    @error('usuario')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Senha BD:</label>
                <div class="col-sm-10">
                    <input id="" type="password" class="form-control" name="senha" value="{{ old('senha', $backup->senha) }}">
                    @error('senha')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Diretorio <small>(Salvar Bkp)</small>:</label>
                <div class="col-sm-10">
                    <input id="" type="text" class="form-control" name="diretorio" value="{{ old('diretorio', $backup->diretorio) }}">
                    @error('diretorio')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i>
                    Disco do Sistema:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="discoinstalacao"
                        value="{{ old('discoinstalacao', $backup->discoinstalacao) }}">
                    @error('discoinstalacao')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
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
