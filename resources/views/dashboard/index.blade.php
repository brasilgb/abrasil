@extends('layouts.app')

@section('content')
<div class="card bg-light">
    <div class="card-header clearfix">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>150</h3>

                      <p>Ordens de Serviço</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('ordens.index') }}" class="small-box-footer">
                      Acessar ordens <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>53<sup style="font-size: 20px">%</sup></h3>

                      <p>Clientes</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('clientes.index') }}" class="small-box-footer">
                      Acessar clientes <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>44</h3>

                      <p>Peças</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('pecas.index') }}" class="small-box-footer">
                      Acessar peças <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3>65</h3>

                      <p>Agendamentos</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('agendas.index') }}" class="small-box-footer">
                      Acessar agendamentos <i class="fa fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
        </div>
    </div>
</div>
<script>

</script>

@endsection
