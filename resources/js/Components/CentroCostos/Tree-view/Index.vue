<template>
<div>
    <div>
        <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">

            <router-link
                    :to="{ name: 'proyectos.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
            <i class="flaticon2-shelter"></i>
            </router-link>
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Costeo de Proyecto</a>

        </div>
    </div>
    <h3 class="mt-4">Costeo de Proyecto</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los proyectos Asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus tipo de
              proyectos</span
            >
          </h3>
        </div>
        <div class="card-toolbar">
          <div class="dropdown dropdown-inline mr-2">
            <button
              type="button"
              @click="createModal()"
              class="btn btn-light-primary font-weight-bolder btn-sm"
            >
              <span class="svg-icon svg-icon-primary svg-icon-md"
                ><svg
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
                  </g></svg></span
              >Agregar Proyectos
            </button>
          </div>

        </div>
      </div>
      <div class="card-body">
        <div
          id="kt_datatable_wrapper"
          class="dataTables_wrapper dt-bootstrap4 no-footer"
        >
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_length" id="kt_datatable_length">
                <label
                  >Mostrar
                  <select
                    name="kt_datatable_length"
                    aria-controls="kt_datatable"
                    class="
                      custom-select custom-select-sm
                      form-control form-control-sm
                    "
                    v-model="paginate"
                  >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                  </label
                >
              </div>
            </div>
            <div class="col-sm-12 col-md-6" style="display: flex;justify-content: flex-end;">
              <div id="kt_datatable_filter" class="dataTables_filter">
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
          </div>

          <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                  <div
                    class="alert alert-custom alert-warning"
                    role="alert"
                     id="alerta"
                    v-if="proyectos.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay proyectos registrados 
                    </div>
                    </div>
                
                    <table
                        class="
                        table table-separate table-head-custom table-checkable
                        dataTable
                        no-footer
                        dtr-inline
                        "
                        id="kt_datatable"
                        role="grid"
                        aria-describedby="kt_datatable_info"
                        style="width: 1231px"
                    >
                        <thead>
                        <tr role="row">
                            <th
                              >
                              <div >
                                Cliente
                                
                              </div>
                            </th>
                            <th
                            style="width: 15%;"
                            >
                             <div style="display: flex;justify-content: space-between;">
                              N° Interno
                              <div>
                                  <i v-if="sort && sortingvalue == 'name'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'name'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                              </div>
                            </th>
                            <th
                            @click="changeSort(p,'description')"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Descripcion
                                <div>
                             
                                  <i v-if="sort && sortingvalue == 'description'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'description'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                            </div>
                            </th>
                            <th
                            >
                            <div >
                              Estado
                            </div>
                            </th>

                            <th
                            class="sorting_disabled ml-3"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            >
                            Fecha
                            </th>

                            <th>
                                <div style="display: flex;justify-content: space-between;">
                                Costear
                                </div>
                            </th>

                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            >
                            Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody> 
                        
                        
                        <tr class="even" v-for="proyecto in proyectos.data" :key="proyecto.id">
                          <td>
                              <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50 symbol-light-primary">
                                        <div class="symbol-label font-size-h5">{{ proyecto.nameCliente[0] }}</div>
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
                                            >{{proyecto.nameCliente}}</span
                                        >
                                        <a href="#" class="text-muted text-hover-primary">{{proyecto.phoneCliente}}</a>
                                        </div>
                                    </div>
                            </td>
                            <td>
                              <span>{{proyecto.name}}</span>
                            </td>
                            <td  class="text-dark-50 text-hover-primary"  v-bind:title="proyecto.description">
                              <popper
                                style="margin-left:35px"
                                trigger="clickToOpen"
                                :options="{
                                  placement: 'button',
                                  modifiers: { offset: { offset: '0,10px' } }
                                }">
                                <div class="popper">
                                  {{proyecto.description}}
                                </div>
                                <button slot="reference"
                                style="
                                  border:0px;
                                  background-color: transparent;
                                ">
                                  <i class="flaticon-exclamation-1 icon-md"></i>
                                </button>
                              </popper>
                            </td>

                            <td style="">
                            <span
                                class="
                                label label-lg
                                font-weight-bold
                                label-inline
                                "
                                :style="{ background : proyecto.colorname, color : proyecto.colorfont }"
                                >{{proyecto.estadoname}}</span
                            >
                            </td>
                            <td>{{getHoraFecha(proyecto.fecha_inicio) }}</td>
                            <td class="text-dark-50 text-hover-primary">
                              <router-link
                                style="margin-left:25px"
                                :to="{ name: 'costeo.index', params: {id : proyecto.id} }"
                                class="btn btn-sm btn-clean btn-icon"
                                title="Seguimiento Cotizacion"
                                >
                                <i class="la la-arrow-circle-right icon-lg"></i>
                                </router-link>
                            </td>
                            <td nowrap="nowrap" style="">      
                            <button class="btn btn-sm btn-clean btn-icon" @click="updateModal(proyecto.id)">
                                    <i class="la la-edit"></i>
                            </button>
                            <button @click="delete_proyecto(proyecto.id, proyecto.name)" class="btn btn-sm btn-clean btn-icon">
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
               Tabla Proyectos
              </div>
            </div>
            <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
              <div
                class="dataTables_paginate paging_simple_numbers"
                id="kt_datatable_paginate"
              >
                <pagination
                :data="proyectos"
                class="pagination"
                @pagination-change-page="getProyectos"
                ></pagination>
              </div>
            </div>
          </div>
        </div>
        <!--end: Datatable-->
              <!--Modal-->
    <div class="modal" tabindex="-1" id="modalPryecto">
      <form
        class="modal-dialog modal-lg"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ editMode ? "Agregar" : "Editar"  }} proyecto
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <i aria-hidden="true" class="ki ki-close"></i>
            </button>
          </div>
          <div class="modal-body">  
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fecha</label>
                    <input :disabled="!editMode" style="width:100%!important" v-bind:class="errors.fecha_inicio ? ' is-invalid' : ''" type="date" v-model="form.fecha_inicio" class="form-control">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div>

                    <label>Seleccione un estado</label>
                    <select
                    :disabled="!editMode"
                      style="width:100%!important"
                      name="estado"
                      id="estado"
                      class="form-control"
                      v-model="form.estado"
                    >
                      <option value="" selected>Estado...</option>
                      <option v-for="estado in estados" :key="estado.id" :value="estado.id">
                          {{ estado.name }}
                      </option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Nombre Proyecto</label>
                  <input :disabled="!editMode" style="width:100%!important" v-bind:class="errors.name ? ' is-invalid' : ''" type="text" v-model="form.name" class="form-control" placeholder="Ej: Proyecto A">
                </div>
                <div class="col-md-6">
                  <label>Descripcion Proyecto</label>
                  <input :disabled="!editMode" style="width:100%!important" v-bind:class="errors.description ? ' is-invalid' : ''" type="text" v-model="form.description" class="form-control" placeholder="Ej: Proyecto tipo A">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-4">
                  <label>Correo Opcional</label>
                  <input :disabled="!editMode" type="mail" v-bind:class="errors.correo ? ' is-invalid' : ''" v-model="form.correo" style="width:100%!important" class="form-control" placeholder="example@mail.com">
                </div>
                <div class="col-md-4">
                  <label>Telefono Opcional</label>
                  <input :disabled="!editMode" style="width:100%!important" v-bind:class="errors.telefono ? ' is-invalid' : ''" type="text" v-model="form.telefono" class="form-control" placeholder="99999999">
                </div>
                <div class="col-md-4">
                  <label>Direccion</label>
                  <input :disabled="!editMode" style="width:100%!important" v-bind:class="errors.direccion ? ' is-invalid' : ''" type="text" v-model="form.direccion"  class="form-control" placeholder="Santiago, Chile">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <label>Seleccione su proyecto: </label>
                    <v-select :options="options" 
                      :disabled="!editMode"
                      v-model="clienteId"
                      :dropdown-should-open="dropdownShouldOpen"></v-select>

                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-10">
                  <label>Visible para: </label>
                    <v-select 
                      multiple
                      :options="optionsUsuarios" 
                      :disabled="!editMode"
                      v-model="usersSelected"
                      :dropdown-should-open="dropdownShouldOpen" ></v-select>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Visible para todos:</label>
                    <label class="checkbox">
                        <input 
                          v-model="form.usersSelectedAll"
                          :disabled="!editMode" 
                          type="checkbox" 
                          name="Checkboxes1"/>
                        <span></span>
                    </label>
                  </div>

                </div>
              </div>
              
              <!--
              <div v-if="Object.keys(cliente).length !== 0" class="mt-5">  
                <hr>
                <h4 class="text-muted font-weight-bold p-4">Cliente Seleccionado: </h4>
                <div class="d-flex flex-row row mt-3">
                    <div class="col-md-12">
                      <div class="flex-md-row-auto">
                        
                        <div>
                          <div class="pt-0 row">
                            <div class="mb-10 col-md-4">
                              <div class="d-flex align-items-center">
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-user icon-lg text-success"></i>
                                  </span>
                                </div>
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
                              </div>
                            </div>
                            <div class="mb-10 col-md-4">
                              <div class="d-flex align-items-center">
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-folder icon-lg text-warning"></i>
                                  </span>
                                </div>
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
                              </div>
                            </div>
                            <div class="mb-10 col-md-4">
                              <div class="d-flex align-items-center">
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-map icon-lg text-info"></i>
                                  </span>
                                </div>
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
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>



              </div> -->
          </div>

          <div class="modal-footer d-flex">
                <button type="submit" class="btn btn-primary" :class="{
                  'spinner spinner-white spinner-right': clientFormLoading,
                }" :disabled="clientFormLoading" @click="SendData">Enviar</button>

          </div>
        </div>
      </form>
    </div>

        <pagination
          :data="proyectos"
          @pagination-change-page="getProyectos"
        ></pagination>
      </div>
    </div>
</div>

</template>
<style>
  .popper__arrow {
    display: none!important;
  }
.popper {
    background: #fff!important;
    border-radius: 0.42rem!important;
    font-size: 10px!important;
    box-shadow: 0 0 50px 0 rgb(82 63 105 / 15%)!important;
    overflow: hidden!important;
    padding: 10px!important;
    top: 10px!important;
    left: 0px!important;
}
</style>

<script>
import moment from 'moment';
import Popper from 'vue-popperjs';
let user = document.head.querySelector('meta[name="user"]');
user = JSON.parse(user.content);
export default {
    data() {
        return {
        options: [],
        usersSelected: [],
        optionsUsuarios: [],
        clienteId: "" ,
        cliente : {},
        sortingvalue : '',
        p: '',
        registro : false,
        sorting : 'ascending',
        sort : true,
        search: '',
        paginate : 10,
        idCliente: "",
        editMode: null,
        proyectos: {},
        estados : {},
        clientes: {},
        form: {
            'name': '',
            'description' : '',
            'proyecto' : '',
            'fecha_inicio' : '',
            'estado' : '',
            'costo' : '',
            'costo_iva' : '',
            'ganancias' : '',
            'correo' : '',
            'telefono' : '',
            'direccion' : '',
            'usersSelected': [],
            'usersSelectedAll': false
        },
        costos : '',
        ingresos : '',
        pagos: '',
        clientFormLoading: false,
        errors: {},
        };
    },
    components: {'popper': Popper},
    mounted() {
        this.getProyectos();
        this.getUsuarios();
    },
    watch: {
        paginate: function () {
            this.getProyectos();
        },
        search : function () {
            this.getProyectos();
        },
        clienteId : function (){
          this.form.proyecto = this.clienteId.code
          this.form.name = this.clienteId.label
        }
    },
    methods : {
        getUsuarios(page = 1,table = "name") {
          axios.get("/api/usuarios?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&table=" + table).then((response) => {
            const usuarios = response.data.data;
            for(let i = 0; i < usuarios.length; i++){
              let json = {label: `${usuarios[i].name}`, code: usuarios[i].id};
              this.optionsUsuarios.push(json);
            }
          });
        },
        dropdownShouldOpen(VueSelect) {
          if (this.clienteId !== '') {
            return VueSelect.open
          }

          return VueSelect.search.length !== 0 && VueSelect.open
        },
        getHoraFecha(string) {
            //fecha
            let fecha = string.split("-")

            let fech = fecha[0].substr(2)

            fecha[0] = fech;

            fecha = ((fecha.reverse()).join()).replace(",", "/").replace(",","/");

            //endfecha
            return fecha;

        },
        getClientesData(){
              axios.get("/api/clientes/"+this.form.cliente)
              .then((response) => {
                  this.cliente =response.data.data;
              });
        },
        getEstados(){
            axios.get("/api/estados_costos")
            .then((response) => {
                this.estados =response.data.data;
            });
        },
        getClientes(page = 1,table = 'n_interno') {
          this.options = [];
          axios.get("/api/cotizaciones?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&table=" + table).then((response) => {
            this.clientes = response.data;
            const cotizacion = response.data.data;
            for(let i = 0; i < cotizacion.length; i++){
              let json = {label: `${cotizacion[i].n_interno}`, code: cotizacion[i].id};
              this.options.push(json);
            }

          });

        },
        modalAdministrador(id){
          console.log("running");
          $('#modalAdministrador').modal('show');
          this.getProyecto(id);
        },
        changeSort(p, table){
            if(this.sort){
                this.sort = false;
                this.sorting = '';
            }else{ 
                this.sort = true;
                this.sorting = 'ascending';
            
            }
            this.sortingvalue = table;
            this.getProyectos(p,table);
        },
        resetForm() {
            this.form.name = "";
            this.form.description = "";
            this.form.plantilla_asoc = "";
            this.form.proyecto = "";
            this.form.estado = "";
            this.form.costo = "";
            this.form.costo_iva = "";
            this.form.telefono = "";
            this.form.correo = "";
            this.form.direccion = ""
            this.form.usersSelected = [];
            this.usersSelected = [];
            this.form.usersSelectedAll = false;
            this.clienteId = ""

        },
        createModal() {

            $("#modalPryecto").modal('show');
            this.editMode = true;
            this.resetForm();
            this.getClientes();
            this.getEstados();
        },
        updateModal(id) {
            $("#modalPryecto").modal('show');
            this.editMode = false;
            this.getProyecto(id);
            this.idCliente = id;
            this.getClientes();
            this.getEstados();
        },
        SendData() {
            if (this.editMode) {
                this.crearProyecto();
            }else{
                this.updateProyecto();
            }
        },
        getProyectos(page = 1,table = "name") {
            this.clientFormLoading = true;
            let sort = '';
            this.p = page;
            if(this.sort){
                sort = 'asc';
            }else{
                sort = 'desc';
            }
            
            axios.get("/api/proyectos?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table + "&id_user="+user.id).then((response) => {
                this.proyectos = response.data;
                this.clientFormLoading = false;
            });
        },
        getProyecto(id) {
            axios.get("/api/proyectos/" + id).then((response) => {
                this.form = response.data.data;
                this.clienteId = {"label": `${this.form.labelProyecto}`, "code": this.form.codeProyecto};
                this.ingresos = response.data.ingresos;
                this.costo = response.data.costo;
                this.pagos = response.data.pagos;

                const users_asoc = response.data.users_asoc;
                this.usersSelected = [];
                users_asoc.map((value, index) => {
                  let json = {"label": `${value.nameUserAsoc}`, "code": value.id_user};
                  this.usersSelected.push(json);
                })

            });
        },
        crearProyecto() {
            this.clientFormLoading = true;
            this.form.usersSelected = this.usersSelected;
            axios
            .post("/api/proyectos", this.form)
            .then((response) => {
                this.clientFormLoading = false;
                this.registro = false;
                toastr.success('Se ha creado correctamente');
                this.getProyectos();
            })
            .catch((error) => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    this.form_submitting = false;
                    toastr.error('Algo ha salido mal :(')
                }
                this.clientFormLoading = false;
            });
        },
        updateProyecto() {
            this.clientFormLoading = true;
            this.form.usersSelected = this.usersSelected;
            axios
                .put("/api/proyectos/" + this.idCliente, this.form)
                .then((response) => {
                this.clientFormLoading = false;
                this.registro = false;
                toastr.success('Se ha actualizado correctamente');
                this.getProyectos();
                })
                .catch((error) => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    this.form_submitting = false;
                    toastr.error('Algo ha salido mal :(')
                }
                this.clientFormLoading = false;
            });
        },
        delete_proyecto(id, name) {
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
                    .delete("/api/proyectos/" + id)
                    .then((response) => {
                    toastr.success('Se ha actualizado correctamente');

                    this.getProyectos();
                    })
                    .catch((error) => {
                    toastr.error('Algo ha salido mal :(')
                    });
                }
            });
        },
    }
}
</script>