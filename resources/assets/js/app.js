/*Main vue js*/

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import vbclass from 'vue-body-class';
import router from './routes';
import BootstrapVue from 'bootstrap-vue';

import AmCharts from 'amcharts3';
import AmSerial from 'amcharts3/amcharts/serial';
import AmPie from 'amcharts3/amcharts/pie';
import AmFunnelChart  from 'amcharts3/amcharts/funnel';
import AmGauge from 'amcharts3/amcharts/gauge';
import Datepicker from 'vuejs-datepicker';


Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Datepicker);
Vue.use( vbclass, router );


// Require components tags
require('./components-tags');

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
const app = new Vue({
    el: '#app',
    router,
});

/*const app = new Vue({
    router
}).$mount('#app')*/

