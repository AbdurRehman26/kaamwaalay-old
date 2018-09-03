<template>
            <div class="navigation main-navigation">
                <ul>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/explore">Explore</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/join-as-pro">Join as a Pro</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/login">Login</router-link></li>
                    <li @click="$emit('clickmenu')"><router-link @click.native="scrollToTop()" to="/sign-up">Sign up</router-link></li>
                    <li @click="$emit('clickmenu')"><a href="/job-post" class="btn btn-primary post-job-btn btn-md">Post a Job</a></li>
                </ul>
            </div>
</template>


   <script>
        export default{
            data () {
              return {
            }
        },
        methods: {
            scrollToTop() {
                window.scrollTo(0,0);
            },                       

        }
    }
</script>