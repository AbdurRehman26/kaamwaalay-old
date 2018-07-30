// Route components

const routes = [

    /* login page */
    { path: '/admin/login', component: require('./components/auth/main.vue'), meta: {title: 'PSM | Login'} },
    { path: '/admin/users', component: require('./components/admin/main.vue'), meta: {title: 'PSM | Login'} },

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
