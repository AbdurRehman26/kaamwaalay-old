<template>
        <div class="left-menu-panel">
            <div class="logo-area logo">
                <logo></logo>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class="" v-can:show="'dashboard'"><router-link to="/admin/dashboard"><i class="icon-speedometer" aria-hidden="true"></i><span>Dashboard</span></router-link></li>
                    <li class="" v-can:show="'customer'"><router-link to="/admin/service-type"><i class="icon-tools-2" aria-hidden="true"></i><span>Services / Sub Services</span></router-link></li>
                    <li class="" v-can:show="'servicetype'"><router-link to="/admin/customer"><i class="icon-users" aria-hidden="true"></i><span>Customers</span></router-link></li>
                    <li class="" v-can:show="'serviceprovider'"><router-link to="/admin/service-provider"><i class="icon-handshake-o" aria-hidden="true"></i><span>Service Providers</span></router-link></li>
                    <li class=""><router-link to="/admin/service-provider-review"><i class="icon-star_border" aria-hidden="true"></i><span>Service Providers Review</span></router-link></li>
                    <li class="" v-can:show="'jobdetail'"><router-link to="/admin/jobs"><i class="icon-briefcase" aria-hidden="true"></i><span>Jobs</span></router-link></li>
                    <li class="" v-can:show="'Payment'"><router-link to="/admin/payment"><i class="icon-credit-card" aria-hidden="true"></i><span>Payment Activites</span></router-link></li>
                    <li class="" v-can:show="'General_Setting'"><router-link to="/admin/general-setting"><i class="icon-settings" aria-hidden="true"></i><span>General Settings</span></router-link></li>
                    <li class="" v-can:show="'User Listed'"><router-link to="/admin/admin-listing"><i class="icon-lock_outline" aria-hidden="true"></i><span>Admins</span></router-link></li>
                    <li class="" v-can:show="'Support'"><router-link to="/admin/support"><i class="icon-help_outline" aria-hidden="true"></i><span>Support</span></router-link></li>
                </ul>
            </nav>
        </div>
</template>

<script>
    export default {
      data () {
        return {
        }
      },
      methods: {
      },
    }
</script
