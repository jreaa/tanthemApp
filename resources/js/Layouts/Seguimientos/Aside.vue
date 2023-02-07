<template>
<div>
<!--begin::Aside-->
  <div class="flex-md-row-auto w-md-275px w-xl-325px">
    <!--begin::List Widget 17-->
    <div class="card card-custom gutter-b">
      <!--begin::Header-->
      <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
          <span class="card-label font-weight-bolder text-dark"
            >Seguimientos</span
          >
          <span class="text-muted mt-3 font-weight-bold font-size-sm"
            >Gestiona los seguimientos de tus clientes</span
          >
        </h3>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body pt-4">
        <!--begin::Container-->
        <div>
          <!--begin::Item-->
          <div class="d-flex align-items-center mb-8">
            <!--begin::Symbol-->
            <i class="flaticon-network icon-xl"></i>
            <!--end::Symbol-->
            <!--begin::Info-->
            <div class="d-flex flex-column ml-3">
              <div>
                <button
                  type="button"
                  class="btn btn-light font-weight-bolder font-size-sm py-2"
                >
                  Gestionar Seguimientos
                </button>
              </div>
              <!--end::Action-->
            </div>
            <!--end::Info-->
          </div>

          <div class="d-flex align-items-center mb-8">
            <!--begin::Symbol-->
            <i class="flaticon-event-calendar-symbol icon-xl"></i>
            <!--end::Symbol-->
            <!--begin::Info-->
            <div class="d-flex flex-column ml-3">
              <div>
                <button
                  type="button"
                  class="btn btn-light font-weight-bolder font-size-sm py-2"
                >
                  Visualizar Seguimientos
                </button>
              </div>
              <!--end::Action-->
            </div>
            <!--end::Info-->
          </div>

          <!--end::Item-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::Body-->
    </div>
    <div class="card card-custom gutter-b">
      <!--begin::Header-->
      <div class="card-header border-0">
        <h3 class="card-title font-weight-bolder text-dark">Cliente</h3>
      </div>
      <!--end::Header-->
      <!--begin::Body-->
      <div class="card-body pt-0">
        <!--begin::Item-->
        <div class="mb-10">
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
                >Razon Social:
              </a>
              <span class="text-muted font-weight-bold">{{cliente.name}}</span>
            </div>
            <!--end::Text-->
          </div>
        </div>
        <div class="mb-10">
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
                >Rut:
              </a>
              <span class="text-muted font-weight-bold">{{cliente.rut}}</span>
            </div>
            <!--end::Text-->
          </div>
        </div>
        <div class="mb-10">
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
                >Tipo Cliente:
              </a>
              <span class="text-muted font-weight-bold">{{cliente.type}}</span>
            </div>
            <!--end::Text-->
          </div>
        </div>
      </div>
      <!--end::Body-->
    </div>
  </div>
  <!--end::Aside-->
  <!--begin::Content-->
</div>
  
</template>

<script>
export default {
       data(){
        return{
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
        }
        
    },
    mounted(){
        this.getCliente(this.$route.params.id);
    },
    methods:{
        getCliente(id){
            axios.get('/api/clientes/' + id)
            .then(response => {
                console.log(response);
                this.cliente = response.data.data;
            });
            
        },
    }
}
</script> 