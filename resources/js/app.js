require('./bootstrap');

import 'fullcalendar/dist/fullcalendar.css';
import VueCurrencyFilter from 'vue-currency-filter'
import FullCalendar from 'vue-full-calendar';

Vue.use(require('vue-moment'));
Vue.use(FullCalendar);

Vue.use(VueCurrencyFilter,
    [
        {
            name: 'n_interno',
            symbol : '',
            thousandsSeparator: '.',
            fractionCount: 0,
            fractionSeparator: ',',
            symbolPosition: 'front',
            symbolSpacing: true,
            avoidEmptyDecimals: undefined,
          },
        {
            name: 'dolar',
            symbol : 'USD',
            thousandsSeparator: '.',
            fractionCount: 0,
            fractionSeparator: ',',
            symbolPosition: 'front',
            symbolSpacing: true,
            avoidEmptyDecimals: undefined,
          },
          {
            name: 'chile',
            symbol : 'CLP',
            thousandsSeparator: '.',
            fractionCount: 0,
            fractionSeparator: ',',
            symbolPosition: 'front',
            symbolSpacing: true,
            avoidEmptyDecimals: undefined,
          },
          {
            name: 'chileanUF',
            symbol : 'UF',
            thousandsSeparator: '.',
            fractionCount: 0,
            fractionSeparator: ',',
            symbolPosition: 'front',
            symbolSpacing: true,
            avoidEmptyDecimals: undefined,
          }
    ]
)



window.Vue = require('vue').default;

import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

var vueRut = require('vue-rut');
Vue.use(vueRut);


Vue.component('apexchart', VueApexCharts)


import VueSweetalert2 from 'vue-sweetalert2'
Vue.use(VueSweetalert2)
import "sweetalert2/dist/sweetalert2.min.css"

import vSelect from 'vue-select'

Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';


//import { rutValidator } from "vue-dni";

import App from './Components/App.vue'
import ClientesIndex from './Components/Clientes/Index.vue'
import TipoCliente from './Components/TipoCliente/Index.vue'
import TipoRubros from './Components/TipoRubro/Index.vue'
import Estados from './Components/Estados/Index.vue'
import EstadosCostos from './Components/EstadosCostos/Index.vue'
import EstadosProyectos from './Components/EstadosProyectos/Index.vue'
import Usuarios from './Components/Usuarios/Index.vue'
import SeguimientoCliente from './Components/SeguimientoCliente/Index.vue'
import SeguimientoCotizacion from './Components/SeguimientoCotizacion/Index.vue'
import VisualizarSeguimiento from './Components/SeguimientoCliente/Visualizar.vue'
import GraficoCliente from './Components/GraficoCliente/Index.vue'
import Accion from './Components/Accion/Index.vue' 
import AccionRapida from './Components/AccionRapida/Index.vue' 
import Productos from './Components/Productos/Index.vue'
import Cotizaciones from './Components/Cotizaciones/Index.vue'
import Cotizacion from './Components/Cotizacion/Index.vue'
import EstadoProductos from './Components/EstadosProductos/Index.vue'
import Pendientes from './Components/Pendientes/Index.vue'
//this is a testing file
import Testing from './Components/Testing/Index.vue'
//end testing files
/* COSTEO */
import Roles from './Components/Roles/Index.vue'
import Servicios from './Components/CentroCostos/Servicios/Index.vue'
import Tree from './Components/CentroCostos/Tree-view/Index.vue'
import Costeo from './Components/Costeo/Index.vue';
import Costos2 from './Components/Costos2/Index.vue';
import TIngresos from './Components/TIngresos/Index.vue';
import Pagos from './Components/Pagos/Index.vue';
import TCosto from './Components/TCosto/Index.vue';
import CostosGeneral from './Components/CostosGeneral/Index.vue';

import CentroCosto from './Components/CentroCosto/Index.vue';

import Trabajadores from './Components/Trabajadores/Index.vue';
import Liquidaciones from './Components/Liquidaciones/Index.vue';
import LiquidacionBody from './Components/LiquidacionBody/Index.vue';
import EstudioProyectos from './Components/EstudioProyectos/EstudioProyectos';

import Configuracion from './Components/Configuracion/ConfiguracionCotizacion.vue';
import Vue from 'vue';

const router = new VueRouter({
    mode: 'history',
    routes : [
        {
            path: '/estudio-proyectos',
            component: EstudioProyectos,
            name: 'estudioProyectos.index'
        },
        {
            path: '/configuracion-cotizacion',
            component: Configuracion,
            name: 'configuracion.index'
        },
        {
            path: '/configuracion-liquidacion',
            component: Configuracion,
            name: 'configuracion2.index'
        },  
        {
            path: '/estados-proyectos',
            component: EstadosProyectos,
            name: 'estadosProyectos.index'
        },
        
        {
            path: '/pendientes',
            component: Pendientes,
            name: 'pendientes.index'
        },
        {
            path: '/costosGeneral',
            component: CostosGeneral,
            name: 'costosGeneral.index'
        },
        {
            path: '/pagos',
            component: Pagos,
            name: 'pagos.index'
        },
        {
            path: '/trabajadores',
            component: Trabajadores,
            name: 'trabajadores.index'
        },
        {
            path: '/liquidaciones',
            component: Liquidaciones,
            name: 'liquidaciones.index'
        },
        {
            path: '/liquidacion',
            component: LiquidacionBody,
            name: 'liquidacion.index'
        },
        {
            path: '/tcostos',
            component: TCosto,
            name: 'tcostos.index'
        },
        {
            path: '/tingresos',
            component: TIngresos,
            name: 'tingresos.index'
        },
        {
            path: '/roles',
            component : Roles,
            name : 'roles.index'
        },
        {
            path: '/servicios',
            component: Productos,
            name : 'servicios.index'
        },
        {
            path: '/proyectos',
            component: Tree,
            name : 'proyectos.index'
        },
        {
            path: '/centro-costo',
            component: CentroCosto,
            name : 'centroCosto.index'
        },
        {
            path: '/costeo/:id',
            component: Costeo,
            name : 'costeo.index'
        },
        {
            path: '/costeo2',
            component: Costos2,
            name : 'costeo2.index'
        },
        {
            path: '/testing',
            component: Testing,
        },
        {
            path: '/productos',
            component: Productos,
            name: 'productos.index'
        },
        {
            path: '/cotizaciones',
            component: Cotizaciones,
            name: 'cotizaciones.index'
        },
        {
            path: '/cotizacion',
            component: Cotizacion,
            name: 'cotizacion.index'
        },
        {
            path : '/',
            component : ClientesIndex,
            name: 'clientes.index'
        },
        {
            path : '/welcome',
            component : ClientesIndex,
            name: 'clientes.index'
        },
        {
            path : '/tipo-clientes',
            component : TipoCliente,
            name: 'tipoclientes.index'
        },
        {
            path : '/tipo-rubros',
            component : TipoRubros,
            name: 'tipoRubros.index'
        },
        {
            path : '/usuarios',
            component : Usuarios,
            name: 'usuarios.index'
        },
        {
            path : '/seguimiento-cliente',
            component : SeguimientoCliente,
            name: 'seguimiento.index'
        },
        {
            path : '/seguimiento-cotizacion',
            component : SeguimientoCotizacion,
            name: 'seguimientoCotizacion.index'
        },
        {
            path : '/visualizar-seguimiento',
            component : VisualizarSeguimiento,
            name: 'visualizarSeguimiento.index'
        },
        {
            path : '/testing',
            component : Testing,
            name: 'testing.index'
        },
        {
            path : '/estados',
            component : Estados,
            name: 'estados.index'
        },
        {
            path : '/estados-costos',
            component : EstadosCostos,
            name: 'estadosCostos.index'
        },
        {
            path: '/estados-productos',
            component: EstadoProductos,
            name: 'estadoProductos.index'
        },
        {
            path: '/grafico-cliente',
            component : GraficoCliente,
            name: 'grafico.index'
        },
        {
            path: '/acciones',
            component: Accion,
            name: 'accion.index' 
        },
        {
            path: '/accion-rapida',
            component: AccionRapida,
            name : 'accionRapida.index'
        }

    ]
})

Vue.component('pagination', require('laravel-vue-pagination'))

const app = new Vue({
    el: '#app',
    components : {App},
    router
});