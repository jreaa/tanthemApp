<template>
    <div>
        <div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center mr-1">
                    <!--begin::Page Heading-->
               
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center flex-wrap">
                    <!--begin::Button-->
                  <div
              class="
                btn btn-icon btn-icon-mobile
                w-auto
                btn-clean
                d-flex
                align-items-center
                btn-lg
                px-2
              "
              id="kt_quick_user_toggle"
            >
              <span
                class="
                  text-muted
                  font-weight-bold font-size-base
                  d-none d-md-inline
                  mr-1
                "
                >Hi,</span
              >
              <span
                class="
                  text-dark-50
                  font-weight-bolder font-size-base
                  d-none d-md-inline
                  mr-3
                "
                style="text-transform: capitalize;"
                >{{ user.name }}</span
              >
              <span class="symbol symbol-lg-35 symbol-25 symbol-light-primary">
                <span class="symbol-label font-size-h5 font-weight-bold" style="text-transform: capitalize;"
                  >{{ user.name[0]}}</span
                >
              </span>

              
            </div>
                    
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
    </div>
</template>

<script>
let user = document.head.querySelector('meta[name="user"]');
console.log(user);
export default {
  computed: {
    user(){
      return JSON.parse(user.content);
    }
  },
  methods:{
    logoOut(event){
      axios.post("/logout", document.getElementById('logout-form'))
      .then((response) =>{
        window.location.reload();
      })
     
    }
  }
}
</script>