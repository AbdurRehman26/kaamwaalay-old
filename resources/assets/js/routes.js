// Route components
import VueRouter from 'vue-router'

const routes = [

    /* Login page */

    {
        name: 'login',
        path: '/',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
        },
        component: require('./components/auth/main.vue'),
    },

    /* Admin Users */

    {
        name: 'user',
        path: '/admin',
        component: require('./components/admin/Main.vue'),
        meta: { title: 'PSM | User' }
    },

    /* Service Type */

    {
        path: '/service-type',
        component: require('./components/service-type-user/Main.vue'),
        meta: { title: 'PSM | Service Type' }
    },

    /* Customer Panel */

    {
        path: '/customer',
        component: require('./components/customer/Main.vue'),
        meta: { title: 'PSM | Customer Panel' },
                    
    },
       {
                    path: '/customer/viewjobdetail',
                    component: require('./components/customer/ViewJobDetail.vue'), meta: {title: 'View Job Detail'},
        },

    /* Service Provider */

    {
        path: '/service-provider',
        component: require('./components/service-provide/Main.vue'),
        meta: { title: 'PSM | Service Provider' }
    },

    /* Job */

    {
        path: '/jobs',
        component: require('./components/job/Main.vue'),
        meta: { title: 'PSM | Create Job' }
    },

    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: { title: '404 Not Found' },
    },

]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
