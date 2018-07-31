/*Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vbclass from 'vue-body-class';
import router from './routes';
import BootstrapVue from 'bootstrap-vue';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use( vbclass, router );



// Require components tags
require('./components-tags');

// Create and mount the root instance.
const app = new Vue({
    el: '#app',
    router,
});

/*const app = new Vue({
    router
}).$mount('#app')*/

