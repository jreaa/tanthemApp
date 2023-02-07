<template>
    <div>
        <div class="row mb-4">
              <!--/nombre contacto/-->
            <div class="form-group col-md-3">
            <label for="contactName">Nombre contacto </label>
            <input
                type="text"
                id="contactName"
                class="form-control"
                v-model="form.name"
                :disabled="contactos.length == 4 && !editContacto ? true : false"
                v-bind:class="errors.name ? ' is-invalid' : '' "
            />
                
            <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.name">
                {{ errors.name[0] }}
            </div>

            </div>
            <div class="form-group col-md-3">
            <label for="rut">Rut Cliente</label>
            <input v-model="rut2" class="form-control" type="text" @blur="validateRut2"
                    :disabled="contactos.length == 4 && !editContacto ? true : false"
                    placeholder="12.345.678-0" :class="!error2 ? ' is-invalid': ''">
            <span id="mensajeOpcional"><strong></strong></span>
            
            <div style="display:block!important" class="invalid-feedback" v-if="errors.rutCliente">
                {{ errors.rutCliente[0] }}
            </div>
            </div>
            <!--/telefono/-->
            <div class="form-group col-md-3">
                <label for="contactName">Telefono </label>
                <input
                    type="text"
                    class="form-control"
                    v-model="form.telefono"
                    :disabled="contactos.length == 4 && !editContacto ? true : false"
                    v-bind:class="errors.telefono ? ' is-invalid' : '' "
                />
                    
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.telefono">
                    {{ errors.telefono[0] }}
                </div>
            </div>

            <!--/email/-->
            <div class="form-group col-md-3">
                <label for="contactName">Email </label>
                <div class="d-flex">
                    <input
                    type="text"
                    class="form-control"
                    v-model="form.email"
                    :disabled="contactos.length == 4 && !editContacto ? true : false"
                    v-bind:class="errors.email ? ' is-invalid' : '' "
                />
                    <button 
                    type="button"
                    class="btn btn-primary ml-3" 
                    @click="addContacto" v-show="contactos.length < 4 && !editContacto">
                    +
                    </button> 
                    <button 
                    type="button"
                    class="btn btn-primary ml-3" 
                    @click="editContactoSelected(idContacto)" v-show="editContacto" >
                    Guardar
                    </button> 
                </div>
                    
                <div style="display:block!important" class="invalid-feedback" v-if="errors && errors.email">
                    {{ errors.email[0] }}
                </div>

            </div>
        </div>
      <!--/ TABLA CONTACTOS (4) /-->
      <table class="table" v-if="contactos.length >= 1">
            <thead>
                <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Nombre Contacto</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">
                        Acciones
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="contacto in contactos" :key="contacto.id">
                    <th scope="row">
                        <i class="flaticon2-user icon-lg"></i>
                    </th>
                    <td>{{contacto.name}}</td>
                    <td>{{contacto.rut}}</td>
                    <td>{{contacto.telefono}}</td>
                    <td>{{contacto.email}}</td>
                    <td nowrap="nowrap">
                        <button
                            @click="getContacto(contacto)"
                            class="btn btn-sm btn-clean btn-icon"
                            title="Actualizar Clientes"
                            type="button"
                                    
                        >
                            <i class="la la-edit"></i>
                        </button>
                        <button
                            @click="deleteContactoSelected(contacto)"
                            type="button"
                            title="Eliminar Clientes"
                            class="btn btn-sm btn-clean btn-icon">
                            <i class="la la-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
      </table>
    </div>
</template>

<script>
export default {
    props: ['clienteSelected','editMode','contactsBody'],
    data() {
        return {
            form: {
                name : '',
                rut: '',
                telefono: '',
                email: '',
                id_cliente: ''
            }, 
            errors: {},
            error2: true,
            idContacto:'',
            editContacto: false,
            contactos: [],
            rut2: '',
        }
    },
    watch: {
        clienteSelected: function(val) {
            this.contactos = [];
            if(val) {
                this.getContactos(val);
            }
           
        },
        rut2: function (val) {
          this.rut2 = this.cleanRut(this.rut2);
          let len = this.rut2.length - 1;
          if (len > 3) {
              let dv = this.rut2[len];
              let beforeDv = this.rut2.substring(0, len).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
              this.rut2 = beforeDv + '-' + dv;
          }
      }
    },
    methods: {
        cleanRut(value) {
            return value.replace(/^0+|[^0-9kK]+/g, '').toUpperCase();
        },
        validateRut2() {
        let rut = this.cleanRut(this.rut2);
        let digito_verificador = this.rut2.substr(-1);


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
            this.errorInRut2();
        } else {
            this.error2 = true;
        }

        },
        errorInRut2() {
            this.error2 = false;
        },
        addtoBodyContacto() {
            this.contactsBody.push({
                id: Math.floor(Math.random() * 100),
                name : this.form.name,
                rut: this.rut2,
                telefono: this.form.telefono,
                email: this.form.email,
                id_cliente: ''
            });
            this.contactos = this.contactsBody

            this.resetValues();
        },
        saveContacto(){
            this.form.rut = this.rut2;
            this.form.id_cliente = this.clienteSelected;
            axios.post("/api/contactos", this.form)
                .then(() => {
                    toastr.success('Contacto Guardado');
                    this.errors = {}
                    this.getContactos(this.clienteSelected);
                }).catch(error => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors;
                        toastr.error('Error de Guardado');
                    }
                });
        },
        addContacto(){
            if(!this.editMode) {
                this.saveContacto();
            }
            this.addtoBodyContacto();
        },
        getContacto(contacto) {
            this.editContacto = true;
            if(!this.editMode) {
                axios.get("/api/contactos/"+contacto.id)
                    .then((response) => {
                        this.form = response.data
                        this.rut2 = response.data.rut
                    })
                
            } else {
                this.form = contacto
                this.rut2 = contacto.rut
            }
        },
        getContactos(id) {
            axios.get("/api/contactos_cliente/"+id)
                .then((response) => {
                    this.contactos = response.data
                })
        },
        deleteContactoSelected(contacto) {
            if(!this.editMode) {
                axios.delete("/api/contactos/"+contacto.id)
                .then(() => {
                    toastr.success('Contacto Eliminado');
                    this.errors = {}
                    this.getContactos(this.clienteSelected);
                }).catch(error => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors;
                        toastr.error('Error de Eliminado');
                    }
                })
                
            } else {
                const contactosBody = this.contactos.filter((item, index) => {
                    return item.id !== contacto.id
                })
                this.contactos = contactosBody;
            }

        },
        editContactoSelected(id) {
            this.editContacto = false;
            if(!this.editMode) {
                this.form.rut = this.rut2;

                axios.put("/api/contactos/"+this.form.id, this.form)
                    .then(() => {
                        toastr.success('Contacto Actualizado');
                        this.errors = {}
                        this.getContactos(this.clienteSelected);
                    }).catch(error => {
                        if(error.response.status === 422){
                            this.errors = error.response.data.errors;
                            toastr.error('Error de Actualizado');
                        }
                    })
                    .finally(() => {
                        
                        this.resetValues();
                    });
                
            } else {
                const contactoBody = this.contactos.map((item, index) => {
                    if(item.id == this.form.id) {
                        this.form.rut = this.rut2
                        return this.form;
                    }
                    return item;
                })
                this.resetValues();
            }

        },
        resetValues() {
            this.form.name = '';
            this.form.rut = '';
            this.form.telefono = '';
            this.form.email = '';
            this.rut2 = '';
        }
    }
}
</script>