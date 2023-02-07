<template>
<div>
    <div>
        <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
            <!--begin::Item-->
            <router-link
                    :to="{ name: 'proyectos.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
            <i class="flaticon2-shelter"></i>
            </router-link>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Trabajadores</a>
            <!--end::Item-->
        </div>
    </div>
    <h3 class="mt-4">Trabajadores</h3>
    <br />
    
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los trabajadores Asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus tipo de
              trabajadores</span
            >
          </h3>
        </div>
        <div class="card-toolbar">
          <!--begin::Dropdown-->
          <div class="dropdown dropdown-inline mr-2">
            <button
              type="button"
              @click="createModal()"
              class="btn btn-light-primary font-weight-bolder btn-sm"
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
              >Agregar Trabajadores
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
                    v-if="proyectos.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay trabajadores registrados 
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
                            style="width: 150px;cursor:pointer"
                            @click="changeSort(p,'description')"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Rut
                                <div>
                             
                                  <i v-if="sort && sortingvalue == 'description'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'description'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                            </div>
                            </th>

                             <th
                             style="width: 150px"
                            >
                            <div >
                              Email
                              
                            </div>
                            </th>


                            <th
                             style="width: 150px"
                            >
                            <div >
                              Telefono
                            </div>
                            </th>

                            <th
                            class="sorting_disabled ml-3"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            >
                            Direccion
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

                            <td>{{proyecto.name}}</td>

                            <td>{{proyecto.rut}}</td>

                            <td>{{proyecto.email}}</td>

                            <td>{{proyecto.phone}}</td>
                            <td v-bind:title="proyecto.direccion">
                              <div v-if="proyecto.direccion.length<8">{{proyecto.direccion}}</div>
                              <div v-else> {{ proyecto.direccion.substring(0,8)+".." }}</div>
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
              {{ editMode ? "Agregar" : "Editar"  }} trabajador
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
                    <label>Nombre Trabajador</label>
                    <input style="width:100%!important" v-bind:class="errors.name ? ' is-invalid' : ''" type="text" v-model="form.name" class="form-control" placeholder="Ej: Jose">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input style="width:100%!important" v-bind:class="errors.email ? ' is-invalid' : ''" type="email" v-model="form.email" class="form-control" placeholder="Ej: example@example.com">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Rut</label>
                    <input v-model="rut" class="form-control" name="rut" ref="rut" id="rut" type="text" @blur="validateRut"
                  placeholder="12.345.678-0" :class="!error ? ' is-invalid' : ''">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Telefono</label>
                  <input style="width:100%!important" v-bind:class="errors.phone ? ' is-invalid' : ''" type="text" v-model="form.phone" class="form-control" placeholder="Ej: +5699999999">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label>Direccion</label>
                  <input type="text" v-bind:class="errors.direccion ? ' is-invalid' : ''" v-model="form.direccion" style="width:100%!important" class="form-control" placeholder="Santiago, Chile">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fecha Nacimiento</label>
                    <input style="width:100%!important" v-bind:class="errors.fecha_nacimiento ? ' is-invalid' : ''" type="date" v-model="form.fecha_nacimiento" class="form-control">
                  </div>
                </div>
                
              </div>
          </div>

          <div class="modal-footer d-flex">
                <button type="submit" class="btn btn-primary" :class="{
                  'spinner spinner-white spinner-right': clientFormLoading,
                }" :disabled="clientFormLoading" @click="SendData">Enviar</button>

          </div>
        </div>
      </form>
    </div>
    <!--endModal-->

        <pagination
          :data="proyectos"
          @pagination-change-page="getProyectos"
        ></pagination>
      </div>
    </div>
</div>

</template>


<script>
export default {
    data() {
        return {
        rut: '',
        error:true,
        clienteId: '',
        cliente : {},
        user : document.head.querySelector('meta[name="user"]'),
        sortingvalue : '',
        p: '',
        registro : false,
        sorting : 'ascending',
        sort : true,
        search: '',
        paginate : 10,
        idCliente: "",
        editMode: null,
        trabajadores : {},
        proyectos: {},
        estados : {},
        clientes: {},
        form: {
            'name': '',
            'email' : '',
            'rut' : '',
            'phone' : '',
            'direccion' : '',
            'fecha_nacimiento' : '',
        },
        costos : '',
        ingresos : '',
        pagos: '',
        clientFormLoading: false,
        errors: {},
        };
    },
    mounted() {
        this.getProyectos();
    },
    watch: {    
      rut: function (val) {
          this.rut = this.cleanRut(this.rut);
          let len = this.rut.length - 1;
          if (len > 3) {
              let dv = this.rut[len];
              let beforeDv = this.rut.substring(0, len).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
              this.rut = beforeDv + '-' + dv;
          }
      },
        paginate: function () {
            this.getProyectos();
        },
        search : function () {
            this.getProyectos();
        },
        clienteId : function (){
          this.form.cliente = this.clienteId
          this.getClientesData()
        }
    },
    methods : {
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
        getHoraFecha(string) {
            //fecha
            let fecha = string.split("-")

            let fech = fecha[0].substr(2)

            fecha[0] = fech;

            fecha = ((fecha.reverse()).join()).replace(",", "/").replace(",","/");

            //endfecha
            return fecha;

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
            this.form.email = "";
            this.form.rut = "";
            this.form.phone = "";
            this.form.direccion = "";
            this.form.fecha_nacimiento = "";
            this.rut = "";
            this.error = true;
        },
        createModal() {
            $("#modalPryecto").modal('show');
            this.editMode = true;
            this.resetForm();
        },
        updateModal(id) {
            $("#modalPryecto").modal('show');
            this.editMode = false;
            this.getProyecto(id);
        },
        SendData() {
            this.form.rut = this.rut
            if (this.editMode) {
                this.crearProyecto();
            }else{
                this.updateProyecto();
            }
        },
        getProyectos(page = 1,table = "name") {
            let sort = '';
            this.p = page;
            if(this.sort){
                sort = 'asc';
            }else{
                sort = 'desc';
            }
            axios.get("/api/trabajadores?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table)
            .then((response) => {
                this.proyectos = response.data;
                console.log(this.proyectos)
            });
        },
        getProyecto(id) {
            axios.get("/api/trabajadores/" + id).then((response) => {
                this.form = response.data[0];
                this.rut = response.data[0].rut
                this.idCliente = id
                console.log(response)
            });
        },
        crearProyecto() {
            this.clientFormLoading = true;
            axios
            .post("/api/trabajadores", this.form)
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
            axios
                .put("/api/trabajadores/" + this.idCliente, this.form)
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
                    .delete("/api/trabajadores/" + id)
                    .then((response) => {
                    toastr.success('Se ha eliminado correctamente');

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