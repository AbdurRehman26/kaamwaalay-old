<template>
    <router-link class="logo" to="/">
        <img :src="logo">
    </router-link>
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
