<template>
  <div class="login-form auth-forms active">
    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>     
    <form @submit.prevent="validateBeforeSubmit" novalidate="">
       <div class="row">
         <div class="col-xs-12 col-md-12"  :class="[errorBag.first('email') ? 'is-invalid' : '']">
            <div class="form-group">
              <label>Email Address</label>
              <input id="login_email" type="email" v-model="login_info.email" v-validate="'required|email'"  name="email" class="form-control"  data-vv-name="email"  placeholder="Enter your email address" :class="[errorBag.first('email') ? 'is-invalid' : '']">
            </div>
             </div>
            <div class="col-xs-12 col-md-12" :class="[errorBag.first('password') ? 'is-invalid' : '']">
            <div class="form-group">
              <label>Password</label>
              <input id="login_password" type="password" :maxlength="25" v-model="login_info.password" v-validate="'required'" data-vv-as="password" name="password" class="form-control"  data-vv-name="password" placeholder="Enter your account password" :class="[errorBag.first('password') ? 'is-invalid' : '']">
            </div>
         </div>
         <div class="col-xs-12 col-md-12">
            <div class="form-group">
             <span class="forgot-password-text" @click.prevent="$emit('show-login')">Forgot Password?</span>
            </div>
         </div>
         <div class="col-xs-12 col-md-12">
          <button :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary']">
            <span>Log In</span> 
            <loader></loader>
          </button>
         </div>
       </div>
    </form>
  </div>
</template>

<script>
    export default {
      data () {
        return {
          titleproperties : 'dashboard-title',
          titleproperties : 'bodyclass',
          errorMessage: window.errorMessage,
                successMessage: window.successMessage,
                login_info: {
                    'email': '',
                    'password': '',
                    'remember': false,
                },
                loading: false,
        }
      },
      mounted() {
        this.$auth.options.loginUrl = '/api/auth/login/admin'
        self = this
        this.$nextTick(function () {
         setTimeout(function(){
          self.errorMessage='';
        }, 5000);
       })
      },
      watch: {
        message(value){
          this.successMessage = value
        }
      },
      methods: {
        login: function () {
                    var this_ = this;
                    this.loading = true
                    window.successMessage = ""
                    if(!this.$auth.isAuthenticated()){
                      //this.$http.put('api/auth/login/admin', this.userData)
                     this.$auth.login(this.login_info).then(function (response) {
                      self.loading = false
                      this_.$store.commit('setAuthAdminUser', response.data.data);
                      if(response.data.role_id == 1){
                       this_.$router.push({ name: 'dashboard'})
                      }else{
                       this_.$router.push({ name: 'service.provider.review'})
                      }
                    }).catch(error => {
                      this.loading = false
                      this_.errorMessage  =error.response.data.errors.email[0];
                      setTimeout(function(){
                        this_.errorMessage='';
                        this.loading = false
                      }, 5000);
                    })
                  }else{
                    setTimeout(function(){
                        this.loading = false
                        location.reload();
                      }, 5000);
                  }
                 },
        validateBeforeSubmit() {
          this.$validator.validateAll().then((result) => {
            if (result) {
              this.login()
              this.errorMessage = ''
              return;
            }
            this.errorMessage = this.errorBag.all()[0];
          });
        },
      },
    }
</script>
<!-- b-form-1.vue -->
