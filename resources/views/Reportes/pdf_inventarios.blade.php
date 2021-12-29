
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Reporte de Inventarios</title>
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
            <h2>Reporte de Inventarios</h2>
<br>


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

    <div class="row my-3">
      <table class="table table-borderless factura">
        <thead>
          <tr>
            <th>Mes.</th>
            <th>Descripcion</th>
            <th>Total de Productos Existentes</th>
            <th>Capital Neto</th>
            <th>Capital PVP</th>
            <th>Utilidad</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario )
                <tr>
            <td>{{$inventario->mes}}</td>
            <td>{{$inventario->descripcion_inv}}</td>
            <td>{{$inventario->numprod_inv}}</td>
            <td>{{$inventario->capneto_inv}}</td>
            <td>{{$inventario->cappvp_inv}}</td>
            <td>{{$inventario->util_inv}}</td>


          </tr>
            @endforeach
        </tbody>
      </table>
    </div>

</div>


</body>
</html>
