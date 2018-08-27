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
                <main-nav v-if="$route.meta.navigation == 'main-nav'" @clickmenu="closemenu();" v-bind:active="responsivemenu == true"></main-nav>
                <!--customer nav-->
                <customer-nav @profilepopup="ProfilePopup" v-if="$route.meta.navigation == 'customer-nav'" v-bind:active="responsivemenu == true" @WriteReviewModal="WriteReviewModal()"  @ViewBid="ViewBid()"></customer-nav>
                <!--provider nav-->
                <provider-nav @profilepopup="ProfilePopup" v-if="$route.meta.navigation == 'provider-nav'" v-bind:active="responsivemenu == true" @WriteReviewModal="WriteReviewModal()"  @ViewBid="ViewBid()"></provider-nav>

            </div>
            <i class="icon-menu2 menuiconbutton" @click="responsivemenu ^= true"></i>
        </div>
        <change-password-popup @HideModalValue="HideModal" :showModalProp="changepopup"></change-password-popup>
        <write-review-popup @HideModalValue="HideModal" :showModalProp="writereview"></write-review-popup>    
    </div>
</template>

<script>
    export default {
        data: function () {
            return{
                logo: 'images/logo.png',
                changepopup: false,
                responsivemenu: false,
                writereview: false,
            }
        },
        methods:{
            ProfilePopup(){
                this.changepopup = true;
            },
            HideModal(){
                this.changepopup = false;   
                this.writereview = false;
            },
            responsivebutton(){
                this.responsivemenu ^= true;
            },
            WriteReviewModal(){
                this.writereview = true;
            },         
            ViewBid(){
                this.$router.push({name: 'job-details'})
            },
            closemenu(){
              this.responsivemenu = false;
            }
        },   
    }
</script>
