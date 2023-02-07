<template>
    <div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <router-link
                :to="{ name: 'accion.index' }"  class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </router-link>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <a href="/" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Configuracion Cabeceras</a>
        <!--end::Item-->
    </div>
    <h3 class="mt-4 mb-3">Mis Cabeceras</h3>
        <div class="card" >
            <div class="card-header">
                <h4 class="mt-4 p-3">CABECERA: COTIZACION</h4>
            </div>
            
            <div class="card-body" id="contentPDF" >
                <div class="row mt-3">
                    
                    <div class="col-md-6" @click="editModal('main4')" style="text-align:center; cursor:pointer">
                        <img :src="image" class="img-fluid">
                    </div>
                    <div class="col-md-6 header-card" style="cursor:pointer" @click="editModal('main1')">
                        <h3 style="color:#2481b6">
                            {{form.titulo}}
                        </h3>
                        <h5>{{form.subtitulo}}</h5>

                        <p>{{form.description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card" id="liquidacionBody">
            <div class="card-header">
                <h4 class="mt-4 p-3">Cabecera: Liquidación</h4>
            </div>
            <div class="card-body" id="contentPDF">
                <div class="row" >
                    <div class="col-md-6 d-flex justify-content-center flex-column">
                        <h6 @click="editModal('main2')">
                            {{form2.titulo}}
                        </h6>
                        <h6 @click="editModal('main2')">
                            RUT: {{rut}}
                        </h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <img :src="image2" alt="logo" @click="editModal('main3')">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-center" @click="editModal('main2')">
                        <h4 class="title">{{form2.description}}</h4>
                    </div>
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
                        <input type="text" class="form-control" v-model="form.titulo">
                    </div>
                    <div class="form-group">
                        <label>Cabecera Secundaria</label>
                        <input type="text" class="form-control" v-model="form.subtitulo">
                    </div>
                    <div class="form-group">
                        <label>Detalle Principal</label>
                        <textarea type="text" cols="8" rows="8" class="form-control" v-model="form.description"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateData">Guardar cambios</button>
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
                    <input type="file" class="form-control" @change="getImage">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateData">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-loading"><!-- Place at bottom of page --></div>


        
        <!--/MODAL MAIN1/--->
        <div class="modal fade" id="main2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <label>Nombre Empresa</label>
                        <input type="text" class="form-control" v-model="form2.titulo">
                    </div>
                    <div class="form-group">
                        <label>Rut</label>
                        <input v-model="rut" class="form-control" name="rut" ref="rut" id="rut" type="text" @blur="validateRut"
                            placeholder="12.345.678-0" :class="!error ? ' is-invalid': ''">
                    </div>
                    <div class="form-group">
                        <label>Titulo Principal</label>
                        <input type="text" class="form-control" v-model="form2.description">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateData2">Guardar cambios</button>
                </div>
                </div>
            </div>
        </div>

        <!--/MODAL MAIN3/--->
        <div class="modal fade" id="main3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <input type="file" class="form-control" @change="getImage2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="updateData2">Guardar cambios</button>
                </div>
                </div>
            </div>
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
    let fecha = new Date()
    export default {
        components: {
            VSelect,
        },
        data() {
            return {
                image: '',
                form: {
                    titulo: "",
                    description: "",
                    img: null,
                    subtitulo: "",
                    id : ""
                },
                image2: '',
                form2: {
                    titulo: "",
                    description: "",
                    img: null,
                    subtitulo: "",
                    id : ""
                },
                img: null,
                img2: null,
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
        created(){
            this.getData()
            this.getData2()
        },
        computed : {
            image(){
                return this.image
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
        },

        methods: { 
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
            getImage(e){
                let file = e.target.files[0]
                this.img = file
                this.uploadImage(file)
            },
            uploadImage(file){
                let render = new FileReader()

                render.onload= (e) => {
                    this.image = e.target.result
                }

                render.readAsDataURL(file)
            },
            getData(){
                axios.get('https://tanthem.optimaingenieriachile.com/api/cabeceras/1')
                    .then((response) => {
                        this.form = response.data.data[0]
                        console.log(response.data.data[0])
                        this.image = 'https://tanthem.optimaingenieriachile.com/images/'+response.data.data[0].img
                    })
                    .catch(error => console.error(error))
            },
            getImage2(e){
                let file = e.target.files[0]
                this.img2 = file
                this.uploadImage2(file)
            },
            uploadImage2(file){
                let render = new FileReader()

                render.onload= (e) => {
                    this.image2 = e.target.result
                }

                render.readAsDataURL(file)
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
            updateData2() {
                    let formData = new FormData()
                    formData.append('titulo', this.form2.titulo)
                    formData.append('subtitulo', this.form2.subtitulo)
                    formData.append('description', this.form2.description)
                    formData.append('img', this.img2)
                    formData.append('id', this.form2.id)
                    
                    axios.post('https://tanthem.optimaingenieriachile.com/api/cabeceras', formData)
                    .then(() => {toastr.success('Estructura Salvada');})
                    .catch(e => {toastr.error('Algo Salio mal');})
            },

            updateData() {
                    let formData = new FormData()
                    formData.append('titulo', this.form.titulo)
                    formData.append('subtitulo', this.form.subtitulo)
                    formData.append('description', this.form.description)
                    formData.append('img', this.img)
                    formData.append('id', this.form.id)
                    
                    axios.post('https://tanthem.optimaingenieriachile.com/api/cabeceras', formData)
                    .then(() => {toastr.success('Estructura Salvada');})
                    .catch(e => {toastr.error('Algo Salio mal');})
            },
            deleteData(){
                    axios.delete('https://tanthem.optimaingenieriachile.com/api/cabeceras/1')
                    .then((response) => {
                        console.log(response.data)
                    })
                    .catch(error => console.error(error))
            },

            addProductos(){
                this.isAdding = true
            },
            onFileSelected(e){
                let img = e.target.files[0]
                let urlImage = URL.createObjectURL(img)
                this.bodyCotizacion.logo = urlImage
            },

            editModal(value){
                $(`#${value}`).modal('show')
            },

        }

    }
</script>