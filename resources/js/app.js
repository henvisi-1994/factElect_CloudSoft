
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
        newCiudad:{'nomb_ciu':'','estado_ciu':'','fechaini_ciu':'','fechafin_ciu':'','observ_ciu':'','id_emp':'','id_fec':''},
        fillCiudad: {'nomb_ciu':'','estado_ciu':'','fechaini_ciu':'','fechafin_ciu':'','observ_ciu':'','id_emp':'','id_fec':''},
        empresas: [],
        newEmpresa:{},
        fillEmpresa: {},
        fechas:[],
        newFecha:{},
        fillFechas:{},
        identificaciones:[],
        newIdentificacion:{'sri_ident':'','descrip_ident':'','observ_ident':'','estado_ident':'','fechaini_ident':'','fechafin_ident':''},
        fillIdentificacion:{'sri_ident':'','descrip_ident':'','observ_ident':'','estado_ident':'','fechaini_ident':'','fechafin_ident':''},
        marcas: [],
        newMarca: {'nomb_marca':'','observ_marca':'','estado_marca':'','fechaini_marca':'','fechafin_marca':'','control_fecha':''},
        fillMarca: {'nomb_marca':'','observ_marca':'','estado_marca':'','fechaini_marca':'','fechafin_marca':'','control_fecha':''},
        productos: [],
        newProducto: {'id_emp':'' ,'id_fec':'','codigo_prod':'','codbarra_prod':'' , 
					  'descripcion_prod':'','id_marca':'','present_prod':'','precio_prod':'',
					  'ubicacion_prod':'','stockmin_prod':'','stockmax_prod':'','fechaing_prod':'','fechaelab_prod':'','fechacad_prod':'','aplicaiva_prod':'',
					  'aplicaice_prod':'','util_prod':'','comision_prod':'','imagen_prod':'','observ_prod':'','estado_prod':'','fechaini_prod':'','fechafin_prod':''},
        fillProducto: {'id_emp':'' ,'id_fec':'','codigo_prod':'','codbarra_prod':'' , 
						  'descripcion_prod':'','id_marca':'','present_prod':'','precio_prod':'',
						  'ubicacion_prod':'','stockmin_prod':'','stockmax_prod':'','fechaing_prod':'','fechaelab_prod':'','fechacad_prod':'','aplicaiva_prod':'',
						  'aplicaice_prod':'','util_prod':'','comision_prod':'','imagen_prod':'','observ_prod':'','estado_prod':'','fechaini_prod':'','fechafin_prod':''},
        proveedores:[],
        newProveedor:{'id_emp':'','id_fec':'','cod_prov':'','id_per':'','obser_prov':'','estado_prov':'','fechaini_prov':'','fechafin_prov':''},
        fillProveedor:{'id_emp':'','id_fec':'','cod_prov':'','id_per':'','obser_prov':'','estado_prov':'','fechaini_prov':'','fechafin_prov':''},
        tipoContribuyentes:[],
        newTipoContribuyente:{'nomb_contrib':'','obser_contrib':'','estado_contrib':'','fechaini_contrib':'','fechafin_contrib':''},
        fillTipoContribuyente:{'nomb_contrib':'','obser_contrib':'','estado_contrib':'','fechaini_contrib':'','fechafin_contrib':''},
        unidades:[],
        newUnidad:{'nomb_unidad':'','observ_unidad':'','estado_unidad':'','fechaini_unidad':'','fechafin_unidad':'','control_fecha':''},
        fillUnidad:{'nomb_unidad':'','observ_unidad':'','estado_unidad':'','fechaini_unidad':'','fechafin_unidad':'','control_fecha':''},
        errors: []
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
             axios.delete(url).then(
                response => 
            {
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
                newidentificacion = {
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
             axios.delete(url).then(
                response => 
            {
                 this.getCategorias();   
                  toastr.success('Categoria eliminada con éxito');         
            });
        }
}});
