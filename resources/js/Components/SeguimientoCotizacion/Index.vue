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
                    :to="{ name: 'cotizaciones.index' }" style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Proyectos</router-link>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-black opacity-75 mx-3"></span>
            <a href="#"  style="font-size: 13!important" class="opacity-75 hover-opacity-100" bis_skin_checked="1">Gestionar Seguimiento </a>
            <!--end::Item-->
        </div>
    
    
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                
                <!--begin::Content-->
                <div class="d-flex flex-row row">
                  <div class="col-md-12">
                    <div class="flex-row-fluid">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Seguimientos</span>
                                    <span class="text-muted mt-1 font-weight-bold font-size-sm">A continuacion podra observar los seguimientos</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                              <!--Propuesta card contacto-->
                              <div class="card card-custom gutter-b" bis_skin_checked="1">
                                <div class="card-body" bis_skin_checked="1">
                                  <!--begin::Top-->
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="d-flex" bis_skin_checked="1">
                                    <!--begin::Pic-->
                                    <div class="flex-shrink-0 mr-7" bis_skin_checked="1">
                                      <div class="symbol symbol-50 symbol-lg-120" bis_skin_checked="1">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50 symbol-light-primary">
                                            <div class="symbol-label font-size-h5">{{cliente.nameContacto[0]}}</div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!--end::Pic-->
                                    <!--begin: Info-->
                                    <div class="flex-grow-1" bis_skin_checked="1">
                                      <!--begin::Title-->
                                      <div class="d-flex align-items-center justify-content-between flex-wrap mt-2" bis_skin_checked="1">
                                        <!--begin::User-->
                                        <div class="mr-3" bis_skin_checked="1">
                                          <!--begin::Name-->
                                          <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{cliente.nameContacto}} 
                                          </a>
                                          <!--end::Name-->
                                          <!--begin::Contacts-->
                                          <div class="d-flex flex-wrap my-2" bis_skin_checked="1">
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                              <!--begin::Svg Icon | path:/metronic/theme/html/demo3/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
                                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                  <rect x="0" y="0" width="24" height="24"></rect>
                                                  <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                  <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                                </g>
                                              </svg>
                                              <!--end::Svg Icon-->
                                            </span>{{cliente.emailContacto}}</a>
                                          </div>
                                          <!--end::Contacts-->
                                        </div>
                                        <!--begin::User-->
                                      </div>
                                      <!--end::Title-->
                                    </div>
                                    <!--end::Info-->
                                      </div>
                                    </div>
                                    <div class="col-md-9">
                                      <!--begin::Bottom-->
                                      <div class="d-flex align-items-center flex-wrap" bis_skin_checked="1" style="height: 100%;margin-left: 130px;">
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon2-phone icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Telefono</span>
                                            <span>{{cliente.telefonoContacto}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon2-document icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Rut</span>
                                            <span>{{cliente.rutContacto}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon-user icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Estado</span>
                                            <span>{{cliente.estadoname}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                          <!--begin: Item-->
                                          <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon-mail-1 icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Correo</span>
                                            <span>{{cliente.emailContacto}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                          <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon-users icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Cliente</span>
                                            <span>{{cliente.nameCliente}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon2-checking icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Numero Interno</span>
                                            <span>{{cliente.n_interno}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-2" bis_skin_checked="1">
                                          <span class="mr-4">
                                            <i class="flaticon-calendar icon-2x text-muted font-weight-bold"></i>
                                          </span>
                                          <div class="d-flex flex-column text-dark-75" bis_skin_checked="1">
                                            <span class="font-weight-bolder font-size-sm">Fecha</span>
                                            <span>{{cliente.fecha}}</span>
                                          </div>
                                        </div>
                                        <!--end: Item-->
                                      </div>
                                      <!--end::Bottom-->
                                    </div>
                                  </div>




                                </div>
                              </div>

                              <!--End Propuesta-->
    
    
    
                                <div style="display:block" class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
    
                                   <!--begin: Datatable-->
                                    <div
                                      id="kt_datatable_wrapper"
                                      class="dataTables_wrapper dt-bootstrap4 no-footer"
                                    >
                                      <div class="row" style="
                                        border-bottom: 1 px solid #EBEDF3;
                                        padding-top: 3PX;
                                        border-bottom: 1px solid #EBEDF3;"
                                        >
                                        <div class="col-sm-12 col-md-8" style="display:flex">
                                          <div id="kt_datatable_length">
                                            <label
                                              >Mostrar
                                              <select
                                                name="kt_datatable_length"
                                                aria-controls="kt_datatable"
                                                class="
                                                  custom-select custom-select-sm
                                                  form-control form-control-sm
                                                "
                                                v-model="paginate"
                                              >
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                              </select>
                                            </label>
                                          </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4" style="display: flex;justify-content: flex-end;">
                                          <div id="kt_datatable_filter">
                                            <label
                                              >Buscar:<input
                                              v-model="search"
                                                type="search"
                                                class="form-control form-control-sm"
                                                placeholder=""
                                                aria-controls="kt_datatable"
                                            /></label>
                                              
                                          </div>
                                          <div class="card-toolbar" style="margin-top:17px;margin-left:5px;">
                                  <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                        <!--begin::Trigger Modal-->
                                        <button class="btn btn-light-primary font-weight-bolder btn-sm" @click="createModal" >
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
                                              </g></svg></span> Nuevo seguimiento</button>
    
                                    </div>
                                </div>
                                        </div>
                                      </div>
    
                                      <div class="row">
                                        <div class="col-sm-12">
    
    
                                            <div class="table-responsive">
                                              <div class="alert alert-custom alert-warning"
                                                role="alert"
                                                id="alerta"
                                                v-if="seguimientos.data == ''"
                                                style="height:50px!important; width: 35%;margin-right: auto!important;
                                margin-left: auto!important;"
                                                >
                                                  <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                  <div class="alert-text">
                                                      No hay seguimientos registrados
                                                  </div>
                                                </div>
                                            
                                                <table v-if="seguimientos.data != '' || registro"
                                                    class="
                                                    table table-separate table-head-custom table-checkable
                                                    dataTable
                                                    no-footer
                                                    dtr-inline
                                                    "
                                                    id="kt_datatable"
                                                    role="grid"
                                                    aria-describedby="kt_datatable_info"
                                                >
                                                    <thead>
                                                    <tr role="row">
                                                        <th
                                                        
                                                        @click="changeSort(p,'date')"
                                                        >
                                                        <div style="display: flex;justify-content: space-between;">
                                                          Fecha
                                                          <div>
                                                              <i v-if="sort && sortingvalue == 'date'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                              <i v-if="sort == false && sortingvalue == 'date'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                          </div>
                                                          
                                                        </div>
                                                        
                                                        </th>
                                                        
                                                        <th
                                                        @click="changeSort(p,'action')"
                                      
                                                        >
                                                        <div style="display: flex;justify-content: space-between;">
                                                          Accion
                                                          <div>
                                                              <i v-if="sort && sortingvalue == 'action'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                              <i v-if="sort == false && sortingvalue == 'action'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                          </div>
                                                          
                                                        </div>
                                                        
                                                        </th>
                                                        <th
                                                        @click="changeSort(p,'comment')"
                                    
                                                        >
                                                        <div style="display: flex;justify-content: space-between;">
                                                          Comentario
                                                          <div>
                                                              <i v-if="sort && sortingvalue == 'comment'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                              <i v-if="sort == false && sortingvalue == 'comment'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                          </div>
                                                          
                                                        </div>
                                                        
                                                        </th>
    
                                                        <th
                                                        @click="changeSort(p,'contact')"
                                        
                                                        >
                                                        <div style="display: flex;justify-content: space-between;">
                                                          Usuario
                                                          <div>
                                                              <i v-if="sort && sortingvalue == 'contact'" class="flaticon2-arrow-down" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                              <i v-if="sort == false && sortingvalue == 'contact'" class="flaticon2-arrow-up" style="font-size: 0.6rem;color: #1BC5BD;"></i>
                                                          </div>
                                                          
                                                        </div>
                                                    
                                                        </th>
                                                        <th
                                                        class="sorting_disabled"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Actions"
                                                        >
                                                        Pendientes
                                                        </th>
                                                        
                                                        <th
                                                        class="sorting_disabled"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Actions"
                                                        >
                                                        Acciones
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-if="registro == true" >
                                                        <td>
                                                          <input type="date" v-model="form.date" class="form-control">
                                                        </td>
                                                        <td>
                                                          <select v-bind:class="errors.action ? ' is-invalid' : ''" type="text" v-model="form.action" class="form-control">
                                                            <option :value="accion.id" v-for="accion in acciones.data" :key="accion.id">
                                                              {{accion.name}}
                                                            </option>
                                                          </select>
                                                          </td>
                                                        <td>
                                                          <input v-bind:class="errors.comment ? ' is-invalid' : ''" type="text" v-model="form.comment" class="form-control"  placeholder="Esto es un comentario">
                                                          
                                                        </td>
    
                                                        <td>
                                                        
                                                          <span style="text-transform: capitalize">
                                                            {{ editMode ? usuario.name : form.contact}}
                                                          </span>
                                                          
                                                        </td>
    
                                                        <td>
                                                          <span class="switch switch-icon justify-content-center">
                                                            <label>
                                                              <input type="checkbox" v-model="form.prox_agendamiento">
                                                              <span></span>
                                                            </label>
                                                          </span>
                                                        </td>
                                      
                                                        <td nowrap="nowrap"><button type="submit" class="btn btn-primary" :class="{
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
                                                  
    
                                                    <tr class="even" v-for="seguimiento in seguimientos" :key="seguimiento.id">
                                                    
    
                                                      <td>
                                                        <a
                                                            class="text-dark-50 text-hover-primary"
                                                            href="#"
                                                            >{{ getHoraFecha(seguimiento.date) }}</a
                                                        >
                                                      </td>
                                                      
                                                      <td class="text-dark-50 text-hover-primary">
                                                        <span
                                                            class="
                                                            label label-lg
                                                            font-weight-bold
                                                            label-inline
                                                            "
                                                            :style="{ background : seguimiento.accionColor, color : seguimiento.accionColorFont }"
                                                            >{{seguimiento.accionName}}
                                                          </span>
                                                      </td>
    
    
                                                      <td :title="!seguimiento.comment ? '' : seguimiento.comment " class="text-dark-50 text-hover-primary">
                                                        <popper
                                                          trigger="clickToOpen"
                                                          :options="{
                                                            placement: 'button',
                                                            modifiers: { offset: { offset: '0,10px' } }
                                                          }">
                                                          <div class="popper">
                                                            {{seguimiento.comment}}
                                                          </div>
                                                          <button slot="reference"
                                                          style="
                                                            border:0px;
                                                            background-color: transparent;
                                                          ">
                                                            <i class="flaticon-exclamation-1 icon-md"></i>
                                                          </button>
                                                        </popper>

                                                        </td>
                                                      <td class="text-dark-50 text-hover-primary">{{seguimiento.contact}}</td>
    
    
                                                      <td class="d-flex justify-content-center">
                                                        <span class="switch switch-icon">
                                                          <label>
                                                            <input  @click="changeSeguimiento(seguimiento)" type="checkbox" :checked="seguimiento.prox_agendamiento  ? 'checked' : ''">
                                                            <span></span>
                                                          </label>
                                                        </span>
                                                      </td>
    
                                                      <td nowrap="nowrap">
    
                                                      <button
                                                      class="btn btn-sm btn-clean btn-icon"
                                                      @click="updateModal(seguimiento.id)">
                                                          
                                                            <i class="la la-edit"></i>
                                                        </button>
                                                        <button
                                                            @click="delete_seguimiento(seguimiento.id, seguimiento.action)"
                                                            class="btn btn-sm btn-clean btn-icon"
                                                        >
                                                            <i class="la la-trash"></i>
                                                      </button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                      </div>
    
                                      <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                          <div
                                            class="dataTables_info"
                                            id="kt_datatable_info"
                                            role="status"
                                            aria-live="polite"
                                          >
                                          Tabla Usuarios
                                          </div>
                                        </div>
                                        <div id="paginate" class="col-sm-12 col-md-7" style="display:flex;justify-content:flex-end">
                                          <div
                                            class="dataTables_paginate paging_simple_numbers"
                                            id="kt_datatable_paginate"
                                          >
                                            <pagination
                                            :data="seguimientos"
                                            @pagination-change-page="getSeguimiento"
                                            class="pagination"
                                        
                                            ></pagination>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!--end: Datatable-->
    
    
                                </div>
                                <!--end: Datatable-->
                            </div>
                            <!--end::Body-->
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
        <!--end::Entry-->
    </div>
    
    
        
    </template>
    <script>
    let user = document.head.querySelector('meta[name="user"]');
    import Aside from '../../Layouts/Seguimientos/Aside.vue'
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import Popper from 'vue-popperjs';
    import 'vue-popperjs/dist/vue-popper.css';
    export default {
        components: {
            Aside,
            DatePicker,
            'popper': Popper
        },
        data(){
            return {
              estado : '',
              estados: {},
              time : null,
              showTimePanel: false,
              showTimeRangePanel: false,
              usuario: JSON.parse(user.content),
              sortingvalue : '',
              registro : false,
              date : '',
              p: 1,
              filtrarAll : false,
              sorting : 'ascending',
              sort : true,
              search: '',
              acciones: {},
              paginate : 10,
              errors: {},
              editMode: null,
              clientFormLoading: false,
                cliente: {
                  rut :'',
                  email : '',
                  name  : '',
                  primary_phone : '',
                  secondary_phone: '',
                  category : '',
                  website : '',
                  address :  '',
                  contact_name :'',
                  type : '',
                  region_id : '',
                  comuna_id : ''
                },
                seguimientos : {},
                form : {
                    contact : '',
                    comment : '',
                    date : '',
                    action : '',
                    cotizacion_id : '',
                    prox_agendamiento: ''
                },
                id : ''
            }
        },
        
        created() {
            this.getSeguimiento(this.p,this.$route.params.id);
            this.id = this.$route.params.id;
            this.getCliente(this.$route.params.id);
            this.getEstados();
            this.getAcciones();
        },
        watch: {
        paginate: function () {
          this.getSeguimiento();
        },
        search : function () {
          this.getSeguimiento();
        },
        date : function () {
          this.filtrarAll = true;
          this.getSeguimiento(this.p,this.$route.params.id,"contact",this.date);
        }
      },
        methods: {
          changeSeguimiento(seguimiento){
            const json = {
              id: seguimiento.id,
              prox_agendamiento: !seguimiento.prox_agendamiento
            }
            axios.post("/api/change-seguimiento-cotizacion",json)
              .then(() => {
                  toastr.success('Se ha actualizado correctamente');
                  this.getSeguimiento();
              })
              .catch(() => toastr.error('Algo ha salido mal :('))
          },
        getEstados() {
          axios.get("/api/estados?").then((response) => {
            this.estados = response.data.data;
          });
        },
        getAcciones(page = 1,table = "name") {
          this.clientFormLoading = true;
          let sort = '';
          this.p = page;
          if(this.sort){
            sort = 'asc';
          }else{
            sort = 'desc';
          }
          axios.get("/api/accion?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table).then((response) => {
            this.acciones = response.data;
          });
        },
           toggleTimePanel() {
            this.showTimePanel = !this.showTimePanel;
          },
          toggleTimeRangePanel() {
            this.showTimeRangePanel = !this.showTimeRangePanel;
          },
          handleOpenChange() {
            this.showTimePanel = false;
          },
          handleRangeClose() {
            this.showTimeRangePanel = false;
          },
           now(){
             let d = new Date();
    
             let date = d.getFullYear() + "-" + d.getMonth() + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds()
             return this.getHoraFecha(date);
           },
            getHoraFecha(string) {
                let array = string.split(" ");
    
                //fecha
                let fecha = array[0].split("-")
    
                let fech = fecha[0].substr(2)
    
                fecha[0] = fech;
    
                fecha = ((fecha.reverse()).join()).replace(",", "/").replace(",","/");
    
                array[0] = fecha;
                //endfecha
    
                //hora
                let hora = array[1].substr(0, 5)
                array[1] = hora;
                console.log(hora);
                //endhora
              
                return array[0];
    
            },
          
            getSeguimiento(page = 1, id=this.$route.params.id, table="contact", date= '') {
            
            let sort = '';
            this.p = page;
            if(this.sort){
              sort = 'asc';
            }else{
              sort = 'desc';
            }
            this.clientFormLoading = true;
            axios.get("/api/seguimientos-cotizacion/show/"+ id + "?page=" + page + "&paginate=" + this.paginate + "&q=" + this.search + "&sort=" + sort + "&table=" + table + "&date=" + date)
            .then((response) => {
                this.seguimientos = response.data.data;
                this.clientFormLoading = false;
            })
            .catch(error => console.error(error));
            },
            filter(){
              this.filtrarAll = false;
              this.getSeguimiento()
            },
            changeSort(p, table){
            if(this.sort){           
                this.sort = false;
                this.sorting = '';
            }else{ 
              this.sort = true;
              this.sorting = 'ascending';
            }
            this.sortingvalue = table,
            this.getSeguimiento(p,this.$route.params.id,table);
              console.log(this.sort + " "+ table);
            },
            getCliente(id) {
            axios.get("/api/cotizaciones/" + id).then((response) => {
                this.cliente = response.data.data;
            });
            },
            createModal() {
            //$("#createModal").modal("show");
            this.registro = true;
            this.form.contact = this.usuario.name;
            this.editMode = true;
            this.resetForm();
           
            this.form.cotizacion_id = this.$route.params.id;
    
            },
            updateModal(id) {
            
            this.registro = true;
            this.editMode = false;
            //$("#createModal").modal("show");
            this.getSeg(id);
            this.idUsuario = id;
            },
            SendData() {
            if (this.editMode) {
                this.form.contact = this.usuario.name;
                this.crearSeguimiento();
            
                
            } else {
                this.form.contact = this.seguimientos.contact;
                this.updateUsuario();
                
                
            }
            },
            getSeg(id) {
            axios.get("/api/seguimientos/" + id).then((response) => {
                this.form = response.data.data;
            });
            },
            resetForm() {
                    this.form.contact = '';
                    this.form.comment ='';
                    this.form.date ='';
                    this.form.action = '';
            },
            delete_seguimiento(id, name) {
            this.$swal({
                title: "¿Esta seguro que desea eliminar a " + name + " ?",
                text: "Una vez eliminado no quedara registro",
                icon: "warning",
                showCancelButton: true,
                confirButtonColor: "#3699FF ",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Si, eliminar...",
            }).then((result) => {
                if (result.value) {
                axios
                    .delete("/api/seguimientos-cotizaciones/" + id+"?id_usuario="+this.usuario.id)
                    .then(() => {
                      /*
                    this.$swal({
                        icon: "success",
                        title: "Eliminado satisfactoriamente",
                    });*/
                    toastr.success('Eliminado satisfactoriamente');
    
                    this.getSeguimiento();
                    })
                    .catch(() => {
                      toastr.error('Algo salio mal');
                    //this.$swal({ icon: "danger", title: "Algo salio mal" });
                    });
                }
            });
            },
            createSeguimientoEstado(){
                const date = new Date
                const form = {
                    action: 1,
                    cotizacion_id: this.$route.params.id,
                    comment: "Cambio de estado",
                    contact: this.usuario.name,
                    date: date.getFullYear()+"-"+(date.getMonth() + 1)+"-"+date.getDate(),
                    prox_agendamiento: ""
                }
    
                axios
                  .post("/api/seguimientos-cotizaciones"+"?id_usuario="+this.usuario.id , form)
                  .then(() => {
                  //$("#createModal").modal("hide");
                  this.registro = false;
                  this.clientFormLoading = false;
                  //this.$swal({ icon: "success", title: "Seguimiento Guardado" });
                  toastr.success('Seguimiento Guardado');
                  this.getSeguimiento(this.p,this.$route.params.id);
                  })
            },
            updateCliente(estado){
              this.cliente.estado = estado;
              //this.clientFormLoading = true;
              this.$swal({
                title: "¿Esta seguro que desea actualizar al cliente " + this.cliente.name + " ?",
                icon: "warning",
                showCancelButton: true,
                confirButtonColor: "#3699FF ",
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Si, Actualizar...",
            }).then((result) => {
                if (result.value) {
                axios.put('/api/clientes/'+ this.$route.params.id+'?id_usuario='+this.$route.params.id,this.cliente)
                  .then(response => {
                    $('#createModal').modal('hide');
                      this.clientFormLoading = false;
                      //this.$swal({ icon: 'success', title: 'Cliente Actualizado'})
                      toastr.success('Cliente Actualizado');
                      this.createSeguimientoEstado()
                      this.getCliente(this.$route.params.id);
                  }).catch(error => {
                    if(error.response.status === 422){
                          this.errors = error.response.data.errors;
                          this.form_submitting = false;
                          toastr.error('Error de Actualizado');
                          //this.$swal({ icon: 'error', title: 'Error de Actualizado'})
                        
                      }
                      this.clientFormLoading = false;
                  });
                  }
            })            
            .then(() => {
                axios
                  .post("/api/seguimientos-cotizaciones"+"?id_usuario="+this.usuario.id , this.form)
                  .then(() => {
                  //$("#createModal").modal("hide");
                  this.registro = false;
                  this.clientFormLoading = false;
                  //this.$swal({ icon: "success", title: "Seguimiento Guardado" });
                  toastr.success('Seguimiento Guardado');
                  this.getSeguimiento(this.p,this.$route.params.id);
                  })
              .catch((error) => {
                  if (error.response.status === 422) {
                      this.errors = error.response.data.errors;
                      this.form_submitting = false;
                      //this.$swal({ icon: "error", title: "Error de guardado" });
                      toastr.error('Error de guardado');
                  }
                  this.clientFormLoading = false;
                  });
                })
    
    
            },
            updateUsuario() {
            this.clientFormLoading = true;
            axios
                .put("/api/seguimientos-cotizaciones/" + this.idUsuario+"?id_usuario="+this.usuario.id, this.form)
                .then(() => {
                //$("#createModal").modal("hide");
                this.registro = false;
                this.clientFormLoading = false;
                //this.$swal({ icon: "success", title: "Seguimiento Actualizado" });
                toastr.success('Seguimiento Actualizado');
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
            this.clientFormLoading = true;
            axios
                .post("/api/seguimientos-cotizaciones"+"?id_usuario="+this.usuario.id , this.form)
                .then(() => {
                //$("#createModal").modal("hide");
                this.registro = false;
                this.clientFormLoading = false;
                //this.$swal({ icon: "success", title: "Seguimiento Guardado" });
                toastr.success('Seguimiento Guardado');
                this.getSeguimiento(this.p,this.$route.params.id);
                })
                .catch((error) => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    this.form_submitting = false;
                    //this.$swal({ icon: "error", title: "Error de guardado" });
                    toastr.error('Error de guardado');
                }
                this.clientFormLoading = false;
                });
            },
            proximoAgendamiento() {
               this.clientFormLoading = true;
               this.form.date = this.time;
               this.form.action = "Proximo Agengamiento";
               this.form.comment = "Proximo Agendamento";
               this.form.contact = this.usuario.name;
               this.form.cotizacion_id = this.$route.params.id;
    
            axios
                .post("/api/seguimientos-cotizaciones", this.form)
                .then(() => {
                //$("#createModal").modal("hide");
                this.registro = false;
                this.clientFormLoading = false;
                //this.$swal({ icon: "success", title: "Proximo Agendamiento Guardado" });
                toastr.success('Proximo Agendamiento Guardado');
                this.getSeguimiento(this.p,this.$route.params.id);
                })
                .catch((error) => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    this.form_submitting = false;
                    //this.$swal({ icon: "error", title: "Error de guardado" });
                    toastr.success('Error de guardado');
                }
                this.clientFormLoading = false;
                });
            }
        }
    }
    </script>
    <style>
    @media(max-width: 700px)
    {
      #search{
        display: block!important;
      }
      #paginate{
        display: block!important;
      }
      #alerta {
        width: 100%!important;
      }
    }
    </style>