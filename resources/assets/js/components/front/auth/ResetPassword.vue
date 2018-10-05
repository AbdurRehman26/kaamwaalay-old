<template>
  <div class="verticle-align auth-main-wrapper">
    <div class="inner">
      <div class="auth-logo-wrapper">
        <div class="container-fluid">
          <logo></logo>
        </div>
      </div>
      <div class="container"></div>
      <div class="text-center">
          <h2 class="auth-title">Reset your password
            <!-- <span class="auth-title-desc" >Reset your password</span> -->
          </h2>
      </div>
         <div class="auth-panel">
          <div class="new-password-form auth-forms active" >
            <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>
                <form>
                 <div class="form-statement">
                    <p>Enter your new password below. Once confirmed you'll be logged into your account and your new password will be active.</p>
                  </div>
                    <div class="row">
                        <div :class="[ 'col-xs-12' , 'col-md-12' , 'form-group' , errorBag.first('password')  ? 'is-invalid' : '']">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" :maxlength="25" @keyup.enter="!loading ? validateBeforeSubmit() : '';" v-model="formData.password" v-validate="'required|min:8|max:25'" data-vv-as="password" name="password" class="form-control" placeholder="Enter your new password">
                            </div>
                        </div>

                        <div :class="[ 'col-xs-12' , 'col-md-12' , 'form-group' , errorBag.first('password_confirmation')  ? 'is-invalid' : '']">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" :maxlength="25" @keyup.enter="!loading ? validateBeforeSubmit() : '';" v-model="formData.password_confirmation" v-validate="'required|confirmed:password'" data-vv-as="confirm password" name="password_confirmation" class="form-control" placeholder="Re-enter new password">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <button   @click.prevent="validateBeforeSubmit();"
                                     :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]">
                                <span>Reset Password</span>
                                <loader></loader>
                            </button>
                        </div>
                    </div>
                </form>
          </div>
      </div>
      <div class="contact-us">
         <!-- <p>Can't log in or need help? <a @click="ContactExpire" href="javascript:void()">Contact Us</a></p> -->
      </div>
    </div>
        <contactarea :showContactProp="ContactIsExpire" @HideModalValue="HideContactModal"></contactarea>    
  </div>
</template>


<script>
    export default {
    data () {
            return{
                errorMessage: '',
                ContactIsExpire: false,
                successMessage: '',
                formData: {
                    email : this.$route.params.email,
                    password_confirmation: '',
                    password: '',
                    token: this.token
                },
                loading : false,
                appName : window.appName
            }
        },
        methods: {
            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.onSubmit();
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },
            onSubmit(){
                let data = this.$route.params;
                if(!data.token){
                    return;
                }else{
                    this.formData.token=data.token;
                }
                /*  data.password = this.formData.password;
                 data.password_confirmation = this.formData.password_confirmation;
                 data.email = this.formData.email;*/
                 this.loading = true;
                 let self = this
                 this.$http.post('/api/auth/password/reset' , this.formData).then(response=>{
                    let currentUser = response.data.data;
                    this.loading = false;
                    self.successMessage = response.data.message
                      let userData = {}
                      userData.email = currentUser.email
                      userData.password = self.formData.password
                      this.$auth.login(userData).then(function (response) {
                       self.$store.commit('setAuthUser', response.data.data);
                     if(response.data.data.role_id == 2){
                          self.$router.push({ name: 'my.bids'})
                      }else if(response.data.data.role_id == 3){
                          self.$router.push({ name: 'my.jobs'})  
                      }else{
                          self.$router.push({ name: 'dashboard'}) 
                      }
                  }).catch(error => {

                  })
              setTimeout(function(){
                self.successMessage='';
            }, 5000);
          }).catch(error=>{
            this.loading = false;
            this.errorMessage =  error;
            this.loading = false
            self.errorMessage = error.response.data.errors.email[0]
            setTimeout(function() {
                self.errorMessage = ''
                this.loading = false
            }, 5000)
            return false;
        });
      },
            HideContactModal(){
                this.ContactIsExpire = false;
            },
            ContactExpire() {
                this.ContactIsExpire = true;
            },
        },
    }
</script>

