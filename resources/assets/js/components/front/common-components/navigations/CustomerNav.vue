<template>
    <!-- custom heder -->
    <div class="navigation main-navigation customer-navigation">
        <ul class="float-left">
            <li><router-link to="/explore">Explore</router-link></li>
            <li><router-link to="/my-jobs">My Jobs</router-link></li>
            <li><a href="javascript:;" class="btn btn-primary post-job-btn">Post a Job</a></li>
            <li>                
                    <div class="user-login-detail float-left">
                        <span class="user-img" @click="ShowModal">
                            <img src="/images/dummy/user-pic.jpg" alt="">
                        </span>
                        <p class="username">Arsalan Akhtar</p>
                    </div>
            </li>
            <li>
                <i class="icon-cog22 action-icon"></i>
            </li>
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
</template>
