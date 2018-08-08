    // Route components
import VueRouter from 'vue-router'

const routes = [

    /* Dashboard */

    {
        name: 'dashboard',
        path: '/admin/dashboard',
        meta: {
            title: 'PSM | Dashboard',
            bodyClass: 'dashboard-page',
            pagetitle:'Dashboard',
            icon:'icon-speedometer'
        },
        component: require('./components/admin/dashboard/main.vue'),
    },


    /* Login page */

    {
        name: 'login',
        path: '/admin',
        meta: {
            title: 'PSM | Login',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/auth/main.vue'),
    },



    /* Login page */

    {
        name: 'createpassword',
        path: '/admin/create-password',
        meta: {
            title: 'PSM | Create Password',
            bodyClass: 'login-page',
            noHeader: true,

        },
        component: require('./components/auth/CreatePassword.vue'),
    },


    /* Service Type */

    {
        name: 'servicetype',
        path: '/admin/service-type',
        component: require('./components/admin/service-type/main.vue'),
        meta: {
            title: 'PSM | Service Type',
            pagetitle:'Service Types',
            icon:'icon-tools-2'
        }
    },

    /* Customer Panel */

    {
        name: 'customer',
        path: '/admin/customer',
        component: require('./components/admin/customer/main.vue'),
        meta: {
            title: 'PSM | Customer Panel' ,
            pagetitle:'Customers',
            icon:'icon-users'
        }

    },
    {
        name: 'customerdetail',
        path: '/admin/customer/customer_detail',
        component: require('./components/admin/customer/CustomerDetails.vue'),
        meta: {
            title: 'PSM | Customer Detail' ,
            pagetitle:'Customers Detail',
            icon:'icon-users'
        }

    },    
    {
        name: 'customerjobdetail',
        path: '/admin/customer/viewjobdetail',
        component: require('./components/admin/customer/ViewJobDetail.vue'),
        meta: {
            title: 'View Job Detail',
            pagetitle:'Customer Job detail Section',
            icon:'icon-users'
        },
    },

    /* Service Provider */

    {
        name: 'serviceprovider',
        path: '/admin/service-provider',
        component: require('./components/admin/service-provide/main.vue'),
        meta: {
            title: 'PSM | Service Provider',
            pagetitle:'Service Providers',
            icon:'icon-handshake-o'
        }
    },

    {
        name: 'viewservicejobdetail',
        path: '/admin/service-provider/viewjobdetail',
        component: require('./components/admin/service-provide/ViewJobDetail.vue'),
        meta: {
            title: 'PSM | View Jobs',
            pagetitle:'Service Jobs Detail',
            icon:'icon-handshake-o'
        }
    },

    /* Job */

    {
        name: 'jobdetail',
        path: '/admin/jobs',
        component: require('./components/admin/job/Main.vue'),
        meta: {
            title: 'PSM | Create Job',
            pagetitle:'Jobs',
            icon:'icon-briefcase'
        }
    },

    // Job detail Section

    {
        name: 'mainjobdetail',
        path: '/admin/jobs/viewjobdetail',
        component: require('./components/admin/job/JobDetails.vue'),
        meta: {
            title: 'Job Details',
            pagetitle:'Job Details',
            icon:'icon-briefcase'
        },

    },

    {
        name: 'BiddingDetails',
        path: '/admin/jobs/biddingdetails',
        component: require('./components/admin/job/BiddingDetails.vue'),
        meta: {
            title: 'Bidding Details',
            pagetitle:'Bidding Details',
            icon:'icon-briefcase'
        },
    },



    // Service provider review


    {
        name: 'Service_Provider_Review',
        path: '/admin/service-provider-review',
        component: require('./components/admin/service-provider-review/main.vue'),
        meta: {
            title: 'PSM | Service provider review',
            pagetitle:'Service Provider Review',
            icon:'icon-star_border'
        }
    },

    {
        name: 'Service_Detail_Review',
        path: '/admin/service-provider-review/detail-review',
        component: require('./components/admin/service-provider-review/DetailReview.vue'),
        meta: {
            title: 'PSM | Service provider review',
            pagetitle:'Service Provider Detail Review',
            icon:'icon-search'
        }
    },

    // Service provider detail

    {
        name: 'Service_Provider_Detail',
        path: '/admin/service-provider/service-provider-detail',
        component: require('./components/admin/service-provide/providerdetails.vue'),
        meta: {
            title: 'PSM | Service provider details',
            pagetitle:'Service Provider Details',
            icon:'icon-briefcase'
        }
    },

    // General Setting

    {
        name: 'General_Setting',
        path: '/admin/general-setting',
        component: require('./components/admin/general-setting/main.vue'),
        meta: {
            title: 'PSM | General Setting',
            pagetitle:'General Setting',
            icon:'icon-settings'
        }
    },

    // Payment

    {
        name: 'Payment',
        path: '/admin/payment',
        component: require('./components/admin/payment/main.vue'),
        meta: {
            title: 'PSM | Payment',
            pagetitle:'Payment',
            icon:'icon-credit-card'
        }
    },

    // Support

    {
        name: 'Support',
        path: '/admin/support',
        component: require('./components/admin/support/main.vue'),
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

    /* Admin Panel */

    {
        name: 'User Listed',
        path: '/admin/admin-listing',
        meta: {
            title: 'PSM | Admin Listed',
            bodyClass: 'Admin-listed',
            pagetitle:'Admins',
            icon:'icon-lock_outline'            

        },
        component: require('./components/admin/Main.vue'),
    },

]


// Create the router instance
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router
