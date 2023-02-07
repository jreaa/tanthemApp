<template>
   <div>
       	<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
                <Header></Header>
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<Aside></Aside>

						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<main class="container" style="padding-bottom: 50px;">
								<router-view></router-view>
							</main>
                            
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<Footer></Footer>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
   </div>
</template>

<script>
import Footer from '../Layouts/Footer.vue'
import Header from '../Layouts/Header.vue'
import Sidebar from '../Layouts/Sidebar.vue'
import Aside from '../Layouts/Aside.vue'
import Home from './Home.vue'

export default {
    components :{
        Footer,
        Sidebar,
        Aside,
        Header,
        Home
    },
	data(){
		return {
			backPage : ''
		}
	},
	watch : {
		'$route'(val) {
			this.removerClase(localStorage.getItem("location"))
			this.valideLocation(val.path)
			let location = val.path;
			let location2 = val.path.split('/')

			if(location2.length === 3) {
				location = location2[0]+"/"+location2[1]
			}
			localStorage.setItem("location", location)
		}
	},
	mounted(){
		this.valideLocation(window.location.pathname)
		localStorage.setItem("location", window.location.pathname)
	},

	methods: {
		valideLocation(location){
			let location2 = location.split('/')
			if(location2.length === 3) {
				location = location2[0]+"/"+location2[1]
				
			}
			console.log(location);
			localStorage.setItem("location", location)

			if(location == '/' || location == '/welcome' || location == '/seguimiento-cliente' || location == '/visualizar-seguimiento' ){
				$('#clientes').addClass("active");
				$("#clientesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/tipo-clientes' ){
				$('#clientes').addClass("active");
				$("#tipoClientesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/tipo-rubros' ){
				$('#clientes').addClass("active");
				$("#tipoRubrosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/pendientes' ){
				$('#clientes').addClass("active");
				$("#PendientesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/trabajadores' ){
				$('#recursos').addClass("active");
				$("#trabajadoresMenu").addClass("menu-item-active");
				$("#kt_aside_tab_5").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/usuarios' ){
				
				$('#recursos').addClass("active")
				$("#usuarioMenu").addClass("menu-item-active");
				$("#kt_aside_tab_5").addClass("active show");
				//console.log(headerUsuarios);
			}else if(location == '/estados' ){
				$('#clientes').addClass("active");
				$("#estadosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/acciones' ){
				$('#clientes').addClass("active");
				$("#accionMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/grafico-cliente' ){
				$('#clientes').addClass("active");
				$("#GraficoMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/accion-rapida' ){
				$('#clientes').addClass("active");
				$("#AccionRapidaMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/productos' ){
				$('#clientes').addClass("active");
				$("#productoMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/configuracion-cotizacion' ){
				$('#clientes').addClass("active");
				$("#configuracionMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/roles' ){
				$('#usuarios').addClass("active");
				$("#rolesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_3").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/servicios' ){
				$('#costos').addClass("active");
				$("#servicioMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/proyectos' ){
				$('#costos').addClass("active");
				$("#treeMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/liquidaciones' ){
				$('#recursos').addClass("active");
				$("#liquidacionesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_5").addClass("active show");
				//console.log(headerClientes);
			}else if(location == '/configuracion-liquidacion' ){
				$('#recursos').addClass("active");
				$("#ConfiguracionliquidacionesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_5").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/liquidacion' ){
				$('#recursos').addClass("active");
				$("#liquidacionesMenu").addClass("menu-item-active");
				$("#kt_aside_tab_5").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/costeo' ){
				$('#costos').addClass("active");
				$("#treeMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/pagos' ){
				$('#costos').addClass("active");
				$("#pagosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/centro-costo' ){
				$('#costos').addClass("active");
				$("#tCentroCostosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/tingresos' ){
				$('#costos').addClass("active");
				$("#tingresosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/tcostos' ){
				$('#costos').addClass("active");
				$("#tcostosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/costosGeneral' ){
				$('#costos').addClass("active");
				$("#centralMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estudio-proyectos' ){
				$('#costos').addClass("active");
				$("#estudioMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/cotizaciones' ){
				$('#clientes').addClass("active");
				$("#cotizacionMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/seguimiento-cotizacion' ){
				$('#clientes').addClass("active");
				$("#cotizacionMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/cotizacion' ){
				$('#clientes').addClass("active");
				$("#cotizacionMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estados-productos' ){
				$('#clientes').addClass("active");
				$("#estadoProductosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estados-proyectos' ){
				$('#clientes').addClass("active");
				$("#estudioProyectosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_2").addClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estados-costos' ){
				$('#costos').addClass("active");
				$("#estadosCostosMenu").addClass("menu-item-active");
				$("#kt_aside_tab_4").addClass("active show");
				//console.log(headerClientes);
			}
		},
		removerClase(location){
			if(location == '/' || location == '/welcome' ){
				$('#clientes').removeClass("active");
				$("#clientesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}else if(location == '/tipo-clientes' ){
				$('#clientes').removeClass("active");
				$("#tipoClientesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/configuracion-cotizacion' ){
				$('#clientes').removeClass("active");
				$("#configuracionMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/tipo-rubros' ){
				$('#clientes').removeClass("active");
				$("#tipoRubrosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/configuracion-liquidacion' ){
				$('#recursos').removeClass("active");
				$("#ConfiguracionliquidacionesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_5").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/trabajadores' ){
				$('#recursos').removeClass("active");
				$("#trabajadoresMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_5").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estados-proyectos' ){
				$('#clientes').removeClass("active");
				$("#estudioProyectosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/pendientes' ){
				$('#clientes').removeClass("active");
				$("#PendientesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}else if(location == '/liquidaciones' ){
				$('#recursos').removeClass("active");
				$("#liquidacionesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_5").removeClass("active show");
				//console.log(headerClientes);
			}else if(location == '/liquidacion' ){
				$('#recursos').removeClass("active");
				$("#liquidacionesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_5").removeClass("active show");
				//console.log(headerClientes);
			}else if(location == '/usuarios' ) {
				$('#usuarios').removeClass("active")
				$("#usuarioMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_3").removeClass("active show");
				//console.log(headerUsuarios);
			}else if(location == '/estados' ){
				$('#clientes').removeClass("active");
				$("#estadosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/grafico-cliente' ){
				$('#clientes').removeClass("active");
				$("#GraficoMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/accion-rapida' ){
				$('#clientes').removeClass("active");
				$("#AccionRapidaMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/acciones' ){
				$('#clientes').removeClass("active");
				$("#accionMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/productos' ){
				$('#clientes').removeClass("active");
				$("#productoMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/cotizaciones' ){
				$('#clientes').removeClass("active");
				$("#cotizacionMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/seguimiento-cotizacion' ){
				$('#clientes').removeClass("active");
				$("#cotizacionMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}

			
			else if(location == '/cotizacion' ){
				$('#clientes').removeClass("active");
				$("#cotizacionMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estados-productos' ){
				$('#clientes').removeClass("active");
				$("#estadoProductosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_2").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/roles' ){
				$('#usuarios').removeClass("active");
				$("#rolesMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_3").removeClass("active show");
				//console.log(headerClientes);
			}else if(location == '/servicios' ){
				$('#costos').removeClass("active");
				$("#servicioMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}else if(location == '/proyectos' ){
				$('#costos').removeClass("active");
				$("#treeMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/costeo' ){
				$('#costos').removeClass("active");
				$("#treeMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '//estados-costos' ){
				$('#costos').removeClass("active");
				$("#estadosCostosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/pagos' ){
				$('#costos').removeClass("active");
				$("#pagosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/centro-costo' ){
				$('#costos').removeClass("active");
				$("#tCentroCostosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/tingresos' ){
				$('#costos').removeClass("active");
				$("#tingresosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/tcostos' ){
				$('#costos').removeClass("active");
				$("#tcostosMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/costosGeneral' ){
				$('#costos').removeClass("active");
				$("#centralMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
			else if(location == '/estudio-proyectos' ){
				$('#costos').removeClass("active");
				$("#estudioMenu").removeClass("menu-item-active");
				$("#kt_aside_tab_4").removeClass("active show");
				//console.log(headerClientes);
			}
		}
	}
}
</script>