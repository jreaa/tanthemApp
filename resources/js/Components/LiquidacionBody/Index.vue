<template>
    <div>
        <div class="card" id="liquidacionBody">
            <div class="card-body" id="contentPDF">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center flex-column">
                        <h6>
                            {{form2.titulo}}
                        </h6>
                        <h6>
                            RUT: {{rut}}
                        </h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <img :src="image2" alt="logo">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <h4 class="title">{{form2.description}}</h4>
                    </div>
                    <div class="col-md-12 text-right">
                        <h6>19/02/2022</h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <h4 class="title">Nombre:{{trabajador_name}}</h4>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="title"> Rut: {{trabajador_rut}}</h4>
                    </div>
                </div>


                <div class="row mt-2 p-5">

                    <table class="table table-bordered">

                        <tbody>

                            <tr>
                                <td>
                                    <h6>Sueldo Base</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="sueldo_base" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.sueldo_base))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Gratificaciones</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="gratificaciones" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.gratificaciones))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="title">BASE IMPONIBLE</h6>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="title">$ {{separator(parseFloat(getBaseImponible))}}</h6> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Asig. Movilizacion</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="asig_movilizacion" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.asig_movilizacion))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Asig. Colacion</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="aisg_colacion" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.aisg_colacion))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="title">TOTAL NO IMPONIBLE</h6>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title">$ {{separator(parseFloat(getTotalNoImponible))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="title">TOTAL GANADO</h6>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title">$ {{separator(parseFloat(getTotalGanado))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Fondo de salud</h6> 
                                        </div>
                                        <div class="col-md-6">
                                            <h6>FONASA</h6> 
                                        </div>
                                    </div>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="body.fonasa" @blur="guardarEstructura()">
                                        <span v-show="print">{{separatorIVA(parseFloat(body.fonasa))}}</span>
                                        </h6> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6>$ {{separator(parseFloat(getFonasa))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Inst. Previsional</h6> 
                                        </div>
                                        <div class="col-md-6">
                                            <h6>AFP MODELO</h6> 
                                        </div>
                                    </div>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="body.afp" @blur="guardarEstructura()">
                                        <span v-show="print">{{separatorIVA(parseFloat(body.afp))}}</span>
                                        </h6> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6>$ {{separator(parseFloat(getAfp))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Seguro Cesantia</h6> 
                                        </div>
                                    </div>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="body.seguro_cesantia" @blur="guardarEstructura()">
                                        <span v-show="print">{{separatorIVA(parseFloat(body.seguro_cesantia))}}</span>
                                        </h6> 
                                    </div>
                                    <div class="col-md-6">
                                        <h6>$ {{separator(parseFloat(getSeguroCesantia))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>TOTAL DESCUENTOS</h6>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <h6>$ {{separator(parseFloat(getTotalDescuentos))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h6>ALCANSE LIQUIDO</h6>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <h6>$ {{separator(parseFloat(getAlcanceLiquido))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Anticipos</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="anticipos" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.anticipos))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Ajuste</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="ajuste" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.ajuste))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>TOTAL DESCUENTO</h6>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <h6>$ {{separator(parseFloat(getTotalDescuentos2))}} </h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Rendiciones</h6>
                                </td>
                                <td>
                                    <h6>
                                        <input v-show="!print" type="text" class="form-control" v-model="rendiciones" @blur="guardarEstructura()">
                                        <span v-show="print">{{separator(parseFloat(body.rendiciones))}}</span>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="title">Liquido a pagar</h6>
                                </td>
                                <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="title">$ {{separator(parseFloat(getLiquido))}}</h6> 
                                    </div>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-right d-flex justify-content-center ">
                        <h6 class="d-flex flex-column justify-content-center mr-3 mb-2" >SON: </h6>
                        <span v-show="print">{{body.pie_pagina}}</span> 
                        <input type="text" class="form-control" v-model="body.pie_pagina" v-show="!print" @blur="guardarEstructura()">
                    </div>
                    <div class="col-md-12 text-left">
                        <h6>Santiago, 19/02/2022</h6>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <h6 class="title">Certifico  que  he  recibido  copia  de  la presente Liquidación, y conforme el
                            saldo líquido indicado.  Y no tengo cargo o cobro alguno posterior que hacer.
                        </h6>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <img src="/img/Picture2.png" alt="firma">
                        <h6 class="firmas">
                            FIRMA EMPLEADOR
                        </h6>
                    </div>
                    <div class="col-md-6 firma-empleado">
                        <br>
                        <h6 class="firmas">
                            FIRMA EMPLEADOR
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button @click="generarPDF" class="btn btn-sm btn-primary mt-4">
                Importar PDF
            </button>
        </div>
        <div class="modal-loading"><!-- Place at bottom of page --></div>
    </div>
</template>
<style scoped>
#liquidacionBody{
    text-transform: uppercase;
}
.title {
    font-style: italic;
    font-weight: 600;
}
.firmas {
    width: 80%;
    text-align: center;
    border-top: 2px solid;
    padding-top: 7px;
}
.firma-empleado{
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}
.modal-loading {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 )
    url('https://i.stack.imgur.com/FhHRx.gif')
    50% 50%
    no-repeat;
}
body.loading {
    overflow: hidden;
}
body.loading .modal-loading {
    display: block;
}

</style>
<script>
import { jsPDF } from "jspdf";
import html2canvas from 'html2canvas';
export default {
    data: () => ({
        image2: '',
        form2: {
            titulo: "",
            description: "",
            img: null,
            subtitulo: "",
            id : ""
        },
        rut: '',
        trabajador_name: '',
        trabajador_rut: '',
        print: false,
        sueldo_base: 0,
        gratificaciones: 0,
        asig_movilizacion: 0,
        aisg_colacion: 0,
        anticipos: 0,
        ajuste : 0,
        rendiciones: 0,
        body: {}
    }),
    created(){
        this.getLiquidacion();
        this.getData2()
    },
    computed: {
        getBaseImponible() {
            let base_imponible = (parseFloat(this.body.sueldo_base) + parseFloat(this.body.gratificaciones))
            return base_imponible
        },
        getData2(){
                axios.get('https://tanthem.optimaingenieriachile.com/api/cabeceras/2')
                    .then((response) => {
                        this.form2 = response.data.data[0]
                        this.image2 = 'https://tanthem.optimaingenieriachile.com/images/'+response.data.data[0].img
                        this.rut = response.data.data[0].subtitulo
                    })
                    .catch(error => console.error(error))
        },
        getTotalNoImponible() {
            let total_no_imponible = (parseFloat(this.body.asig_movilizacion) + parseFloat(this.body.aisg_colacion))
            return total_no_imponible
        },
        getTotalGanado() {
            let base_imponible = this.getBaseImponible
            let getTotalNoImponible = this.getTotalNoImponible
            let total_ganado = (base_imponible + getTotalNoImponible)
            return total_ganado
        },
        getAfp(){
            let base_imponible = this.getBaseImponible
            let total_afp =  ((base_imponible * this.body.afp)/100)
            return total_afp
        },
        getFonasa(){
            let base_imponible = this.getBaseImponible
            let total_fonasa =  ((base_imponible * this.body.fonasa)/100)
            return total_fonasa
        },
        getSeguroCesantia(){
            let base_imponible = this.getBaseImponible
            let total_cesantia =  ((base_imponible * this.body.seguro_cesantia)/100)
            return total_cesantia
        },
        getTotalDescuentos(){
            let total_descuentos = this.getAfp + this.getFonasa + this.getSeguroCesantia
            return total_descuentos
        },
        getAlcanceLiquido(){
            let total_liquidos = this.getTotalGanado - this.getTotalDescuentos
            return total_liquidos
        },
        getTotalDescuentos2(){
            let total_descuentos = parseFloat(this.body.anticipos) + parseFloat(this.body.ajuste)
            return total_descuentos
        },
        getLiquido(){
            let total_liquidos = (this.getAlcanceLiquido - this.getTotalDescuentos2) + parseFloat(this.body.rendiciones)
            console.log(total_liquidos)
            return total_liquidos
        }

    },
    watch: {
        sueldo_base: function(num){
            let value = this.transformNumbers(num)
            this.body.sueldo_base = this.splitNumbers(num)
            this.sueldo_base = value
        },
        gratificaciones: function (num){
            let value = this.transformNumbers(num)
            this.body.gratificaciones = this.splitNumbers(num)
            this.gratificaciones = value
        },
        asig_movilizacion: function (num){
            let value = this.transformNumbers(num)
            this.body.asig_movilizacion = this.splitNumbers(num)
            this.asig_movilizacion = value
        },
        aisg_colacion: function (num){
            let value = this.transformNumbers(num)
            this.body.aisg_colacion = this.splitNumbers(num)
            this.aisg_colacion = value
        },
        anticipos: function (num){
            let value = this.transformNumbers(num)
            this.body.anticipos = this.splitNumbers(num)
            this.anticipos = value
        },
        rendiciones: function (num){
            let value = this.transformNumbers(num)
            this.body.rendiciones = this.splitNumbers(num)
            this.rendiciones = value
        },
        ajuste: function (num){
            let value = this.transformNumbers(num)
            this.body.ajuste = this.splitNumbers(num)
            this.ajuste = value
        }
    },
    methods: {
        setValues(){
            this.sueldo_base = this.body.sueldo_base
            this.gratificaciones = this.body.gratificaciones
            this.asig_movilizacion = this.body.asig_movilizacion
            this.aisg_colacion = this.body.aisg_colacion
            this.anticipos = this.body.anticipos
            this.ajuste = this.body.ajuste
            this.rendiciones = this.body.rendiciones
        },
        guardarEstructura(){
            const json = {
                body : this.body
            }
            axios.put("api/guardar-estructura/liquidacion?id="+localStorage.getItem("id_liquidacion"), json)
                .then(() => {})
                .catch(e => {})
        }, 
        getLiquidacion(){
            axios.get("/api/get-body/liquidacion/"+localStorage.getItem("id_liquidacion"))
                .then((response) => {
                    let arrayBody = response.data[0].bodyCotizaciones
                    this.body = JSON.parse(arrayBody)[0]
                    this.trabajador_name = response.data[0].trabajador_name
                    this.trabajador_rut  = response.data[0].trabajador_rut
                    this.setValues()
                })
                .catch(e => console.error(e))
        },
        splitNumbers(num){
            let str = num.toString().split(".")
            if(str.length > 1 && str.length <= 2){
                str[0] = str[0] + str[1]
            }else if(str.length > 2 && str.length <= 3){
                str[0] = str[0] + str[1] + str[2]
            }else if(str.length > 3){
                str[0] = str[0] + str[1] + str[2] + str[3]
            }
            return str[0]
        },
        transformNumbers(num){
            let str = this.splitNumbers(num)
            return str = str.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
        printPDF(){
                const DATA = document.getElementById('contentPDF');
                const doc = new jsPDF('p', 'pt', 'a4');
                const options = {
                background: 'white',
                scale: 3
                };
                html2canvas(DATA, options).then((canvas) => {

                const img = canvas.toDataURL('image/PNG');

                // Add image Canvas to PDF
                const bufferX = 15;
                const bufferY = 15;
                const imgProps = (doc).getImageProperties(img);
                const pdfWidth = doc.internal.pageSize.getWidth() - 2 * bufferX;
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                doc.addImage(img, 'PNG', bufferX, bufferY, pdfWidth, pdfHeight, undefined, 'FAST');
                return doc;
                }).then((docResult) => {
                docResult.save(`${new Date().toISOString()}_liquidacion.pdf`);
                
                }).finally(() => {
                    this.print = !this.print
                    $('body').removeClass('loading');
                });
        },
        generarPDF(){
            this.print = true
            setTimeout(() => {
                $('body').toggleClass('loading')
                this.printPDF()
            }, 1000)
            
        },
        separatorIVA(numb) {
            var str = numb.toString().split(".");
            str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return str.join(",");
        },
        separator(numb) {
            var str = numb.toString().split(".");
            str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return str.join(".");
        },
    },
}
</script>