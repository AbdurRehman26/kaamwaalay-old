<template>
    <div class="header">
        <div class="inner">
            <div class="container">

                <span class="logo">
                    <a href="javascript:void(0);" @click.prevent="scroll()">
                        <img :src="logo">
                    </a>
                </span>

                <!--main nav-->
                <main-nav v-if="!userDetails && $route.meta.navigation == 'main-nav'" @clickmenu="closemenu();" v-bind:active="responsivemenu == true"></main-nav>
                <!--customer nav-->

                <customer-nav @profilepopup="ProfilePopup" v-if="userDetails.role_id == userRoles.customer" @clickmenu="closemenu();" v-bind:active="responsivemenu == true" @WriteReviewModal="WriteReviewModal()"  @ViewBid="ViewBid()"></customer-nav>
                <!--provider nav-->
                <provider-nav @profilepopup="ProfilePopup" v-if="userDetails.role_id == userRoles.provider" @clickmenu="closemenu();" v-bind:active="responsivemenu == true" @WriteReviewModal="WriteReviewModal()"  @ViewBid="ViewBid()"></provider-nav>

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
                userRoles : {
                    customer  : 3,
                    provider : 2
                },
            }
        },
        mounted (){
        },
        computed : {
            userDetails(){
                
                return JSON.parse(this.$store.getters.getAuthUser);
            },
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
                window.scrollTo(0,0);
                this.$router.push({name: 'job-details'})
            },
            scroll(){
                this.$router.push({name: 'main-page'});
                this.responsivemenu = false;
                window.scrollTo(0,0);
            },
            closemenu(){
                this.responsivemenu = false;
            }
        },
        watch : { 
        }
    }
</script>
