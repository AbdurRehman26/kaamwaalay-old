<template>
  <div class="login-form auth-forms active">
    <form>
        <div class="fb-btn">
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn btn-facebook">
                        <span class="icon-facebook-official"></span>Log in with Facebook</a>
                </div>
            </div>
        </div>
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
        
        <!--
  <div class="login-form auth-forms active">
    <b-form novalidate @submit.prevent="onSubmit" v-if="show">
      <b-form-group id="exampleInputGroup1"
                    label="Email Address:"
                    label-for="exampleInput1"
                    description="">
        <b-form-input id="login_email"
                      type="email"
                      v-model="loginForm.email"
                      placeholder="Enter email">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Password:"
                    label-for="exampleInput2">
        <b-form-input id="login_password"
                      type="password"
                      v-model="loginForm.name"
                      placeholder="Enter password">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleGroup4">
        <b-form-checkbox-group v-model="loginForm.checked" id="exampleChecks">
          <b-form-checkbox value="me">Remember me</b-form-checkbox>
          <span class="forgot-password-text" @click.prevent="$emit('show-login')">Forgot Password?</span>
        </b-form-checkbox-group>
      </b-form-group>
      <b-button type="submit" variant="primary" >Log In
      <loader></loader>
      </b-button>
    </b-form>
  </div> -->
  
</template>

<script>
    export default {
      data () {
        return {
          titleproperties : 'dashboard-title',
          titleproperties : 'bodyclass',
        }
/*        seen: true*/
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
