<template>
    <span class="logout" @click="logout()"><i class="icon-exit"></i></span>
</template>

<script>
    export default {
        mounted() {
        },
        methods: {

            logout: function () {
                var this_ = this;
                this.$auth.logout().then(function (Vue) {
                    this_.$store.commit('setAuthUser', '');
                    this_.$router.push({ name: 'login'})
                })
            }
        }
    }
</script>
