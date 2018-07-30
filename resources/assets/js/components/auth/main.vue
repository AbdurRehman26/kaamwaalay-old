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
          <h2 class="auth-title">Welcome to PSI, Pakistan
            <span class="auth-title-desc" >{{message}}</span>
          </h2>
      </div>
      <div class="auth-panel">
          <alert v-if="showAlert"></alert>
          <!--login-->
          <login @show-login="ShowForgot"  v-if="tabVal == 'login'"></login>
          <!--forgot-->
          <forgot @show-login="ShowLogin" @show-new-password="ShowChangepassword" v-if="tabVal == 'forgot'"></forgot>

          <!--New Password-->
          <!-- <new-password @show-login="ShowLogin" v-if="tabVal == 'changepassword'"></new-password> -->
      </div>
      <div class="contact-us">
         <p>Can't log in or need help? <a href="javascript:void" @click="ContactExpire">Contact Us</a></p>
      </div>
    </div>
    <!-- <contactarea :showContactProp="ContactIsExpire" @HideModalValue="HideContactModal"></contactarea> -->
  </div>
</template>



<script>

export default{
    data () {
      return {
        showAlert : false,
        tabVal : 'login',
        message: 'Log in to access your account',
        ContactIsExpire: false,
      }
    },
    methods: {
      ShowLogin(){
          this.tabVal = 'login'
          this.message = 'Log in to access your account'
      },
      ShowForgot(){
          this.tabVal = 'forgot'
          this.message = 'Forgot your password'
      },
      ShowChangepassword(){
          this.$router.push('reset-password');
      },
      HideContactModal(){
        this.ContactIsExpire = false;
      },
      ContactExpire() {
        this.ContactIsExpire = true;
      }

    }
}

</script>


