// Front Route components
import VueRouter from 'vue-router'

const routes = [

    // Login page

    {
        name: 'login',
        path: '/front-login',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/front/auth/main.vue'),
    },

    // Home

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


    {
        name: 'Explore_Detail',
        path: '/explore/service-provider',
        meta: {
            title: 'Professional Service Marketplace | Category Detail',
            bodyClass: 'explore_detail_page',
        },
        component: require('./components/front/explore/service-provider.vue'),
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
    {
        name: 'Apply for Review',
        path: '/apply-for-review',
        meta: {
            title: 'Professional Service Marketplace | Apply for Review',
            bodyClass: 'apply-for-review-page',
        },
        component: require('./components/front/profile/ApplyForReview.vue'),
    },

    // Job Post

    {
        name: 'Job Post',
        path: '/job-post',
        meta: {
            title: 'Professional Service Marketplace | Job Post',
            bodyClass: 'job-post-page',
        },
        component: require('./components/front/job-post/main.vue'),
    },

    /*404*/

   {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: {
            title: '404 Not Found',
            noHeader: true,
            bodyClass: 'not-found-page',
        },
    },    


]



// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
