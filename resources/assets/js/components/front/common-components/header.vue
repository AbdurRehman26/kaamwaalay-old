<template>
    <div class="header">
        <div class="inner">
            <div class="container">

                <span class="logo">
                    <router-link class="logo" to="/">
                        <img :src="logo">
                    </router-link>
                </span>

                <!--main nav-->
                <main-nav v-show="$route.meta.navigation == 'main-nav'"></main-nav>
                <!--customer nav-->
                <customer-nav v-show="$route.meta.navigation == 'customer-nav'"></customer-nav>
                <!--provider nav-->
                <provider-nav v-show="$route.meta.navigation == 'provider-nav'"></provider-nav>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return{
            logo: 'images/logo.png',
        }
    },
}
</script>
