<template>
    <div>
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                <h3 class="card-label">
                    Estudio de los proyectos registrados
                    <span class="d-block text-muted pt-2 font-size-sm"
                    >A continuacion podra observar y gestionar cada uno de sus tipo de
                    pagos</span
                    >
                </h3>
                </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="select-estudio d-flex align-items-center">
                        <h6 class="mr-3">
                            Mis proyectos:
                        </h6>
                        <br>
                        <select v-model="idProyectoSelected" @change="getDataTotalProyecto" class="form-control">
                            <option v-for="p in proyectos" :key="p.id" :value="p.id">
                                {{p.name}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row row mt-5" v-if="proyectoSelected.length != 0">
                  <!--begin::Aside-->
                    <div class="col-md-12">
                      <div class="flex-md-row-auto">
                        
                        <div>
                          <div class="pt-0 row mt-5">
                            <!--begin::Item-->
                            <div class="mb-10 col-md-4">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-user icon-lg text-success"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    > {{proyectoSelected.data.data.nameCliente }}
                                  </a>
                                  <span class="text-muted font-weight-bold">Cliente.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                            <div class="mb-10 col-md-4">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-folder icon-lg text-warning"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    >{{proyectoSelected.data.data.name}}
                                  </a>
                                  <span class="text-muted font-weight-bold">Proyecto.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                            <div class="mb-10 col-md-4">
                              <!--begin::Section-->
                              <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-45 symbol-light mr-5">
                                  <span class="symbol-label">
                                    <i class="flaticon-map icon-lg text-info"></i>
                                  </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="d-flex flex-column flex-grow-1">
                                  <a
                                    href="#"
                                    class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "
                                    >{{proyectoSelected.data.data.phoneCliente}}
                                  </a>
                                  <span class="text-muted font-weight-bold">Telefono Cliente.</span>
                                </div>
                                <!--end::Text-->
                              </div>
                            </div>
                          </div>
                          <!--end::Body-->
                        </div>
                      </div>
                    </div>
                    <!--end::Aside-->
            </div>
            <hr v-if="proyectoSelected.length != 0">
            <div v-if="proyectoSelected.length != 0" class="card border-0 gutter-b card-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <div class="font-weight-bolder">
                        <div class="card-label">Datos Generales 
                        <div class="font-size-sm text-muted mt-2">Mis valores: </div></div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 d-flex flex-column" style="position: relative;">
                    <!--begin::Items-->
                    <div class="flex-grow-1 card-spacer">
                        <div class="row row-paddingless mt-2 mb-10">
                            <!--begin::Item-->
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-info mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-info">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-dark-75 font-weight-bolder">${{separator(parseFloat(proyectoSelected.data.ingresos))}}</div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Ingresos</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-danger">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Home/Library.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-dark-75 font-weight-bolder">${{separator(parseFloat(proyectoSelected.data.pagos))}}</div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Pagos</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Widget Item-->
                            <!--begin::Item-->
                            <div class="col-md-4">
                                <div class="d-flex align-items-center mr-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45 symbol-light-danger mr-4 flex-shrink-0">
                                        <div class="symbol-label">
                                            <span class="svg-icon svg-icon-lg svg-icon-danger">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Home/Library.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="font-size-h4 text-dark-75 font-weight-bolder">${{separator(parseFloat(proyectoSelected.data.costos))}}</div>
                                        <div class="font-size-sm text-muted font-weight-bold mt-1">Costos</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Widget Item-->
                        </div>
                    </div>

                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 332px; height: 467px;"></div></div><div class="contract-trigger"></div></div></div>
                <!--end::Body-->
            </div>
            <div v-else 
            class="mt-3"
            style=
            "
            width:30%;
            flex-direction: column;
            justify-content: center;
            display: flex;">
                <div class="alert alert-warning">
                    No se ha seleccionado un proyecto aun
                </div>
            </div>

            



            <div class="row mt-3" v-if="proyectoSelected.length != 0">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Costos Registrados
                                </h3>
                             </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Costos
                                        </th>
                                        <th>
                                            Montos
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(data, index) in dataCosteos[0].folder.childrens" :key="index">
                                        <td>
                                            {{data.nombre}}
                                        </td>
                                        <td>
                                            {{data.monto}}
                                        </td>
                                        <td>
                                            <button @click="mostrarGrafico(index)" class="btn btn-sm btn-clean btn-icon" title="Mostrar grafico" >
                                                    <i class="flaticon-graphic icon-lg" ></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <apexchart v-if="chartOptions.xaxis.categories.length != 0" :series="series" :options="chartOptions"></apexchart>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
import VueApexCharts from 'vue-apexcharts'
export default {
    name:'EstudioProyectos',
    components: {
        apexchart: VueApexCharts,
    },
    data(){
        return {
            proyectos : [],
            proyectoSelected: [],
            idProyectoSelected: '',
            dataCosteos: [],
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
            

        }
    },
    computed: {

    },
    created(){
        this.getProyectos()
    },
    methods: {
        separator(numb) {
            var str = numb.toString().split(".");
            str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return str.join(".");
        },
        getProyectos(){
            axios.get("api/proyectos")
            .then(response => {
                const data = response.data.data
                this.proyectos = data
            })
        },
        getDataTotalProyecto(){
            axios.get("api/proyectos/"+ this.idProyectoSelected)
            .then(response => {
                this.proyectoSelected = response
                this.getCosteos(17)
            })
        },
        getCosteos(id){
            axios.get("/api/tree/" + id).then((response) => {
                this.dataCosteos = JSON.parse(response.data.data.body)
            })
        },
        mostrarGrafico(id_leaf) {
        this.chartOptions.xaxis.categories = []
        axios.get(`api/grafico-proyecto?id_leaf=${id_leaf}&id_proyecto=${19}`)
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
    }
}
</script>