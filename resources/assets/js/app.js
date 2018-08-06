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
import VueProgressBar from 'vue-progressbar';
import fancyBox from 'vue-fancybox';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Datepicker);
Vue.use( vbclass, router );
Vue.use(require('vue-faker'));
Vue.use(VueProgressBar, options);


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
    mounted () {
        this.$Progress.finish();
        this.checkscroll();
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
        }
    }
});

/*const app = new Vue({
    router
}).$mount('#app')*/

