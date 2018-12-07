<template>
    <div class="fb-btn">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:;" class="btn btn-facebook" @click="openFbLoginDialog">
                    <span class="icon-facebook-official"></span>{{text}}</a>
                </div>
            </div>
        </div>                      
    </template>
<script>
export default {
     props : ['text','fromSignUp', 'showDialog'],
  data () {
    remind: null;
    return {
        facebookLoginData : {},
        loading:false,
        errorMessage: '',
        successMessage: '',
        }
    },
    watch: {
      showDialog(val) {
        if(val) {
            this.openFbLoginDialog();   
        }
      }
    },
    methods:{
       openFbLoginDialog () {
        let self = this;
        FB.login(self.checkLoginState, { scope: 'email' })
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
              self.facebookLoginData.from_sign_up = (self.fromSignUp)?true:false;
              self.facebookLoginData.access_token = response.authResponse.accessToken;
              if(self.$parent.type == 'customer'){
                     self.facebookLoginData.role_id = 3;
               }else{
                    self.facebookLoginData.role_id = 2;
               }
              self.facebookLoginData.social_account_type = 'facebook';
              //from signIn
              if(!(self.fromSignUp)){
               self.socialLoginCheck()
              }else{
                self.socialLogin()
              }
            });
          } else if (response.status === 'not_authorized') {
           // the user is logged in to Facebook, 
           // but has not authenticated your app
           self.errorMessage = response.status
           setTimeout(function(){
            self.errorMessage = ""          
           }, 1000);
          } else {
          // the user isn't logged in to Facebook.
            self.errorMessage = "unauthenticated"
             setTimeout(function(){
              self.errorMessage = ""          
             }, 1000);
          }
        },
        socialLogin () {
                let self = this;
                this.$http.post('/login/social', self.facebookLoginData)
                .then(response => {
                    self.$auth.setToken(response.data.data)
                    self.$store.commit('setAuthUser', response.data.data);
                    if(!self.$auth.isAuthenticated()){
                        if(response.data.data.role_id == 3){
                            self.$router.push({ name: 'customer_profile'});
                        }else{
                            self.$router.push({ name: 'provider_profile'});
                     }
                  }else{
                    setTimeout(function(){
                        self.loading = false
                        if(response.data.data.role_id == 3){
                            if(localStorage['parentService'] && localStorage.getItem('parentService')) {
                                self.$router.push({ name: 'Explore_Detail', params: { serviceName: localStorage.getItem('parentService'), childServiceName: localStorage.getItem('childService'), zip : localStorage.getItem('zip') }});
                            }else if(localStorage['childService'] && localStorage.getItem('childService')){
                                self.$router.push({ name: 'Explore_Detail', params: { serviceName: localStorage.getItem('childService'), zip : localStorage.getItem('zip') }});   
                            }else {    
                              self.$router.push({ name: 'customer_profile'});
                            }
                        }else{
                            self.$router.push({ name: 'provider_profile'});
                        }
                    }, 1000);
                  }
                })
                .catch(error => {
                   self.loading = false
                   self.$parent.errorMessage = error.response.data.errors.email[0]
                   setTimeout(function(){
                     self.$parent.errorMessage = ''
                   }, 2000);
               })
            },
            socialLoginCheck () {
                let self = this;
                this.$http.get('/login/social/status', {params: self.facebookLoginData})
                .then(response => {
                  self.$router.push({ name: 'sign-up', params: {isPro: "facebook"}})
                })
                .catch(error => {
                  self.socialLogin()
                })
            }
    },
}
window.fbAsyncInit = function() {
      FB.init({
        appId            : process.env.MIX_FACEBOOK_APP_ID,//todo dynamic 
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
