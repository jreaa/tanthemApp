<template>
  <div>
  <div class="card card-custom">
    
    <div class="card-body">
      <div class="row">
          <div class="col-md-12">
              <div class="card-toolbar">
                <p style="font-size: 1.1rem;">Proceso seleccionado : <br><br> <span 
                    class="label font-weight-bold label-lg  label-light-success label-inline">
                    {{procesoSelected[0].name}}</span></p> 

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
                                &nbsp;
                                </th>
                            <th
                                style="width: 218px;cursor:pointer"
                                >
                                <div style="display: flex;justify-content: space-between;">
                                Nombre
                                </div>
                                </th>
                                <th
                                style="width: 150px;cursor:pointer"
                                >
                                <div style="display: flex;justify-content: space-between;">
                                    Fondo
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
                              class="sorting_disabled ml-3"
                              rowspan="1"
                              colspan="1"
                              style="width: 111px"
                              aria-label="Actions"
                              >
                              Total Monto
                              </th>
                              
                              <th
                              class="sorting_disabled ml-3"
                              rowspan="1"
                              colspan="1"
                              style="width: 111px"
                              aria-label="Actions"
                              >
                              Total Monto Pendientes
                              </th>
                              <th
                              class="sorting_disabled ml-3"
                              rowspan="1"
                              colspan="1"
                              style="width: 111px"
                              aria-label="Actions"
                              >
                              Total Pendientes
                              </th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr class="even" v-for="subproceso in subprocesos" :key="subproceso.id">
                            <td class="datatable-cell-center datatable-cell datatable-cell-check" data-field="RecordID" aria-label="36">
                            <span style="width: 20px;"><label class="checkbox checkbox-single">
                                <input type="radio" value="36" name = "preg1"  @click="changeProcesSelect(subproceso.id)">
                                &nbsp;<span></span></label></span>
                            </td> 
                            <td class="">
                            <a
                                class="text-dark-50 text-hover-primary"
                                style="font-weight: bold!important;"
                                >{{subproceso.name}}</a
                            >
                            </td>
                            <td><div  :style="{ background : subproceso.color,margin : '0 0 0 10px', width :'30px', height : '30px',border: '1px solid #ccc', padding : '5px' }" ></div></td>
                            <td><div  :style="{ background : subproceso.colorFont,margin : '0 0 0 10px', width :'30px', height : '30px',border: '1px solid #ccc', padding : '5px' }" ></div></td>


                            <td><span
                                class="
                                label label-lg
                                font-weight-bold
                                 label-inline
                                "
                                :style="{ background : subproceso.color, color : subproceso.colorFont }"
                                >{{subproceso.name}}</span
                            >
                            </td>
                              <td v-bind:title="subproceso.description">
                                <popper
                                        style="padding-left:35px"
                                        trigger="clickToOpen"
                                        :options="{
                                        placement: 'button',
                                        modifiers: { offset: { offset: '0,10px' } }
                                        }">
                                        <div class="popper">
                                        {{subproceso.description}}
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

                                <td>
                                <span v-if="subproceso.total_monto < 0" class="font-weight-bold text-danger">{{separator(parseFloat(subproceso.total_monto))}}</span>

                                <span  v-else class="font-weight-bold text-primary">{{separator(parseFloat(subproceso.total_monto))}} </span>
                              </td>
                              <td>
                                <span v-if="subproceso.total_monto_pendiente < 0" class="font-weight-bold text-danger">{{separator(parseFloat(subproceso.total_monto_pendiente))}}</span>

                                <span  v-else class="font-weight-bold text-primary">{{separator(parseFloat(subproceso.total_monto_pendiente))}} </span>
                              </td>
                              <td>
                                   {{subproceso.total_pendientes}}
                              </td>

                          </tr>
                          </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>

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
                          <label>Nombre</label>
                          <input v-bind:class="errors.nombre ? ' is-invalid' : ''"  v-model="formCosteoValue.name" class="form-control" placeholder="Ej: Esto es un ejemplo">
                  </div>
                  <div class="form-group">
                          <label>Color</label>
                          <input v-bind:class="errors.color ? ' is-invalid' : ''" type="color"  v-model="formCosteoValue.color" class="form-control">
                  </div>
                  <div class="form-group">
                          <label>Fuente</label>
                          <input v-bind:class="errors.colorFont ? ' is-invalid' : ''" type="color"  v-model="formCosteoValue.colorFont" class="form-control">
                  </div>
                  <div class="form-group">
                          <label>Vista previa</label>
                          <br>
                          <span
                                class="
                                label label-lg
                                font-weight-bold
                                label-inline
                                "
                                :style="{ background : formCosteoValue.color, color : formCosteoValue.colorFont }"
                                >{{formCosteoValue.name}}</span
                            >
                  </div>
                  <div class="form-group">
                      <label>Descripcion</label>
                      <textarea v-bind:class="errors.description ? ' is-invalid' : ''" type="text" v-model="formCosteoValue.description" class="form-control" placeholder="Ej: Producto tipo A">
                      </textarea>
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
import Popper from 'vue-popperjs';
import 'vue-popperjs/dist/vue-popper.css';
export default {
  props: ['id_proceso','updateProcesos'],
  name: 'TableCostosAsoc',
  data() {
    return {
        procesoSelected: {},
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
        subprocesos: [],
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
            name: "",
            description : "",
            color: "",
            colorFont : '',
        },
        clientFormLoading: false,
        valTree : '',
        errors: {},
    }
  },
  created() {
      this.getSubProcesos();
      this.getProcesoSelected();
  },
  components: {'popper': Popper},
  watch: {
      paginate: function () {
          this.getProductos();
      },
      search : function () {
          this.getProductos();
      },
      id_proceso: function() {
        this.getSubProcesos();
        this.getProcesoSelected();
      },
      updateProcesos: function() {
        this.getSubProcesos();
      }
  },
  methods: {
      getSubProcesos() {
          axios.get('/api/centro_costos?id_proceso='+this.id_proceso+'&id_proyecto='+this.$route.params.id)
              .then(response => {
                  this.subprocesos = response.data.centro_costos;
              }) 
              .catch(e => console.error(e))
      },
      getProcesoSelected() {
        axios.get('/api/getProcesos/'+this.id_proceso)
              .then(response => {
                  this.procesoSelected = response.data.proceso;
              }) 
              .catch(e => console.error(e))
      },
      changeProcesSelect(value) {
          this.$emit('subproceso', value)
      },
      updateDataValues() {
        this.$emit('actualizarDatos',Math.random())
      },
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
            this.formCosteoValue.color = "";
            this.formCosteoValue.name = "";
            this.formCosteoValue.description = "";
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
      crearCosteo() {
          this.formCosteoValue.id_proceso_costos = this.id_proceso;
          this.formCosteoValue.id_proyecto =this.$route.params.id;
          axios
          .post("/api/subproceso-costos", this.formCosteoValue)
          .then((response) => {
              this.clientFormLoading = false;
              this.registro = false;
              toastr.success('Se ha creado correctamente');
              this.getSubProcesos();
              this.updateDataValues();
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
              .put("/api/subproceso-costos/" + this.idCliente, this.formCosteoValue)
              .then((response) => {
                $("#createModal").modal("hide");
                this.clientFormLoading = false;
                this.registro = false;
                toastr.success('Se ha actualizado correctamente');
                this.getSubProcesos();
                this.updateDataValues();
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
              .delete("/api/subproceso-costos/" + id)
              .then((response) => {
                  toastr.success('Se ha eliminado correctamente');
                  this.getSubProcesos();
              })
              .catch((error) => {
                  toastr.success('Se ha actualizado correctamente');
              });
          }
          });
      },
      getCosteoUnique(id) {
          axios.get("/api/subproceso-costos/" + id).then((response) => {
              this.formCosteoValue = response.data.sub_procesos;
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