// Front Route components
import VueRouter from 'vue-router'

const routes = [


    {
        name: 'Join As Pro',
        path: '/join-as-pro',
        meta: {
            title: 'Professional Service Marketplace | Join As Pro',
            bodyClass: 'Join_pro',
        },
        component: require('./components/front/join-as-pro/main.vue'),
    },


]



// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router    