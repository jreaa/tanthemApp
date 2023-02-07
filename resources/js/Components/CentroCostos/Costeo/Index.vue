<template>
<div>
    <div>
        <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
            <!--begin::Item-->
            <router-link
                    :to="{ name: 'tree.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
            <i class="flaticon2-shelter"></i>
            </router-link>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <router-link :to="{ name: 'tree.index' }"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Proyectos</router-link>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <a href="#"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Costeo Proyecto</a>
            <!--end::Item-->
        </div>
            <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los proyectos Asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar y gestionar cada uno de sus tipo de
              proyectos</span
            >
          </h3>
        </div>

      </div>
      <div class="card-body">
        <!--begin: Datatable-->
        <div
          id="kt_datatable_wrapper"
          class="dataTables_wrapper dt-bootstrap4 no-footer"
        >


          <div class="row">
            <div class="col-sm-12">
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
                        style="width: 1231px"
                    >
                    <thead>
                    <tr role="row">
                        <th

                        style="width: 218px;cursor:pointer"

                        >
                            <div style="display: flex;justify-content: space-between;">
                                Gestiona tus costos
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr :class="displayCostos ? 'datatable-row datatable-row-even selected'  : 'datatable-row datatable-row-even' ">
                        <td class="datatable-cell-center datatable-cell" style="width: 20%!important" data-field="RecordID" aria-label="1">
                            <button @click="changeDisplay('costos')" class="btn datatable-toggle-subtable" data-value="1" title="Load sub table" style="width: 30px;">
                                <i style="width: 30px;" :class="displayCostos ? 'fa fa-caret-down text-primary' : 'fa fa-caret-right text-primary'"></i>
                            </button>
                            <span style="width: 137px;">Costos</span>
                        </td>
                    </tr>

                    <tr :class=" displayCostos  ?  'datatable-row-subtable datatable-row-subtable-even' :  'none datatable-row-subtable datatable-row-subtable-even'">

                        <td class="datatable-cell-center datatable-cell" style="width: 20%!important" data-field="RecordID" aria-label="1">
                            <button @click="changeDisplay('logistica')" class="btn datatable-toggle-subtable" data-value="1" title="Load sub table" style="width: 30px;">
                                <i style="width: 30px;" :class="displayLogistica ? 'fa fa-caret-down text-primary' : 'fa fa-caret-right text-primary'"></i>
                            </button>
                            <span style="width: 137px;">Logistica</span>
                        </td>
                    </tr>
                    <tr :class=" displayLogistica  ?  'datatable-row-subtable datatable-row-subtable-even' :  'none datatable-row-subtable datatable-row-subtable-even'">
                                  <div class="row">
                                        <div class="col-sm-12">
                                            <div class="dropdown dropdown-inline mr-2" style="width: 100%">
                                                <button
                                                type="button"
                                                @click="createModal()"
                                                class="btn btn-light-primary font-weight-bolder btn-sm"
                                                style="float:right"
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
                                                >Agregar Logistica
                                                </button>
                                            </div>

                                            <div class="table-responsive">
                                            <div
                                                class="alert alert-custom alert-warning"
                                                role="alert"
                                                id="alerta"
                                                v-if="logistica.data == ''"
                                                style="height:50px!important; width: 35%;margin-right: auto!important;
                                margin-left: auto!important;"
                                                >
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">
                                                    No hay Logistica registrada 
                                                </div>
                                                </div>
                                            
                                                <table
                                                   v-if="logistica.data != ''"
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
                                                        Nombre
                                                        </div>
                                                        </th>
                                                        <th
                                                        style="width: 150px;cursor:pointer"
                                                        >
                                                        <div style="display: flex;justify-content: space-between;">
                                                            Descripcion
                                                        </div>
                                                        </th>

                                                        <th
                                                        style="width: 150px"
                                                        >
                                                        <div >
                                                        Fecha
                                                        </div>
                                                        </th>

                                                        <th
                                                        class="sorting_disabled ml-3"
                                                        rowspan="1"
                                                        colspan="1"
                                                        style="width: 111px"
                                                        aria-label="Actions"
                                                        >
                                                        Precio/Costo
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
                                                        <td><input v-bind:class="errors.name ? ' is-invalid' : ''" type="text" v-model="form.name" class="form-control" placeholder="Ej: Proyecto A"></td>
                                                        <td><input v-bind:class="errors.description ? ' is-invalid' : ''" type="text" v-model="form.description" class="form-control" placeholder="Ej: Proyecto tipo A"></td>
                                                        <td><input v-bind:class="errors.fecha ? ' is-invalid' : ''" type="text" v-model="form.fecha" class="form-control" placeholder="Ej: 100"></td>
                                                        <td><input v-bind:class="errors.precio_costo ? ' is-invalid' : ''" type="date" v-model="form.precio_costo" class="form-control"></td>


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
                                                    
                                                    <tr class="even" v-for="logistic in logistica.data" :key="logistic.id">

                                                        <td>{{logistic.name}}</td>
                                                        <td>{{logistic.description}}</td>
                                                        <td>{{logistic.fecha}}</td>
                                                        <td>{{logistic.precio_costo}}</td>

                                                        <td nowrap="nowrap" style="">
                                                        
                                                        <router-link
                                                            :to="{ name: 'costeo.index' }"
                                                            class="btn btn-sm btn-clean btn-icon"
                                                            title="Costeo del proyecto">

                                                            <i class="la la-cog"></i>
                                                        </router-link>
                                        
                                                        <button class="btn btn-sm btn-clean btn-icon" >
                                                                <i class="la la-edit"></i>
                                                        </button>
                                                        <button  class="btn btn-sm btn-clean btn-icon">
                                                            <i class="la la-trash"></i>
                                                        </button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <pagination
                                                :data="logistica"
                                                class="pagination"
                                                @pagination-change-page="getLogistica"
                                                ></pagination>
                                            </div>
                                        </div>
                                    </div>
                    </tr>


                    </tbody>
                       
                    </table>
                </div>
            </div>
          </div>

        </div>
        <!--end: Datatable-->
      </div>
    </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            id : this.$route.params.id,
            displayCostos : false,
            displayLogistica : false,
            displayPV : false,
            paginate : 10,
            clientFormLoading: false,
            logistica : {},
            form : {
                name :'',
                id_proyecto : '',
                description : '',
                fecha :'',
                precio_costo : '',
            }
        }
    },
    watch: {
        paginate: function () {
            this.getLogistica();
        },
    },
    methods :{
        changeDisplay(value){
            if(value == 'costos'){
                if(this.displayCostos){
                    this.displayCostos = false;
                }else{
                    this.displayCostos = true;
                }
            }else if(value == 'logistica'){
                if(this.displayLogistica){
                    this.displayLogistica = false;
                }else{
                    this.displayLogistica = true;
                    this.getLogistica();
                }
            }
        },
        //logistica
        getLogistica(page = 1,table = "name") {
            this.clientFormLoading = true;
            let sort = '';
            this.p = page;
            if(this.sort){
                sort = 'asc';
            }else{
                sort = 'desc';
            }
            axios.get("/api/logistica?page=" + page + "&paginate=" + this.paginate + "&table=" + table + "&from" + this.id).then((response) => {
                this.logistica = response.data;
                this.clientFormLoading = false;
            });
        },
        resetForm() {
            this.form.name = "";
            this.form.description = "";
            this.form.plantilla_asoc = "";
            this.form.fecha_inicio = "";
        },
        createModal() {
            this.registro = true;
            this.editMode = true;
            this.resetForm();
        },
        updateModal(id) {
            this.registro = true;
            this.editMode = false;
            this.getLogistic(id);
            this.idCliente = id;
        },
        SendData() {
            if (this.editMode) {
                this.crearLogistica();
            }else{
                this.updateLogistica();
            }
        },
        getLogistic(id) {
            axios.get("/api/logistica/" + id).then((response) => {
                this.form = response.data.data;
            });
        },
        crearLogistica() {
            this.clientFormLoading = true;
            axios
            .post("/api/logistica", this.form)
            .then((response) => {
                this.clientFormLoading = false;
                this.registro = false;
                this.$swal({ icon: "success", title: "Logistica Guardado" });
                this.getLogistica();
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
    }
}
</script>
<style>
    .none{
        display: none;
    }
</style>