<template>
    <div>
        <div class="card" >
            <div class="card-body" id="contentPDF" >
                <div class="row mt-3">
                    <div class="col-md-6" style="text-align:center">
                        <img :src="image" class="img-fluid">
                    </div>
                    <div class="col-md-6 header-card" >
                        <h3 style="color:#2481b6">
                            {{form2.titulo}}
                        </h3>
                        <h5>{{form2.subtitulo}}</h5>

                        <p>{{form2.description}}</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6 p-0" >
                        <div class="table-responsive">
                            <table class="table table-bordered" @click="editModal('main2')">
                                <tbody>                      
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            Señor(es)
                                        </td>
                                        <td class="td">
                                            {{bodyCotizacion.company}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            RUT
                                        </td>
                                        <td>
                                            {{bodyCotizacion.rut}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            dirección
                                        </td>
                                        <td>
                                            {{bodyCotizacion.direccion}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            COMUNA
                                        </td>
                                        <td>
                                            {{bodyCotizacion.comuna}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            CIUDAD
                                        </td>
                                        <td>
                                            {{bodyCotizacion.ciudad}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" @click="editModal('main3')">
                                <tbody>                      
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            Fecha emisión
                                        </td>
                                        <td>
                                            {{fechaActual}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            Vendedor
                                        </td>
                                        <td>
                                            {{bodyCotizacion.vendedor}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            condición
                                        </td>
                                        <td>
                                            {{bodyCotizacion.condicion}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-header-cotizacion">
                                            REFERENCIA
                                        </td>
                                        <td>
                                            {{bodyCotizacion.referencia}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-custom alert-outline-danger fade show mb-5 ml-3 mr-3" role="alert">
                            <div class="alert-text">N {{id_cotizacion}} ° Cotizacion </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="table-header-cotizacion" style="padding:10px;width: 100%;text-align: center;margin:15px">
                        <h6>Detalles cotización</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="w-100" v-show="!pdf">
                            <label>Seleccione el producto para agregar</label>
                            <v-select :options="productos" v-model="producto" style="width:100%"></v-select>
                        </div>
                        <div class="table-responsive"> 
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            CODIGO
                                        </th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>CANTIDAD</th>
                                        <th>PRECIO UNIT.</th>
                                        <th>SUBTOTAL</th>
                                        <th v-show="isEditBody">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <tr v-show="isEdit">
                                        <td>{{productoSelected.cod}}</td>
                                        <td>{{productoSelected.description}}</td>
                                        <td><input type="number" class="form-control" v-model="form.total"></td>
                                        <td>{{productoSelected.precio}}</td>
                                        <td>{{separator(parseFloat(getTotal))}}</td>
                                        <td><button class="btn btn-sm btn-link" @click="saveProductoEdit(productoSelected.id)">Guardar</button></td>
                                    </tr>                   
                                    <tr v-for="producto in productosAsoc" :key="producto.id">
                                        <td>
                                            {{producto.cod}}
                                        </td>
                                        <td>
                                            {{producto.description}}
                                        </td>
                                        <td>
                                            {{producto.cantidad}}
                                        </td>
                                        <td>
                                            {{producto.precio}}
                                        </td>
                                        <td>
                                            {{separator(parseFloat(producto.total_precio))}}
                                        </td>
                                        <td v-show="!pdf">
                                            <button class="btn btn-link" @click="editProducto(producto.id)">
                                                Editar
                                            </button>
                                            <button class="btn btn-link" @click="deleteProductoEdit(producto.id)">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:90px">
                    <div class="col-md-6">
                        <h4 style="text-transform:uppercase">
                            Observaciones
                        </h4>
                        <textarea v-model="bodyCotizacion.observaciones" class="form-control" cols="8" rows="8" placeholder="Esta es una observacion!!"></textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="table-header-cotizacion" style="padding:10px;width: 94%;text-align: center;margin:15px">
                            <h6>TOTALES</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                MONTO NETO
                                            </th>
                                            <th>19% IVA</th>
                                            <th style="width:23%">Descuento %</th>
                                            <th>Excento</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>                      
                                        <tr>
                                            <td>
                                                {{separator(parseFloat(getMonto))}}
                                            </td>
                                            <td>
                                                {{separator(parseFloat(getMontoIVA))}}
                                            </td>
                                            <td v-show="!pdf">
                                                <input type="text" class="form-control" v-model="descuento">
                                            </td>
                                            <td v-show="pdf">
                                                {{descuento}} %
                                            </td>
                                            <td>
                                                &nbsp;
                                            </td>
                                            <td>
                                                {{separator(parseFloat(getMontoTotal))}}
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
            <div class="d-flex justify-content-end mt-3">
            <div class="d-flex">
                <div>
                    <button class="btn-primary btn-sm" @click="guardarEstructura">
                        Guardar Estructura
                    </button>
                </div>
                <div>
                    <button class="btn-primary btn-sm" @click="generarPDF">
                        Generar PDF
                    </button>
                </div>

            </div>
        </div> 
        <!--/MODAL MAIN1/--->
        <div class="modal fade" id="main1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editando cabecera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Cabecera Principal</label>
                        <input type="text" class="form-control" v-model="bodyCotizacion.header1">
                    </div>
                    <div class="form-group">
                        <label>Cabecera Secundaria</label>
                        <input type="text" class="form-control" v-model="bodyCotizacion.header2">
                    </div>
                    <div class="form-group">
                        <label>Detalle Principal</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" v-model="bodyCotizacion.detalle1"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
        <!--/MODAL MAIN2/--->
        <div class="modal fade modal-right" id="main2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editando seccion principal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Señor (a)</label>
                        <input type="text" class="form-control" v-model="bodyCotizacion.company">
                    </div>
                    <div class="form-group">
                        <label>Rut</label>
                        <input v-model="rut" class="form-control" name="rut" ref="rut" id="rut" type="text" @blur="validateRut"
                            placeholder="12.345.678-0" :class="!error ? ' is-invalid': ''">
                    </div>
                    <div class="form-group">
                        <label>dirección</label>
                        <input type="text" class="form-control" v-model="bodyCotizacion.direccion">
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <select
                            class="form-control"
                            v-model="bodyCotizacion.ciudad"
                            @change="getComunas"
                            >
                            <option value="" v-if="!bodyCotizacion.ciudad"  selected>Region...</option>
                            <option v-for="region in regiones" :key="region.id" :value="region.name">
                                {{ region.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                <label for="city">Comuna *</label>
                        <select
                        class="form-control"
                        v-model="bodyCotizacion.comuna"
                        >
                            <option value="" v-if="!bodyCotizacion.comuna" selected>Comunas...</option>
                            <option v-for="comuna in comunas" :key="comuna.id" :value="comuna.name">
                                {{ comuna.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
        <!--/MODAL MAIN3/--->
        <div class="modal fade modal-left" id="main3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editando seccion secundaria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label>Fecha</label>
                            <input type="date" class="form-control" v-model="bodyCotizacion.fecha" disabled>
                    </div>
                    <div class="form-group">
                        <label>Vendedor</label>
                        <input type="text" class="form-control" v-model="bodyCotizacion.vendedor">
                    </div>
                    <div class="form-group">
                        <label>condición</label>
                        <input v-model="bodyCotizacion.condicion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Referencia</label>
                        <textarea cols="8" rows="8" type="text" class="form-control" v-model="bodyCotizacion.referencia"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
        <!--/MODAL MAIN3/--->
        <div class="modal fade" id="main4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editando seccion secundaria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Se recomiendan imagenes de: 200x70</label>
                    <input type="file" class="form-control" @change="onFileSelected">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-loading"><!-- Place at bottom of page --></div>
    </div>
</template>
<style scoped>
.html2canvas-container { 
    width: 3000px!important; 
    height: 3000px!important; 
}
.header-card{
    text-transform: uppercase;
    text-align: center;
}
.selected {
    -webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0); 
    box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);
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

body {
  background-color: #e1e1e1;
}

table {
    cursor: pointer;
}
.table-header-cotizacion{
    background: #3e97cade!important;
    color: #ffff!important;
    text-transform: uppercase!important;
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
    import VSelect from 'vue-select';
    import { jsPDF } from "jspdf";
    import html2canvas from 'html2canvas';
    let usuario = JSON.parse((document.head.querySelector('meta[name="user"]')).content)
    let fecha = new Date()
    export default {
        components: {
            VSelect,
        },
        data() {
            return {
                image: '',
                form2: {
                    titulo: "",
                    description: "",
                    img: null,
                    subtitulo: "",
                    id : ""
                },
                id_cotizacion : localStorage.getItem('id_cotizacion'),
                pdf: false,
                descuento: 0,
                isEditBody: false, 
                productoSelected: {precio:''},
                form: {total: '', precioTotal : '',id:''},
                productosAsoc: [],
                isEdit: false,
                isAdding : false,
                producto: '',
                productos: [],
                fechaActual: fecha.getDate() +"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear(),
                error: true,
                rut: '78.887.354-2',
                regiones:'',
                comunas: '',
                valueSelectedToEdit: '',
                bodyCotizacion: {},
                valueEditModal: '',
                rut: '',
                error: true,
                bodyId: '',
            }
        },
        watch: {
                rut: function (val) {
                    this.rut = this.cleanRut(this.rut);
                    let len = this.rut.length - 1;
                    if (len > 3) {
                        let dv = this.rut[len];
                        let beforeDv = this.rut.substring(0, len).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        this.rut = beforeDv + '-' + dv;
                    }
                },
                producto: function(){
                    this.addProducto(this.producto.code)
                }
        },

        computed: {
            getTotal: function(){
                const sum = parseFloat(this.form.total) * parseFloat((this.productoSelected.precio).replace(/\./g, ''))
                this.form.precioTotal = sum
                return sum
            },
            getMonto: function(){
                let sum = 0
                for(let i = 0; i < this.productosAsoc.length;i++){
                    sum += this.productosAsoc[i].total_precio
                }
                return sum
            },
            getMontoIVA: function(){
                let sum = 0
                for(let i = 0; i < this.productosAsoc.length;i++){
                    sum += this.productosAsoc[i].total_precio
                }
                return (sum*0.19).toFixed(2)
            },
            getMontoTotal: function(){
                let sum = 0
                for(let i = 0; i < this.productosAsoc.length;i++){
                    sum += this.productosAsoc[i].total_precio
                }
                let val = sum*0.19

                let monto = (val + sum)

                let porcentaje = (this.descuento * monto)/100

                return (monto - porcentaje).toFixed(3)
            }
        },
        created(){
            this.getData()
            this.getBody()
            this.getRegion();
            this.getProductos();
            this.getProductosAsoc();
        },

        methods: { 
            separatorIVA(numb) {
                var str = numb.toString().split(",");
                str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return str.join(",");
            },
            separator(numb) {
                var str = numb.toString().split(".");
                str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                return str.join(".");
            },
            getData(){
                axios.get('https://tanthem.optimaingenieriachile.com/api/cabeceras/1')
                    .then((response) => {
                        this.form2 = response.data.data[0]
                        console.log(response.data.data[0])
                        this.image = 'https://tanthem.optimaingenieriachile.com/images/'+response.data.data[0].img
                    })
                    .catch(error => console.error(error))
            },


            getBody(){
                axios.get('api/get-body/'+localStorage.getItem('id_cotizacion'))
                    .then((response) => {
                        let body = response.data[0].bodyCotizaciones
                        this.bodyId = response.data[0].id
                        this.bodyCotizacion = JSON.parse(body)
                        this.bodyCotizacion = this.bodyCotizacion[0]
                    })
                    .catch(error => console.error(error))
            },
            generarPDF(){
                this.pdf = true
                setTimeout(() => {
                    $('body').toggleClass('loading')
                    this.printPDF()
                }, 1000)
                
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
                    docResult.save(`${new Date().toISOString()}_cotizacion.pdf`);
                    
                    }).finally(() => {
                        this.pdf = !this.pdf
                        $('body').removeClass('loading');
                    });
            },
            guardarEstructura(){
                const json = {
                    body : this.bodyCotizacion
                }
                axios.put("api/guardar-estructura?id="+this.bodyId , json)
                    .then(() => {toastr.success('Estructura Salvada');})
                    .catch(e => {toastr.error('Algo Salio mal');})
            }, 
            getProductosAsoc(){
                axios("/api/productosAsoc?id="+1)
                    .then(res => {
                        this.productosAsoc = res.data
                        console.log(res)
                    })
            },
            editProducto(id){
                this.isEdit = true
                axios.get("/api/productosAsoc/"+id+"?id="+1)
                    .then(res => {
                        this.productoSelected = res.data[0]
                        this.form.total = this.productoSelected.cantidad
                        this.getProductosAsoc()
                        console.log(this.productoSelected)
                    })
                    .catch(error => console.log(error))
            },
            saveProductoEdit(id){
                this.form.id=id
                axios.post('/api/save-producto',this.form)
                    .then(res => {
                        toastr.success('Producto Actualizado');
                        this.getProductosAsoc()
                    })
                    .catch(e => console.log(e))
                    .finally(() => {
                        this.isEdit = false
                    })
            },
            deleteProductoEdit(id){
                axios.delete('/api/delete-producto/'+id)
                    .then(res => {
                        toastr.warning('Producto Eliminado');
                        this.getProductosAsoc()
                    })
                    .catch(e => console.log(e))
                    .finally(() => {
                        this.isEdit = false
                    })
            },
            addProducto(cod){
                console.log(cod)
                let producto = {
                    'id_producto' : cod,
                    'id_cotizacion': 1
                }
                axios.post("/api/productosAsoc",producto)
                    .then(res => {
                        toastr.success('Producto Añadido');
                        this.getProductosAsoc()
                    })
                    .catch(error => console.log(error))
                    .finally(() => {
                        this.isAdding = false
                    })
            },
            getProductos(){
                axios.get("/api/productos")
                    .then(res => {
                        let productos = res.data.data
                        for(let i = 0; i < productos.length; i++){
                            let json = {label: `Codigo ${productos[i].cod} - ${productos[i].description}`,code: productos[i].id };
                            this.productos.push(json)
                        }
                    })

            },
            addProductos(){
                this.isAdding = true
            },
            onFileSelected(e){
                let img = e.target.files[0]
                let urlImage = URL.createObjectURL(img)
                this.bodyCotizacion.logo = urlImage
            },
            cleanRut(value) {
                return value.replace(/^0+|[^0-9kK]+/g, '').toUpperCase();
            },
            validateRut() {
                let rut = this.cleanRut(this.rut);
                let digito_verificador = this.rut.substr(-1);

                rut = rut.substr(0, rut.length - 1);

                let serie = 0;
                let producto = 0;

                do {
                    producto += (rut % 10) * ((serie % 6) + 2);
                    serie++;
                } while (rut = Math.floor(rut / 10));

                let resto = producto % 11;
                let resultado = 11 - resto;

                if (resultado == 11) {
                    resultado = 0;
                } else if (resultado == 10) {
                    resultado = 'K';
                }

                if (digito_verificador != resultado) {
                    this.errorInRut();
                } else {
                    this.error = true;
                    this.bodyCotizacion.rut = this.rut
                }

            },
            errorInRut() {
                this.error = false;
            },
            editModal(value){
                $(`#${value}`).modal('show')
            },
            getRegion(){
                axios.get("/api/regiones")
                .then((response) => {
                    this.regiones =response.data;
                });
            },
            getComunas(idRegion=null, idComuna=null){
                if(idRegion == null){
                    axios.get("/api/comunas-name/"+ idRegion)
                    .then((response) => {
                        this.comunas = idComuna;
                    });
                }
                axios.get("/api/comunas-name/"+ this.bodyCotizacion.ciudad)
                .then((response) => {
                    this.comunas =response.data;
                });
            },
        }

    }
</script>