@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <!--<li class="active">
                <a data-toggle="tab" href="#nav-formulario">
                    Formulario
                </a>
            </li>-->
            <li>
                <a data-toggle="tab" href="#nav-periodo">
                    Periodo
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-formPago">
                    Forma de pago
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-identificacion">
                    Identificación
                </a>
            </li>
            <!--<li>
                <a data-toggle="tab" href="#nav-parametros">
                    <i class="fa fa-cogs">
                    </i>
                    Parametros
                </a>
            </li>-->
            <!--<li>
                <a data-toggle="tab" href="#nav-tipDocumento">
                    Tipo de Documento
                </a>
            </li>-->
            <li>
                <a data-toggle="tab" href="#nav-tipContribuy">
                    Tipo de Contribuyente
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade in active" id="nav-formulario">
            @include('admin.Formulario.index')
        </div>
        <div class="tab-pane fade" id="nav-periodo">
            @include('admin.Periodo.index')
        </div>
        <div class="tab-pane fade" id="nav-formPago">
         @include('admin.FormaPago.index')
        </div>
        <div class="tab-pane fade" id="nav-identificacion">
            @include('admin.Identificaciones.index')
        </div>
        <div class="tab-pane fade" id="nav-tipDocumento">
            @include('admin.TipoDocumento.index')
        </div>
        <div class="tab-pane fade" id="nav-tipContribuy">
            @include('admin.TipoContribuyente.index')
        </div>
        <div class="tab-pane fade" id="nav-parametros">
            @include('admin.parametros')
        </div>
    </div>
</div>
@endsection
