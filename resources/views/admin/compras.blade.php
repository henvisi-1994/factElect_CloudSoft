@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
   <div class="panel-heading">
        <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#nav-compras">Compras</a></li>
			<li><a data-toggle="tab" href="#nav-proveedor" ><i class="fa fa-user"></i> Proveedor</a></li>
			<li><a  data-toggle="tab" href="#nav-producto" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-archive"></i> Producto</a></li>
			<li><a  data-toggle="tab" href="#nav-categoria"><i class="fa fa-sitemap"></i> Categoria</a></li>
			<li><a  data-toggle="tab" href="#nav-unidad"><i class="fa fa-puzzle-piece"></i> Unidad</a></li>
			<li><a  data-toggle="tab" href="#nav-marca"><i class="fa fa-tags"></i> Marca</a></li>
		</ul>
    </div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade in active" id="nav-compras">         
    </div>
    <div class="tab-pane fade" id="nav-proveedor">
    	@include('admin.Proveedor.index') 
    </div>
    <div class="tab-pane fade" id="nav-producto">
        @include('admin.Producto.index') 
    </div>
    <div class="tab-pane fade" id="nav-categoria">
        @include('admin.Categoria.index') 
    </div>
    <div class="tab-pane fade" id="nav-marca">
        @include('admin.Marca.index') 
    </div>
    <div class="tab-pane fade" id="nav-unidad">
        @include('admin.Unidad.index') 
    </div>

    
</div>
@endsection