// Route components

const routes = [

    /* Login page */

    {
        name: 'login',
        path: '/',
        component: require('./components/auth/main.vue'),
        meta: { title: 'PSM | Login' }
    },

    /* Admin Users */

    {
        name: 'admin-users',
        path: '/admin/user',
        component: require('./components/admin/User.vue'),
        meta: { title: 'PSM | User' }
    },

    /* Service Type */

    { 
        path: '/service-type-user/ServiceType', 
        component: require('./components/service-type-user/ServiceType.vue'), 
        meta: { title: 'PSM | Service Type' } 
    },

    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: { title: '404 Not Found' },
    },

]
export default routes
