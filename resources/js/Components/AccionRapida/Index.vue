<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'estados.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Accion Rapida</a>
        <!--end::Item-->
    </div>

    <h3 class="mt-4">Accion Rapida</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los seguimientos asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus tipo de
              seguimientos</span
            >
          </h3>
        </div>
        <div class="w-100 mt-5">
          <!--begin::Dropdown-->
                          <!--begin::Teachers-->
          <div class="d-flex flex-row row">
            <!--begin::Aside-->
              <div class="col-md-12">
                <div class="flex-md-row-auto">
                  
                  <div>
                    <div class="pt-0" style="display: flex;justify-content: space-between;">
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
                </div>
              </div>
              <!--end::Aside-->
          </div>
          <!--end::Button-->
        </div>
      </div>
      <div class="card-body">
        <!--begin: Datatable-->
        <div
          id="kt_datatable_wrapper"
          class="dataTables_wrapper dt-bootstrap4 no-footer"
        >
        <div class="row">
        <div class="col-md-8" style="display:flex">                                      
                <div class="ml-4" id="kt_datatable_length" style="width:60%;height: 15vh;">
                  <label>
                    Filtrar Cliente
                  </label>
                  <v-select :options="options"  v-model="clienteUnique"  :dropdown-should-open="dropdownShouldOpen"  ></v-select>
                </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Filtrar por pendientes</label>
              <select class="form-control" v-model="pendientes" @change="getSeguimiento">
                <option value="">Todos</option>
                <option value="1">Proximo Agendamento pendientes</option>
                <option value="0">Proximo Agendamento no pendientes</option>
              </select>
            </div>
          </div>
          </div>
          <div class="row d-flex" :class="clienteUnique ? 'justify-content-between' : 'justify-content-end'" style="
          border-bottom: 1 px solid #EBEDF3;
          padding-top: 3PX;
          border-bottom: 1px solid #EBEDF3;">

            <div v-if="clienteUnique != ''" class="col-md-3" style="display: flex;margin-left: 25px;">
                  <label
                  style="margin-right:10px"
                    >Cambiar Estado
                    <select
                      v-model="estado"
                      name="kt_datatable_length"
                      aria-controls="kt_datatable"
                      class="
                        custom-select custom-select-sm
                        form-control form-control-sm
                      "
                      @change="updateCliente(estado)"
                    >
                      <option v-for="estado in estados" :key="estado.id" :value="estado.id">{{estado.name}}</option>
                    </select>
                    </label
                  >

            </div>
            <div style="display:none; margin-top:19px;marign-left:10px">
                    
                  <date-picker
                    style="margin-right:3px!important"
                    v-model="time"
                    
                    type="datetime"
                    placeholder="Proximo Agendamiento"
                    :show-time-panel="showTimePanel"
                    @close="handleOpenChange"
                  >
                    <template v-slot:footer>
                      <button class="mx-btn mx-btn-text" @click="toggleTimePanel">
                        {{ showTimePanel ? 'select date' : 'select time' }}
                      </button>
  
                    </template>
                  
                  </date-picker>

                  
                  <button style="height: 34px!important" title="Añadir Proximo Evento" class="btn btn-light-primary font-weight-bolder btn-sm" @click="proximoAgendamiento" v-if="time != null ">
                  <i class="flaticon2-calendar-6 icon-md"></i>
                  </button>
        
            </div>

            <div class="d-flex">            
              <div style="display: flex;justify-content: flex-end;">
                <div id="kt_datatable_filter">
                  <label
                    >Buscar:<input
                    v-model="search"
                      type="search"
                      class="form-control form-control-sm"
                      placeholder=""
                      aria-controls="kt_datatable"
                  /></label>
                </div>
              </div>
              <div class="dropdown dropdown-inline mr-2" style="margin-top: 17px;margin-left: 5px;">
                <button
                  type="button"
                  class="btn btn-light-primary font-weight-bolder btn-sm"
                  @click="createModal()"
                >
                  <span class="svg-icon svg-icon-primary svg-icon-md"
                    ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      width="24px"
                      height="24px"
                      viewBox="0 0 24 24"
                      version="1.1"
                    >
                      <g
                        stroke="none"
                        stroke-width="1"
                        fill="none"
                        fill-rule="evenodd"
                      >
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                          d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                          fill="#000000"
                          fill-rule="nonzero"
                          opacity="0.3"
                        />
                        <path
                          d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                          fill="#000000"
                          fill-rule="nonzero"
                        />
                      </g></svg
                    ><!--end::Svg Icon--></span
                  >Agregar seguimientos
                </button>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                  <div
                    class="alert alert-custom alert-warning"
                    role="alert"
                     id="alerta"
                    v-if="estados.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay seguimientos registrados 
                    </div>
                    </div>
                    <table v-if="seguimientos.data != '' || registro"
                                    class="
                                    table table-separate table-head-custom table-checkable
                                    dataTable
                                    no-footer
                                    dtr-inline
                                    "
                                    id="kt_datatable"
                                    role="grid"
                                    aria-describedby="kt_datatable_info"
                                >
                                    <thead>
                                    <tr role="row">
                                        <th
                                        style="width:26%"
                                        >
                                        <div style="display: flex;justify-content: space-between;">
                                            Cliente
                                        </div>
                                        
                                        </th>
                                        

                                        <th
                                        
                                        @click="changeSort(p,'date')"
                                        >
                                        <div style="display: flex;justify-content: space-between;">
                                          Fecha
                                          <div>
                                              <i v-if="sort && sortingvalue == 'date'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                              <i v-if="sort == false && sortingvalue == 'date'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                          </div>
                                          
                                        </div>
                                        
                                        </th>
                                        
                                        <th
                                        @click="changeSort(p,'action')"
                      
                                        >
                                        <div style="display: flex;justify-content: space-between;">
                                          Accion
                                          <div>
                                              <i v-if="sort && sortingvalue == 'action'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                              <i v-if="sort == false && sortingvalue == 'action'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                          </div>
                                          
                                        </div>
                                        
                                        </th>
                                        <th
                                        @click="changeSort(p,'comment')"
                    
                                        >
                                        <div style="display: flex;justify-content: space-between;">
                                          Comentario
                                          <div>
                                              <i v-if="sort && sortingvalue == 'comment'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                              <i v-if="sort == false && sortingvalue == 'comment'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                          </div>
                                          
                                        </div>
                                        
                                        </th>

                                        <th
                                        @click="changeSort(p,'contact')"
                        
                                        >
                                        <div style="display: flex;justify-content: space-between;">
                                          Usuario
                                          <div>
                                              <i v-if="sort && sortingvalue == 'contact'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                              <i v-if="sort == false && sortingvalue == 'contact'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                          </div>
                                          
                                        </div>
                                    
                                        </th>
                                        <th
                                        class="sorting_disabled"
                                        rowspan="1"
                                        colspan="1"
                                        aria-label="Actions"
                                        >
                                        Pendientes
                                        </th>
                                        
                                        <th
                                        class="sorting_disabled"
                                        rowspan="1"
                                        colspan="1"
                                        aria-label="Actions"
                                        >
                                        Acciones
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="registro == true" >
                                        <td>
                                            <v-select :options="options2" v-model="form.client_id"></v-select>
                                        </td>
                                        <td>
                                          <input type="date" v-model="form.date" class="form-control">
                                        </td>
                                        <td>
                                          <select v-bind:class="errors.action ? ' is-invalid' : ''" type="text" v-model="form.action" class="form-control">
                                            <option :value="accion.id" v-for="accion in acciones.data" :key="accion.id">
                                              {{accion.name}}
                                            </option>
                                          </select>
                                          </td>
                                        <td>
                                          <input v-bind:class="errors.comment ? ' is-invalid' : ''" type="text" v-model="form.comment" class="form-control"  placeholder="Esto es un comentario">
                                          
                                        </td>

                                        <td>
                                        
                                          <span style="text-transform: capitalize">
                                            {{ editMode ? usuario.name : form.contact}}
                                          </span>
                                          
                                        </td>
                                        <td>
                                          <span class="switch switch-icon justify-content-center">
                                              <label>
                                                <input type="checkbox" v-model="form.prox_agendamiento">
                                                <span></span>
                                              </label>
                                            </span>
                                          </td>
                      
                                        <td nowrap="nowrap" style="display:flex;justify-content: space-between;" ><button type="submit" class="btn btn-primary" :class="{
                                          'spinner spinner-white spinner-right': clientFormLoading,
                                        }" :disabled="clientFormLoading" @click="SendData">Enviar</button>

                                        <button @click="registro = false"  class="btn btn-light-danger font-weight-bold mr-2" title="Cerrar">
                                          <span class="svg-icon svg-icon-1x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo3/dist/../src/media/svg/icons/Navigation/Close.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                  <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                      <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                      <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                  </g>
                                              </g>
                                          </svg><!--end::Svg Icon--></span>
                                        </button>
                                        </td>
                        
                                        </tr>  
                                
                                    <tr class="even" v-for="seguimiento in seguimientos.data" :key="seguimiento.id">
                                        <td :class="seguimiento.prox_agendamiento ? 'table-warning' : '' ">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50 symbol-light-primary">
                                                <div class="symbol-label font-size-h5">{{ seguimiento.nameCliente[0] }}</div>
                                                </div>
                                                <div class="ml-3">
                                                <span
                                                    class="
                                                    text-dark-75
                                                    font-weight-bold
                                                    line-height-sm
                                                    d-block
                                                    pb-2
                                                    "
                                                    >{{seguimiento.nameCliente}}</span
                                                >
                                                <a href="#" class="text-muted text-hover-primary">{{seguimiento.phoneClientes}}</a>
                                                </div>
                                            </div>
                                        </td>

                                      <td :class="seguimiento.prox_agendamiento ? 'table-warning' : '' ">
                                        <a
                                            class="text-dark-50 text-hover-primary"
                                            href="#"
                                            >{{ getHoraFecha(seguimiento.date) }}</a
                                        >
                                      </td>
                                      
                                      <td :class="seguimiento.prox_agendamiento ? 'table-warning' : '' " class="text-dark-50 text-hover-primary">
                                        <span
                                            class="
                                            label label-lg
                                            font-weight-bold
                                            label-inline
                                            "
                                            :style="{ background : seguimiento.accionColor, color : seguimiento.accionColorFont }"
                                            >{{seguimiento.accionName}}
                                          </span>
                                      </td>
                                      <td :class="seguimiento.prox_agendamiento ? 'table-warning' : '' " class="text-dark-50 text-hover-primary">{{seguimiento.comment}}</td>
                                      <td :class="seguimiento.prox_agendamiento ? 'table-warning' : '' " class="text-dark-50 text-hover-primary">{{seguimiento.contact}}</td>
                                      <td :class="seguimiento.prox_agendamiento ? 'table-warning' : '' ">
                                        <span class="switch switch-icon d-flex justify-content-center">
                                          <label>
                                            <input  @click="changeSeguimiento(seguimiento)" type="checkbox" :checked="seguimiento.prox_agendamiento  ? 'checked' : ''">
                                            <span></span>
                                          </label>
                                        </span>
                                      </td>

                                      <td nowrap="nowrap" :class="seguimiento.prox_agendamiento ? 'table-warning' : '' ">
                                      <button
                                      class="btn btn-sm btn-clean btn-icon"
                                      @click="updateModal(seguimiento.id)">
                                          
                                            <i class="la la-edit"></i>
                                        </button>
                                        <button
                                            @click="delete_seguimiento(seguimiento.id, seguimiento.action)"
                                            class="btn btn-sm btn-clean btn-icon"
                                        >
                                            <i class="la la-trash"></i>
                                      </button>
                                        </td>
                                    </tr>
                                    </tbody>
                    </table>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <div
                class="dataTables_info"
                id="kt_datatable_info"
                role="status"
                aria-live="polite"
              >
               Tabla Seguimientos
              </div>
            </div>
            <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
              <div
                class="dataTables_paginate paging_simple_numbers"
                id="kt_datatable_paginate"
              >
                <pagination
                :limit="limitPage"
                :data="seguimientos"
                @pagination-change-page="getSeguimiento"
                class="pagination"
            
                ></pagination>
              </div>
            </div>
          </div>
        </div>
        <!--end: Datatable-->
      </div>
    </div>

  </div>
</template>
<script>
let user = document.head.querySelector('meta[name="user"]');
import Aside from '../../Layouts/Seguimientos/Aside.vue'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import VSelect from 'vue-select';
export default {
    components: {
        Aside,
        DatePicker,
        VSelect
    },
    data(){
        return {
          pendientes : '',
          limitPage: 3,
          options: [],
          options2: [],
          clienteUnique : '',
          clientes: {},
          estado : '',
          estados: {},
          time : null,
          showTimePanel: false,
          showTimeRangePanel: false,
          usuario: JSON.parse(user.content),
          sortingvalue : '',
          registro : false,
          date : '',
          p: 1,
          filtrarAll : false,
          sorting : 'ascending',
          sort : true,
          search: '',
          acciones: {},
          paginate : 25,
            errors: {},
            editMode: null,
            clientFormLoading: false,
             cliente: {
                rut :'',
                email : '',
                name  : '',
                primary_phone : '',
                secondary_phone: '',
                category : '',
                website : '',
                address :  '',
                contact_name :'',
                type : '',
                region_id : '',
                comuna_id : ''
            },
            seguimientos : {
                contact : '',
                comment : '',
                action : '',
                date : ''
            },
            form : {
                contact : '',
                comment : '',
                date : '',
                action : '',
                client_id : '',
                prox_agendamiento: ''
            },
            id : ''
        }
    },
    created() {
        this.id = this.$route.params.id;
        this.getSeguimiento();
        this.getAcciones();
        this.getClientes();
        this.getEstados();
    },
    watch: {
    paginate: function () {
      this.getSeguimiento();
    },
    search : function () {
      this.getSeguimiento();
    },
    date : function () {
      this.filtrarAll = true;
      this.getSeguimiento(this.p,"contact",this.date);
    },
    clienteUnique : function(value) {
      if(value){
        this.getCliente(this.clienteUnique.code);
      }
      this.getSeguimiento();
    }
  },
  methods: {
    dropdownShouldOpen(VueSelect) {
        if (this.clienteUnique !== '') {
          return VueSelect.open
        }

        return VueSelect.search.length !== 0 && VueSelect.open
    },
    changeSeguimiento(seguimiento){
        const json = {
          id: seguimiento.id,
          prox_agendamiento: !seguimiento.prox_agendamiento
        }
        axios.post("/api/change-seguimiento",json)
          .then(() => {
              toastr.success('Se ha actualizado correctamente');
              this.getSeguimiento();
          })
          .catch(() => toastr.error('Algo ha salido mal :('))
      },
    toastr(){
      toastr.info('Are you the 6 fingered man?')
    },
    getClientes() {

      axios.get("/api/clientes-all").then((response) => {
        this.clientes = response.data.data;
        const clientes = response.data.data;
        

        for(let i = 0; i < clientes.length; i++){
          let json = {label: `${clientes[i].name} - ${clientes[i].primary_phone}`, code: clientes[i].id};
          this.options.push(json);
          this.options2.push({label: `${clientes[i].name}`, code: clientes[i].id});
        }
      });
    },
    getAcciones(page = 1,table = "name") {
      this.clientFormLoading = true;
      let sort = '';
      this.p = page;
      if(this.sort){
        sort = 'asc';
      }else{
        sort = 'desc';
      }
      axios.get("/api/accion?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table).then((response) => {
        this.acciones = response.data;
      });
    },
       toggleTimePanel() {
        this.showTimePanel = !this.showTimePanel;
      },
      toggleTimeRangePanel() {
        this.showTimeRangePanel = !this.showTimeRangePanel;
      },
      handleOpenChange() {
        this.showTimePanel = false;
      },
      handleRangeClose() {
        this.showTimeRangePanel = false;
      },
      now(){
        let d = new Date();

        let date = d.getFullYear() + "-" + d.getMonth() + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds()
        return this.getHoraFecha(date);
      },
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
          //endhora
        
          return array[0];

      },
      createSeguimientoEstado(){
            const date = new Date
            const form = {
                action: 1,
                client_id: this.cliente.id,
                comment: "Cambio de estado",
                contact: this.usuario.name,
                date: date.getFullYear()+"-"+(date.getMonth() + 1)+"-"+date.getDate(),
                prox_agendamiento: ""
            }

            axios
              .post("/api/seguimientos"+"?id_usuario="+this.usuario.id , form)
              .then(() => {
              //$("#createModal").modal("hide");
              this.registro = false;
              this.clientFormLoading = false;
              //this.$swal({ icon: "success", title: "Seguimiento Guardado" });
              toastr.success('Seguimiento Guardado');
              this.getSeguimiento(this.p,this.$route.params.id);
              })
        },
      updateCliente(estado){
          this.cliente.estado = estado;
          //this.clientFormLoading = true;
          this.$swal({
            title: "¿Esta seguro que desea actualizar al cliente " + this.cliente.name + " ?",
            icon: "warning",
            showCancelButton: true,
            confirButtonColor: "#3699FF ",
            cancelButtonColor: "#dc3545",
            confirmButtonText: "Si, Actualizar...",
        }).then((result) => {
            if (result.value) {
            axios.put('/api/clientes/'+ this.clienteUnique.code+"?id_usuario="+this.usuario.id,this.cliente)
              .then(response => {
                $('#createModal').modal('hide');
                  this.clientFormLoading = false;
                  //this.$swal({ icon: 'success', title: 'Cliente Actualizado'})

                  toastr.success('Cliente Actualizado');
                  this.createSeguimientoEstado()
                  this.getCliente(this.clienteUnique.code);
              }).catch(error => {
                if(error.response.status === 422){
                      this.errors = error.response.data.errors;
                      this.form_submitting = false;
                      toastr.error('Error de Actualizado');
                      //this.$swal({ icon: 'error', title: 'Error de Actualizado'})
                    
                  }
                  this.clientFormLoading = false;
              });
              }
        });


        },
    
        getSeguimiento(page = 1, table="contact", date= '', cliente = !this.clienteUnique ? undefined : this.clienteUnique.code, pendiente=this.pendientes) {
        
        let sort = '';
        this.p = page;
        if(this.sort){
          sort = 'asc';
        }else{
          sort = 'desc';
        }
        this.clientFormLoading = true;
        axios.get("/api/seguimientos/" + "?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + 
        sort + "&table=" + table + "&date=" + date + "&cliente=" + cliente + "&pendiente=" + pendiente).then((response) => {
            this.seguimientos = response.data;
            this.clientFormLoading = false;
        });
        },
        filter(){
          this.filtrarAll = false;
          this.getSeguimiento()
        },
        changeSort(p, table){
        if(this.sort){           
            this.sort = false;
            this.sorting = '';
        }else{ 
          this.sort = true;
          this.sorting = 'ascending';
        }
        this.sortingvalue = table,

        this.getSeguimiento();
          console.log(this.sort + " "+ table);
        },

        createModal() {
        //$("#createModal").modal("show");
        this.registro = true;
        this.form.contact = this.usuario.name;
        this.editMode = true;
        this.resetForm();
       
        this.form.client_id = this.$route.params.id;

        },
        updateModal(id) {
        
        this.registro = true;
        this.editMode = false;
        //$("#createModal").modal("show");
        this.getSeg(id);
        this.idUsuario = id;
        },
        SendData() {
        if (this.editMode) {
            this.form.contact = this.usuario.name;
            this.crearSeguimiento();
        
            
        } else {
            this.form.contact = this.seguimientos.contact;
            this.updateUsuario();
        }
        },
        getSeg(id) {
        axios.get("/api/seguimientos/" + id).then((response) => {
            this.form = response.data.data;
            this.getCliente(this.form.client_id);
        });
        },
        getCliente(id){
          axios.get('/api/clientes/' + id)
          .then(response => {
              let json = { "label": response.data.data.name, "code": response.data.data.id}
              this.form.client_id = json;
              this.cliente = response.data.data;
          });
          
        },
        getEstados() {
            axios.get("/api/estados").then((response) => {
              this.estados = response.data.data;
            });
          },
        resetForm() {
                this.form.contact = '';
                this.form.comment ='';
                this.form.date ='';
                this.form.action = '';
        },
        delete_seguimiento(id, name) {
        this.$swal({
            title: "¿Esta seguro que desea eliminar a " + name + " ?",
            text: "Una vez eliminado no quedara registro",
            icon: "warning",
            showCancelButton: true,
            confirButtonColor: "#3699FF ",
            cancelButtonColor: "#dc3545",
            confirmButtonText: "Si, eliminar...",
        }).then((result) => {
            if (result.value) {
            axios
                .delete("/api/seguimientos/" + id+ "?id_usuario=" + this.usuario.id)
                .then(() => {
                toastr.success('Eliminado satisfactoriamente');
                /*this.$swal({
                    icon: "success",
                    title: "Eliminado satisfactoriamente",
                });*/

                this.getSeguimiento();
                })
                .catch(() => {
                toastr.error('Algo salio mal');
                //this.$swal({ icon: "danger", title: "Algo salio mal" });
                });
            }
        });
        },
        updateUsuario() {
        this.form.client_id = this.form.client_id.code;
        this.clientFormLoading = true;
        axios
            .put("/api/seguimientos/" + this.idUsuario+ "?id_usuario=" + this.usuario.id, this.form)
            .then(() => {
            //$("#createModal").modal("hide");
            this.registro = false;
            this.clientFormLoading = false;
            toastr.success('Seguimiento Actualizado');
            //this.$swal({ icon: "success", title: "Seguimiento Actualizado" });
            this.getSeguimiento(this.p,this.$route.params.id);
            })
            .catch((error) => {
            if (error.response.status === 422) {
                this.errors = error.response.data.errors;
                this.form_submitting = false;
                toastr.error('Error de Actualizado');
                //this.$swal({ icon: "error", title: "Error de Actualizado" });
            }
            this.clientFormLoading = false;
            });
        },
        crearSeguimiento() {
        this.form.client_id = this.form.client_id.code;
        this.clientFormLoading = true;
        axios
            .post("/api/seguimientos"+ "?id_usuario=" + this.usuario.id, this.form)
            .then(() => {
            //$("#createModal").modal("hide");
            this.registro = false;
            this.clientFormLoading = false;
            toastr.success('Seguimiento Guardado');
            //this.$swal({ icon: "success", title: "Seguimiento Guardado" });

            this.getSeguimiento(this.p,this.$route.params.id);
            })
            .catch((error) => {
            if (error.response.status === 422) {
                this.errors = error.response.data.errors;
                this.form_submitting = false;
                toastr.error('Error de guardado');
                //this.$swal({ icon: "error", title: "Error de guardado" });
            }
            this.clientFormLoading = false;
            });
        },
        proximoAgendamiento() {
        this.clientFormLoading = true;
        this.form.date = this.time;
        this.form.action = "Proximo Agengamiento";
        this.form.comment = "Proximo Agendamento";
        this.form.contact = this.usuario.name;
        this.form.client_id = this.clienteUnique.code;

        axios
            .post("/api/seguimientos"+ "?id_usuario=" + this.usuario.id, this.form)
            .then(() => {
            //$("#createModal").modal("hide");
            this.registro = false;
            this.clientFormLoading = false;
            //this.$swal({ icon: "success", title: "Proximo Agendamiento Guardado" });
            toastr.success('Proximo Agendamiento Guardado');

            this.getSeguimiento(this.p,this.$route.params.id);
            })
            .catch((error) => {
            if (error.response.status === 422) {
                this.errors = error.response.data.errors;
                this.form_submitting = false;
                toastr.error('Error de guardado');
                //this.$swal({ icon: "error", title: "Error de guardado" });
            }
            this.clientFormLoading = false;
            });
        }
    }
}
</script>
<style>
.vs__search {
  padding: 0.3rem 1rem!important;
}
@media(max-width: 700px)
{
  #search{
    display: block!important;
  }
  #paginate{
    display: block!important;
  }
  #alerta {
    width: 100%!important;
  }
}
</style>
