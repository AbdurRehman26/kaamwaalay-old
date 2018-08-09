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
                            <li><a href="javascript:;">Explore</a></li>
                            <li><router-link to="/join-as-pro">Join as a Pro</router-link></li>
                            <li><a href="javascript:;">Login</a></li>
                            <li><a href="javascript:;">Sign up</a></li>
                            <li><a href="javascript:;" class="btn btn-primary">Post a Job</a></li>
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
