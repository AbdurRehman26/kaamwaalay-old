    // Route components
    import VueRouter from 'vue-router'

    const routes = [

    /* Dashboard */

    {
        name: 'dashboard',
        path: '/admin/dashboard',
        meta: {
            title: 'Dashboard',
            bodyClass: 'dashboard-page',
            pagetitle:'Dashboard',
            icon:'icon-speedometer',
            requiresAuth: true,
            forAdmin :true,
        },
        component: require('./components/admin/dashboard/main.vue'),
    },


    /* Login page */

    {
        name: 'login',
        path: '/admin',
        meta: {
            title: 'Login',
            bodyClass: 'login-page',
            noHeader: true
        },
        component: require('./components/auth/main.vue'),
    },



    /* create password page */

    {
        name: 'create.password',
        path: '/admin/create-password',
        meta: {
            title: 'Set Password',
            bodyClass: 'create-password-page',
            noHeader: true,
            forAdmin :true,

        },
        component: require('./components/auth/CreatePassword.vue'),
    },
    {
        path: '/admin/password/set/:token/:email',
        component: require('./components/auth/CreatePassword.vue'),
        meta: {
            title: 'Create Password',
            bodyClass: 'login-page',
            noHeader: true,
            forAdmin :true,
        },
    },

    /* Service Type */

    {
        name: 'service.type',
        path: '/admin/service-type',
        component: require('./components/admin/service-type/main.vue'),
        meta: {
            title: 'Service Type',
            pagetitle:'Services / Sub Services',
            icon:'icon-tools-2',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    /* Customer Panel */

    {
        name: 'customer',
        path: '/admin/customer',
        component: require('./components/admin/customer/main.vue'),
        meta: {
            title: 'Customer Panel' ,
            pagetitle:'Customers',
            icon:'icon-users',
            requiresAuth: true,
            forAdmin :true,
        }

    },
    {
        name: 'customer.detail',
        path: '/admin/customer/customer-detail/:id',
        component: require('./components/admin/customer/CustomerDetails.vue'),
        meta: {
            title: 'Customer Detail' ,
            pagetitle:'Customers Detail',
            icon:'icon-users',
            requiresAuth: true,
            forAdmin :true,
        }

    },
    {
        name: 'customer.job.detail',
        path: '/admin/customer/view-job-detail/:id',
        component: require('./components/admin/customer/ViewJobDetail.vue'),
        meta: {
            title: 'View Job Detail',
            pagetitle:'Customer Job detail',
            icon:'icon-users',
            requiresAuth: true,
            forAdmin :true,
        },
    },

    /* Service Provider */

    {
        name: 'service.provider',
        path: '/admin/service-provider',
        component: require('./components/admin/service-provide/main.vue'),
        meta: {
            title: 'Service Provider',
            pagetitle:'Service Providers',
            icon:'icon-handshake-o',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    {
        name: 'view.service.job.detail',
        path: '/admin/service-provider/view-job-detail/:id',
        component: require('./components/admin/service-provide/ViewJobDetail.vue'),
        meta: {
            title: 'View Jobs',
            pagetitle:'Jobs Awarded',
            icon:'icon-handshake-o',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    /* Job */

    {
        name: 'job.detail',
        path: '/admin/jobs',
        component: require('./components/admin/job/Main.vue'),
        meta: {
            title: 'Create Job',
            pagetitle:'Jobs',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // Job detail

    {
        name: 'main.job.detail',
        path: '/admin/jobs/view-job-detail/:id',
        component: require('./components/admin/job/JobDetails.vue'),
        meta: {
            title: 'Job Details',
            pagetitle:'Job Details',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        },

    },

    {
        name: 'bidding.details',
        path: '/admin/jobs/bidding-details/:jobId',
        component: require('./components/admin/job/BiddingDetails.vue'),
        meta: {
            title: 'Bidding Details',
            pagetitle:'Bidding Details',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        },
    },



    // Service provider review


    {
        name: 'service.provider.review',
        path: '/admin/service-provider-review',
        component: require('./components/admin/service-provider-review/main.vue'),
        meta: {
            title: 'Service provider review',
            pagetitle:'Service Providers Review',
            icon:'icon-star_border',
            requiresAuth: true,
            forReviewer :true,
        }
    },

    {
        name: 'service.detail.review',
        path: '/admin/service-provider-review/detail-review/:id',
        component: require('./components/admin/service-provider-review/DetailReview.vue'),
        meta: {
            title: 'Service provider review',
            pagetitle:'Service Provider Detail Review',
            icon:'icon-search',
            requiresAuth: true,
            forReviewer :true,
        }
    },

    // Service provider detail

    {
        name: 'service.provider.detail',
        path: '/admin/service-provider/service-provider-detail/:id',
        component: require('./components/admin/service-provide/providerdetails.vue'),
        meta: {
            title: 'Service provider details',
            pagetitle:'Service Provider Details',
            icon:'icon-briefcase',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // General Setting

    {
        name: 'general.setting',
        path: '/admin/general-setting',
        component: require('./components/admin/general-setting/main.vue'),
        meta: {
            title: 'General Setting',
            pagetitle:'General Settings',
            icon:'icon-settings',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // Payment

    {
        name: 'payment',
        path: '/admin/payment',
        component: require('./components/admin/payment/main.vue'),
        meta: {
            title: 'Payment',
            pagetitle:'Payment Activities',
            icon:'icon-credit-card',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    // Support

    {
        name: 'support',
        path: '/admin/support',
        component: require('./components/admin/support/main.vue'),
        meta: {
            title: 'Support',
            pagetitle:'Support',
            icon:'icon-help_outline',
            requiresAuth: true,
            forAdmin :true,
        }
    },

    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: {
            title: '404 Not Found',
            noHeader: true,
            bodyClass: 'not-found-page',
            requiresAuth: true,
            forAdmin :true,
        },
    },

    /* Admin Panel */

    {
        name: 'user.listing',
        path: '/admin/admin-listing',
        meta: {
            title: 'Admin Listed',
            bodyClass: 'Admin-listed',
            pagetitle:'Admins',
            icon:'icon-lock_outline',
            requiresAuth: true,
            forAdmin :true,

        },
        component: require('./components/admin/Main.vue'),
    },
    ]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
    app,
})
const admin = 1;
const reviewer = 4;
const title = document.title
router.beforeEach((to, from, next) => {

    let user;
    if(router.app.$store.getters.getAuthAdminUser != 'undefined'){
      user = JSON.parse(router.app.$store.getters.getAuthAdminUser);
  }
  document.title = (title + ' | ' + to.meta.title)
  if (to.matched.some(record => record.meta.requiresAuth) && !router.app.$auth.isAuthenticated()) {
    next({name: 'login'});
} else if (!to.matched.some(record => record.meta.requiresAuth) && router.app.$auth.isAuthenticated()) {
    if(user  && user.role_id == admin){
      next({name: 'dashboard'});
  } else if(user  && user.role_id == reviewer){
      next({name: 'service.provider.review'});
  }
} else {
    next();
}
if (to.matched.some(record => record.meta.forAdmin) && router.app.$auth.isAuthenticated()) {
    if(user  && user.role_id == admin){
        next();
    } 
    else{
        next({name: 'login'});
    }
}
if (to.matched.some(record => record.meta.forReviewer) && router.app.$auth.isAuthenticated()) {
    if(user  && (user.role_id == reviewer ||user.role_id == admin)){
        next();
    } 
    else{
        next({name: 'login'});
    }
}
})

export default router
