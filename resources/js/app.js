/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#crud',
    created: function() {
        this.getCategorias();
        this.getMarcas();
        this.getProductos();
        this.getUnidad();
        this.getCiudad();
        this.getIdentificacion();
        this.getTipoContribuyente();
    },
    data: {
        categorias: [],
        newcategoria: {
            'nomb_cat': '',
            'observ_cat': '',
            'estado_cat': '',
            'fechaini_cat': '',
            'fechafin_cat': '',
            'id_emp': '',
            'id_fec': ''
        },
        fillCategoria: {
            'id_cat': '',
            'nomb_cat': '',
            'observ_cat': '',
            'estado_cat': '',
            'fechaini_cat': '',
            'fechafin_cat': '',
            'id_emp': '',
            'id_fec': ''
        },
        ciudades: [],
        newCiudad: {
            'nomb_ciu': '',
            'estado_ciu': '',
            'fechaini_ciu': '',
            'fechafin_ciu': '',
            'observ_ciu': '',
            'id_emp': '',
            'id_fec': ''
        },
        fillCiudad: {
            'nomb_ciu': '',
            'estado_ciu': '',
            'fechaini_ciu': '',
            'fechafin_ciu': '',
            'observ_ciu': '',
            'id_emp': '',
            'id_fec': ''
        },
        empresas: [],
        newEmpresa: {},
        fillEmpresa: {},
        fechas: [],
        newFecha: {},
        fillFechas: {},
        identificaciones: [],
        newIdentificacion: {
            'sri_ident': '',
            'descrip_ident': '',
            'observ_ident': '',
            'estado_ident': '',
            'fechaini_ident': '',
            'fechafin_ident': ''
        },
        fillIdentificacion: {
            'sri_ident': '',
            'descrip_ident': '',
            'observ_ident': '',
            'estado_ident': '',
            'fechaini_ident': '',
            'fechafin_ident': ''
        },
        marcas: [],
        newMarca: {
            'nomb_marca': '',
            'observ_marca': '',
            'estado_marca': '',
            'fechaini_marca': '',
            'fechafin_marca': ''
        },
        fillMarca: {
            'nomb_marca': '',
            'observ_marca': '',
            'estado_marca': '',
            'fechaini_marca': '',
            'fechafin_marca': ''
        },
        productos: [],
        newProducto: {
            'id_emp': '',
            'id_fec': '',
            'codigo_prod': '',
            'codbarra_prod': '',
            'descripcion_prod': '',
            'id_marca': '',
            'present_prod': '',
            'precio_prod': '',
            'ubicacion_prod': '',
            'stockmin_prod': '',
            'stockmax_prod': '',
            'fechaing_prod': '',
            'fechaelab_prod': '',
            'fechacad_prod': '',
            'aplicaiva_prod': '',
            'aplicaice_prod': '',
            'util_prod': '',
            'comision_prod': '',
            'imagen_prod': '',
            'observ_prod': '',
            'estado_prod': '',
            'fechaini_prod': '',
            'fechafin_prod': ''
        },
        fillProducto: {
            'id_emp': '',
            'id_fec': '',
            'codigo_prod': '',
            'codbarra_prod': '',
            'descripcion_prod': '',
            'id_marca': '',
            'present_prod': '',
            'precio_prod': '',
            'ubicacion_prod': '',
            'stockmin_prod': '',
            'stockmax_prod': '',
            'fechaing_prod': '',
            'fechaelab_prod': '',
            'fechacad_prod': '',
            'aplicaiva_prod': '',
            'aplicaice_prod': '',
            'util_prod': '',
            'comision_prod': '',
            'imagen_prod': '',
            'observ_prod': '',
            'estado_prod': '',
            'fechaini_prod': '',
            'fechafin_prod': ''
        },
        proveedores: [],
        newProveedor: {
            'id_emp': '',
            'id_fec': '',
            'cod_prov': '',
            'id_per': '',
            'obser_prov': '',
            'estado_prov': '',
            'fechaini_prov': '',
            'fechafin_prov': ''
        },
        fillProveedor: {
            'id_emp': '',
            'id_fec': '',
            'cod_prov': '',
            'id_per': '',
            'obser_prov': '',
            'estado_prov': '',
            'fechaini_prov': '',
            'fechafin_prov': ''
        },
        tipoContribuyentes: [],
        newTipoContribuyente: {
            'nomb_contrib': '',
            'obser_contrib': '',
            'estado_contrib': '',
            'fechaini_contrib': '',
            'fechafin_contrib': ''
        },
        fillTipoContribuyente: {
            'nomb_contrib': '',
            'obser_contrib': '',
            'estado_contrib': '',
            'fechaini_contrib': '',
            'fechafin_contrib': ''
        },
        unidades: [],
        newUnidad: {
            'nomb_unidad': '',
            'observ_unidad': '',
            'estado_unidad': '',
            'fechaini_unidad': '',
            'fechafin_unidad': ''
        },
        fillUnidad: {
            'nomb_unidad': '',
            'observ_unidad': '',
            'estado_unidad': '',
            'fechaini_unidad': '',
            'fechafin_unidad': ''
        },
        errors: [],
        buscar_cat: '',
        numregistros: 10,
        src: '',
    },
    computed: {
        buscarCategoria: function() {
            return this.categorias.filter((categoria) => categoria.nomb_cat.includes(this.buscar_cat));
        }
    },
    methods: {
        getCategorias: function() {
                var urlCategorias = 'getCategorias';
                axios.get(urlCategorias).then(response => {
                    this.categorias = response.data
                });
        },
        createCategoria: function() {
            var urlGuardarCategoria = 'storeCategoria';
            axios.post(urlGuardarCategoria, this.newcategoria).then((response) => {
                this.getCategorias();
                newcategoria = {
                    'nomb_cat': '',
                    'observ_cat': '',
                    'estado_cat': '',
                    'fechaini_cat': '',
                    'fechafin_cat': '',
                    'id_emp': '',
                    'id_fec': ''
                };
                this.errors = [];
                $('#crearCategoria').modal('hide');
                toastr.success('Se añadido una nueva categoria');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editCategoria: function(categoria) {
            this.fillCategoria.id_cat = categoria.id_cat;
            this.fillCategoria.id_emp = categoria.id_emp;
            this.fillCategoria.id_fec = categoria.id_fec;
            this.fillCategoria.nomb_cat = categoria.nomb_cat;
            this.fillCategoria.observ_cat = categoria.observ_cat;
            this.fillCategoria.estado_cat = categoria.estado_cat;
            this.fillCategoria.fechaini_cat = categoria.fechaini_cat;
            this.fillCategoria.fechafin_cat = categoria.fechafin_cat;
            $('#editCategoria').modal('show');
        },
        updateCategoria: function(id) {
            var url = 'updateCategoria/' + id;
            axios.post(url, this.fillCategoria).then(response => {
                this.getCategorias();
                this.fillCategoria = {
                    'id_cat': '',
                    'nomb_cat': '',
                    'observ_cat': '',
                    'estado_cat': '',
                    'fechaini_cat': '',
                    'fechafin_cat': '',
                    'id_emp': '',
                    'id_fec': ''
                };
                this.errors = [];
                $('#editCategoria').modal('hide');
                toastr.success('Categoria actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteCategoria: function(categoria) {
            var url = 'deleteCategoria/' + categoria.id_cat;
            axios.delete(url).then(response => {
                this.getCategorias();
                toastr.success('Categoria eliminada con éxito');
            });
        },
        //MEtodos de Identificacion
        getIdentificacion: function() {
            var urlIdentificacion = 'getIdentificacion';
            axios.get(urlIdentificacion).then(response => {
                this.identificaciones = response.data
            });
        },
        createIdentificacion: function() {
            var urlGuardarIdentificacion = 'storeIdentificaciones';
            axios.post(urlGuardarIdentificacion, this.newidentificacion).then((response) => {
                this.getIdentificacion();
                this.newidentificacion.sri_ident = '';
                this.newidentificacion.descrip_ident = '';
                this.newidentificacion.observ_ident = '';
                this.newidentificacion.estado_ident = '';
                this.newidentificacion.fechaini_ident = '';
                this.newidentificacion.fechafin_ident = '';
                this.errors = [];
                $('#crearIdentificacion').modal('hide');
                toastr.success('Se añadido una nueva Identificacion');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editIdentificacion: function(identificacion) {
            this.fillIdentificacion.sri_ident = identificacion.sri_ident;
            this.fillIdentificacion.descrip_ident = identificacion.descrip_ident;
            this.fillIdentificacion.observ_ident = identificacion.observ_ident;
            this.fillIdentificacion.estado_ident = identificacion.estado_ident;
            this.fillIdentificacion.fechaini_ident = identificacion.fechaini_ident;
            this.fillIdentificacion.fechaini_ident = identificacion.fechaini_ident;
            $('#editIdentificacion').modal('show');
        },
        updateIdentificacion: function(id) {
            var url = 'updateIdentificacion/' + id;
            axios.post(url, this.fillIdentificacion).then(response => {
                this.getIdentificacion();
                this.fillIdentificacion.sri_ident = '';
                this.fillIdentificacion.descrip_ident = '';
                this.fillIdentificacion.observ_ident = '';
                this.fillIdentificacion.estado_ident = '';
                this.fillIdentificacion.fechaini_ident = '';
                this.fillIdentificacion.fechaini_ident = '';
                this.errors = [];
                $('#editIdentificacion').modal('hide');
                toastr.success('Identficación actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteIdentificacion: function(categoria) {
            var url = 'deleteIdentidicacion/' + identificacion.id_ident;
            axios.delete(url).then(response => {
                this.getCategorias();
                toastr.success('Identficación eliminada con éxito');
            });
        },
        //MEtodos de Marca
        getMarcas: function() {
            var urlMarca = 'getMarca';
            axios.get(urlMarca).then(response => {
                this.marcas = response.data
            });
        },
        createMarca: function() {
            var urlGuardarMarca = 'storeMarca';
            axios.post(urlGuardarMarca, this.newMarca).then((response) => {
                this.getMarca();
                this.newMarca.nomb_marca = '';
                this.newMarca.observ_marca = '';
                this.newMarca.estado_marca = '';
                this.newMarca.fechaini_marca = '';
                this.newMarca.fechafin_marca = '';
                this.errors = [];
                $('#crearMarca').modal('hide');
                toastr.success('Se ha añadido una nueva Marca');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editMarca: function(marca) {
            this.fillMarca.nomb_marca = marca.nomb_marca;
            this.fillMarca.observ_marca = marca.observ_marca;
            this.fillMarca.estado_marca = marca.estado_marca;
            this.fillMarca.fechaini_marca = marca.fechaini_marca;
            this.fillMarca.fechafin_marca = marca.fechafin_marca;
            $('#editMarca').modal('show');
        },
        updateMarca: function(id) {
            var url = 'updateMarca/' + id;
            axios.post(url, this.fillMarca).then(response => {
                this.getMarca();
                this.fillMarca.nomb_marca = '';
                this.fillMarca.observ_marca = '';
                this.fillMarca.estado_marca = '';
                this.fillMarca.fechaini_marca = '';
                this.fillMarca.fechafin_marca = '';
                this.errors = [];
                $('#editMarca').modal('hide');
                toastr.success('Marca actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteMarca: function(marca) {
            var url = 'deleteMarca/' + marca.id_marca;
            axios.delete(url).then(response => {
                this.getMarca();
                toastr.success('Marca eliminada con éxito');
            });
        },
        //MEtodos de Unidad
        getUnidad: function() {
            var urlUnidad = 'getUnidad';
            axios.get(urlUnidad).then(response => {
                this.unidades = response.data
            });
        },
        createUnidad: function() {
            var urlGuardarUnidad = 'storeUnidad';
            axios.post(urlGuardarUnidad, this.newUnidad).then((response) => {
                this.getUnidad();
                this.newUnidad.nomb_unidad = '';
                this.newUnidad.observ_unidad = '';
                this.newUnidad.estado_unidad = '';
                this.newUnidad.fechaini_unidad = '';
                this.newUnidad.fechafin_unidad = '';
                this.errors = [];
                $('#crearUnidad').modal('hide');
                toastr.success('Se ha añadido una nueva Unidad');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editUnidad: function(unidades) {
            this.fillUnidad.nomb_unidad = unidades.nomb_unidad;
            this.fillUnidad.observ_unidad = unidades.observ_unidad;
            this.fillUnidad.estado_unidad = unidades.estado_unidad;
            this.fillUnidad.fechaini_unidad = unidades.fechaini_unidad;
            this.fillUnidad.fechafin_unidad = unidades.fechafin_unidad;
            $('#editUnidad').modal('show');
        },
        updateUnidad: function(id) {
            var url = 'updateUnidad/' + id;
            axios.post(url, this.fillUnidad).then(response => {
                this.getUnidad();
                this.fillUnidad.nomb_unidad = '';
                this.fillUnidad.observ_unidad = '';
                this.fillUnidad.estado_unidad = '';
                this.fillUnidad.fechaini_unidad = '';
                this.fillUnidad.fechafin_unidad = '';
                this.errors = [];
                $('#editUnidad').modal('hide');
                toastr.success('Unidad actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteUnidad: function(unidades) {
            var url = 'deleteUnidad/' + unidades.id_unidad;
            axios.delete(url).then(response => {
                this.getUnidad();
                toastr.success('Unidad eliminada con éxito');
            });
        },
        //MEtodos de TipoContribuyente
        getTipoContribuyente: function() {
            var urlContribuyente = 'getTipoContribuyente';
            axios.get(urlContribuyente).then(response => {
                this.tipoContribuyentes = response.data
            });
        },
        createTipoContribuyente: function() {
            var urlGuardarContribuyente = 'storeTipoContribuyente';
            axios.post(urlGuardarContribuyente, this.newcontribuyente).then((response) => {
                this.getTipoContribuyente();
                this.newcontribuyente.nomb_contrib = '';
                this.newcontribuyente.obser_contrib = '';
                this.newcontribuyente.estado_contrib = '';
                this.newcontribuyente.fechaini_contrib = '';
                this.newcontribuyente.fechafin_contrib = '';
                this.errors = [];
                $('#crearContribuyente').modal('hide');
                toastr.success('Se ha añadido un Nuevo Tipo de Contribuyente');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editTipoContribuyente: function(tipoContribuyentes) {
            this.fillTipoContribuyente.nomb_contrib = tipoContribuyentes.nomb_contrib;
            this.fillTipoContribuyente.obser_contrib = tipoContribuyentes.obser_contrib;
            this.fillTipoContribuyente.estado_contrib = tipoContribuyentes.estado_contrib;
            this.fillTipoContribuyente.fechaini_contrib = tipoContribuyentes.fechaini_contrib;
            this.fillTipoContribuyente.fechafin_contrib = tipoContribuyentes.fechafin_contrib;
            $('#editTipoContribuyente').modal('show');
        },
        updateTipoContribuyente: function(id) {
            var url = 'updateTipoContribuyente/' + id;
            axios.post(url, this.fillTipoContribuyente).then(response => {
                this.getTipoContribuyente();
                this.fillTipoContribuyente.nomb_contrib = '';
                this.fillTipoContribuyente.obser_contrib = '';
                this.fillTipoContribuyente.estado_contrib = '';
                this.fillTipoContribuyente.fechaini_contrib = '';
                this.fillTipoContribuyente.fechafin_contrib = '';
                this.errors = [];
                $('#editTipoContribuyente').modal('hide');
                toastr.success('Tipo de Contribuyente actualizado con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteTipoContribuyente: function(tipoContribuyentes) {
            var url = 'deleteTipoContribuyente/' + tipoContribuyentes.id_contrib;
            axios.delete(url).then(response => {
                this.getTipoContribuyente();
                toastr.success('Tipo de Contribuyente eliminado con éxito');
            });
        },
        //MEtodos de Ciudad
        getCiudad: function() {
            var urlCiudad = 'getCiudad';
            axios.get(urlCiudad).then(response => {
                this.ciudades = response.data
            });
        },
        createCiudad: function() {
            var urlGuardarCiudad = 'storeCiudad';
            axios.post(urlGuardarCiudad, this.newciudad).then((response) => {
                this.getCiudad();
                this.newciudad.nomb_ciu = '';
                this.newciudad.estado_ciu = '';
                this.newciudad.fechaini_ciu = '';
                this.newciudad.fechafin_ciu = '';
                this.newciudad.observ_ciu = '';
                this.newciudad.id_emp = '';
                this.newciudad.id_fec = '';
                this.errors = [];
                $('#crearCiudad').modal('hide');
                toastr.success('Se ha añadido una Nueva Ciudad');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editCiudad: function(ciudades) {
            this.fillCiudad.nomb_ciu = ciudades.nomb_ciu;
            this.fillCiudad.estado_ciu = ciudades.estado_ciu;
            this.fillCiudad.fechaini_ciu = ciudades.fechaini_ciu;
            this.fillCiudad.fechafin_ciu = ciudades.fechafin_ciu;
            this.fillCiudad.observ_ciu = ciudades.observ_ciu;
            this.fillCiudad.id_emp = ciudades.id_emp;
            this.fillCiudad.id_fec = ciudades.id_fec;
            $('#editCiudad').modal('show');
        },
        updateCiudad: function(id) {
            var url = 'updateCiudad/' + id;
            axios.post(url, this.fillCiudad).then(response => {
                this.getCiudad();
                this.fillCiudad.nomb_ciu = '';
                this.fillCiudad.estado_ciu = '';
                this.fillCiudad.fechaini_ciu = '';
                this.fillCiudad.fechafin_ciu = '';
                this.fillCiudad.observ_ciu = '';
                this.fillCiudad.id_emp = '';
                this.fillCiudad.id_fec = '';
                this.errors = [];
                $('#editCiudad').modal('hide');
                toastr.success('Ciudad actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteCiudad: function(ciudades) {
            var url = 'deleteCiudad/' + ciudades.id_ciu;
            axios.delete(url).then(response => {
                this.getCiudad();
                toastr.success('Ciudad eliminada con éxito');
            });
        },
        //Productos
        getImagenProducto(event) {
            //Asignamos la imagen a  nuestra data
            this.newProducto.imagen_prod = event.target.files[0].name;
        },
        getProductos: function() {
            var urlProducto = 'getProductos';
            axios.get(urlProducto).then(response => {
                this.productos = response.data;
            });
        },
        createProducto: function() {
            var urlGuardarProducto = 'storeProducto';
            axios.post(urlGuardarProducto, this.newproducto).then((response) => {
                this.getProductos();
                this.id_emp = '';
                this.id_fec = '';
                this.codigo_prod = '';
                this.codbarra_prod = '';
                this.descripcion_prod = '';
                this.id_marca = '';
                this.present_prod = '';
                this.precio_prod = '';
                this.ubicacion_prod = '';
                this.stockmin_prod = '';
                this.stockmax_prod = '';
                this.fechaing_prod = '';
                this.fechaelab_prod = '';
                this.fechacad_prod = '';
                this.aplicaiva_prod = '';
                this.aplicaice_prod = '';
                this.util_prod = '';
                this.comision_prod = '';
                this.imagen_prod = '';
                this.observ_prod = '';
                this.estado_prod = '';
                this.fechaini_prod = '';
                this.fechafin_prod = '';
                this.errors = [];
                $('#crearProducto').modal('hide');
                toastr.success('Se añadido una nueva producto');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editProducto: function(producto) {
            this.fillProducto.id_emp = producto.id_emp;
            this.fillProducto.id_fec = producto.id_fec;
            this.fillProducto.codigo_prod = producto.codigo_prod;
            this.fillProducto.codbarra_prod = producto.codbarra_prod;
            this.fillProducto.descripcion_prod = producto.descripcion_prod;
            this.fillProducto.id_marca = producto.id_marca;
            this.fillProducto.present_prod = producto.present_prod;
            this.fillProducto.precio_prod = producto.precio_prod;
            this.fillProducto.ubicacion_prod = producto.ubicacion_prod;
            this.fillProducto.stockmin_prod = producto.stockmin_prod;
            this.fillProducto.stockmax_prod = producto.stockmax_prod;
            this.fillProducto.fechaing_prod = producto.fechaing_prod;
            this.fillProducto.fechaelab_prod = producto.fechaelab_prod;
            this.fillProducto.fechacad_prod = producto.fechacad_prod;
            this.fillProducto.aplicaiva_prod = producto.aplicaiva_prod;
            this.fillProducto.aplicaice_prod = producto.aplicaice_prod;
            this.fillProducto.util_prod = producto.util_prod;
            this.fillProducto.comision_prod = producto.comision_prod;
            this.fillProducto.imagen_prod = producto.imagen_prod;
            this.fillProducto.observ_prod = producto.observ_prod;
            this.fillProducto.estado_prod = producto.estado_prod;
            this.fillProducto.fechaini_prod = producto.fechaini_prod;
            this.fillProducto.fechafin_prod = producto.fechafin_prod;
            $('#editProducto').modal('show');
        },
        viewProducto: function(producto) {
            var urlImagenProducto = '../img/producto/';
            this.fillProducto.id_emp = producto.id_emp;
            this.fillProducto.id_fec = producto.id_fec;
            this.fillProducto.codigo_prod = producto.codigo_prod;
            this.fillProducto.codbarra_prod = producto.codbarra_prod;
            this.fillProducto.descripcion_prod = producto.descripcion_prod;
            this.fillProducto.id_marca = producto.id_marca;
            this.fillProducto.present_prod = producto.present_prod;
            this.fillProducto.precio_prod = producto.precio_prod;
            this.fillProducto.ubicacion_prod = producto.ubicacion_prod;
            this.fillProducto.stockmin_prod = producto.stockmin_prod;
            this.fillProducto.stockmax_prod = producto.stockmax_prod;
            this.fillProducto.fechaing_prod = producto.fechaing_prod;
            this.fillProducto.fechaelab_prod = producto.fechaelab_prod;
            this.fillProducto.fechacad_prod = producto.fechacad_prod;
            this.fillProducto.aplicaiva_prod = producto.aplicaiva_prod;
            this.fillProducto.aplicaice_prod = producto.aplicaice_prod;
            this.fillProducto.util_prod = producto.util_prod;
            this.fillProducto.comision_prod = producto.comision_prod;
            this.src = urlImagenProducto + producto.imagen_prod;
            this.fillProducto.observ_prod = producto.observ_prod;
            this.fillProducto.estado_prod = producto.estado_prod;
            this.fillProducto.fechaini_prod = producto.fechaini_prod;
            this.fillProducto.fechafin_prod = producto.fechafin_prod;
            $('#viewProducto').modal('show');
        },
        updateProducto: function(id) {
            var url = 'updateProducto/' + id;
            axios.post(url, this.fillProducto).then(response => {
                this.getProductos();
                this.fillProducto.id_emp = '';
                this.fillProducto.id_fec = '';
                this.fillProducto.codigo_prod = '';
                this.fillProducto.codbarra_prod = '';
                this.fillProducto.descripcion_prod = '';
                this.fillProducto.id_marca = '';
                this.fillProducto.present_prod = '';
                this.fillProducto.precio_prod = '';
                this.fillProducto.ubicacion_prod = '';
                this.fillProducto.stockmin_prod = '';
                this.fillProducto.stockmax_prod = '';
                this.fillProducto.fechaing_prod = '';
                this.fillProducto.fechaelab_prod = '';
                this.fillProducto.fechacad_prod = '';
                this.fillProducto.aplicaiva_prod = '';
                this.fillProducto.aplicaice_prod = '';
                this.fillProducto.util_prod = '';
                this.fillProducto.comision_prod = '';
                this.fillProducto.imagen_prod = '';
                this.fillProducto.observ_prod = '';
                this.fillProducto.estado_prod = '';
                this.fillProducto.fechaini_prod = '';
                this.fillProducto.fechafin_prod = '';
                this.errors = [];
                $('#editProducto').modal('hide');
                toastr.success('Producto actualizado con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteProducto: function(producto) {
            var url = 'deleteProducto/' + producto.id_cat;
            axios.delete(url).then(response => {
                this.getCategorias();
                toastr.success('Producto eliminado con éxito');
            });
        }
    }
});