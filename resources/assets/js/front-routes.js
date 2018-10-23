    // Route components
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
        name: 'password.reset',
        path: '/password/reset/:token/:email',
        meta: {
            title: 'PSM | reset-password',
            bodyClass: 'reset-password-page',
            noHeader: true,
            navigation: 'main-nav',
        },
        component: require('./components/front/auth/ResetPassword.vue'),
    },
    {
        path: '/user/activate',
        component: require('./components/front/auth/main.vue'),
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,
            navigation: 'main-nav',
        },
    },
    // Home

    {
        name: 'main-page',
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
            forAll: true,
        },
        component: require('./components/front/explore/main.vue'),
    },
    {
        name: 'Explore_Detail',
        path: '/services/:serviceName/:childServiceName?/:zip?',
        props: true,
        meta: {
            title: 'Professional Service Marketplace | Category Detail',
            bodyClass: 'explore_detail_page',
            navigation: 'main-nav',
            forAll: true,
        },
        component: require('./components/front/explore/service-provider.vue'),
    },

    {
        name: 'service-provider-detail.view',
        path: '/explore/service-provider/service-provider_detail/:id',
        props: true,
        meta: {
            title: 'Professional Service Marketplace | Service Provider Detail',
            bodyClass: 'service_provider_detail_page',
            navigation: 'main-nav',
            forAll: true,
        },
        component: require('./components/front/explore/service-provider-detail.vue'),
    },    

    // Sign Up

    {
        name: 'sign-up',
        path: '/sign-up/:isPro?',
        props: true,
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
            requiresAuth: true,
            forCustomer: true,
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
            requiresAuth : true,
            forServiceProvider : true,
        },
        component: require('./components/front/profile/ApplyForReview.vue'),
    },


    // Job Post

    {
        name: 'job.create',
        path: '/job-post',
        meta: {
            title: 'Professional Service Marketplace | Job Post',
            bodyClass: 'job-post-page',
            navigation: 'customer-nav',
            requiresAuth: true,
            forCustomer: true,
        },
        component: require('./components/front/job-post/main.vue'),
    },

    // Job Post

    {
        name: 'job.view',
        path: '/job-post/:id',
        meta: {
            title: 'Professional Service Marketplace | Job Post',
            bodyClass: 'job-post-page',
            navigation: 'customer-nav',
            requiresAuth: true,
        },
        component: require('./components/front/job-post/main.vue'),
    },

    // Featured Profile

    {
        name: 'featured_profile',
        path: '/featured-profile',
        meta: {
            title: 'Professional Service Marketplace | Featured Profile',
            bodyClass: 'featured-profile-page',  
            navigation: 'provider-nav',   
            requiresAuth: true,       
            forServiceProvider: true,       
        },
        component: require('./components/front/featured-profile/main.vue'),
    },


    //jobs pages

    {
        name: 'my.jobs',
        path: '/my-jobs',
        meta: {
            title: 'Professional Service Marketplace | My Jobs',
            bodyClass: 'my-job-post-page',
            navigation: 'customer-nav',
            requiresAuth: true,
            forCustomer: true,
        },
        component: require('./components/front/jobs/my-jobs.vue'),
    },


    {
        name: 'Explore_Jobs',
        path: '/explore-jobs',
        meta: {
            title: 'Professional Service Marketplace | My Jobs',
            bodyClass: 'my-explore-job-page',
            navigation: 'provider-nav',
            requiresAuth: true,
            forServiceProvider: true,
        },
        component: require('./components/front/jobs/explore-jobs.vue'),
    },


    {
        name: 'job.details',
        path: '/job-details/:id/:jobBidId?',
        meta: {
            title: 'Professional Service Marketplace | Job Details',
            bodyClass: 'job-detail-page',
            navigation: 'customer-nav',
            requiresAuth: true,
        },
        component: require('./components/front/jobs/job-detail.vue'),
    },

    // Advice Center

    {
        name: 'Advice_Center',
        path: '/advice-center/:type?',
        props: true,
        meta: {
            title: 'Professional Service Marketplace | Advice Center',
            bodyClass: 'advice-center-page',
            navigation: 'provider-nav',
            requiresAuth: true,
        },
        component: require('./components/front/advice-center/main.vue'),
    },


    //bidding page
    {
        name: 'my.bids',
        path: '/my-bids',
        meta: {
            title: 'Professional Service Marketplace | My Bids',
            bodyClass: 'my-bids-page',
            navigation: 'provider-nav',
            requiresAuth: true,
            forServiceProvider: true,
        },
        component: require('./components/front/bids/main.vue'),
    },



    // Profile Rejection
    {
        name: 'profile-rejection',
        path: '/profile-rejected',
        meta: {
            title: 'Professional Service Marketplace | Profile Rejected',
            bodyClass: 'profile-rejection-page',
            navigation: 'provider-nav',
        },
        component: require('./components/front/profile-rejection/main.vue'),
    },

    {
        name: 'not-approved',
        path: '/not-approved',
        meta: {
            title: 'Professional Service Marketplace | Profile Rejected',
            bodyClass: 'profile-rejection-page',
            navigation: 'provider-nav',
        },
        component: require('./components/front/profile-rejection/not-approved.vue'),
    },    

    {
        name: 'not-review',
        path: '/not-review',
        meta: {
            title: 'Professional Service Marketplace | Profile Rejected',
            bodyClass: 'profile-rejection-page',
            navigation: 'provider-nav',
        },
        component: require('./components/front/profile-rejection/profile-yet.vue'),
    },        


    // Static Pages
    {
        name: 'terms-condition',
        path: '/terms-condition',
        meta: {
            title: 'Professional Service Marketplace | Terms Condition',
            bodyClass: 'terms-condition-page',
            navigation: 'main-nav',
        },
        component: require('./components/front/static-pages/TermsCondition.vue'),
    },

    {
        name: 'privacy-policy',
        path: '/privacy-policy',
        meta: {
            title: 'Professional Service Marketplace | Privacy Policy',
            bodyClass: 'privacy-policy-page',
            navigation: 'main-nav',
        },
        component: require('./components/front/static-pages/PrivacyPolicy.vue'),
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
    routes, // short for `routes: routes`
    app,
})
const serviceProvider = 2;
const customer = 3;
const title = document.title
router.beforeEach((to, from, next) => {
 let user;
 if(to.name != 'login'){
     router.app.$store.commit('setRedirectUrl',to.name);
 }
 if(!router.app.$auth.isAuthenticated()){
        router.app.$store.commit('setAuthUser', '')
        next();
 }
 if(router.app.$store.getters.getAuthUser != 'undefined'){
    user = JSON.parse(router.app.$store.getters.getAuthUser);
 }

if (to.matched.some(record => record.meta.forAll) && !router.app.$auth.isAuthenticated()) {
    next();
}
if (to.matched.some(record => record.meta.requiresAuth) && !router.app.$auth.isAuthenticated()) {
    localStorage.removeItem('user');
    router.app.$store.commit('setAuthUser' , '');
    next({name: 'login'});
}else if (!to.matched.some(record => record.meta.requiresAuth) && router.app.$auth.isAuthenticated()) {
    if(user  && user.role_id == customer){
        if(!to.matched.some(record => record.meta.forAll) && to.name != '404') {
            if(user.is_profile_completed == 0 ){
                next({name: "customer_profile"});
            }else{ 
                next({name: "my.jobs"});
            }
        }else {
            next();
        }
    }
    if(user  && user.role_id == serviceProvider && to.name != '404'){
        if(user.is_profile_completed == 0 ){
            next({name: "provider_profile"});
        }else{ 
            next({name: "my.bids"});
        }
    }else {
            next();
    }
} else {
    next();
}

if (to.matched.some(record => record.meta.forCustomer) && router.app.$auth.isAuthenticated()) {
    if(user  && user.role_id == customer){
        next();
    } 
    else{
        next({name: 'login'});
    }
}
if (to.matched.some(record => record.meta.forServiceProvider) && router.app.$auth.isAuthenticated()) {
    if(user  && (user.role_id == serviceProvider)){
        next();
    } 
    else{
        next({name: 'login'});
    }
}
})

export default router
