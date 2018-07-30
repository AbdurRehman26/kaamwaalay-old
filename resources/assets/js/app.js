
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import BootstrapVue from 'bootstrap-vue';




Vue.use(VueRouter);
Vue.use(BootstrapVue);



//require components tags
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

