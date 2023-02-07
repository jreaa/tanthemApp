<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'clientes.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Clientes</a>
        <!--end::Item-->
    </div>

    <h3 class="mt-4">Clientes</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de Clientes
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus
              clientes</span
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
                  </g></svg><!--end::Svg Icon--></span
              >Agregar Cliente
            </button>
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
            <div class="col-sm-12 col-md-6" style="display:flex">
              <div id="kt_datatable_length">
                <label
                  >Mostrar
                  <select
                    v-model="paginate"
                    name="kt_datatable_length"
                    aria-controls="kt_datatable"
                    class="
                      custom-select custom-select-sm
                      form-control form-control-sm
                    "
                  >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                  </label
                >
                <br>
                
              </div>
              <div class="ml-4" id="kt_datatable_length">
                <label
                  >Estados
                  <select
                    v-model="estado"
                    name="kt_datatable_length"
                    aria-controls="kt_datatable"
                    class="
                      custom-select custom-select-sm
                      form-control form-control-sm
                    "
                    @change="estado == '0' ? getClientes() : getClientes(page = 1,table = 'name', estado=estado)"
                  >
                    <option value="0" selected>Todos</option>
                    <option v-for="estado in estados" :key="estado.id" :value="estado.id">{{estado.name}}</option>
                  </select>
                  </label
                >
                <br>
              </div>
            </div>
          <div id="search" class="col-sm-12 col-md-6" style="display: flex;justify-content: flex-end;">  
              <div id="kt_datatable_filter"  >
                <label
                  >Buscar:<input
                  v-model="search"
                    type="search"
                    class="form-control form-control-sm"
                    placeholder=""
                    aria-controls="kt_datatable"
                /></label>
                  <span
                  v-if="clientes.data == ''"
                id="btnAddBlock"
                  class="
                    select2-container
                    select2-container--default
                    select2-container--open
                  "
                  style="position: absolute;top: 30px;left: 367px;  transition-property: opacity, top;
                  transition-duration: 3s"
                  ><span
                  id="btnAddSection"
                    class="select2-dropdown select2-dropdown--below"
                    dir="ltr"
                    style="width: 250px"
                    ><span class="select2-results"
                      ><ul
                      style="padding: 2px 0 0 0"
                        class="select2-results__options"
                        role="listbox"
                        aria-multiselectable="true"
                        id="select2-kt_select2_11-results"
                        aria-expanded="true"
                        aria-hidden="false"
                      >
                        <li
                        style="text-align:center"
                          class="select2-results__option"
                          role="group"
                          aria-label="Alaskan/Hawaiian Time Zone"
                          data-select2-id="101"
                        >
                        
                          <button @click="registrarClienteModal"  class="btn btn-light-primary font-weight-bolder btn-sm btn-block">Registrar este cliente</button>
                        </li>
                   
                      </ul></span
                    ></span
                  ></span
                >
              
            
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
                        No hay tipos de clientes registrados 
                    </div>
                    </div>
                
                
                    <table
                    v-if="clientes.data != ''"
                        class=" 
                        mt-3
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
                            
                            tabindex="0"
                            aria-controls="kt_datatable"
                            rowspan="1"
                            colspan="1"
                            style="width: 24px"
                            aria-label="Agent: activate to sort column ascending"
                            >
                            <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all"><input type="checkbox" v-model="selectPage">&nbsp;<span></span></label></span>
                            </th>
                          
                            <th

                            style="width: 218px;cursor:pointer"
                           
                            @click="changeSort(p,'name')"
                            >
                            
                            <div style="display: flex;justify-content: space-between;">
                              Cliente
                              <div>
                                  <i v-if="sort && sortingvalue == 'name'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'name'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                              
                            </div>
                            
                            </th>
                          

                            <th
                          
                            style="width: 114px;cursor:pointer"
                          
                            @click="changeSort(p,'rut')"
                            >
                            <div style="display: flex;justify-content: space-between;">
                              Rut
                              <div>
                                   <i v-if="sort && sortingvalue == 'rut'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                    <i v-if="sort == false && sortingvalue == 'rut'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                              
                            </div>
                            
                            </th>
                            <th
                            
                            style="width: 134px;cursor:pointer"
                       
                            @click="changeSort(p,'pais')"
                            >
                            
                            <div style="display: flex;justify-content: space-between;">
                              Pais
                              <div>
                                  <i v-if="sort && sortingvalue == 'pais'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                    <i v-if="sort == false && sortingvalue == 'pais'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                              
                            </div>
                            </th>
                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Localizacion"
                            >
                            Localizacion
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

                        <tr class="even" v-for="cliente in clientes.data" :key="cliente.id" :class="isChecked(cliente.id) ? 'table-primary' : ''">
                          <td>

                          
                          <span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all"><input v-model="cheked" :value="cliente.id" type="checkbox">&nbsp;<span></span></label></span>
                          </td>

                            <td class="sorting_1 dtr-control">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 symbol-light-primary">
                                <div class="symbol-label font-size-h5">{{ cliente.name[0] }}</div>
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
                                    :class="isChecked(cliente.id) ? 'color-dark' : ''"
                                    >{{cliente.name}}</span
                                >
                                <a href="#" class="text-muted text-hover-primary" :class="isChecked(cliente.id) ? 'color-dark' : ''">{{cliente.email}}</a>
                                </div>
                            </div>
                            </td>
                            
                            <td class="text-dark-50 text-hover-primary" :class="isChecked(cliente.id) ? 'color-dark' : ''" >{{cliente.rut}}</td>
                            <td class="text-dark-50 text-hover-primary" :class="isChecked(cliente.id) ? 'color-dark' : ''">{{cliente.pais}}</td>
                            <td class="text-dark-50 text-hover-primary"  v-bind:title="cliente.regionName+'-'+cliente.comuna_id" :class="isChecked(cliente.id) ? 'color-dark' : ''">
                              <div v-if="cliente.regionName.length<8">{{cliente.regionName}} - {{cliente.comuna_id}}</div>
                              <div v-else> {{ cliente.regionName.substring(0,8)+".." }}</div>
                            </td>
                            
                            <td nowrap="nowrap" style="">
                                <router-link
                :to="{ name: 'seguimiento.index', params: {id : cliente.id} }"
                class="btn btn-sm btn-clean btn-icon"
                title="Seguimiento Clientes"
                                >
                                <i class="la la-cog"></i>
                                </router-link>
                                

                            <button
                    class="btn btn-sm btn-clean btn-icon"
                    @click="updateModal(cliente.id)"
                    title="Actualizar Clientes"
                                        
                            >
                                <i class="la la-edit"></i>
                            </button>
                            <button
                            title="Eliminar Clientes"
                    @click="delete_cliente(cliente.id, cliente.name)"
                    class="btn btn-sm btn-clean btn-icon">
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
                Tabla Clientes 
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
                :limit="limitPage"
                @pagination-change-page="getClientes"
                ></pagination>
              </div>
            </div>
          </div>
        </div>
        <!--end: Datatable-->
      </div>
    </div>

    <!--Modal-->
    <div class="modal" tabindex="-1" id="createModal">
      <form
        class="modal-dialog modal-lg"
        @submit.prevent="SendData"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ editMode ? "Agregar" : "Editar"  }} actividad
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
              <!--/rut/-->
              <div class="form-group col-md-4">
                <label for="rut">Rut *</label>
                <input v-model="rut" class="form-control" name="rut" ref="rut" id="rut" type="text" @blur="validateRut"
                  placeholder="12.345.678-0" :class="!error ? ' is-invalid': ''">
              </div>
              <!--/correo/-->
              <div class="form-group col-md-4">
                <label for="email">Correo *</label>
                <input
                  type="text"
                  id="email"
                  class="form-control"
                  placeholder="ej: correo@ejemplo.cl"
                  v-model="form.email"
                  v-bind:class="errors.email ? ' is-invalid' : '' "
                />
                <div style="display:block!important" class="invalid-feedback" v-if="errors.email">
                  {{ errors.email[0] }}
                </div>
              </div>
                <!--/razon nombre/-->
              <div class="form-group col-md-4">
                <label for="name">Nombre o Razón social *</label>
                  <input
                    type="text"
                    id="name"
                    class="form-control"
                    placeholder="ej: Distribuidora"
                    v-model="form.name"
                    v-bind:class="errors.name ? ' is-invalid' : '' "
                  />
                <div style="display:block!important" class="invalid-feedback" v-if="errors.name">
                  {{ errors.name[0] }}
                </div>
              </div>
            </div>

            <div class="row mb-4">
                 <!--/tipo cliente/-->
                <div class="form-group col-md-4">
                  <label for="type">Tipo de cliente *</label>
                  <select
                    name="type"
                    id="type"
                    class="form-control"
                    v-model="form.type"
                    v-bind:class="errors.type ? ' is-invalid' : '' "
                  >
                    <option v-if="form.type == ''" value="" selected>Tipo de cliente...</option>
                    
                    <option v-for="tipoCliente in tipoClientes" :key="tipoCliente.id" :value="tipoCliente.name">
                        {{ tipoCliente.name }}
                    </option>

                  </select>
                  <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.type">
                    {{ errors.type[0] }}
                  </div>
                </div>
                <!--/rubros/-->
                <div class="form-group col-md-4">
                  <label for="city">Rubro *</label>
                  <select
                    name="city"
                    id="city"
                    class="form-control"
                    v-model="form.rubro_id"
                    v-bind:class="errors.rubro_id ? ' is-invalid' : '' "
                  >
                    <option value="" v-if="form.rubro_id == ''" selected>Rubro...</option>
                    <option v-for="rubro in rubros.data" :key="rubro.id" :value="rubro.id">
                        {{ rubro.name }}
                    </option>
                  </select>
                  <div style="display:block!important" class="invalid-feedback" v-if="(errors && errors.rubro_id)">
                    {{ errors.rubro_id[0] }}
                  </div>
                </div>
              <!--/descripcion/-->
              <div class="form-group col-md-4">
                <label for="email">Comentario</label>
                <input
                  rows="5"
                  cols="30"
                  type="text"
                  id="email"
                  class="form-control "
                  placeholder="Comentario"
                  v-model="form.comentarios"
                  v-bind:class="errors.comentarios ? ' is-invalid' : ''" />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.description"
                >
                  {{ errors.description[0] }}
                </div>
              </div>
                
            </div>
            <div class="row mb-4">

              <!--/paises/-->
              <div class="form-group col-md-4">
                <label for="region">Pais *</label>
                <select
                  name="region"
                  id="region"
                  class="form-control"
                  v-bind:class="errors.pais ? ' is-invalid' : '' "
                  v-model="form.pais"
                >
                  <option value="" v-if="form.pais == ''"  selected>Pais...</option>
                  <option v-for="pais in countries.countries" :key="pais.name" :value="pais.name">
                      {{ pais.name }}
                  </option>
                </select>
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.pais">
                  {{ errors.pais[0] }}
                </div>
              </div>
              <!--/region/-->
              <div class="form-group col-md-4">
                <label for="region">Región *</label>
                <select
                  name="region"
                  id="region"
                  class="form-control"
                  v-model="form.region_id"

                  @change="getComunas"
                >
                  <option value="" v-if="form.region_id == ''"  selected>Region...</option>
                  <option v-for="region in regiones" :key="region.id" :value="region.id">
                      {{ region.name }}
                  </option>
                </select>
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.stateId">
                  {{ errors.region_id[0] }}
                </div>
              </div>

              <!--/comuna/-->
              <div class="form-group col-md-4">
                <label for="city">Comuna *</label>
                <select
                  name="city"
                  id="city"
                  class="form-control"
                  v-model="form.comuna_id"
                  v-bind:class="errors.comuna_id ? ' is-invalid' : '' "
                >
                  <option value="" v-if="form.comuna_id == ''" selected>Comunas...</option>
                  <option v-for="comuna in comunas" :key="comuna.id" :value="comuna.name">
                      {{ comuna.name }}
                  </option>
                </select>
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.comuna_id">
                  {{ errors.comuna_id[0] }}
                </div>
              </div>

            
            </div>
            <hr>
            <br>
            <!--/ TABLA CONTACTOS (4) /-->
            <pm-contact-table :clienteSelected="clienteSelected" :editMode="editMode" :contactsBody="contactsBody" />
            
            <div class="row mb-4">
              <!--/giro/-->
              <div class="form-group col-md-4">
                <label for="category">Giro </label>
                <input
                  type="text"
                  for="category"
                  class="form-control"
                  placeholder="ej: Ventas al por mayor"
                  v-model="form.category"
                  v-bind:class="errors.category ? ' is-invalid' : '' "
                />
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.category">
                  {{ errors.category[0] }}
                </div>
              </div>

              <!--/website/-->
              <div class="form-group col-md-4">
                <label for="website">Sitio web </label>
                <input
                  type="text"
                  id="website"
                  class="form-control"
                  placeholder="ej: www.ejemplo.cl"
                  v-model="form.website"
                  v-bind:class="errors.rut ? ' is-invalid' : '' "
                />
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.website">
                  {{ errors.website[0] }}
                </div>
              </div>
              <!--/direccion/-->
              <div class="form-group col-md-4">
                <label for="address">Dirección </label>
                <input
                  type="text"
                  id="address"
                  class="form-control"
                  v-model="form.address"
                  v-bind:class="errors.address ? ' is-invalid' : '' "
                />
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.address">
                  {{ errors.address[0] }}
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
    <!--endModal-->
  </div>
</template>

<script>
let usuario = document.head.querySelector('meta[name="user"]');
let user = JSON.parse(usuario.content);
import PmContactTable from './ContactTable.vue';
import  json  from './../../Data/countries.js'
export default {
  data() {
    return {
      contactsBody: [],
      error: true,
      limitPage: 3,
      error2: true,
      validationRut: true,
      validationRut2 : true,
      countries: {},
      estado : '',
      sortingvalue : '',
      mensaje : '',
      selectPage : false,
      cheked : [],
      p: '',
      sorting : 'ascending',
      sort : true,
      search: '',
      paginate : 50,
      tipoClientes: {},
      estados : {},
      idCliente : '',
      regiones: {},
      comunas : {}, 
      editMode: null,
      rut: '',
      rut2: '',
      clientes: {},
      clienteSelected: '',
      rubros: [],
      form: {
        estado : 1,
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
        comuna_id : '',
        rut_cliente : '',
        pais : '',
        email2: '',
        description: '',
        comentarios: '',
        rubro_id: ''
      },
      clientFormLoading: false,
      errors: {},
    };
  },
  components: {PmContactTable},
  mounted() {
    this.getClientes();
    this.getRegion();
    this.getTipoCliente();
    this.getEstados();
    this.getRubros();
    console.log(json.countries);
    this.countries = json;
  },
  watch: {
    paginate: function () {
      this.getClientes();
    },
    search : function () {
      this.getClientes();
    },
    selectPage : function(value){
      if(value){
        this.clientes.data.forEach(cliente => {
          this.cheked.push(cliente.id);
        });
      }else{
        this.cheked = [];
      }
    },
    rut: function (val) {
          this.rut = this.cleanRut(this.rut);
          let len = this.rut.length - 1;
          if (len > 3) {
              let dv = this.rut[len];
              let beforeDv = this.rut.substring(0, len).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
              this.rut = beforeDv + '-' + dv;
          }
      },
      rut2: function (val) {
          this.rut2 = this.cleanRut(this.rut2);
          let len = this.rut2.length - 1;
          if (len > 3) {
              let dv = this.rut2[len];
              let beforeDv = this.rut2.substring(0, len).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
              this.rut2 = beforeDv + '-' + dv;
          }
      }
  },
  methods: {
    cleanRut(value) {
        return value.replace(/^0+|[^0-9kK]+/g, '').toUpperCase();
    },
    validateRut() {
        let rut = this.cleanRut(this.rut);
        let digito_verificador = this.rut.substr(-1);

        rut = rut.substr(0, rut.length - 1);

        let serie = 0;
        let producto = 0;

        do {

            producto += (rut % 10) * ((serie % 6) + 2);
            serie++;

        } while (rut = Math.floor(rut / 10));

        let resto = producto % 11;
        let resultado = 11 - resto;

        if (resultado == 11) {
            resultado = 0;
        } else if (resultado == 10) {
            resultado = 'K';
        }

        if (digito_verificador != resultado) {
            this.errorInRut();
        } else {
            this.error = true;
        }

    },
    errorInRut() {
        this.error = false;
    },
    validateRut2() {
        let rut = this.cleanRut(this.rut2);
        let digito_verificador = this.rut2.substr(-1);


        rut = rut.substr(0, rut.length - 1);

        let serie = 0;
        let producto = 0;

        do {

            producto += (rut % 10) * ((serie % 6) + 2);
            serie++;

        } while (rut = Math.floor(rut / 10));

        let resto = producto % 11;
        let resultado = 11 - resto;

        if (resultado == 11) {
            resultado = 0;
        } else if (resultado == 10) {
            resultado = 'K';
        }

        if (digito_verificador != resultado) {
            this.errorInRut2();
        } else {
            this.error2 = true;
        }

    },
    errorInRut2() {
        this.error2 = false;
    },
    getEstados() {
      axios.get("/api/estados?").then((response) => {
        this.estados = response.data;
      });
    },

    isChecked(cliente_id){
      return this.cheked.includes(cliente_id);
    },
    expor(){
      this.$swal({
        title: "Esta funcion no esta disponible aun",
        icon: "warning",
      })
    },
    getRubros(page = 1,table = "name") {
        axios.get("/api/tipo-rubros").then((response) => {
          this.rubros = response.data;
        });
      },
    getClientes(page = 1,table = 'name', estado=this.estado) {
      this.clientFormLoading = true;
      this.p = page;
      let sort = '';
      if(this.sort){
        sort = 'asc';
      }else{
        sort = 'desc';
      }

      axios.get("/api/clientes?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table + "&estado=" + estado).then((response) => {
        this.clientes = response.data;
        this.clientFormLoading = false;
      });
    },
    changeSort(p,table){
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
    registrarClienteModal(){
        this.form.name = this.search;
        $("#createModal").modal("show");
        this.editMode = true;
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
    getTipoCliente(){
      axios.get('/api/tipo-clientes/')
      .then(response => {
          console.log(response);
          this.tipoClientes = response.data.data;
      });
      
    },
    getRegion(){
        axios.get("/api/regiones")
        .then((response) => {
            this.regiones =response.data;
        });
    },
    getEstados(){
        axios.get("/api/estados")
        .then((response) => {
            this.estados =response.data.data;
        });
    },
    getComunas(idRegion=null, idComuna=null){
        if(idRegion == null){
          axios.get("/api/comunas/"+ idRegion)
          .then((response) => {
              this.comunas = idComuna;
          });
        }
        axios.get("/api/comunas/"+ this.form.region_id)
        .then((response) => {
            this.comunas =response.data;
        });
    },
    SendData(){
      if(this.editMode){
        this.crearCliente();
      }else{
        this.updateCliente();
      }
    },
    getCliente(id){
      this.clienteSelected = id;
      axios.get('/api/clientes/' + id)
      .then(response => { 
          console.log(response);
          this.form = response.data.data;
          this.rut = response.data.data.rut;
          this.getComunas(response.data.data.region_id, response.data.data.comuna_id);
      });
      
    },
    resetForm(){
        let mensaje = document.getElementById("rut");
        mensaje.classList.remove('is-invalid', 'is-valid');
        this.form.rut ='';
        this.form.email = '';
        this.form.name   = '';
        this.form.primary_phone = '';
        this.form.secondary_phone = '';
        this.form.category = '';
        this.form.website = '';
        this.form.address =  '';
        this.form.contact_name ='';
        this.form.type = '';
        this.form.region_id = '';
        this.form.comuna_id  = '';
        this.form.pais = '';
        this.rut_cliente = '';
        this.errors = {}
        this.clienteSelected = 0;
        this.form.comentarios = '';
        this.form.rubro_id = '';
    },
    delete_cliente(id, name) {
      this.$swal({
        title: "¿Esta seguro que desea eliminar a "+ name + " ?",
        text: "Una vez eliminado no quedara registro",
        icon: "warning",
        showCancelButton: true,
        confirButtonColor: "#3699FF ",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Si, eliminar...",
      }).then((result) => {
        if (result.value) {
          axios
            .delete("/api/clientes/" + id+"?id_usuario="+user.id)
            .then((response) => {

              toastr.success('Eliminado satisfactoriamente');
              /*
              this.$swal({
                icon: "success",
                title: "Eliminado satisfactoriamente",
              });*/

              this.getClientes();
            })
            .catch((error) => {
              //this.$swal({ icon: "danger", title: "Algo salio mal" });
              toastr.error('Algo salio mal');
            });
        }
      });
    },
    updateCliente(){
      this.clientFormLoading = true;
      if(this.error || this.error2){
        this.form.rut = this.rut
        this.form.rut2 = this.rut2
        axios.put('/api/clientes/'+ this.idCliente+"?id_usuario="+user.id,this.form)
          .then(response => {
            $('#createModal').modal('hide');
              this.clientFormLoading = false;
              toastr.success('Cliente Actualizado');
              //this.$swal({ icon: 'success', title: 'Cliente Actualizado'})
              this.getClientes();
              this.errors = {}
          }).catch(error => {
            if(error.response.status === 422){
                  this.errors = error.response.data.errors;
                  this.form_submitting = false;
                  toastr.error('Error de Actualizado');
                  
                  //this.$swal({ icon: 'error', title: 'Error de Actualizado'})
                
              }
              this.clientFormLoading = false;
          });
      }else{
        this.clientFormLoading = false;
        toastr.error('Por favor verifique los datos');
      }
    },
    crearCliente(){
        this.form.contactos = this.contactsBody;
        
        this.clientFormLoading = true;
        if(this.error || this.error2){
          this.form.rut = this.rut
          this.form.rut2 = this.rut2
          axios.post("/api/clientes"+"?id_usuario="+user.id, this.form)
          .then((response) => {
              $('#createModal').modal('hide');
              this.clientFormLoading = false;
              toastr.success('Cliente Guardado');
              //this.$swal({ icon: 'success', title: 'Cliente Guardado'})
              this.getClientes();
              this.errors = {}
          }).catch(error => {
              if(error.response.status === 422){
                  this.errors = error.response.data.errors;
                  this.form_submitting = false;
                  toastr.success('Error de guardado');
                  
                  //this.$swal({ icon: 'error', title: 'Error de guardado'})
                
              }
              this.clientFormLoading = false;
          });
        }else{
          this.clientFormLoading = false;
          toastr.error('Por favor verifique los datos');
        }
    },

  },
};
</script>
<style scoped>
.color-dark{
  color: #1c1c1c!important;
  font-weight: 600!important;
}
@media(max-width: 700px)
{
  #search{
    display: block!important;
  }
  #paginate{
    display: block!important;
  }
  #btnAddBlock{
    left: 83px!important;
  }
  #btnAddSection{
    width: 226px!important;
  }
  #alerta {
    width: 100% !important;
  }
}
</style>