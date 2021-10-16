<template>
    <!-- provider header -->
    <div class="navigation main-navigation provider-navigation">
        <ul class="float-left">
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore-jobs">Explore Jobs </router-link></li>
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/my-bids">My Bids</router-link></li>
            <li>

                <div class="user-login-detail float-left pointer"  @click="changePassword">
<!-- <span class="user-img" @click="ShowModal">
<img src="" alt="">
</span> -->
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
<!--  Get Service provider profile  -->
<vue-common-methods :url="url" :hideLoader='true' @get-records="getResponse"></vue-common-methods>


</div>
</template>
<script>
    import { directive as onClickaway } from 'vue-clickaway';
    export default{
        mounted(){
            this.getAllServices();
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
                url : 'api/service-provider-profile-request/approved-profile'
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
            }
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
            getAllServices() {
                let self = this;
                let url = 'api/service?order_by=title';
                self.$http.get(url).then(response=>{
                    response = response.data;
                    self.$store.commit('setAllServices' , response.data);
                    self.$store.commit('setServiceUrlPrefix' , response.url_prefix);
                }).catch(error=>{


                });
            },
            getResponse(response){
                if(response.data){
                    let user = JSON.parse(this.$store.getters.getAuthUser);
                    if(response.data.status == 'approved'){
                        user.is_approved = 1;
                    }else {
                        user.is_approved = 0;
                    }
                    this.$store.commit('setAuthUser' , user);
                }
            }

        },
        watch :{
         $route(to, from) {
            let dateTime = new Date();
            this.url = 'api/service-provider-profile-request/approved-profile?tiem='+dateTime;
         }
     }
 }
</script>
