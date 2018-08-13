<template>
    <div class="header">
        <div class="inner">
            <div class="container">
                <span class="logo">
                    <router-link class="logo" to="/">
                        <img :src="logo">
                    </router-link>
                </span>
                    <div class="navigation">
                        <ul>
                            <li><router-link to="/explore">Explore</router-link></li>
                            <li><router-link to="/join-as-pro">Join as a Pro</router-link></li>
                            <li><router-link to="/login">Login</router-link></li>
                            <li><router-link to="/sign-up">Sign up</router-link></li>
                            <li><a href="/job-post" class="btn btn-primary">Post a Job</a></li>
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
