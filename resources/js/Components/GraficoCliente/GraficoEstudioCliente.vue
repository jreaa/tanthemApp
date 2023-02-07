<template>
    <div>
        <div id="chart">
            <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            series: [],
            chartOptions: {
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    },
                },
                responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                    position: 'bottom',
                    offsetX: -10,
                    offsetY: 0
                    }
                }
                }],
                plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10,
                    dataLabels: {
                    total: {
                        enabled: true,
                        style: {
                        fontSize: '13px',
                        fontWeight: 900
                        }
                    }
                    }
                },
                },
                xaxis: {
                    type: 'datetime',
                    categories:[],
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy'
                    },
                },
                legend: {
                position: 'right',
                offsetY: 40
                },
                legend: {
                    labels: {
                        colors: ['#f5c27a', '#9edfff', '#9cee96', '#f9f580','#cceeff','#ffa800']
                    }
                }

            },
        }
            
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get("/api/estudio-proyecto-estados")
                .then(response => {
                    const keys = response.data.keys;
                    const valores = response.data.valores;
                    const fechas = response.data.fechas;
                    const colores = response.data.colores;
                    
                    fechas.map((val) => {
                        this.chartOptions.xaxis.categories.push(val);
                    })

                    keys.map((val, index) => {
                        let json = {
                            name: val,
                            data: valores[val],
                            color: colores[val][0]
                        };
                        
                        this.series.push(json);
                    })

                    //console.log(this.series, this.chartOptions.xaxis.categories);


                })
        }
    }
}

</script>