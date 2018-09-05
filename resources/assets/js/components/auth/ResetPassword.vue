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
          <h2 class="auth-title">Welcome to PSM, Pakistan
            <span class="auth-title-desc" >Reset your password</span>
          </h2>
      </div>
      <div class="auth-panel">
          <alert v-if="showAlert"></alert>
          <div class="new-password-form auth-forms active" >
            <form>
                  <div class="form-statement">
                    <p>Enter your new password below. Once confirmed you'll be logged into your account and your new password will be active.</p>
                  </div>
               <div class="row">
                 <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter new password">
                    </div>
                     </div>
                    <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Re-enter new password">
                    </div>
                 </div>
                 <div class="col-xs-12 col-md-12">
                    <button @click.prevent="onSubmit" type="button" class="btn btn-primary apply-primary-color" >
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
        return {
/*         activepanel:false,*/
/*          loginForm: {
            email: '',
            name: '',
            checked: []
          },*/
/*          show: true*/
            ContactIsExpire: false,
        }
/*        seen: true*/
      },
      methods: {
        HideContactModal(){
            this.ContactIsExpire = false;
        },
        ContactExpire() {
            this.ContactIsExpire = true;
        },        
        onSubmit() {
          console.log(this.form);
          this.$router.push('dashboard');
        },
      },
    }
</script>

