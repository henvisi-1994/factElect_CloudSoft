@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#nav-compras">
                    Compras
                </a>
            </li>
            <li>
                <a aria-controls="nav-contact" aria-selected="false" data-toggle="tab" href="#nav-factura" role="tab">
                    <i class="fa fa-file-o">
                    </i>
                    Facturas
                </a>
            </li>
            <!--<li>
                <a data-toggle="tab" href="#nav-guiaRem">
                    <i class="fa fa-truck">
                    </i>
                    Guias de Remision
                </a>
            </li>-->
            <li>
                <a data-toggle="tab" href="#nav-proveedor">
                    <i class="fa fa-user">
                    </i>
                    Proveedor
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade in active" id="nav-compras">
            <div class="chart" id="revenue-compras" style="position: relative; height: 300px;"></div>

        </div>
        <div class="tab-pane fade" id="nav-proveedor">
            @include('admin.Proveedor.index')
        </div>
        <div class="tab-pane fade" id="nav-factura">
            @include('admin.FacturaCompra.index')
        </div>
        <div class="tab-pane fade" id="nav-guiaRem">
        </div>
    </div>
</div>
@endsection
