<template>
    <vue-pagination :infiniteLoad="infiniteLoad" :loadingStart="loading" class="col-xs-12 col-md-12" @page-changed="getList" :pagination="pagination"></vue-pagination>
</template>


<script>
    export default {
        props : [
        'url',
        'search',
        'infiniteLoad',
        'force',
        'formData',
        'submit',
        'submitUrl',
        'hideLoader',
        'updateForm'
        ],
        data () {
            return {
                records : [],
                pagination : '',
                loading : false,
                noRecordFound : false,
                callInProgress : false,
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
                
                if(typeof(url) == 'undefined' || url == ''){
                    return false;
                }

                let result = {
                    data : [],
                    noRecordFound : false
                };

                self.$emit('get-records', result);
                
                if(!this.hideLoader){
                    self.loading = true;
                }

                url = self.url;

                self.$emit('start-loading');

                if(typeof(page) !== 'undefined' && page){
                    url += '&page='+page;   
                }

                if(this.callInProgress){
                    return false;
                }

                this.callInProgress = true;

                self.$http.get(url).then(response=>{
                    this.callInProgress = false;
                    if(typeof response.data.response != 'undefined'){
                      response = response.data.response;
                    }else{
                      response = response.data;
                    }
                    
                    let result = {
                        data : response.data,
                        noRecordFound : false,
                        pagination : response.pagination

                    };

                    if(typeof response.unread_count != 'undefined'){
                      result.unread_count = response.unread_count
                    }
                    if(!response.data.length){
                        result.noRecordFound = true;
                    }

                    self.$emit('get-records', result);

                    self.pagination = response.pagination;

                    self.loading = false;

                    if(typeof successCallback !== 'undefined'){
                        successCallback(true);
                    }


                }).catch(error=>{
                    self.loading = false;
                    this.callInProgress = false;
                    console.log(error , 'exceptional handling error in generalize CommonMethods.vue@getList');
                });
            },
            submitForm(successCallback) {
                let self = this;
                
                let url = self.submitUrl;
                let data = this.formData;

                let urlRequest = '';

                if(this.updateForm){
                    urlRequest = self.$http.put(url , data)
                }else{
                    urlRequest = self.$http.post(url , data);
                }

                
                urlRequest.then(response => {
                    self.$emit('form-submitted', response.data);

                }).catch(error => {

                    console.log(error , 'exceptional handling error in generalize CommonMethods.vue@submitForm');
                    self.$emit('form-error', error);
                    
                    if(typeof(successCallback) !== 'undefined'){
                        return successCallback(true);
                    }



                });

            },
        },
        watch:{
            url(val){
                this.url = val;
                this.getList();
            },
            force(value){
                if(value){
                    this.getList();
                }
            },
            submit(value){
                if(value){
                    this.submitForm();
                }
            }
        }
    }
</script>
