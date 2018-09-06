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
        'hideLoader'
        ],
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

                if(!this.hideLoader){
                    self.loading = true;
                }

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
                        pagination : response.pagination

                    };


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
                    console.log(error , 'error');
                });
            },
            submitForm(successCallback) {
                let self = this;
                
                let url = self.submitUrl;
                let data = this.formData;

                let urlRequest = '';
                console.log(data , url);
                if(!this.updateForm){
                    urlRequest = self.$http.put(url , data)
                }else{
                    urlRequest = self.$http.post(url , data);
                }
                console.log(urlRequest , '21312321');

                
                urlRequest.then(response => {
                    self.$emit('form-submitted', response);

                }).catch(error => {

                console.log(error , '21321312');
                    
                    if(typeof(successCallback) !== 'undefined'){
                        return successCallback(true);
                    }

                    console.log(error , 'error in job posting');
                    self.$emit('form-error', error);


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
                console.log(value , 12321321321);
                if(value){
                    this.submitForm();
                }
            }
        }
    }
</script>
