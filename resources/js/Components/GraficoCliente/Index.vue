<template>
  <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'tipoclientes.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Grafico Proyectos</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4">Grafico Proyectos</h3>
    <br />
    <div class="card card-custom">
      <div class="card-header flex-wrap py-5">
        <div class="card-title">
          <h3 class="card-label">
            Datos de los Proyectos asociado
            <span class="d-block text-muted pt-2 font-size-sm"
              >A continuacion podra observar el estado de cada uno de sus tipo de
              proyectos.</span
            >
          </h3>
        </div>
        <div class="card-toolbar">
          <!--begin::Dropdown-->
          <div class="dropdown dropdown-inline mr-2">
           
          </div>

          <!--end::Button-->
        </div>
      </div>
      <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                            <spinner 
                            v-if="isLoading"
                            message="Cargando estudio proyectos..." 
                            size="large" 
                            line-fg-color="#1BC5BD" >
                            </spinner>

                    <h3 v-if="!isLoading" style="margin-bottom: 15px;margin-left: 15px;">Grafico Estado de Proyectos</h3>
                    <GraficoEstudioCliente />
                </div>
            </div>
            <!--
            <div class="row" v-if="!isLoading">
                <div class="col-md-12">                
                    <div class="card">
                        <div class="card-header">
                            <h3>Porcentajes Totales</h3>
                        </div>
                        <div class="card-body">
                            <h3>Fecha : {{fecha.getDate() + "/" + (fecha.getMonth()+1) + "/" + fecha.getFullYear()}}</h3>
                            <div id="tableData" class="table-responsive" style="margin-top:40px"></div>
                        </div>
                    </div>
                    
                </div>
                
            </div> -->
      </div>
    </div>

        <h3 class="mt-4" style="padding-top: 20px">Estudio Usuarios</h3>
        <br />
        <div class="row ">
            <div class="col-lg-12">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                        <h3 class="card-label">
                            Datos de los Usuario registrados
                            <span class="d-block text-muted pt-2 font-size-sm"
                            >A continuacion podra observar el comportamiento de sus usuarios.</span
                            >
                        </h3>
                        </div>
                        <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                        
                        </div>

                        <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <label for="">Seleccione un usuario</label>
                            <select class="form-control" v-model="userSelect">
                                <option :value="usuario.id" v-for="usuario in usuarios" :key="usuario.id">
                                    {{usuario.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-warning" style="width:30%" v-if="series2[0].data == ''">
                        Por favor seleccione un usuario a analizar
                    </div>
                    <spinner 
                    v-if="isLoading2"
                    message="Cargando estudio proyectos..." 
                    size="large" 
                    line-fg-color="#1BC5BD" >
                    </spinner>
                    <apexchart v-if="series2[0].data != ''" type="heatmap" height="350" :options="chartOptions2" :series="series2"></apexchart>
                    </div>
                </div>
            </div>
        </div>


  </div>
</template>

<script>
import VueApexCharts from 'vue-apexcharts'
import Spinner from 'vue-simple-spinner'
import fechas from '../../fechas'
import GraficoEstudioCliente from './GraficoEstudioCliente.vue';
export default {
    components: {
        Spinner,
        GraficoEstudioCliente
    },
    data() {
        return {
            table : '',
            isLoading: false,
            isLoading2: false,
            fecha: new Date(),
            series: [],
            chartOptions: {
                chart: {
                    type: 'area',
                    height: 350,
                    stacked: true,
                },
                colors: [],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                    opacityFrom: 0.6,
                    opacityTo: 0.8,
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left'
                },
                xaxis: {
                    type: 'datetime',
                    categories : []
                },
            },
            usuarios : {},
            userSelect : '',
            series2: [{
                name: '00:00',
                data: []
            },
            {
                name: '01:00',
                data: []
            },
            {
                name: '02:00',
                data: []
            },
            {
                name: '03:00',
                data: []
            },
            {
                name: '04:00',
                data: []
            },
            {
                name: '05:00',
                data: []
            },
            {
                name: '06:00',
                data: []
            },
            {
                name: '07:00',
                data: []
            },
            {
                name: '08:00',
                data: []
            },
            {
                name: '09:00',
                data: []
            },
            {
                name: '10:00',
                data: []
            },
            {
                name: '11:00',
                data: []
            },
            {
                name: '12:00',
                data: []
            },{
                name: '13:00',
                data: []
            },{
                name: '14:00',
                data: []
            },
            {
                name: '15:00',
                data: []
            },
            {
                name: '16:00',
                data: []
            },
            {
                name: '17:00',
                data: []
            },
            {
                name: '18:00',
                data: []
            },
            {
                name: '19:00',
                data: []
            },
            {
                name: '20:00',
                data: []
            },
            {
                name: '21:00',
                data: []
            },
            {
                name: '22:00',
                data: []
            },

            ],
            chartOptions2: {
                chart: {
                height: 350,
                type: 'heatmap',
                },
                dataLabels: {
                enabled: false
                },
                colors: ["#008FFB"],
                xaxis: {
                type: 'category',
                categories: [
                    
                    fechas.date30.getDate()+"/"+ (fechas.date30.getMonth()+1) + "/" + fechas.date30.getFullYear(),
                    fechas.date29.getDate()+"/"+ (fechas.date29.getMonth()+1) + "/" + fechas.date29.getFullYear(),
                    fechas.date28.getDate()+"/"+ (fechas.date28.getMonth()+1) + "/" + fechas.date28.getFullYear(),
                    fechas.date27.getDate()+"/"+ (fechas.date27.getMonth()+1) + "/" + fechas.date27.getFullYear(), 
                    fechas.date26.getDate()+"/"+ (fechas.date26.getMonth()+1) + "/" + fechas.date26.getFullYear(),
                    fechas.date25.getDate()+"/"+ (fechas.date25.getMonth()+1) + "/" + fechas.date25.getFullYear(),
                    fechas.date24.getDate()+"/"+ (fechas.date24.getMonth()+1) + "/" + fechas.date24.getFullYear(),
                    fechas.date23.getDate()+"/"+ (fechas.date23.getMonth()+1) + "/" + fechas.date23.getFullYear(),
                    fechas.date22.getDate()+"/"+ (fechas.date22.getMonth()+1) + "/" + fechas.date22.getFullYear(),
                    fechas.date21.getDate()+"/"+ (fechas.date21.getMonth()+1) + "/" + fechas.date21.getFullYear(),
                    fechas.date20.getDate()+"/"+ (fechas.date20.getMonth()+1) + "/" + fechas.date20.getFullYear(), 
                    fechas.date19.getDate()+"/"+ (fechas.date19.getMonth()+1) + "/" + fechas.date19.getFullYear(),

                    fechas.date18.getDate()+"/"+ (fechas.date18.getMonth()+1) + "/" + fechas.date18.getFullYear(),
                    fechas.date17.getDate()+"/"+ (fechas.date17.getMonth()+1) + "/" + fechas.date17.getFullYear(),
                    fechas.date16.getDate()+"/"+ (fechas.date16.getMonth()+1) + "/" + fechas.date16.getFullYear(),
                    fechas.date15.getDate()+"/"+ (fechas.date15.getMonth()+1) + "/" + fechas.date15.getFullYear(),
                    fechas.date14.getDate()+"/"+ (fechas.date14.getMonth()+1) + "/" + fechas.date14.getFullYear(), 
                    fechas.date13.getDate()+"/"+ (fechas.date13.getMonth()+1) + "/" + fechas.date13.getFullYear(),

                    fechas.date12.getDate()+"/"+ (fechas.date12.getMonth()+1) + "/" + fechas.date12.getFullYear(),
                    fechas.date11.getDate()+"/"+ (fechas.date11.getMonth()+1) + "/" + fechas.date11.getFullYear(),
                    fechas.date10.getDate()+"/"+ (fechas.date10.getMonth()+1) + "/" + fechas.date10.getFullYear(),
                    fechas.date9.getDate()+"/"+ (fechas.date9.getMonth()+1) + "/" + fechas.date9.getFullYear(),
                    fechas.date8.getDate()+"/"+ (fechas.date8.getMonth()+1) + "/" + fechas.date8.getFullYear(), 
                    fechas.date7.getDate()+"/"+ (fechas.date7.getMonth()+1) + "/" + fechas.date7.getFullYear(),

                    fechas.date6.getDate()+"/"+ (fechas.date6.getMonth()+1) + "/" + fechas.date6.getFullYear(),
                    fechas.date5.getDate()+"/"+ (fechas.date5.getMonth()+1) + "/" + fechas.date5.getFullYear(),
                    fechas.date4.getDate()+"/"+ (fechas.date4.getMonth()+1) + "/" + fechas.date4.getFullYear(),
                    fechas.date3.getDate()+"/"+ (fechas.date3.getMonth()+1) + "/" + fechas.date3.getFullYear(),
                    fechas.date2.getDate()+"/"+ (fechas.date2.getMonth()+1) + "/" + fechas.date2.getFullYear(), 
                    fechas.date1.getDate()+"/"+ (fechas.date1.getMonth()+1) + "/" + fechas.date1.getFullYear(), 
                    ]
                },
                title: {
                text: 'Mapa de calor - Ultimos 30 dias'
                },
            },
        }
    },
    created() {
        this.getUsers();
        this.getData();
        
    },
    watch: {
        userSelect : function() {
            this.getDataHeatMap();
        }
    },

    methods: {
        getData(){
            this.isLoading = true;
            axios.get('api/grafico-clientes')
            .then(response => {
                console.log(response.data.fechas);
                
                //let array = [];
                for(let i=0;i< response.data.estadosNames.length;i++){
                    let json = {
                        name: response.data.estadosNames[i],
                        data: response.data.values[i]
                    }
                    this.series.push(json);
                }

                for(let i=0;i< response.data.fechas.length;i++){
                    this.chartOptions.xaxis.categories.push(response.data.fechas[i]);
                }
                for(let i=0;i< response.data.estadosColor.length;i++){
                    this.chartOptions.colors.push(response.data.estadosColor[i]);
                }

                //console.log(array);

                this.table += `
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Estado</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">%</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                for(let i=0;i< response.data.estadosNames.length;i++){
                    this.table += `
                        <tr>
                            <th scope="row">${response.data.estadosNames[i]}</th>
                            <td>${response.data.qTable[i]}</td>
                            <td>${response.data.qporcentaje[i]}</td>
                        </tr>
                    `;
                }

                this.table += `
                        </tbody>
                    </table>
                `;

                $("#tableData").html(this.table);
            })
            .catch(error => console.error(error))
            .finally(() => this.isLoading = false);
        },
        eachHeapMap(array, dato){
            for (let index = 0; index < array.length; index++) {
                dato.push(array[index]);
            }
        },
        getDataHeatMap(){
            this.isLoading2 = true;
            axios.get(`/api/estudio-user?id=${this.userSelect}`)
                .then(response => {
                    
                    for (let index = 1; index < 24; index++) {
                        this.series2[index-1].data = [];
                        this.eachHeapMap(response.data[`hora${index}`], this.series2[index-1].data);
                    }
                    window.dispatchEvent(new Event('resize'))
                })
                .catch(error => console.log(error))
                .finally(() => this.isLoading2 = false);
        },
        getUsers(){
            axios.get("/api/users")
                .then(response => {
                    this.usuarios = response.data;
                })  
                .catch(error => console.log(error));
        },
        sendData() {
            axios.post('http://localhost:8000/api/producto', this.form).then( response => {
                console.log(response);
            })
        }
        
    },
};
</script>
<style scoped>
.apexcharts-toolbar{
    top: -18px!important;;
}
</style>
<style>
.apexcharts-heatmap-rect{
   stroke: #c8c8c88c!important;
}
i{
  cursor: pointer;
}
.btnValue2{
    border: 0px;
    background: transparent;
    width: 150%;
    outline: none;
}
</style>