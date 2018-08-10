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
     <button  @click="openFbLoginDialog">Facebook Login</button>
  </div>
</template>

<script>
    export default {
      data () {
        return {
          titleproperties : 'dashboard-title',
          titleproperties : 'bodyclass',
          facebookLoginData : {},
        }
      },
      methods: {
        onSubmit() {
          console.log(this.form);
          this.$router.push({ name: 'dashboard'});
        },
        openFbLoginDialog () {
          FB.login(this.checkLoginState, { scope: 'email' })
        },
        checkLoginState: function (response) {
          let self = this;
          if (response.status === 'connected') {
            FB.api('/me', { fields: 'first_name,last_name,email,picture' }, function(profile) {
              self.facebookLoginData.social_account_id = profile.id;
              self.facebookLoginData.first_name = profile.first_name;
              self.facebookLoginData.last_name = profile.last_name;
              self.facebookLoginData.email = profile.email;
              self.facebookLoginData.profile_image = profile.picture.data.url;
              self.facebookLoginData.role_id = 2;
              self.facebookLoginData.social_account_type = 'facebook';
              self.socialLogin()
            });
          } else if (response.status === 'not_authorized') {
           // the user is logged in to Facebook, 
           // but has not authenticated your app
          } else {
          // the user isn't logged in to Facebook.
          }
        },
        socialLogin () {
                let self = this;
                //self.loading = true
                this.$http.post('/social/login', self.facebookLoginData)
                .then(response => {
                    console.log(response.data,'success')
                     self.$router.push('dashboard');
                   // self.loading = false
                    //self.successMessage = 'Add New Admin successfully'
                    //self.$parent.getList()
                   // self.hideModal();
                   // setTimeout(function(){
                   //     self.successMessage='';
                   // }, 5000);
                })
                .catch(error => {
                        //self.loading = false
                        //self.errorMessage = 'Email address already taken.'
                       // setTimeout(function(){
                       //     self.errorMessage=''
                       // }, 5000);
                })
            },
      },
    }
     window.fbAsyncInit = function() {
      FB.init({
        appId            : '212566316088719',//todo dynamic 
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v3.1'
      });
      FB.AppEvents.logPageView();
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
</script>
<!-- b-form-1.vue -->
