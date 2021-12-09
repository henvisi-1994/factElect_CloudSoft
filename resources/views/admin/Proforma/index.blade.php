<div class="box">
    <div class="box-header">
        <h1 class="box-title">
            Proforma
        </h1>
    </div>
    <div class="box-body">
        <div class="card-body d-flex justify-content-between align-items-center">
            <a class="btn btn-primary btn-sm" data-target="#crearProforma" data-toggle="modal" href="#">
                Crear
            </a>
        </div>
        <br>
        </br>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>
                        Numero
                    </th>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Forma de Pago
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Hora
                    </th>
                    <th>
                        Vencimiento
                    </th>
                    <th>
                        Observación
                    </th>
                    <th>
                        Total
                    </th>
                    <th>
                        Configuración
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="factura in proformas">
                    <td>
                        @{{factura.num_fact}}
                    </td>
                    <td>
                        @{{factura.nombre_per}}  @{{factura.apel_per}}
                    </td>
                    <td>
                        <div v-if="factura.estado_fact == 'PA'">
                            <span class="label label-success">
                                Pagado
                            </span>
                        </div>
                        <div v-else-if="factura.estado_fact == 'P'">
                            <span class="label label-warning">
                                Pendiente
                            </span>
                        </div>
                        <div v-else-if="factura.estado_fact == 'I'">
                            <span class="label label-danger">
                                Inpago
                            </span>
                        </div>
                        <div v-else="">
                            <span class="label label-warning">
                                En proceso
                            </span>
                        </div>
                    </td>
                    <td>
                        @{{factura.nomb_formapago}}
                    </td>
                    <td>
                        @{{factura.fecha_emision_fact}}
                    </td>
                    <td>
                        @{{factura.hora_emision_fact}}
                    </td>
                    <td>
                        @{{factura.vencimiento_fact}}
                    </td>
                    <td>
                        @{{factura.observ_fact}}
                    </td>
                    <td>
                        @{{factura.total_fact}}
                    </td>
                    <td>
                        <!-- <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" href="#" title="Edit" v-on:click.prevent="editformaPago(formapago)">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i>
                                </a>
                               < <a class="pd-setting-ed btn btn-danger" data-toggle="tooltip" href="#" title="Trash" v-on:click.prevent="deleteformaPago(formapago)">
                                    <i aria-hidden="true" class="fa fa-trash-o">
                                    </i>
                                </a> -->
                        <a class="pd-setting-ed btn btn-success" data-toggle="tooltip" :href="'/DescargaFactura/' + factura.id_fact" title="Descargar">
                                    <i aria-hidden="true" class="fa fa-download">
                                    </i>
                                </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @include('admin.Proforma.Crear')
    </div>
</div>
