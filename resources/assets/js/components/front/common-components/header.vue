<template>
    <div class="header">
        <div class="inner">
            <div class="container">
                <span class="logo">
                    <router-link class="logo" to="/">
                        <img :src="logo">
                    </router-link>
                </span>
                    <div class="navigation main-navigation" style="display:none">
                        <ul>
                            <li><router-link to="/explore">Explore</router-link></li>
                            <li><router-link to="/join-as-pro">Join as a Pro</router-link></li>
                            <li><router-link to="/login">Login</router-link></li>
                            <li><router-link to="/sign-up">Sign up</router-link></li>
                            <li><a href="/job-post" class="btn btn-primary">Post a Job</a></li>
                        </ul>
                    </div>
                    <!-- custom heder -->
                    <div class="navigation main-navigation customer-navigation" style="display:block">
                        <ul class="float-left">
                            <li><router-link to="/explore">Explore</router-link></li>
                            <li><router-link to="/explore">My Jobs</router-link></li>
                            <li><a href="javascript:;" class="btn btn-primary post-job-btn">Post a Job</a></li>
                            <li>
                                <div class="user-login-detail float-left">
                                    <span class="user-img" @click="ShowModal">
                                        <img src="/images/dummy/user-pic.jpg" alt="">
                                    </span>
                                    <p class="username">Arsalan Akhtar</p>
                                </div>
                            </li>
                            <li><i class="icon-cog2 action-icon"></i></li>
                            <li>
                                <span class="notify-block" v-on-clickaway="away" @click="isShowing ^= true" v-on:click="Showactive">
                                    <i v-bind:active="tab == true" class="icon-notifications-outline action-icon">
                                    <span class="badge-count">5</span></i>
                                    <notification v-show="isShowing"></notification>
                                </span>
                            </li>
                            <li><i class="icon-exit action-icon"></i></li>
                        </ul>
                    </div>

                    <!-- provider header -->
                    <div class="navigation main-navigation provider-navigation" style="display:none">
                        <ul>
                            <li><router-link to="/explore">Explore</router-link></li>
                            <li><router-link to="/join-as-pro">Join as a Pro</router-link></li>
                            <li><router-link to="/login">Login</router-link></li>
                            <li><router-link to="/sign-up">Sign up</router-link></li>
                            <li><a href="javascript:;" class="btn btn-primary ">Post a Job</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return{
             logo: 'images/logo.png'
        }
    }
}
</script>
