<template>
    <div>
            <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'tingresos.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Costos Generales</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Costos Generales</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los costos generales asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus costos generales</span
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
              >Agregar Costos General
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
                    v-if="data == ''"
                    style="height:50px!important; width: 35%;margin-right: auto!important;
    margin-left: auto!important;"
                    >
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        No hay costos generales registrados 
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
                        >
                            <thead>
                            <tr role="row">
                              <th>
                              <div>
                                Proyecto
                              </div>
                              </th>
                                <th
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Tipo
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
                                <th
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Estado
                                </th>
                                <th
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Valor
                                </th>
                                <th
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Pendiente
                                </th>
                                <th
                                style="width: 150px;cursor:pointer"
                                @click="changeSort(p,'carac')"
                                >
                                <div style="display: flex;justify-content: space-between;">
                                    Descripcion
                                    <div>
                                
                                    <i v-if="sort && sortingvalue == 'carac'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                    <i v-if="sort == false && sortingvalue == 'carac'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
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
                            
                            <tr class="even" v-for="costeo in data" :key="costeo.id">
                              <td class="sorting_1 dtr-control" :class="costeo.pendiente ? 'table-warning' : '' " >
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50 symbol-light-primary">
                                    <div class="symbol-label font-size-h5">{{ costeo.nombreProyecto[0] }}</div>
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
                                        >{{costeo.nombreProyecto}}</span
                                    >
                                    <a href="#" class="text-muted text-hover-primary">{{costeo.descriptionProyecto}}</a>
                                    </div>
                                </div>
                                </td>

                               
                                <td :class="costeo.pendiente ? 'table-warning' : '' ">
                                <span
                                class="
                                label label-lg
                                font-weight-bold
                                 label-inline
                                "
                                :style="{ background : costeo.tablecolor, color : costeo.tablecolorfont }"
                                >{{costeo.tablename}}</span>
                                </td>
                                 <td :class="costeo.pendiente ? 'table-warning' : '' ">
                                  {{getHoraFecha(costeo.date)}}
                                </td>

                                <td :class="costeo.pendiente ? 'table-warning' : '' ">
                                <span
                                class="
                                label label-lg
                                font-weight-bold
                                 label-inline
                                "
                                :style="{ background : costeo.estadocolor, color : costeo.estadocolorfont }"
                                >{{costeo.estadoname}}</span>
                                </td>
                                <td :class="costeo.pendiente ? 'table-warning' : '' ">
                                {{separator(parseFloat(costeo.value))}} $
                                </td>
                                <td :class="costeo.pendiente ? 'table-warning' : '' ">
                                    <span class="switch switch-icon d-flex justify-content-center">
                                      <label>
                                        <input  @click="changeSeguimiento(costeo)" type="checkbox" :checked="costeo.pendiente  ? 'checked' : ''">
                                        <span></span>
                                      </label>
                                    </span>
                                </td>
                                <td v-bind:title="costeo.description" :class="costeo.pendiente ? 'table-warning' : '' ">
                                  <div v-if="costeo.description.length<8">{{costeo.description}}</div>
                                  <div v-else> {{ costeo.description.substring(0,8)+".." }}</div>
                                </td>

                                
                                <td nowrap="nowrap" style="" :class="costeo.pendiente ? 'table-warning' : '' ">
                                <button @click="updateModal(costeo.id)" class="btn btn-sm btn-clean btn-icon" >
                                        <i class="la la-edit" ></i>
                                </button>
                                <button @click="delete_costeo(costeo.id, costeo.name)" class="btn btn-sm btn-clean btn-icon">
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
               Tabla Costos Generales
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
      <div class="modal" tabindex="-1" role="dialog" id="modal-costos">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> {{ registro ? 'Agregando' : 'Editando' }} Costos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Proyecto </label>
                    <select v-model="formCosteoValue.id_proyecto" class="form-control" @change="getProcesos">
                        <option :value="proyecto.id" v-for="proyecto in proyectos.data" :key="proyecto.id">
                          {{proyecto.name}} - {{proyecto.description}}
                        </option>
                      </select>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label> Proceso </label>
                    <select @change="getSubProcesos" class="form-control" v-model="formCosteoValue.id_proceso" style="width:100%!important">
                        <option :value="proceso.id" v-for="(proceso, i) in procesos" :key="i" >
                          {{proceso.name}}
                        </option>
                      </select>
                  </div>

                </div>

              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label> Sub Proceso </label>
                    <select class="form-control" v-model="formCosteoValue.id_leaf" style="width:100%!important">
                        <option :value="subproceso.id" v-for="(subproceso, i) in subprocesos" :key="i" >
                          {{subproceso.nombre}}
                        </option>
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label> Tipo Costo </label>
                    <select @change="getDataType" v-model="type" class="form-control">
                        <option value="1">Tipo Ingreso</option>
                        <option value="2">Tipo Costos</option>
                        <option value="3">Pagos</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label> Tipo de Costo Asociado </label>
                      <select v-model="formCosteoValue.type" class="form-control" style="width: 100%!important">
                        <option value="">...</option>
                        <option v-for="data in dataType.data" :key="data.id" :value="data.id">
                            {{ data.name }}
                        </option>
                      </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label>Fecha</label>
                  <input v-bind:class="errors.costo ? ' is-invalid' : ''" type="date" v-model="formCosteoValue.date" class="form-control" placeholder="Ej: 100">
                </div>
                <div class="col-md-4">
                  <label>Estado</label>
                  <select
                    name="estado"
                    id="estado"
                    class="form-control"
                    v-model="formCosteoValue.status"
                  >
                    <option value="" selected>Estado...</option>
                    <option v-for="estado in estados" :key="estado.id" :value="estado.id">
                        {{ estado.name }}
                    </option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Valor</label>
                  <input v-bind:class="errors.pv ? ' is-invalid' : ''" type="number" v-model="formCosteoValue.value" class="form-control" placeholder="Ej: 200">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-3">
                <div class="form-group">
                    <label>Pendiente</label>
                    <span class="switch switch-icon d-flex justify-content-center">
                        <label>
                          <input type="checkbox" v-model="formCosteoValue.pendiente">
                          <span></span>
                        </label>
                      </span>
                  </div>
                </div>
                <div class="col-md-9">
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea v-bind:class="errors.carac ? ' is-invalid' : ''" type="text" v-model="formCosteoValue.description" placeholder="Ej: Producto tipo A" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" :class="{
                'spinner spinner-white spinner-right': clientFormLoading,
                }" :disabled="clientFormLoading" @click="SendData">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
      data: {},
      subprocesos: [],
      estados : {},
      dataType: {},
      procesos: [],
      type: '',
      productosCreate : false,
      productosEdit : false,
      productosDelete : false,
      productosData : false,
      btnEstructura : false,
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
      productos: {},
      formData: {
        data : {}
      },
      proyectos: {},
      form: {
        p1: "",
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
      formCosteo: {},
      bodyAsoc: {},
      formCosteoValue: {
            'description' : '',
            'date' : '',
            'id_type': '',
            'type' : '',
            'status' : '',
            'value' : '',
            'id_proceso': '',
            'id_proyecto' : '',
            'id_leaf' : '',
            'pendiente' : false
      },
      clientFormLoading: false,
      errors: {},
        newTree: {},
        data : {},

        };
    },
    mounted() {
        this.getCosteos();
        this.getStatus();
        this.getProyectos();
        
    },
    watch: {
    paginate: function () {
        this.getProductos();
    },
    search : function () {
        this.getProductos();
    },

    },
    methods : {
      resetForm() {
        this.formCosteoValue.description = "";
        this.formCosteoValue.date = "";
        this.formCosteoValue.id_type = "";
        this.formCosteoValue.type = "";
        this.formCosteoValue.id_proyecto = "";
        this.formCosteoValue.value = "";
        this.formCosteoValue.id_leaf = "";
        this.formCosteoValue.status = "";
        this.formCosteoValue.pendiente = false;
      },
      getSubProcesos() {
          axios.get('/api/subproceso-costos?id_proceso='+this.formCosteoValue.id_proceso+'&id_proyecto='+this.formCosteoValue.id_proyecto)
              .then(response => {
                  this.subprocesos = response.data.sub_procesos;
              }) 
              .catch(e => console.error(e))
      },
      getProcesos() {
            axios.get('/api/getProcesos?id_proyecto='+this.formCosteoValue.id_proyecto)
                .then(response => {
                    this.procesos = response.data.procesos;
                }) 
                .catch(e => console.error(e))
        },
      changeSeguimiento(costeo){
        const json = {
          id: costeo.id,
          pendiente: !costeo.pendiente
        }
        axios.put("/api/update-pendiente",json)
          .then(() => {
              toastr.success('Se ha actualizado correctamente');
              this.getCosteos();
          })
          .catch(() => toastr.error('Algo ha salido mal :('))
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
      getProyectos() {
            axios.get("/api/proyectos").then((response) => {
                this.proyectos = response.data;
            });
      },
      getCuerpo(){
            axios.get("/api/proyectoBodyAsoc/"+this.formCosteoValue.id_proyecto).then((response) => {
                this.bodyAsoc = response.data;
            });
      },
      getDataType(){
        this.formCosteoValue.id_type = this.type;
        if(this.type == 1){
          this.getEstados("tingresos");
        }else if(this.type == 2){
          this.getEstados("pagos");
        }else if(this.type == 3){
          this.getEstados("tcostos");
        }
      },
    getStatus(){
        axios.get("/api/estados_costos")
        .then((response) => {
            this.estados =response.data.data;
        });
    },
    getEstados(table) {
      axios.get("/api/"+table).then((response) => {
        this.dataType = response.data;
        console.log(response.data.data);
        this.clientFormLoading = false;
      });
    },
      onClickData(params){
        //console.log("testing testing",params);
        console.log(params.path[4].id);
        this.formCosteoValue.id_proyecto = this.$route.params.id;
        this.formCosteoValue.id_leaf = params.path[4].id;
        this.getCosteo();
      },
      separator(numb) {
          var str = numb.toString().split(".");
          str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          return str.join(".");
      },
    getCosteos(){
        axios.get(`/api/costeo/`).then(response => {
            console.log(response);
            this.data = response.data.data;
        }).catch(error => {
          console.log(error);
        });
      },
      getCosteo(){
        axios.get(`/api/costeo/${this.formCosteoValue.id_leaf}?id_proyecto=${this.$route.params.id}`).then(response => {
            console.log(response);
            this.formCosteo = response.data.data;
        }).catch(error => {
          console.log(error);
        });
      },
      onAddLeaf(params){
        this.updateTree();
      },
      onAdd(){
        this.updateTree();
      },
      onEdit(){
        this.updateTree();
      },
      updateTree(){
        let body = this.formData.data;
        this.formData.data = JSON.parse(body);
        axios.put('/api/tree/'+ this.$route.params.id, this.formData )
          .then(response => {
            console.log(response);
          })
        
        this.formData.data = body;
      },
      getTree(id) {
          axios.get("/api/tree/" + id).then((response) => {
              let body = new Tree([JSON.parse(response.data.data.body)]);
              //this.data = body;
              this.formData.data = body;
              console.log(body);
          });
      },
      onDel(node) {
        console.log(node)
        node.remove()
        this.updateTree();
      },

      onChangeName(params) {
        console.log(params)
        console.log("nombre cambiado")
        this.updateTree()
      },

      onAddNode(params) {
        console.log(params)
        this.updateTree()
      },

      onClick(params) {
        console.log(params)
      },

      addNode() {
        var node = new TreeNode({ name: 'new node', isLeaf: false })
        if (!this.formData.data.children) this.formData.data.children = []
        this.formData.data.addChildren(node)
        this.updateTree()
      },
      getCosteoUnique(id) {
        axios.get("/api/costeo/" + id).then((response) => {
            this.formCosteoValue = response.data.data[0];
        });
    },
      SendData() {
        if (this.registro) {
            this.crearCosteo();
        }else{
            this.updateProducto();
        }
      },
      updateModal(id) {
          this.registro = false;
          $("#modal-costos").modal("show");
          this.getCosteoUnique(id);
          this.idCliente = id;
      },
      crearCosteo() {
          axios
          .post("/api/costeo", this.formCosteoValue)
          .then((response) => {
              this.clientFormLoading = false;
              this.registro = false;
              toastr.success('Se ha creado correctamente');
              this.getCosteos();
          })
          .catch((error) => {
              if (error.response.status === 422) {
                  this.errors = error.response.data.errors;
                  this.form_submitting = false;
                  toastr.error('Algo salio mal');
              }
              this.clientFormLoading = false;
          });
      },
      updateProducto() {
          this.clientFormLoading = true;
          axios
              .put("/api/costeo/" + this.idCliente, this.formCosteoValue)
              .then((response) => {
              $("#createModal").modal("hide");
              this.clientFormLoading = false;
              this.registro = false;
              toastr.success('Se ha actualizado correctamente');
              this.getCosteos();
              })
              .catch((error) => {
              if (error.response.status === 422) {
                  this.errors = error.response.data.errors;
                  this.form_submitting = false;
                  toastr.error('Algo salio mal');
              }
              this.clientFormLoading = false;
          });
      },
      delete_costeo(id, name) {
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
              .delete("/api/costeo/" + id)
              .then((response) => {
                toastr.success('Se ha eliminado correctamente');
                this.getCosteos();
              })
              .catch((error) => {
                toastr.error('Algo salio mal');
              });
          }
        });
      },
      getNewTree() {
        var vm = this
        function _dfs(oldNode) {
          var newNode = {}

          for (var k in oldNode) {
            if (k !== 'children' && k !== 'parent') {
              newNode[k] = oldNode[k]
            }
          }

          if (oldNode.children && oldNode.children.length > 0) {
            newNode.children = []
            for (var i = 0, len = oldNode.children.length; i < len; i++) {
              newNode.children.push(_dfs(oldNode.children[i]))
            }
          }
          return newNode
        }

        vm.newTree = _dfs(vm.data)
      },
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
      checkPermisos(array){
        console.log(array);
          for(let i = 0; i < array.length; i++){
            
              if(array[i].element == "productos.create"){
                  this.productosCreate = true;
              }
              if(array[i].element == "productos.edit"){
                  this.productosEdit = true;
              }
              if(array[i].element == "productos.delete"){
                  this.productosDelete = true;
              }
              if(array[i].element == "productos.visualizarall"){
                  this.productosData = true;
              }
              
          }
          this.getProductos();
          this.bringEstructura();

      },
      bringEstructura(){
          axios.get("/api/statusN?table=productos").then(response => {
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
              this.btnEstructura = false;
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
      getProductos(page = 1,table = "p1") {
          this.clientFormLoading = true;
          let sort = '';
          let userParse = JSON.parse(this.user.content);
          this.p = page;
          if(this.sort){
              sort = 'asc';
          }else{
              sort = 'desc';
          }
          axios.get("/api/productos?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table + "&full=" + this.productosData + "&user_id=" + userParse.id).then((response) => {
              this.productos = response.data;
              console.log(response.data.data);
              this.clientFormLoading = false;
          });
      },
      getProducto(id) {
          axios.get("/api/productos/" + id).then((response) => {
              this.form = response.data.data;
          });
      },
      createModal() {
        this.registro = true;
        this.resetForm();
        $("#modal-costos").modal("show");
      },
    
    }
}
</script>