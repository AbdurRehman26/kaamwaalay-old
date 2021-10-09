<template>
        <div class="not-found">
            <div class="not-found-panel">
                <h1>{{ heading }}</h1>
                <h2>{{ description }}</h2>
                <h3>{{ description2 }}</h3>
                <a href="/" v-if="anchor" class="btn btn-primary"> {{ buttontext }}</a>
                <router-link :to="{name: 'main-page'}" class="btn btn-primary" v-else>{{ buttontext }}</router-link>
            </div>

         </div>
</template>

<script>
    export default{
        props: ['anchor'],
        data () {
          return {
            heading: '404.',
            description: "Oops, sorry we can't find that page! ",
            description2: "Either something went wrong or the page doesn't exist anymore",
            buttontext: 'Back To Home',

          }
        },
        methods: {

        }
    }
</script>
