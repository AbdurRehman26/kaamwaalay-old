<template>
    <!-- custom heder -->
    <div class="navigation main-navigation customer-navigation">
        <ul class="float-left">
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore">Explore</router-link></li>
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/my-jobs">My Jobs</router-link></li>
            <li @click="$emit('clickmenu')"><a href="/job-post" class="btn btn-primary post-job-btn btn-md">Post a Job</a></li>
            <li>

                <div class="user-login-detail float-left pointer" @click="changePassword">
                    <span class="user-img" @click="ShowModalValue = true;">
                        <img :src="imageValue" alt="">
                    </span>
                    <p class="username">{{fullName}}</p>
                </div>
            </li>

            <li class="setting-li">
                <router-link @click.native="scrollToTop()" to="/profile">
                    <i class="icon-cog2 action-icon"></i>
                </router-link>
            </li>
            <li class="bell-li">
                <span class="notify-block" v-on-clickaway="away" @click="isShowing ^= true">
                    <i v-bind:active="tab == true" class="icon-notification action-icon">
                        <span class="badge-count">5</span></i>
                        <notification v-show="isShowing" @ReviewWrite="WriteReviewModal()"  @ViewBid="ViewBid()"></notification>
                    </span>
                </li>
                <li>
                   <logout-component></logout-component>
               </li>

           </ul>
       </li>
   </ul>
</div>
</template>

<script>
    import { directive as onClickaway } from 'vue-clickaway';
    export default{
        mounted (){
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
        user:{}
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
            return this.userDetails ? this.userDetails.first_name + ' ' + this.userDetails.last_name : '';
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
            if(this.socialAccountId == null){
              this.$emit('profilepopup')
            }
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
        let url = 'api/service';
        self.$http.get(url).then(response=>{
            response = response.data.response;
            self.$store.commit('setAllServices' , response.data);
            self.$store.commit('setServiceUrlPrefix' , response.url_prefix);
        }).catch(error=>{


        });
    },
}
}
</script>
