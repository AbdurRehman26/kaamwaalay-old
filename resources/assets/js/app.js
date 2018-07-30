/*Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import BootstrapVue from 'bootstrap-vue';


Vue.use(VueRouter);
Vue.use(BootstrapVue);



// Require components tags
require('./components-tags');


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})


// Create and mount the root instance.
const app = new Vue({
    el: '#app',
    router: router,
});

/*const app = new Vue({
    router
}).$mount('#app')*/

