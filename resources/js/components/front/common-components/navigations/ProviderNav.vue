<template>
    <!-- provider header -->
    <div class="navigation main-navigation provider-navigation">
        <ul class="float-left">
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore-jobs">Explore Jobs </router-link></li>
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/my-bids">My Applications</router-link></li>
            <li>

                <div class="user-login-detail float-left pointer"  @click="changePassword">
<span class="user-img" v-if="imageValue" @click="ShowModalValue = true;" v-bind:style="{'background-image':'url('+imageValue+')'}">
</span>
<span class="user-img no-image" v-if="!imageValue" @click="ShowModalValue = true;">
</span>
<p class="username">{{fullName}}</p>
</div>
</li>
<li class="setting-li">
    <router-link to="/apply-for-review">
        <i class="icon-cog2 action-icon"></i>
    </router-link>
</li>
<li class="bell-li">
    <span class="notify-block" v-on-clickaway="away" @click="isShowing ^= true" v-on:click="Showactive">
        <i v-bind:active="tab == true" class="icon-notification action-icon">
            <span :class="{'badge-count': notificationCount != ''}">{{notificationCount}}</span></i>
            <notification v-show="isShowing" :isShowTab='isShowing'></notification>
        </span>
    </li>
    <li>
        <logout-component></logout-component>
    </li>

</ul>
<common-nav/>


</div>
</template>
<script>
    import { directive as onClickaway } from 'vue-clickaway';
    export default{
        mounted(){
        },
        data () {
            return {
                isShowing:false,
                showModalValue : false,
                tab: false,
                tabmenu: false,
                first_name : '',
                last_name : '',
                user:{},
                notificationCount:'',
            }
        },
        directives: {
            onClickaway: onClickaway,
        },
        computed : {
            userDetails(){
                return JSON.parse(this.$store.getters.getAuthUser);
            },
            fullName(){
                return this.userDetails ? this.userDetails.first_name + ' ' + this.userDetails.last_name : 'images/dummy/image-placeholder.jpg';
            },
            socialAccountId(){
                return this.userDetails ? this.userDetails.social_account_id : '';
            },
            imageValue(){
                return this.userDetails ? this.userDetails.profileImage : ''
            },
            requestCityUrl(){
                return this.cityUrl;
            },
        },
        methods: {
            changePassword(){
                if(!this.socialAccountId) {
                    this.$emit('profilepopup');
                }
            },
            ShowModal(){
                this.showModalValue = true;
            },
            HideModal(){
                this.showModalValue = false;
            },
            Showactive(){
                this.tab ^= true;
            },
            away: function(){
                this.isShowing = false;
                this.tab = false;
            },
            WriteReviewModal(){
                this.$emit('WriteReviewModal');
            },
            ViewBid(){
                /*this.$router.push({name: 'job-details'})*/
                this.$emit('ViewBid');
            },
            scrollToTop() {
                window.scrollTo(0,0);
            },

        },
        watch :{
         $route(to, from) {
         }
     }
 }
</script>
