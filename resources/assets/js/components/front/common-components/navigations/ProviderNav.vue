<template>
    <!-- provider header -->
    <div class="navigation main-navigation provider-navigation">
        <ul class="float-left">
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore-jobs">Explore Jobs </router-link></li>
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/my-bids">My Bids</router-link></li>
            <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/featured-profile">Featured Profile</router-link></li>
            <li>
                <ul class="profilesession">
                   <li class="account-li">
                        <div class="user-login-detail float-left pointer" @click="$emit('profilepopup')">
                            <span class="user-img" @click="ShowModal">
                                <img src="/images/dummy/user-pic.jpg" alt="">
                            </span>
                            <p class="username">Arsalan Akhtar</p>
                        </div>
                    </li>
                    <li class="account-info-keys">
                        <ul>
                            <li @click="$emit('clickmenu')" class="setting-li">
                                <router-link to="/profile">
                                    <i class="icon-cog2 action-icon"></i>
                                </router-link>
                            </li>
                            <li class="bell-li">
                                <span class="notify-block" v-on-clickaway="away" @click="isShowing ^= true" v-on:click="Showactive">
                                    <i v-bind:active="tab == true" class="icon-notification action-icon">
                                        <span class="badge-count">5</span></i>
                                        <notification v-show="isShowing" @ReviewWrite="WriteReviewModal()"  @ViewBid="ViewBid()"></notification>
                                    </span>
                                </li>
                                <li @click="$emit('clickmenu')">
                                    <router-link to="/" class="no-active">
                                        <i class="icon-exit action-icon"></i>
                                    </router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            </ul>
        </div>
    </template>
    <script>
        import { directive as onClickaway } from 'vue-clickaway';
        export default{
            data () {
              return {
                isShowing:false,
                showModalValue : false,
                tab: false,
                tabmenu: false,
            }
        },
        directives: {
            onClickaway: onClickaway,
        },
        methods: {
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

        }
    }
</script>
