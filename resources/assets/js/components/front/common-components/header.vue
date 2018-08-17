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
                <customer-nav @profilepopup="ProfilePopup" v-show="$route.meta.navigation == 'customer-nav'"></customer-nav>
                <!--provider nav-->
                <provider-nav @profilepopup="ProfilePopup" v-show="$route.meta.navigation == 'provider-nav'"></provider-nav>

            </div>
        </div>
        <change-password-popup @HideModalValue="HideModal" :showModalProp="changepopup"></change-password-popup>
    </div>
</template>

<script>
export default {
    data: function () {
        return{
            logo: 'images/logo.png',
            changepopup: false,
        }
    },
    method:{
        ProfilePopup(){
            this.changepopup = true;
        },
        HideModal(){
            this.changepopup = false;   
        }
    }
}
</script>
