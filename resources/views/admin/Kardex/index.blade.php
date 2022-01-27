@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            Kardex
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div>
            <div class="form-group">
                <label>Producto</label>
                <select class="form-control" name="id_prod" v-model="newKardex.id_prod">
                <option disabled="" selected="" value="none">
                Selecione un Producto
                </option>
                 @foreach($productos as $producto)
                    <option value="{{$producto->id_prod}}">
                        {{$producto->descripcion_prod}}
                     </option>
                 @endforeach
                </select>
            </div>


            <div class="form-group">
                            <label>
                                Fecha de Inicio:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control" name="fecha_inicio" type="date" v-model="newKardex.fecha_inicio_k">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Fecha de Fin:
                            </label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar">
                                    </i>
                                </div>
                                <input class="form-control" name="fecha_fin" type="date" v-model="newKardex.fecha_fin_k">
                                </input>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <button class="btn btn-primary" type="button "v-on:click.prevent="buscar_kardex()">
                        <span>
                            Buscar
                        </span>
                    </button>
        </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Detalle
                        </th>
                        <th>
                            U. Entrada
                        </th>
                        <th>
                            C.T. Entrada
                        </th>
                        <th>
                            U. Salida
                        </th>
                        <th>
                            C.T. Salida
                        </th>
                       <th>
                            U. Saldos
                        </th>
                        <th>
                            C.T. Saldos
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="kardex in kardexs">
                        <td>
                            @{{kardex.fecha_kardex}}
                        </td>
                        <td>
                            @{{kardex.detalle_kardex}}
                        </td>
                        <td>
                           @{{kardex.cant_entr}}
                        </td>
                        <td>
                           @{{kardex.prec_tot_entr}}
                        </td>
                        <td>
                            @{{kardex.cant_salida}}
                        </td>
                        <td>
                           @{{kardex.prec_total_salida}}
                        </td>
                                                <td>
                           @{{kardex.cant_mov_kardex}}
                        </td>
                                                <td>
                           @{{kardex.prec_total_movimiento}}
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>
@endsection
