@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <h3 class="title-head"><i class="fa fa-toolbox" aria-hidden="true"></i> Ferramentas</h3>
    </div>
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Ferramentas</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header clearfix">
        <div class="card-title">
            <i class="fas fa-tags" aria-hidden="true"></i> Etiquetas
        </div>
    </div>
    <div class="card-body">
        @include("flash::message")
        <form action="{{ route('ferramentas.gretiquetas') }}" method="POST">
            @method('POST')
            @csrf
            <div class="alert alert-info">
                <p><i class="fa fa-hand-point-right"></i> As etiquetas impressas referem-se ao padrão A4048 - A4 6x16. <a href="http://textolivre.org/aplicacoes/linhadotexto/modulos/ajuda/etiquetas.php?op=abrir&cod_etiqueta=12" target="_blank" title="Etiquetas">Veja sobre etiquetas</a>.</p>
                <p><i class="fa fa-lightbulb"></i> Você poderá imprimir valores e quantidades diferentes, por padrão será gerada página com 96 etiquetas a partir da próxima ordem de serviço.</p>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">
                    Gerar etiquetas:</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-text">N° de páginas</span>
                        <input id="" type="text" name="numpaginas" class="numpaginas form-control col-xs-4" value="1">

                        <span class="input-group-text">Ordens de</span>
                        <input id="" type="text" name="valinicial" class="valinicial form-control rounded-0 col-xs-4" value="{{$etiquetainicial['id_ordem'] + 1}}">

                        <span class="input-group-text bg-gray" style="border-radius: 0!important;">Até</span>
                        <input id="" type="text" name="valfinal" class="valfinal form-control  rounded-0 col-xs-4" value="{{$etiquetainicial['id_ordem'] + 96}}">

                        <div class="input-group-append">
                            <button class="geraetiqueta rounded-right btn btn-primary" type="submit"><i class="fa fa-tag"></i>
                                Gerar</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<script>
$(function () {
    $(".numpaginas").keyup(function (e) {
        e.preventDefault();

        $(this).val(this.value.replace(/\D/g, ''));
        var paginas = parseInt($(this).val());
        var inicial = parseInt($(".valinicial").val());
        var final = (inicial + (paginas * 96));
        if(paginas){
        $(".valfinal").val(final);
        }else{
        $(".valfinal").val(inicial);
        $(".geraetiqueta").attr('disabled', true);
        }
    });
});
</script>

@endsection
