<template>
  <div class="login-form auth-forms active">
    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
    <form @submit.prevent="validateBeforeSubmit">
        <facebook-component :text = "'Log in with Facebook'"></facebook-component>
        <div class="row">
            <div class="col-xs-12 col-md-12" :class="[errorBag.first('email') ? 'is-invalid' : '']">
                <div class="form-group">
                    <label>Email Address</label>
                    <input id="login_email" type="email" v-model="login_info.email" v-validate="'required|email'"  name="email" class="form-control"  data-vv-name="email"  placeholder="Enter your Email" :class="[errorBag.first('email') ? 'is-invalid' : '']">
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

            <div class="col-xs-12 col-md-6">
                <button class="btn btn-primary apply-primary-color btn-lg" :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]"><span>Log In</span> <loader></loader></button>
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
    /*        seen: true*/
},
mounted() {
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
    MyBids(){
        this.$router.push('my.bids');
    },
    login: function () {
      var this_ = this;
      this.loading = true
      window.successMessage = ""
      let redirectUrl = this_.$store.getters.getRedirectUrl

      if(!this.$auth.isAuthenticated()){
          this.$auth.login(this.login_info).then(function (response) {
            self.loading = false
            this_.$store.commit('setAuthUser', response.data.response.data[0]);
            if(response.data.response.data[0].role_id == 2){
              if(response.data.response.data[0].is_profile_completed == 0 ){
                 this_.$router.push({ name: 'provider_profile'})
             }else{ 
                 this_.$router.push({ name: 'my.bids'})
             }

         }else{
          if(response.data.response.data[0].is_profile_completed == 0 ){
             this_.$router.push({ name: 'customer_profile'})
         }else{ 
             if(redirectUrl){
              if(redirectUrl == "Explore_Detail") {
                this_.$router.push({ name: 'Explore'});
              }else if(redirectUrl == "job.create"){
                this_.$router.push({ name: redirectUrl});
              }else if(redirectUrl == "Advice_Center"){
                this_.$router.push({ name: 'Advice_Center'});
              }else {
                this_.$router.push({ name: 'main-page'});
              } 
             }else{
              this_.$router.push({ name: 'my.jobs'})
             }
         }         
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
    let user = JSON.parse(self.$store.getters.getAuthUser);
    setTimeout(function(){
        if(user.role_id == 2){
           if(response.data.response.data[0].is_profile_completed == 0 ){
             this_.$router.push({ name: 'provider_profile'})
         }else{ 
             this_.$router.push({ name: 'my.bids'})
         }
     }else{
       this_.$router.push({ name: this_.$store.getters.getRedirectUrl})
       if(response.data.response.data[0].is_profile_completed == 0 ){
         this_.$router.push({ name: 'customer_profile'})
     }else{ 
         if(redirectUrl){
          this_.$router.push({ name: redirectUrl})
        }else{
          this_.$router.push({ name: 'my.jobs'})
        }
     }   
 }

 this.loading = falsel;
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
