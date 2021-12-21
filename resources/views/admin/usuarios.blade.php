@extends('admin.layouts.app')
@section('content')
<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#nav-usuario">
                    <i class="fa fa-users">
                    </i>
                    Usuarios
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-rol">
                    <i class="fa fa-user-times">
                    </i>
                    Roles
                </a>
            </li>
             <li>
                <a data-toggle="tab" href="#nav-empleado">
                    <i class="fa fa-users">
                    </i>
                    Empleados
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="nav-rol">
            @include('admin.Rol.index')
        </div>
        <div class="tab-pane fade in active" id="nav-usuario">
            @include('admin.Usuario.index')
        </div>
        <div class="tab-pane fade" id="nav-empleado">
            @include('admin.Empleado.index')
        </div>

    </div>
</div>
@endsection

