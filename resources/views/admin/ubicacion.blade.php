@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#nav-pais">
                    <i class="fa fa-globe">
                    </i>
                    País
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-provincia">
                    <i class="fa fa-globe">
                    </i>
                    Provincia
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-ciudad">
                    <i class="fa fa-map-o">
                    </i>
                    Ciudad
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="nav-ciudad">
            @include('admin.Ciudad.index')
        </div>
        <div class="tab-pane fade" id="nav-provincia">
            @include('admin.Provincia.index')
        </div>
        <div class="tab-pane fade in active" id="nav-pais">
            @include('admin.Pais.index')
        </div>
    </div>
</div>
@endsection
