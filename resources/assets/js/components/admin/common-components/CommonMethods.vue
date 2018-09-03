<template>
    <vue-pagination :infiniteLoad="infiniteLoad" :loadingStart="loading" class="col-xs-12 col-md-12" @page-changed="getList" :pagination="pagination"></vue-pagination>
</template>


<script>
    export default {
        props : ['url', 'search' , 'infiniteLoad'],
        data () {
            return {
                records : [],
                pagination : '',
                loading : true,
                noRecordFound : false
            }  
        },
        mounted(){
            if(!this.infiniteLoad){
                this.getList(false);
            }
        },
        methods: {
            getList(page, successCallback){

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
                        noRecordFound : false,
                        pagination: response.pagination
                    };


                    if(!response.data.length){
                        result.noRecordFound = true;
                    }

                    self.$emit('get-records', result);
                    self.pagination = response.pagination;

                    self.loading = false;

                    console.log(typeof successCallback , 'this is type of successCallback');

                    if(typeof successCallback !== 'undefined'){
                        successCallback(true);
                    }


                }).catch(error=>{
                    self.loading = false;
                    console.log(error , 'error');
                });
            },
        },
        watch:{
            url(val){
                this.url = val;
                this.getList();
            }
        }
    }
</script>
