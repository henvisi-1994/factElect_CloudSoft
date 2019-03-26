@extends('admin.layouts.compras')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            Modificar Producto
        </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="{{asset('updateProducto/'.$producto->id_prod)}}" method="POST" enctype="multipart/form-data"role="form">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Codigo
                </label>
                <input class="form-control" id="exampleInputEmail1" value="{{$producto->codigo_prod}}" name="codigo_prod" placeholder="Ingrese Nombre " type="text">
                </input>
            </div>
            <div class="form-group">
                <label>
                    Observacion
                </label>
                <textarea class="form-control" name="observ_prod" placeholder="Ingrese Observación" rows="3">
                     {{$producto->observ_prod}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Codigo de Barras
                </label>
                <input class="form-control" id="exampleInputEmail1" name="codbarra_prod" value="{{$producto->codbarra_prod}}" placeholder="Ingrese Nombre " type="text">
                </input>
            </div>
            <div class="form-group">
                <label>
                    Descripción
                </label>
                <textarea class="form-control" name="descripcion_prod" value="{{$producto->descripcion_prod}}" placeholder="Ingrese Observación" rows="3">
                </textarea>
            </div>
            <div class="form-group">
                <label>
                    Marca
                </label>
                <select class="form-control" name="id_marca">
                    <option  selected="" value="{{$producto->id_marca}}">
                        Selecione una Marca
                    </option>
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id_marca}}">
                        {{$marca->nomb_marca}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>
                    Periodo
                </label>
                <select class="form-control" name="id_fec">
                    <option selected="" value="{{$producto->id_fec}}">
                        Selecione una Periodo
                    </option>
                    @foreach($fechas as $periodo)
                    <option value="{{$periodo->id_fec}}">
                        {{$periodo->nomb_fec}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>
                    Empresa
                </label>
                <select class="form-control" name="id_emp">
                    <option selected="" value="{{$producto->id_emp}}">
                        Selecione una Empresa
                    </option>
                    @foreach($empresas as $empresa)
                    <option value="{{$empresa->id_emp}}">
                        {{$empresa->nombre_emp}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Presentacion
                </label>
                <input class="form-control" id="exampleInputEmail1" name="present_prod" value="{{$producto->present_prod}}" placeholder="Ingrese Presentación " type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Precio
                </label>
                <input class="form-control" id="exampleInputEmail1" name="precio_prod" value="{{$producto->precio_prod}}" placeholder="Ingrese Precio " type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Ubicación
                </label>
                <input class="form-control" id="exampleInputEmail1" name="ubicacion_prod" value="{{$producto->ubicacion_prod}}" placeholder="Ingrese Ubicación " type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Stock Minimo
                </label>
                <input class="form-control" id="exampleInputEmail1" name="stockmin_prod" value="{{$producto->stockmin_prod}}" placeholder="Ingrese Stock minimo " type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Stock Maximo
                </label>
                <input class="form-control" id="exampleInputEmail1" name="stockmax_prod" value="{{$producto->stockmax_prod}}" placeholder="Ingrese Stock Maximo " type="text">
                </input>
            </div>
            <div class="form-group">
                <label>
                    Fecha de Ingreso:
                </label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                  
                     <input class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="fechaing_prod"  value="{{$producto->fechaing_prod}}" type="text">
                    </input>
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>
                    Fecha de Elaboración:
                </label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                     <input class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="fechaelab_prod" value="{{$producto->fechaelab_prod}}"  type="text">
                    </input>
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>
                    Fecha de caducidad:
                </label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                     <input class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="fechacad_prod" value="{{$producto->fechacad_prod}}" type="text">
                    </input>
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>
                    Iva
                </label>
                <select class="form-control" name="aplicaiva_prod">
                    <option selected="" value="{{$producto->aplicaiva_prod}}">
                        ¿Aplica IVA?
                    </option>
                    <option value="S">
                        SI
                    </option>
                    <option value="N">
                        NO
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>
                    ICE
                </label>
                <select class="form-control" name="aplicaice_prod">
                    <option selected="" value="{{$producto->aplicaice_prod}}">
                        ¿Aplica ICE?
                    </option>
                    <option value="S">
                        SI
                    </option>
                    <option value="N">
                        NO
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Utilidad
                </label>
                <input class="form-control" id="exampleInputEmail1" name="util_prod" value="{{$producto->util_prod}}" placeholder="Ingrese Utilidad " type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                    Comision
                </label>
                <input class="form-control" id="exampleInputEmail1" name="comision_prod" value="{{$producto->comision_prod}}" placeholder="Ingrese Comisión " type="text">
                </input>
            </div>
            <div class="form-group files">
                <label>
                    Imagen
                </label>
                <input class="form-control" multiple="" name="imagen_prod" value="{{$producto->imagen_prod}}" type="file">
                </input>
            </div>
        </div>
        <div class="form-group">
            <label>
                Estado
            </label>
            <select class="form-control" name="estado_prod">
                <option selected="" value="{{$producto->estado_prod}}">
                    Selecione Estado
                </option>
                <option value="A">
                    Activo
                </option>
                <option value="P">
                    Pendiente
                </option>
                <option value="I">
                    Inactivo
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>
                Fecha Inicial:
            </label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i>
                </div>
                 <input class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="fechaini_prod"  value= "{{$producto->fechaini_prod}}"type="text">
                </input>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <label>
                Fecha Final:
            </label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar">
                    </i>
                </div>
                <input class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="fechaini_prod"  value= "{{$producto->fechafin_prod}}"type="text">
                </input>
            </div>
        </div>
</div>
<!-- /.input group -->
<!-- /.box-body -->
<div class="box-footer">
    <button class="btn btn-primary" type="submit">
        Guardar
    </button>
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    </input>
</form>
</div>
@endsection
