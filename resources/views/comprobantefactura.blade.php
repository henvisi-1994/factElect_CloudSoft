<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>comprobante_pdf</title>
	<style type="text/css">
	.factura {
  table-layout: fixed;
}

.fact-info > div > h5 {
  font-weight: bold;
}

.factura > thead {
  border-top: solid 3px #000;
  border-bottom: 3px solid #000;
}

.factura > thead > tr > th:nth-child(2), .factura > tbod > tr > td:nth-child(2) {
  width: 300px;
}

.factura > thead > tr > th:nth-child(n+3) {
  text-align: right;
}

.factura > tbody > tr > td:nth-child(n+3) {
  text-align: right;
}

.factura > tfoot > tr > th, .factura > tfoot > tr > th:nth-child(n+3) {
  font-size: 24px;
  text-align: right;
}

.cond {
  border-top: solid 2px #000;
}
	</style>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div id="app" class="col-12">
        @if ($tipo_fact=="Venta")
            <h2>Factura</h2>
        @else
           <h2>{{$tipo_fact}}</h2>
        @endif


<table class="default">
  <tr>
    <td>
        <img class="w-50"src="https://apiapp.saludmachala.gob.ec/img/logoredsaudapp.png" />

    </td>
        <td>
        <h1>Mil Pasos</h1>
        <p>Av. Winston Churchill</p>
        <p>Plaza Orleans 3er. nivel</p>
        <p>local 312</p>

    </td>
  </tr>
</table>


    <hr />

    <table class="default">
  <tr>
    <td>
        <h5>Datos de Cliente</h5>
        <p>
          {{$nombre_per}}&nbsp;{{$apel_per}}
        </p>
    </td>
    <td>
        <h5>Enviar a</h5>
        <p>
            {{$direc_per}}
            <br>
          {{$correo_per}}
        </p>
    </td>
    <td>
         @if ($tipo_fact=="Venta")
        <h5>N° de Factura</h5>
        @else
        <h5>N° de {{$tipo_fact}}</h5>
        @endif
        <h5>Fecha de Emision</h5>
        <h5>Fecha de vencimiento</h5>
        <h5>Emitido por:</h5>
    </td>
     <td>
         <h5>{{$num_fact}}</h5>
        <p>{{$fecha_emision_fact}}</p>
        <p>{{$vencimiento_fact}}</p>
        <p>{{$nombre_empl}} {{$apellido_empl}}</p>
     </td>

  </tr>
</table>

    <div class="row my-3">
      <table class="table table-borderless factura">
        <thead>
          <tr>
            <th>Cant.</th>
            <th>Descripcion</th>
            <th>Precio Unitario</th>
            <th>Importe</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($detalle_factura as $d_fact )
                <tr>
            <td>{{$d_fact->cantidad}}</td>
            <td>{{$d_fact->descripcion}}</td>
            <td>{{$d_fact->precio_prod}}</td>
            <td>{{$d_fact->neto}}</td>
          </tr>
            @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th>Total</th>
            <th>${{$total_fact}}</th>
          </tr>
        </tfoot>
      </table>
    </div>

    <div class="cond row">
      <div class="col-12">
        <h4>Condiciones y formas de pago</h4>
        <p>{{$nomb_formapago}}</p>
      </div>
    </div>
</div>


</body>
</html>
