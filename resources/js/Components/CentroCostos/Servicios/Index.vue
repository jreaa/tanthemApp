<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'servicios.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Productos y Servicios</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Productos y Servicios</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los productos y servicios asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus tipo de
              productos y servicios</span
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
              >Agregar Producto/Servicio
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
                    v-if="servicios.data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay productos o servicios registrados 
                    </div>
                    </div>
                
                    <table
                     v-if="servicios.data != ''"
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
  
                            @click="changeSort(p,'servicios')"
                            >
                             <div style="display: flex;justify-content: space-between;">
                             Nombre
                              <div>
                                  <i v-if="sort && sortingvalue == 'servicios'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'servicios'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                              </div>
                            </th>

                            <th
                            style="width: 150px;cursor:pointer"
                            @click="changeSort(p,'carac')"
                            >
                            <div style="display: flex;justify-content: space-between;">
                                Carac
                                <div>
                             
                                  <i v-if="sort && sortingvalue == 'carac'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                  <i v-if="sort == false && sortingvalue == 'carac'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                              </div>
                            </div>
                            </th>

                            <th
                            >
                            <div >
                              Costo
                              
                            </div>
                            </th>

                            <th>
                            <div >
                              Tipo
                              
                            </div>
                            </th>

                            <th
                            class="sorting_disabled ml-3"
                            rowspan="1"
                            colspan="1"
                            style="width: 125px"
                            aria-label="Actions"
                            >
                            Precio Venta
                         
                            <i class="flaticon-plus text-primary" style="cursor:pointer" v-if="formN.n0 && formN.n1 == false" @click="checkNvalues('n1')"></i>
                            </th>
                            
                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            v-if="formN.n1"
                            >
                            <div style="display:flex">
                            <i class="flaticon-cancel text-primary" style="cursor:pointer" v-if="formN.n1 && formN.n2 == false && formN.n3 == false && formN.n4 == false" @click="unCheckNvalues('n1')"></i>
                            <input type="text" v-model="formN.n1Value" class="btnValue">
                            <i class="flaticon-plus text-primary" style="cursor:pointer" v-if="formN.n1 && formN.n2 == false" @click="checkNvalues('n2')"></i>
                            </div>

                            </th>
                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            v-if="formN.n2"
                            >
                            <div style="display:flex">
                            <i class="flaticon-cancel text-primary" style="cursor:pointer" v-if="formN.n1 && formN.n2 && formN.n3 == false && formN.n4 == false" @click="unCheckNvalues('n2')"></i>
                            <input type="text" v-model="formN.n2Value" class="btnValue">
                            <i class="flaticon-plus text-primary" style="cursor:pointer" v-if="formN.n2 && formN.n3 == false" @click="checkNvalues('n3')"></i>
                            </div>
                            </th>
                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            v-if="formN.n3"
                            >
                            <div style="display:flex">
                            <i class="flaticon-cancel text-primary" style="cursor:pointer" v-if="formN.n1 && formN.n2 && formN.n3 && formN.n4 == false" @click="unCheckNvalues('n3')"></i>
                            
                            <input type="text" v-model="formN.n3Value" class="btnValue">
                            <i class="flaticon-plus text-primary" style="cursor:pointer" v-if="formN.n3 && formN.n4 == false" @click="checkNvalues('n4')"></i>
                            </div>
                            </th>
                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            v-if="formN.n4"
                            >
                            <div style="display:flex">
                            <i class="flaticon-cancel text-primary" style="cursor:pointer" v-if="formN.n1 && formN.n2 && formN.n3 && formN.n4" @click="unCheckNvalues('n4')"></i>
                            <input type="text" v-model="formN.n4Value" class="btnValue">
                            </div>
                            </th>
                            <th
                            class="sorting_disabled"
                            rowspan="1"
                            colspan="1"
                            style="width: 111px"
                            aria-label="Actions"
                            v-if="btnEstructura"
                            >
                            <button class="btn btn-primary btn-sm" @click="saveEstructura()" >
                                Guardar
                            </button>
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
                            <td><input v-bind:class="errors.servicios ? ' is-invalid' : ''" type="text" v-model="form.servicios" class="form-control" placeholder="Ej: Producto A"></td>
                            <td><input v-bind:class="errors.carac ? ' is-invalid' : ''" type="text" v-model="form.carac" class="form-control" placeholder="Ej: Producto tipo A"></td>
                            <td><input v-bind:class="errors.costo ? ' is-invalid' : ''" type="text" v-model="form.costo" class="form-control" placeholder="Ej: 100"></td>
                            <td>
                              <select v-model="form.tipo" class="form-control">
                                <option value="servicio">Servicio</option>
                                <option value="producto">Producto</option>
                              </select>
                            </td>
                            <td><input v-bind:class="errors.pv ? ' is-invalid' : ''" type="text" v-model="form.pv" class="form-control" placeholder="Ej: 200"></td>

                            <td v-if="formN.n1"><input v-bind:class="errors.n1 ? ' is-invalid' : ''" type="text" v-model="form.n1" class="form-control" placeholder="Ej: N1"></td>
                            <td v-if="formN.n2"><input v-bind:class="errors.n2 ? ' is-invalid' : ''" type="text" v-model="form.n2" class="form-control" placeholder="Ej: N2"></td>
                            <td v-if="formN.n3"><input v-bind:class="errors.n3 ? ' is-invalid' : ''" type="text" v-model="form.n3" class="form-control" placeholder="Ej: N3"></td>
                            <td v-if="formN.n4"><input v-bind:class="errors.n4 ? ' is-invalid' : ''" type="text" v-model="form.n4" class="form-control" placeholder="Ej: N4"></td>
                            
                            <td><button type="submit" class="btn btn-primary" :class="{
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
                      

                        <tr class="even" v-for="servicio in servicios.data" :key="servicio.id">

                            <td class="">
                            <a
                                class="text-dark-50 text-hover-primary"
                                
                                >{{servicio.servicios}}</a
                            >
                            </td>
                            <td>{{servicio.carac}}</td>
                            <td>{{servicio.costo}}</td>
                            <td>{{servicio.tipo}}</td>
                            <td>{{separator(parseFloat(servicio.pv))}} $</td>
                            <td v-if="formN.n1" class="td-n">{{servicio.n1}}</td>
                            <td v-if="formN.n2" class="td-n">{{servicio.n2}}</td>
                            <td v-if="formN.n3" class="td-n">{{servicio.n3}}</td>
                            <td v-if="formN.n4" class="td-n">{{servicio.n4}}</td>
                            <td v-if="btnEstructura" class="td-n">&nbsp;</td>
                            <td nowrap="nowrap" style="">
             
                            <button class="btn btn-sm btn-clean btn-icon"  @click="updateModal(servicio.id)">
                                    <i class="la la-edit"></i>
                            </button>
                            <button @click="delete_servicio(servicio.id, servicio.name)"  class="btn btn-sm btn-clean btn-icon">
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
               Tabla Productos y Servicios
              </div>
            </div>
            <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
              <div
                class="dataTables_paginate paging_simple_numbers"
                id="kt_datatable_paginate"
              >
                <pagination
                :data="servicios"
                class="pagination"
                @pagination-change-page="getServicios"
                ></pagination>
              </div>
            </div>
          </div>
        </div>
        <!--end: Datatable-->

        <pagination
          :data="servicios"
          @pagination-change-page="getServicios"
        ></pagination>
      </div>
    </div>

    
  </div>
</template>

<script>
export default {
  data() {
    return {
      serviciosCreate : false,
      serviciosEdit : false,
      serviciosDelete : false,
      serviciosData : false,
      btnEstructura : false,
      formN : {
        n1Value: 'n1',
        n2Value: 'n2',
        n3Value: 'n3',
        n4Value: 'n4',
        n0 : true,
        n1 : false,
        n2 : false,
        n3 : false,
        n4 : false,
        table : 'servicios',
      },

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
      servicios: {},
      form: {
        servicios: "",
        pv : "",
        carac: "",
        colorFont : '',
        costo : '',
        n1 : '',
        n2 : '',
        n3 : '',
        n4 : '',
        id_usuario : '',
      },
      clientFormLoading: false,
      errors: {},
    };
  },
  mounted() {
    //this.getPermissions();
    this.getServicios();
  },
   watch: {
    paginate: function () {
      this.getServicios();
    },
    search : function () {
      this.getServicios();
    }
  },

  methods: {
     getPermissions(){
        let userParse = JSON.parse(this.user.content);
        
        axios.get("http://localhost:8000/api/getAllPermissions?id="+userParse.role)
        .then(response => {
            let data =  response.data;
            let array = [];
            data.forEach(element => {
                let json = {
                    element
                }
                array.push(json);
            });
            console.log(array);
            this.checkPermisos(array);
        })
        .catch(error => console.log(error))
    },
          separator(numb) {
          var str = numb.toString().split(".");
          str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          return str.join(".");
      },
        bringEstructura(){
        axios.get("/api/statusN?table=servicios").then(response => {
            this.formN = response.data.data[0]
        }).catch(error => console.error(error));
    },
    saveEstructura(){ 
        this.btnEstructura = false;
        axios.post("/api/statusN", this.formN).then(response => {
            console.log("exito");
            this.bringEstructura();
        }).catch(error => console.error(error));
    },
    checkPermisos(array){
        for(let i = 0; i < array.length; i++){
            if(array[i].element == "servicios.create"){
                this.serviciosCreate = true;
            }
            if(array[i].element == "servicios.edit"){
                this.serviciosEdit = true;
            }
            if(array[i].element == "servicios.delete"){
                this.serviciosDelete = true;
            }
            if(array[i].element == "servicios.visualizarall"){
                this.serviciosData = true;
            }
            
            
        }
    },
        checkPermisos(array){
        for(let i = 0; i < array.length; i++){
            if(array[i].element == "estados.create"){
                this.estadosCreate = true;
            }
            if(array[i].element == "estados.edit"){
                this.estadosEdit = true;
            }
            if(array[i].element == "estados.delete"){
                this.estadosDelete = true;
            }
            
        }
      this.getServicios();
      this.bringEstructura();
    },
    checkNvalues(n){
        this.btnEstructura = true;
        if(n === 'n0'){
            this.formN.n0 = true;
        }else if(n === 'n1'){
            this.formN.n1 = true;
        }else if(n == 'n2'){
            this.formN.n2 = true;
        }else if(n == 'n3'){
            this.formN.n3 = true;
        }else if(n == 'n4'){
            this.formN.n4 = true;
        }
    },
    unCheckNvalues(n){
        this.btnEstructura = true;
        if(n === 'n0'){
            this.formN.n0 = true;
        }else if(n === 'n1'){
            this.formN.n0 = true;
            this.formN.n1 = false;
        }else if(n == 'n2'){
            this.formN.n1 = true;
            this.formN.n2 = false;
        }else if(n == 'n3'){
            this.formN.n2 = true;
            this.formN.n3 = false;
        }else if(n == 'n4'){
            this.formN.n3 = true;
            this.formN.n4 = false;
        }
    },
    getServicios(page = 1,table = "servicios") {
      this.clientFormLoading = true;
      let sort = '';
      let userParse = JSON.parse(this.user.content);
      this.p = page;
      if(this.sort){
        sort = 'asc';
      }else{
        sort = 'desc';
      }
      axios.get("/api/servicios?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table + "&full=" + this.serviciosData + "&user_id=" + userParse.id).then((response) => {
        this.servicios = response.data;
        console.log(response.data.data);
        this.clientFormLoading = false;
      });
    },
    getServicio(id) {
        axios.get("/api/servicios/" + id).then((response) => {
            this.form = response.data.data;
        });
    },
    resetForm() {
      this.form.servicios = "";
      this.form.pv = "";
      this.form.costo = "";
      this.form.carac = "";
      this.form.n1 = "";
      this.form.n2 = "";
      this.form.n3 = "";
      this.form.n4 = "";
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
      this.getServicio(id);
      this.idCliente = id;
    },
    SendData() {
        if (this.editMode) {
            this.crearServicio();
        }else{
            this.updateServicio();
        }
    },
    crearServicio() {
        this.clientFormLoading = true;
        let userParse = JSON.parse(this.user.content);
        this.form.id_usuario = userParse.id;
        axios
        .post("/api/servicios", this.form)
        .then((response) => {
            this.clientFormLoading = false;
            this.registro = false;
            this.$swal({ icon: "success", title: "Servicio Guardado" });
            this.getServicios();
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
    updateServicio() {
        this.clientFormLoading = true;
        axios
            .put("/api/servicios/" + this.idCliente, this.form)
            .then((response) => {
            $("#createModal").modal("hide");
            this.clientFormLoading = false;
            this.registro = false;
            this.$swal({ icon: "success", title: "Servicio Actualizado" });
            this.getServicios();
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
    delete_servicio(id, name) {
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
            .delete("/api/servicios/" + id)
            .then((response) => {
              this.$swal({
                icon: "success",
                title: "Eliminado satisfactoriamente",
              });

              this.getServicios();
            })
            .catch((error) => {
              this.$swal({ icon: "danger", title: "Algo salio mal" });
            });
        }
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
        this.getServicios(p,table);
        },



},


};
</script>
<style>
.btnValue {
    border: 0px;
    text-align: center;
    width: 70%;
    color: #B5B5C3 !important;
    text-transform: uppercase;
    outline: none;
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