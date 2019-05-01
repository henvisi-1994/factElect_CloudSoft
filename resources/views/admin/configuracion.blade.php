@extends('admin.layouts.app')
@section('content')
<div class="box">
    <div class="box-body">
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">
                        <a href="#">
                            Configuración
                        </a>
                    </li>
                    <li>
                        <a href="#nav-categoria" v-on:click.prevent="menu.item=0">
                            <i class="fa fa-sitemap">
                            </i>
                            Categoria
                        </a>
                    </li>
                    <li>
                        <a href="#nav-marca" v-on:click.prevent="menu.item=1">
                            <i class="fa fa-tags">
                            </i>
                            Marca
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=2">
                            <i class="fa fa-puzzle-piece">
                            </i>
                            Unidad
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=3">
                            <i class="fa fa-bookmark-o">
                            </i>
                            Descuentos
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=4">
                            <i class="fa fa-map-o">
                            </i>
                            Ciudad
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=5">
                            <i class="fa fa-globe">
                            </i>
                            País
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=6">
                            <i class="fa fa-user-times">
                            </i>
                            Provincia
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=7">
                            Empresa
                            <i class="fa fa-industry">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=8">
                            Bodega
                            <i class="fa fa-building">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=9">
                            Usuarios
                            <i class="fa fa-users">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click.prevent="menu.item=10">
                            Roles
                            <i class="fa fa-user-times">
                            </i>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        <!-- Page Content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div id="nav-marca" v-show="menu.item==0">
                    @include('admin.Categoria.index')
                </div>
                <div id="nav-marca" v-show="menu.item==1">
                    @include('admin.Marca.index')
                </div>
                <div id="nav-unidad" v-show="menu.item==2">
                    @include('admin.Unidad.index')
                </div>
                <div id="nav-descuentos" v-show="menu.item==3">
                    @include('admin.Descuento.index')
                </div>
                <div id="nav-empresa" v-show="menu.item==7">
                    @include('admin.Empresa.index')
                </div>
                <div id="nav-ciudad" v-show="menu.item==4">
                    @include('admin.Ciudad.index')
                </div>
                <div id="nav-usuario" v-show="menu.item==9">
                    @include('admin.Usuario.index')
                </div>
                <div id="nav-rol" v-show="menu.item==10">
                    @include('admin.Rol.index')
                </div>
                <div id="nav-provincia" v-show="menu.item==6">
                    @include('admin.Provincia.index')
                </div>
                <div id="nav-bodega" v-show="menu.item==8">
                    @include('admin.Bodega.index')
                </div>
                <div id="nav-pais" v-show="menu.item==5">
                    @include('admin.Pais.index')
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
</div>
@endsection
