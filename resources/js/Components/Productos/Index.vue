<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'productos.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Productos</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Productos</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los Productos Asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus productos</span
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
              >Agregar Productos
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
                    v-if="clientes.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay productos registrados 
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

                            style="width: 218px;cursor:pointer"
                    
                            @click="changeSort(p,'name')"
                            >
                            <div style="display: flex;justify-content: space-between;">
                              Codigo SKU
                                <div>                             
                                <i v-if="sort && sortingvalue == 'name'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                <i v-if="sort == false && sortingvalue == 'name'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                </div>
                            </div>
                            </th>

                            <th
                            style="width: 218px;cursor:pointer"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Estados
                            </div>
                            
                            </th>

                            <th
                            style="width: 218px;cursor:pointer"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Precio
                            </div>
                            
                            </th>
                            <th
                            style="width: 218px;cursor:pointer"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Stock
                            </div>
                            
                            </th>
                            <th
                            style="width: 218px;cursor:pointer"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                UN
                            </div>
                            </th>
                                                        <th
                            style="width: 218px;cursor:pointer"
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

                            <td class="">
                            <a
                                class="text-dark-50 text-hover-primary"
                                href="mailto:kbrainsby1c@hibu.com"
                                >{{cliente.cod}}</a
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

                            <td class="text-dark-50 text-hover-primary">{{cliente.precio}}</td>
                            <td class="text-dark-50 text-hover-primary">{{cliente.stock}}</td>
                            <td class="text-dark-50 text-hover-primary">{{cliente.uf}}</td>
                            <td class="text-dark-50 text-hover-primary"  v-bind:title="cliente.description">
                              <popper
                                style="margin-left: 32px;"
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
                            <td nowrap="nowrap" style="">
                            <button
                                class="btn btn-sm btn-clean btn-icon"
                                @click="updateModal(cliente.id)"
                              >
                              
                                <i class="la la-edit"></i>
                            </button>
                            <button
                                  @click="delete_cliente(cliente.id, cliente.cod)"
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
                Tabla Productos
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
        <!--end: Datatable-->

        <pagination
          :data="clientes"
          @pagination-change-page="getClientes"
        ></pagination>
      </div>
    </div>

    <!--Modal-->
    <div class="modal" tabindex="-1" id="createModal">
      <form class="modal-dialog modal-lg" @submit.prevent="SendData">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ editMode ? "Agregar" : "Editar" }} Productos
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
            <div>
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group col-md-12">
                        <label for="rut">Codigo SKU * </label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="00001"
                          v-model="form.cod"
                          v-bind:class="errors.cod ? ' is-invalid' : ''"
                        />
                        <div
                          style="display: block !important"
                          class="invalid-feedback"
                          v-if="errors.cod"
                        >
                          {{ errors.cod[0] }}
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group col-md-12">
                            <label for="name">Estado *</label>
                              <select
                                name="estado"
                                id="estado"
                                class="form-control"
                                v-model="form.estado"
                  
                                v-bind:class="errors.estado ? ' is-invalid' : '' "
                              >
                                <option value="" v-if="form.estado == ''" selected>Estado...</option>
                                <option v-for="estado in estados.data" :key="estado.id" :value="estado.id">
                                    {{ estado.name }}
                                </option>
                              </select>
                              <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.estado">
                                {{ errors.estado[0] }}
                              </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group col-md-12">
                            <label for="name">Tipo *</label>
                              <select
                                name="estado"
                                id="estado"
                                class="form-control"
                                v-model="form.tipo"
                  
                                v-bind:class="errors.tipo ? ' is-invalid' : '' "
                              >
                                <option value="" v-if="form.tipo == ''" selected>Tipo...</option>
                                <option value="1">
                                    Producto
                                </option>
                                <option value="2">
                                    Servicio
                                </option>
                              </select>
                              <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.estado">
                                {{ errors.tipo[0] }}
                              </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group col-md-12">
                      <label for="email">Stock *</label>
                      <input
                        type="number"
                        class="form-control"
                        v-model="form.stock"
                        v-bind:class="errors.stock ? ' is-invalid' : ''"
                      />
                    
                      <div
                        style="display: block !important"
                        class="invalid-feedback"
                        v-if="errors.stock"
                      >
                        {{ errors.stock[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group col-md-12">
                      <label for="email">Precio *</label>
                      <input
                        type="text"
                        class="form-control"
                        v-model="precioProducto"
                        v-bind:class="errors.precio ? ' is-invalid' : ''"
                      />
                      <div
                        style="display: block !important"
                        class="invalid-feedback"
                        v-if="errors.precio"
                      >
                        {{ errors.precio[0] }}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group col-md-12">
                      <label for="uf">UN </label>
                      <select
                        type="text"
                        class="form-control"
                        v-model="form.uf"
                        v-bind:class="errors.uf ? ' is-invalid' : ''"
                      >
                        <option value="pesos">Pesos Chilenos</option>
                        <option value="dolar">Dolar Americano</option>
                        <option value="euros">Euros</option>
                      </select>
                    
                      <div
                        style="display: block !important"
                        class="invalid-feedback"
                        v-if="errors.uf"
                      >
                        {{ errors.uf[0] }}
                      </div>
                    </div>
                  </div>
                </div>

              <div class="form-group col-md-12">
                <label for="email">Descripcion</label>
                <textarea
                  rows="5"
                  cols="20"
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
              <hr>
              <div class="form-group col-md-12">
                <label for="email">Comentarios Internos</label>
                <textarea
                  rows="5"
                  cols="20"
                  type="text"
                  id="email"
                  class="form-control "
                  placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non leo leo. Cras eget leo at purus imperdiet cursus. Aenean eget urna nec urna viverra laoreet..."
                  v-model="form.comentarios"
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
    <!--endModal-->
  </div>
</template>

<script>
let usuario = document.head.querySelector('meta[name="user"]');
let user = JSON.parse(usuario.content);
import Popper from 'vue-popperjs';
export default {
  components: {
        'popper': Popper
    },
  data() {
    return {
      estados: {},
      precioProducto: '',
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
        cod: "",
        description: "",
        precio: "",
        stock: "",
        uf: "",
        comentarios: "",
        tipo: ""
      },
      clientFormLoading: false,
      errors: {},
    };
  },
  created() {
    this.getClientes();
    this.getEstados();
  },
  watch: {
    paginate: function () {
      this.getClientes();
    },
    search : function () {
      this.getClientes();
    },
    precioProducto : function(num){
        let str = num.toString().split(".");
        if(str.length > 1 && str.length <= 2){
          str[0] = str[0] + str[1]
        }else if(str.length > 2 && str.length <= 3){
          str[0] = str[0] + str[1] + str[2]
        }else if(str.length > 3){
          str[0] = str[0] + str[1] + str[2] + str[3]
        }
        
        str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        
        this.precioProducto = str[0]
        this.form.precio = str[0]
    }
  },
  computed: {

  },

  methods: {
    getClientes(page = 1,table = "cod") {
      this.clientFormLoading = true;
      let sort = '';
      this.p = page;
      if(this.sort){
        sort = 'asc';
      }else{
        sort = 'desc';
      }
      axios.get("/api/productos?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table).then((response) => {
        this.clientes = response.data;
        console.log(response.data.data);
        this.clientFormLoading = false;
      });
    },
    getEstados() {
      axios.get("/api/estados-productos?").then((response) => {
        this.estados = response.data;
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
      axios.get("/api/productos/" + id).then((response) => {
        this.form = response.data.data;
        this.precioProducto = response.data.data.precio
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
      this.form.description = "";
      this.form.name = "";
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
            .delete("/api/productos/" + id+"?id_usuario="+user.id)
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
      axios
        .put("/api/productos/" + this.idCliente+"?id_usuario="+user.id, this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          toastr.success('Producto Actualizado');
          //this.$swal({ icon: "success", title: "Tipo de Cliente Actualizado" });
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
    crearCliente() {
      this.clientFormLoading = true;
      axios
        .post("/api/productos"+"?id_usuario="+user.id, this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          //this.$swal({ icon: "success", title: "Tipo de Cliente Guardado" });
          toastr.success('Producto Guardado');
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