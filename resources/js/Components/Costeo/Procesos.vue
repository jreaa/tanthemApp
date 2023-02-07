<template>
    <div>
    <div class="card card-custom">
      
      <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card-toolbar">
        </div>
        <div class="alert alert-warning" style="width:35%" v-if="procesos.length === 0">
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
                                &nbsp;
                                </th>
                                <th
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Nombre
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
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Total en CLP
                                </th>
                                <th
                                class="sorting_disabled ml-3"
                                rowspan="1"
                                colspan="1"
                                style="width: 111px"
                                aria-label="Actions"
                                >
                                Registros Ingresados
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="even" v-for="proceso in procesos" :key="proceso.id">
                                <td class="datatable-cell-center datatable-cell datatable-cell-check" data-field="RecordID" aria-label="36">
                                    <span style="width: 20px;"><label class="checkbox checkbox-single">
                                        <input type="radio" value="36" name = "preg1"  @click="changeProcesSelect(proceso.id)">
                                        &nbsp;<span></span></label></span>
                                    </td> 
                                <td>
                                    {{proceso.name}}
                                </td>
                                <td v-bind:title="proceso.description" :class="proceso.pendiente ? 'table-warning' : '' ">
                                    
                                    <popper
                                        style="padding-left:35px"
                                        trigger="clickToOpen"
                                        :options="{
                                        placement: 'button',
                                        modifiers: { offset: { offset: '0,10px' } }
                                        }">
                                        <div class="popper">
                                        {{proceso.description}}
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
                                    <span v-if="proceso.total < 0" class="font-weight-bold text-danger">{{separator(parseFloat(proceso.total))}}</span>

                                    <span  v-else class="font-weight-bold text-primary">{{separator(parseFloat(proceso.total))}} </span>
                                </td>
                                <td>
                                {{proceso.total_pendientes}}
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
    </div>
</template>
<style scoped>
.popper__arrow {
    display: none!important;
  }
.popper {
    background: #fff!important;
    border-radius: 0.42rem!important;
    font-size: 10px!important;
    box-shadow: 0 0 50px 0 rgb(82 63 105 / 15%)!important;
    overflow: hidden!important;
    padding: 10px!important;
    top: 10px!important;
    left: 0px!important;
}
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
    props:['updateProcesos'],
    name: 'TableCostosAsoc',
    data() {
        return {
        procesoSelected: 1,
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
        procesos: [],
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
        this.getProcesos();
    },
    watch: {
        paginate: function () {
            this.getProductos();
        },
        search : function () {
            this.getProductos();
        },
        updateProcesos: function() {
            this.getProcesos();
        }
    },
    components: {'popper': Popper},
    methods: {
        getProcesos() {
            axios.get('/api/getProcesos?id_proyecto='+this.$route.params.id)
                .then(response => {
                    this.procesos = response.data.procesos;
                }) 
                .catch(e => console.error(e))
        },
        changeProcesSelect(value) {
            this.$emit('proceso', value)
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