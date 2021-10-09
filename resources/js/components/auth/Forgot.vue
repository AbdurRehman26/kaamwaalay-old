<template>
  <div class="forgot-form auth-forms">
    <alert v-if="errorMessage || successMessage" :errorMessage="errorMessage" :successMessage="successMessage"></alert>  
    
    <form data-vv-scope="forgot">
      <div class="form-statement">
        <p>Don't worry. Resetting your password is easy, just tell us the email address you registered with PSM</p>
      </div>
            <div class="row">
                <div class="col-xs-12 col-md-12" :class="[errorBag.first('forgot.email') ? 'is-invalid' : '']">
                    <div class="form-group">
                        <label>Email Address:</label>
                            <input id="reset_email" type="email" placeholder="Enter your email address"
                                   v-validate="'required|email'" name="email" class="form-control" data-vv-name="email"
                                   v-model="reset_info.email" :class="[errorBag.first('forgot.email') ? 'is-invalid' : '']">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12">
                    <button  @click.prevent="validateBeforeSubmit('forgot')"  :class="[loading  ? 'show-spinner' : '' , 'btn' , 'btn-primary' , 'apply-primary-color' ]"><span>Send</span>
                    <loader></loader>
                    </button>
                   <span @click.prevent="$emit('show-login','valuechange')" class="back-to-login">Back to login</span>
                </div>
            </div>
    </form>
  </div>
</template>

<script>
export default {
  data () {

   return {
    errorMessage: '',
    successMessage: '',
    reset_info: {
      'email': '',
    },
    loading: false,
  }
  },
  methods: {
    forgot: function () {
                let self = this
                 this.loading = true
                this.$http.post('/api/auth/password/email', this.reset_info).then(response => {
                    self.loading = false
                    self.successMessage = response.data.message
                    setTimeout(function(){
                        self.successMessage='';
                    }, 5000);
                }).catch(error => {
                    this.loading = false
                    self.errorMessage = error.response.data.errors.email[0]
                        setTimeout(function() {
                            self.errorMessage = ''
                            this.loading = false
                        }, 5000)
                })
            },
            validateBeforeSubmit(scope) {
                this.$validator.validateAll(scope).then((result) => {
                    if (result) {
                        this.forgot();
                        this.errorMessage = '';
                        return;
                    }
                    this.errorMessage = this.errorBag.all()[0];
                });
            },

  }
}
</script>