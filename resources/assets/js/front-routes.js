// Front Route components
import VueRouter from 'vue-router'

const routes = [

    // Login page

    {
        name: 'login',
        path: '/login',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,
            navigation: 'main-nav',
        },
        component: require('./components/front/auth/main.vue'),
    },
    {
        name: 'reset-password',
        path: '/reset-password',
        meta: {
            title: 'PSM | reset-password',
            bodyClass: 'reset-password-page',
            noHeader: true,
            navigation: 'main-nav',
        },
        component: require('./components/front/auth/ResetPassword.vue'),
    },

    // Home

    {
        name: 'main_page',
        path: '/',
        meta: {
            title: 'Professional Service Marketplace | Landing',
            bodyClass: 'home_body',
            navigation: 'main-nav',
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
            navigation: 'main-nav',
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
            navigation: 'main-nav',
        },
        component: require('./components/front/explore/main.vue'),
    },


    {
        name: 'Explore_Detail',
        path: '/explore/service_provider',
        meta: {
            title: 'Professional Service Marketplace | Category Detail',
            bodyClass: 'explore_detail_page',
            navigation: 'main-nav',
        },
        component: require('./components/front/explore/service-provider.vue'),
    },

    {
        name: 'Service_Provider_Detail',
        path: '/explore/service_provider/service_provider_detail',
        meta: {
            title: 'Professional Service Marketplace | Service Provider Detail',
            bodyClass: 'service_provider_detail_page',
            navigation: 'provider-nav',
        },
        component: require('./components/front/explore/service-provider-detail.vue'),
    },

    // Sign Up

    {
        name: 'Sign Up',
        path: '/sign-up',
        meta: {
            title: 'Professional Service Marketplace | Sign Up',
            bodyClass: 'signup-page',
            navigation: 'main-nav',
        },
        component: require('./components/front/sign-up/main.vue'),
    },

    // Profile

    {
        name: 'customer_profile',
        path: '/profile',
        meta: {
            title: 'Professional Service Marketplace | Profile',
            bodyClass: 'profile-page',
            navigation: 'customer-nav',
        },
        component: require('./components/front/profile/main.vue'),
    },
    {
        name: 'provider_profile',
        path: '/apply-for-review',
        meta: {
            title: 'Professional Service Marketplace | Apply for Review',
            bodyClass: 'apply-for-review-page',
            navigation: 'provider-nav',
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
            navigation: 'customer-nav',
        },
        component: require('./components/front/job-post/main.vue'),
    },

    // Featured Profile

    {
        name: 'Featured Profile',
        path: '/featured-profile',
        meta: {
            title: 'Professional Service Marketplace | Featured Profile',
            bodyClass: 'featured-profile-page',  
            navigation: 'provider-nav',          
        },
        component: require('./components/front/featured-profile/main.vue'),
    },


    //jobs pages

    {
        name: 'My Jobs',
        path: '/my-jobs',
        meta: {
            title: 'Professional Service Marketplace | My Jobs',
            bodyClass: 'my-job-post-page',
            navigation: 'customer-nav',
        },
        component: require('./components/front/jobs/my-jobs.vue'),
    },


    {
        name: 'job-details',
        path: '/job-details',
        meta: {
            title: 'Professional Service Marketplace | Job Details',
            bodyClass: 'job-detail-page',
            navigation: 'customer-nav',
        },
        component: require('./components/front/jobs/job-detail.vue'),
    },


    //bidding page
    {
        name: 'my-bid',
        path: '/my-bids',
        meta: {
            title: 'Professional Service Marketplace | My Bids',
            bodyClass: 'my-bids-page',
            navigation: 'provider-nav',
        },
        component: require('./components/front/bids/main.vue'),
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
