@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#nav-categoria">
                    <i class="fa fa-sitemap">
                    </i>
                    Categoria
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-marca">
                    <i class="fa fa-tags">
                    </i>
                    Marca
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-unidad">
                    <i class="fa fa-puzzle-piece">
                    </i>
                    Unidad
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-descuentos">
                    <i class="fa fa-bookmark-o">
                    </i>
                    Descuentos
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-ubicacion">
                    Ubicacion
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-empresa">
                    <i class="fa fa-industry">
                    </i>
                    Empresa
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-bodega">
                    <i class="fa fa-building">
                    </i>
                    Bodega
                </a>
            </li>
            <li>
              <a data-toggle="tab" href="#nav-usuarios">
                     <i class="fa fa-users"></i>
                    Usuarios
                </a>  
            </li>
        </ul>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade in active" id="nav-categoria">
            @include('admin.Categoria.index')
        </div>
        <div class="tab-pane fade" id="nav-marca">
            @include('admin.Marca.index')
        </div>
        <div class="tab-pane fade" id="nav-unidad">
            @include('admin.Unidad.index')
        </div>
        <div class="tab-pane fade" id="nav-descuentos">
            @include('admin.Descuento.index')
        </div>
        <div class="tab-pane fade" id="nav-ubicacion">
            @include('admin.ubicacion')
        </div>
        <div class="tab-pane fade" id="nav-empresa">
            @include('admin.Empresa.index')
        </div>
        <div class="tab-pane fade" id="nav-bodega">
            @include('admin.Bodega.index')
        </div>
        <div class="tab-pane fade" id="nav-usuarios">
            @include('admin.usuarios')
        </div>
    </div>
</div>
@endsection
