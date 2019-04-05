<div class="modal fade" id="viewProducto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    <span>
                        ×
                    </span>
                </button>
                <h4>
                    @{{fillProducto.codigo_prod}}
                </h4>
                <span class="text-danger" v-for="error in errors">
                </span>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 18rem;">
                    <img alt="Card image cap" class="card-img-top"  v-bind:src="src">
                        <div class="card-body">
                            <h5 class="card-title">
                                @{{fillProducto.codigo_prod}}
                            </h5>
                            <p class="card-text">
                                 @{{fillProducto.codbarra_prod}}
                        <br>
                            Stock:  Minimo: @{{fillProducto.stockmin_prod}} Maximo: @{{fillProducto.stockmax_prod}}
                            <br>
                                Precio:  @{{fillProducto.precio_prod}}
                                <br>
                                    Presentacion:    @{{fillProducto.present_prod}}
                                    <br>
                                        Elaborado:  @{{fillProducto.fechaelab_prod}}
                                        <br>
                                            Caduca:  @{{fillProducto.fechacad_prod}}
                                        </br>
                                    </br>
                                </br>
                            </br>
                        </br>
                    </br>
                            </p>
                        </div>
                </div>
                <div class="modal-footer">
                    @{{fillProducto.descripcion_prod}}
                </div>
            </div>
        </div>
    </div>
</div>
