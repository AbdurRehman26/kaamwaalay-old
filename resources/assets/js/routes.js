// Route components

const routes = [

    /* login page */
    { 
        path: '/admin/user', 
        component: require('./components/admin/User.vue'), 
        meta: {title: 'PSM | Login'} 
    },
   

    /* Service Type */
    { 
        path: '/service-type-user/ServiceType', 
        component: require('./components/service-type-user/ServiceType.vue'), 
        meta: {title: 'PSM | Service Type'} 
    },


    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: {
            title: '404 Not Found',
        },
    },

]
export default routes
