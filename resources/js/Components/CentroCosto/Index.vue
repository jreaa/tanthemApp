<template>
    <div>
      <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
          <!--begin::Item-->
          <router-link
                  :to="{ name: 'centroCosto.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
            <i class="flaticon2-shelter"></i>
          </router-link>
          <!--end::Item-->
          <!--begin::Item-->
          <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
          <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Centro  Costos</a>
          <!--end::Item-->
      </div>
      <h3 class="mt-4">Tipo Centro de Costos</h3>
      <br />
      <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
          <div class="card-title">
            <h3 class="card-label">
              Datos de los centro de costos asociado
              <span class="d-block text-muted pt-2 font-size-sm"
                >A continuacion podra observar y gestionar cada uno de sus tipo de
                centro de costos</span
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
                >Agregar Centro de Costo
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
                  <div class="table-responsive">
                    <div
                      class="alert alert-custom alert-warning"
                      role="alert"
                       id="alerta"
                      v-if="centro_costos.data == ''"
                      style="height:50px!important; width: 35%;margin-right: auto!important;
      margin-left: auto!important;"
                      >
                      <div class="alert-icon"><i class="flaticon-warning"></i></div>
                      <div class="alert-text">
                          No hay centro de costoa registrados 
                      </div>
                      </div>
                  
                      <table
                       v-if="centro_costos.data != '' || registro"
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
                            
                            style="width: 218px;cursor:pointer"
                            >
                                <div style="display: flex;justify-content: space-between;">
                                    Proceso
                                </div>
                            </th>
                              <th
                              style="width: 150px;cursor:pointer"
                              @click="changeSort(p,'color')"
                              >
                              <div style="display: flex;justify-content: space-between;">
                                  Fondo
                                  <div>
                               
                                    <i v-if="sort && sortingvalue == 'color'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                    <i v-if="sort == false && sortingvalue == 'color'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                </div>
                              </div>
                              </th>
  
                              <th
                               style="width: 150px"
                              >
                              <div >
                                Letra
                                
                              </div>
                              </th>
                              <th
                              class="sorting_disabled"
                              rowspan="1"
                              colspan="1"
                              style="width: 111px"
                              aria-label="Actions"
                              >
                              Vista Previa
                              </th>
  
                              <th
                              class="sorting_disabled"
                              rowspan="1"
                              colspan="1"
                              style="width: 111px"
                              aria-label="Actions"
                              >
                              Descripcion
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
                            <tr v-if="registro == true">
                              <td><input v-bind:class="errors.name ? ' is-invalid' : ''"  :disabled="form.id == 1 ||
                                  form.id == 2 || form.id == 3"  type="text" v-model="form.name" class="form-control" placeholder="Ej: Activo"></td>
                              <td>
                                <select v-bind:class="errors.id_proceso ? ' is-invalid' : ''" class="form-control" 
                                  :disabled="form.id == 1 ||
                                  form.id == 2 || form.id == 3" 
                                  v-model="form.id_proceso">
                                    <option value="0" v-if="form.id_proceso == ''" selected>Proceso..</option>
                                    <option :value="proceso.name" v-for="proceso in procesos" :key="proceso.id">
                                    {{ proceso.name }}</option>
                                </select>
                              </td>
                              <td>
                                <input v-bind:class="errors.color ? ' is-invalid' : ''" type="color" v-model="form.color" class="form-control"  placeholder="#fff">
                              </td>
                              <td>
                                <input v-bind:class="errors.colorFont ? ' is-invalid' : ''" type="color" v-model="form.colorFont" class="form-control"  placeholder="#fff">
                              </td>
                              <td><span
                                  class="
                                  label label-lg
                                  font-weight-bold
                                  label-inline
                                  "
                                  :style="{ background : form.color, color : form.colorFont }"
                                  >{{form.name}}</span
                              >
                              </td>
                              <td><input v-bind:class="errors.description ? ' is-invalid' : ''" :disabled="form.id == 1 ||
                                  form.id == 2 || form.id == 3"  type="text" v-model="form.description" class="form-control" placeholder="Color verde"></td>
                              <td><button type="submit" class="btn btn-primary" :class="{
                                'spinner spinner-white spinner-right': clientFormLoading,
                              }" :disabled="clientFormLoading" @click="SendData">Guardar</button>
  
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
                        
  
                          <tr class="even" v-for="centro_costo in centro_costos.data" :key="centro_costo.id">
  
                              <td class="">
                              <a
                                    class="text-dark-50 text-hover-primary"
                                    
                                  >{{centro_costo.name}}</a
                              >
                              </td>
                              <td>
                                {{ centro_costo.id_proceso }}
                              </td>
                              <td><div  :style="{ background : centro_costo.color,margin : '0 0 0 10px', width :'30px', height : '30px',border: '1px solid #ccc', padding : '5px' }" ></div></td>
                              <td><div  :style="{ background : centro_costo.colorFont,margin : '0 0 0 10px', width :'30px', height : '30px',border: '1px solid #ccc', padding : '5px' }" ></div></td>
  
  
                              <td><span
                                  class="
                                  label label-lg
                                  font-weight-bold
                                   label-inline
                                  "
                                  :style="{ background : centro_costo.color, color : centro_costo.colorFont }"
                                  >{{centro_costo.name}}</span
                              >
                              </td>
                              <td class="text-dark-50 text-hover-primary">{{centro_costo.description}}</td>
  
                              <td nowrap="nowrap" style="">
                             <button
                      class="btn btn-sm btn-clean btn-icon"
                      @click="updateModal(centro_costo.id)"
                    >
                                
                                  <i class="la la-edit"></i>
                              </button>
                               <button v-if="centro_costo.id >=4"
                      @click="delete_cliente(centro_costo.id, centro_costo.name, centro_costo.id_proceso)"
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
                 Tabla Tipo Centro Costos
                </div>
              </div>
              <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
                <div
                  class="dataTables_paginate paging_simple_numbers"
                  id="kt_datatable_paginate"
                >
                  <pagination
                  :data="centro_costos"
                  class="pagination"
                  @pagination-change-page="getcentro_costos"
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
  let usuario = document.head.querySelector('meta[name="user"]');
  let user = JSON.parse(usuario.content);
  export default {
    data() {
      return {
        sortingvalue : '',
        p: '',
        registro : false,
        sorting : 'ascending',
        procesos: [],
        sort : true,
        search: '',
        paginate : 10,
        idCliente: "",
        editMode: null,
        centro_costos: {},
        form: {
          id: "",
          name: "",
          description : "",
          color: "",
          colorFont : '',
        },
        clientFormLoading: false,
        errors: {},
      };
    },
    mounted() {
      this.getcentro_costos();
      this.getProcesos();
    },
    watch: {
      paginate: function () {
        this.getcentro_costos();
      },
      search : function () {
        this.getcentro_costos();
      }
    },
  
    methods: {
        getProcesos() {
            axios.get('/api/getProcesos?id_proyecto=1')
                .then(response => {
                    this.procesos = response.data.procesos;
                }) 
                .catch(e => console.error(e))
        },
      getcentro_costos(page = 1,table = "name") {
        this.clientFormLoading = true;
        let sort = '';
        this.p = page;
        if(this.sort){
          sort = 'asc';
        }else{
          sort = 'desc';
        }
        axios.get("/api/centro_costos?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table).then((response) => {
          this.centro_costos = response.data;
          console.log(response.data.data);
          this.clientFormLoading = false;
        });
      },
      createModal() {
        //$("#createModal").modal("show");
        this.registro = true;
        this.editMode = true;
        this.resetForm();
      },
      updateModal(id) {
        this.registro = true;
        this.editMode = false;
        //$("#createModal").modal("show");
        this.getCliente(id);
        this.idCliente = id;
      },
      SendData() {
        if (this.editMode) {
          this.crearcentro_costos();
        } else {
          this.updatecentro_costos();
        }
      },
      getCliente(id) {
        axios.get("/api/centro_costos/" + id).then((response) => {
          this.form = response.data.data;
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
         this.getcentro_costos(p,table);
          console.log(this.sort + " "+ table);
      },
      resetForm() {
        this.form.id = "";
        this.form.color = "";
        this.form.name = "";
        this.form.description = "";
      },
      delete_cliente(id, name, proceso) {
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
              .delete("/api/centro_costos/" + id+"?id_usuario="+user.id+"&proceso="+proceso)
              .then((response) => {
                toastr.success('Eliminado satisfactoriamente');
  
                this.getcentro_costos();
              })
              .catch((error) => {
                //this.$swal({ icon: "danger", title: "Algo salio mal" });
                toastr.success('Algo salio mal');
              });
          }
        });
      },
      updatecentro_costos() {
        this.clientFormLoading = true;
        this.form.id_usuario = user.id;
        console.log(this.form.id_usuario)
        console.log(user.id)
        axios
          .put("/api/centro_costos/" + this.idCliente+"?id_usuario="+user.id, this.form)
          .then((response) => {
            $("#createModal").modal("hide");
            this.clientFormLoading = false;
            this.registro = false;
  
            //this.$toastr.s("SUCCESS MESSAGE", "Success Toast Title");
  
            //this.$swal({ icon: "success", title: "centro_costos Actualizado" });
            toastr.success('centro_costos Actualizado');
            this.getcentro_costos();
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
      crearcentro_costos() {
        this.clientFormLoading = true;
        axios
          .post("/api/centro_costos"+"?id_usuario="+user.id, this.form)
          .then((response) => {
            $("#createModal").modal("hide");
            this.clientFormLoading = false;
             this.registro = false;
            //this.$swal({ icon: "success", title: "centro_costos Guardado" });
            toastr.success('centro_costos Guardado');
            this.getcentro_costos();
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