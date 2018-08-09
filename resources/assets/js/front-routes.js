// Front Route components
import VueRouter from 'vue-router'

const routes = [
    {
        name: 'home',
        path: '/',
        meta: {
            title: 'Professional Service Marketplace | Landing',
            bodyClass: 'home_body',
        },
        component: require('./components/front/landing/main.vue'),
    },

    // Join As Pro
    {
        name: 'Join As Pro',
        path: '/join-as-pro',
        meta: {
            title: 'Professional Service Marketplace | Join As Pro',
            bodyClass: 'Join_pro',
        },
        component: require('./components/front/join-as-pro/main.vue'),
    },


    // Explore
    {
        name: 'Explore',
        path: '/explore',
        meta: {
            title: 'Professional Service Marketplace | Explore',
            bodyClass: 'explore_page',
        },
        component: require('./components/front/explore/main.vue'),
    },



    // Sign Up

    {
        name: 'Sign Up',
        path: '/sign-up',
        meta: {
            title: 'Professional Service Marketplace | Sign Up',
            bodyClass: 'signup-page',
        },
        component: require('./components/front/sign-up/main.vue'),
    },



    // Profile

    {
        name: 'Profile',
        path: '/profile',
        meta: {
            title: 'Professional Service Marketplace | Profile',
            bodyClass: 'profile-page',
        },
        component: require('./components/front/profile/main.vue'),
    },


]



// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
