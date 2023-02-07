<template>
<div>
    <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
        <!--begin::Item-->
        <a href="#" class="opacity-75 hover-opacity-100" bis_skin_checked="1">
          <i class="flaticon2-shelter"></i>
        </a>
        <!--end::Item-->
        <!--begin::Item-->
        <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
        <router-link
                :to="{ name: 'pendientes.index' }"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Mis Pendientes</router-link>
        <!--end::Item-->
        <!--end::Item-->
    </div>

    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Mis Pendientes</span>
                <span class="text-muted mt-1 font-weight-bold font-size-sm">A continuacion podra observar los seguimientos que se han registrado pendientes</span>
            </h3>
            
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            <FullCalendar :options="calendarOptions" />
        </div>
        <!--end::Body-->
    </div>
       <!--Modal-->
    <div class="modal" tabindex="-1" id="createModal">
      <form class="modal-dialog modal-lg" @submit.prevent="SendData">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              {{ editMode ? "Agregar" : "Editar" }} Seguimiento Pendiente
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <i aria-hidden="true" class="ki ki-close"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row mb-4">
              <div class="form-group col-md-12">
                <label for="n_interno">Cliente</label>
                <v-select :options="options2" v-model="form.client_id"></v-select>
              </div>
              <div class="form-group col-md-12">
                <label for="n_interno">Fecha</label>
                <input type="date" v-model="form.date" class="form-control">
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.date"
                >
                  {{ errors.date[0] }}
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="rut">Accion </label>
                    <select v-bind:class="errors.action ? ' is-invalid' : ''" type="text" v-model="form.action" class="form-control">
                        <option :value="accion.id" v-for="accion in acciones.data" :key="accion.id">
                            {{accion.name}}
                        </option>
                    </select>
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.accion"
                >
                  {{ errors.accion[0] }}
                </div>
              </div>
              <div class="form-group col-md-12">
                <label for="email">Comentario</label>
                <input v-bind:class="errors.comment ? ' is-invalid' : ''" type="text" v-model="form.comment" class="form-control"  placeholder="Esto es un comentario">  
                <div
                  style="display: block !important"
                  class="invalid-feedback"
                  v-if="errors.comment"
                >
                  {{ errors.comment[0] }}
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex">
            <div class="ml-auto">
              <button
                type="button"
                class="btn btn-secondary mr-2"
                data-dismiss="modal"
              >
                Cancelar
              </button>
              <button
                type="submit"
                class="btn btn-primary"
                :class="{
                  'spinner spinner-white spinner-right': clientFormLoading,
                }"
                :disabled="clientFormLoading"
              >
                Guardar
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!--endModal-->
</div>
</template>

<script>
let user = document.head.querySelector('meta[name="user"]');
import '@fullcalendar/core/vdom' // solves problem with Vite

import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import esLocale from '@fullcalendar/core/locales/es';
export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available

    },
    data(){
        return {
            usuario: JSON.parse(user.content),
            calendarOptions: {
            locale: esLocale,
            plugins: [ dayGridPlugin, interactionPlugin ],
            eventClick: this.handleEventClick,
            dateClick: this.handleDateClick,
            initialView: 'dayGridMonth',
            initialView: 'dayGridMonth',
            buttonText : 
            {
                today:    'Hoy',
                month:    'Mes',
                week:     'Semana',
                day:      'Dia',
                list:     'Lista'
            },
            events:[]
            },
            form : {
                contact : '',
                comment : '',
                date : '',
                action : '',
                client_id : '',
                prox_agendamiento: true
            },
            errors: {},
            editMode: null,
            clientFormLoading: false,
            cliente: {},
            registro : false,
            editMode: null,
            id : '',
            acciones: {},
            options2: [],
        }
    },
    mounted() {
        this.getSeguimiento(this.$route.params.id);
        this.getAcciones();
        this.getClientes();
    },
    methods: {
        getClientes() {

            axios.get("/api/clientes-all").then((response) => {
                //this.clientes = response.data.data;
                const clientes = response.data.data;
                

                for(let i = 0; i < clientes.length; i++){
                let json = {label: `${clientes[i].name} - ${clientes[i].primary_phone}`, code: clientes[i].id};
                //this.options.push(json);
                this.options2.push({label: `${clientes[i].name}`, code: clientes[i].id});
                }
            });
            },
        getAcciones(page = 1,table = "name") {
            let sort = '';
            this.p = page;
            if(this.sort){
                sort = 'asc';
            }else{
                sort = 'desc';
            }
            axios.get("/api/accion").then((response) => {
                this.acciones = response.data;
            });
        },
        createModal() {
            $("#createModal").modal("show");
            this.registro = true;
            this.form.contact = this.usuario.name;
            this.editMode = true;
            this.resetForm();
        
            //this.form.client_id = this.$route.params.id;
        },
        updateModal(id) {
            this.registro = true;
            this.editMode = false;
            $("#createModal").modal("show");
            this.getSeg(id);
            this.idUsuario = id;
        },
        SendData() {
            if (this.editMode) {
                this.form.contact = this.usuario.name;
                this.crearSeguimiento();
            } else {
                this.updateSeguimiento();
            }
        }, 
        handleDateClick: function(arg) {
            this.createModal()
            this.form.date = arg.dateStr
        },
        handleEventClick: function(arg) {
            this.updateModal(arg.event._def.extendedProps.id_seguimiento)
        },
        getSeguimiento() {
            axios.get("/api/seguimiento/getPendientes").then((response) => {
                this.calendarOptions.events = response.data;
            });
        },
        getSeg(id) {
            axios.get("/api/seguimientos/" + id).then((response) => {
                let date = (response.data.data.date).split(" ")
                this.form = response.data.data;
                this.form.date = date[0]
                this.getCliente(this.form.client_id);
            });
        },
        getCliente(id){
            axios.get('/api/clientes/' + id)
            .then(response => {
                let json = { "label": response.data.data.name, "code": response.data.data.id}
                this.form.client_id = json;
            });
        },
        resetForm() {
            this.form.contact = '';
            this.form.comment ='';
            this.form.date ='';
            this.form.action = '';
            this.form.client_id = '';
        },
        updateSeguimiento() {
        this.form.client_id = this.form.client_id.code;
        this.clientFormLoading = true;
        axios
            .put("/api/seguimientos/" + this.idUsuario + "?id_usuario=" + this.usuario.id, this.form)
            .then(() => {
            //$("#createModal").modal("hide");
            this.registro = false;
            this.clientFormLoading = false;
            toastr.success('Seguimiento Actualizado');
            //this.$swal({ icon: "success", title: "Seguimiento Actualizado" });
            this.getSeguimiento(this.p,this.$route.params.id);
            })
            .catch((error) => {
            if (error.response.status === 422) {
                this.errors = error.response.data.errors;
                this.form_submitting = false;
                toastr.error('Error de Actualizado');
                //this.$swal({ icon: "error", title: "Error de Actualizado" });
            }
            this.clientFormLoading = false;
            });
        },
        crearSeguimiento() {
        this.form.client_id = this.form.client_id.code;
        this.clientFormLoading = true;
        axios
            .post("/api/seguimientos"+ "?id_usuario=" + this.usuario.id, this.form)
            .then(() => {
            //$("#createModal").modal("hide");
            this.registro = false;
            this.clientFormLoading = false;
            toastr.success('Seguimiento Guardado');
            //this.$swal({ icon: "success", title: "Seguimiento Guardado" });

            this.getSeguimiento(this.p,this.$route.params.id);
            })
            .catch((error) => {
            if (error.response.status === 422) {
                this.errors = error.response.data.errors;
                this.form_submitting = false;
                toastr.error('Error de guardado');
                //this.$swal({ icon: "error", title: "Error de guardado" });
            }
            this.clientFormLoading = false;
            });
        },
    }
}
</script>