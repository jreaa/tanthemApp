<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'usuarios.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Usuarios</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Usuarios</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Contenedor de usuarios registrado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus usuarios</span
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
              >Agregar Tipo de Cliente
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
                        No hay usuarios registrados 
                    </div>
                    </div>
                
                    <table
                    v-if="usuarios.data != ''"
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
                              Nombre
                                <div>
                             
                                  <i v-if="sort && sortingvalue == 'name'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'name'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                            </div>
                            </th>
                            <th
                          
                            style="width: 198px;cursor:pointer"
                         
                            @click="changeSort(p,'email')"
                            >
                            <div style="display: flex;justify-content: space-between;">
                              Email
                                <div>
                             
                                  <i v-if="sort && sortingvalue == 'email'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'email'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
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

                        <tr class="even" v-for="usuario in usuarios.data" :key="usuario.id">

                            <td class="">
                            <a
                                class="text-dark-50 text-hover-primary"
                                href="mailto:kbrainsby1c@hibu.com"
                                >{{usuario.name }}</a
                            >
                            </td>
                            <td>{{usuario.email}}</td>
                        
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
                    @click="updateModal(usuario.id)"
                  >
                              
                                <i class="la la-edit"></i>
                            </button>
                             <button
                    @click="delete_usuario(usuario.id, usuario.name)"
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
               Tabla Usuarios
              </div>
            </div>
            <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
              <div
                class="dataTables_paginate paging_simple_numbers"
                id="kt_datatable_paginate"
              >
                <pagination
                :data="usuarios"
                @pagination-change-page="getUsuarios"
                class="pagination"
            
                ></pagination>
              </div>
            </div>
          </div>
        </div>
        <!--end: Datatable-->

        <pagination
          :data="usuarios"
          @pagination-change-page="getUsuarios"
        ></pagination>
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
              <div class="form-group col-md-12">
                <label for="email">Email *</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="example@mail.com"
                  v-model="form.email"
                  v-bind:class="errors.email ? ' is-invalid' : ''"
                />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.email"
                >
                  {{ errors.email[0] }}
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="passord">Contraseña *</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="********"
                  v-model="form.password"
                  v-bind:class="errors.password ? ' is-invalid' : ''"
                />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.password"
                >
                  {{ errors.password[0] }}
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="passord">Verificar Contraseña*</label>
                <input
                  type="password"
                  class="form-control"
                  placeholder="********"
                  v-model="form.password_confirm"
                  v-bind:class="errors.password_confirm ? ' is-invalid' : ''"
                />
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.password_confirm"
                >
                  {{ errors.password_confirm[0] }}
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
      usuarios: {},
      form: {
        name: "",
        email: "",
        password: "",
        password_confirm: "",
      },
      clientFormLoading: false,
      errors: {},
    };
  },
  mounted() {
    this.getUsuarios();

  },
   watch: {
    paginate: function () {
      this.getUsuarios();
    },
    search : function () {
      this.getUsuarios();
    }
  },

  methods: {
    
    getUsuarios(page = 1,table = "name") {
      this.clientFormLoading = true;
      let sort = '';
      this.p = page;
      if(this.sort){
        sort = 'asc';
      }else{
        sort = 'desc';
      }
      axios.get("/api/usuarios?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table).then((response) => {
        this.usuarios = response.data;
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
      this.getUsuarios(p,table);
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
      this.getUsuario(id);
      this.idUsuario = id;
    },
    SendData() {
      if (this.editMode) {
        if(this.form.password != '' && this.form.password != this.form.password_confirm){
           this.$swal({ icon: "danger", title: "Las contraseñas son incorrecta" });
        }else{
          this.crearUsuario();
        }
        
      } else {
        if(this.form.password != '' && this.form.password != this.form.password_confirm){
           this.$swal({ icon: "danger", title: "Las contraseñas son incorrecta" });
        }else{
          this.updateUsuario();
        }
        
      }
    },
    getUsuario(id) {
      axios.get("/api/usuarios/" + id).then((response) => {
        this.form = response.data.data;
      });
    },
    resetForm() {
      this.form.description = "";
      this.form.name = "";
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
            .delete("/api/usuarios/" + id)
            .then((response) => {
              /*
              this.$swal({
                icon: "success",
                title: "Eliminado satisfactoriamente",
              });*/
              toastr.success('Eliminado satisfactoriamente');

              this.getUsuarios();
            })
            .catch((error) => {
              toastr.error('Algo salio mal');
              //this.$swal({ icon: "danger", title: "Algo salio mal" });
            });
        }
      });
    },
    updateUsuario() {
      this.clientFormLoading = true;
      axios
        .put("/api/usuarios/" + this.idUsuario, this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          //this.$swal({ icon: "success", title: "Usuario Actualizado" });
          toastr.success('Usuario Actualizado');
          this.getUsuarios();
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
            this.form_submitting = false;
            //this.$swal({ icon: "error", title: "Error de Actualizado" });
            toastr.error('Error de Actualizado');
          }
          this.clientFormLoading = false;
        });
    },
    crearUsuario() {
      this.clientFormLoading = true;
      axios
        .post("/api/usuarios", this.form)
        .then((response) => {
          $("#createModal").modal("hide");
          this.clientFormLoading = false;
          //this.$swal({ icon: "success", title: "Usuario Guardado" });
          toastr.success('Usuario Guardado');
          this.getUsuarios();
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
            this.form_submitting = false;
            //this.$swal({ icon: "error", title: "Error de guardado" });
            toastr.error('Error de guardado');
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