<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'roles.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Roles</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Roles</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Contenedor de roles registrado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus roles</span
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
                ><!--end::Svg Icon--></span
              >Agregar Rol
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
                    v-if="usuarios.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay roles registrados 
                    </div>
                    </div>
                
                    <table
                    v-if="roles.data != ''"
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
                            
                            style="width: 218px;cursor:pointer"
                          
                            >
                            <div style="display: flex;justify-content: space-between;">
                              Id
                                
                            </div>
                            </th>
                            <th
                          
                            style="width: 198px;cursor:pointer"
                         
                            >
                            <div style="display: flex;justify-content: space-between;">
                              Nombre
                                
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

                        <tr class="even" v-for="role in roles" :key="role.id">

                            <td class="">
                              {{role.id}}
                            </td>
                            <td>{{role.name}}</td>
                        
                            <td nowrap="nowrap" style="">
                <!--
                               <button
                    class="btn btn-sm btn-clean btn-icon"
                    @click="updateModal(cliente.id)"
                  >
                                <i class="la la-cog"></i>
                               </button>
                            -->
                           <button
                    class="btn btn-sm btn-clean btn-icon"
                    @click="updateModal(role.id)"
                  >
                              
                                <i class="la la-edit"></i>
                            </button>
                             <button
                    @click="delete_usuario(role.id, role.name)"
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
               Tabla Roles
              </div>
            </div>
            <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
              <div
                class="dataTables_paginate paging_simple_numbers"
                id="kt_datatable_paginate"
              >

              </div>
            </div>
          </div>
        </div>
        <!--end: Datatable-->
      </div>
    </div>

      <!--Modal-->
    <div class="modal" tabindex="-1" id="createModal">
      <form class="modal-dialog modal-lg" @submit.prevent="SendData">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ editMode ? "Agregar" : "Editar" }} Usuario
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
              <div class="form-group col-md-12">
                <label for="rut">Nombre * </label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Jhon Doe"
                  v-model="form.name"
                  v-bind:class="errors.name ? ' is-invalid' : ''"
                />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.name"
                >
                  {{ errors.name[0] }}
                </div>
              </div>

              <div class="contentPermisos">
                <h3> 
                  <i class="flaticon-lock" style="margin-right: 2px;"></i> Permisos</h3>
                  <hr>
                <div class="accordion" id="accordionExample" style="width: 100%!important;">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Modulo : Clientes
                          </button>
                        </h2>
                      </div>
                     

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                        <table class="table">
                          <thead>
                             <tr class="tbodyroles">
                              <th>Visualizar Modulo</th>
                              <th>Agregar</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                              <th>Todos</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="clientes">
                              <td>
                                  <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="visualizarCliente" v-model="form.rolesClientes" value="clientes.read">
                                    <span style="width: 25px;height: 25px;"></span>
                                  </label>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="agregarCliente" class="form-control" v-model="form.rolesClientes" value="clientes.create">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                 <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="editarCliente" class="form-control" v-model="form.rolesClientes" value="clientes.edit">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="eliminarCliente" class="form-control" v-model="form.rolesClientes" value="clientes.delete">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="todosCliente" class="form-control" v-model="checkClientesRoles">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                            </tr>
                          </tbody>
                         

                        </table>
                      </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Modulo : Tipo Cliente
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                        <table class="table">
                          <thead>
                             <tr class="tbodyroles">
                              <th>Visualizar Modulo</th>
                              <th>Agregar</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                              <th>Todos</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            <tr id="tipoClientes">
                              <td>
                                  <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="visualizarTipoCliente" v-model="form.rolesTipoClientes" value="tipoclientes.read">
                                    <span style="width: 25px;height: 25px;"></span>
                                  </label>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="agregarTipoCliente" class="form-control" v-model="form.rolesTipoClientes" value="tipoclientes.create">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                 <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="editarTipoCliente" class="form-control" v-model="form.rolesTipoClientes" value="tipoclientes.edit">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="eliminarTipoCliente" class="form-control" v-model="form.rolesTipoClientes" value="tipoclientes.delete">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="todosTipoCliente" class="form-control" v-model="checkTipoClientesRoles">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                            </tr>
                          </tbody>
                         

                        </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Modulo : Estados
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                        <table class="table">
                          <thead>
                             <tr class="tbodyroles">
                              <th>Visualizar Modulo</th>
                              <th>Agregar</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                              <th>Todos</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="estados">
                              <td>
                                  <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="visualizarEstado" v-model="form.rolesEstados" value="estados.read">
                                    <span style="width: 25px;height: 25px;"></span>
                                  </label>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="agregarEstado" class="form-control" v-model="form.rolesEstados" value="estados.create">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                 <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="editarEstado" class="form-control" v-model="form.rolesEstados" value="estados.edit">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="eliminarEstado" class="form-control" v-model="form.rolesEstados" value="estados.delete">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="todosEstado" class="form-control" v-model="checkEstadoRoles">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                            </tr>
                          </tbody>
                         

                        </table>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Modulo : Centro Costo - Productos
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                        <table class="table">
                          <thead>
                             <tr class="tbodyroles">
                              <th>Visualizar Modulo</th>
                              <th>Agregar</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                              <th>Visualizar data completa</th>
                              <th>Todos</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="productos">
                              <td>
                                  <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" v-model="form.rolesProductos" value="productos.read">
                                    <span style="width: 25px;height: 25px;"></span>
                                  </label>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesProductos" value="productos.create">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                 <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesProductos" value="productos.edit">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesProductos" value="productos.delete">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                               <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesProductos" value="productos.visualizarall">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="todosEstado" class="form-control" v-model="checkProductosRoles">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                            </tr>
                          </tbody>
                         

                        </table>
                        </div>
                      </div>
                    </div>
                     <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Modulo : Centro Costo - Servicios
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                        <table class="table">
                          <thead>
                             <tr class="tbodyroles">
                              <th>Visualizar Modulo</th>
                              <th>Agregar</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                              <th>Visualizar data completa</th>
                              <th>Todos</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="servicios">
                              <td>
                                  <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" v-model="form.rolesServicios" value="servicios.read">
                                    <span style="width: 25px;height: 25px;"></span>
                                  </label>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesServicios" value="servicios.create">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                 <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesServicios" value="servicios.edit">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesServicios" value="servicios.delete">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                               <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" class="form-control" v-model="form.rolesServicios" value="servicios.visualizarall">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                              <td>
                                <label class="checkbox" style="justify-content:center">
                                    <input type="checkbox" name="todosEstado" class="form-control" v-model="checkServiciosRoles">
                                    <span style="width: 25px;height: 25px;"></span>
                                </label>
                              </td>
                            </tr>
                          </tbody>
                         

                        </table>
                        </div>
                      </div>
                    </div>

              {{form}}
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

export default {
  data() {
    return {
      sortingvalue : '',
      p: '',
      sorting : 'ascending',
      sort : true,
      search: '',
      paginate : 10,
      idUsuario: "",
      editMode: null,
      roles : {},
      usuarios: {},
      checkClientesRoles : '',
      checkTipoClientesRoles : '',
      checkEstadoRoles : '',
      checkServiciosRoles : '',
      checkProductosRoles: '',
      form: {
        name : '',
        rolesClientes: [],
        rolesTipoClientes: [],
        rolesEstados: [],
        rolesProductos: [],
        rolesServicios: [],
      },
      clientFormLoading: false,
      errors: {},
    };
  },
  mounted() {
    this.getRoles();

  },
   watch: {
    paginate: function () {
      this.getRoles();
    },
    search : function () {
      this.getUsuarios();
    },
    checkProductosRoles : function() {
        let productos  = $('#productos > td > label > input[type=checkbox]');
        productos.prop('checked', true);
        for(let i = 0; i < (productos.length - 1); i++ ){
          this.form.rolesProductos.push(productos[i].value);
        }
    },
    checkServiciosRoles : function() {
        let servicios  = $('#productos > td > label > input[type=checkbox]');
        servicios.prop('checked', true);
        for(let i = 0; i < (servicios.length - 1); i++ ){
          this.form.rolesServicios.push(servicios[i].value);
        }
    },
    checkClientesRoles : function () {
      let clientes  = $('#clientes > td > label > input[type=checkbox]');
      clientes.prop('checked', true);
      for(let i = 0; i < (clientes.length - 1); i++ ){
        this.form.rolesClientes.push(clientes[i].value);
      }
    },
    checkTipoClientesRoles : function () {
      let tipoclientes  = $('#tipoClientes > td > label > input[type=checkbox]');
      tipoclientes.prop('checked', true);
      for(let i = 0; i < (tipoclientes.length - 1); i++ ){
        this.form.rolesTipoClientes.push(tipoclientes[i].value);
      }
    },
    checkEstadoRoles : function () {
      let estados  = $('#estados > td > label > input[type=checkbox]');
      estados.prop('checked', true);
      for(let i = 0; i < (estados.length - 1); i++ ){
        this.form.rolesEstados.push(estados[i].value);
      }
    },
    
  },

  methods: {
    getRoles() {

      axios.get("/api/roles").then((response) => {
        this.roles = response.data;
        this.clientFormLoading = false;
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
      console.log(this.sort + " "+ table);
    },
    createModal() {
      $("#createModal").modal("show");
      this.editMode = true;
      this.resetForm();
    },
    updateModal(id) {
      this.editMode = false;
      $("#createModal").modal("show");
      this.getRole(id);
      this.idUsuario = id;
    },
    SendData() {
      if (this.editMode) {
        this.crearRole();
      } else {
        this.updateUsuario();
      }
    },
    getRole(id) {
      axios.get("/api/roles/" + id).then((response) => {
        this.form.name = response.data.roles[0].name;
        this.form.rolesClientes = response.data.rolesClientes;
        this.form.rolesTipoClientes = response.data.rolesTipoClientes;
        this.form.rolesEstados = response.data.rolesEstados;
        this.form.rolesProductos = response.data.rolesProductos;
        this.form.rolesServicios = response.data.rolesServicios;
      });
    },
    resetForm() {
      this.form.name = '';
      this.form.rolesClientes = [];
      this.form.rolesTipoClientes = [];
      this.form.rolesEstados = [];
    },
    delete_usuario(id, name) {
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
            .delete("/api/roles/" + id)
            .then((response) => {
              this.$swal({
                icon: "success",
                title: "Eliminado satisfactoriamente",
              });

              this.getRoles();
            })
            .catch((error) => {
              this.$swal({ icon: "danger", title: "Algo salio mal" });
            });
        }
      });
    },
    updateUsuario() {
      this.clientFormLoading = true;
      axios
        .put("/api/roles/" + this.idUsuario, this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          this.$swal({ icon: "success", title: "Rol Actualizado" });
          this.getRoles();
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
            this.form_submitting = false;
            this.$swal({ icon: "error", title: "Error de Actualizado" });
          }
          this.clientFormLoading = false;
        });
    },
    crearRole() {
      this.clientFormLoading = true;
      axios
        .post("/api/roles", this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          this.$swal({ icon: "success", title: "Rol Guardado" });
          this.getRoles();

        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
            this.form_submitting = false;
            this.$swal({ icon: "error", title: "Error de guardado" });
          }
          this.clientFormLoading = false;
        });
    },
  },
};
</script>
<style>
.contentPermisos {
  border: 0.5px solid #ccc;border-radius: 10px;
  padding: 10px;
  margin: 0px 11px 0px 11px;
  width: 100%!important;
}
.contentPermisos h3 {
  font-size: 1.2rem;
  font-weight: 400;
  margin: 10px 12px 15px;
}
.tbodyroles th{
  width: 20%!important;
  text-align: center;
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