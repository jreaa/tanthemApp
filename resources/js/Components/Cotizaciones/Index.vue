<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'cotizaciones.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Proyectos</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Proyectos</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los proyectos asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus proyectos</span
            >
          </h3>
        </div>
        <div class="card-toolbar">
          <!--begin::Dropdown-->
          <div class="dropdown dropdown-inline mr-2">
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
                ></span
              >Agregar Proyecto
            </button>
          </div>

        </div>
      </div>
      <div class="card-body">
        <!--begin: Datatable-->
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
               <div class="table-responsive" style="margin-top:15px!important">
                   <div class="alert alert-custom alert-warning"
                    role="alert"
                     id="alerta"
                    v-if="clientes.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay proyectos registradas 
                    </div>
                    </div>
                
                    <table
                     v-if="clientes.data != ''"
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
                            style="width:26%"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Cliente
                            </div>
                            
                            </th>
                            <th
                            style="width:26%"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Contacto
                            </div>
                            
                            </th>
                            <th @click="changeSort(p,'n_interno')" style="cursor:pointer">
                              <div style="display: flex;justify-content: space-between;">
                                  N° Interno
                                  <div>
                             
                                    <i v-if="sort && sortingvalue == 'n_interno'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                    <i v-if="sort == false && sortingvalue == 'n_interno'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                </div>
                              </div>
                              
                              </th>
                            
                            <th
                            @click="changeSort(p,'fecha')"
                            style="cursor:pointer"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Fecha
                                <div>
                             
                                  <i v-if="sort && sortingvalue == 'fecha'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'fecha'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                            </div>
                            </th>
                            <th>
                              <div style="display: flex;justify-content: space-between;">
                                  Estado
                              </div>
                              
                            </th>
                            <th>
                                <div style="display: flex;justify-content: space-between;">
                                    Monto
                                </div>
                              
                            </th>
                            <th
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
                                <div style="display: flex;justify-content: space-between;">
                                Seguimiento
                                <div>
                                
                                    <i v-if="sort && sortingvalue == 'description'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                    <i v-if="sort == false && sortingvalue == 'description'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                </div>
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

                        <tr class="even" v-for="cliente in clientes.data" :key="cliente.id">
                            <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50 symbol-light-primary">
                                        <div class="symbol-label font-size-h5">{{ cliente.nameCliente[0] }}</div>
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
                                            >{{cliente.nameCliente}}</span
                                        >
                                        <a href="#" class="text-muted text-hover-primary">{{cliente.phoneClientes}}</a>
                                        </div>
                                    </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                    <span
                                        class="
                                        text-dark-75
                                        font-weight-bold
                                        line-height-sm
                                        d-block
                                        pb-2
                                        "
                                        >{{cliente.nameContacto}}</span
                                    >
                                    <a href="#" class="text-muted text-hover-primary">{{cliente.rutContacto}}</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                              {{cliente.n_interno === null ? cliente.id : cliente.n_interno | n_interno}}
                            </td>
                            <td class="">
                            <a
                                class="text-dark-50 text-hover-primary"
                                href="mailto:kbrainsby1c@hibu.com"
                                >{{cliente.fecha | moment}}</a
                            >
                            </td>
                            <td style="">
                            <span
                                class="
                                label label-lg
                                font-weight-bold
                                 label-inline
                                "
                                :style="{ background : cliente.colorname, color : cliente.colorfont }"
                                >{{cliente.estadoname}}</span
                            >
                            </td>
                            <td class="text-dark-50 text-hover-primary">
                              <span v-if="cliente.unidad === 'chile'">{{cliente.monto | chile}}</span>
                              <span v-else-if="cliente.unidad === 'dolar'">{{cliente.monto | dolar}}</span>
                              <span v-else>{{cliente.monto | chileanUF}}</span>
                            </td>
                            <td class="text-dark-50 text-hover-primary text-center"  v-bind:title="cliente.description">
                              <popper
                                trigger="clickToOpen"
                                :options="{
                                  placement: 'button',
                                  modifiers: { offset: { offset: '0,10px' } }
                                }">
                                <div class="popper">
                                  {{cliente.description}}
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
                            <td class="text-dark-50 text-hover-primary text-center">
                              <router-link
                                :to="{ name: 'seguimientoCotizacion.index', params: {id : cliente.id} }"
                                class="btn btn-sm btn-clean btn-icon"
                                title="Seguimiento Cotizacion"
                                >
                                <i class="la la-arrow-circle-right icon-lg"></i>
                                </router-link>
                            </td>
                            <td nowrap="nowrap" style="">

                                <button
                                    @click="gotoCotizacion(cliente.id_body)"
            
                                    class="btn btn-sm btn-clean btn-icon"
                                    title="Visualizar Cotizacion"
                                                    >
                                      <i class="flaticon-eye"></i>
                                </button>
                                <button
                                      class="btn btn-sm btn-clean btn-icon"
                                      @click="updateModal(cliente.id)"
                                  >
                                      <i class="la la-edit"></i>
                                  </button>
                                <button
                                    @click="delete_cliente(cliente.id, cliente.name)"
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
               Tabla Proyectos
              </div>
            </div>
            <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
              <div
                class="dataTables_paginate paging_simple_numbers"
                id="kt_datatable_paginate"
              >
                <pagination
                :data="clientes"
                class="pagination"
                @pagination-change-page="getClientes"
                ></pagination>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal-->
    <div class="modal" tabindex="-1" id="createModal">
      <form class="modal-dialog modal-lg" @submit.prevent="SendData">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ editMode ? "Agregar" : "Editar" }} Proyecto
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
            <div class="row mb-4">
              <div class="form-group col-md-4">
                <label for="n_interno">Numero Interno</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="form.n_interno"
                  placeholder="N°33022"
                  v-bind:class="errors.n_interno ? ' is-invalid' : ''"
                  required
                />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.n_interno"
                >
                  {{ errors.n_interno[0] }}
                </div>
              </div>
              <div class="form-group col-md-4" v-show="editMode">
                <label for="rut">Fecha * </label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="Persona Juridica"
                  v-model="fecha"
                  v-bind:class="errors.fecha ? ' is-invalid' : ''"
                  required
                />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.fecha"
                >
                  {{ errors.fecha[0] }}
                </div>
              </div>
              <div class="form-group col-md-4" v-show="!editMode">
                <label>Ultima Modificacion</label>
                <input
                  type="text"
                  class="form-control"
                  :value="form.updated_at | moment"
                  required
                  disabled
                />
              </div>


              <div class="form-group col-md-4">
                <label for="n_interno">Estados</label>
                <select
                        name="estado"
                        id="estado"
                        class="form-control"
                        v-model="form.id_estado"
          
                        v-bind:class="errors.estado ? ' is-invalid' : '' "
                      >
                        <option value="" v-if="form.id_estado == ''" selected>Estado...</option>
                        <option v-for="estado in estados.data" :key="estado.id" :value="estado.id">
                            {{ estado.name }}
                        </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="cliente">Cliente</label>
                <v-select :options="options" v-model="form.id_cliente" @input="getContactos"></v-select>
              </div>
              <div class="form-group col-md-4">
                <label for="contactos">Contactos</label>

                <v-select ref="select" :options="contactos" v-model="form.id_contacto" 
                  :disabled="form.id_cliente == ''"  @input="getEmailContacto">
                  <span slot="no-options" @click="$refs.select.open = false">
                      Lo siento no se encontro ese contacto
                          <button v-if="contactos.length < 4" type="button" class="btn btn-sm btn-link" @click="addContacto($refs.select.search)">¿Lo deseas agregar?</button>
                    </span>
                  </v-select>
              </div>
              <div class="form-group col-md-4">
                <label for="correo">Correo</label>
                <input
                  v-model="form.correo"
                  class="form-control"
                  placeholder="example@mail.com"
                  v-bind:class="errors.correo ? ' is-invalid' : ''"
                  required
                  disabled
                />
              </div>
              
              <div class="form-group col-md-4">
                <label for="monto">Monto</label>
                <input
                  id="inputFormatoNumerico"
                  v-model="form.monto"
                  class="form-control"
                  placeholder="100000"
                  v-bind:class="errors.monto ? ' is-invalid' : ''"
                  required
                />
              </div>
              <div class="form-group col-md-4">
                <label for="unidades">Unidad</label>
                <select
                    name="unidades"
                    class="form-control"
                    v-model="form.unidad"
                    v-bind:class="errors.unidad ? ' is-invalid' : '' "
                  >
                    <option value="" v-if="form.unidad == ''" selected>Unidad...</option>
                    <option v-for="unidad in unidades" :key="unidad.id" :value="unidad.id">
                        {{ unidad.text }}
                    </option>
                </select>
              </div>

              
              <div class="form-group col-md-4">
                <label for="n_interno">Responsable</label>
                <select
                        name="estado"
                        id="estado"
                        class="form-control"
                        v-model="form.responsable"
          
                        v-bind:class="errors.responsable ? ' is-invalid' : '' "
                      >
                        <option value="" v-if="form.responsable == ''" selected>Responsable...</option>
                        <option v-for="usuario in usuarios.data" :key="usuario.id" :value="usuario.name">
                            {{ usuario.name }}
                        </option>
                </select>
              </div>
              
              
              <div class="form-group col-md-12">
                <label for="email">Descripcion</label>
                <textarea
                  rows="5"
                  cols="30"
                  type="text"
                  id="email"
                  class="form-control "
                  placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non leo leo. Cras eget leo at purus imperdiet cursus. Aenean eget urna nec urna viverra laoreet..."
                  v-model="form.description"
                  v-bind:class="errors.description ? ' is-invalid' : ''"
                ></textarea>
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.description"
                >
                  {{ errors.description[0] }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex">
            <div class="ml-auto">
              <button
                type="button"
                class="btn btn-secondary mr-2"
                data-dismiss="modal"
              >
                Cancelar
              </button>
              <button
                type="submit"
                class="btn btn-primary"
                :class="{
                  'spinner spinner-white spinner-right': clientFormLoading,
                }"
                :disabled="clientFormLoading"
              >
                Guardar
              </button>
            </div>
          </div>
        </div>
      </form>
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
import 'vue-popperjs/dist/vue-popper.css';
let usuario = document.head.querySelector('meta[name="user"]');
let user = JSON.parse(usuario.content);
let date = new Date;
let dateToday = String(date.getFullYear()+ '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + date.getDate()).padStart(2, '0')
export default {
  data() {
    return {
      unidades: [
        {
          id: 'chile',
          text: 'CLP'
        },
        {
          id: 'chile2',
          text: 'UF'
        },
        {
          id: 'dolar',
          text: 'USD'
        },
      ],
      estados : {},
      contactos: [],
      usuarios: {},
      options: [],
      fecha: dateToday,
      sortingvalue : '',
      p: '',
      sorting : 'ascending',
      sort : true,
      search: '',
      paginate : 10,
      idCliente: "",
      editMode: null,
      clientes: {},
      form: {
        id: '',
        fecha: "",
        description: "",
        n_interno: "",
        id_cliente: "",
        id_contacto: "",
        id_estado: "",
        monto: "",
        unidad:"",
        responsable: "",
        correo: ""
      },
      clientFormLoading: false,
      errors: {},
    };
  },
  created() {
    this.getClientes();
    this.getUsuarios();
    this.getEstados();
    this.getResponsables();
  },
  mounted() {
            /**
             * Number.prototype.format(n, x, s, c)
             *
             * @param integer n: length of decimal
             * @param integer x: length of whole part
             * @param mixed   s: sections delimiter
             * @param mixed   c: decimal delimiter
             * sample:
             * let numbers = [1, 12, 123, 1234, 12345, 123456, 1234567, 12345.67, 123456.789];
             * console.log(numbers[6].format(0, 3, ',', '.'); output --> 1,234,567
             * console.log(numbers[8].format(2, 3, ',', '.'); output --> 123,456.78
             */

            Number.prototype.format = function(n, x, s, c) {
                let re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                    num = this.toFixed(Math.max(0, ~~n));
                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
            };

            // Restricts input for the given textbox to the given inputFilter.
            function setInputFilter(textbox, inputFilter) {
                ["input"].forEach(function(event) {
                    textbox.addEventListener(event, function() {
                        if (this.id === "inputFormatoNumerico") {
                            if (this.value !== "") {
                                let str = this.value;
                                let oldstr= str.substring(0, str.length - 1);
                                let millares = ",";
                                let decimales = ".";
                                str = str.split(millares).join("");
                                if (isNaN(str)) {
                                    this.value = oldstr;
                                } else {
                                    let numero = parseInt(str);
                                    this.value = numero.format(0, 3, millares, decimales);
                                }
                            }
                        }
                    });
                });
            }
            setInputFilter(document.getElementById("inputFormatoNumerico"), function(value) {
                let regex = new RegExp(/^-?\d*$/);
                return regex.test(value);
            });
  },
  watch: {
    paginate: function () {
      this.getClientes();
    },
    search : function () {
      this.getClientes();
    },
    fecha: function(val){
      this.form.fecha = val
    }
  },
  components: {'popper': Popper},
  filters: {
    moment: function (date) {
      return moment(date).format('DD/MM/YYYY');
    },

  },

  methods: {
    getEmailContacto() {
      console.log("is here")
      axios.get("/api/contactos/"+ this.form.id_contacto.code)
          .then((response) => {
              this.form.correo = response.data.email
          })
    },
    addContacto(nameContacto){
        let form = {
          name: nameContacto,
          id_cliente: this.form.id_cliente.code
        }
        axios.post("/api/contactos", form)
            .then(() => {
                toastr.success('Contacto Guardado');
                this.errors = {}
                this.getContactos(this.form.id_cliente.code);
            }).catch(error => {
                if(error.response.status === 422){
                    this.errors = error.response.data.errors;
                    toastr.error('Error de Guardado');
                }
            });
      },
    getContactos(id=null) {
      this.contactos = [];
      console.log(id)
        let idSelected = typeof id == 'object' ? id.code :id;
        axios.get("/api/contactos_cliente/"+ idSelected)
            .then((response) => {
              const contactosData = response.data;
              for(let i = 0; i < contactosData.length; i++){
                this.contactos.push({label: `${contactosData[i].name}`, code: contactosData[i].id});
              }
            })
      },
    getEstados() {
      axios.get("/api/estados-proyectos?").then((response) => {
        this.estados = response.data;
      });
    },
    getResponsables() {
      axios.get("/api/usuarios?").then((response) => {
        this.usuarios = response.data;
      });
    },
    getUsuarios() {
      axios.get("/api/clientes-all").then((response) => {
        const clientes = response.data.data;
        for(let i = 0; i < clientes.length; i++){
          this.options.push({label: `${clientes[i].name} - ${clientes[i].rut}`, code: clientes[i].id});
        }
      });
    },
    getClientes(page = 1,table = "n_interno") {
      this.clientFormLoading = true;
      let sort = '';
      this.p = page;
      if(this.sort){
        sort = 'asc';
      }else{
        sort = 'desc';
      }
      axios.get("/api/cotizaciones?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table).then((response) => {
        this.clientes = response.data;
        this.clientFormLoading = false;
      });
    },
    createModal() {
      $("#createModal").modal("show");
      this.editMode = true;
      this.resetForm();
    },
    updateModal(id) {
      this.editMode = false;
      $("#createModal").modal("show");
      this.getCliente(id);
      
      this.idCliente = id;
    },
    SendData() {
      if (this.editMode) {
        this.crearCliente();
      } else {
        this.updateCliente();
      }
    },
    getCliente(id) {
      axios.get("/api/cotizaciones/" + id).then((response) => {
          this.form = response.data.data;
          if(this.form.n_interno == null){
            this.form.n_interno = this.form.id
          }
          this.getContactos(response.data.data.id_cliente);
          this.fecha = response.data.data.fecha
          this.form.id_cliente = { "label": response.data.data.nameCliente, "code": response.data.data.id_cliente }
          this.form.id_contacto = { "label": response.data.data.nameContacto, "code": response.data.data.id_contacto }
          this.form.correo = response.data.data.emailContacto
      });
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
      this.getClientes(p,table);
      console.log(this.sort + " "+ table);
    },
    resetForm() {
      this.form.description = ""
      this.form.name = ""
      this.form.n_interno =""
      this.form.id_cliente = ""
      this.fecha = dateToday
      this.form.fecha = ''
      this.form.id_contacto = ''
      this.form.monto = ''
      this.form.id_estado = ''
      this.form.responsable = ''
      this.form.correo = ''
      this.responsable = ''
      this.correo = ''

    },
    delete_cliente(id, name) {
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
            .delete("/api/cotizaciones/" + id+"?id_usuario="+user.id)
            .then((response) => {
              /*
              this.$swal({
                icon: "success",
                title: "Eliminado satisfactoriamente",
              });*/

              toastr.success('Eliminado satisfactoriamente');

              this.getClientes();
            })
            .catch((error) => {
              toastr.error('Eliminado satisfactoriamente');
              //this.$swal({ icon: "danger", title: "Algo salio mal" });
            });
        }
      });
    },
    
    updateCliente() {
      this.clientFormLoading = true;
      this.form.id_cliente = this.form.id_cliente.code
      this.form.id_contacto = this.form.id_contacto.code
      this.form.fecha = this.fecha
      axios
        .put("/api/cotizaciones/" + this.idCliente+"?id_usuario="+user.id, this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          toastr.success('Tipo de Cliente Actualizado');
          //this.$swal({ icon: "success", title: "Proyecto Actualizado" });
          this.getClientes();
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
    gotoCotizacion(id){
      localStorage.setItem('id_cotizacion', id)
      this.$router.push({ name: 'cotizacion.index' })
    },
    crearCliente() {
      this.clientFormLoading = true;
      this.form.id_cliente = this.form.id_cliente.code
      this.form.id_contacto = this.form.id_contacto.code
      this.form.fecha = this.fecha
      axios
        .post("/api/cotizaciones"+"?id_usuario="+user.id, this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          //this.$swal({ icon: "success", title: "Proyecto Guardado" });
          toastr.success('Proyecto Guardado');
          this.getClientes();
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
  },
};
</script>
<style>
.vs__dropdown-toggle{
  border: 1px solid #E4E6EF!important;

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