<template>
    <datepicker/>
</template>

<script>
    //www.npmjs.com/package/vue2-typeahead
    import Datepicker from 'vuejs-datepicker';
    export default{
         data () {
            return{
                dateplaceholder:'Start Date',
            }
        },
        components: {
            Datepicker
        },
    }
</script>
