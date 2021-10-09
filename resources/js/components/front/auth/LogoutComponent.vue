<template>

    <span href="#" class="logout" @click="logout()"><i class="icon-exit"></i></span>

</template>

<script>
    export default {
        mounted() {
        },
        methods: {

            logout: function () {
              var this_ = this;
              localStorage.clear();
              if(this.$auth.isAuthenticated()){
                this.$auth.logout().then(function (Vue) {
                    this_.$store.commit('setAuthUser', '');
                    this_.$store.commit('setSupportQuestions', '');
                    this_.$router.push({ name: 'login'})
                })
            }else{
                this_.$router.push({ name: 'login'})
            }
        }
    }
}
</script>
