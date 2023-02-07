<template>
    <div>
    <div class="card card-custom">
      
      <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card-toolbar">
          <!--begin::Dropdown-->
          <div class="dropdown dropdown-inline mr-2" style="float:right!important;">
            <button
              type="button"
              class="btn btn-light-primary font-weight-bolder btn-sm"
              @click="addModal()"
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
              >Agregar Costo
            </button>
          </div>

          <!--end::Button-->
        </div>

        <div class="alert alert-warning" style="width:35%" v-if="formCosteo.length === 0">
          Por favor agregue un costo para modificar
        </div>
                <div class="table-responsive">
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
                                Tipo
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
                                Monto
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
                            <tr class="even" v-for="costeo in formCosteo" :key="costeo.id">

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
                                :style="{ background : costeo.tablecolor, color : costeo.tablecolorfont }"
                                >{{costeo.tablename}}</span>
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
                                $ {{separator(parseFloat(costeo.value))}} 
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
      </div>
    </div>
    <!--/MODAL MAIN3/--->
        <div class="modal fade modal-right" id="main3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> {{registro  ? 'Agregando' : 'Editando'}} Costos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label>Fecha</label>
                            <input v-bind:class="errors.costo ? ' is-invalid' : ''" type="date" v-model="formCosteoValue.date" class="form-control" placeholder="Ej: 100">
                    </div>
                    <div class="form-group">
                        <label>Tipo de costos</label>
                        <select @change="getDataType" v-model="type" class="form-control">
                          <option value="1">Tipo Ingreso</option>
                          <option value="2">Tipo Pagos</option>
                          <option value="3">Tipo Costos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo costo asociado </label>
                        <select v-model="formCosteoValue.type" class="form-control" style="width: 100%!important;margin-top:4px">
                            <option value="">...</option>
                              <option v-for="data in dataType.data" :key="data.id" :value="data.id">
                                {{ data.name }}
                            </option>
                          </select>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label>Monto</label>
                        <input v-bind:class="errors.pv ? ' is-invalid' : ''" type="text" v-model="formCosteoValue.value" class="form-control" placeholder="Ej: 200">
                    </div>
                    <div class="form-group">
                    <label>Pendiente</label>
                    <span class="switch switch-icon ">
                        <label>
                          <input type="checkbox" v-model="formCosteoValue.pendiente">
                          <span></span>
                        </label>
                      </span>
                  </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input v-bind:class="errors.carac ? ' is-invalid' : ''" type="text" v-model="formCosteoValue.description" class="form-control" placeholder="Ej: Producto tipo A">
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary" :class="{
                  'spinner spinner-white spinner-right': clientFormLoading,
                  }" :disabled="clientFormLoading" @click="SendData">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.modal.modal-right .modal-dialog{max-width:380px;min-height:calc(100vh - 0)}
.modal.modal-right.show .modal-dialog{transform:translate(0,0)}
.modal.modal-right .modal-content{height:calc(100vh - 0);overflow-y:auto}
.modal.modal-right .modal-dialog{transform:translate(100%,0);margin:0 0 0 auto}


.modal.modal-left .modal-dialog{max-width:380px;min-height:calc(100vh - 0)}
.modal.modal-left.show .modal-dialog{transform:translate(0,0)}
.modal.modal-left .modal-content{height:calc(100vh - 0);overflow-y:auto}
.modal.modal-left .modal-dialog{transform:translate(-100%,0);margin-left: 380px;}

@media screen and (max-width:600px) {
    .modal.modal-left .modal-dialog{margin-left: 0px;}
}
</style>

<script>
export default {
    name: 'TableCostosAsoc',
    props: {
        dataCostos : {
            type:Number,
            default : () => ''
        },
        dataBody : {
            type:Object,
            default : () => {}
        }
    },
    data() {
    return {
    formCosteo: [],
      form : {
        body : []
      },
      type: '',
      dataType: {},
    series: [{
        name: 'Ingresos',
        data: []
        }, {
        name: 'Pagos',
        data: []
        },{
        name: 'Costos',
        data: []
        }],
        
    chartOptions: {
    chart: {
        height: 350,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: []
    },
    tooltip: {
        x: {
        format: 'dd/MM/yy HH:mm'
        },
    },
    },
    
      proyecto: {},
      estados : {},
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
      proyecto: {},
      formCosteoValue: {
            description : '',
            date : '',
            id_type: '',
            type : '',
            status : '',
            value : '',
            id_proyecto : '',
            id_leaf: '',
            pendiente : false	
      },
      clientFormLoading: false,
      valTree : '',
      errors: {},
    }
  },
  created() {
        //this.getPermissions();
        this.getStatus();
        this.getValue();
        this.onclick(this.dataCostos)
  },
  watch: {
    paginate: function () {
        this.getProductos();
    },
    search : function () {
        this.getProductos();
  },
  },
    methods: {
      changeSeguimiento(costeo){
        const json = {
          id: costeo.id,
          pendiente: !costeo.pendiente
        }
        axios.put("/api/update-pendiente",json)
          .then(() => {
              toastr.success('Se ha actualizado correctamente');
              this.getCosteo();
          })
          .catch(() => toastr.error('Algo ha salido mal :('))
      },
      addModal(){
        this.resetForm();
        this.registro = true;
        $('#main3').modal('show');
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
      getGrafico(id_leaf) {
        axios.get(`api/grafico-proyecto?id_leaf=${id_leaf}&id_proyecto=${this.$route.params.id}`)
        .then(response => {
          this.series[0].data = response.data.ingresos;
          this.series[1].data = response.data.pagos;
          this.series[2].data = response.data.costos;
          for(let i=0;i< response.data.fechas.length;i++){
              this.chartOptions.xaxis.categories.push(response.data.fechas[i]);
          }
          window.dispatchEvent(new Event('resize'))
        }).catch(error => console.log(error));
      },
      getValue(){

        axios.get(`/api/costeoTotal/${this.$route.params.id}`).then(response => {
            let array_leaf = response.data;
            console.log(array_leaf);
            for(let i = 0; i < array_leaf.length; i++){
                axios.get(`/api/costeoTotal/${this.$route.params.id}?id_leaf=${array_leaf[i]}`).then(response => {
                    let value = document.getElementById(array_leaf[i]);
                    console.log(value);
                    this.data[0].folder.childrens[array_leaf[i]].monto = "$"+this.separator(parseFloat(response.data));

                    if(response.data > 0){
                      value.classList.add("text-primary")
                    }else{
                      value.classList.add("text-danger")
                    }
                }).catch(error => {
                  console.log(error);
                });
            }
        }).catch(error => {
          console.log(error);
        });
      },
        separator(numb) {
          var str = numb.toString().split(".");
          str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          return str.join(".");
      },
      createModal() {
        //$("#createModal").modal("show");
        this.registro = true;
        this.editMode = true;
        this.resetForm();
      },
      resetForm() {
        this.formCosteoValue.description = "";
        this.formCosteoValue.date = "";
        this.formCosteoValue.id_type = "";
        this.formCosteoValue.type = "";
        this.formCosteoValue.value = "";
        this.formCosteoValue.status = "";
        this.formCosteoValue.pendiente = false;
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
          //$("#createModal").modal("show");
          this.resetForm();
          this.getCosteoUnique(id);
          $('#main3').modal('show');
          this.idCliente = id;
      },
      getCosteo(){
        axios.get(`/api/costeo/${this.formCosteoValue.id_leaf}?id_proyecto=${this.$route.params.id}`).then(response => {
            //console.log(response);
            this.formCosteo = response.data.data;
            this.dataBody.monto = 0
            this.formCosteo.map(values => {
              if(values.id_type == 1 ){this.dataBody.monto = parseFloat(this.dataBody.monto) + parseFloat(values.value)}
              else {this.dataBody.monto = parseFloat(this.dataBody.monto) - parseFloat(values.value)}
            })

        }).catch(error => {
          console.log(error);
        });
      },
      crearCosteo() {
        
          axios
          .post("/api/costeo", this.formCosteoValue)
          .then((response) => {
              this.clientFormLoading = false;
              this.registro = false;
              toastr.success('Se ha creado correctamente');
              this.getCosteo();
              this.getValue();
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
      updateProducto() {
          this.clientFormLoading = true;
          axios
              .put("/api/costeo/" + this.idCliente, this.formCosteoValue)
              .then((response) => {
              $("#createModal").modal("hide");
              this.clientFormLoading = false;
              this.registro = false;
              toastr.success('Se ha actualizado correctamente');
              this.getCosteo();
              this.getValue();
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

                this.getCosteo();
                this.getValue();
              })
              .catch((error) => {
                toastr.success('Se ha actualizado correctamente');
              });
          }
        });
      },
    getCosteoUnique(id) {
        axios.get("/api/costeo/" + id).then((response) => {
            this.formCosteoValue = response.data.data[0];
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
        axios.get("/api/estados")
        .then((response) => {
            this.estados =response.data.data;
        });
    },
    onclick(index){
      this.formCosteoValue.id_proyecto = this.$route.params.id;
      this.formCosteoValue.id_leaf = index;
      this.getCosteo();
      this.getGrafico(index);
    },
    updateTree(){
      let body = (JSON.stringify(this.data));

      this.form.body = body;
      axios.put('/api/tree/'+ 17,this.form)
        .then(response => {
          console.log(response);
        })
    },
    getEstados(table) {
      axios.get("/api/"+table).then((response) => {
        this.dataType = response.data;
        console.log(response.data.data);
        this.clientFormLoading = false;
      });
    },
    crearCosteo() {
        axios
        .post("/api/costeo", this.formCosteoValue)
        .then((response) => {
            this.clientFormLoading = false;
            this.registro = false;
            this.$swal({ icon: "success", title: "Costo Guardado" });
            this.getCosteo();
            this.getValue();
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
  }


}
</script>