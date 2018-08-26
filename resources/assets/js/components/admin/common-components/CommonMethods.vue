<template>
    <vue-pagination :loadingStart="loading" class="col-xs-12 col-md-12" @page-changed="getList" :pagination="pagination"></vue-pagination>

</template>


<script>
    export default {
        props : ['url', 'search'],
        data () {
            return {
                records : [],
                pagination : '',
                loading : true,
                noRecordFound : false
            }  
        },
        mounted(){
            this.getList(false);
        },
        methods: {
            getList(page){

                let self = this;

                let url = self.url;

                let result = {
                    data : [],
                    noRecordFound : false
                };

                self.$emit('get-records', result);

                self.loading = true;
                url = self.url;
                self.$emit('start-loading');

                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                self.$http.get(url).then(response=>{

                    response = response.data.response;
                    
                    let result = {
                        data : response.data,
                        noRecordFound : false
                    };

                    console.log(response.data , response.data.length  , 'length of the data and data');

                    if(!response.data.length){
                        result.noRecordFound = true;
                    }

                    self.$emit('get-records', result);
                    self.pagination = response.pagination;

                    self.loading = false;



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
