<template>

    <div>


        <vue-pagination @page-changed="getList" :pagination="pagination"></vue-pagination>


    </div>



</template>


<script>
    export default {
        props : ['url', 'search'],
        data () {
            return {
                records : []
            }  
        },
        mounted(){
            this.getList();
        },
        methods: {
            getList(page){

                let self = this;

                let url = self.url;

                if(this.search.service_id || this.search.status || this.search.keyword){
                    var query  = '?pagination=true&keyword='+this.search.keyword+'&filter_by_service='+this.search.service_id+'&filter_by_status='+this.search.status;

                }else{

                    var query  = '?pagination=true';
                }
                
                url = self.url+query;

                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                self.$http.get(url).then(response=>{
                    response = response.data.response;

                    self.records = response.data;
                    self.$emit('get-records', self.records);
                    self.pagination = response.pagination;

                    if (!self.records.length) {
                        self.showNoRecordFound = true;
                    }
                    self.loading = false;


                }).catch(error=>{
                    self.loading = false;
                    console.log(error , 'error');
                });
            },
        }
    }
</script>
