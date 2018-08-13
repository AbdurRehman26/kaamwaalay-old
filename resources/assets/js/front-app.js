/*Front Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vbclass from 'vue-body-class';
import router from './front-routes';
import BootstrapVue from 'bootstrap-vue';

import fancyBox from 'vue-fancybox';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use( vbclass, router );

// Require components tags
require('./components-tags');

const app = new Vue({
    el: '#app',
    router,
});




/*const app = new Vue({
    router
}).$mount('#app')*/

