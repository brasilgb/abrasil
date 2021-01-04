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
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
              <li class="breadcrumb-item active" aria-current="page">Alterar</li>
            </ol>
          </nav>   
    </div>
  </div>
  
<div class="card bg-light">
    <div class="card-header clearfix">
        <a href="{{ route('clientes.index') }}" class="btn btn-primary float-left"><i class="fa fa-angle-left"></i> Voltar</a>
        <form class="form-inline d-flex justify-content-end">
            <div class="input-group">
                <input type="text" class="form-control rounded-left col-xs-4" placeholder="Buscar cliente"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="rounded-right btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

    </div>
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('clientes.update', [$cliente->id_cliente]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Nome do cliente:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cliente" value="{{ $cliente->cliente }}">
                    @error('cliente')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> E-mail:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{ $cliente->email }}">
                    @error('email')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Telefone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefone" value="{{ $cliente->telefone }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Celular:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="celular" value="{{ $cliente->celular }}">
                    @error('celular')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Logradouro:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="logradouro" value="{{ $cliente->logradouro }}">
                    @error('logradouro')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Número:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="numero" value="{{ $cliente->numero }}">
                    @error('numero')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Complemento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="complemento" value="{{ $cliente->complemento }}">
                    @error('complemento')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Bairro:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bairro" value="{{ $cliente->bairro }}">
                    @error('bairro')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> UF:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="estado" value="RS" value="{{ $cliente->estado }}">
                    @error('estado')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> UF</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> Cidade:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cidade" value="{{ $cliente->cidade }}">
                    @error('cidade')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> CEP:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cep" value="{{ $cliente->cep }}">
                    @error('cep')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for=""><i class="fa fa-asterisk text-danger small"></i> CPF:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cpf" value="{{ $cliente->cpf }}">
                    @error('cpf')
                    <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">RG:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="rg" value="{{ $cliente->rg }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Contato:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contato" value="{{ $cliente->contato }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Telefone do contato:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefone_contato" value="{{ $cliente->telefone_contato }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Celular do contato:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="celular_contato" value="{{ $cliente->celular_contato }}">
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
</div>
<script>

</script>

@endsection
