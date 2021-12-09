<div class="box">
    <div class="box-header">
        <h2>
            Datos de Factura
        </h2>
    </div>
    <div class="box-body">
        <div class="form-group">
            <label>
                Fecha Emisión
            </label>
            @{{fecha_act}}
        </div>
        <div class="form-group">
            <label>
                No.
            </label>
            @{{series}}@{{numFactVent}}
        </div>
        <div class="form-group">
            <label>
                Forma de Pago
            </label>
            <select class="form-control" name="id_formapago" v-model="factura.id_formapago">
                <option disabled="" selected="" value="none">
                    Selecione una Forma de Pago
                </option>
                @foreach($formas_pago as $forma_pago)
                <option value="{{$forma_pago->id_formapago}}">
                    {{$forma_pago->nomb_formapago}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>
                Observación
            </label>
            <textarea class="form-control" name="observ_fact" placeholder="Ingrese Observación" rows="3" v-model="factura.observ_fact">
            </textarea>
        </div>
    </div>
</div>
