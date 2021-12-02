@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
   <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#nav-ventas">Ventas</a></li>
            <li><a  data-toggle="tab" href="#nav-producto" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-archive"></i> Productos</a></li>
            <li><a  data-toggle="tab" href="#nav-cliente"><i class="fa fa-group "></i>Clientes</a></li>
            <li><a  data-toggle="tab" href="#nav-factura"><i class="fa fa-file-o"></i> Facturas</a></li>
            <li><a  data-toggle="tab" href="#nav-guiaRem"><i class="fa fa-truck"></i> Guia de Remision</a></li>
        </ul>
    </div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade in active" id="nav-ventas">
                  <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
    </div>
    <div class="tab-pane fade" id="nav-producto">
        @include('admin.Producto.index')
    </div>
    <div class="tab-pane fade" id="nav-cliente">
        @include('admin.Cliente.index')
    </div>
    <div class="tab-pane fade" id="nav-factura">
       @include('admin.FacturaVenta.index')
    </div>
    <div class="tab-pane fade" id="nav-guiaRem">
    </div>
</div>
@endsection
