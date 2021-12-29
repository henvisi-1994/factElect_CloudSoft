/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
window.Vue = require("vue");
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const app = new Vue({
    el: "#crud",
    created: function() {
        this.getTotalUsuarios();
        this.getTotalCompras();
        this.getTotalVentas();
        this.getTotalUtilidades();
        this.getReporte_Inventario();
        this.getReporte_Compras();
        this.getReporte_Venta();
        this.get_ultimo_usuario();
        this.getCategorias();
        this.getMarcas();
        this.getPersonas();
        this.getEmpleados();
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
        this.getCliente();
        this.getDescuento();
        this.getFormulario();
        this.getFormaPago();
        this.getParam_Docs();
        this.getParam_Porc();
        this.getPeriodo();
        this.getUsuario();
        this.getFacturaCompra();
        this.getFacturaVenta();
        this.getProforma();
        this.getIva();
        this.getInventario();
        this.getNumfactV();

        this.existeDF = "False";
        if (App.tipo_factura == "Venta") {
            this.series = "001-001-";
        } else {
            this.series = "001-002-";
        }
        this.id_usu = App.id_usuario;
    },
    data: {
        categorias: [],
        newcategoria: {
            nomb_cat: "",
            observ_cat: "",
            estado_cat: "",
            fechaini_cat: "",
            fechafin_cat: "",
            id_emp: "",
            id_fec: ""
        },
        fillCategoria: {
            id_cat: "",
            nomb_cat: "",
            observ_cat: "",
            estado_cat: "",
            fechaini_cat: "",
            fechafin_cat: "",
            id_emp: "",
            id_fec: ""
        },
        bodegas: [],
        newbodega: {
            nombre_bod: "",
            direcc_bod: "",
            telef_bod: "",
            cel_bod: "",
            nomb_contac_bod: "",
            fechaini_bod: "",
            fechafin_bod: "",
            id_ciu: "",
            id_pais: "",
            id_prov: ""
        },
        fillBodega: {
            id_bod: "",
            nombre_bod: "",
            direcc_bod: "",
            telef_bod: "",
            cel_bod: "",
            nomb_contac_bod: "",
            fechaini_bod: "",
            fechafin_bod: "",
            id_ciu: "",
            id_pais: "",
            id_prov: ""
        },
        descuentos: [],
        newDescuento: {
            nomb_desc: "",
            observ_desc: "",
            estado_desc: "",
            fechaini_desc: "",
            fechafin_desc: "",
            id_emp: "",
            id_fec: ""
        },
        inventarios: [],
        newInventario: {
            id_prod: "",
            id_emp: "",
            id_fec: "",
            numprod_inv: "",
            observ_inv: "",
            estado_inv: "",
            fechafin_inv: ""
        },
        fillInventario: {
            id_usu: "",
            id_prod: "",
            id_emp: "",
            id_fec: "",
            descripcion_inv: "",
            numprod_inv: "",
            numexist_inv: "",
            observ_inv: "",
            estado_inv: "",
            fechafin_inv: ""
        },

        fillDescuento: {
            id_desc: "",
            nomb_desc: "",
            observ_desc: "",
            estado_desc: "",
            fechaini_desc: "",
            fechafin_desc: "",
            id_emp: "",
            id_fec: ""
        },
        param_docs: [],
        newParam_Docs: {
            nomb_param_docs: "",
            observ_param_docs: "",
            estado_param_docs: "",
            fechaini_param_docs: "",
            fechafin_param_docs: "",
            id_emp: "",
            id_fec: ""
        },
        fillParam_Docs: {
            id_param_docs: "",
            nomb_param_docs: "",
            observ_param_docs: "",
            estado_param_docs: "",
            fechaini_param_docs: "",
            fechafin_param_docs: "",
            id_emp: "",
            id_fec: ""
        },
        param_porcs: [],
        newParam_Porc: {
            nomb_param_porc: "",
            observ_param_porc: "",
            estado_param_porc: "",
            fechaini_param_porc: "",
            fechafin_param_porc: "",
            id_emp: "",
            id_fec: ""
        },
        fillParam_Porc: {
            id_param_porc: "",
            nomb_param_porc: "",
            observ_param_porc: "",
            estado_param_porc: "",
            fechaini_param_porc: "",
            fechafin_param_porc: "",
            id_emp: "",
            id_fec: ""
        },
        clientes: [],
        newCliente: {
            cod_cli: "",
            observ_cli: "",
            estado_cli: "",
            fechaini_cli: "",
            fechafin_cli: "",
            id_emp: "",
            id_fec: "",
            id_per: ""
        },
        fillCliente: {
            id_cli: "",
            cod_cli: "",
            observ_cli: "",
            estado_cli: "",
            fechaini_cli: "",
            fechafin_cli: "",
            id_emp: "",
            id_fec: "",
            id_per: ""
        },
        paises: [],
        newPais: {
            nomb_pais: "",
            estado_pais: ""
        },
        fillPais: {
            id_pais: "",
            nomb_pais: "",
            estado_pais: ""
        },
        provincias: [],
        newProvincia: {
            nomb_prov: "",
            id_pais: "",
            estado_prov: ""
        },
        fillProvincia: {
            id_prov: "",
            nomb_prov: "",
            id_pais: "",
            estado_prov: ""
        },
        ciudades: [],
        newCiudad: {
            nomb_ciu: "",
            estado_ciu: "",
            fechaini_ciu: "",
            fechafin_ciu: "",
            observ_ciu: "",
            id_emp: "",
            id_fec: ""
        },
        fillCiudad: {
            id_ciu: "",
            nomb_ciu: "",
            estado_ciu: "",
            fechaini_ciu: "",
            fechafin_ciu: "",
            observ_ciu: "",
            id_emp: "",
            id_fec: ""
        },

        fechas: [],
        newFecha: {},
        fillFechas: {},
        identificaciones: [],
        newIdentificacion: {
            sri_ident: "",
            descrip_ident: "",
            observ_ident: "",
            estado_ident: "",
            fechaini_ident: "",
            fechafin_ident: ""
        },
        fillIdentificacion: {
            id_ident: "",
            sri_ident: "",
            descrip_ident: "",
            observ_ident: "",
            estado_ident: "",
            fechaini_ident: "",
            fechafin_ident: ""
        },
        marcas: [],
        newMarca: {
            nomb_marca: "",
            observ_marca: "",
            estado_marca: "",
            fechaini_marca: "",
            fechafin_marca: ""
        },
        fillMarca: {
            id_marca: "",
            nomb_marca: "",
            observ_marca: "",
            estado_marca: "",
            fechaini_marca: "",
            fechafin_marca: ""
        },
        productos: [],
        newProducto: {
            id_emp: "",
            id_fec: "",
            id_bod: "",
            codigo_prod: "",
            codbarra_prod: "",
            descripcion_prod: "",
            id_marca: "",
            id_cat: "",
            present_prod: "",
            precio_prod: "",
            ubicacion_prod: "",
            stockmin_prod: "",
            stockmax_prod: "",
            fechaing_prod: "",
            fechaelab_prod: "",
            fechacad_prod: "",
            aplicaiva_prod: "",
            aplicaice_prod: "",
            util_prod: "",
            comision_prod: "",
            imagen_prod: "",
            observ_prod: "",
            estado_prod: "",
            fechaini_prod: "",
            fechafin_prod: ""
        },
        fillProducto: {
            id_emp: "",
            id_fec: "",
            id_bod: "",
            codigo_prod: "",
            codbarra_prod: "",
            descripcion_prod: "",
            id_marca: "",
            id_cat: "",
            present_prod: "",
            precio_prod: "",
            ubicacion_prod: "",
            stockmin_prod: "",
            stockmax_prod: "",
            fechaing_prod: "",
            fechaelab_prod: "",
            fechacad_prod: "",
            aplicaiva_prod: "",
            aplicaice_prod: "",
            util_prod: "",
            comision_prod: "",
            imagen_prod: "",
            observ_prod: "",
            estado_prod: "",
            fechaini_prod: "",
            fechafin_prod: ""
        },
        newPersona: {
            id_contrib: "",
            id_ident: "",
            id_ciu: "",
            doc_per: "",
            organiz_per: "",
            nombre_per: "",
            apel_per: "",
            direc_per: "",
            fono1_per: "",
            fono2_per: "",
            cel1_per: "",
            cel2_per: "",
            fecnac_per: "",
            correo_per: "",
            estado_per: "",
            fechaini_per: "",
            fechafin_per: ""
        },
        fillPersona: {
            id_per: "",
            id_contrib: "",
            id_ident: "",
            id_ciu: "",
            doc_per: "",
            organiz_per: "",
            nombre_per: "",
            apel_per: "",
            direc_per: "",
            fono1_per: "",
            fono2_per: "",
            cel1_per: "",
            cel2_per: "",
            fecnac_per: "",
            correo_per: "",
            estado_per: "",
            fechaini_per: "",
            fechafin_per: ""
        },
        proveedores: [],
        newProveedor: {
            id_emp: "",
            id_fec: "",
            cod_prov: "",
            id_per: "",
            obser_prov: "",
            estado_prov: "",
            fechaini_prov: "",
            fechafin_prov: ""
        },
        fillProveedor: {
            id_prov: "",
            id_emp: "",
            id_fec: "",
            cod_prov: "",
            id_per: "",
            obser_prov: "",
            estado_prov: "",
            fechaini_prov: "",
            fechafin_prov: ""
        },
        tipoContribuyentes: [],
        personas: [],
        newTipoContribuyente: {
            nomb_contrib: "",
            obser_contrib: "",
            estado_contrib: "",
            fechaini_contrib: "",
            fechafin_contrib: ""
        },
        fillTipoContribuyente: {
            id_contrib: "",
            nomb_contrib: "",
            obser_contrib: "",
            estado_contrib: "",
            fechaini_contrib: "",
            fechafin_contrib: ""
        },
        unidades: [],
        newUnidad: {
            nomb_unidad: "",
            observ_unidad: "",
            estado_unidad: "",
            fechaini_unidad: "",
            fechafin_unidad: ""
        },
        fillUnidad: {
            id_unidad: "",
            nomb_unidad: "",
            observ_unidad: "",
            estado_unidad: "",
            fechaini_unidad: "",
            fechafin_unidad: ""
        },
        empresas: [],
        newEmpresa: {
            id_ciu: "",
            totestab_emp: "",
            rucempresa_emp: "",
            razon_emp: "",
            nombre_emp: "",
            apellido_emp: "",
            contacto_emp: "",
            direcc_emp: "",
            telefono_emp: "",
            celular_emp: "",
            fax_emp: "",
            email_emp: "",
            estado_emp: "",
            contador_emp: "",
            tipcontrib_emp: "",
            fechaini_emp: "",
            fechafin_emp: ""
        },
        fillEmpresa: {
            id_ciu: "",
            totestab_emp: "",
            rucempresa_emp: "",
            razon_emp: "",
            nombre_emp: "",
            apellido_emp: "",
            contacto_emp: "",
            direcc_emp: "",
            telefono_emp: "",
            celular_emp: "",
            fax_emp: "",
            email_emp: "",
            estado_emp: "",
            contador_emp: "",
            tipcontrib_emp: "",
            fechaini_emp: "",
            fechafin_emp: ""
        },
        roles: [],
        newRol: {
            id_emp: "",
            id_fec: "",
            nomb_rol: "",
            observ_rol: "",
            estado_rol: "",
            fechaini_rol: "",
            fechafin_rol: ""
        },
        fillRol: {
            id_emp: "",
            id_fec: "",
            nomb_rol: "",
            observ_rol: "",
            estado_rol: "",
            fechaini_rol: "",
            fechafin_rol: ""
        },
        formularios: [],
        newFormulario: {
            id_padcodform: "",
            id_emp: "",
            id_fec: "",
            nomb_codform: "",
            observ_codform: "",
            estado_codform: "",
            fechaini_codform: "",
            fechafin_codform: ""
        },
        fillFormulario: {
            id_padcodform: "",
            id_emp: "",
            id_fec: "",
            nomb_codform: "",
            observ_codform: "",
            estado_codform: "",
            fechaini_codform: "",
            fechafin_codform: ""
        },
        formaPago: [],
        newFormaPago: {
            id_emp: "",
            id_fec: "",
            nomb_formapago: "",
            observ_formapago: "",
            estado_formapago: "",
            fechaini_formapago: "",
            fechafin_formapago: ""
        },
        fillFormaPago: {
            id_emp: "",
            id_fec: "",
            nomb_formapago: "",
            observ_formapago: "",
            estado_formapago: "",
            fechaini_formapago: "",
            fechafin_formapago: ""
        },
        periodos: [],
        newPeriodo: {
            nomb_fec: "",
            mesidentif_fec: "",
            observ_fec: "",
            estado_fec: "",
            fechaini_fec: "",
            fechafin_fec: ""
        },
        fillPeriodo: {
            id_fec: "",
            nomb_fec: "",
            mesidentif_fec: "",
            observ_fec: "",
            estado_fec: "",
            fechaini_fec: "",
            fechafin_fec: ""
        },
        tipoDocumento: [],
        newTipoDocumento: {
            id_emp: "",
            id_fec: "",
            nomb_doc: "",
            observ_doc: "",
            estado_doc: "",
            fechaini_doc: "",
            fechafin_doc: ""
        },
        fillTipoDocumento: {
            id_doc: "",
            id_emp: "",
            id_fec: "",
            nomb_doc: "",
            observ_doc: "",
            estado_doc: "",
            fechaini_doc: "",
            fechafin_doc: ""
        },
        usuarios: [],
        newUsuario: {
            id_rol: "",
            id_emp: "",
            id_fec: "",
            nomb_usu: "",
            clave_usu: "",
            observ_usu: "",
            estado_usu: "",
            email: "",
            fechaini_usu: "",
            fechafin_usu: ""
        },
        fillUsuario: {
            id_rol: "",
            id_emp: "",
            id_fec: "",
            nomb_usu: "",
            clave_usu: "",
            observ_usu: "",
            estado_usu: "",
            fechaini_usu: "",
            fechafin_usu: ""
        },
        facturasCompra: [],
        facturasVenta: [],
        newFactura: {
            id_formapago: "",
            id_per: "",
            num_fact: "",
            fecha_emision_fact: "",
            hora_emision_fact: "",
            vencimiento_fact: "",
            tipo_fact: "",
            observ_fact: "",
            total_fact: "",
            id_usu: 0
        },
        fillFactura: {
            id_formapago: "",
            id_per: "",
            num_fact: "",
            fecha_emision_fact: "",
            hora_emision_fact: "",
            vencimiento_fact: "",
            tipo_fact: "",
            observ_fact: "",
            total_fact: "",
            id_usu: 0
        },
        proformas: [],
        buscarCli: {
            id_per: "",
            nom_cli: "",
            ruc_cli: "",
            organiz_per: ""
        },
        empleados: [],
        newEmpleado: {
            id_emp: 0,
            id_per: 0,
            id_usu: 0,
            id_fec: 0,
            id_rol: 0,
            estado_empl: ""
        },
        fillEmpleado: {
            id_empleado: 0,
            id_emp: 0,
            id_per: 0,
            id_usu: 0,
            estado_empl: ""
        },
        factura: {
            id_formapago: "",
            id_per: "",
            num_fact: "",
            fecha_emision_fact: "",
            hora_emision_fact: "",
            vencimiento_fact: "",
            estado_fact: "",
            tipo_fact: "",
            observ_fact: "",
            subtotal_fact: "",
            subcero_fact: "",
            subiva_fact: "",
            subice_fact: "",
            total_fact: "",
            id_usu: 0
        },
        detallefactura: [],
        detallesFactura: {},
        existeDF: "",
        numFactv: "",
        errors: [],
        buscar_id_cat: "",
        buscar_id_marca: "",
        buscar_cat: "",
        buscar_cli: "0",
        buscar_prod: "",
        buscar_marca: "",
        buscar_categoria: "",
        iva: [],
        cantidadP: 1,
        totalf: 0,
        menu: {
            item: 0
        },
        file_Factura: {
            facturaC: "",
            num_fact: "",
            id_usu: 0
        },
        r_ventas: [],
        r_compras: [],
        r_inventarios: [],
        numregistros: 10,
        src: "",
        subtotal: "",
        subtotalIva: "",
        total: "",
        file: null,
        series: "",
        id_usu: 0,
        id_usuario: 0,
        total_usuarios: 0,
        total_compras: 0,
        total_ventas: 0,
        total_utilidades: 0
    },
    computed: {
        buscarCategoria: function() {
            return this.categorias.filter(categoria =>
                categoria.nomb_cat.includes(this.buscar_cat)
            );
        },
        buscarProducto: function() {
            return this.productos.filter(
                producto =>
                producto.descripcion_prod.includes(this.buscar_prod) &
                producto.nomb_marca.includes(this.buscar_marca) &
                producto.nomb_cat.includes(this.buscar_categoria)
            );
        },
        buscarCliente: function() {
            return this.clientes.filter(
                cliente =>
                cliente.nombre_per.includes(this.buscar_cli) ||
                cliente.apel_per.includes(this.buscar_cli) ||
                cliente.doc_per.includes(this.buscar_cli) ||
                cliente.organiz_per.includes(this.buscar_cli) ||
                cliente.cod_cli.includes(this.buscar_cli)
            );
        },
        fecha_act: function() {
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth() + 1;
            var yyyy = hoy.getFullYear();
            dd = this.addZero(dd);
            mm = this.addZero(mm);
            return yyyy + "-" + mm + "-" + dd;
        },
        numFactVent: function() {
            var numFact = parseInt(this.numFactv);
            var num = this.zeroFill(numFact + 1, 10);
            return num;
        }
    },
    methods: {
        addZero: function(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        },
        zeroFill: function(number, width) {
            // make sure it's a string
            var fillZeroes = "00000000000000000000";
            var input = number + "";
            var prefix = "";
            if (input.charAt(0) === "-") {
                prefix = "-";
                input = input.slice(1);
                --width;
            }
            var fillAmt = Math.max(width - input.length, 0);
            return prefix + fillZeroes.slice(0, fillAmt) + input;
        },
        getPersonas: function() {
            var urlPersonas = "PersonaSA";
            axios.get(urlPersonas).then(response => {
                this.personas = response.data;
            });
        },
        getTotalUsuarios: function() {
            var urlTotalUsuarios = "getTotalUsuarios";
            axios.get(urlTotalUsuarios).then(response => {
                this.total_usuarios = response.data;
            });
        },
        getTotalCompras: function() {
            var id_usu = document.getElementById("id_usu").value;
            this.id_usu = id_usu;
            var urlTotalCompras = "getTotalCompras/" + this.id_usu;
            axios.get(urlTotalCompras).then(response => {
                this.total_compras = response.data;
                localStorage.setItem("total_compras", response.data);
            });
        },
        getTotalVentas: function() {
            this.id_usu = document.getElementById("id_usu").value;
            var urlTotalventas = "getTotalVentas/" + this.id_usu;
            axios.get(urlTotalventas).then(response => {
                this.total_ventas = response.data;
                localStorage.setItem("total_ventas", response.data);
            });
        },
        getTotalUtilidades: function() {
            this.total_utilidades =
                localStorage.getItem("total_ventas") -
                localStorage.getItem("total_compras");
        },
        getEmpleados: function() {
            var urlEmpleados = "getEmpleado";
            axios.get(urlEmpleados).then(response => {
                this.empleados = response.data;
            });
        },
        getReporte_Venta: function() {
            var urlRepVenta = "getReporteVenta";
            axios.get(urlRepVenta).then(response => {
                this.r_ventas = response.data;
            });
        },
        getReporte_Compras: function() {
            var urlRepCompra = "getReporteCompra";
            axios.get(urlRepCompra).then(response => {
                this.r_compras = response.data;
            });
        },
        getReporte_Inventario: function() {
            var urlRepInventario = "getReporteInventario";
            axios.get(urlRepInventario).then(response => {
                this.r_inventarios = response.data;
                console.log(response.data);
            });
        },
        getCategorias: function() {
            var urlCategorias = "getCategorias";
            axios.get(urlCategorias).then(response => {
                this.categorias = response.data;
            });
        },

        createCategoria: function() {
            var urlGuardarCategoria = "storeCategoria";
            axios
                .post(urlGuardarCategoria, this.newcategoria)
                .then(response => {
                    this.getCategorias();
                    newcategoria = {
                        nomb_cat: "",
                        observ_cat: "",
                        estado_cat: "",
                        fechaini_cat: "",
                        fechafin_cat: "",
                        id_emp: "",
                        id_fec: ""
                    };
                    this.errors = [];
                    $("#crearCategoria").modal("hide");
                    toastr.success("Se añadido una nueva categoria");
                })
                .catch(error => {
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
            $("#editCategoria").modal("show");
        },
        updateCategoria: function(id) {
            var url = "updateCategoria/" + id;
            axios
                .post(url, this.fillCategoria)
                .then(response => {
                    this.getCategorias();
                    this.fillCategoria = {
                        id_cat: "",
                        nomb_cat: "",
                        observ_cat: "",
                        estado_cat: "",
                        fechaini_cat: "",
                        fechafin_cat: "",
                        id_emp: "",
                        id_fec: ""
                    };
                    this.errors = [];
                    $("#editCategoria").modal("hide");
                    toastr.success("Categoria actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteCategoria: function(categoria) {
            var url = "deleteCategoria/" + categoria.id_cat;
            axios.post(url).then(response => {
                this.getCategorias();
                toastr.success("Categoria eliminada con éxito");
            });
        },
        //MEtodos de Identificacion
        getIdentificacion: function() {
            var urlIdentificacion = "getIdentificacion";
            axios.get(urlIdentificacion).then(response => {
                this.identificaciones = response.data;
            });
        },
        createIdentificacion: function() {
            var urlGuardarIdentificacion = "storeIdentificaciones";
            axios
                .post(urlGuardarIdentificacion, this.newIdentificacion)
                .then(response => {
                    this.getIdentificacion();
                    this.newIdentificacion.sri_ident = "";
                    this.newIdentificacion.descrip_ident = "";
                    this.newIdentificacion.observ_ident = "";
                    this.newIdentificacion.estado_ident = "";
                    this.newIdentificacion.fechaini_ident = "";
                    this.newIdentificacion.fechafin_ident = "";
                    this.errors = [];
                    $("#crearIdentificaciones").modal("hide");
                    toastr.success("Se añadido una nueva Identificacion");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editIdentificacion: function(identificacion) {
            this.fillIdentificacion.id_ident = identificacion.id_ident;
            this.fillIdentificacion.sri_ident = identificacion.sri_ident;
            this.fillIdentificacion.descrip_ident =
                identificacion.descrip_ident;
            this.fillIdentificacion.observ_ident = identificacion.observ_ident;
            this.fillIdentificacion.estado_ident = identificacion.estado_ident;
            this.fillIdentificacion.fechaini_ident =
                identificacion.fechaini_ident;
            this.fillIdentificacion.fechaini_ident =
                identificacion.fechaini_ident;
            $("#editIdentificacion").modal("show");
        },
        updateIdentificacion: function(id) {
            var url = "updateIdentificacion/" + id;
            axios
                .post(url, this.fillIdentificacion)
                .then(response => {
                    this.getIdentificacion();
                    this.fillIdentificacion.sri_ident = "";
                    this.fillIdentificacion.descrip_ident = "";
                    this.fillIdentificacion.observ_ident = "";
                    this.fillIdentificacion.estado_ident = "";
                    this.fillIdentificacion.fechaini_ident = "";
                    this.fillIdentificacion.fechaini_ident = "";
                    this.errors = [];
                    $("#editIdentificacion").modal("hide");
                    toastr.success("Identficación actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteIdentificacion: function(identificacion) {
            var url = "deleteIdentificacion/" + identificacion.id_ident;
            axios.post(url).then(response => {
                this.getIdentificacion();
                toastr.success("Identficación eliminada con éxito");
            });
        },
        //MEtodos de Marca
        getMarcas: function() {
            var urlMarca = "getMarca";
            axios.get(urlMarca).then(response => {
                this.marcas = response.data;
            });
        },
        createMarca: function() {
            var urlGuardarMarca = "storeMarca";
            axios
                .post(urlGuardarMarca, this.newMarca)
                .then(response => {
                    this.getMarcas();
                    this.newMarca.nomb_marca = "";
                    this.newMarca.observ_marca = "";
                    this.newMarca.estado_marca = "";
                    this.newMarca.fechaini_marca = "";
                    this.newMarca.fechafin_marca = "";
                    this.errors = [];
                    $("#crearMarca").modal("hide");
                    toastr.success("Se ha añadido una nueva Marca");
                })
                .catch(error => {});
            //$("#crearMarca").modal("hide");
            //toastr.success("Se ha añadido una nueva Marca");
            //this.getMarcas();
        },
        editMarca: function(marca) {
            this.fillMarca.id_marca = marca.id_marca;
            this.fillMarca.nomb_marca = marca.nomb_marca;
            this.fillMarca.observ_marca = marca.observ_marca;
            this.fillMarca.estado_marca = marca.estado_marca;
            this.fillMarca.fechaini_marca = marca.fechaini_marca;
            this.fillMarca.fechafin_marca = marca.fechafin_marca;
            $("#editMarca").modal("show");
        },
        updateMarca: function(id) {
            var url = "updateMarca/" + id;
            axios
                .post(url, this.fillMarca)
                .then(response => {
                    this.getMarcas();
                    this.fillMarca = {
                        id_marca: "",
                        nomb_marca: "",
                        observ_marca: "",
                        estado_marca: "",
                        fechaini_marca: "",
                        fechafin_marca: ""
                    };
                    this.errors = [];
                    $("#editMarca").modal("hide");
                    toastr.success("Marca actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteMarca: function(marca) {
            var url = "deleteMarca/" + marca.id_marca;
            axios.post(url).then(response => {
                this.getMarcas();
                toastr.success("Marca eliminada con éxito");
            });
        },
        //MEtodos de Unidad
        getUnidad: function() {
            var urlUnidad = "getUnidad";
            axios.get(urlUnidad).then(response => {
                this.unidades = response.data;
            });
        },
        createUnidad: function() {
            var urlGuardarUnidad = "storeUnidad";
            axios
                .post(urlGuardarUnidad, this.newUnidad)
                .then(response => {
                    this.getUnidad();
                    this.newUnidad.nomb_unidad = "";
                    this.newUnidad.observ_unidad = "";
                    this.newUnidad.estado_unidad = "";
                    this.newUnidad.fechaini_unidad = "";
                    this.newUnidad.fechafin_unidad = "";
                    this.errors = [];
                    $("#crearUnidad").modal("hide");
                    toastr.success("Se ha añadido una nueva Unidad");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editUnidad: function(unidades) {
            this.fillUnidad.id_unidad = unidades.id_unidad;
            this.fillUnidad.nomb_unidad = unidades.nomb_unidad;
            this.fillUnidad.observ_unidad = unidades.observ_unidad;
            this.fillUnidad.estado_unidad = unidades.estado_unidad;
            this.fillUnidad.fechaini_unidad = unidades.fechaini_unidad;
            this.fillUnidad.fechafin_unidad = unidades.fechafin_unidad;
            $("#editUnidad").modal("show");
        },
        updateUnidad: function(id) {
            var urlEditarUnidad = "updateUnidad/" + id;
            axios
                .post(urlEditarUnidad, this.fillUnidad)
                .then(response => {
                    this.getUnidad();
                    this.fillUnidad.nomb_unidad = "";
                    this.fillUnidad.observ_unidad = "";
                    this.fillUnidad.estado_unidad = "";
                    this.fillUnidad.fechaini_unidad = "";
                    this.fillUnidad.fechafin_unidad = "";
                    this.errors = [];
                    $("#editUnidad").modal("hide");
                    toastr.success("Unidad actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteUnidad: function(unidades) {
            var url = "deleteUnidad/" + unidades.id_unidad;
            axios.post(url).then(response => {
                this.getUnidad();
                toastr.success("Unidad eliminada con éxito");
            });
        },
        //MEtodos de TipoContribuyente
        getTipoContribuyente: function() {
            var urlContribuyente = "getTipoContribuyente";
            axios.get(urlContribuyente).then(response => {
                this.tipoContribuyentes = response.data;
            });
        },
        createTipoContribuyente: function() {
            var urlGuardarContribuyente = "storeTipoContribuyente";
            axios
                .post(urlGuardarContribuyente, this.newTipoContribuyente)
                .then(response => {
                    this.getTipoContribuyente();
                    this.newTipoContribuyente.nomb_contrib = "";
                    this.newTipoContribuyente.obser_contrib = "";
                    this.newTipoContribuyente.estado_contrib = "";
                    this.newTipoContribuyente.fechaini_contrib = "";
                    this.newTipoContribuyente.fechafin_contrib = "";
                    this.errors = [];
                    $("#crearTipoContribuyente").modal("hide");
                    toastr.success(
                        "Se ha añadido un Nuevo Tipo de Contribuyente"
                    );
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editTipoContribuyente: function(tipoContribuyentes) {
            this.fillTipoContribuyente.id_contrib =
                tipoContribuyentes.id_contrib;
            this.fillTipoContribuyente.nomb_contrib =
                tipoContribuyentes.nomb_contrib;
            this.fillTipoContribuyente.obser_contrib =
                tipoContribuyentes.obser_contrib;
            this.fillTipoContribuyente.estado_contrib =
                tipoContribuyentes.estado_contrib;
            this.fillTipoContribuyente.fechaini_contrib =
                tipoContribuyentes.fechaini_contrib;
            this.fillTipoContribuyente.fechafin_contrib =
                tipoContribuyentes.fechafin_contrib;
            $("#editTipoContribuyente").modal("show");
        },
        updateTipoContribuyente: function(id) {
            var url = "updateTipoContribuyente/" + id;
            axios
                .post(url, this.fillTipoContribuyente)
                .then(response => {
                    this.getTipoContribuyente();
                    this.fillTipoContribuyente.nomb_contrib = "";
                    this.fillTipoContribuyente.obser_contrib = "";
                    this.fillTipoContribuyente.estado_contrib = "";
                    this.fillTipoContribuyente.fechaini_contrib = "";
                    this.fillTipoContribuyente.fechafin_contrib = "";
                    this.errors = [];
                    $("#editTipoContribuyente").modal("hide");
                    toastr.success(
                        "Tipo de Contribuyente actualizado con éxito"
                    );
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteTipoContribuyente: function(tipoContribuyentes) {
            var url =
                "deleteTipoContribuyente/" + tipoContribuyentes.id_contrib;
            axios.post(url).then(response => {
                this.getTipoContribuyente();
                toastr.success("Tipo de Contribuyente eliminado con éxito");
            });
        },
        //MEtodos de Ciudad
        getCiudad: function() {
            var urlCiudad = "getCiudad";
            axios.get(urlCiudad).then(response => {
                this.ciudades = response.data;
            });
        },
        createCiudad: function() {
            var urlGuardarCiudad = "storeCiudad";
            axios
                .post(urlGuardarCiudad, this.newCiudad)
                .then(response => {
                    this.getCiudad();
                    this.newciudad.nomb_ciu = "";
                    this.newciudad.estado_ciu = "";
                    this.newciudad.fechaini_ciu = "";
                    this.newciudad.fechafin_ciu = "";
                    this.newciudad.observ_ciu = "";
                    this.newciudad.id_emp = "";
                    this.newciudad.id_prov = "";
                    this.newciudad.id_fec = "";
                    this.errors = [];
                    toastr.success("Se ha añadido una Nueva Ciudad");
                })
                .catch(error => {});
            $("#crearCiudad").modal("hide");
        },
        editCiudad: function(ciudades) {
            this.fillCiudad.id_ciu = ciudades.id_ciu;
            this.fillCiudad.nomb_ciu = ciudades.nomb_ciu;
            this.fillCiudad.estado_ciu = ciudades.estado_ciu;
            this.fillCiudad.fechaini_ciu = ciudades.fechaini_ciu;
            this.fillCiudad.fechafin_ciu = ciudades.fechafin_ciu;
            this.fillCiudad.observ_ciu = ciudades.observ_ciu;
            this.fillCiudad.id_emp = ciudades.id_emp;
            this.fillCiudad.id_prov = ciudades.id_prov;
            this.fillCiudad.id_fec = ciudades.id_fec;
            $("#editCiudad").modal("show");
        },
        updateCiudad: function(id) {
            var url = "updateCiudad/" + id;
            axios
                .post(url, this.fillCiudad)
                .then(response => {
                    this.getCiudad();
                    this.fillCiudad.nomb_ciu = "";
                    this.fillCiudad.estado_ciu = "";
                    this.fillCiudad.fechaini_ciu = "";
                    this.fillCiudad.fechafin_ciu = "";
                    this.fillCiudad.observ_ciu = "";
                    this.fillCiudad.id_emp = "";
                    this.fillCiudad.id_fec = "";
                    this.errors = [];
                    $("#editCiudad").modal("hide");
                    toastr.success("Ciudad actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteCiudad: function(ciudades) {
            var url = "deleteCiudad/" + ciudades.id_ciu;
            axios.post(url).then(response => {
                this.getCiudad();
                toastr.success("Ciudad eliminada con éxito");
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
            reader.onload = event => {
                vm.image = event.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage: function(event) {
            this.image = "";
        },
        getProductos: function() {
            var urlProducto = "getProductos";
            axios.get(urlProducto).then(response => {
                this.productos = response.data;
            });
        },
        createProducto: function() {
            var urlGuardarProducto = "storeProducto";
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = event => {
                vm.image = event.target.result;
            };
            this.newProducto.imagen_prod = vm.image;
            axios
                .post(urlGuardarProducto, this.newProducto)
                .then(response => {
                    this.getProductos();
                    this.newProducto.id_emp = "";
                    this.newProducto.id_fec = "";
                    this.newProducto.id_bod = "";
                    this.newProducto.codigo_prod = "";
                    this.newProducto.codbarra_prod = "";
                    this.newProducto.descripcion_prod = "";
                    this.newProducto.id_marca = "";
                    this.newProducto.id_cat = "";
                    this.newProducto.present_prod = "";
                    this.newProducto.precio_prod = "";
                    this.newProducto.ubicacion_prod = "";
                    this.newProducto.stockmin_prod = "";
                    this.newProducto.stockmax_prod = "";
                    this.newProducto.fechaing_prod = "";
                    this.newProducto.fechaelab_prod = "";
                    this.newProducto.fechacad_prod = "";
                    this.newProducto.aplicaiva_prod = "";
                    this.newProducto.aplicaice_prod = "";
                    this.newProducto.util_prod = "";
                    this.newProducto.comision_prod = "";
                    this.newProducto.imagen_prod = "";
                    this.newProducto.observ_prod = "";
                    this.newProducto.estado_prod = "";
                    this.newProducto.fechaini_prod = "";
                    this.newProducto.fechafin_prod = "";
                    this.errors = [];
                    $("#crearProducto").modal("hide");
                    toastr.success("Se añadido una nueva producto");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editProducto: function(producto) {
            this.fillProducto.id_prod = producto.id_prod;
            this.fillProducto.id_emp = producto.id_emp;
            this.fillProducto.id_fec = producto.id_fec;
            this.fillProducto.id_bod = producto.id_bod;
            this.fillProducto.codigo_prod = producto.codigo_prod;
            this.fillProducto.codbarra_prod = producto.codbarra_prod;
            this.fillProducto.descripcion_prod = producto.descripcion_prod;
            this.fillProducto.id_marca = producto.id_marca;
            this.fillProducto.id_cat = producto.id_cat;
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
            this.fillProducto.imagen_prod = producto.imagen_prod;
            this.fillProducto.util_prod = producto.util_prod;
            this.fillProducto.comision_prod = producto.comision_prod;
            this.fillProducto.observ_prod = producto.observ_prod;
            this.fillProducto.estado_prod = producto.estado_prod;
            this.fillProducto.fechaini_prod = producto.fechaini_prod;
            this.fillProducto.fechafin_prod = producto.fechafin_prod;
            $("#editProducto").modal("show");
        },
        viewProducto: function(producto) {
            var urlImagenProducto = "../img/producto/";
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
            $("#viewProducto").modal("show");
        },
        updateProducto: function(id) {
            var url = "updateProducto/" + id;
            var image = new Image();
            var reader = new FileReader();
            var vm = this;
            reader.onload = event => {
                vm.image = event.target.result;
            };
            this.fillProducto.imagen_prod = vm.image;
            axios
                .post(url, this.fillProducto)
                .then(response => {
                    this.getProductos();
                    this.fillProducto.id_emp = "";
                    this.fillProducto.id_fec = "";
                    this.fillProducto.codigo_prod = "";
                    this.fillProducto.codbarra_prod = "";
                    this.fillProducto.descripcion_prod = "";
                    this.fillProducto.id_marca = "";
                    this.fillProducto.present_prod = "";
                    this.fillProducto.precio_prod = "";
                    this.fillProducto.ubicacion_prod = "";
                    this.fillProducto.stockmin_prod = "";
                    this.fillProducto.stockmax_prod = "";
                    this.fillProducto.fechaing_prod = "";
                    this.fillProducto.fechaelab_prod = "";
                    this.fillProducto.fechacad_prod = "";
                    this.fillProducto.aplicaiva_prod = "";
                    this.fillProducto.aplicaice_prod = "";
                    this.fillProducto.util_prod = "";
                    this.fillProducto.comision_prod = "";
                    this.fillProducto.imagen_prod = "";
                    this.fillProducto.observ_prod = "";
                    this.fillProducto.estado_prod = "";
                    this.fillProducto.fechaini_prod = "";
                    this.fillProducto.fechafin_prod = "";
                    this.errors = [];
                    $("#editProducto").modal("hide");
                    toastr.success("Producto actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteProducto: function(producto) {
            var url = "deleteProducto/" + producto.id_prod;
            axios.post(url).then(response => {
                this.getProductos();
                toastr.success("Producto eliminado con éxito");
            });
        },
        //Persona
        getPersonas: function() {
            var urlPersona = "getProductos";
            axios.get(urlPersona).then(response => {
                this.productos = response.data;
            });
        },
        createPersonaProveedor: function() {
            var urlGuardarPersona = "storePersona";
            axios
                .post(urlGuardarPersona, this.newPersona)
                .then(response => {
                    this.newPersona.id_contrib = "";
                    this.newPersona.id_ident = "";
                    this.newPersona.id_ciu = "";
                    this.newProveedor.doc_per = "";
                    this.newPersona.organiz_per = "";
                    this.newPersona.nombre_per = "";
                    this.newPersona.apel_per = "";
                    this.newPersona.direc_per = "";
                    this.newPersona.fono1_per = "";
                    this.newPersona.fono2_per = "";
                    this.newPersona.cel1_per = "";
                    this.newPersona.cel2_per = "";
                    this.newPersona.fecnac_per = "";
                    this.newPersona.correo_per = "";
                    this.newPersona.estado_per = "";
                    this.newPersona.fechaini_per = "";
                    this.newPersona.fechafin_per = "";
                    this.errors = [];
                    this.newProveedor.id_per = response.data;
                    this.createProveedor();
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        createPersonaEmpleado: function() {
            var urlGuardarPersona = "storePersona";
            axios
                .post(urlGuardarPersona, this.newPersona)
                .then(response => {
                    this.newPersona.id_contrib = "";
                    this.newPersona.id_ident = "";
                    this.newPersona.id_ciu = "";
                    this.newPersona.organiz_per = "";
                    this.newPersona.direc_per = "";
                    this.newPersona.fono1_per = "";
                    this.newPersona.fono2_per = "";
                    this.newPersona.cel1_per = "";
                    this.newPersona.cel2_per = "";
                    this.newPersona.fecnac_per = "";
                    this.newUsuario.id_rol = this.newEmpleado.id_rol;
                    this.newUsuario.id_emp = this.newEmpleado.id_emp;
                    this.newUsuario.id_fec = this.newEmpleado.id_fec;
                    this.newUsuario.email = this.newPersona.correo_per;
                    this.newUsuario.nomb_usu =
                        this.newPersona.nombre_per.charAt(0) +
                        this.newPersona.apel_per;
                    this.newUsuario.clave_usu = this.newPersona.doc_per;
                    this.newUsuario.observ_usu = "Creacion de Empleado";
                    this.newUsuario.estado_usu = "A";
                    this.newUsuario.fechaini_usu = this.newPersona.fechaini_per;
                    this.newUsuario.fechafin_usu = this.newPersona.fechafin_per;
                    this.errors = [];
                    this.newEmpleado.id_per = response.data;
                    this.newEmpleado.estado_empl = this.newPersona.estado_per;
                    //this.createUsuario();
                    this.createUsuarioEmpleado();
                    //this.createEmpleado();
                    //localStorage.removeItem("id_usuario");
                })
                .catch(error => {
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
            $("#editPersona").modal("show");
        },
        updatePersona: function(id) {
            var url = "updatePersona/" + id;
            axios
                .post(url, this.fillPersona)
                .then(response => {
                    this.fillPersona.id_contrib = "";
                    this.fillPersona.id_ident = "";
                    this.fillPersona.id_ciu = "";
                    this.fillPersona.doc_per = "";
                    this.fillPersona.organiz_per = "";
                    this.fillPersona.nombre_per = "";
                    this.fillPersona.apel_per = "";
                    this.fillPersona.direc_per = "";
                    this.fillPersona.fono1_per = "";
                    this.fillPersona.fono2_per = "";
                    this.fillPersona.cel1_per = "";
                    this.fillPersona.cel2_per = "";
                    this.fillPersona.fecnac_per = "";
                    this.fillPersona.correo_per = "";
                    this.fillPersona.estado_per = "";
                    this.fillPersona.fechaini_per = "";
                    this.fillPersona.fechafin_per = "";
                    this.errors = [];
                    $("#editPersona").modal("hide");
                    $("#editProveedor").modal("show");
                    $("#editCliente").modal("show");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        updatePersonaEmpleado: function(id) {
            var url = "updatePersona/" + id;
            axios
                .post(url, this.fillPersona)
                .then(response => {
                    this.fillPersona.id_contrib = "";
                    this.fillPersona.id_ident = "";
                    this.fillPersona.id_ciu = "";
                    this.fillPersona.doc_per = "";
                    this.fillPersona.organiz_per = "";
                    this.fillPersona.nombre_per = "";
                    this.fillPersona.apel_per = "";
                    this.fillPersona.direc_per = "";
                    this.fillPersona.fono1_per = "";
                    this.fillPersona.fono2_per = "";
                    this.fillPersona.cel1_per = "";
                    this.fillPersona.cel2_per = "";
                    this.fillPersona.fecnac_per = "";
                    this.fillPersona.correo_per = "";
                    this.fillPersona.fechaini_per = "";
                    this.fillPersona.fechafin_per = "";
                    this.errors = [];
                    this.fillEmpleado.estado_empl = this.fillPersona.estado_per;
                    this.updateEmpleado();
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        updateEmpleado: function() {
            var url = "updateEmpleado/" + this.fillEmpleado.id_empleado;
            axios
                .post(url, this.fillEmpleado)
                .then(response => {
                    this.fillEmpleado.id_per = "";
                    this.fillEmpleado.id_usu = "";
                    this.fillEmpleado.id_emp = "";
                    this.fillPersona.estado_per = "";
                    this.errors = [];
                    this.getEmpleados();
                    $("#editPersona").modal("hide");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },

        deletePersona: function(persona) {
            var url = "deletePersona/" + persona.id_per;
            axios.post(url).then(response => {
                this.getProductos();
                toastr.success("Persona eliminado con éxito");
            });
        },
        //Proveedores
        getProveedores: function() {
            var urlProveedor = "getProveedor";
            axios.get(urlProveedor).then(response => {
                this.proveedores = response.data;
            });
        },
        createProveedor: function() {
            var urlGuardarProveedor = "storeProveedor";
            axios
                .post(urlGuardarProveedor, this.newProveedor)
                .then(response => {
                    this.getProveedores();
                    this.newProveedor.id_emp = "";
                    this.newProveedor.id_fec = "";
                    this.newProveedor.cod_prov = "";
                    this.newProveedor.obser_prov = "";
                    this.newProveedor.estado_prov = "";
                    this.newProveedor.fechaini_prov = "";
                    this.newProveedor.fechafin_prov = "";
                    this.errors = [];
                    $("#crearPersona").modal("hide");
                    $("#crearProveedor").modal("hide");
                    toastr.success("Se añadido una nuevo Proveedor");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        createEmpleado: function() {
            var urlGuardarEmpleado = "storeEmpleado";
            this.get_ultimo_usuario();
            this.newEmpleado.id_usu = localStorage.getItem("id_usuario");
            axios
                .post(urlGuardarEmpleado, this.newEmpleado)
                .then(response => {
                    this.getEmpleados();
                    this.newEmpleado.id_emp = "";
                    this.newEmpleado.id_usu = "";
                    this.newEmpleado.id_per = "";
                    this.newPersona.estado_per = "";
                    this.errors = [];
                    $("#crearEmpleado").modal("hide");
                    toastr.success("Se añadido una nuevo Empleado");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },

        updateProveedor: function(id) {
            var url = "updateProveedor/" + id;
            axios
                .post(url, this.fillProveedor)
                .then(response => {
                    this.getProveedores();
                    this.fillPersona.id_contrib = "";
                    this.fillPersona.id_ident = "";
                    this.fillPersona.id_ciu = "";
                    this.fillPersona.doc_per = "";
                    this.fillPersona.organiz_per = "";
                    this.fillPersona.nombre_per = "";
                    this.fillPersona.apel_per = "";
                    this.fillPersona.direc_per = "";
                    this.fillPersona.fono1_per = "";
                    this.fillPersona.fono2_per = "";
                    this.fillPersona.cel1_per = "";
                    this.fillPersona.cel2_per = "";
                    this.fillPersona.fecnac_per = "";
                    this.fillPersona.correo_per = "";
                    this.fillPersona.estado_per = "";
                    this.fillPersona.fechaini_per = "";
                    this.fillPersona.fechafin_per = "";
                    this.fillProveedor.id_emp = "";
                    this.fillProveedor.id_fec = "";
                    this.fillProveedor.cod_prov = "";
                    this.fillProveedor.id_per = id;
                    this.fillProveedor.obser_prov = "";
                    this.fillProveedor.estado_prov = "";
                    this.fillProveedor.fechaini_prov = "";
                    this.fillProveedor.fechafin_prov = "";
                    this.errors = [];
                    $("#editProveedor").modal("hide");
                    toastr.success("Proveedor actualizado con éxito");
                })
                .catch(error => {
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
            $("#editPersona").modal("show");
        },
        editEmpleado: function(empleado) {
            this.fillEmpleado.id_usu = empleado.id_usu;
            this.fillEmpleado.id_emp = empleado.id_emp;
            this.fillEmpleado.id_per = empleado.id_per;
            this.fillEmpleado.id_empleado = empleado.id_empleado;
            this.fillEmpleado.estado_empl = empleado.estado_per;
            //persona
            this.fillPersona.id_per = empleado.id_per;
            this.fillPersona.id_contrib = empleado.id_contrib;
            this.fillPersona.id_ident = empleado.id_ident;
            this.fillPersona.id_ciu = empleado.id_ciu;
            this.fillPersona.doc_per = empleado.doc_per;
            this.fillPersona.organiz_per = empleado.organiz_per;
            this.fillPersona.nombre_per = empleado.nombre_per;
            this.fillPersona.apel_per = empleado.apel_per;
            this.fillPersona.direc_per = empleado.direc_per;
            this.fillPersona.fono1_per = empleado.fono1_per;
            this.fillPersona.fono2_per = empleado.fono2_per;
            this.fillPersona.cel1_per = empleado.cel1_per;
            this.fillPersona.cel2_per = empleado.cel2_per;
            this.fillPersona.fecnac_per = empleado.fecnac_per;
            this.fillPersona.correo_per = empleado.correo_per;
            this.fillPersona.estado_per = empleado.estado_per;
            this.fillPersona.fechaini_per = empleado.fechaini_per;
            this.fillPersona.fechafin_per = empleado.fechafin_per;
            $("#editPersona").modal("show");
        },
        deleteProveedor: function(proveedor) {
            var url = "deleteProveedor/" + proveedor.id_prov;
            this.deletePersona(proveedor);
            axios.post(url).then(response => {
                this.getProveedores();
                toastr.success("Proveedor eliminado con éxito");
            });
        },
        deleteEmpleado: function(empleado) {
            var url = "deleteEmpleado/" + empleado.id_empleado;
            this.deletePersona(empleado);
            axios.post(url).then(response => {
                this.getEmpleados();
                toastr.success("Empleado eliminado con éxito");
            });
        },
        ///Metodos de Bodega
        getBodega: function() {
            var urlBodega = "getBodega";
            axios.get(urlBodega).then(response => {
                this.bodegas = response.data;
            });
        },
        createBodega: function() {
            var urlGuardarBodega = "storeBodega";
            axios
                .post(urlGuardarBodega, this.newbodega)
                .then(response => {
                    this.getBodega();
                    this.nombre_bod = "";
                    this.direcc_bod = "";
                    this.telef_bod = "";
                    this.cel_bod = "";
                    this.nomb_contac_bod = "";
                    this.estado_bod = "";
                    this.fechaini_bod = "";
                    this.fechafin_bod = "";
                    this.id_ciu = "";
                    this.id_pais = "";
                    this.id_prov = "";
                    this.errors = [];
                    $("#crearBodega").modal("hide");
                    toastr.success("Se ha añadido una nueva Bodega");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editBodega: function(bodegas) {
            this.fillBodega.id_bod = bodegas.id_bod;
            this.fillBodega.nombre_bod = bodegas.nombre_bod;
            this.fillBodega.direcc_bod = bodegas.direcc_bod;
            this.fillBodega.telef_bod = bodegas.telef_bod;
            this.fillBodega.cel_bod = bodegas.cel_bod;
            this.fillBodega.nomb_contac_bod = bodegas.nomb_contac_bod;
            this.fillBodega.fechaini_bod = bodegas.fechaini_bod;
            this.fillBodega.fechafin_bod = bodegas.fechafin_bod;
            this.fillBodega.estado_bod = bodegas.estado_bod;
            this.fillBodega.id_ciu = bodegas.id_ciu;
            this.fillBodega.id_pais = bodegas.id_pais;
            this.fillBodega.id_prov = bodegas.id_prov;
            $("#editBodega").modal("show");
        },
        updateBodega: function(id) {
            var url = "updateBodega/" + id;
            axios
                .post(url, this.fillBodega)
                .then(response => {
                    this.getBodega();
                    this.nombre_bod = "";
                    this.direcc_bod = "";
                    this.telef_bod = "";
                    this.cel_bod = "";
                    this.nomb_contac_bod = "";
                    this.estado_bod = "";
                    this.fechaini_bod = "";
                    this.fechafin_bod = "";
                    this.id_ciu = "";
                    this.id_pais = "";
                    this.id_prov = "";
                    this.errors = [];
                    $("#editBodega").modal("hide");
                    toastr.success("Bodega actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteBodega: function(bodegas) {
            var url = "deleteBodega/" + bodegas.id_bod;
            axios.post(url).then(response => {
                this.getBodega();
                toastr.success("Bodega eliminada con éxito");
            });
        },
        ///Metodos de Pais
        getPais: function() {
            var urlPais = "getPais";
            axios.get(urlPais).then(response => {
                this.paises = response.data;
            });
        },
        createPais: function() {
            var urlGuardarPais = "storePais";
            axios
                .post(urlGuardarPais, this.newPais)
                .then(response => {
                    this.getPais();
                    this.nomb_pais = "";
                    this.estado_pais = "";
                    this.errors = [];
                    $("#crearPais").modal("hide");
                    toastr.success("Se ha añadido un nuevo Pais");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editPais: function(paises) {
            this.fillPais.id_pais = paises.id_pais;
            this.fillPais.nomb_pais = paises.nomb_pais;
            this.fillPais.estado_pais = paises.estado_pais;
            $("#editPais").modal("show");
        },
        updatePais: function(id) {
            var url = "updatePais/" + id;
            axios
                .post(url, this.fillPais)
                .then(response => {
                    this.getPais();
                    this.nomb_pais = "";
                    this.estado_pais = "";
                    this.errors = [];
                    $("#editPais").modal("hide");
                    toastr.success("Pais actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deletePais: function(paises) {
            var url = "deletePais/" + paises.id_pais;
            axios.post(url).then(response => {
                this.getPais();
                toastr.success("Pais eliminado con éxito");
            });
        },
        ///Metodos de Provincias
        getProvincia: function() {
            var urlProvincia = "getProvincia";
            axios.get(urlProvincia).then(response => {
                this.provincias = response.data;
            });
        },
        createProvincia: function() {
            var urlGuardarProvincia = "storeProvincia";
            axios
                .post(urlGuardarProvincia, this.newProvincia)
                .then(response => {
                    this.getProvincia();
                    this.nomb_prov = "";
                    this.estado_prov = "";
                    this.errors = [];
                    $("#crearProvincia").modal("hide");
                    toastr.success("Se ha añadido una nueva Provincia");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editProvincia: function(provincias) {
            this.fillProvincia.id_prov = provincias.id_prov;
            this.fillProvincia.id_pais = provincias.id_pais;
            this.fillProvincia.nomb_prov = provincias.nomb_prov;
            this.fillProvincia.estado_prov = provincias.estado_prov;
            $("#editProvincia").modal("show");
        },
        updateProvincia: function(id) {
            var url = "updateProvincia/" + id;
            axios
                .post(url, this.fillProvincia)
                .then(response => {
                    this.getProvincia();
                    this.id_pais = "";
                    this.nomb_prov = "";
                    this.estado_prov = "";
                    this.errors = [];
                    $("#editProvincia").modal("hide");
                    toastr.success("Provincia actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteProvincia: function(provincias) {
            var url = "deleteProvincia/" + provincias.id_prov;
            axios.post(url).then(response => {
                this.getProvincia();
                toastr.success("Provincia eliminada con éxito");
            });
        },
        ///Empresa
        getEmpresa: function() {
            var urlEmpresa = "getEmpresa";
            axios.get(urlEmpresa).then(response => {
                this.empresas = response.data;
            });
        },
        createEmpresa: function() {
            var urlGuardarEmpresa = "storeEmpresa";
            axios
                .post(urlGuardarEmpresa, this.newEmpresa)
                .then(response => {
                    this.getEmpresa();
                    this.newEmpresa.id_ciu = "";
                    this.newEmpresa.totestab_emp = "";
                    this.newEmpresa.rucempresa_emp = "";
                    this.newEmpresa.razon_emp = "";
                    this.newEmpresa.nombre_emp = "";
                    this.newEmpresa.apellido_emp = "";
                    this.newEmpresa.contacto_emp = "";
                    this.newEmpresa.direcc_emp = "";
                    this.newEmpresa.telefono_emp = "";
                    this.newEmpresa.celular_emp = "";
                    this.newEmpresa.fax_emp = "";
                    this.newEmpresa.email_emp = "";
                    this.newEmpresa.estado_emp = "";
                    this.newEmpresa.contador_emp = "";
                    this.newEmpresa.tipcontrib_emp = "";
                    this.newEmpresa.fechaini_emp = "";
                    this.newEmpresa.fechafin_emp = "";
                    this.errors = [];
                    $("#crearEmpresa").modal("hide");
                    toastr.success("Se añadido una nueva empresa");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editEmpresa: function(empresa) {
            this.fillEmpresa.id_emp = empresa.id_emp;
            this.fillEmpresa.id_ciu = empresa.id_ciu;
            this.fillEmpresa.totestab_emp = empresa.totestab_emp;
            this.fillEmpresa.rucempresa_emp = empresa.rucempresa_emp;
            this.fillEmpresa.razon_emp = empresa.razon_emp;
            this.fillEmpresa.nombre_emp = empresa.nombre_emp;
            this.fillEmpresa.apellido_emp = empresa.apellido_emp;
            this.fillEmpresa.contacto_emp = empresa.contacto_emp;
            this.fillEmpresa.direcc_emp = empresa.direcc_emp;
            this.fillEmpresa.telefono_emp = empresa.telefono_emp;
            this.fillEmpresa.celular_emp = empresa.celular_emp;
            this.fillEmpresa.fax_emp = empresa.fax_emp;
            this.fillEmpresa.email_emp = empresa.email_emp;
            this.fillEmpresa.estado_emp = empresa.estado_emp;
            this.fillEmpresa.contador_emp = empresa.contador_emp;
            this.fillEmpresa.tipcontrib_emp = empresa.tipcontrib_emp;
            this.fillEmpresa.fechaini_emp = empresa.fechaini_emp;
            this.fillEmpresa.fechafin_emp = empresa.fechafin_emp;
            $("#editEmpresa").modal("show");
        },
        updateEmpresa: function(id) {
            var url = "updateEmpresa/" + id;
            axios
                .post(url, this.fillEmpresa)
                .then(response => {
                    this.getEmpresa();
                    this.fillEmpresa.id_ciu = "";
                    this.fillEmpresa.totestab_emp = "";
                    this.fillEmpresa.rucempresa_emp = "";
                    this.fillEmpresa.razon_emp = "";
                    this.fillEmpresa.nombre_emp = "";
                    this.fillEmpresa.apellido_emp = "";
                    this.fillEmpresa.contacto_emp = "";
                    this.fillEmpresa.direcc_emp = "";
                    this.fillEmpresa.telefono_emp = "";
                    this.fillEmpresa.celular_emp = "";
                    this.fillEmpresa.fax_emp = "";
                    this.fillEmpresa.email_emp = "";
                    this.fillEmpresa.estado_emp = "";
                    this.fillEmpresa.contador_emp = "";
                    this.fillEmpresa.tipcontrib_emp = "";
                    this.newProducto.fechaini_emp = "";
                    this.fillEmpresa.fechafin_emp = "";
                    this.errors = [];
                    console.log(response);
                    $("#editEmpresa").modal("hide");
                    toastr.success("Empresa actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteEmpresa: function(empresa) {
            var url = "deleteEmpresa/" + empresa.id_emp;
            axios.post(url).then(response => {
                this.getEmpresa();
                toastr.success("Empresaa eliminada con éxito");
            });
        },
        //Roles
        getRoles: function() {
            var urlEmpresa = "getRol";
            axios.get(urlEmpresa).then(response => {
                this.roles = response.data;
            });
        },
        createRol: function() {
            var urlGuardarRol = "storeRol";
            axios
                .post(urlGuardarRol, this.newRol)
                .then(response => {
                    this.getRoles();
                    this.newRol.id_emp = "";
                    this.newRol.id_fec = "";
                    this.newRol.nomb_rol = "";
                    this.newRol.observ_rol = "";
                    this.newRol.estado_rol = "";
                    this.newRol.fechaini_rol = "";
                    this.newRol.fechafin_rol = "";
                    this.errors = [];
                    $("#crearRol").modal("hide");
                    toastr.success("Se añadido una nuevo rol");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editRol: function(rol) {
            this.fillRol.id_rol = rol.id_rol;
            this.fillRol.id_emp = rol.id_emp;
            this.fillRol.id_fec = rol.id_fec;
            this.fillRol.nomb_rol = rol.nomb_rol;
            this.fillRol.observ_rol = rol.observ_rol;
            this.fillRol.estado_rol = rol.estado_rol;
            this.fillRol.fechaini_rol = rol.fechaini_rol;
            this.fillRol.fechafin_rol = rol.fechafin_rol;
            $("#editRol").modal("show");
        },
        updateRol: function(id) {
            var url = "updateRol/" + id;
            axios
                .post(url, this.fillRol)
                .then(response => {
                    this.getRoles();
                    this.fillRol.id_emp = "";
                    this.fillRol.id_fec = "";
                    this.fillRol.nomb_rol = "";
                    this.fillRol.observ_rol = "";
                    this.fillRol.estado_rol = "";
                    this.fillRol.fechaini_rol = "";
                    this.fillRol.fechafin_rol = "";
                    this.errors = [];
                    $("#editRol").modal("hide");
                    toastr.success("Rol actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteRol: function(rol) {
            var url = "deleteRol/" + rol.id_rol;
            axios.post(url).then(response => {
                this.getRoles();
                toastr.success("Rol eliminado con éxito");
            });
        },
        ///Metodos de Cliente
        getCliente: function() {
            var urlCliente = "getCliente";
            axios.get(urlCliente).then(response => {
                this.clientes = response.data;
            });
        },
        createCliente: function() {
            var urlGuardarCliente = "storeCliente";
            axios
                .post(urlGuardarCliente, this.newCliente)
                .then(response => {
                    this.getCliente();
                    this.cod_cli = "";
                    this.observ_cli = "";
                    this.estado_cli = "";
                    this.fechaini_cli = "";
                    this.fechafin_cli = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#crearPersonaCli").modal("hide");
                    toastr.success("Se ha añadido un nuevo Cliente");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editCliente: function(cliente) {
            this.fillCliente.id_cli = cliente.id_cli;
            this.fillCliente.id_emp = cliente.id_emp;
            this.fillCliente.id_fec = cliente.id_fec;
            this.fillCliente.doc_per = cliente.doc_per;
            this.fillCliente.cod_cli = cliente.cod_cli;
            this.fillCliente.id_per = cliente.id_per;
            this.fillCliente.observ_cli = cliente.observ_cli;
            this.fillCliente.estado_cli = cliente.estado_cli;
            this.fillCliente.fechaini_cli = cliente.fechaini_cli;
            this.fillCliente.fechafin_cli = cliente.fechafin_cli;
            //persona
            this.fillPersona.id_per = cliente.id_per;
            this.fillPersona.id_contrib = cliente.id_contrib;
            this.fillPersona.id_ident = cliente.id_ident;
            this.fillPersona.id_ciu = cliente.id_ciu;
            this.fillPersona.doc_per = cliente.doc_per;
            this.fillPersona.organiz_per = cliente.organiz_per;
            this.fillPersona.nombre_per = cliente.nombre_per;
            this.fillPersona.apel_per = cliente.apel_per;
            this.fillPersona.direc_per = cliente.direc_per;
            this.fillPersona.fono1_per = cliente.fono1_per;
            this.fillPersona.fono2_per = cliente.fono2_per;
            this.fillPersona.cel1_per = cliente.cel1_per;
            this.fillPersona.cel2_per = cliente.cel2_per;
            this.fillPersona.fecnac_per = cliente.fecnac_per;
            this.fillPersona.correo_per = cliente.correo_per;
            this.fillPersona.estado_per = cliente.estado_per;
            this.fillPersona.fechaini_per = cliente.fechaini_per;
            this.fillPersona.fechafin_per = cliente.fechafin_per;
            $("#editPersonaCli").modal("show");
        },
        updateCliente: function(id) {
            var url = "updateCliente/" + id;
            axios
                .post(url, this.fillCliente)
                .then(response => {
                    this.getCliente();
                    //persona
                    this.fillPersona.id_per = "";
                    this.fillPersona.id_contrib = "";
                    this.fillPersona.id_ident = "";
                    this.fillPersona.id_ciu = "";
                    this.fillPersona.doc_per = "";
                    this.fillPersona.organiz_per = "";
                    this.fillPersona.nombre_per = "";
                    this.fillPersona.apel_per = "";
                    this.fillPersona.direc_per = "";
                    this.fillPersona.fono1_per = "";
                    this.fillPersona.fono2_per = "";
                    this.fillPersona.cel1_per = "";
                    this.fillPersona.cel2_per = "";
                    this.fillPersona.fecnac_per = "";
                    this.fillPersona.correo_per = "";
                    this.fillPersona.estado_per = "";
                    this.fillPersona.fechaini_per = "";
                    this.fillPersona.fechafin_per = "";
                    this.cod_cli = "";
                    this.observ_cli = "";
                    this.estado_cli = "";
                    this.fechaini_cli = "";
                    this.fechafin_cli = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.id_per = "";
                    this.errors = [];
                    $("#editCliente").modal("hide");
                    toastr.success("Cliente actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteCliente: function(clientes) {
            var url = "deleteCliente/" + clientes.id_cli;
            axios.post(url).then(response => {
                this.getCliente();
                toastr.success("Cliente eliminado con éxito");
            });
        },
        createPersonaCliente: function() {
            var urlGuardarPersona = "storePersona";
            axios
                .post(urlGuardarPersona, this.newPersona)
                .then(response => {
                    this.newPersona.id_contrib = "";
                    this.newPersona.id_ident = "";
                    this.newPersona.id_ciu = "";
                    this.newCliente.doc_per = "";
                    this.newPersona.organiz_per = "";
                    this.newPersona.nombre_per = "";
                    this.newPersona.apel_per = "";
                    this.newPersona.direc_per = "";
                    this.newPersona.fono1_per = "";
                    this.newPersona.fono2_per = "";
                    this.newPersona.cel1_per = "";
                    this.newPersona.cel2_per = "";
                    this.newPersona.fecnac_per = "";
                    this.newPersona.correo_per = "";
                    this.newPersona.estado_per = "";
                    this.newPersona.fechaini_per = "";
                    this.newPersona.fechafin_per = "";
                    this.errors = [];
                    this.newCliente.id_per = response.data;
                    this.createCliente();
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        ///Metodos de Descuento
        getDescuento: function() {
            var urlDescuento = "getDescuento";
            axios.get(urlDescuento).then(response => {
                this.descuentos = response.data;
            });
        },
        createDescuento: function() {
            var urlGuardarDescuento = "storeDescuento";
            axios
                .post(urlGuardarDescuento, this.newDescuento)
                .then(response => {
                    this.getDescuento();
                    this.nomb_desc = "";
                    this.observ_desc = "";
                    this.estado_desc = "";
                    this.fechaini_desc = "";
                    this.fechafin_desc = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#crearDescuento").modal("hide");
                    toastr.success("Se ha añadido un nuevo Descuento");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editDescuento: function(descuentos) {
            this.fillDescuento.id_desc = descuentos.id_desc;
            this.fillDescuento.nomb_desc = descuentos.nomb_desc;
            this.fillDescuento.observ_desc = descuentos.observ_desc;
            this.fillDescuento.estado_desc = descuentos.estado_desc;
            this.fillDescuento.fechaini_desc = descuentos.fechaini_desc;
            this.fillDescuento.fechafin_desc = descuentos.fechafin_desc;
            this.fillDescuento.id_emp = descuentos.id_emp;
            this.fillDescuento.id_fec = descuentos.id_fec;
            $("#editDescuento").modal("show");
        },
        updateDescuento: function(id) {
            var url = "updateDescuento/" + id;
            axios
                .post(url, this.fillDescuento)
                .then(response => {
                    this.getDescuento();
                    this.nomb_desc = "";
                    this.observ_desc = "";
                    this.estado_desc = "";
                    this.fechaini_desc = "";
                    this.fechafin_desc = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#editDescuento").modal("hide");
                    toastr.success("Descuento actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteDescuento: function(descuentos) {
            var url = "deleteDescuento/" + descuentos.id_desc;
            axios.post(url).then(response => {
                this.getDescuento();
                toastr.success("Descuento eliminado con éxito");
            });
        },
        //Metodos de Formulario
        getFormulario: function() {
            var urlFormulario = "getFormulario";
            axios.get(urlFormulario).then(response => {
                this.formularios = response.data;
            });
        },
        createFormulario: function() {
            var urlGuardarFormulario = "storeFormulario";
            axios
                .post(urlGuardarFormulario, this.newFormulario)
                .then(response => {
                    this.getFormulario();
                    this.newFormulario.id_padcodform = "";
                    this.newFormulario.id_emp = "";
                    this.newFormulario.id_fec = "";
                    this.newFormulario.nomb_codform = "";
                    this.newFormulario.observ_codform = "";
                    this.newFormulario.estado_codform = "";
                    this.newFormulario.fechaini_codform = "";
                    this.newFormulario.fechafin_codform = "";
                    this.errors = [];
                    $("#crearFormulario").modal("hide");
                    toastr.success("Se añadido una nuevo formulario");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editFormulario: function(formulario) {
            this.fillFormulario.id_padcodform = formulario.id_padcodform;
            this.fillFormulario.id_emp = formulario.id_emp;
            this.fillFormulario.id_fec = formulario.id_fec;
            this.fillFormulario.nomb_codform = formulario.nomb_codform;
            this.fillFormulario.observ_codform = formulario.observ_codform;
            this.fillFormulario.estado_codform = formulario.estado_codform;
            this.fillFormulario.fechaini_codform = formulario.fechaini_codform;
            this.fillFormulario.fechafin_codform = formulario.fechafin_codform;
            $("#editFormulario").modal("show");
        },
        updateFormulario: function(id) {
            var url = "updateFormulario/" + id;
            axios
                .post(url, this.fillFormulario)
                .then(response => {
                    this.getFormulario();
                    this.fillFormulario.id_padcodform = "";
                    this.fillFormulario.id_emp = "";
                    this.fillFormulario.id_fec = "";
                    this.fillFormulario.nomb_codform = "";
                    this.fillFormulario.observ_codform = "";
                    this.fillFormulario.estado_codform = "";
                    this.fillFormulario.fechaini_codform = "";
                    this.fillFormulario.fechafin_codform = "";
                    this.errors = [];
                    $("#editFormulario").modal("hide");
                    toastr.success("Formulario actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteFormulario: function(formulario) {
            var url = "deleteFormulario/" + formulario.id_codform;
            axios.post(url).then(response => {
                this.getFormulario();
                toastr.success("Formulario eliminado con éxito");
            });
        },
        //Metodos Forma de Pago
        getFormaPago: function() {
            var urlFormaPago = "getFormaPago";
            axios.get(urlFormaPago).then(response => {
                this.formaPago = response.data;
            });
        },
        createFormaPago: function() {
            var urlGuardarFormaPago = "storeFormaPago";
            axios
                .post(urlGuardarFormaPago, this.newFormaPago)
                .then(response => {
                    this.getFormaPago();
                    this.newFormaPago.id_emp = "";
                    this.newFormaPago.id_fec = "";
                    this.newFormaPago.nomb_formapago = "";
                    this.newFormaPago.observ_formapago = "";
                    this.newFormaPago.estado_formapago = "";
                    this.newFormaPago.fechaini_formapago = "";
                    this.newFormaPago.fechafin_formapago = "";
                    this.errors = [];
                    $("#crearFormaPago").modal("hide");
                    toastr.success("Se añadido una nueva forma de pago");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editFormaPago: function(formaPago) {
            this.fillFormaPago.id_formapago = formaPago.id_formapago;
            this.fillFormaPago.id_emp = formaPago.id_emp;
            this.fillFormaPago.id_fec = formaPago.id_fec;
            this.fillFormaPago.nomb_formapago = formaPago.nomb_formapago;
            this.fillFormaPago.observ_formapago = formaPago.observ_formapago;
            this.fillFormaPago.estado_formapago = formaPago.estado_formapago;
            this.fillFormaPago.fechaini_formapago =
                formaPago.fechaini_formapago;
            this.fillFormaPago.fechafin_formapago =
                formaPago.fechafin_formapago;
            $("#editFormaPago").modal("show");
        },
        updateFormaPago: function(id) {
            var url = "updateFormaPago/" + id;
            axios
                .post(url, this.fillFormaPago)
                .then(response => {
                    this.getFormaPago();
                    this.fillFormaPago.id_emp = "";
                    this.fillFormaPago.id_fec = "";
                    this.fillFormaPago.nomb_formapago = "";
                    this.fillFormaPago.observ_formapago = "";
                    this.fillFormaPago.estado_formapago = "";
                    this.fillFormaPago.fechaini_formapago = "";
                    this.fillFormaPago.fechafin_formapago = "";
                    this.errors = [];
                    $("#editFormaPago").modal("hide");
                    toastr.success("Forma de pago actualizada con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteFormaPago: function(formaPago) {
            var url = "deleteFormaPago/" + formaPago.id_formapago;
            axios.post(url).then(response => {
                this.getFormaPago();
                toastr.success("Forma de Pago eliminada con éxito");
            });
        },
        ///Metodos de Param_Docs
        getParam_Docs: function() {
            var urlParam_Docs = "getParam_Docs";
            axios.get(urlParam_Docs).then(response => {
                this.param_docs = response.data;
            });
        },
        createParam_Docs: function() {
            var urlGuardarParam_Docs = "storeParam_Docs";
            axios
                .post(urlGuardarParam_Docs, this.newParam_Docs)
                .then(response => {
                    this.getParam_Docs();
                    this.nomb_param_docs = "";
                    this.observ_param_docs = "";
                    this.estado_param_docs = "";
                    this.fechaini_param_docs = "";
                    this.fechafin_param_docs = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#crearParam_Docs").modal("hide");
                    toastr.success(
                        "Se ha añadido un nuevo Parámetro de Documento"
                    );
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editParam_Docs: function(param_docs) {
            this.fillParam_Docs.id_param_docs = param_docs.id_param_docs;
            this.fillParam_Docs.nomb_param_docs = param_docs.nomb_param_docs;
            this.fillParam_Docs.observ_param_docs =
                param_docs.observ_param_docs;
            this.fillParam_Docs.estado_param_docs =
                param_docs.estado_param_docs;
            this.fillParam_Docs.fechaini_param_docs =
                param_docs.fechaini_param_docs;
            this.fillParam_Docs.fechafin_param_docs =
                param_docs.fechafin_param_docs;
            this.fillParam_Docs.id_emp = param_docs.id_emp;
            this.fillParam_Docs.id_fec = param_docs.id_fec;
            $("#editParam_Docs").modal("show");
        },
        updateParam_Docs: function(id) {
            var url = "updateParam_Docs/" + id;
            axios
                .post(url, this.fillParam_Docs)
                .then(response => {
                    this.getParam_Docs();
                    this.nomb_param_docs = "";
                    this.observ_param_docs = "";
                    this.estado_param_docs = "";
                    this.fechaini_param_docs = "";
                    this.fechafin_param_docs = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#editParam_Docs").modal("hide");
                    toastr.success(
                        "Parámetro de Documento actualizado con éxito"
                    );
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteParam_Docs: function(param_docs) {
            var url = "deleteParam_Docs/" + param_docs.id_param_docs;
            axios.post(url).then(response => {
                this.getParam_Docs();
                toastr.success("Parámetro de Documento eliminado con éxito");
            });
        },
        ///Metodos de Param_Porc
        getParam_Porc: function() {
            var urlParam_Porc = "getParam_Porc";
            axios.get(urlParam_Porc).then(response => {
                this.param_porc = response.data;
            });
        },
        createParam_Porc: function() {
            var urlGuardarParam_Porc = "storeParam_Porc";
            axios
                .post(urlGuardarParam_Porc, this.newParam_Porc)
                .then(response => {
                    this.getParam_Porc();
                    this.nomb_param_porc = "";
                    this.observ_param_porc = "";
                    this.estado_param_porc = "";
                    this.fechaini_param_porc = "";
                    this.fechafin_param_porc = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#crearParam_Porc").modal("hide");
                    toastr.success(
                        "Se ha añadido un nuevo Parámetro de Porcentaje"
                    );
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editParam_Porc: function(param_porc) {
            this.fillParam_Porc.id_param_porc = param_docs.id_param_porc;
            this.fillParam_Porc.nomb_param_porc = param_docs.nomb_param_porc;
            this.fillParam_Porc.oPorcbserv_param_porc =
                param_docs.observ_param_porc;
            this.fillParam_Porc.estado_param_porc =
                param_docs.estado_param_porc;
            this.fillParam_Porc.fechaini_param_porc =
                param_docs.fechaini_param_porc;
            this.fillParam_Porc.fechafin_param_porc =
                param_docs.fechafin_param_porc;
            this.fillParam_Porc.id_emp = param_porc.id_emp;
            this.fillParam_Porc.id_fec = param_porc.id_fec;
            $("#editParam_Porc").modal("show");
        },
        updateParam_Porc: function(id) {
            var url = "updateParam_Porc/" + id;
            axios
                .post(url, this.fillParam_Porc)
                .then(response => {
                    this.getParam_Porc();
                    this.nomb_param_porc = "";
                    this.observ_param_porc = "";
                    this.estado_param_porc = "";
                    this.fechaini_param_porc = "";
                    this.fechafin_param_porc = "";
                    this.id_emp = "";
                    this.id_fec = "";
                    this.errors = [];
                    $("#editParam_Porc").modal("hide");
                    toastr.success(
                        "Parámetro de Porcentaje actualizado con éxito"
                    );
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteParam_Porc: function(param_porc) {
            var url = "deleteParam_Porc/" + param_porc.id_param_porc;
            axios.post(url).then(response => {
                this.getParam_Porc();
                toastr.success("Parámetro de Porcentaje eliminado con éxito");
            });
        },
        getPeriodo: function() {
            var urlPeriodo = "getPeriodo";
            axios.get(urlPeriodo).then(response => {
                this.periodos = response.data;
            });
        },
        createPeriodo: function() {
            var urlPeriodo = "storePeriodo";
            axios
                .post(urlPeriodo, this.newPeriodo)
                .then(response => {
                    this.getPeriodo();
                    this.newPeriodo.nomb_fec = "";
                    this.newPeriodo.mesidentif_fec = "";
                    this.newPeriodo.observ_fec = "";
                    this.newPeriodo.estado_fec = "";
                    this.newPeriodo.fechaini_fec = "";
                    this.newPeriodo.fechafin_fec = "";
                    this.errors = [];
                    $("#crearPeriodo").modal("hide");
                    toastr.success("Se añadido una nuevo periodo");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editPeriodo: function(periodo) {
            this.fillPeriodo.id_fec = periodo.id_fec;
            this.fillPeriodo.nomb_fec = periodo.nomb_fec;
            this.fillPeriodo.mesidentif_fec = periodo.mesidentif_fec;
            this.fillPeriodo.observ_fec = periodo.observ_fec;
            this.fillPeriodo.estado_fec = periodo.estado_fec;
            this.fillPeriodo.fechaini_fec = periodo.fechaini_fec;
            this.fillPeriodo.fechafin_fec = periodo.fechafin_fec;
            $("#editPeriodo").modal("show");
        },
        updatePeriodo: function(id) {
            var url = "updatePeriodo/" + id;
            axios
                .post(url, this.fillPeriodo)
                .then(response => {
                    this.getPeriodo();
                    this.fillPeriodo.id_fec = "";
                    this.fillPeriodo.nomb_fec = "";
                    this.fillPeriodo.mesidentif_fec = "";
                    this.fillPeriodo.observ_fec = "";
                    this.fillPeriodo.estado_fec = "";
                    this.fillPeriodo.fechaini_fec = "";
                    this.fillPeriodo.fechafin_fec = "";
                    this.errors = [];
                    $("#editPeriodo").modal("hide");
                    toastr.success("Periodo actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deletePeriodo: function(periodo) {
            var url = "deletePeriodo/" + periodo.id_fec;
            axios.post(url).then(response => {
                this.getPeriodo();
                toastr.success("Periodo eliminado con éxito");
            });
        },
        getTipoDocumento: function() {
            var urlTipoDocumento = "getTipoDocumento";
            axios.get(urlTipoDocumento).then(response => {
                this.tipoDocumento = response.data;
            });
        },
        createTipoDocumento: function() {
            var urlPeriodo = "storeTipoDocumento";
            axios
                .post(urlPeriodo, this.newTipoDocumento)
                .then(response => {
                    this.getTipoDocumento();
                    this.newTipoDocumento.id_emp = "";
                    this.newTipoDocumento.id_fec = "";
                    this.newTipoDocumento.nomb_doc = "";
                    this.newTipoDocumento.estado_doc = "";
                    this.newTipoDocumento.fechaini_doc = "";
                    this.newTipoDocumento.fechafin_doc = "";
                    this.errors = [];
                    $("#crearTipoDocumento").modal("hide");
                    toastr.success("Se añadido un nuevo Tipo de Documento");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editTipoDocumento: function(tipoDocumento) {
            this.fillTipoDocumento.id_doc = tipoDocumento.id_doc;
            this.fillTipoDocumento.id_emp = tipoDocumento.id_emp;
            this.fillTipoDocumento.id_fec = tipoDocumento.id_fec;
            this.fillTipoDocumento.observ_doc = tipoDocumento.observ_doc;
            this.fillTipoDocumento.nomb_doc = tipoDocumento.nomb_doc;
            this.fillTipoDocumento.estado_doc = tipoDocumento.estado_doc;
            this.fillTipoDocumento.fechaini_doc = tipoDocumento.fechaini_doc;
            this.fillTipoDocumento.fechafin_doc = tipoDocumento.fechafin_doc;
            $("#editTipoDocumento").modal("show");
        },
        updateTipoDocumento: function(id) {
            var url = "updateTipoDocumento/" + id;
            axios
                .post(url, this.fillTipoDocumento)
                .then(response => {
                    this.getTipoDocumento();
                    this.fillTipoDocumento.id_emp = "";
                    this.fillTipoDocumento.id_fec = "";
                    this.fillTipoDocumento.nomb_doc = "";
                    this.fillTipoDocumento.estado_doc = "";
                    this.fillTipoDocumento.fechaini_doc = "";
                    this.fillTipoDocumento.fechafin_doc = "";
                    this.errors = [];
                    $("#editTipoDocumento").modal("hide");
                    toastr.success("Tipo de documento actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteTipoDocumento: function(tipoDocumento) {
            var url = "deleteTipoDocumento/" + tipoDocumento.id_doc;
            axios.post(url).then(response => {
                this.getTipoDocumento();
                toastr.success("Tipo de documento eliminado con éxito");
            });
        },
        getUsuario: function() {
            var urlUsuario = "getUsuario";
            axios.get(urlUsuario).then(response => {
                this.usuarios = response.data;
            });
        },
        createUsuario: function() {
            var urlUsuario = "storeUsuario";
            axios
                .post(urlUsuario, this.newUsuario)
                .then(response => {
                    this.getUsuario();
                    this.newUsuario.id_rol = "";
                    this.newUsuario.id_emp = "";
                    this.newUsuario.id_fec = "";
                    this.newUsuario.nomb_usu = "";
                    this.newUsuario.clave_usu = "";
                    this.newUsuario.observ_usu = "";
                    this.newUsuario.estado_usu = "";
                    this.newUsuario.fechaini_usu = "";
                    this.newUsuario.fechafin_usu = "";
                    this.newUsuario.email = "";
                    this.newPersona.nombre_per = "";
                    this.newPersona.apel_per = "";
                    this.newPersona.doc_per = "";
                    this.newPersona.correo_per = "";
                    this.newPersona.fechaini_per = "";
                    this.newPersona.fechafin_per = "";
                    this.errors = [];
                    $("#crearUsuario").modal("hide");
                    toastr.success("Se añadido un nuevo Usuario");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },

        createUsuarioEmpleado: function() {
            var urlUsuario = "storeUsuarioEmpleado";
            axios
                .post(urlUsuario, this.newUsuario)
                .then(response => {
                    this.getUsuario();
                    this.newUsuario.id_rol = "";
                    this.newUsuario.id_emp = "";
                    this.newUsuario.id_fec = "";
                    this.newUsuario.nomb_usu = "";
                    this.newUsuario.clave_usu = "";
                    this.newUsuario.observ_usu = "";
                    this.newUsuario.estado_usu = "";
                    this.newUsuario.fechaini_usu = "";
                    this.newUsuario.fechafin_usu = "";
                    this.newUsuario.email = "";
                    this.newPersona.nombre_per = "";
                    this.newPersona.apel_per = "";
                    this.newPersona.doc_per = "";
                    this.newPersona.correo_per = "";
                    this.newPersona.fechaini_per = "";
                    this.newPersona.fechafin_per = "";
                    this.errors = [];
                    this.newEmpleado.id_usu = response.data;
                    this.createEmpleado();
                    toastr.success("Se añadido un nuevo Usuario");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },

        editUsuario: function(usuario) {
            this.fillUsuario.id_rol = usuario.id_rol;
            this.fillUsuario.id_usu = usuario.id_usu;

            this.fillUsuario.id_emp = usuario.id_emp;
            this.fillUsuario.id_fec = usuario.id_fec;
            this.fillUsuario.nomb_usu = usuario.nomb_usu;
            this.fillUsuario.observ_usu = usuario.observ_usu;
            this.fillUsuario.estado_usu = usuario.estado_usu;
            this.fillUsuario.fechaini_usu = usuario.fechaini_usu;
            this.fillUsuario.fechafin_usu = usuario.fechafin_usu;
            $("#editUsuario").modal("show");
        },
        updateUsuario: function(id) {
            var url = "updateUsuaurio/" + id;
            axios
                .post(url, this.fillUsuario)
                .then(response => {
                    this.getUsuario();
                    this.fillUsuario.id_rol = "";
                    this.fillUsuario.id_emp = "";
                    this.fillUsuario.id_fec = "";
                    this.fillUsuario.nomb_usu = "";
                    this.fillUsuario.observ_usu = "";
                    this.fillUsuario.estado_usu = "";
                    this.fillUsuario.fechaini_usu = "";
                    this.fillUsuario.fechafin_usu = "";
                    this.errors = [];
                    $("#editUsuario").modal("hide");
                    toastr.success("Usuario actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteUsuario: function(usuario) {
            var url = "deleteUsuario/" + usuario.id_usu;
            axios.post(url).then(response => {
                this.getUsuario();
                toastr.success("Usuario eliminado con éxito");
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getCategorias(page);
        },
        registros: function(page) {
            this.pagination.current_page = page;
            this.pagination.per_page = this.numregistros;
            this.getCategorias(page);
        },
        getFacturaCompra: function() {
            var urlFactura = "getFacturaCompra";
            axios.get(urlFactura).then(response => {
                this.facturasCompra = response.data;
            });
        },
        getFacturaVenta: function() {
            var urlFactura = "getFacturaVenta";
            axios.get(urlFactura).then(response => {
                this.facturasVenta = response.data;
            });
        },
        getProforma: function() {
            var urlProforma = "getProforma";
            axios.get(urlProforma).then(response => {
                this.proformas = response.data;
            });
        },
        cargarFacturaVenta: function() {
            var urlFactura = "preguardarFacturaVenta/";
            axios.post(urlFactura, this.buscarCli).then(response => {
                this.existeDF = "True";
                this.factura = response.data;
                $("#crearFacturaVenta").modal("hide");
            });
        },
        getIva: function() {
            var urlIva = "getIvaActual";
            axios.get(urlIva).then(response => {
                this.iva = response.data;
            });
        },
        deletedetalleFact: function(detalle) {
            var index = this.detallefactura.indexOf(detalle);
            this.detallefactura.splice(index, 1);
            this.calcular();
        },
        adddetalleFact: function(producto) {
            var IVA = this.PorcentajeIVA(producto);
            var cantidad = this.cantidadP;
            this.detallefactura.push({
                id_prod: producto.id_prod,
                codigo_prod: producto.codigo_prod,
                cantidad: cantidad,
                descripcion: producto.descripcion_prod,
                precio_prod: producto.precio_prod,
                descuento: this.calcularItem(producto, cantidad, IVA)[0]
                    .descuento,
                aplicaiva_prod: producto.aplicaiva_prod,
                neto: this.calcularItem(producto, cantidad, IVA)[0].neto,
                iva: this.calcularItem(producto, cantidad, IVA)[0].subiva,
                total: this.calcularItem(producto, cantidad, IVA)[0].total
            });
            $("#addProducto").modal("hide");
            this.buscar_prod = "";
            this.calcularTotalesFact();
        },
        PorcentajeIVA: function(producto) {
            var IVA = 0;
            if ((producto.aplicaiva_prod = "S")) {
                /*if ((this.iva[0].vigente = "S")) {
                    IVA = this.iva[0].porcentaje_iva;
                }*/
                IVA = 12;
            } else if ((producto.aplicaiva_prod = "N")) {
                IVA = 0;
            }
            return IVA;
        },
        calcularItem: function(producto, cantidad, IVA) {
            var calculoItem = [];
            var descuento = 0.0;
            var neto = cantidad * producto.precio_prod - descuento;
            var subiva = (neto * IVA) / 100;
            var total = neto + subiva;
            calculoItem.push({
                descuento: descuento,
                neto: parseFloat(neto).toFixed(2),
                subiva: parseFloat(subiva).toFixed(2),
                total: parseFloat(total).toFixed(2)
            });
            return calculoItem;
        },
        calcularTotalesFact: function() {
            this.subtotal = this.detallefactura.reduce((total, item) => {
                return total + parseFloat(item.neto);
            }, 0);
            this.subtotalIva = this.detallefactura.reduce((total, item) => {
                return total + parseFloat(item.iva);
            }, 0);
            this.total = this.detallefactura.reduce((total, item) => {
                return total + parseFloat(item.total);
            }, 0);
        },
        cambiarCantidad: function(detalle) {
            var index = this.detallefactura.indexOf(detalle);
            var producto = this.detallefactura[index];
            var cantidad = producto.cantidad;
            var IVA = this.PorcentajeIVA(producto);
            this.detallefactura[index].neto = this.calcularItem(
                producto,
                cantidad,
                IVA
            )[0].neto;
            this.detallefactura[index].iva = this.calcularItem(
                producto,
                cantidad,
                IVA
            )[0].subiva;
            this.detallefactura[index].total = this.calcularItem(
                producto,
                cantidad,
                IVA
            )[0].total;
            this.calcularTotalesFact();
        },
        getNumfactV: function() {
            let url = "";
            if (App.tipo_factura == "Venta") {
                url = "getNumFactVent";
            } else {
                url = "getNumProfVenta";
            }
            axios.get(url).then(response => {
                this.numFactv = response.data;
            });
        },

        get_ultimo_usuario: function() {
            let url = "getUltimoUsuario";
            //localStorage.removeItem("id_usuario");
            axios.get(url).then(response => {
                localStorage.setItem("id_usuario", response.data + 1);
            });
        },

        CalcularFacturaVenta: function() {
            var hoy = new Date();
            var hours = hoy.getHours();
            var minutes = hoy.getMinutes();
            var seconds = hoy.getSeconds();
            var dd = hoy.getDate();
            var mm = hoy.getMonth() + 1;
            var yyyy = hoy.getFullYear();
            dd = this.addZero(dd);
            mm = this.addZero(mm + 1);
            this.factura.subtotal_fact = this.subtotal;
            this.factura.subcero_fact = 0;
            this.factura.subiva_fact = this.subtotalIva;
            this.factura.subice_fact = 0;
            this.factura.total_fact = this.total;
            this.factura.id_per = App.id_persona;
            this.factura.fecha_emision_fact = this.fecha_act;
            this.factura.hora_emision_fact =
                hours + ":" + minutes + ":" + seconds;
            this.factura.vencimiento_fact = yyyy + "-" + mm + "-" + dd;
            this.factura.tipo_fact = App.tipo_factura;
            this.factura.estado_fact = "PA";
            if (this.numFactv) {
                this.factura.num_fact = this.series + this.numFactVent;
            } else {
                this.factura.num_fact = this.series + this.serie;
            }
            if (!this.factura.observ_fact) {
                this.factura.observ_fact = "-";
            }
        },
        mostarCliente: function(persona) {
            this.buscarCli.nom_cli =
                persona.nombre_per + " " + persona.apel_per;
            this.buscarCli.ruc_cli = persona.doc_per;
            this.buscarCli.organiz_per = persona.organiz_per;
            this.buscar_cli = this.buscarCli.ruc_cli;
        },
        createFacturaVenta: function() {
            this.factura.id_usu = this.id_usu;
            this.CalcularFacturaVenta();
            var urlFactV = "storeFactura";
            axios
                .post(urlFactV, this.factura)
                .then(response => {
                    this.guardaritem(this.factura.num_fact);
                    window.location = "/Ventas";
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        guardaritem: function(id_fact) {
            var urlFacturaDetalle = "storeFacturaDetalle/" + id_fact;
            this.detallefactura.reduce((total, item) => {
                axios
                    .post(urlFacturaDetalle, item)
                    .then(response => {})
                    .catch(error => {
                        this.errors = error.response.data;
                    });
            }, 0);
        },
        onFileChange: function(event) {
            if (event.target.files && event.target.files.length > 0) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function load() {
                    //this.image = reader.result;
                    this.obtener_archivo(reader.result);
                }.bind(this);
                this.file = file;
            }
        },
        obtener_archivo: function(file) {
            var urlGuardarArchFact = "storeFacturaCompra";
            this.file_Factura.facturaC = file;
            axios
                .post(urlGuardarArchFact, this.file_Factura)
                .then(response => {
                    this.getFacturaCompra();
                    this.errors = [];
                    $("#crearProducto").modal("hide");
                    toastr.success("Se ha registrado la Compra");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        //Metodos de Inventario
        getInventario: function() {
            var urlInventario = "getInventario";
            axios.get(urlInventario).then(response => {
                this.inventarios = response.data;
            });
        },

        createInventario: function() {
            var urlGuardarInventario = "storeInventario";
            axios
                .post(urlGuardarInventario, this.newInventario)
                .then(response => {
                    this.getInventario();
                    newInventario = {
                        id_prod: "",
                        id_emp: "",
                        id_fec: "",
                        numprod_inv: "",
                        observ_inv: "",
                        estado_inv: "",
                        fechafin_inv: ""
                    };
                    this.errors = [];
                    $("#crearInventario").modal("hide");
                    toastr.success("Se añadido un nuevo Inventario");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        editInventario: function(inventario) {
            this.fillInventario.id_inv = inventario.id_inv;
            this.fillInventario.id_usu = inventario.id_usu;
            this.fillInventario.id_prod = inventario.id_prod;
            this.fillInventario.id_emp = inventario.id_emp;
            this.fillInventario.id_fec = inventario.id_fec;
            this.fillInventario.descripcion_inv = inventario.descripcion_inv;
            this.fillInventario.numprod_inv = inventario.numprod_inv;
            this.fillInventario.numexist_inv = inventario.numexist_inv;
            this.fillInventario.observ_inv = inventario.observ_inv;
            this.fillInventario.estado_inv = inventario.estado_inv;
            this.fillInventario.fechafin_inv = inventario.fechafin_inv;

            $("#editInventario").modal("show");
        },
        updateInventario: function(id) {
            var url = "updateInventario/" + id;
            axios
                .post(url, this.fillInventario)
                .then(response => {
                    this.getInventario();
                    this.fillInventario = {
                        id_usu: "",
                        id_prod: "",
                        id_emp: "",
                        id_fec: "",
                        descrpcion_inv: "",
                        numprod_inv: "",
                        numexist_inv: "",
                        observ_inv: "",
                        estado_inv: "",
                        fechafin_inv: ""
                    };
                    this.errors = [];
                    $("#editInventario").modal("hide");
                    toastr.success("Inventario actualizado con éxito");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        },
        deleteInventario: function(inventario) {
            var url = "deleteInventario/" + inventario.id_inv;
            axios.post(url).then(response => {
                this.getInventario();
                toastr.success("Inventario eliminada con éxito");
            });
        }
    }
});