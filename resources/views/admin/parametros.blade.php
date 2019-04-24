<div class="panel with-nav-tabs panel-primary">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#nav-parametrosDocumentos">
                    Parametros Documentos
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#nav-parametrosPorcentajes">
                    Parametros Porcentaje
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="nav-parametrosPorcentajes">
             @include('admin.Param_Porc.index')
        </div>
         <div class="tab-pane fade in active" id="nav-parametrosDocumentos">
            @include('admin.Param_Docs.index')
        </div>
    </div>
</div>
