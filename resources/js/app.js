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
        this.getProveedores();
        this.getBodega();
        this.getPais();
        this.getProvincia();
        this.getEmpresa();
        this.getRoles();
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
        bodegas:[],
        newbodega:{
            'nombre_bod':'',
            'direcc_bod':'',
            'telef_bod':'',
            'cel_bod':'',
            'nomb_contac_bod':'',
            'fechaini_bod':'',
            'fechafin_bod':'',
            'id_ciu':'',
            'id_pais':'',
            'id_prov':''
        },
        fillBodega:{
            'id_bod': '',
            'nombre_bod':'',
            'direcc_bod':'',
            'telef_bod':'',
            'cel_bod':'',
            'nomb_contac_bod':'',
            'fechaini_bod':'',
            'fechafin_bod':'',
            'id_ciu':'',
            'id_pais':'',
            'id_prov':''
        },
        paises:[],
        newPais:{
            'nomb_pais':'',
            'estado_pais':''
        },
        fillPais:{
            'id_pais':'',
            'nomb_pais':'',
            'estado_pais':''
        },
        provincias:[],
        newProvincia:{
            'nomb_prov':'',
            'id_pais':'',
            'estado_prov':''
        },
        fillProvincia:{
            'id_prov':'',
            'nomb_prov':'',
            'id_pais':'',
            'estado_prov':''
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
            'id_ciu':'',
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
            'id_ident':'',
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
            'id_marca':'',
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
            'id_prod':'',
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
         newPersona: {
            'id_contrib': '',
            'id_ident': '',
            'id_ciu': '',
            'doc_per': '',
            'organiz_per': '',
            'nombre_per': '',
            'apel_per': '',
            'direc_per': '',
            'fono1_per': '',
            'fono2_per': '',
            'cel1_per': '',
            'cel2_per': '',
            'fecnac_per': '',
            'correo_per': '',
            'estado_per': '',
            'fechaini_per': '',
            'fechafin_per': ''
        },
        fillPersona: {
            'id_per': '',
            'id_contrib': '',
            'id_ident': '',
            'id_ciu': '',
            'doc_per': '',
            'organiz_per': '',
            'nombre_per': '',
            'apel_per': '',
            'direc_per': '',
            'fono1_per': '',
            'fono2_per': '',
            'cel1_per': '',
            'cel2_per': '',
            'fecnac_per': '',
            'correo_per': '',
            'estado_per': '',
            'fechaini_per': '',
            'fechafin_per': ''
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
            'id_prov': '',
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
            'id_contrib':'',
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
            'id_unidad':'',
            'nomb_unidad': '',
            'observ_unidad': '',
            'estado_unidad': '',
            'fechaini_unidad': '',
            'fechafin_unidad': ''
        },
         empresas: [],
        newEmpresa:{
            'id_ciu':'',
            'totestab_emp':'',
            'rucempresa_emp':'', 
            'razon_emp':'', 
            'nombre_emp':'', 
            'apellido_emp':'',
            'contacto_emp':'', 
            'direcc_emp':'',
            'telefono_emp':'', 
            'celular_emp':'', 
            'fax_emp':'', 
            'email_emp':'', 
            'estado_emp':'',
            'contador_emp': '',
            'tipcontrib_emp':'',
            'fechaini_emp':'',
            'fechafin_emp':''
        },
        fillEmpresa:{
            'id_ciu':'',
            'totestab_emp':'',
            'rucempresa_emp':'', 
            'razon_emp':'', 
            'nombre_emp':'', 
            'apellido_emp':'',
            'contacto_emp':'', 
            'direcc_emp':'',
            'telefono_emp':'', 
            'celular_emp':'', 
            'fax_emp':'', 
            'email_emp':'', 
            'estado_emp':'',
            'contador_emp': '',
            'tipcontrib_emp':'',
            'fechaini_emp':'',
             'fechafin_emp':''
        },
        roles:[],
        newRol:{
            'id_emp':'',
            'id_fec':'',
            'nomb_rol':'',
            'observ_rol': '', 
            'estado_rol': '',
            'fechaini_rol': '', 
            'fechafin_rol': ''
        },

        fillRol:{
            'id_emp':'',
            'id_fec':'',
            'nomb_rol':'',
            'observ_rol': '', 
            'estado_rol': '',
            'fechaini_rol': '', 
            'fechafin_rol': ''
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
            axios.post(url).then(response => {
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
            axios.post(urlGuardarIdentificacion, this.newIdentificacion).then((response) => {
                this.getIdentificacion();
                this.newIdentificacion.sri_ident = '';
                this.newIdentificacion.descrip_ident = '';
                this.newIdentificacion.observ_ident = '';
                this.newIdentificacion.estado_ident = '';
                this.newIdentificacion.fechaini_ident = '';
                this.newIdentificacion.fechafin_ident = '';
                this.errors = [];
                $('#crearIdentificaciones').modal('hide');
                toastr.success('Se añadido una nueva Identificacion');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editIdentificacion: function(identificacion) {
            this.fillIdentificacion.id_ident = identificacion.id_ident;
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
        deleteIdentificacion: function(identificacion) {
            var url = 'deleteIdentificacion/' + identificacion.id_ident;
            axios.post(url).then(response => {
                this.getIdentificacion();
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
            this.fillMarca.id_marca=marca.id_marca;
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
                this.getMarcas();
                this.fillMarca = {
                    'id_marca': '',
                    'nomb_marca': '',
                    'observ_marca': '',
                    'estado_marca': '',
                    'fechaini_marca': '',
                    'fechafin_marca': ''
                };
                this.errors = [];
                $('#editMarca').modal('hide');
                toastr.success('Marca actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteMarca: function(marca) {
            var url = 'deleteMarca/' + marca.id_marca;
            axios.post(url).then(response => {
                this.getMarcas();
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
            this.fillUnidad.id_unidad=unidades.id_unidad;
            this.fillUnidad.nomb_unidad = unidades.nomb_unidad;
            this.fillUnidad.observ_unidad = unidades.observ_unidad;
            this.fillUnidad.estado_unidad = unidades.estado_unidad;
            this.fillUnidad.fechaini_unidad = unidades.fechaini_unidad;
            this.fillUnidad.fechafin_unidad = unidades.fechafin_unidad;
            $('#editUnidad').modal('show');
        },
        updateUnidad: function(id) {
            var urlEditarUnidad = 'updateUnidad/' + id;
            axios.post(urlEditarUnidad, this.fillUnidad).then(response => {
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
            axios.post(url).then(response => {
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
            axios.post(urlGuardarContribuyente, this.newTipoContribuyente).then((response) => {
                this.getTipoContribuyente();
                this.newTipoContribuyente.nomb_contrib = '';
                this.newTipoContribuyente.obser_contrib = '';
                this.newTipoContribuyente.estado_contrib = '';
                this.newTipoContribuyente.fechaini_contrib = '';
                this.newTipoContribuyente.fechafin_contrib = '';
                this.errors = [];
                $('#crearTipoContribuyente').modal('hide');
                toastr.success('Se ha añadido un Nuevo Tipo de Contribuyente');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editTipoContribuyente: function(tipoContribuyentes) {
            this.fillTipoContribuyente.id_contrib = tipoContribuyentes.id_contrib;
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
            axios.post(url).then(response => {
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
                this.newciudad.id_prov = '';
                this.newciudad.id_fec = '';
                this.errors = [];
                $('#crearCiudad').modal('hide');
                toastr.success('Se ha añadido una Nueva Ciudad');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editCiudad: function(ciudades) {
            this.fillCiudad.id_ciu=ciudades.id_ciu;
            this.fillCiudad.nomb_ciu = ciudades.nomb_ciu;
            this.fillCiudad.estado_ciu = ciudades.estado_ciu;
            this.fillCiudad.fechaini_ciu = ciudades.fechaini_ciu;
            this.fillCiudad.fechafin_ciu = ciudades.fechafin_ciu;
            this.fillCiudad.observ_ciu = ciudades.observ_ciu;
            this.fillCiudad.id_emp = ciudades.id_emp;
            this.fillCiudad.id_prov = ciudades.id_prov;
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
            var files = event.target.files || event.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
        },
        createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = (event) => {
                vm.image = event.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function(event) {
            this.image = '';
        },
         getProductos: function() {
            var urlProducto = 'getProductos';
            axios.get(urlProducto).then(response => {
                this.productos = response.data;
            });
        },
        createProducto: function() {
            var urlGuardarProducto = 'storeProducto';
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = (event) => {
                vm.image = event.target.result;
            };
            this.newProducto.imagen_prod = vm.image;
            axios.post(urlGuardarProducto, this.newProducto).then((response) => {
                this.getProductos();
                this.newProducto.id_emp = '';
                this.newProducto.id_fec = '';
                this.newProducto.codigo_prod = '';
                this.newProducto.codbarra_prod = '';
                this.newProducto.descripcion_prod = '';
                this.newProducto.id_marca = '';
                this.newProducto.present_prod = '';
                this.newProducto.precio_prod = '';
                this.newProducto.ubicacion_prod = '';
                this.newProducto.stockmin_prod = '';
                this.newProducto.stockmax_prod = '';
                this.newProducto.fechaing_prod = '';
                this.newProducto.fechaelab_prod = '';
                this.newProducto.fechacad_prod = '';
                this.newProducto.aplicaiva_prod = '';
                this.newProducto.aplicaice_prod = '';
                this.newProducto.util_prod = '';
                this.newProducto.comision_prod = '';
                this.newProducto.imagen_prod = '';
                this.newProducto.observ_prod = '';
                this.newProducto.estado_prod = '';
                this.newProducto.fechaini_prod = '';
                this.newProducto.fechafin_prod = '';
                this.errors = [];
                $('#crearProducto').modal('hide');
                toastr.success('Se añadido una nueva producto');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editProducto: function(producto) {
            this.fillProducto.id_prod = producto.id_prod;
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
            this.fillProducto.fechaing_prod= producto.fechaing_prod;
            this.fillProducto.fechaelab_prod = producto.fechaelab_prod;
            this.fillProducto.fechacad_prod = producto.fechacad_prod;
            this.fillProducto.aplicaiva_prod = producto.aplicaiva_prod;
            this.fillProducto.aplicaice_prod = producto.aplicaice_prod;
            this.fillProducto.imagen_prod = producto.imagen_prod;
            this.fillProducto.util_prod = producto.util_prod;
            this.fillProducto.comision_prod = producto.comision_prod;
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
        updateProducto: function(id,imagen_prod) {
            var url = 'updateProducto/' + id;
            this.fillProducto.imagen_prod = imagen_prod;
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
            var url = 'deleteProducto/' + producto.id_prod;
            axios.post(url).then(response => {
                this.getProductos();
                toastr.success('Producto eliminado con éxito');
            });
        },
         //Persona
        getPersonas: function() {
            var urlPersona = 'getProductos';
            axios.get(urlPersona).then(response => {
                this.productos = response.data;
            });
        },
        createPersonaProveedor: function() {
            var urlGuardarPersona = 'storePersona';
            axios.post(urlGuardarPersona, this.newPersona).then((response) => {
                this.newPersona.id_contrib = '';
                this.newPersona.id_ident = '';
                this.newPersona.id_ciu = '';
                this.newProveedor.doc_per='';
                this.newPersona.organiz_per = '';
                this.newPersona.nombre_per = '';
                this.newPersona.apel_per = '';
                this.newPersona.direc_per = '';
                this.newPersona.fono1_per = '';
                this.newPersona.fono2_per = '';
                this.newPersona.cel1_per = '';
                this.newPersona.cel2_per = '';
                this.newPersona.fecnac_per = '';
                this.newPersona.correo_per = '';
                this.newPersona.estado_per = '';
                this.newPersona.fechaini_per = '';
                this.newPersona.fechafin_per = '';
                this.errors = [];
                $('#crearPersona').modal('hide');
                this.newProveedor.id_per = response.data;
                $('#crearProveedor').modal('show');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editPersona: function(persona) {
            this.fillPersona.id_contrib = persona.id_contrib;
            this.fillPersona.id_ident = persona.id_ident;
            this.fillPersona.id_ciu = persona.id_ciu;
            this.fillPersona.doc_per = persona.doc_per;
            this.fillPersona.organiz_per = persona.organiz_per;
            this.fillPersona.nombre_per = persona.nombre_per;
            this.fillPersona.apel_per = persona.apel_per;
            this.fillPersona.direc_per = persona.direc_per;
            this.fillPersona.fono1_per = persona.fono1_per;
            this.fillPersona.fono2_per = persona.fono2_per;
            this.fillPersona.cel1_per = persona.cel1_per;
            this.fillPersona.cel2_per = persona.cel2_per;
            this.fillPersona.fecnac_per = persona.fecnac_per;
            this.fillPersona.correo_per = persona.correo_per;
            this.fillPersona.estado_per = persona.estado_per;
            this.fillPersona.fechaini_per = persona.fechaini_per;
            this.fillPersona.fechafin_per = persona.fechafin_per;
            $('#editPersona').modal('show');
        },
        updatePersona: function(id) {
            var url = 'updatePersona/' + id;
            axios.post(url, this.fillPersona).then(response => {
                this.fillPersona.id_contrib = '';
                this.fillPersona.id_ident = ''
                this.fillPersona.id_ciu = ''
                this.fillPersona.doc_per = '';
                this.fillPersona.organiz_per = '';
                this.fillPersona.nombre_per = '';
                this.fillPersona.apel_per = '';
                this.fillPersona.direc_per = '';
                this.fillPersona.fono1_per = '';
                this.fillPersona.fono2_per = '';
                this.fillPersona.cel1_per = '';
                this.fillPersona.cel2_per = '';
                this.fillPersona.fecnac_per = '';
                this.fillPersona.correo_per = '';
                this.fillPersona.estado_per = '';
                this.fillPersona.fechaini_per = '';
                this.fillPersona.fechafin_per = '';
                this.errors = [];
                $('#editPersona').modal('hide');
                $('#editProveedor').modal('show');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deletePersona: function(persona) {
            var url = 'deletePersona/' + persona.id_per;
            axios.post(url).then(response => {
                this.getProductos();
                toastr.success('Persona eliminado con éxito');
            });
        },
        //Proveedores
        getProveedores: function() {
            var urlProveedor = 'getProveedor';
            axios.get(urlProveedor).then(response => {
                this.proveedores = response.data;
            });
        },
        createProveedor: function() {
            var urlGuardarProveedor = 'storeProveedor';
            axios.post(urlGuardarProveedor, this.newProveedor).then((response) => {
                this.getProveedores();
                this.newProveedor.id_emp = '';
                this.newProveedor.id_fec = '';
                this.newProveedor.cod_prov = '';
                this.newProveedor.obser_prov = '';
                this.newProveedor.estado_prov = '';
                this.newProveedor.fechaini_prov = '';
                this.newProveedor.fechafin_prov = '';
                this.errors = [];
                $('#crearProveedor').modal('hide');
                toastr.success('Se añadido una nuevo Proveedor');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        updateProveedor: function(id) {
            var url = 'updateProveedor/' + id;
            axios.post(url, this.fillProveedor).then(response => {
                this.getProveedores();
                                this.fillPersona.id_contrib = '';
                this.fillPersona.id_ident = '';
                this.fillPersona.id_ciu = '';
                this.fillPersona.doc_per = '';
                this.fillPersona.organiz_per = '';
                this.fillPersona.nombre_per = '';
                this.fillPersona.apel_per = '';
                this.fillPersona.direc_per = '';
                this.fillPersona.fono1_per = '';
                this.fillPersona.fono2_per = '';
                this.fillPersona.cel1_per = '';
                this.fillPersona.cel2_per = '';
                this.fillPersona.fecnac_per = '';
                this.fillPersona.correo_per = '';
                this.fillPersona.estado_per = '';
                this.fillPersona.fechaini_per = '';
                this.fillPersona.fechafin_per = '';
                this.fillProveedor.id_emp = '';
                this.fillProveedor.id_fec = '';
                this.fillProveedor.cod_prov = '';
                this.fillProveedor.id_per = id;
                this.fillProveedor.obser_prov = '';
                this.fillProveedor.estado_prov = '';
                this.fillProveedor.fechaini_prov = '';
                this.fillProveedor.fechafin_prov = '';
                this.errors = [];
                $('#editProveedor').modal('hide');
                toastr.success('Proveedor actualizado con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editProveedor: function(proveedor) {
            this.fillProveedor.id_prov = proveedor.id_prov;
            this.fillProveedor.id_emp = proveedor.id_emp;
            this.fillProveedor.id_fec = proveedor.id_fec;
            this.fillProveedor.cod_prov = proveedor.cod_prov;
            this.fillProveedor.id_per = proveedor.id_per;
            this.fillProveedor.obser_prov = proveedor.obser_prov;
            this.fillProveedor.estado_prov = proveedor.estado_prov;
            this.fillProveedor.fechaini_prov = proveedor.fechaini_prov;
            this.fillProveedor.fechafin_prov = proveedor.fechafin_prov;
            //persona
             this.fillPersona.id_per = proveedor.id_per;
            this.fillPersona.id_contrib = proveedor.id_contrib;
            this.fillPersona.id_ident = proveedor.id_ident;
            this.fillPersona.id_ciu = proveedor.id_ciu;
            this.fillPersona.doc_per = proveedor.doc_per;
            this.fillPersona.organiz_per = proveedor.organiz_per;
            this.fillPersona.nombre_per = proveedor.nombre_per;
            this.fillPersona.apel_per = proveedor.apel_per;
            this.fillPersona.direc_per = proveedor.direc_per;
            this.fillPersona.fono1_per = proveedor.fono1_per;
            this.fillPersona.fono2_per = proveedor.fono2_per;
            this.fillPersona.cel1_per = proveedor.cel1_per;
            this.fillPersona.cel2_per = proveedor.cel2_per;
            this.fillPersona.fecnac_per = proveedor.fecnac_per;
            this.fillPersona.correo_per = proveedor.correo_per;
            this.fillPersona.estado_per = proveedor.estado_per;
            this.fillPersona.fechaini_per = proveedor.fechaini_per;
            this.fillPersona.fechafin_per = proveedor.fechafin_per;
            $('#editPersona').modal('show');
        },
        deleteProveedor: function(proveedor) {
            var url = 'deleteProveedor/' + proveedor.id_prov;
            this.deletePersona(proveedor);
            axios.post(url).then(response => {
                this.getProveedores();
                toastr.success('Proveedor eliminado con éxito');
            });
        },



        ///Metodos de Bodega
        getBodega: function() {
                var urlBodega = 'getBodega';
                axios.get(urlBodega).then(response => {
                    this.bodegas = response.data
                });
        },
        createBodega: function() {
            var urlGuardarBodega = 'storeBodega';
            axios.post(urlGuardarBodega, this.newbodega).then((response) => {
                this.getBodega();
                this.nombre_bod='';
                this.direcc_bod='';
                this.telef_bod='';
                this.cel_bod='';
                this.nomb_contac_bod='';
                this.estado_bod='';
                this.fechaini_bod='';
                this.fechafin_bod='';
                this.id_ciu='';
                this.id_pais='';
                this.id_prov='';
                this.errors = [];
                $('#crearBodega').modal('hide');
                toastr.success('Se ha añadido una nueva Bodega');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editBodega: function(bodegas) {
            this.fillBodega.id_bod=bodegas.id_bod;
            this.fillBodega.nombre_bod=bodegas.nombre_bod;
            this.fillBodega.direcc_bod=bodegas.direcc_bod;
            this.fillBodega.telef_bod=bodegas.telef_bod;
            this.fillBodega.cel_bod=bodegas.cel_bod;
            this.fillBodega.nomb_contac_bod=bodegas.nomb_contac_bod;
            this.fillBodega.fechaini_bod=bodegas.fechaini_bod;
            this.fillBodega.fechafin_bod=bodegas.fechafin_bod;
            this.fillBodega.estado_bod=bodegas.estado_bod;
            this.fillBodega.id_ciu=bodegas.id_ciu;
            this.fillBodega.id_pais=bodegas.id_pais;
            this.fillBodega.id_prov=bodegas.id_prov;
            $('#editBodega').modal('show');
        },
        updateBodega: function(id) {
            var url = 'updateBodega/' + id;
            axios.post(url, this.fillBodega).then(response => {
                this.getBodega();
                this.nombre_bod='';
                this.direcc_bod='';
                this.telef_bod='';
                this.cel_bod='';
                this.nomb_contac_bod='';
                this.estado_bod='';
                this.fechaini_bod='';
                this.fechafin_bod='';
                this.id_ciu='';
                this.id_pais='';
                this.id_prov='';
                this.errors = [];
                $('#editBodega').modal('hide');
                toastr.success('Bodega actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteBodega: function(bodegas) {
            var url = 'deleteBodega/' + bodegas.id_bod;
            axios.post(url).then(response => {
                this.getBodega();
                toastr.success('Bodega eliminada con éxito');
            });
        },



        ///Metodos de Pais
        getPais: function() {
                var urlPais = 'getPais';
                axios.get(urlPais).then(response => {
                    this.paises = response.data
                });
        },
        createPais: function() {
            var urlGuardarPais = 'storePais';
            axios.post(urlGuardarPais, this.newPais).then((response) => {
                this.getPais();
                this.nomb_pais='';
                this.estado_pais='';
                this.errors = [];
                $('#crearPais').modal('hide');
                toastr.success('Se ha añadido un nuevo Pais');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editPais: function(paises) {
            this.fillPais.id_pais=paises.id_pais;
            this.fillPais.nomb_pais=paises.nomb_pais;
            this.fillPais.estado_pais=paises.estado_pais;
            $('#editPais').modal('show');
        },
        updatePais: function(id) {
            var url = 'updatePais/' + id;
            axios.post(url, this.fillPais).then(response => {
                this.getPais();
                this.nomb_pais='';
                this.estado_pais='';
                this.errors = [];
                $('#editPais').modal('hide');
                toastr.success('Pais actualizado con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deletePais: function(bodegas) {
            var url = 'deletePais/' + paises.id_pais;
            axios.post(url).then(response => {
                this.getPais();
                toastr.success('Pais eliminado con éxito');
            });
        },


        ///Metodos de Provincias
        getProvincia: function() {
                var urlProvincia = 'getProvincia';
                axios.get(urlProvincia).then(response => {
                    this.provincias = response.data
                });
        },
        createProvincia: function() {
            var urlGuardarProvincia = 'storeProvincia';
            axios.post(urlGuardarProvincia, this.newProvincia).then((response) => {
                this.getProvincia();
                this.nomb_prov='';
                this.estado_prov='';
                this.errors = [];
                $('#crearProvincia').modal('hide');
                toastr.success('Se ha añadido una nueva Provincia');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editProvincia: function(provincias) {
            this.fillProvincia.id_prov=provincias.id_prov;
            this.fillProvincia.id_pais=provincias.id_pais;
            this.fillProvincia.nomb_prov=provincias.nomb_prov;
            this.fillProvincia.estado_prov=provincias.estado_prov;
            $('#editProvincia').modal('show');
        },
        updateProvincia: function(id) {
            var url = 'updateProvincia/' + id;
            axios.post(url, this.fillProvincia).then(response => {
                this.getProvincia();
                this.id_pais='';
                this.nomb_prov='';
                this.estado_prov='';
                this.errors = [];
                $('#editProvincia').modal('hide');
                toastr.success('Provincia actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteProvincia: function(provincias) {
            var url = 'deleteProvincia/' + provincias.id_prov;
            axios.post(url).then(response => {
                this.getProvincia();
                toastr.success('Provincia eliminada con éxito');
            });
        },
         ///Empresa
         getEmpresa: function() {
            var urlEmpresa = 'getEmpresa';
            axios.get(urlEmpresa).then(response => {
                this.empresas = response.data;
            });
        },
        createEmpresa: function() {
            var urlGuardarProducto = 'storeEmpresa';
            axios.post(urlGuardarEmpresa, this.newEmpresa).then((response) => {
                this.getEmpresa();
                this.newEmpresa.id_ciu = '';
                this.newEmpresa.totestab_emp = '';
                this.newEmpresa.rucempresa_emp = '';
                this.newEmpresa.razon_emp = '';
                this.newEmpresa.nombre_emp = '';
                this.newEmpresa.apellido_emp = '';
                this.newEmpresa.contacto_emp = '';
                this.newEmpresa.direcc_emp = '';
                this.newEmpresa.telefono_emp = '';
                this.newEmpresa.celular_emp = '';
                this.newEmpresa.fax_emp = '';
                this.newEmpresa.email_emp = '';
                this.newEmpresa.estado_emp = '';
                this.newEmpresa.contador_emp = '';
                this.newEmpresa.tipcontrib_emp = '';
                this.newEmpresa.fechaini_emp = '';
                this.newEmpresa.fechafin_emp= '';
                this.errors = [];
                $('#crearEmpresa').modal('hide');
                toastr.success('Se añadido una nueva empresa');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editEmpresa: function(empresa) {
                this.fillEmpresa.id_ciu = empresa.id_ciu;
                this.fillEmpresa.totestab_emp = empresa.totestab_emp;
                this.fillEmpresa.rucempresa_emp =empresa.rucempresa_emp;
                this.fillEmpresa.razon_emp = empresa.razon_emp;
                this.fillEmpresa.nombre_emp = empresa.nombre_emp;
                this.fillEmpresa.apellido_emp = empresa.apellido_emp;
                this.fillEmpresa.contacto_emp = empresa.contacto_emp;
                this.fillEmpresa.direcc_emp = empresa.direcc_emp;
                this.fillEmpresa.telefono_emp =empresa.telefono_emp;
                this.fillEmpresa.celular_emp = empresa.celular_emp;
                this.fillEmpresa.fax_emp = empresa.fax_emp;
                this.fillEmpresa.email_emp = empresa.email_emp;
                this.fillEmpresa.estado_emp =empresa.estado_emp;
                this.fillEmpresa.contador_emp =empresa.contador_emp;
                this.fillEmpresa.tipcontrib_emp =empresa.tipcontrib_emp;
                this.fillEmpresa.fechaini_emp =empresa.fechaini_emp;
                this.fillEmpresa.fechafin_emp= empresa.fechafin_emp;
            $('#editEmpresa').modal('show');
        },
        updateEmpresa: function(id) {
            var url = 'updateEmpresa/' + id;
            axios.post(url, this.fillEmpresa).then(response => {
                this.getEmpresa();
               this.fillEmpresa.id_ciu = '';
                this.fillEmpresa.totestab_emp = '';
                this.fillEmpresa.rucempresa_emp = '';
                this.fillEmpresa.razon_emp = '';
                this.fillEmpresa.nombre_emp = '';
                this.fillEmpresa.apellido_emp = '';
                this.fillEmpresa.contacto_emp = '';
                this.fillEmpresa.direcc_emp = '';
                this.fillEmpresa.telefono_emp = '';
                this.fillEmpresa.celular_emp = '';
                this.fillEmpresa.fax_emp = '';
                this.fillEmpresa.email_emp = '';
                this.fillEmpresa.estado_emp = '';
                this.fillEmpresa.contador_emp = '';
                this.fillEmpresa.tipcontrib_emp = '';
                this.newProducto.fechaini_emp = '';
                this.fillEmpresa.fechafin_emp= '';
                this.errors = [];
                $('#editEmpresa').modal('hide');
                toastr.success('Empresa actualizada con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteEmpresa: function(empresa) {
            var url = 'deleteEmpresa/' + empresa.id_emp;
            axios.post(url).then(response => {
                this.getEmpresa();
                toastr.success('Empresaa eliminada con éxito');
            });
        },
        //Roles
          getRoles: function() {
            var urlEmpresa = 'getRol';
            axios.get(urlEmpresa).then(response => {
                this.roles = response.data;
            });
        },
        createRol: function() {
            var urlGuardarRol = 'storeRol';
            axios.post(urlGuardarRol, this.newRol).then((response) => {
                this.getRoles();
                this.newRol.id_emp = '';
                this.newRol.id_fec = '';
                this.newRol.nomb_rol = '';
                this.newRol.observ_rol = '';
                this.newRol.estado_rol = '';
                this.newRol.fechaini_rol = '';
                this.newRol.fechafin_rol = '';
                this.errors = [];
                $('#crearEmpresa').modal('hide');
                toastr.success('Se añadido una nuevo rol');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        editRol: function(rol) {
                this.fillRol.id_emp = rol.id_emp;
                this.fillRol.id_fec = rol.id_fec;
                this.fillRol.nomb_rol =rol.nomb_rol;
                this.fillRol.observ_rol = rol.observ_rol;
                this.fillRol.estado_rol = rol.estado_rol;
                this.fillRol.fechaini_rol = rol.fechaini_rol;
                this.fillRol.fechafin_rol = rol.fechafin_rol;
            $('#editRol').modal('show');
        },
        updateEmpresa: function(id) {
            var url = 'updateEmpresa/' + id;
            axios.post(url, this.fillRol).then(response => {
                this.getRoles();
                this.fillRol.id_emp = '';
                this.fillRol.id_fec = '';
                this.fillRol.nomb_rol = '';
                this.fillRol.observ_rol = '';
                this.fillRol.estado_rol = '';
                this.fillRol.fechaini_rol = '';
                this.fillRol.fechafin_rol = '';
                this.errors = [];
                $('#editRol').modal('hide');
                toastr.success('Rol actualizado con éxito');
            }).catch(error => {
                this.errors = error.response.data;
            });
        },
        deleteRol: function(rol) {
            var url = 'deleteProducto/' + rol.id_rol;
            axios.post(url).then(response => {
                this.getRoles();
                toastr.success('Rol eliminado con éxito');
            });
        },
    }
});