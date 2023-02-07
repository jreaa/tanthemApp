<template>
  <div>
        <div style="margin-bottom:50px!important" class="d-flex align-items-center font-weight-bold my-2 mb-4" bis_skin_checked="1">
          <!--begin::Item-->
          <a href="#" class="opacity-75 hover-opacity-100" bis_skin_checked="1">
            <i class="flaticon2-shelter"></i>
          </a>
  
          <!--begin::Item-->
          <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
          <router-link :to="{ name: 'proyecto.index', params: {id: this.$route.params.id } }"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Proyectos</router-link>
           <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
          <a href="#"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Centro de Costo</a>
  
          <!--end::Item-->
          </div>
  
  
      <!--begin::Entry-->
      <div class="d-flex flex-column-fluid">
          <!--begin::Container-->
          <div class="container">
              <!--begin::Teachers-->
              <div class="d-flex flex-row row">
                  <!--begin::Content-->
                <div class="col-md-12">
                  <div class="flex-row-fluid ml-lg-12">
                      <!--begin::Card-->
                      <div class="card card-custom">
                          <!--begin::Header-->
                          <div class="card-header flex-wrap border-0 pt-6 pb-0">
                              <h3 class="card-title align-items-start flex-column">
                                  <span class="card-label font-weight-bolder text-dark">Centro de Costo</span>
                                  <span class="text-muted mt-1 font-weight-bold font-size-sm">A continuacion podra observar y gestionar su centro de costo.</span>
                              </h3>

                              
  
                          </div>
                          <div data-v-957c56b6="" class="d-flex flex-row row mt-5" style="margin-left: 25px;">
                            <div data-v-957c56b6="" class="col-md-12"><div data-v-957c56b6="" class="flex-md-row-auto"><div data-v-957c56b6=""><div data-v-957c56b6="" class="pt-0 row mt-5"><div data-v-957c56b6="" class="mb-10 col-md-4"><div data-v-957c56b6="" class="d-flex align-items-center"><div data-v-957c56b6="" class="symbol symbol-45 symbol-light mr-5"><span data-v-957c56b6="" class="symbol-label"><i data-v-957c56b6="" class="flaticon-user icon-lg text-success"></i></span></div> <div data-v-957c56b6="" class="d-flex flex-column flex-grow-1"><a data-v-957c56b6="" href="#" class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    "> {{info.name}}
                                  </a> <span data-v-957c56b6="" class="text-muted font-weight-bold">Nombre Proyecto.</span></div></div></div> <div data-v-957c56b6="" class="mb-10 col-md-4"><div data-v-957c56b6="" class="d-flex align-items-center"><div data-v-957c56b6="" class="symbol symbol-45 symbol-light mr-5"><span data-v-957c56b6="" class="symbol-label"><i data-v-957c56b6="" class="flaticon-folder icon-lg text-warning"></i></span></div> <div data-v-957c56b6="" class="d-flex flex-column flex-grow-1"><a data-v-957c56b6="" href="#" class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    ">
                                    {{info.correo}}
                                  </a> <span data-v-957c56b6="" class="text-muted font-weight-bold">Cliente Asociado.</span></div></div></div> <div data-v-957c56b6="" class="mb-10 col-md-4"><div data-v-957c56b6="" class="d-flex align-items-center"><div data-v-957c56b6="" class="symbol symbol-45 symbol-light mr-5"><span data-v-957c56b6="" class="symbol-label"><i data-v-957c56b6="" class="flaticon-map icon-lg text-info"></i></span></div> <div data-v-957c56b6="" class="d-flex flex-column flex-grow-1"><a data-v-957c56b6="" href="#" class="
                                      font-weight-bold
                                      text-dark-75 text-hover-primary
                                      font-size-lg
                                      mb-1
                                    ">
                                    <span
                                        class="
                                        label label-lg
                                        font-weight-bold
                                        label-inline
                                        "
                                        :style="{ background : info.color, color : info.colorFont }"
                                        >{{info.nameEstado}}</span
                                    >
                                  </a> <span data-v-957c56b6="" class="text-muted font-weight-bold">Estado.</span></div></div></div></div></div></div></div></div>
  
                          <!--end::Header-->
                          <!--begin::Body-->
                          <div class="card-body">
  
                              
                          <div class="accordion  accordion-toggle-arrow" id="accordionExample4">
                              <div class="card">
                                  <div class="card-header" id="headingOne4">
                                      <div class="card-title" data-toggle="collapse" data-target="#collapse">
                                          <i class="flaticon2-layers-1"></i> Cuentas
                                      </div>
                                  </div>
                                  <div id="collapse" class="collapse show" data-parent="#accordionExample4">
                                      <div class="card-body">
                                          <pm-procesos @proceso="handleProceso"
                                          :updateProcesos="updateProcesos"/>
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header" id="headingTwo4">
                                      <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse2">
                                          <i class="flaticon2-copy"></i> Centros de Costo
                                      </div>
                                  </div>
                                  <div id="collapse2" class="collapse" data-parent="#accordionExample4">
                                      <div class="card-body">
                                        <pm-sub-procesos 
                                        @subproceso="handleSubProceso" 
                                        @actualizarDatos="handleActualizarProcesos"
                                        :updateProcesos="updateProcesos"
                                        :id_proceso="id_proceso"/>
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header" id="headingThree4">
                                      <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse3">
                                          <i class="flaticon2-bell-alarm-symbol"></i> Variables
                                      </div>
                                  </div>
                              <div id="collapse3" class="collapse" data-parent="#accordionExample4">
                                  <div class="card-body">
                                    <pm-variables @actualizarProceso="handleActualizarProcesos" :id_sub_proceso="id_sub_proceso"/>
                                  </div>
                              </div>
                              </div>
                          </div>
                          </div>
                      <!--end::Card-->
                  </div>
                 </div>
                  <!--end::Content-->
              </div>
              <!--end::Teachers-->
              </div>
              <!--end::Container-->
          </div>
  
          
    
      </div>
  
      <div class="modal" tabindex="-1" id="createModal">
        <form class="modal-dialog modal-lg" @submit.prevent="SendData">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                {{ editMode ? "Agregar" : "Editar" }} Seguimiento Pendiente CG
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
                  <div class="row" style="padding: 2px;
      border-radius: 5px;
      background: #f7f7f7;">
                    <div class="col-md-12">
                      <p><strong>* Completado</strong> 25 %</p> <br>
                      <p><strong>* Observaciones</strong> 4</p> <br>
                      <p><strong>* Fotos</strong> 0</p>
                      
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="n_interno">Fecha</label>
                          <input type="date" v-model="form.fecha" class="form-control">
                          <div
                            style="display: block !important"
                            class="invalid-feedback"
                            v-if="errors.fecha"
                          >
                            {{ errors.fecha[0] }}
                          </div>
                        </div>
                        <div class="form-group ">
                          <label for="email">Comentario</label>
                          <input v-bind:class="errors.comentario ? ' is-invalid' : ''" type="text" v-model="form.comentario" class="form-control"  placeholder="Esto es un comentario">  
                          <div
                            style="display: block !important"
                            class="invalid-feedback"
                            v-if="errors.comentario"
                          >
                            {{ errors.comentario[0] }}
                          </div>
                        </div>
                                      
  
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="rut">Accion </label>
                                <select v-bind:class="errors.accion ? ' is-invalid' : ''" type="text" v-model="form.accion" class="form-control">
                                    <option value="0">
                                        No realizado
                                    </option>
                                    <option value="1">
                                        Realizado
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
                          <div class="form-group">
                          <label>Seleccionar rango fechas </label>
                              <select  type="text" class="form-control" v-model="form.rango">
                                  <option value="0">
                                      De lunes a vienes.
                                  </option>
                                  <option value="1">
                                      Todos los dias.
                                  </option>
                                  <option value="2">
                                      De lunes a sabado.
                                  </option>
                              </select>
                        </div>
                        <div class="form-group d-flex justify-end">
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
                  </div>
  
                </div>
  
  
  
  
  
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
  </template>
  
  <style>
  @media only screen and (max-width: 600px) {
      .section {
          padding: 0px!important;
          margin-top: 10px!important;
      }
      .bloque {
          margin-right: 0px!important;
          width: 98%!important;
          height: 121px!important;
          margin-bottom: 3px!important
      }
      .bloque p {
          font-size: 0.8rem!important
      }
  }
  .js-badger-accordion-header {
      width: 100%!important;
      height: 50px!important;
      padding: 9px!important;
      border-radius: 5px!important;
      background: #1bc5bd!important;
      border: 2px solid #ebebebcc!important;
  }
  .badger-accordion-toggle {
      font-size: 1rem!important;
      text-transform: uppercase!important;
      font-family: sans-serif!important;
      color: white!important;
  }
  .badger-accordion__panel {
      transition: all 0.5s ease 0s!important;
  }
  .badger-accordion-toggle:last-child {
      font-size: 1.2rem!important;
  }
  .js-badger-accordion-panel-inner {
      padding: 5px!important;
  }
  
  </style>
  
  <script>
  import {BadgerAccordion, BadgerAccordionItem} from 'vue-badger-accordion'
  import PmProcesos from './Procesos.vue';
  import PmSubProcesos from './SubProcesos.vue';
  import PmVariables from './Variables.vue';
  export default {
    data() {
      return {
          updateProcesos: 0,
          id_proceso: 1,
          id_sub_proceso: 1,
          info: {},
          form : {
              comentario : '',
              fecha : '',
              accion : '',
              rango: '',
              client_id : ''
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
      components: {
          PmVariables,
          PmProcesos,
          PmSubProcesos,
          BadgerAccordion,
          BadgerAccordionItem
      },
      mounted() {
          $(".modal-backdrop").css("display", "none");
          $('#collapse').collapse("show")
          this.getProyecto(this.$route.params.id)
      },
      methods : {
          getProyecto(id) {
              axios.get("/api/proyectos/" + id).then((response) => {
                  this.info = response.data.data;

              });
          },
          handleProceso(value) {
              this.id_proceso = value
              $('#collapse2').collapse("show")
          },
          handleSubProceso(value) {
              this.id_sub_proceso = value
              $('#collapse3').collapse("show")
          },
          handleActualizarProcesos(value) {
            this.updateProcesos = value
          },
          SendData() {
              if (this.editMode) {
                  //this.form.contact = this.usuario.name;
                  this.crearSeguimiento();
              } else {
                  this.updateSeguimiento();
              }
          }, 
          getSeguimiento_unique(id) {
              axios.get("/api/eventos/" + id).then((response) => {
                  //this.getCliente(this.form.client_id);
                  this.form = response.data.Evento;
  
              });
          },
          getSeg() {
              this.updateModal(this.$route.params.id)
          },
          
          getSeguimiento() {
              
              axios.get("/api/eventos/").then((response) => {
                  console.log(response);
                  //this.calendarOptions.events = response.data.Eventos;
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
              this.getSeguimiento_unique(id);
              this.idUsuario = id;
          },
                  updateSeguimiento() {
  
          axios
              .put("/api/eventos/"+this.form.id, this.form)
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
          axios
              .post("/api/eventos",this.form)
              .then(() => {
                //$("#createModal").modal("hide");
                this.registro = false;
                this.clientFormLoading = false;
                toastr.success('Seguimiento Guardado');
                //this.$swal({ icon: "success", title: "Seguimiento Guardado" });
  
                this.getSeguimiento();
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
  };
  </script>
  