<template>

    <vue-pagination class="col-xs-12 col-md-12" @page-changed="getList" :pagination="pagination"></vue-pagination>

</template>


<script>
    export default {
        props : ['url', 'search'],
        data () {
            return {
                records : [],
                pagination : ''
            }  
        },
        mounted(){
            this.getList(false);
        },
        methods: {
            getList(page){

                let self = this;

                let url = self.url;
                
                url = self.url;
                this.$emit('start-loading');

                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                self.$http.get(url).then(response=>{
                    response = response.data.response;

                    self.records = response.data;
                    self.$emit('get-records', self.records);
                    self.pagination = response.pagination;


                }).catch(error=>{
                    self.loading = false;
                    console.log(error , 'error');
                });
            },
        },
        watch:{
            url(){
                this.getList();
            }
        }
    }
</script>
