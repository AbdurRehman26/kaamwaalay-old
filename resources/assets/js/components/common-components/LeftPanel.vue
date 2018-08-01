<template>
        <div class="left-menu-panel">
            <div class="logo-area logo">
                <logo></logo>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class=""><router-link to="/dashboard"><i class="icon-pie-chart" aria-hidden="true"></i><span>Dashboard</span></router-link></li>
                    <li class=""><router-link to="/admin/user"><i class="icon-user-icon-resue" aria-hidden="true"></i><span>Admins</span></router-link></li>
                    <li class=""><router-link to="/service-type-user/service-type"><i class="icon-workspace" aria-hidden="true"></i><span>Service / Sub Service</span></router-link></li>
                    <li class=""><router-link to="/service-provide/service-provider"><i class="icon-handshake-o" aria-hidden="true"></i><span>Service Provider</span></router-link></li>
                    <li class=""><router-link to="/dashboard"><i class="icon-search" aria-hidden="true"></i><span>Service Provider Review</span></router-link></li>
                    <li class=""><router-link to="/customer/customer-panel"><i class="icon-users" aria-hidden="true"></i><span>Customer</span></router-link></li>
                    <li class=""><router-link to="/dashboard"><i class="icon-briefcase" aria-hidden="true"></i><span>Jobs</span></router-link></li>
                    <li class=""><router-link to="/dashboard"><i class="icon-credit-card" aria-hidden="true"></i><span>Payment Activites</span></router-link></li>
                    <li class=""><router-link to="/dashboard"><i class="icon-settings" aria-hidden="true"></i><span>General Settings</span></router-link></li>
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
