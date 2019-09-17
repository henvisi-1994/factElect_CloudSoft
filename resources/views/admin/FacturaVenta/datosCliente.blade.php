<div class="form-group">
    <label>
        Nombres y Apellidos
    </label>
    {{$factura->nombre_per}} {{$factura->apel_per}}
</div>
<div class="form-group">
    <label>
        Identificación
    </label>
    {{$factura->doc_per}}
</div>
<div class="form-group">
    <label>
        Fecha Emisión
    </label>
    @{{fecha_act}}
</div>
<div class="form-group">
    <label>
        Dirección
    </label>
    {{$factura->direc_per}}
</div>
<div class="form-group">
    <label>
        Teléfono
    </label>
    {{$factura->fono1_per}}
</div>
<div class="form-group">
    <label>
        Email
    </label>
    {{$factura->correo_per}}
</div>