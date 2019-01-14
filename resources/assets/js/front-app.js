/*Main vue js*/

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vbclass from 'vue-body-class';
import BootstrapVue from 'bootstrap-vue';

import AmCharts from 'amcharts3';
import AmSerial from 'amcharts3/amcharts/serial';
import AmPie from 'amcharts3/amcharts/pie';
import AmFunnelChart  from 'amcharts3/amcharts/funnel';
import AmGauge from 'amcharts3/amcharts/gauge';
import Datepicker from 'vuejs-datepicker';
import VueProgressBar from 'vue-progressbar';
import Multiselect from 'vue-multiselect';
import MaterialIcons  from 'material-icons';


import fancyBox from 'vue-fancybox';
import VueAxios from 'vue-axios'
import VueAuthenticate from 'vue-authenticate'
import axios from 'axios'
import router from './front-routes';
import VeeValidate from 'vee-validate'
import InfiniteLoading from 'vue-infinite-loading'
import Vuex from 'vuex';
import store from './store.js';
import Lightbox from 'vue-simple-lightbox';
import { Card, createToken , CardNumber, CardExpiry, CardCvc } from 'vue-stripe-elements-plus'

window.mapKey = 'AIzaSyDF80XfOsBSZh-rU5uWBekmfqK-YVrpPds';

import VueGallerySlideshow from 'vue-gallery-slideshow';

Vue.use(VueRouter);
Vue.component('multiselect', Multiselect);
Vue.use(BootstrapVue);
Vue.use(Datepicker);
Vue.use( vbclass, router );

Vue.use(require('vue-faker'));
Vue.use(VueProgressBar, options);


Vue.use(InfiniteLoading);
Vue.use(Lightbox);
Vue.use(VueGallerySlideshow);
Vue.use(VueAxios, axios)
Vue.use(VueAuthenticate, {
    tokenName: 'access_token',
    baseUrl: '/',
    loginUrl: '/api/auth/login',
    registerUrl: '/api/auth/register',
    logoutUrl: '/api/auth/logout',
    storageType: 'cookieStorage',
    providers: {
        // Define OAuth providers config
        oauth2: {
            name: 'oauth2',
            url: 'Token/Exchange',
        }
    }
})

import Geocoder from "@pderas/vue2-geocoder";

Vue.use(Geocoder, {
    googleMapsApiKey: window.mapKey
});

Vue.$geocoder.setDefaultMode('address');

Vue.use(Vuex); 
// base/global options
// these options can be overridden 
// by the options in the .open(options) 
// function.
/*const stripeOptions = {
  key: 'pk_test_ix9VLy3CYcuwWxz1UkMipKun',
  image: '',
  locale: 'auto',
  currency: 'PHP',
  billingAddress: false,
  panelLabel: 'Subscribe {{amount}}'
}
Vue.use(VueStripeCheckout, stripeOptions);*/
Vue.component('multiselect', Multiselect);
Vue.component('MaterialIcons', MaterialIcons);

require('./filters')
require('./directives')

const options = {
    color: '#8200ff',
    failedColor: '#8200ff',
    thickness: '3px',
    transition: {
        speed: '2s',
        opacity: '0.6s',
        termination: 600
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}

// Require components tags
require('./front-components-tags');

Vue.mixin({
   data: function() {
     return {
        globalReadOnlyProperty() {
            return  $route.name;
        }
    }
}

})
// Create and mount the root instance.

let veeCustomMessage = {
    en: {
        custom: {
            agree: {
                required: 'You must agree to the terms and conditions before registering!',
                digits: (field, params) => `length must be ${params[0]}`
            },
            privacypolicy: {
                required: 'You must agree the privacy policy before registering!',
                digits: (field, params) => `length must be ${params[0]}`
            },
            password_confirmation: {
                confirmed: 'Password does not match.'
            }
        }
    }
};
const config = {
    errorBagName: 'errorBag', // change if property conflicts.
    dictionary:  veeCustomMessage,
    events: 'input' 
};
Vue.use(VeeValidate,config);
//require('./echo.js');


const app = new Vue({
    el: '#app',
    router,
    store,
    mounted () {
        this.$Progress.finish();
        this.checkscroll();
    },
    methods:{
        //if scroll exist add class else remove class
        checkscroll(){
          setTimeout(function(){
              if(jQuery('body').height() > jQuery(window).height()){
                jQuery('body').addClass('handle-scroll');
            }else{
                jQuery('body').removeClass('handle-scroll');
            }
        },1500);
      },
      browserfunction() {
        if ((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1) {
            jQuery('body').addClass('opera-browser')
        } else if (navigator.userAgent.indexOf("Chrome") != -1) {
            jQuery('body').addClass('chrome-browser')
        } else if (navigator.userAgent.indexOf("Safari") != -1) {
            jQuery('body').addClass('safari-browser')
        } else if (navigator.userAgent.indexOf("Firefox") != -1) {
            jQuery('body').addClass('firefox-browser')
            } else if ((navigator.userAgent.indexOf("MSIE") != -1) || (!!document.documentMode == true)) //IF IE > 10
            {
                jQuery('body').addClass('IE-browser')
            } else {
                jQuery('body').addClass('New-browser')
            }
        },
        Macbrowserfunction() {
            if (navigator.userAgent.indexOf('Mac OS X') != -1) {
                $("body").addClass("mac-browser");
            }else{
                $("body").addClass("window-browser");
            }
        },
    },
    mounted(){

        this.browserfunction();
    },
    created () {
        this.$Progress.start()
        this.$router.beforeEach((to, from, next) => {
            if (to.meta.progress !== undefined) {
                let meta = to.meta.progress
                this.$Progress.parseMeta(meta)
            }
            this.$Progress.start()
            next()
        })
        this.$router.afterEach((to, from) => {
            this.$Progress.finish()
        })
    },
    watch:{
        '$route': function(from, to) {
            this.checkscroll();
            window.scrollTo(0,0);
            var reviewId = this.$route.params.id;
            if (reviewId && reviewId.match("#viewBid")) {
                var elmnt = document.getElementById("bid-review");
                elmnt.scrollIntoView();        
            }
            // var elmnt = document.getElementById("bid-review");
            // elmnt.scrollIntoView();                    
        }
    }
});



Vue.axios.interceptors.response.use((response) => { // intercept the global error
    return response
}, function (error) {
    let originalRequest = error.config
    if (error.response.status === 401 && !originalRequest._retry) { // if the error is 401 and hasent already been retried
       app.$auth.logout().then(function (Vue) {
        app.$store.commit('setAuthUser', '')
        router.push({ name: 'login'})
    })
   }
   if(error.response.status === 406 || error.response.status === 422){  
       return Promise.reject(error);
   }
})

// Laravel Echo 
import Echo from 'laravel-echo';
window.io = require('socket.io-client');
if(app.$auth.isAuthenticated()) {
    let token = document.head.querySelector('meta[name="csrf-token"]');
    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':'+ window.socketPort,
        auth: {
            headers: {
                Authorization: 'Bearer ' + app.$auth.getToken(),//token.content,
            },
        },
    });
}
/*const app = new Vue({
    router
}).$mount('#app')*/
