<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{asset("Compras")}}"><i class="fa fa-shopping-cart"></i> <span>Compras</span></a></li>
        <li><a href="{{asset("Ventas")}}"><i class="fa fa-money"></i> <span>Ventas</span></a></li>
        <li><a href="{{asset("Contabilidad")}}"><i class="fa fa-money"></i> <span>Contabilidad</span></a></li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-cog"></i>
            <span>Configuración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            @include('admin.partials.menuConfiguracion')
        </li>
      </ul>
