<template>
  <div class="login-form auth-forms active">
    <form>
       <div class="row">
         <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email address">
            </div>
             </div>
            <div class="col-xs-12 col-md-12">
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter your account password">
            </div>
         </div>
         <div class="col-xs-12 col-md-12">
            <div class="form-group">
             <span class="forgot-password-text" @click.prevent="$emit('show-login')">Forgot Password?</span>
            </div>
         </div>
         <div class="col-xs-12 col-md-12">
            <button type="button" class="btn btn-primary apply-primary-color" @click.prevent="onSubmit">
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
        }
      },
      methods: {
        onSubmit() {
          console.log(this.form);
          this.$router.push({ name: 'dashboard'});
        },
      },
    }
</script>

<!-- b-form-1.vue -->
