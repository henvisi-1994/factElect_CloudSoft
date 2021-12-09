@extends('admin.layouts.app')
@section('content')
<form method="POST" v-on:submit.prevent="createFacturaVenta">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">
                <span class="text-danger" v-for="error in errors">
                    @{{ error }}
                </span>
                <h2>
                    <i class="fa fa-user">
                    </i>
                    {{$factura->nombre_per}} {{$factura->apel_per}}
                </h2>
            </h1>
        </div>
        <div class="box-body">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#nav-lineas">
                                <i class="fa fa-bars">
                                </i>
                                Lineas
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#nav-detalle">
                                <i class="fa fa-info-circle">
                                </i>
                                Detalles
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade in active" id="nav-lineas">
                        @include('admin.FacturaVenta.lineas')
                    </div>
                    <div class="tab-pane fade" id="nav-detalle">
                        @include('admin.FacturaVenta.datosFactVenta')
                    </div>
                </div>
            </div>
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            </input>
            <a class="pd-setting-ed btn btn-primary" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="createFacturaVenta()">
                <i aria-hidden="true" class="fa fa-save">
                </i>
                Guardar
            </a>
        </div>
    </div>
</form>
@endsection
<script type="text/javascript">
    window.App = {
        errors: {!! json_encode($errors->toArray()) !!},
        id_persona: {!! json_encode($factura->id_per) !!},
        tipo_factura: '{!! $tipo_factura !!}'
    }
</script>
