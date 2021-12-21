@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
   <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#nav-ventas">Ventas</a></li>
            @if (Auth::user()->id_rol==1||Auth::user()->id_rol==3||Auth::user()->id_rol==4)
                        <li><a  data-toggle="tab" href="#nav-producto" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-archive"></i> Productos</a></li>
            @endif
            @if (Auth::user()->id_rol==1||Auth::user()->id_rol==2||Auth::user()->id_rol==3)
            <li><a  data-toggle="tab" href="#nav-cliente"><i class="fa fa-group "></i>Clientes</a></li>
            @endif
            @if (Auth::user()->id_rol==1||Auth::user()->id_rol==2||Auth::user()->id_rol==3)
            <li><a  data-toggle="tab" href="#nav-factura"><i class="fa fa-file-o"></i> Facturas</a></li>
            @endif
            <!--<li><a  data-toggle="tab" href="#nav-guiaRem"><i class="fa fa-truck"></i> Guia de Remision</a></li>-->
            @if (Auth::user()->id_rol==1||Auth::user()->id_rol==2||Auth::user()->id_rol==3)
            <li><a  data-toggle="tab" href="#nav-proforma"><i class="fa fa-file-o"></i> Proforma</a></li>
            @endif
            @if (Auth::user()->id_rol==1||Auth::user()->id_rol==3||Auth::user()->id_rol==4)
            <li><a  data-toggle="tab" href="#nav-inventario"><i class="fa fa-cubes"></i> Inventario</a></li>
            @endif
        </ul>
    </div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade in active" id="nav-ventas">
            <!-- Tabs within a box -->
            <div class="chart" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <!-- Morris chart - Sales -->
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
    <div class="tab-pane fade" id="nav-proforma">
        @include('admin.Proforma.index')
    </div>
        <div class="tab-pane fade" id="nav-inventario">
        @include('admin.Inventario.index')
    </div>
</div>
@endsection
