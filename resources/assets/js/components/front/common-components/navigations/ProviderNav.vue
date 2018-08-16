<template>
    <!-- provider header -->
    <div class="navigation main-navigation provider-navigation">
        <ul class="float-left">
            <li><router-link to="/explore">Explore Jobs </router-link></li>
            <li><router-link to="">My Bids</router-link></li>
            <li><router-link to="">Featured Profile</router-link></li>
            <li>
                <router-link to="">
                    <div class="user-login-detail float-left">
                        <span class="user-img" @click="ShowModal">
                            <img src="/images/dummy/user-pic.jpg" alt="">
                        </span>
                        <p class="username">Arsalan Akhtar</p>
                    </div>
                </router-link>
            </li>
            <li><router-link to=""><i class="icon-cog2 action-icon"></i></router-link></li>
            <li>
                <router-link to="">
                    <span class="notify-block" v-on-clickaway="away" @click="isShowing ^= true" v-on:click="Showactive">
                        <i v-bind:active="tab == true" class="icon-notification action-icon">
                        <span class="badge-count">5</span></i>
                        <notification v-show="isShowing"></notification>
                    </span>
               </router-link>
            </li>
            <li><i class="icon-exit action-icon"></i></li>
        </ul>
    </div>
</template>
