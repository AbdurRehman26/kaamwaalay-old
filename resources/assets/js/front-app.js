/*Front Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vbclass from 'vue-body-class';
import router from './front-routes';
import BootstrapVue from 'bootstrap-vue';
import fancyBox from 'vue-fancybox';
import VueAxios from 'vue-axios'
import VueAuthenticate from 'vue-authenticate'
import axios from 'axios'
import VeeValidate from 'vee-validate'
import Vuex from 'vuex';
import store from './store.js'
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use( vbclass, router );
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
Vue.use(Vuex);
// Require components tags
require('./components-tags');
require('./front-components-tags');

Vue.mixin({
 data: function() {
   return {
    globalReadOnlyProperty() {
        return  'testinggfsd';
     }
   }
 }
});
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
const app = new Vue({
    el: '#app',
    router,
    store,
    methods:{
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
        }
    },
    mounted(){
        this.browserfunction();
        this.Macbrowserfunction();
    },
    watch : {
        $route(){
            this.browserfunction();
            this.Macbrowserfunction();
        }
    }
});




/*const app = new Vue({
    router
}).$mount('#app')*/

