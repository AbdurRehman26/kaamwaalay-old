<template>
  <div class="verticle-align auth-main-wrapper">
    <div class="inner">
      <div class="container"></div>
      <div class="text-center">
          <h2 class="auth-title">Welcome to PSI, Pakistan
            <span class="auth-title-desc" >Please create your account password</span>
          </h2>
      </div>
      <div class="auth-panel">
          <alert v-if="showAlert"></alert>
          <div class="new-password-form auth-forms active" >
            <form>
            <div class="form-statement">
              <p>You'll need to create a new password to access your PSI account.</p>
            </div>
               <div class="row">
<!--                  <div class="col-xs-12 col-md-12 non-editable ">
   <div class="form-group">
     <label>Email Address</label>
     <input type="email" name="email" class="form-control" placeholder="arsalan@cygnismedia.com">
   </div>
    </div> -->

                 <div class="col-xs-12 col-md-12">
                    <div class="form-group non-editable">
                      <label>Email Address</label>
                      <input type="email" name="email" class="form-control" value="arsalan@cygnismedia.com" placeholder="Enter your email address">
                    </div>
                    </div>

                 <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                      <label>Create Your Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Re-enter your password">
                    </div>
                 </div>
                 <div class="col-xs-12 col-md-12">
                    <button @click.prevent="onSubmit" type="button" class="btn btn-primary apply-primary-color" >
                      <span>Create</span>
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

export default{
    data () {
      return {
        ContactIsExpire: false,
      }
    },
    methods:{
      HideContactModal(){
        this.ContactIsExpire = false;
      },
      ContactExpire() {
        this.ContactIsExpire = true;
      },
      onSubmit() {
          this.$router.push('dashboard');
        },
    },
}

</script>


