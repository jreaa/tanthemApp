<template>
    <div>
          <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
            <!--begin::Item-->
            <a href="#" class="opacity-75 hover-opacity-100" bis_skin_checked="1">
              <i class="flaticon2-shelter"></i>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <router-link
                    :to="{ name: 'clientes.index' }"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Clientes</router-link>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <a href="#"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Visualizar Seguimiento</a>
            <!--end::Item-->
        </div>
            <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Teachers-->
                <div class="d-flex flex-row row">
                  <!--begin::Aside-->
                    <div class="col-md-12">
                      <div class="flex-md-row-auto">
                       
                        <div class="card card-custom gutter-b">
                          <!--begin::Header-->
                          <div class="card-header border-0">
                            <h3 class="card-title font-weight-bolder text-dark">Cliente</h3>
                          </div>
                          <!--end::Header-->
                          <!--begin::Body-->
                          <div id="content-cliente" class="card-body pt-0" style="display: flex;justify-content: space-between;">
                            <!--begin::Item-->
                            <div class="mb-10">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-user icon-lg text-success"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    > {{cliente.name}}
                                  </a>
                                  <span class="text-muted font-weight-bold">Razon Social.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                            <div class="mb-10">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-folder icon-lg text-warning"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    >{{cliente.rut}}
                                  </a>
                                  <span class="text-muted font-weight-bold">Rut.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                            <div class="mb-10">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-folder icon-lg text-warning"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    >{{cliente.estadoname}}
                                  </a>
                                  <span class="text-muted font-weight-bold">Estado.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                            <div class="mb-10">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-map icon-lg text-info"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    >{{cliente.type}}
                                  </a>
                                  <span class="text-muted font-weight-bold">Tipo Cliente.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                          </div>
                          <!--end::Body-->
                        </div>
                      <div class="d-flex justify-content-end mt-5" v-if="cliente.created_at">
                        <label style="font-size: 1.2rem;line-height: 2;">
                          Cliente creado : 
                          {{ getHoraFecha(cliente.created_at) }}
                        </label> 
                        </div>
                      </div>
    
    
                    </div>
    
                    <!--end::Aside-->
                </div>
                  <!--begin::Content-->
                <div class="d-flex flex-row row">
                  <div class="col-md-12">
                    <div class="flex-row-fluid">
                      <!--begin: Wizard-->
                                            <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                                                <!--begin: Wizard Nav-->
                                                <div class="wizard-nav">
                                                    <div class="wizard-steps ">
                                                        <!--begin::Wizard Step 1 Nav-->
                                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                                            <div class="wizard-label">
                                                                <h3 class="wizard-title">
                                    <span><i class="flaticon-network icon-2x"></i></span>
                                                                 <router-link
                                    :to="{ name: 'seguimiento.index', params: {id : this.$route.params.id} }"
                                  class="btn btn-light font-weight-bolder font-size-sm py-2"
                                                    >
                                      Gestionar Seguimientos
                                    </router-link>
                                  </h3>
                                                                
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Step 1 Nav-->
                                                        <!--begin::Wizard Step 2 Nav-->
                                                        <div class="wizard-step" data-wizard-type="step">
                                                            <div class="wizard-label">
                                  <h3 class="wizard-title">
                                                                <span><i class="flaticon-event-calendar-symbol icon-2x text-primary"></i></span>
                                  <router-link
                                        :to="{ name: 'visualizarSeguimiento.index', params: {id : this.$route.params.id} }"
                                        type="button"
                                        class="btn btn-light font-weight-bolder font-size-sm py-2"
                                    >
                                      Visualizar Seguimientos
                                    </router-link></h3>
                                  <div class="wizard-bar" style="background-color: #1BC5BD!important;"></div>
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Step 2 Nav-->
                                                    </div>
                                                </div>
                                                <!--end: Wizard Nav-->
    
                                            </div>
                                            <!--end: Wizard-->
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Seguimientos</span>
                                    <span class="text-muted mt-1 font-weight-bold font-size-sm">A continuacion podra observar los seguimientos</span>
                                </h3>
                                
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <FullCalendar :options="calendarOptions" />
    
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                   </div>
                    <!--end::Content-->
                </div>
                <!--end::Teachers-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    
    </div>
    
    
        
    </template>
    <script>
    import Aside from '../../Layouts/Seguimientos/Aside.vue'
    import '@fullcalendar/core/vdom' // solves problem with Vite
    
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import interactionPlugin from '@fullcalendar/interaction'
    import esLocale from '@fullcalendar/core/locales/es';
    import bootstrapPlugin from '@fullcalendar/bootstrap';
    
    export default {
        components: {
            Aside,
            FullCalendar // make the <FullCalendar> tag available
    
        },
        data(){
            return {
              calendarOptions: {
                    locale: esLocale,
                    plugins: [ dayGridPlugin, interactionPlugin ],
    
                    initialView: 'dayGridMonth',
                    initialView: 'dayGridMonth',
                    buttonText : 
                    {
                      today:    'Hoy',
                      month:    'Mes',
                      week:     'Semana',
                      day:      'Dia',
                      list:     'Lista'
                    },
                    events:[]
                },
                errors: {},
                editMode: null,
                clientFormLoading: false,
                cliente: {},
                id : ''
            }
        },
        mounted() {
            this.id = this.$route.params.id;
            this.getCliente(this.$route.params.id);
            this.getSeguimiento(this.$route.params.id);
     
        },
         methods: {
                   getHoraFecha(string) {
                let array = string.split(" ");
    
                //fecha
                let fecha = array[0].split("-")
    
                let fech = fecha[0].substr(2)
    
                fecha[0] = fech;
    
                fecha = ((fecha.reverse()).join()).replace(",", "/").replace(",","/");
    
                array[0] = fecha;
                //endfecha
    
                //hora
                let hora = array[1].substr(0, 5)
                array[1] = hora;
                console.log(hora);
                //endhora
              
                return array[0];
    
            },
            getSeguimiento(id = this.$route.params.id) {
            this.clientFormLoading = true;
            axios.get("/api/seguimiento/show/"+ id).then((response) => {
                this.calendarOptions.events = response.data;
                this.clientFormLoading = false;
            });
            },
            getCliente(id= this.$route.params.id){
                axios.get('/api/clientes/' + id)
                .then(response => {
                    console.log(response);
                    this.cliente = response.data.data;
                });
                
            },
        }
    }
    </script>
    <style>
    .fc-event-title{
        padding: 2px!important;
    }
    .fc-daygrid-event-harness {
        cursor:pointer!important;
    }
    .fc .fc-button-primary {
        background: #3699FF!important;
        color: #FFFFFF!important;
        border: 1px solid #3699FF;
        outline: none !important;
        height: 2.75rem!important;
        padding: 0 1.25rem!important;
        font-size: 1rem!important;
        border: 0;
    }
    .fc-day-today{
      background: rgba(54, 153, 255, 0.025)!important;
    }
    .fc-toolbar-title {
        font-size: 1.2rem!important;
        font-weight: 500!important;
        text-transform: uppercase!important;
        margin-top: 0.75rem!important;
    }
    .fc-col-header-cell{
        padding: 0.75rem 0.5rem!important;
        font-size: 1rem!important;
        font-weight: 500!important;
    }
    .fc-col-header-cell-cushion {
      color: #B5B5C3!important;
    }
    .fc-event-main{
        padding: 0.2rem 0.5rem!important;
        background: #3699FF!important;
    }
    
    @media (max-width: 600px){
      #content-cliente{
        display: block!important;
      }
    }
    </style>