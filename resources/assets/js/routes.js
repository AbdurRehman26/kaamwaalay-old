    // Route components
import VueRouter from 'vue-router'

const routes = [

    /* Dashboard */

    {
        name: 'dashboard',
        path: '/dashboard',
        meta: {
            title: 'PSM | Dashboard',
            bodyClass: 'dashboard-page',
            pagetitle:'Dashboard',
            icon:'icon-speedometer'
        },
        component: require('./components/dashboard/main.vue'),
    },


    /* Login page */

    {
        name: 'login',
        path: '/',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/auth/main.vue'),
    },

    /* Admin Users */

    {
        name: 'user',
        path: '/admin',
        title:'Admin',
        component: require('./components/admin/Main.vue'),
        meta: {
            title: 'PSM | User',
            pagetitle:'Admin',
            icon:'icon-lock_outline'
        }
    },

    /* Login page */

    {
        name: 'login',
        path: '/create-password',
        meta: {
            title: 'PSM | Create Password',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/auth/CreatePassword.vue'),
    },


    /* Service Type */

    {
        path: '/service-type',
        component: require('./components/service-type/main.vue'),
        meta: {
            title: 'PSM | Service Type',
            pagetitle:'Service Types',
            icon:'icon-tools-2'
        }
    },

    /* Customer Panel */

    {
        path: '/customer',
        component: require('./components/customer/main.vue'),
        meta: {
            title: 'PSM | Customer Panel' ,
            pagetitle:'Customers',
            icon:'icon-users'
        }

    },
    {
        path: '/customer/customer_detail',
        component: require('./components/customer/CustomerDetails.vue'),
        meta: {
            title: 'PSM | Customer Detail' ,
            pagetitle:'Customers Detail',
            icon:'icon-users'
        }

    },    
    {
        path: '/customer/viewjobdetail',
        component: require('./components/customer/ViewJobDetail.vue'),
        meta: {
            title: 'View Job Detail',
            pagetitle:'Customer Job detail Section',
            icon:'icon-users'
        },
    },

    /* Service Provider */

    {
        path: '/service-provider',
        component: require('./components/service-provide/main.vue'),
        meta: {
            title: 'PSM | Service Provider',
            pagetitle:'Service Providers',
            icon:'icon-handshake-o'
        }
    },

    {
        path: '/service-provider/viewjobdetail',
        component: require('./components/service-provide/ViewJobDetail.vue'),
        meta: {
            title: 'PSM | View Jobs',
            pagetitle:'Service Jobs Detail',
            icon:'icon-handshake-o'
        }
    },

    /* Job */

    {
        path: '/jobs',
        component: require('./components/job/Main.vue'),
        meta: {
            title: 'PSM | Create Job',
            pagetitle:'Jobs',
            icon:'icon-briefcase'
        }
    },

    // Job detail Section

    {
        path: '/jobs/viewjobdetail',
        component: require('./components/job/JobDetails.vue'),
        meta: {
            title: 'Job Details',
            pagetitle:'Job Details',
            icon:'icon-briefcase'
        },

    },

    {
        name: 'BiddingDetails',
        path: '/jobs/biddingdetails',
        component: require('./components/job/BiddingDetails.vue'),
        meta: {
            title: 'Bidding Details',
            pagetitle:'Bidding Details',
            icon:'icon-briefcase'
        },
    },



    // Service provider review


    {
        path: '/service-provider-review',
        component: require('./components/service-provider-review/main.vue'),
        meta: {
            title: 'PSM | Service provider review',
            pagetitle:'Service Provider Review',
            icon:'icon-star_border'
        }
    },

    {
        name: 'Service_Detail_Review',
        path: '/service-provider-review/detail-review',
        component: require('./components/service-provider-review/DetailReview.vue'),
        meta: {
            title: 'PSM | Service provider review',
            pagetitle:'Service Provider Detail Review',
            icon:'icon-search'
        }
    },

    // Service provider detail

    {
        path: '/service-provider/service-provider-detail',
        component: require('./components/service-provide/providerdetails.vue'),
        meta: {
            title: 'PSM | Service provider details',
            pagetitle:'Service Provider Details',
            icon:'icon-briefcase'
        }
    },

    // General Setting

    {
        path: '/general-setting',
        component: require('./components/general-setting/main.vue'),
        meta: {
            title: 'PSM | General Setting',
            pagetitle:'General Setting',
            icon:'icon-settings'
        }
    },

    // Payment

    {
        path: '/payment',
        component: require('./components/payment/main.vue'),
        meta: {
            title: 'PSM | Payment',
            pagetitle:'Payment',
            icon:'icon-credit-card'
        }
    },

    // Support

    {
        path: '/support',
        component: require('./components/support/main.vue'),
        meta: {
            title: 'PSM | Support',
            pagetitle:'Support',
            icon:'icon-help_outline'
        }
    },

    /*404 Page*/

    {
        name: '404',
        path: '*',
        component: require('./components/404/Main.vue'),
        meta: {
            title: '404 Not Found'
        },
    },

]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
